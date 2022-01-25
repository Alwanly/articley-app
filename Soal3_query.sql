CREATE DATABASE db_article;
use DATABASE db_article;
CREATE TABLE artikel(
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
  judul VARCHAR(255) NOT NULL,
  body TEXT NOT NULL,
  tanggal_terbit DATE NOT NULL,
  author_id int NOT NULL,
  status int NOT NULL
);
CREATE Table status (id int NOT NULL, status VARCHAR(50) NOT NULL);
CREATE Table author (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL
);
CREATE Table meta_artikel(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    post_id int NOT NULL,
    meta_key VARCHAR(255) NOT NULL,
    meta_value VARCHAR(255) NOT NULL
);

INSERT INTO artikel (judul,body,tanggal_terbit,author_id,`status`) VALUES 
("Suatu Sore di Pelabuhan Sunda Kelapa","Suatu sore yang terik pada pertengahan Februari 2019, sejumlah remaja naik ke atas kapal layar motor Sinar Keluarga yang bersandar di Pelabuhan Sunda Kelapa","2020-01-2 00:00:00",4,1),
("Suatu Sore di Pelabuhan Sunda Kelapa","Suatu sore yang terik pada pertengahan Februari 2019, sejumlah remaja naik ke atas kapal layar motor Sinar Keluarga yang bersandar di Pelabuhan Sunda Kelapa","2020-01-4 15:13:14",3,1),
("Suatu Sore di Pelabuhan Sunda Kelapa","Suatu sore yang terik pada pertengahan Februari 2019, sejumlah remaja naik ke atas kapal layar motor Sinar Keluarga yang bersandar di Pelabuhan Sunda Kelapa","2020-01-10 17:18:00",2,0),
("Suatu Sore di Pelabuhan Sunda Kelapa","Suatu sore yang terik pada pertengahan Februari 2019, sejumlah remaja naik ke atas kapal layar motor Sinar Keluarga yang bersandar di Pelabuhan Sunda Kelapa","2020-09-20 19:00:00",1,1),
("Suatu Sore di Pelabuhan Sunda Kelapa","Suatu sore yang terik pada pertengahan Februari 2019, sejumlah remaja naik ke atas kapal layar motor Sinar Keluarga yang bersandar di Pelabuhan Sunda Kelapa","2020-12-31 23:59:59",2,1);

INSERT INTO status (id,status) VALUES
(0,'unpublish'),
(1,'publish');

INSERT INTO author (nama) VALUES
("Reporter 1"),
("Reporter 2"),
("Reporter 3"),
("Reporter 4"),
("Reporter 5");

INSERT INTO meta_artikel (post_id,meta_key,meta_value) VALUES
(1,"sponsor","Kompas"),
(1,"Sumber","Kompas"),
(2,"sponsor","Kompas"),
(4,"photographer","Kompas");

/*Soal 1*/
select count(*) as "Total Artikel" from artikel where author_id = (Select id from author where nama = "Reporter 1");

/*Soal 2*/
select id,nama, (SELECT COUNT(*) FROM artikel a where a.author_id = b.id) as total_artikel FROM author b ORDER BY total_artikel DESC;

/*Soal 3*/
select id,body,LENGTH(body) - LENGTH(REPLACE(body,' ',''))+1 From artikel;

/*Soal 4*/
select id,
(SELECT meta_value FROM meta_artikel ma where ma.post_id = a.id and ma.meta_key ="sponsor" ) as 'sponsor',
(SELECT meta_value FROM meta_artikel ma where ma.post_id = a.id and ma.meta_key ="sumber" ) as 'sumber'
FROM artikel a WHERE a.id = 1;

/*Soal 5*/
SELECT * FROM artikel ORDER BY tanggal_terbit asc;

/*Soal 6*/
SELECT COUNT(*) as 'total_artikel_publish' FROM artikel WHERE `status` = true;
