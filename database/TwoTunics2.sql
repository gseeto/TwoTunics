/* SQLEditor (MySQL (2))*/

CREATE TABLE access_level
(
id INTEGER AUTO_INCREMENT UNIQUE,
value VARCHAR(100),
PRIMARY KEY (id)
);

CREATE TABLE charity_partner
(
id INTEGER AUTO_INCREMENT UNIQUE,
name VARCHAR(255),
description VARCHAR(500),
street VARCHAR(255),
city VARCHAR(255),
state VARCHAR(255),
zipcode VARCHAR(10),
phone VARCHAR(12),
email VARCHAR(100),
contact_person VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE donation_status
(
id INTEGER AUTO_INCREMENT UNIQUE,
value VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE fashion_partner
(
id INTEGER AUTO_INCREMENT UNIQUE,
name VARCHAR(255),
description VARCHAR(500),
street VARCHAR(255),
city VARCHAR(255),
state VARCHAR(255),
zipcode VARCHAR(10),
phone VARCHAR(12),
email VARCHAR(100),
contact_person VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE size
(
id INTEGER AUTO_INCREMENT UNIQUE,
value VARCHAR(255),
category VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE transaction
(
id INTEGER AUTO_INCREMENT UNIQUE,
donation_id INTEGER,
need_id INTEGER,
date_initiated DATE,
number_of_units INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE unit_genre
(
id INTEGER AUTO_INCREMENT UNIQUE,
name VARCHAR(255),
category VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE user
(
id INTEGER AUTO_INCREMENT UNIQUE,
username VARCHAR(255),
password VARCHAR(255),
email VARCHAR(255),
first_name VARCHAR(255),
last_name VARCHAR(255),
access_level INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE donation
(
id INTEGER AUTO_INCREMENT UNIQUE,
description VARCHAR(500),
quantity_given INTEGER,
unit_genre_id INTEGER,
size_id INTEGER,
status INTEGER,
cost_per_unit DECIMAL(13,2),
fashion_partner_id INTEGER,
date_donated DATE,
quantity_remaining INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE need
(
id INTEGER AUTO_INCREMENT UNIQUE,
description VARCHAR(500),
quantity_requested INTEGER,
unit_genre_id INTEGER,
size INTEGER,
date_requested DATE,
charity_id INTEGER,
quantity_still_required INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE user_charity_assn
(
user_id INTEGER NOT NULL,
charity_id INTEGER NOT NULL
);

CREATE TABLE user_fashion_assn
(
user_id INTEGER NOT NULL,
fashion_id INTEGER NOT NULL
);

ALTER TABLE transaction ADD FOREIGN KEY donation_id_idxfk (donation_id) REFERENCES donation (id);

ALTER TABLE transaction ADD FOREIGN KEY need_id_idxfk (need_id) REFERENCES need (id);

ALTER TABLE user ADD FOREIGN KEY access_level_idxfk (access_level) REFERENCES access_level(id);

ALTER TABLE donation ADD FOREIGN KEY unit_genre_id_idxfk (unit_genre_id) REFERENCES unit_genre (id);

ALTER TABLE donation ADD FOREIGN KEY size_id_idxfk (size_id) REFERENCES size (id);

ALTER TABLE donation ADD FOREIGN KEY status_idxfk (status) REFERENCES donation_status (id);

ALTER TABLE donation ADD FOREIGN KEY fashion_partner_id_idxfk (fashion_partner_id) REFERENCES fashion_partner (id);

ALTER TABLE need ADD FOREIGN KEY unit_genre_id_idxfk_1 (unit_genre_id) REFERENCES unit_genre (id);

ALTER TABLE need ADD FOREIGN KEY charity_id_idxfk (charity_id) REFERENCES charity_partner (id);

ALTER TABLE user_charity_assn ADD FOREIGN KEY user_id_idxfk (user_id) REFERENCES user (id);

ALTER TABLE user_charity_assn ADD FOREIGN KEY charity_id_idxfk_1 (charity_id) REFERENCES charity_partner (id);

ALTER TABLE user_fashion_assn ADD FOREIGN KEY user_id_idxfk_1 (user_id) REFERENCES user (id);

ALTER TABLE user_fashion_assn ADD FOREIGN KEY fashion_id_idxfk (fashion_id) REFERENCES fashion_partner (id);
