-- ****************** SqlDBM: MySQL ******************;
-- ***************************************************;

DROP  TABLE IF EXISTS `u_pub_tag`;


DROP  TABLE IF EXISTS `imagenes`;


DROP  TABLE IF EXISTS `citas`;


DROP  TABLE IF EXISTS `espacio`;


DROP  TABLE IF EXISTS `publicaciones`;


DROP  TABLE IF EXISTS `estado`;


DROP  TABLE IF EXISTS `tipo_espacio`;


DROP  TABLE IF EXISTS `edificio`;


DROP  TABLE IF EXISTS `tags`;



-- ************************************** `publicaciones`

CREATE TABLE `publicaciones`
(
 `id_publicacion` INT NOT NULL AUTO_INCREMENT,
 `fecha_pub`      DATETIME NOT NULL ,
 `titulo`         VARCHAR(45) NOT NULL ,
 `texto`          TEXT NOT NULL ,

PRIMARY KEY (`id_publicacion`)
) ENGINE=INNODB COLLATE=utf8_spanish_ci;






-- ************************************** `estado`

CREATE TABLE `estado`
(
 `id_estado` INT NOT NULL AUTO_INCREMENT,
 `estatus`   VARCHAR(45) NOT NULL ,

PRIMARY KEY (`id_estado`)
) ENGINE=INNODB COLLATE=utf8_spanish_ci;






-- ************************************** `tipo_espacio`

CREATE TABLE `tipo_espacio`
(
 `id_tipo_espacio` INT NOT NULL AUTO_INCREMENT,
 `nombre`          VARCHAR(50) NOT NULL ,

PRIMARY KEY (`id_tipo_espacio`)
) ENGINE=INNODB COLLATE=utf8_spanish_ci;






-- ************************************** `edificio`

CREATE TABLE `edificio`
(
 `id_edificio` INT NOT NULL AUTO_INCREMENT,
 `nombre`      VARCHAR(100) NOT NULL ,

PRIMARY KEY (`id_edificio`)
) ENGINE=INNODB COLLATE=utf8_spanish_ci;






-- ************************************** `tags`

CREATE TABLE `tags`
(
 `id_tag` INT NOT NULL AUTO_INCREMENT,
 `nombre` VARCHAR(100) NOT NULL ,

PRIMARY KEY (`id_tag`)
) ENGINE=INNODB COLLATE=utf8_spanish_ci;






-- ************************************** `u_pub_tag`

CREATE TABLE `u_pub_tag`
(
 `id_u_pub_tag`   INT NOT NULL ,
 `id_tag`         INT NOT NULL ,
 `id_publicacion` INT NOT NULL ,

PRIMARY KEY (`id_u_pub_tag`),
KEY `fkIdx_57` (`id_tag`),
CONSTRAINT `FK_57` FOREIGN KEY `fkIdx_57` (`id_tag`) REFERENCES `tags` (`id_tag`),
KEY `fkIdx_60` (`id_publicacion`),
CONSTRAINT `FK_60` FOREIGN KEY `fkIdx_60` (`id_publicacion`) REFERENCES `publicaciones` (`id_publicacion`)
) ENGINE=INNODB COLLATE=utf8_spanish_ci;






-- ************************************** `imagenes`

CREATE TABLE `imagenes`
(
 `id_imagen`      INT NOT NULL AUTO_INCREMENT,
 `url`            TEXT NOT NULL ,
 `portada`        TINYINT NOT NULL ,
 `id_publicacion` INT NOT NULL ,

PRIMARY KEY (`id_imagen`),
KEY `fkIdx_51` (`id_publicacion`),
CONSTRAINT `FK_51` FOREIGN KEY `fkIdx_51` (`id_publicacion`) REFERENCES `publicaciones` (`id_publicacion`)
) ENGINE=INNODB COLLATE=utf8_spanish_ci;






-- ************************************** `citas`

CREATE TABLE `citas`
(
 `id_cita`      INT NOT NULL AUTO_INCREMENT,
 `fecha_cita`   DATETIME NOT NULL ,
 `tiempo_aprox` FLOAT NOT NULL ,
 `id_estado`    INT NOT NULL ,

PRIMARY KEY (`id_cita`),
KEY `fkIdx_37` (`id_estado`),
CONSTRAINT `FK_37` FOREIGN KEY `fkIdx_37` (`id_estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=INNODB COLLATE=utf8_spanish_ci;






-- ************************************** `espacio`

CREATE TABLE `espacio`
(
 `id_espacio`      INT NOT NULL AUTO_INCREMENT,
 `nombre`          VARCHAR(45) NOT NULL ,
 `fecha`           DATETIME NOT NULL ,
 `id_tipo_espacio` INT NOT NULL ,
 `id_edificio`     INT NOT NULL ,
 `id_estado`       INT NOT NULL ,

PRIMARY KEY (`id_espacio`),
KEY `fkIdx_23` (`id_tipo_espacio`),
CONSTRAINT `FK_23` FOREIGN KEY `fkIdx_23` (`id_tipo_espacio`) REFERENCES `tipo_espacio` (`id_tipo_espacio`),
KEY `fkIdx_26` (`id_edificio`),
CONSTRAINT `FK_26` FOREIGN KEY `fkIdx_26` (`id_edificio`) REFERENCES `edificio` (`id_edificio`),
KEY `fkIdx_29` (`id_estado`),
CONSTRAINT `FK_29` FOREIGN KEY `fkIdx_29` (`id_estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=INNODB COLLATE=utf8_spanish_ci;





