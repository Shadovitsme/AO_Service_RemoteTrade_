CREATE TABLE clients(
    id int primary key AUTO_INCREMENT not null,
    name char(50)
);
CREATE TABLE merchendise(
    id int primary key AUTO_INCREMENT not null,
    goods_name char(100)
);
CREATE TABLE orders(
    id int primary key AUTO_INCREMENT not null,
    customerId int,
    foreign key (customerId) references clients (id),
    goods_id int,
    foreign key (goods_id) references merchendise (id),
    comment char(100),
    stat boolean
);
INSERT INTO clients (name) VALUES ('vassa');
INSERT INTO clients (name) VALUES ('nana');
INSERT INTO merchendise (goods_name) VALUES ('rar');
INSERT INTO merchendise (goods_name) VALUES ('pruska.rar');