
crete database bienesraices2;
craeate table Sellers(
id int(11) primary key auto_incrment not null,
name varchar(32) not null,
email varchar(32) not null,
phone varchar(10) not null);

describe table Sellers;

créate table properties(
id int(11) primary key auto_increment,
title varchar(32) not null,
Price decimal(10,2) not null,
image varchar(256),
description longtext,
roms int,
wc int,
garag int,
timestap date, 
id_sellers int not null,
foreingn key(id_sellers) references Sellers(id));

use bienesraices2;

-- Primero eliminamos la clave foránea existente
ALTER TABLE properties DROP FOREIGN KEY properties_ibfk_1;

-- Luego volvemos a agregarla
ALTER TABLE properties
ADD CONSTRAINT fk_id_seller
FOREIGN KEY (id_seller) REFERENCES sellers(id);
