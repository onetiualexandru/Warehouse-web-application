DROP TABLE IF EXISTS `furnizori`;
CREATE TABLE furnizori
(idf INT(30),
numef VARCHAR(40),
adresa VARCHAR(40),
CONSTRAINT furnizor_idf_pk PRIMARY KEY(idf)
);

INSERT INTO furnizori VALUES(1,'S.C UTCN SRL','Cluj');
INSERT INTO furnizori VALUES(2,'S.C Romstal Imex SRL','Alba');
INSERT INTO furnizori VALUES(3,'S.C Peter Pan SRL','Sibiu');
INSERT INTO furnizori VALUES(4,'S.C 50greenpoint SRL','Brasov');
INSERT INTO furnizori VALUES(5,'S.C Isis SRL','Sebes');
INSERT INTO furnizori VALUES(6,'S.C Noob SRL','Constanta');
INSERT INTO furnizori VALUES(7,'S.C Trump SRL','Baia Mare');
INSERT INTO furnizori VALUES(8,'S.C Batman SRL','Bucuresti');
INSERT INTO furnizori VALUES(9,'S.C Alexandra Number ONE SRL','Zalau');
INSERT INTO furnizori VALUES(10,'S.C Daia SRL','Suceava');


DROP TABLE IF EXISTS `piese`;
CREATE TABLE piese
(idp INT(30),
numep VARCHAR(40),
culoare VARCHAR(40),
CONSTRAINT piesa_idp_pk PRIMARY KEY(idp)
);

delimiter $$
CREATE TRIGGER inset_culoare_check BEFORE INSERT ON piese
       FOR EACH ROW
       BEGIN
           IF NEW.numep LIKE '%corp%' AND !(NEW.culoare = 'bronz') THEN
              SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Culoarea piesei trebuie sa fie bronz';
           END IF;
       END;$$
delimiter ;

INSERT INTO piese VALUES(1,'coltare','rosu');
INSERT INTO piese VALUES(2,'dulapuri','maro');
INSERT INTO piese VALUES(3,'mase','galben');
INSERT INTO piese VALUES(4,'scaune','verde');
INSERT INTO piese VALUES(5,'fotoliu','albastru');
INSERT INTO piese VALUES(6,'pachete','violet');
INSERT INTO piese VALUES(7,'vaza','alb');
INSERT INTO piese VALUES(8,'gresie','negru');
INSERT INTO piese VALUES(9,'lambriuri','rosu');
INSERT INTO piese VALUES(10,'pendule','galben');
INSERT INTO piese VALUES(11,'parsachi','maro');
INSERT INTO piese VALUES(12,'canapele','rosu');
INSERT INTO piese VALUES(13,'corp de iluminat','bronz');


DROP TABLE IF EXISTS `cataloage`;
CREATE TABLE  cataloage
(idf INT(30),
idp INT(30),
pret INT(30),
moneda VARCHAR(5),
CONSTRAINT cataloage_pk PRIMARY KEY(idf,idp),
CONSTRAINT idf_fk FOREIGN KEY (idf) REFERENCES furnizori(idf),
CONSTRAINT idp_fk FOREIGN KEY (idp) REFERENCES piese(idp)
);

delimiter //
CREATE TRIGGER insert_pret_check BEFORE INSERT ON cataloage
       FOR EACH ROW
       BEGIN
           IF NEW.pret < 0 THEN
               SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Pretul trebuie sa fie mai mare decat 0';
           END IF;
       END;
//
delimiter ;

INSERT INTO cataloage VALUES(1,1,16,'RON');
INSERT INTO cataloage VALUES(2,1,16,'RON');
INSERT INTO cataloage VALUES(3,1,16,'RON');
INSERT INTO cataloage VALUES(4,2,16,'RON');
INSERT INTO cataloage VALUES(5,2,16,'RON');
INSERT INTO cataloage VALUES(6,12,140,'RON');
INSERT INTO cataloage VALUES(7,12,100,'RON');
INSERT INTO cataloage VALUES(8,4,150,'RON');
INSERT INTO cataloage VALUES(10,10,960,'RON');
INSERT INTO cataloage VALUES(9,9,960,'RON');
INSERT INTO cataloage VALUES(9,4,110,'RON');

DROP TABLE IF EXISTS `comenzi`;
CREATE TABLE comenzi
(idc INT(30),
idf INT(30),
idp INT(30),
cantitate INT(30),
CONSTRAINT comanda_pk PRIMARY KEY(idc,idf,idp),
CONSTRAINT idf_pk FOREIGN KEY (idf) REFERENCES furnizori(idf),
CONSTRAINT idp_pk FOREIGN KEY (idp) REFERENCES piese(idp)
);

INSERT INTO comenzi VALUES(1,1,1,10);
INSERT INTO comenzi VALUES(1,3,10,4);
INSERT INTO comenzi VALUES(2,2,1,5);
INSERT INTO comenzi VALUES(3,2,2,6);
INSERT INTO comenzi VALUES(4,2,3,5);
INSERT INTO comenzi VALUES(4,2,4,5);
INSERT INTO comenzi VALUES(4,2,5,5);


SELECT idp AS 'ID Piesa', numep AS 'Nume piesa' FROM piese WHERE culoare IN('maro','galben','rosu') ORDER BY idp;


SELECT * FROM cataloage WHERE pret BETWEEN 100 AND 150;

SELECT f.idf,f.numef,f.adresa FROM furnizori f JOIN cataloage c ON (f.idf=c.idf) JOIN piese p ON(c.idp=p.idp ) WHERE p.numep like '%e';

SELECT DISTINCT p1.idp,c1.pret FROM cataloage c1 JOIN piese p1 ON (c1.idp=p1.idp) JOIN cataloage c2 ON (c1.pret=c2.pret) JOIN piese p2 ON (c2.idp=p2.idp) WHERE c1.pret=c2.pret AND c1.idf!=c2.idf ORDER BY p1.idp;

SELECT f.idf,f.numef,f.adresa FROM furnizori f JOIN cataloage c on (f.idf=c.idf) JOIN piese p on (p.idp=c.idp) WHERE culoare= 'verde';

SELECT idp, pret FROM cataloage WHERE pret IN (SELECT MAX(pret) FROM cataloage);

SELECT MIN(pret) AS 'pret_minim' FROM cataloage;

SELECT MAX(pret) AS 'pret_maxim' FROM cataloage;

SELECT COUNT(idf) AS 'nr_furnz',idc,cantitate FROM comenzi GROUP BY idc;

-- proceduri
--procedura selectie culoare
DELIMITER //
CREATE PROCEDURE select_color (IN col CHAR(20))
BEGIN
  SELECT idp, numep FROM piese
  WHERE culoare = col;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE select_3color (IN col CHAR(20),IN col1 CHAR(20),IN col2 CHAR(20))
BEGIN
  SELECT idp, numep FROM piese
  WHERE culoare = col OR culoare = col1 OR culoare = col2;
END //
DELIMITER ;
--procedura selectie pret
DELIMITER //
CREATE PROCEDURE select_pret (IN pret1 INT(30),IN pret2 INT(30))
BEGIN
  SELECT idf,idp,pret,moneda FROM cataloage
  WHERE pret BETWEEN pret1 AND pret2;
END //
DELIMITER ;
--procedura cautare culoare
DELIMITER //
CREATE PROCEDURE search_color (IN x CHAR(20))
BEGIN
  SELECT f.idf,f.numef,f.adresa FROM furnizori f JOIN cataloage c on (f.idf=c.idf) JOIN piese p on (p.idp=c.idp) WHERE culoare = x;
END //
DELIMITER ;
