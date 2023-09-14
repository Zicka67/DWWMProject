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


-- Listage de la structure de la base pour littlecocon25
CREATE DATABASE IF NOT EXISTS `littlecocon25` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `littlecocon25`;

-- Listage de la structure de table littlecocon25. cours
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_cours` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_cours` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon25.cours : ~8 rows (environ)
INSERT INTO `cours` (`id`, `nom_cours`, `description`, `prix`, `image`, `slug_cours`) VALUES
	(1, 'Atelier de portage ', 'Je me déplace à votre domicile pour vous faire découvrir les principes du portage physiologique ainsi que les points importants pour un portage en toute sécurité. Je possède des poupons et un grand nombre de moyens de portage différents, vous pourrez essayer ceux qui vous parlent le plus pour trouver le VOTRE et vous l\'approprier. Je vous accompagne de manière personnalisée et approfondie tout au long de votre découverte ou perfectionnement au portage. Vous n\'avez pas besoin de posséder un moyen de portage, si vous en avez un, nous verrons comment l\'utiliser au mieux !  Je prends tout le temps dont vous avez besoin et réponds à toutes vos questions. L\'atelier peut avoir lieu pendant la grossesse à partir de 7 mois (c\'est l\'idéal) ou une fois que bébé est né. Si bébé est là, l\'atelier suivra son rythme et vous pourrez utiliser des poupons si bébé a besoin d\'une pause.', 65, 'https://booking.myrezapp.com/uploads/services/medias/13761-74609-0-63.jpg?1193135940', 'atelier-de-portage'),
	(2, 'Consultation d\'allaitement', 'Entretien prénatal ou consultation allaitement, je suis présente tout au long de votre aventure lactée jusqu\'au sevrage et/ou à la diversification.  En tant que professionnelle de santé et de l\'allaitement, je vous accompagne pour vous préparer à accueillir votre bébé. Que vous souhaitiez allaiter, que vous préfériez le biberon ou que vous hésitiez encore, je suis là pour vous donner un maximum d\'informations. Ainsi, vous pourrez vivre sereinement votre décision et pallier à tous les petits tracas éventuels du début de vie.', 55, 'https://booking.myrezapp.com/uploads/services/medias/13761-61140-1-5.jpg', 'consultation-d-allaitement'),
	(3, 'Rituel Rebozo', 'Le Rituel dure environ 2h. Il est composé de plusieurs temps : échange et discussion, massage, sudation, resserrage des 7 points du corps. Une tisane est proposé tout au long du Rituel afin de réchauffer et détendre le corps plus en profondeur.  Quand vivre le Rituel ? Dès que vous le souhaitez ou en ressentez le besoin. Les rituels peuvent se vivre dès l\'accouchement passé. Il s\'agit de finir cette grossesse, de fermer la porte qui a permis l\'arrivée de ce nouvel être. Le corps et l\'esprit s\'ouvrent à une autre vie. Celle d\'une mère et d\'une femme...  Les contre-indications : Fièvre, phlébite, problèmes cardio-vasculaires, ostéoporose, entorse ou inflammation articulaire, problèmes de peau, trouble de la coagulation, varices, diabète, début de grossesse ou grossesse à risque... En cas de doute, n\'hésitez pas à me contacter !', 140, 'https://booking.myrezapp.com/uploads/services/medias/13761-99740-0-31.jpg', 'rituel-rebozo'),
	(5, 'Cercle mamans-bébés', 'Parce que devenir maman ce n\'est pas tous les jours rose ni facile, on peut se sentir seule et désemparée. Arriver à prendre soin de soi et ne pas s\'oublier n\'est pas évident avec une petite boule de bébé qui dépend de nous. Les cercles vous permettent de : - Sortir de votre quotidien - Partager avec d\'autres mamans - D\'évacuer ce qui doit l\'être - Penser à vous - Passer un moment fort avec votre bébé,...  Une bulle dans laquelle je vous propose plein d\'outils pour votre vie de maman, pour faire éclore votre confiance en vous en tant que femme et mère. Au fil de ces 4 rencontres, nous abordons différents thèmes selon vos envies et besoins : - Pleurs, sommeil de bébé - Développement psycho-moteur, éveil et motricité - Alimentation (de bébé et maman) - Couple, famille, reprise du travail - Maternage, post-partum Vous allez vivre un moment magique ! 🤩🥰  Vous pouvez vous offrir ce moment ou l\'offrir à une maman que vous aimez. Plus que du matériel et des conseils hasardeux, les nouveaux parents ont besoin de soutien. 🙏🙏  Le tarif est valable pour le cycle de 4 cercles (soit 20€/rencontre).', 80, 'https://booking.myrezapp.com/uploads/services/medias/13761-70612-0-69.jpg', 'cercle-mamans-bebes'),
	(6, 'dzz', 'dzdz', 5, 'https://127.0.0.1:8000/img/mignon-petit-enfant-dans-parc-ete.jpg', 'test'),
	(7, 'Le Serrage du bassin', 'Issu du Rituel Rebozo, voici un soin à effectuer le plus tôt possible après la naissance et autant de fois que nécessaire ! Le soin se compose d\'un temps d\'accueil et d\'écoute accompagné d\'une tisane du post-partum. Il est suivi de bercements tantôt dynamique et réchauffant, tantôt lent et relaxant pour permettre le relâchement du corps et de l\'esprit ! Vient ensuite le moment du serrage du bassin avec le Rebozo. Vous êtes confortablement installée, le serrage reste en place le temps qu\'il faut pour que vous puissiez fermer cette porte et en laisser une autre s\'ouvrir...  Un beau moment, symbolique et libérateur, juste pour vous après bébé !', 60, 'https://booking.myrezapp.com/uploads/services/medias/13761-29728-0-13.jpg?1903332170', 'le-serrage-du-bassin'),
	(8, 'Atelier de portage collectif', 'Venez découvrir les principes du portage physiologique ainsi que les points importants pour un portage en toute sécurité. Vous pourrez essayer différents moyens de portage pour trouver le VOTRE et vous l\'approprier. Je vous accompagne tout au long de votre découverte ou perfectionnement au portage. Vous n\'avez pas besoin de posséder un moyen de portage, si vous en avez un, n\'hésitez pas à le ramener !  L\'atelier est prévu pour 2 à 4 parents (ou couple), à partir de 6 mois de grossesse, avec ou sans bébé (poupons à disposition si bébé n\'est pas encore là ou a besoin de repos).', 30, 'https://booking.myrezapp.com/uploads/services/medias/13761-94620-0-39.jpg?1554030166', 'atelier-de-portage-collectif'),
	(10, 'Carte cadeau 50€', 'Vous cherchez un cadeau vraiment utile pour une jeune ou future Maman ?  Offrez un peu de Little Cocon. Le bon d\'une valeur de 50€ s\'utilise pour tous les accompagnements : allaitement, portage, Rebozo, cercles,...  Vous pouvez régler le bon ici. Choisissez n\'importe quelle date sur le planning, cela n\'a pas d\'importance ! Après le règlement, je vous envoie le bon cadeau par mail. La (future) Maman n\'aura plus qu\'à m\'appeler le jour où elle est prête et je verrai avec elle pour la date et les détails du soin choisi.', 50, 'https://vicpic.fr/wp-content/uploads/2020/11/Posts-Insta-24.jpg', 'carte-cadeau-50');

-- Listage de la structure de table littlecocon25. doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Listage des données de la table littlecocon25.doctrine_migration_versions : ~8 rows (environ)
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20230601135349', '2023-06-01 13:55:02', 368),
	('DoctrineMigrations\\Version20230601142945', '2023-06-01 14:31:10', 29),
	('DoctrineMigrations\\Version20230601144902', '2023-06-01 14:49:17', 88),
	('DoctrineMigrations\\Version20230603100747', '2023-06-03 10:08:05', 175),
	('DoctrineMigrations\\Version20230606074823', '2023-06-06 07:48:36', 111),
	('DoctrineMigrations\\Version20230612154256', '2023-06-12 15:43:09', 398),
	('DoctrineMigrations\\Version20230613123321', '2023-06-13 12:35:07', 99),
	('DoctrineMigrations\\Version20230613173002', '2023-06-13 17:30:09', 94);

-- Listage de la structure de table littlecocon25. messenger_messages
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

-- Listage des données de la table littlecocon25.messenger_messages : ~0 rows (environ)

-- Listage de la structure de table littlecocon25. payement
CREATE TABLE IF NOT EXISTS `payement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reservation_id` int NOT NULL,
  `montant` decimal(6,2) NOT NULL,
  `dt_payement` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B20A7885B83297E7` (`reservation_id`),
  CONSTRAINT `FK_B20A7885B83297E7` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon25.payement : ~0 rows (environ)

-- Listage de la structure de table littlecocon25. reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cours_id` int NOT NULL,
  `user_id` int NOT NULL,
  `dt_resa` datetime NOT NULL,
  `dt_cours` datetime NOT NULL,
  `payement_method` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42C849557ECF78B0` (`cours_id`),
  KEY `IDX_42C84955A76ED395` (`user_id`),
  CONSTRAINT `FK_42C849557ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`),
  CONSTRAINT `FK_42C84955A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon25.reservation : ~11 rows (environ)
INSERT INTO `reservation` (`id`, `cours_id`, `user_id`, `dt_resa`, `dt_cours`, `payement_method`) VALUES
	(1, 2, 1, '2023-06-13 16:04:50', '2023-06-15 11:30:00', 'sur place'),
	(2, 1, 1, '2023-06-13 16:06:52', '2023-06-15 11:30:00', 'sur place'),
	(3, 1, 1, '2023-06-13 23:07:02', '2023-06-17 12:00:00', 'sur place'),
	(4, 3, 1, '2023-06-13 23:07:41', '2023-06-30 18:00:00', 'sur place'),
	(5, 3, 1, '2023-06-14 07:59:37', '2023-06-26 13:00:00', 'sur place'),
	(6, 5, 1, '2023-06-14 13:11:21', '2023-06-09 12:00:00', 'sur place'),
	(7, 2, 1, '2023-07-09 14:40:50', '2023-07-14 15:00:00', 'sur place'),
	(9, 1, 1, '2023-07-09 15:18:12', '2023-07-10 18:00:00', 'payment-online'),
	(10, 1, 1, '2023-07-09 15:19:17', '2023-07-20 15:00:00', 'payment-online'),
	(11, 1, 1, '2023-07-09 15:19:47', '2023-07-20 16:00:00', 'payment-on-site'),
	(12, 3, 1, '2023-07-09 15:20:16', '2023-07-20 16:00:00', 'payment-online'),
	(13, 1, 1, '2023-08-24 20:04:21', '2023-08-25 18:00:00', 'payment-online'),
	(16, 2, 1, '2023-09-13 22:33:45', '2023-09-08 15:00:00', 'payment-online');

-- Listage de la structure de table littlecocon25. reset_password_request
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon25.reset_password_request : ~1 rows (environ)

-- Listage de la structure de table littlecocon25. unavailable_date
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon25.unavailable_date : ~5 rows (environ)
INSERT INTO `unavailable_date` (`id`, `course_id`, `all_courses`, `date`, `all_day`, `slot`) VALUES
	(1, 2, 1, '2023-06-14', 1, NULL),
	(2, 1, 1, '2023-07-09', 1, NULL),
	(3, NULL, 1, '2023-06-21', 1, NULL),
	(4, NULL, 1, '2023-06-28', 1, NULL),
	(6, NULL, 1, '2023-05-31', 1, NULL),
	(7, 3, 0, '2023-06-30', 0, '09:00:00');

-- Listage de la structure de table littlecocon25. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table littlecocon25.user : ~5 rows (environ)
INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `pseudo`) VALUES
	(1, 'littlecocon@gmail.com', '["ROLE_ADMIN"]', '$2y$13$cJqpk4OXyyneMBFKk7RZ3esA1MZlH8ySzTU6tRosncwk7jO0pBs3m', 1, 'Guillaume'),
	(2, 'user@gmail.com', '["ROLE_USER"]', '$2y$13$JRK332Byb4uvsK/EafzlGuxSbtOtyQv1vGn7wLqsQa4FGVILKADYS', 1, 'User'),
	(3, 'test@outlook.fr', '["ROLE_USER"]', '$2y$13$HCXVF5Za9N.ZigXhREPPRe1gtPKSkVg9o6cD0leOw2lv7CddDgMJC', 1, 'test'),
	(4, 'doe@gmail.com', '["ROLE_USER"]', '$2y$13$OUSJRe3tTu6UocH/QZoxkO/DWj3FxR8AL84mRZwminAe0mb5DHqze', 0, 'john'),
	(5, 'testfinal@gmail.fr', '["ROLE_USER"]', '$2y$13$dohf32/7lEYT7.rswxiwEOlApTSovlphqzBnR0xydAO0MjkoI1VfO', 1, 'testfinal');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
