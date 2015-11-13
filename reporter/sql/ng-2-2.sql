
-- รายงานแบบ ง.2-2

select 
	bg.planId, l3dPlan.PLANNAME as planName,
	bg.facultyId, faculty.DEPARTMENTNAME as facultyName, bg.deptId, dept.DEPARTMENTNAME as deptName,
		sum(case when bg.fundgroupId = 100 then bg.budgetSummary else 0 end) as 'generalFund', 
	sum(case when bg.fundgroupId = 200 then bg.budgetSummary else 0 end) as 'eduFund', 
	sum(case when bg.fundgroupId = 300 then bg.budgetSummary else 0 end) as 'researchFunds', 
	sum(case when bg.fundgroupId = 400 then bg.budgetSummary else 0 end) as 'outreachFund',
	sum(case when bg.fundgroupId = 500 then bg.budgetSummary else 0 end) as 'affairsFund', 
	sum(case when bg.fundgroupId = 600 then bg.budgetSummary else 0 end) as 'assetsFund', 
	sum(case when bg.fundgroupId = 700 then bg.budgetSummary else 0 end) as 'otherFund', 
	sum(case when bg.fundgroupId = 701 then bg.budgetSummary else 0 end) as 'culturalFund', 
	sum(case when bg.fundgroupId = 702 then bg.budgetSummary else 0 end) as 'funds',
	sum(case when bg.fundgroupId = 703 then bg.budgetSummary else 0 end) as 'welfareFund', 
	sum(case when bg.fundgroupId = 704 then bg.budgetSummary else 0 end) as 'devFund', 
	sum(case when bg.fundgroupId = 705 then bg.budgetSummary else 0 end) as 'boardFund', 
	sum(case when bg.fundgroupId = 706 then bg.budgetSummary else 0 end) as 'institutionsFund', 
	sum(case when bg.fundgroupId = 707 then bg.budgetSummary else 0 end) as 'purposeFund', 
	sum(case when bg.fundgroupId = 708 then bg.budgetSummary else 0 end) as 'inventoryFund', 
	sum(case when bg.fundgroupId = 709 then bg.budgetSummary else 0 end) as 'techKMUTNBFund' 


from (
	select 
	l3dPlan.PLANID as planId,
	faculty.DEPARTMENTID as facultyId, dept.DEPARTMENTID as deptId,
	fund.FUNDGROUPID as fundgroupId,
	coalesce(sum(bg140.BUDGETSUMMARY), 0) + 
	coalesce(sum(bg141.BUDGETSUMMARY), 0) +
	coalesce(sum(bg142.BUDGETSUMMARY), 0) +
	coalesce(sum(bg143.BUDGETSUMMARY), 0) +
	coalesce(sum(bg144.BUDGETSUMMARY), 0) +
	coalesce(sum(bg145.BUDGETSUMMARY), 0) +
	coalesce(sum(bg146.BUDGETSUMMARY), 0) as budgetSummary
	from L3D_DEPARTMENT faculty
	left outer join L3D_DEPARTMENT dept on dept.MASTERID = faculty.DEPARTMENTID
	inner join BUDGETHEAD bgh on bgh.DEPARTMENTID = dept.DEPARTMENTID
	inner join L3D_PLAN l3dPlan on l3dPlan.PLANID = bgh.L3D_PLANID
	inner join L3D_FUNDGROUP fund on fund.FUNDGROUPID = bgh.FUNDGROUPID
	left outer join BUDGET140 bg140 on bgh.BUDGETHEADID = bg140.BUDGETHEADID
	left outer join BUDGET141 bg141 on bgh.BUDGETHEADID = bg141.BUDGETHEADID
	left outer join BUDGET142 bg142 on bgh.BUDGETHEADID = bg142.BUDGETHEADID
	left outer join BUDGET143 bg143 on bgh.BUDGETHEADID = bg143.BUDGETHEADID
	left outer join BUDGET144 bg144 on bgh.BUDGETHEADID = bg144.BUDGETHEADID
	left outer join BUDGET145 bg145 on bgh.BUDGETHEADID = bg145.BUDGETHEADID
	left outer join BUDGET146 bg146 on bgh.BUDGETHEADID = bg146.BUDGETHEADID
	where faculty.DEPARTMENTID <> 0 
	and faculty.DEPARTMENTGROUP = 'A' 
	and faculty.DEPARTMENTSTATUS = 'Y' 
	and dept.DEPARTMENTSTATUS = 'Y'
	and bgh.BUDGETTYPECODE = 'G'
	and bgh.BUDGETPERIODID = 2558 
	--and faculty.DEPARTMENTID = 30100
	group by l3dPlan.PLANID, faculty.DEPARTMENTID, dept.DEPARTMENTID, fund.FUNDGROUPID
) as bg
inner join L3D_PLAN l3dPlan on l3dPlan.PLANID = bg.planId
inner join L3D_DEPARTMENT faculty on faculty.DEPARTMENTID = bg.facultyId
inner join L3D_DEPARTMENT dept on dept.DEPARTMENTID = bg.deptId
group by bg.planId, l3dPlan.PLANNAME, bg.facultyId, faculty.DEPARTMENTNAME, bg.deptId, dept.DEPARTMENTNAME