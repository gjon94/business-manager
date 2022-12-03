use business_manager;
insert into contract_types(name) values ("partime");
insert into contract_types(name) values ("full time");

insert into roles(power,name,description) values
(1,'owner','owner of the business'),
(2,'manager','manager role'),
(3,'admin','admin role'),
(4,'secretarySenior','secretarySenior role'),
(5,'secretary','secretary role'),
(10,'employee','employee role');

insert into sectors(name) values('edile'),('trasporti');
