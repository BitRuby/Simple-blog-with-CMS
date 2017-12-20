create table pages(
	id int primary key not null AUTO_INCREMENT,
    page_name varchar(50) not null, 
	page_type varchar(12) not null,
	page_content varchar(1024) not null
);

create table users(
   	id int primary key not null AUTO_INCREMENT,|
    username varchar(50) not null, 
	password varchar(12) not null
);

insert into users SET USERNAME='root', PASSWORD='admin1234';