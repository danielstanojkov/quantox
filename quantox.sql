/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `is_backend` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO `categories` (`id`, `name`, `subcategory_id`, `is_backend`) VALUES
(1, 'Angular', NULL, 0);
INSERT INTO `categories` (`id`, `name`, `subcategory_id`, `is_backend`) VALUES
(2, 'AngularJS', 1, 0);
INSERT INTO `categories` (`id`, `name`, `subcategory_id`, `is_backend`) VALUES
(3, 'Angular 2', 1, 0);
INSERT INTO `categories` (`id`, `name`, `subcategory_id`, `is_backend`) VALUES
(4, 'React', NULL, 0),
(5, 'React Native', 4, 0),
(6, 'Vue', NULL, 0),
(7, 'PHP', NULL, 1),
(8, 'Symphony', 7, 1),
(9, 'Silex', 8, 1),
(10, 'Laravel', 7, 1),
(11, 'Lumen', 10, 1),
(12, 'NodeJS', NULL, 1),
(13, 'Express', 12, 1),
(14, 'NestJS', 12, 1);

INSERT INTO `users` (`id`, `name`, `email`, `password`, `category_id`) VALUES
(1, 'daaa', 'daniel@gmail.com', '$2y$10$cEqYhaARPx2rC2Ctnax/V.jbIZHxru.FdsPkJ.FmBqsqd1cNSoZYq', 10);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `category_id`) VALUES
(2, 'John', 'daaaa@gmail.com', '$2y$10$D.jKd5yWErrpnVvxJ71qCudqT8/33LO0qc3wtjkJnE0c38oT2p32q', 11);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `category_id`) VALUES
(3, 'John', 'johny@gmail.com', '$2y$10$aE/lPKrmOC26CuMF3psG..gXgznFTLg8YLb9CViEFkb55cacNbtYa', 4);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `category_id`) VALUES
(5, 'Paul', 'paul@gmail.com', '$2y$10$gqHioZ.BIIG2rShaI.YBWuzhuE5Fc85tLGpsvQ/bXZCsSDMYXe9zq', 2),
(6, 'Daniel Stanojkov', 'danielstanojkov@gmail.com', '$2y$10$vmOtPO66uhaRJvMddEGiyeQddqOJOwvkaQQJ58h9kfQ1yPFXRtGDi', 6),
(7, 'Steve', 'steve@gmail.com', '$2y$10$NZa3Di00lVG.EJXvaLnwlulhz.RX.8iznO/JqIp9THGKW5n9gRBT2', 10),
(8, 'George', 'george@gmail.com', '$2y$10$PQHdOoBQRkP5BDw9wLpQauGy7t6scqdXPbud.cpp5ZLcRXRk1dfX6', 6),
(9, 'Tomas', 'tom@gmail.com', '$2y$10$yYGEieFXpD2Dx.vOMuguZ.Y2zZPFoDT08bBHAHM7/ej1JxAzwL4VS', 7);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;