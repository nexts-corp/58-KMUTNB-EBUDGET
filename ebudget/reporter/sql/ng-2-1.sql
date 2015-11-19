
-- รายงานแบบ ง.2-1

select
bgAll.planId, bgAll.planName,
bgAll.facultyId, bgAll.facultyName,
bgAll.deptId, bgAll.deptName,
bgAll.budgetTypeMasterId, bgAll.budgetTypeMasterName,
bgAll.budgetTypeMainId, bgAll.budgetTypeMainName,
sum(case when bgAll.budgetTypeMainId = 10100000 then bgAll.budgetSummary else 0 end) as 'salary',
sum(case when bgAll.budgetTypeMainId = 10200000 then bgAll.budgetSummary else 0 end) as 'wages',
sum(case when bgAll.budgetTypeMainId = 10300000 then bgAll.budgetSummary else 0 end) as 'compensationEmp',
sum(case when bgAll.budgetTypeMainId = 20101000 then bgAll.budgetSummary else 0 end) as 'staffSalary',
sum(case when bgAll.budgetTypeMainId = 20102000 then bgAll.budgetSummary else 0 end) as 'tempWages',
sum(case when bgAll.budgetTypeMainId = 20201000 then bgAll.budgetSummary else 0 end) as 'compensation',
sum(case when bgAll.budgetTypeMainId = 20202000 then bgAll.budgetSummary else 0 end) as 'livingCost',
sum(case when bgAll.budgetTypeMainId = 20203000 then bgAll.budgetSummary else 0 end) as 'matCost',
sum(case when bgAll.budgetTypeMainId = 20204000 then bgAll.budgetSummary else 0 end) as 'utilityCost',
sum(case when bgAll.budgetTypeMainId = 20300000 then bgAll.budgetSummary else 0 end) as 'durableCost',
sum(case when bgAll.budgetTypeMainId = 20400000 then bgAll.budgetSummary else 0 end) as 'buildingCost',
sum(case when bgAll.budgetTypeMainId = 20500000 then bgAll.budgetSummary else 0 end) as 'otherCost'
from 
(
select 
	faculty.DEPARTMENTID as facultyId, faculty.DEPARTMENTNAME as facultyName, 
	dept.DEPARTMENTID as deptId, dept.DEPARTMENTNAME as deptName, 
	l3dPlan.PLANID as planId, l3dPlan.PLANNAME as planName,
	bgTypeMaster.BUDGETTYPEID as budgetTypeMasterId, bgTypeMaster.BUDGETTYPENAME as budgetTypeMasterName,
	bgTypeMain.BUDGETTYPEID as budgetTypeMainId, bgTypeMain.BUDGETTYPENAME as budgetTypeMainName,
	coalesce(sum(bg.budgetSummary), 0) as budgetSummary
from (
	select 
	bgh.DEPARTMENTID as deptId,
	bgh.L3D_PLANID as planId,
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
	group by bgh.DEPARTMENTID, bgh.L3D_PLANID, bgh.FORMBUDGET, 
	bg140.BUDGETTYPEID, bg141.BUDGETTYPEID, bg142.BUDGETTYPEID, bg143.BUDGETTYPEID, bg144.BUDGETTYPEID, bg145.BUDGETTYPEID, bg146.BUDGETTYPEID
) as bg
inner join L3D_DEPARTMENT dept on dept.DEPARTMENTID = bg.deptId
inner join L3D_DEPARTMENT faculty on faculty.DEPARTMENTID = dept.MASTERID
inner join L3D_PLAN l3dPlan on l3dPlan.PLANID = bg.planId
inner join BUDGETTYPE bgType on bgType.BUDGETTYPEID = bg.budgetTypeId
inner join BUDGETTYPE bgTypeMain on bgTypeMain.BUDGETTYPEID = bgType.MASTERID
inner join BUDGETTYPE bgTypeMaster on bgTypeMaster.BUDGETTYPEID = bgTypeMain.MASTERID
where bgTypeMaster.BUDGETTYPEID not in (20100000, 20200000)
group by faculty.DEPARTMENTID, faculty.DEPARTMENTNAME, dept.DEPARTMENTID, dept.DEPARTMENTNAME, 
l3dPlan.PLANID, l3dPlan.PLANNAME,
bgTypeMaster.BUDGETTYPEID, bgTypeMaster.BUDGETTYPENAME,
bgTypeMain.BUDGETTYPEID, bgTypeMain.BUDGETTYPENAME

union all

select 
	faculty.DEPARTMENTID as facultyId, faculty.DEPARTMENTNAME as facultyName, 
	dept.DEPARTMENTID as deptId, dept.DEPARTMENTNAME as deptName, 
	l3dPlan.PLANID as planId, l3dPlan.PLANNAME as planName,
	bgTypeMaster.BUDGETTYPEID as budgetTypeMasterId, bgTypeMaster.BUDGETTYPENAME as budgetTypeMasterName,
	bgTypeMain.BUDGETTYPEID as budgetTypeMainId, bgTypeMain.BUDGETTYPENAME as budgetTypeMainName,
	coalesce(sum(bg.budgetSummary), 0) as budgetSummary
from (
	select 
	bgh.DEPARTMENTID as deptId,
	bgh.L3D_PLANID as planId,
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
	group by bgh.DEPARTMENTID, bgh.L3D_PLANID, bgh.FORMBUDGET, 
	bg140.BUDGETTYPEID, bg141.BUDGETTYPEID, bg142.BUDGETTYPEID, bg143.BUDGETTYPEID, bg144.BUDGETTYPEID, bg145.BUDGETTYPEID, bg146.BUDGETTYPEID
) as bg
inner join L3D_DEPARTMENT dept on dept.DEPARTMENTID = bg.deptId
inner join L3D_DEPARTMENT faculty on faculty.DEPARTMENTID = dept.MASTERID
inner join L3D_PLAN l3dPlan on l3dPlan.PLANID = bg.planId
inner join BUDGETTYPE bgType on bgType.BUDGETTYPEID = bg.budgetTypeId
inner join BUDGETTYPE bgTypeMain on bgTypeMain.BUDGETTYPEID = bgType.MASTERID
inner join BUDGETTYPE bgTypeMaster on bgTypeMaster.BUDGETTYPEID = bgTypeMain.MASTERID
where bgTypeMaster.BUDGETTYPEID in (20100000, 20200000)
group by faculty.DEPARTMENTID, faculty.DEPARTMENTNAME, dept.DEPARTMENTID, dept.DEPARTMENTNAME, 
l3dPlan.PLANID, l3dPlan.PLANNAME,
bgTypeMaster.BUDGETTYPEID, bgTypeMaster.BUDGETTYPENAME,
bgTypeMain.BUDGETTYPEID, bgTypeMain.BUDGETTYPENAME, bgType.BUDGETTYPEID, bgType.BUDGETTYPENAME
) bgAll
group by 
bgAll.planId, bgAll.planName,
bgAll.facultyId, bgAll.facultyName,
bgAll.deptId, bgAll.deptName,
bgAll.budgetTypeMasterId, bgAll.budgetTypeMasterName,
bgAll.budgetTypeMainId, bgAll.budgetTypeMainName