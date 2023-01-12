INSERT INTO pracownik (`imie`,`nazwisko`,`stopien`) VALUES ('Artur','Karczmarczyk','dr inz.');
INSERT INTO pracownik (`imie`,`nazwisko`,`stopien`) VALUES ('Krzysztof','Makle','dr inz.');
INSERT INTO pracownik (`imie`,`nazwisko`,`stopien`) VALUES ('Malgorzata','Machowska-Szewczyk','dr');
INSERT INTO pracownik (`imie`,`nazwisko`,`stopien`) VALUES ('Aneta','Bera','dr inz.');
INSERT INTO pracownik (`imie`,`nazwisko`,`stopien`) VALUES ('Marek','Wernikowski','dr inz.');
INSERT INTO pracownik (`imie`,`nazwisko`,`stopien`) VALUES ('Imed','El Fray','dr hab.inz.');



INSERT INTO pomieszczenie (`numer`,`rodzaj`,`godziny_dostepnosci`,`pracownik_id`,`pietro_id`) 
VALUES ('128','wykladowa','8:15-10:00','4','1');
INSERT INTO pomieszczenie (`numer`,`rodzaj`,`godziny_dostepnosci`,`pracownik_id`,`pietro_id`) 
VALUES ('100','audytoryjna','12:15-14:00','1','1');
INSERT INTO pomieszczenie (`numer`,`rodzaj`,`godziny_dostepnosci`,`pracownik_id`,`pietro_id`) 
VALUES ('101','gabinet','8:15-12:15','6','1');
INSERT INTO pomieszczenie (`numer`,`rodzaj`,`godziny_dostepnosci`,`pracownik_id`,`pietro_id`) 
VALUES ('129','laboratoryjna','14:15-16:00','4','1');


INSERT INTO pietro (`id`,`numer`,`budynek_id`) VALUES ('0','0','1');
INSERT INTO pietro (`id`,`numer`,`budynek_id`) VALUES ('1','1','1');
INSERT INTO pietro (`id`,`numer`,`budynek_id`) VALUES ('2','2','1');
INSERT INTO pietro (`id`,`numer`,`budynek_id`) VALUES ('3','3','1');
INSERT INTO pietro (`id`,`numer`,`budynek_id`) VALUES ('4','0','2');
INSERT INTO pietro (`id`,`numer`,`budynek_id`) VALUES ('5','1','2');
INSERT INTO pietro (`id`,`numer`,`budynek_id`) VALUES ('6','2','2');
INSERT INTO pietro (`id`,`numer`,`budynek_id`) VALUES ('7','3','2');


INSERT INTO budynek (`id`,`nazwa`,`adres`) VALUES ('1','WI-ZUT-1','ul. Zolnierska 49, 71-210 Szczecin');
INSERT INTO budynek (`id`,`nazwa`,`adres`) VALUES ('2','WI-ZUT-2','ul. Zolnierska 52, 71-210 Szczecin');

