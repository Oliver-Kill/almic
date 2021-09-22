/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ almic /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE almic;

DROP TABLE IF EXISTS menus;
CREATE TABLE `menus` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `menu_name` varchar(255) DEFAULT NULL,
  `parent_menu` int DEFAULT NULL,
  `child_index` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_menu` (`parent_menu`),
  CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`parent_menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `username` varchar(255) DEFAULT NULL,
  `pw` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO menus(id,menu_name,parent_menu,child_index) VALUES(1,'a',NULL,NULL),(2,'b',NULL,NULL),(3,'c',1,1),(4,'d',2,2);
INSERT INTO users(id,username,pw) VALUES(1,'test@gmail.com','acbd18db4cc2f85cedef654fccc4a4d8');