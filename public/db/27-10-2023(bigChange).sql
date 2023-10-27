-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour littlecocon2
CREATE DATABASE IF NOT EXISTS `littlecocon2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `littlecocon2`;

-- Listage de la structure de table littlecocon2. cours
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_cours` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `slug_cours` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon2.cours : ~4 rows (environ)
INSERT INTO `cours` (`id`, `nom_cours`, `description`, `prix`, `slug_cours`, `image_name`) VALUES
	(1, 'Atelier de portage découverte', 'Je me déplace à votre domicile pour vous faire découvrir les principes du portage physiologique ainsi que les points importants \r\npour un portage en toute sécurité. \r\n<br> <br>\r\nJe possède des poupons et un grand nombre de moyens de portage différents, \r\nvous pourrez essayer ceux qui vous parlent le plus pour trouver le <span> VOTRE </span> et vous l\'approprier. \r\n<br> <br>\r\nJe vous accompagne de manière personnalisée et approfondie tout au long de votre découverte ou perfectionnement au portage. \r\nVous n\'avez pas besoin de posséder un moyen de portage, si vous en avez un, nous verrons comment l\'utiliser au mieux ! \r\n<br><br> \r\nJe prends tout le temps dont vous avez besoin et réponds à toutes vos questions. L\'atelier peut avoir lieu pendant la grossesse \r\nà partir de 7 mois (c\'est l\'idéal) ou une fois que bébé est né. Si bébé est là, l\'atelier suivra son rythme et vous pourrez \r\nutiliser des poupons si bébé a besoin d\'une pause ☺️.', 65, 'atelier-de-portage', 'precieux-petit-garcon-nouveau-ne-ayant-sommeil-profond-jour-poitrine-mere-echarpe-bebe-bleu-maman-em.webp'),
	(2, 'Consultation d\'allaitement', 'Entretien prénatal ou consultation allaitement, je suis présente tout au long de votre aventure lactée jusqu\'au sevrage et/ou à \r\nla diversification.  \r\n<br><br>\r\nEn tant que professionnelle de santé et de l\'allaitement, je vous accompagne pour vous préparer à accueillir votre bébé. \r\nQue vous souhaitiez allaiter, que vous préfériez le biberon ou que vous hésitiez encore, je suis là pour vous donner un maximum d\'informations.\r\n<br><br>\r\nAinsi, vous pourrez vivre sereinement votre décision et pallier à tous les petits tracas éventuels du début de vie.', 55, 'consultation-d-allaitement', 'mere-grand-angle-nouveau-ne-mignon.webp'),
	(3, 'Rituel Rebozo', 'Le Rituel dure environ 2h. Il est composé en plusieurs étapes : échange et discussion, massage, sudation, resserrage des 7 points du corps. \r\nUne tisane est proposé tout au long du Rituel afin de réchauffer et détendre le corps plus en profondeur. \r\n<br><br>\r\n <span>Quand vivre le Rituel ?</span> \r\n <br>Dès que vous le souhaitez ou en ressentez le besoin. Les rituels peuvent se vivre dès l\'accouchement passé. \r\n Il s\'agit de finir cette grossesse, de fermer la porte qui a permis l\'arrivée de ce nouvel être. Le corps et l\'esprit s\'ouvrent à \r\n une autre vie. Celle d\'une mère et d\'une femme...  \r\n <br><br>\r\n <span>Les contre-indications :</span> Fièvre, phlébite, problèmes cardio-vasculaires, ostéoporose,\r\n entorse ou inflammation articulaire, problèmes de peau, trouble de la coagulation, varices, diabète, début de grossesse ou grossesse à \r\n risque... En cas de doute, n\'hésitez pas à me contacter !', 140, 'rituel-rebozo', '77A3725HD-825x510.webp'),
	(5, 'Cercle mamans-bébés', 'Parce que devenir maman ce n\'est pas tous les jours rose ni facile, on peut se sentir seule et désemparée.\r\n Arriver à prendre soin de soi et ne pas s\'oublier n\'est pas évident avec une petite boule de bébé qui dépend de nous.<br>\r\n  <span> Les cercles vous permettent de : </span> <br>\r\n  - Sortir de votre quotidien <br>\r\n  - Partager avec d\'autres mamans <br>\r\n  - D\'évacuer ce qui doit l\'être <br>\r\n  - Penser à vous <br>\r\n  - Passer un moment fort avec votre bébé,... <br>\r\n   Une bulle dans laquelle je vous propose plein d\'outils pour votre vie de maman, pour faire éclore votre confiance en vous en tant \r\n   que femme et mère.\r\n   <br><br> <span> Au fil de ces 4 rencontres, nous abordons différents thèmes selon vos envies et besoins : </span> <br>\r\n   - Pleurs, sommeil de bébé <br>\r\n   - Développement psycho-moteur, éveil et motricité<br>\r\n    - Alimentation (de bébé et maman) <br>\r\n    - Couple, famille, reprise du travail<br> \r\n    - Maternage, post-partum \r\n    <br><br>Vous allez vivre un moment magique ! 🤩🥰  <br>\r\n    <br><br>\r\n    Vous pouvez vous offrir ce moment ou l\'offrir à une maman que vous aimez. Plus que du matériel et des conseils hasardeux, \r\n    les nouveaux parents ont besoin de soutien. 🙏🙏  Le tarif est valable pour le cycle de 4 cercles (soit 20€/rencontre).', 80, 'cercle-mamans-bebes', 'ADMR cercle de mamans.png'),
	(7, 'Le Serrage du bassin', 'Issu du Rituel Rebozo, voici un soin à effectuer le plus tôt possible après la naissance et autant de fois que nécessaire ! \r\n<br>\r\nLe soin se compose d\'un temps d\'accueil et d\'écoute accompagné d\'une tisane du post-partum. \r\nIl est suivi de bercements tantôt dynamique et réchauffant 🔥, tantôt lent et relaxant 😇 pour permettre le relâchement du corps et de l\'esprit ! \r\n<br>\r\nVient ensuite le moment du serrage du bassin avec le Rebozo. Vous êtes confortablement installée, le serrage reste en place le temps \r\nqu\'il faut pour que vous puissiez fermer cette porte et en laisser une autre s\'ouvrir...  \r\n\r\n<br><br>\r\nUn beau moment, symbolique et libérateur, juste pour vous après bébé !', 60, 'rituel-rebozo', '13761-29728-0-13.jpg'),
	(8, 'Atelier de portage collectif', 'Venez découvrir les principes du portage physiologique ainsi que les points importants pour un portage en toute sécurité. \r\n<br>\r\nVous pourrez essayer différents moyens de portage pour trouver le <span> VOTRE </span> et vous l\'approprier. \r\nJe vous accompagne tout au long de votre découverte ou perfectionnement au portage. \r\n<br><br>\r\nVous n\'avez pas besoin de posséder un moyen de portage, si vous en avez un, n\'hésitez pas à le ramener ! \r\n\r\n<br><br>\r\n L\'atelier est prévu pour 2 à 4 parents (ou couple), à partir de 6 mois de grossesse, avec ou sans bébé (poupons à disposition si \r\n bébé n\'est pas encore là ou a besoin de repos).', 30, 'atelier-de-portage', '13761-94620-0-39.jpg'),
	(10, 'Carte cadeau 50€', 'Vous cherchez un cadeau vraiment utile pour une jeune ou future Maman ?  Offrez un peu de Douceur de lune. Le bon d\'une valeur de 50€ s\'utilise pour tous les accompagnements : allaitement, portage, Rebozo, cercles,...  Vous pouvez régler le bon ici. Choisissez n\'importe quelle date sur le planning, cela n\'a pas d\'importance ! Après le règlement, je vous envoie le bon cadeau par mail. La (future) Maman n\'aura plus qu\'à m\'appeler le jour où elle est prête et je verrai avec elle pour la date et les détails du soin choisi.', 50, 'carte-cadeau-50', 'Posts-Insta-24.webp'),
	(12, 'Test', 'Test test', 12, 'test-cours', '5ead98d47d0e6ad5f6f0d4f154024c94.jpg');

-- Listage de la structure de table littlecocon2. doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Listage des données de la table littlecocon2.doctrine_migration_versions : ~0 rows (environ)
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20231027125013', '2023-10-27 12:50:19', 17);

-- Listage de la structure de table littlecocon2. messenger_messages
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon2.messenger_messages : ~0 rows (environ)

-- Listage de la structure de table littlecocon2. payement
CREATE TABLE IF NOT EXISTS `payement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reservation_id` int NOT NULL,
  `montant` decimal(6,2) NOT NULL,
  `dt_payement` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B20A7885B83297E7` (`reservation_id`),
  CONSTRAINT `FK_B20A7885B83297E7` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon2.payement : ~0 rows (environ)

-- Listage de la structure de table littlecocon2. reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cours_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `dt_resa` datetime NOT NULL,
  `dt_cours` datetime NOT NULL,
  `payement_method` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IDX_42C849557ECF78B0` (`cours_id`),
  KEY `IDX_42C84955A76ED395` (`user_id`),
  CONSTRAINT `FK_42C849557ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_42C84955A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon2.reservation : ~0 rows (environ)
INSERT INTO `reservation` (`id`, `cours_id`, `user_id`, `dt_resa`, `dt_cours`, `payement_method`, `user_name`, `is_paid`) VALUES
	(13, 2, 1, '2023-10-27 12:30:42', '2023-10-14 16:30:00', 'payment-online', 'littlecocon@gmail.com', 0),
	(14, 2, 1, '2023-10-27 12:55:44', '2023-10-15 15:00:00', 'payment-online', 'littlecocon@gmail.com', 0),
	(15, 2, 1, '2023-10-27 13:03:47', '2023-10-08 15:00:00', 'payment-online', 'littlecocon@gmail.com', 0),
	(16, 2, 1, '2023-10-27 13:19:23', '2023-10-22 16:30:00', 'payment-online', 'littlecocon@gmail.com', 0),
	(17, 2, 1, '2023-10-27 13:19:56', '2023-10-07 16:30:00', 'payment-online', 'littlecocon@gmail.com', 0),
	(18, 1, 1, '2023-10-27 13:21:17', '2023-09-16 15:30:00', 'payment-sur-place', 'littlecocon@gmail.com', 0),
	(19, 1, 1, '2023-10-27 13:21:28', '2023-10-27 11:30:00', 'payment-online', 'littlecocon@gmail.com', 0),
	(20, 1, 1, '2023-10-27 13:23:51', '2023-10-27 11:30:00', 'payment-online', 'littlecocon@gmail.com', 0),
	(21, 1, 1, '2023-10-27 13:24:36', '2023-10-27 11:30:00', 'payment-online', 'littlecocon@gmail.com', 0),
	(22, 1, 1, '2023-10-27 13:27:51', '2023-10-14 15:00:00', 'payment-online', 'littlecocon@gmail.com', 0),
	(23, 1, 1, '2023-10-27 13:29:14', '2023-10-14 18:00:00', 'payment-online', 'littlecocon@gmail.com', 0),
	(24, 1, 1, '2023-10-27 13:30:37', '2023-10-29 17:30:00', 'payment-online', 'littlecocon@gmail.com', 1),
	(25, 2, 1, '2023-10-27 13:53:51', '2023-10-14 17:00:00', 'payment-online', 'littlecocon@gmail.com', 1),
	(26, 5, 1, '2023-10-27 13:56:28', '2023-10-13 15:30:00', 'payment-online', 'littlecocon@gmail.com', 1),
	(27, 1, 1, '2023-10-27 14:02:06', '2023-10-21 15:00:00', 'payment-online', 'littlecocon@gmail.com', 1),
	(28, 2, 1, '2023-10-27 14:03:16', '2023-10-13 15:00:00', 'payment-online', 'littlecocon@gmail.com', 1),
	(29, 2, 1, '2023-10-27 14:06:09', '2023-10-20 12:30:00', 'payment-online', 'littlecocon@gmail.com', 0),
	(30, 2, 1, '2023-10-27 14:08:16', '2023-10-20 12:30:00', 'payment-online', 'littlecocon@gmail.com', 1),
	(31, 3, 1, '2023-10-27 14:53:30', '2023-10-28 16:00:00', 'payment-online', 'littlecocon@gmail.com', 0),
	(32, 2, 1, '2023-10-27 14:54:59', '2023-10-07 15:00:00', 'payment-online', 'littlecocon@gmail.com', 1);

-- Listage de la structure de table littlecocon2. reset_password_request
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `selector` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`),
  CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon2.reset_password_request : ~0 rows (environ)
INSERT INTO `reset_password_request` (`id`, `user_id`, `selector`, `hashed_token`, `requested_at`, `expires_at`) VALUES
	(7, 1, 'jSBZQZdJpVoz3soZBUr9', 'ncQkIk7aLbzQSY7ByH8e3bjuOr0kOy33QREiiUGEmY4=', '2023-09-26 13:57:00', '2023-09-26 14:57:00');

-- Listage de la structure de table littlecocon2. unavailable_date
CREATE TABLE IF NOT EXISTS `unavailable_date` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int DEFAULT NULL,
  `all_courses` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `all_day` tinyint(1) NOT NULL,
  `slot` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42DFE3CB591CC992` (`course_id`),
  CONSTRAINT `FK_42DFE3CB591CC992` FOREIGN KEY (`course_id`) REFERENCES `cours` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon2.unavailable_date : ~0 rows (environ)
INSERT INTO `unavailable_date` (`id`, `course_id`, `all_courses`, `date`, `all_day`, `slot`) VALUES
	(24, NULL, 0, '2023-08-20', 0, NULL),
	(26, 2, 1, '2023-08-22', 0, '10:00:00'),
	(27, 5, 1, '2023-09-29', 0, '17:00:00');

-- Listage de la structure de table littlecocon2. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon2.user : ~9 rows (environ)
INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `pseudo`, `phone_number`, `name`) VALUES
	(1, 'littlecocon@gmail.com', '["ROLE_ADMIN"]', '$2y$13$A5UfZHtJ8Qc1VZ57mU3X2.4iCkHJ3Z3Ef.yZ9eQG7P5tQy6DH6f3.', 1, 'Guillaume', '0606060606', 'KEZIC Guillaume'),
	(2, 'user@gmail.com', '["ROLE_USER"]', '$2y$13$JRK332Byb4uvsK/EafzlGuxSbtOtyQv1vGn7wLqsQa4FGVILKADYS', 1, 'User', '', NULL),
	(9, 'Zicka@zicka.com', '["ROLE_USER"]', '$2y$13$6g7P7giqXLOgcHSRers8geIPXFq/72lDLm/RX4jmaE0WtQiMobYWC', 0, 'Zicka67', '', NULL),
	(10, 'Testsub@hotmail.fr', '["ROLE_USER"]', '$2y$13$DFjiCO/NSL3Pio/aml8fOuvMocpwDgUzl4bCtO5nJH9kFPJNfgco.', 0, 'Testsub', '', NULL),
	(11, 'testt@outlook.fr', '["ROLE_USER"]', '$2y$13$Bwug8jKHVvPXN0eEgpCE0eiOluiqLExtVs8xBRuGMatYg08IJ75EG', 0, 'testt', '', NULL),
	(12, 'testtelephone@gmail.com', '["ROLE_USER"]', '$2y$13$BE8qo2VJt4Qk60pIljT.zeib/z73YEnacbdIqEp10WS2gA7j2wSb6', 0, 'dzdzd', '0606060606', NULL),
	(13, 'telephone@gmail.com', '["ROLE_USER"]', '$2y$13$ZUeiNgJyRZbuKy7gotliC.yyKZVWrU1HY9b14XQN.G1Fv6SubwEz2', 0, 'TestTelephone', '0606060606', NULL),
	(14, 'dqzdqcocon@gmail.com', '["ROLE_USER"]', '$2y$13$o0b6OOMzt8VZ4lh8RmTGd.dYSJPPQp6rTjiBjC.1uIy.04wgeyi3C', 0, 'zdzdff', '0606060606', NULL),
	(15, 'ee@ee.fr', '["ROLE_USER"]', '$2y$13$OnXDSs0TKLnApdqBNhQfq.qQ.4I9iiSlAYu0Sd0ZX2T3TpNqKVwBi', 0, 'eeee55', '00000000000000', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
