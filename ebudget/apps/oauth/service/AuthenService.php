<?php

namespace apps\oauth\service;

use apps\common\entity\Member;
use apps\common\entity\Role;
use apps\common\entity\MemberRole;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use th\co\bpg\cde\data\CDataContext;
use apps\oauth\interfaces\IAuthenService;
use Firebase\JWT\JWT;

class AuthenService extends CServiceBase implements IAuthenService {

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    public function authorization() {

        $code = $this->getRequest()->code;
        if ($this->getRequest()->username && $this->getRequest()->password) {
            $username = $this->getRequest()->username;
            $password = $this->getRequest()->password;

            $check = new Member();
            $check->username = $username;
            $check->password = md5($password);
            $user = $this->datacontext->getObject($check);
            //print_r($user);

            if (count($user) > 0) {

                $data = base64_decode($code);
                $datas = explode("|", $data);
                $cc = (array) JWT::decode($datas[1], "123456", array('HS256'));
                $pp = array(
                    "uid" => $user[0]->id
                );
                $uid = JWT::encode($pp, "123456");
                $euid = base64_encode($uid);

                $authUrl = $cc['OAUTH2_CALLBACK_URL'] . "?code=" . $euid;

                // echo $authUrl;

                header('Location: ' . $authUrl);
                header('Location: /kmutnb-ebudget/ebudget/api/root/view/index');
                exit;
            } else {

                $view = new CJView("signin", CJViewType::HTML_VIEW_ENGINE);
                $view->code = $code;
                $view->username = $username;
                $view->password = $password;
                return $view;
            }
        } else {
            $view = new CJView("signin", CJViewType::HTML_VIEW_ENGINE);
            $view->code = $code;
            return $view;
        }
    }

    public function authenticate() {

        $this->logger->info("authenticate.....");
        $euid = $this->getRequest()->code;
        $uid = base64_decode($euid);

        $uidd = (array) JWT::decode($uid, "123456", array('HS256'));

        $member = new Member();
        $member->id = $uidd['uid'];
        $xmember = $this->datacontext->getObject($member);

        if (count($xmember) > 0) {

            $member_role = new MemberRole();
            $member_role->memberId = $xmember[0]->id;
            $xmember_role = $this->datacontext->getObject($member_role);

            if (count($xmember_role) > 0) {
                $role = new Role();
                $role->id = $xmember_role[0]->roleId;
                $xrole = $this->datacontext->getObject($role);

                $acc = new \th\co\bpg\cde\collection\CJAccount();
                $acc->code = $xmember[0]->id;
                $acc->name = $xmember[0]->firstname . " " . $xmember[0]->lastname;
                $acc->role = $xrole[0]->role;
                $acc->usertype = $xrole[0]->roleId;
                $acc->domain = $xrole[0]->role;
                $acc->resources = array();
                $acc->resources[] = $xrole[0]->id;

                $uinfo = JWT::encode($acc, "123456");
                $uinfo = base64_encode($uinfo);
                // return $uinfo;
                print $uinfo;
                exit();
            }
        }
    }

}
