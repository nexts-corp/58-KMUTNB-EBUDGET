-- รายงานแบบ ง.3

select 
	faculty.DEPARTMENTID as facultyId, faculty.DEPARTMENTNAME as facultyName,
	bgAll.deptId, dept.DEPARTMENTNAME as deptName,
	bgAll.planId, l3dPlan.PLANNAME as planName,
	bgAll.fundgroupId, fundgroup.FUNDGROUPNAME as fundgroupName,
	masterBgId, masterBgName,
	mainBgId, mainBgName,
	bgId, bgName,
	bgAll.budgetSummary
from
(
	select 
	bgh.DEPARTMENTID as deptId,
	bgh.L3D_PLANID as planId,
	bgh.FUNDGROUPID as fundgroupId,
	(case 
		when bgh.FORMBUDGET = 140 then bg140.BUDGETTYPEID
		when bgh.FORMBUDGET = 141 then bg141.BUDGETTYPEID
		when bgh.FORMBUDGET = 142 then bg142.BUDGETTYPEID
		when bgh.FORMBUDGET = 143 then bg143.BUDGETTYPEID
		when bgh.FORMBUDGET = 144 then bg144.BUDGETTYPEID
		when bgh.FORMBUDGET = 145 then bg145.BUDGETTYPEID
		when bgh.FORMBUDGET = 146 then bg146.BUDGETTYPEID
	else 0 end) as budgetTypeId,
	coalesce(sum(bg140.BUDGETSUMMARY), 0) + 
	coalesce(sum(bg141.BUDGETSUMMARY), 0) +
	coalesce(sum(bg142.BUDGETSUMMARY), 0) +
	coalesce(sum(bg143.BUDGETSUMMARY), 0) +
	coalesce(sum(bg144.BUDGETSUMMARY), 0) +
	coalesce(sum(bg145.BUDGETSUMMARY), 0) +
	coalesce(sum(bg146.BUDGETSUMMARY), 0) as budgetSummary
	from BUDGETHEAD bgh
	left outer join BUDGET140 bg140 on bgh.BUDGETHEADID = bg140.BUDGETHEADID
	left outer join BUDGET141 bg141 on bgh.BUDGETHEADID = bg141.BUDGETHEADID
	left outer join BUDGET142 bg142 on bgh.BUDGETHEADID = bg142.BUDGETHEADID
	left outer join BUDGET143 bg143 on bgh.BUDGETHEADID = bg143.BUDGETHEADID
	left outer join BUDGET144 bg144 on bgh.BUDGETHEADID = bg144.BUDGETHEADID
	left outer join BUDGET145 bg145 on bgh.BUDGETHEADID = bg145.BUDGETHEADID
	left outer join BUDGET146 bg146 on bgh.BUDGETHEADID = bg146.BUDGETHEADID
	where bgh.BUDGETTYPECODE = 'G'
	and bgh.BUDGETPERIODID = 2558 
	--and dept.DEPARTMENTID = 30100
	group by bgh.DEPARTMENTID, bgh.L3D_PLANID, bgh.FUNDGROUPID, bgh.FORMBUDGET, 
	bg140.BUDGETTYPEID, bg141.BUDGETTYPEID, bg142.BUDGETTYPEID, bg143.BUDGETTYPEID, bg144.BUDGETTYPEID, bg145.BUDGETTYPEID, bg146.BUDGETTYPEID
) bgAll inner join (
	select 
	bgTypeMaster.BUDGETTYPEID as masterBgId, bgTypeMaster.BUDGETTYPENAME as masterBgName,
	bgTypeMain.BUDGETTYPEID as mainBgId, bgTypeMain.BUDGETTYPENAME as mainBgName,
	case when bgType.BUDGETTYPEID is null then bgTypeMain.BUDGETTYPEID else bgType.BUDGETTYPEID end as bgId, 
	case when bgType.BUDGETTYPENAME is null then bgTypeMain.BUDGETTYPENAME else bgType.BUDGETTYPENAME end as bgName,
	case when bgType.BUDGETTYPEID is null then bgTypeMain.BUDGETTYPEID
		 when bgTypeSub.BUDGETTYPEID is null then bgType.BUDGETTYPEID else bgTypeSub.BUDGETTYPEID end as subBgId, 
	case when bgType.BUDGETTYPENAME is null then bgTypeMain.BUDGETTYPENAME
		 when bgTypeSub.BUDGETTYPENAME is null then bgType.BUDGETTYPENAME else bgTypeSub.BUDGETTYPENAME end as subBgName
	from BUDGETTYPE bgTypeMaster 
	left outer join BUDGETTYPE bgTypeMain on bgTypeMaster.BUDGETTYPEID = bgTypeMain.MASTERID
	left outer join BUDGETTYPE bgType on bgTypeMain.BUDGETTYPEID = bgType.MASTERID
	left outer join BUDGETTYPE bgTypeSub on bgType.BUDGETTYPEID = bgTypeSub.MASTERID
	where bgTypeMaster.BUDGETTYPECODE = 'G' 
	and bgTypeMain.BUDGETTYPECODE = 'G'
	and bgTypeMaster.MASTERID = 0  
	--order by bgTypeMaster.BUDGETTYPEID, bgTypeMain.BUDGETTYPEID, bgType.BUDGETTYPEID, bgTypeSub.BUDGETTYPEID
) bgType on bgType.subBgId = bgAll.budgetTypeId
inner join L3D_DEPARTMENT dept on dept.DEPARTMENTID = bgAll.deptId
inner join L3D_DEPARTMENT faculty on faculty.DEPARTMENTID = dept.MASTERID
inner join L3D_PLAN l3dPlan on l3dPlan.PLANID = bgAll.planId
inner join L3D_FUNDGROUP fundgroup on fundgroup.FUNDGROUPID = bgAll.fundgroupId