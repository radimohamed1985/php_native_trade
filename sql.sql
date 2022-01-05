create table client(
    id int  PRIMARY KEY AUTO_INCREMENT ,
    client_name varchar(255)
);

create table fatora(
   serial int PRIMARY key  AUTO_INCREMENT,
    client_id int,
     fatora_date date,
     total int,
    FOREIGN key (client_id) REFERENCES client(id)
    );
    create table product(
        id int PRIMARY key AUTO_INCREMENT,
        name varchar(255),
        price int , 
        qty int,
        total int
    );
create table sales(
    id int primary key AUTO_INCREMENT,
    serialnumber int ,
    product varchar(255),
    s_price int,
    s_qty int ,
    cost int,
    s_total int ,
    client_id int ,
    date date,
    FOREIGN key (client_id) REFERENCES client(id)

)


create table users(
    id int PRIMARY KEY AUTO_INCREMENT,
    username varchar(255),
    password varchar(255)
)
 
 create table saleprice(
         id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    price varchar(255)
 )

 create table revenue(
            id int PRIMARY KEY AUTO_INCREMENT,
    date date,
    revenue varchar(255)
 )

 create table account(
id int primary key AUTO_INCREMENT ,
client_id int,
 dept int ,
 cridet int,
 balance int,
  date date
  FOREIGN KEY client_id REFERENCES client(id))


 )
 create table tregery(
     id int primary key AUTO_INCREMENT ,
     income int,
     expenses int,
     balance int,
     date date
     

 )
 create table suppliers(
       id int  PRIMARY KEY AUTO_INCREMENT ,
    supplier_name varchar(255)
 );

 create table supplierAccount(
   id int primary key AUTO_INCREMENT ,
     supplier_id int,
     dept int,
     credit int,
     balance int,
     date date,
     FOREIGN key (supplier_id) REFERENCES suppliers(id)
 )