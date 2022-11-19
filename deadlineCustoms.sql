use business_manager;

select businesses.id as businessId, custom_pages.id as customPageId,custom_pages.name as customPageName ,
    custom_tables.column_2 as end_time,custom_tables.column_3,column_names.name_column_3 from businesses
    
    inner join custom_pages on custom_pages.business_id = businesses.id
    inner join custom_tables on custom_tables.custom_page_id = custom_pages.id
    inner join column_names on column_names.custom_page_id = custom_pages.id
    
    
    where businesses.id = 1 and custom_tables.column_2 is not null
     
    
    order by custom_tables.column_2 