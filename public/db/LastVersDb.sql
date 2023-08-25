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

-- Listage des données de la table littlecocon2.cours : ~8 rows (environ)
INSERT INTO `cours` (`id`, `nom_cours`, `description`, `prix`, `image`, `slug_cours`) VALUES
	(1, 'Atelier de portage découverte', 'Je me déplace à votre domicile pour vous faire découvrir les principes du portage physiologique ainsi que les points importants pour un portage en toute sécurité.\r\n<br><br>\r\nJe possède un grand nombre de moyens de portage différents, vous pourrez essayer ceux qui vous parlent le plus pour trouver le <span> VOTRE </span> et vous l\'approprier. \r\nJe vous accompagne de manière personnalisée et approfondie tout au long de votre découverte ou perfectionnement au portage. Vous n\'avez pas besoin de posséder un moyen de portage, mais si vous en avez un, nous verrons comment l\'utiliser au mieux !  \r\nJe prends tout le temps dont vous avez besoin et réponds à toutes vos questions. \r\n<br><br>\r\nL\'atelier peut avoir lieu pendant la grossesse à partir de 7 mois (c\'est l\'idéal) ou une fois que bébé est né. \r\nSi bébé est là, l\'atelier suivra son rythme et vous pourrez utiliser des poupons si bébé a besoin d\'une pause ! &#128521', 65, 'https://booking.myrezapp.com/uploads/services/medias/13761-74609-0-63.jpg?1193135940', 'atelier-de-portage'),
	(2, 'Consultation d\'allaitement', 'Que vous ayez besoin d\'un entretien prénatal ou de consultations allaitements, je suis présente tout au long de votre aventure lactée jusqu\'au sevrage et/ou à la diversification.  \r\nEn tant que professionnelle de santé et de l\'allaitement, je vous accompagne pour vous préparer à accueillir votre bébé. \r\n<br><br>\r\nTout ne va pas toujours de soit et ne se met pas en place tout seul, par instinct. Que vous souhaitiez allaiter, que vous préfériez le biberon ou que vous hésitiez encore, je suis là pour vous donner un maximum d\'informations.\r\n<br><br>\r\nAinsi, vous pourrez vivre sereinement votre décision et pallier à tous les petits tracas éventuels du début de vie, pour le bébé mais aussi pour vous.', 55, 'https://booking.myrezapp.com/uploads/services/medias/13761-61140-1-5.jpg', 'consultation-d-allaitement'),
	(3, 'Rituel Rebozo', 'Le Rituel dure environ 2h. Il est composé de plusieurs étapes : échange et discussion, massage, sudation, resserrage des 7 points du corps. \r\nUne tisane est proposé tout au long du Rituel afin de réchauffer et détendre le corps plus en profondeur.  \r\n<br><br>\r\n<span>Quand vivre le Rituel ? </span>\r\n<br>Dès que vous le souhaitez ou en ressentez le besoin. Les rituels peuvent se vivre dès l\'accouchement passé ou plus tard. \r\nIl s\'agit de finir cette grossesse, de fermer la porte qui a permis l\'arrivée de ce nouvel être. Le corps et l\'esprit s\'ouvrent à une autre vie. \r\nCelle d\'une mère et d\'une femme...  \r\n<br><br>\r\n<span>Les contre-indications : </span> \r\n<br>Fièvre, phlébite, problèmes cardio-vasculaires, ostéoporose, entorse ou inflammation articulaire, problèmes de peau, \r\ntrouble de la coagulation, varices, diabète, début de grossesse ou grossesse à risque... \r\n<br><br>\r\nEn cas de doute, n\'hésitez pas à me contacter !', 140, 'https://booking.myrezapp.com/uploads/services/medias/13761-99740-0-31.jpg', 'rituel-rebozo'),
	(5, 'Cercle mamans-bébés', 'Parce que devenir maman ce n\'est pas tous les jours rose ni facile, on peut se sentir seule et désemparée. \r\nArriver à prendre soin de soi et ne pas s\'oublier n\'est pas évident avec une petite boule de bébé qui dépend de nous. \r\nLes cercles vous permettent de : <br>\r\n- Sortir de votre quotidien  <br>\r\n- Partager avec d\'autres mamans  <br>\r\n- D\'évacuer ce qui doit l\'être etc..  <br><br>\r\nUne bulle dans laquelle je vous propose plein d\'outils pour votre vie de maman, pour faire éclore votre confiance en vous en tant que femme et mère. \r\nAu fil de ces 4 rencontres, nous abordons différents thèmes selon vos envies et besoins : <br>\r\n- Pleurs, sommeil de bébé - Développement psycho-moteur, éveil et motricité <br>\r\n- Alimentation (de bébé et maman) <br>\r\n- Couple, famille, reprise du travail <br>\r\n- Maternage, post-partum Vous allez vivre un moment magique ! 🤩🥰 <br> <br>\r\nPlus que du matériel et des conseils hasardeux, les nouveaux parents ont besoin de soutien. 🙏🙏  <br><br>\r\nLe tarif est valable pour le cycle de 4 cercles (soit 20€/rencontre).', 80, 'https://booking.myrezapp.com/uploads/services/medias/13761-70612-0-69.jpg', 'cercle-mamans-bebes'),
	(7, 'Le Serrage du bassin', 'Variante du Rituel Rebozo, voici un soin à effectuer le plus tôt possible après la naissance et autant de fois que nécessaire ! \r\n<br>\r\nLe soin se compose d\'un temps d\'accueil et d\'écoute accompagné d\'une tisane du post-partum. \r\n<br><br>\r\nIl est suivi de bercements tantôt dynamique et réchauffant 🔥, tantôt lent et relaxant pour permettre le relâchement du corps et de l\'esprit ! \r\n<br><br>\r\nVient ensuite le moment du serrage du bassin avec le Rebozo. \r\nVous êtes confortablement installée, le serrage reste en place le temps qu\'il faut pour que vous puissiez fermer cette porte et en laisser une autre s\'ouvrir... \r\n<br><br> \r\nUn beau moment, symbolique et libérateur, juste pour vous après bébé !', 60, 'https://booking.myrezapp.com/uploads/services/medias/13761-29728-0-13.jpg?1903332170', 'rituel-rebozo'),
	(8, 'Atelier de portage collectif', 'Venez découvrir les principes du portage physiologique ainsi que les points importants pour un portage en toute sécurité. Vous pourrez essayer différents moyens de portage pour trouver le VOTRE et vous l\'approprier. Je vous accompagne tout au long de votre découverte ou perfectionnement au portage. Vous n\'avez pas besoin de posséder un moyen de portage, si vous en avez un, n\'hésitez pas à le ramener !  L\'atelier est prévu pour 2 à 4 parents (ou couple), à partir de 6 mois de grossesse, avec ou sans bébé (poupons à disposition si bébé n\'est pas encore là ou a besoin de repos).', 30, 'https://booking.myrezapp.com/uploads/services/medias/13761-94620-0-39.jpg?1554030166', 'atelier-de-portage'),
	(10, 'Carte cadeau 50€', 'Vous cherchez un cadeau vraiment utile pour une jeune ou future Maman ?  Offrez un peu de Douceur de lune. Le bon d\'une valeur de 50€ s\'utilise pour tous les accompagnements : allaitement, portage, Rebozo, cercles,...  Vous pouvez régler le bon ici. Choisissez n\'importe quelle date sur le planning, cela n\'a pas d\'importance ! Après le règlement, je vous envoie le bon cadeau par mail. La (future) Maman n\'aura plus qu\'à m\'appeler le jour où elle est prête et je verrai avec elle pour la date et les détails du soin choisi.', 50, 'https://vicpic.fr/wp-content/uploads/2020/11/Posts-Insta-24.jpg', 'carte-cadeau-50'),
	(12, 'Test', 'Test test', 12, 'https://www.regardauteur.com/fr/photos/view/68659/870x0/5ead98d47d0e6ad5f6f0d4f154024c94.jpg', 'test-cours');

-- Listage des données de la table littlecocon2.doctrine_migration_versions : ~8 rows (environ)
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20230601135349', '2023-06-01 13:55:02', 368),
	('DoctrineMigrations\\Version20230601142945', '2023-06-01 14:31:10', 29),
	('DoctrineMigrations\\Version20230601144902', '2023-06-01 14:49:17', 88),
	('DoctrineMigrations\\Version20230603100747', '2023-06-03 10:08:05', 175),
	('DoctrineMigrations\\Version20230606074823', '2023-06-06 07:48:36', 111),
	('DoctrineMigrations\\Version20230612154256', '2023-06-12 15:43:09', 398),
	('DoctrineMigrations\\Version20230613123321', '2023-06-13 12:35:07', 99),
	('DoctrineMigrations\\Version20230613173002', '2023-06-13 17:30:09', 94);

-- Listage des données de la table littlecocon2.messenger_messages : ~0 rows (environ)

-- Listage des données de la table littlecocon2.payement : ~0 rows (environ)

-- Listage des données de la table littlecocon2.reservation : ~19 rows (environ)
INSERT INTO `reservation` (`id`, `cours_id`, `user_id`, `dt_resa`, `dt_cours`, `payement_method`) VALUES
	(7, 1, 1, '2023-06-15 14:53:31', '2023-06-10 14:30:00', 'sur place'),
	(8, 5, 1, '2023-06-15 15:52:05', '2023-06-24 15:00:00', 'sur place'),
	(9, 1, 1, '2023-06-15 23:04:52', '2023-06-10 11:30:00', 'sur place'),
	(32, 2, 1, '2023-07-16 13:24:56', '2023-07-29 15:00:00', 'payment-online'),
	(38, 5, 1, '2023-08-01 07:50:25', '2023-08-10 14:00:00', 'payment-sur-place'),
	(39, 2, 1, '2023-08-01 07:55:11', '2023-08-24 13:00:00', 'payment-online'),
	(40, 2, 1, '2023-08-02 08:28:10', '2023-08-16 15:00:00', 'payment-online'),
	(41, 2, 1, '2023-08-02 08:29:19', '2023-08-16 15:30:00', 'payment-online'),
	(46, 1, 1, '2023-08-03 08:27:30', '2023-08-28 15:30:00', 'payment-online'),
	(47, 1, 1, '2023-08-03 08:29:21', '2023-08-23 13:00:00', 'payment-online'),
	(48, 1, 1, '2023-08-09 19:44:42', '2023-08-24 15:00:00', 'payment-online'),
	(49, 1, 1, '2023-08-21 09:10:08', '2023-08-17 15:00:00', 'payment-online'),
	(50, 3, 1, '2023-08-22 07:57:34', '2023-08-23 17:00:00', 'payment-online'),
	(51, 3, 1, '2023-08-22 08:10:06', '2023-08-24 15:00:00', 'payment-online'),
	(52, 1, 1, '2023-08-23 07:13:24', '2023-08-31 15:00:00', 'payment-online'),
	(53, 1, 1, '2023-08-23 07:14:22', '2023-08-30 16:00:00', 'payment-sur-place'),
	(54, 1, 1, '2023-08-23 07:29:30', '2023-08-31 16:00:00', 'payment-online'),
	(55, 1, 1, '2023-08-24 13:11:16', '2023-08-23 15:00:00', 'payment-online'),
	(56, 3, 1, '2023-08-24 13:42:13', '2023-08-25 15:00:00', 'payment-online');

-- Listage des données de la table littlecocon2.reset_password_request : ~0 rows (environ)

-- Listage des données de la table littlecocon2.unavailable_date : ~0 rows (environ)
INSERT INTO `unavailable_date` (`id`, `course_id`, `all_courses`, `date`, `all_day`, `slot`) VALUES
	(1, NULL, 1, '2023-06-30', 1, NULL),
	(3, NULL, 1, '2023-06-21', 1, NULL),
	(4, NULL, 1, '2023-06-28', 1, NULL),
	(6, NULL, 1, '2023-05-31', 1, NULL),
	(7, 3, 0, '2023-07-05', 1, '09:00:00'),
	(15, NULL, 1, '2023-06-10', 1, NULL),
	(19, NULL, 1, '2023-06-29', 1, NULL),
	(21, NULL, 1, '2023-07-17', 1, NULL),
	(22, NULL, 1, '2023-07-20', 1, NULL),
	(23, 2, 0, '2023-07-27', 0, '15:00:00'),
	(24, NULL, 1, '2023-08-20', 1, NULL),
	(25, 3, 0, '2023-07-22', 0, '15:00:00'),
	(26, 2, 1, '2023-08-22', 0, '10:00:00');

-- Listage des données de la table littlecocon2.user : ~3 rows (environ)
INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `pseudo`) VALUES
	(1, 'littlecocon@gmail.com', '["ROLE_ADMIN"]', '$2y$13$A5UfZHtJ8Qc1VZ57mU3X2.4iCkHJ3Z3Ef.yZ9eQG7P5tQy6DH6f3.', 1, 'Zicka'),
	(2, 'user@gmail.com', '["ROLE_USER"]', '$2y$13$JRK332Byb4uvsK/EafzlGuxSbtOtyQv1vGn7wLqsQa4FGVILKADYS', 1, 'User'),
	(9, 'Zicka@zicka.com', '["ROLE_USER"]', '$2y$13$6g7P7giqXLOgcHSRers8geIPXFq/72lDLm/RX4jmaE0WtQiMobYWC', 0, 'Zicka67');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
