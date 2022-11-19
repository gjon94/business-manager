use business_manager;
select employees.id as userId,name ,surname,deadlines.end_time from employees
inner join contracts on contracts.id = employees.contract_id
inner join deadlines on deadlines.id = contracts.deadline_id

order by deadlines.end_time