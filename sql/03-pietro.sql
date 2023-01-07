CREATE TABLE `pietro`
(
`id`            INT UNSIGNED    NOT NULL,
`numer`         INT UNSIGNED    NOT NULL,
`budynek_id`    INT UNSIGNED,
PRIMARY KEY (`id`),
FOREIGN KEY (`budynek_id`) REFERENCES budynek(`id`)
) COLLATE =`utf8_polish_ci`;