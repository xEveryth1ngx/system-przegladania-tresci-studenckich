CREATE TABLE `pracownik`
(
    `id`        INT UNSIGNED    NOT NULL    AUTO_INCREMENT,
    `imie`      VARCHAR(255)    NOT NULL,
    `nazwisko`  VARCHAR(255)    NOT NULL,
    `stopien`   VARCHAR(255),
    PRIMARY KEY (`id`)
) COLLATE='utf8_polish_ci'
;
