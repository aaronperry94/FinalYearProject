use AP_Car_Sales;

create table cars
(
  carid int unsigned not null auto_increment primary key,
  make char(10) not null,
  model char(20) not null,
  year int(4) not null,
  mileage int(20),
  fuel char(10),
  gear char(10),
  litre int(4),
  price int(10) not null
);