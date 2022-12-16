CREATE TABLE `movie`
(
    `id`          INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    `title`       VARCHAR(255)  NOT NULL,
    `description` TEXT          NOT NULL,
    `year`        VARCHAR(255)  NOT NULL,
    PRIMARY KEY (`id`)
) COLLATE='utf8_polish_ci'
;
