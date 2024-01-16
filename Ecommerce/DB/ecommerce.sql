create database ecommerce
use ecommerce
create table user(
                               id int not null auto_increment primary key,
                               email varchar(100),
                               password_utente varchar(100),
                               role_id int,
                               cart_id int
);

create table role(
                               id int not null auto_increment primary key,
                               nome varchar(100),
                               descrizione varchar(100)
);

create table cart(
                               id int not null auto_increment primary key
);

create table session(
                                  id int not null auto_increment primary key,
                                  ip insigned int,
                                  data_login varchar(100),
                                  user_id int
);

create table product(
                                  id int not null auto_increment primary key,
                                  nome varchar(100),
                                  prezzo int,
                                  marca varchar(100)
);

create table cart_product(
                             id int not null auto_increment primary key,
                             cart_id int,
                             product_id int
);

alter table ecommerce.user
    ADD FOREIGN KEY (role_id) REFERENCES role(id),
ADD FOREIGN KEY (cart_id) REFERENCES cart(id);

alter table ecommerce.session
    ADD FOREIGN KEY (user_id) REFERENCES user(id);

alter table ecommerce.cart_product
    ADD FOREIGN KEY (cart_id) REFERENCES cart(id),
ADD FOREIGN KEY (product_id) REFERENCES product(id);