create table menu
( 
    menuid int unsigned not null auto_increment primary key,
    name char(50) not null
);

create table shots
( 
    shotid int unsigned auto_increment primary key,
    name char(50) not null
);

create table coffee_prices
(
    coffee_id int unsigned not null auto_increment primary key,
    menuid int unsigned not null,
    shotid int unsigned,
    price decimal(4,2) not null,
    foreign key (menuid) references menu(menuid),
    foreign key (shotid) references shots(shotid)
);

create table orders
(
    orderid int unsigned not null auto_increment primary key,
    java_qty int unsigned not null,
    java_subtotal decimal(6,2) not null,
    cafe_qty int unsigned not null,
    cafe_id int unsigned not null,
    cafe_subtotal decimal(6,2) not null,
    cappu_qty int unsigned not null,
    cappu_id int unsigned not null,
    cappu_subtotal decimal(6,2) not null,
    total decimal(8,2) not null
);