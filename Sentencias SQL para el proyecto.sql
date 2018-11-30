-- Sentencia SQL que crea la Base de Datos 

CREATE DATABASE rss


-- Sentencia SQL para crear la tabla que contendrá las noticias

CREATE TABLE IF NOT EXISTS `noticias` (
`id_noticia` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
`link` varchar(120) NOT NULL DEFAULT '',
`titulo` varchar(150) NOT NULL,
`descripcion` varchar(300) DEFAULT NULL,
`fecha` varchar(15) NOT NULL,
PRIMARY KEY (`id_noticia`)
);