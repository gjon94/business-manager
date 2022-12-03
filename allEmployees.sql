use business_manager;



-- select if(5 = 1, 'ffff','nooo')

select `posts`.*, `employees`.`id` as `employeeId`,'employees.name' from `posts` 
-- inner join `users` on `posts`.`user_id` = `users`.`id` and `posts`.`is_owner` = 1 
inner join `employees` on `posts`.`user_id` = `employees`.`id` and `posts`.`is_owner` = 0 
where `posts`.`business_id` = 2 order by `created_at` desc limit 5


