-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 20 Décembre 2019 à 09:54
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mangactus`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `commentaires` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_manga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `idcontact` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactcomm` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcontact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`idcontact`, `pseudo`, `email`, `contactcomm`, `date`) VALUES
(0, 'pseudotest', 'test@test.test', 'je suis un test de ouf', '2019-12-16 15:20:52');

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE IF NOT EXISTS `galerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `imgpath` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comms` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `motdepasse` varchar(100) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tokencode` varchar(100) NOT NULL,
  `userStatus` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`id`, `email`, `motdepasse`, `pseudo`, `date`, `tokencode`, `userStatus`) VALUES
(8, 'test@test.be', '202cb962ac59075b964b07152d234b70', 'test', '2019-12-13 11:14:34', '2431246764352e7055312e247141356c504371573561716b4a6d664f4644726f742e', ''),
(9, 'test2@test.be', '202cb962ac59075b964b07152d234b70', 'te', '2019-12-13 13:02:55', '2431244b43342e4c67322e244a713237736f672e4c6572427035652f45455969682f', ''),
(10, 'test3@test.test', '202cb962ac59075b964b07152d234b70', 'ui', '2019-12-13 13:06:11', '2431243267302e6858312e24534c56587878366b75666e384b4c755a445755584f2e', ''),
(11, 'test4@test.test', '202cb962ac59075b964b07152d234b70', 'test4', '2019-12-13 14:36:13', '2431244f65322e397a332e2442796d6b5a59775a572e6a484c6c54624a3149465730', ''),
(12, 'test5@test.test', '202cb962ac59075b964b07152d234b70', 'test5', '2019-12-13 14:37:34', '243124614e352e6271302e2459717762324e594a7142645477513049453577505631', ''),
(13, 'test6@test.test', '202cb962ac59075b964b07152d234b70', 'test6', '2019-12-13 14:38:34', '2431246d392f2e3170352e24327a685161326a486661576277364945584868376b2f', ''),
(14, 'test7@test.test', '202cb962ac59075b964b07152d234b70', 'test7', '2019-12-13 14:39:40', '243124796b342e5465302e2432587a4154394c6347694249674b795677574b756131', ''),
(15, 'test8@test.test', '202cb962ac59075b964b07152d234b70', 'test8', '2019-12-13 14:41:54', '24312438742e2e7634332e2442456e79613744473636633937383130752e3356652f', ''),
(16, 'test9@test.test', '202cb962ac59075b964b07152d234b70', 'test9', '2019-12-13 14:48:47', '2431244d50352e6c632f2e245632366a48386e316572754f6f63335563744a646f2e', ''),
(17, 'test10@test.test', '202cb962ac59075b964b07152d234b70', 'test10', '2019-12-13 14:51:09', '2431244f712f2e3950312e24316c4a38644a574233424c6c646f2e4c3652706e352f', ''),
(18, 'test11@test.com', '202cb962ac59075b964b07152d234b70', 'test11', '2019-12-13 14:53:00', '2431246375332e2f72302e247271786e416864314b57526650677a30726c37364a31', ''),
(19, 'test12@test.com', '202cb962ac59075b964b07152d234b70', 'test12', '2019-12-13 14:54:46', '243124615a352e6247352e24454a5a4f6c57384c422f4569314a764746624f686e31', ''),
(20, 'test13@test.com', '202cb962ac59075b964b07152d234b70', 'test13', '2019-12-13 14:58:49', '2431246d4c322e3146312e24485232507447423135387337572f587a70652e75472e', ''),
(21, 'test14@test.com', '202cb962ac59075b964b07152d234b70', 'test14', '2019-12-13 15:07:15', '2431247977322e5434332e246343392f6f74776a493943355357786657643859572e', ''),
(22, 'test15@test.test', '202cb962ac59075b964b07152d234b70', 'test15', '2019-12-13 15:50:40', '2431242e762f2e7454322e247444316372654573647950313758383675594d437430', ''),
(23, 'test16@test.test', '202cb962ac59075b964b07152d234b70', 'test16', '2019-12-13 15:53:50', '2431247941312e544b342e246a6a57763433506d6a7a717862475949344547476430', ''),
(24, 'test17@test.com', '202cb962ac59075b964b07152d234b70', 'testouille', '2019-12-13 15:59:20', '243124326c352e6832332e2444656e4f694d6e2e4e715645632f4f436e7172574d30', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
