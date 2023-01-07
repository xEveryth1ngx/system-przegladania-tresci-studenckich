CREATE TABLE `pomieszczenie`
(
    `id`                    INT UNSIGNED    NOT NULL    AUTO_INCREMENT,
    `numer`                 INT UNSIGNED    NOT NULL,
    `rodzaj`                VARCHAR(255)    NOT NULL,
    `godziny_dostepnosci`   VARCHAR(255),
    `pracownik_id`          INT UNSIGNED,
    `pietro_id`             INT UNSIGNED,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`pracownik_id`) REFERENCES pracownik(`id`),
    FOREIGN KEY (`pietro_id`) REFERENCES pietro(`id`)
) COLLATE='utf8_polish_ci'
;
