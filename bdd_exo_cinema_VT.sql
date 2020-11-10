-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for exercice_cinema_vt
CREATE DATABASE IF NOT EXISTS `exercice_cinema_vt` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `exercice_cinema_vt`;

-- Dumping structure for table exercice_cinema_vt.acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_acteur` varchar(255) NOT NULL,
  `prenom_acteur` varchar(255) NOT NULL,
  `sexe` char(1) NOT NULL,
  `date_naissance` date NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table exercice_cinema_vt.acteur: ~15 rows (approximately)
/*!40000 ALTER TABLE `acteur` DISABLE KEYS */;
INSERT INTO `acteur` (`id_acteur`, `nom_acteur`, `prenom_acteur`, `sexe`, `date_naissance`) VALUES
	(1, 'Hanks', 'Tom', 'H', '1956-07-09'),
	(2, 'Sinise', 'Garry', 'H', '1955-03-17'),
	(8, 'Wright', 'Robin', 'F', '1966-04-08'),
	(9, 'Neeson', 'Liam', 'H', '1952-06-07'),
	(10, 'Damon', 'Matt', 'H', '1970-10-08'),
	(11, 'Brando', 'Marlone', 'H', '1924-04-03'),
	(12, 'Cavill', 'Henry', 'H', '1983-05-05'),
	(13, 'Washington', 'Denzel', 'H', '1954-12-28'),
	(14, 'Grace Moretz', 'Chloé', 'F', '1997-02-10'),
	(15, 'Freeman', 'Martin', 'H', '1971-09-08'),
	(16, 'McGregor', 'Ewan', 'H', '1971-03-31'),
	(17, 'Chase', 'Chevy', 'H', '1943-10-08'),
	(18, 'Campbell', 'Bruce', 'H', '1958-06-22'),
	(19, 'Eastwood', 'Clint', 'H', '1930-05-31'),
	(20, 'Vang', 'Bee', 'H', '1991-11-04');
/*!40000 ALTER TABLE `acteur` ENABLE KEYS */;

-- Dumping structure for table exercice_cinema_vt.appartient
CREATE TABLE IF NOT EXISTS `appartient` (
  `id_genre` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  PRIMARY KEY (`id_genre`,`id_film`),
  KEY `appartient_Film0_FK` (`id_film`),
  CONSTRAINT `appartient_Film0_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `appartient_Genre_FK` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table exercice_cinema_vt.appartient: ~25 rows (approximately)
/*!40000 ALTER TABLE `appartient` DISABLE KEYS */;
INSERT INTO `appartient` (`id_genre`, `id_film`) VALUES
	(5, 1),
	(7, 1),
	(8, 1),
	(6, 8),
	(9, 8),
	(10, 9),
	(11, 9),
	(7, 10),
	(8, 10),
	(12, 11),
	(13, 12),
	(14, 13),
	(5, 14),
	(7, 14),
	(6, 15),
	(6, 16),
	(6, 17),
	(5, 18),
	(15, 18),
	(8, 19),
	(16, 19),
	(17, 19),
	(8, 20),
	(18, 20),
	(7, 21);
/*!40000 ALTER TABLE `appartient` ENABLE KEYS */;

-- Dumping structure for table exercice_cinema_vt.casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_role`),
  KEY `casting_Acteur0_FK` (`id_acteur`),
  KEY `casting_Role1_FK` (`id_role`),
  CONSTRAINT `casting_Acteur0_FK` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `casting_Film_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_Role1_FK` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table exercice_cinema_vt.casting: ~18 rows (approximately)
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
INSERT INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 6),
	(8, 1, 7),
	(1, 2, 9),
	(1, 8, 8),
	(9, 9, 10),
	(10, 10, 11),
	(11, 11, 12),
	(12, 12, 13),
	(13, 13, 14),
	(14, 14, 15),
	(15, 15, 16),
	(16, 15, 16),
	(17, 15, 16),
	(18, 16, 17),
	(19, 17, 18),
	(20, 18, 19),
	(21, 19, 20),
	(21, 20, 21);
/*!40000 ALTER TABLE `casting` ENABLE KEYS */;

-- Dumping structure for table exercice_cinema_vt.film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `annee` int(11) NOT NULL,
  `synopsis` text NOT NULL,
  `duree` int(11) NOT NULL DEFAULT '0',
  `affiche` varchar(255) NOT NULL,
  `note` float NOT NULL DEFAULT '0',
  `id_real` int(11) NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `Film_Realisateur_FK` (`id_real`),
  CONSTRAINT `Film_Realisateur_FK` FOREIGN KEY (`id_real`) REFERENCES `realisateur` (`id_real`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table exercice_cinema_vt.film: ~15 rows (approximately)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre`, `annee`, `synopsis`, `duree`, `affiche`, `note`, `id_real`) VALUES
	(1, 'Forrest gump', 1994, 'Au fil des différents interlocuteurs qui viennent s\'asseoir tour à tour à côté de lui sur un banc, Forrest Gump raconte la fabuleuse histoire de sa vie. Sa vie est à l\'image d\'une plume qui se laisse porter par le vent, tout comme Forrest se laisse porter par les événements qu\'il traverse dans l\'Amérique de la seconde moitié du 20e siècle.', 140, 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcT0NxVrYdi8Ro5zRnIbewaT_uCOl5_2uhxxyQoU6s9gOfEDovGi', 4.6, 1),
	(8, 'La ligne verte', 2000, 'Paul Edgecomb, pensionnaire centenaire d\'une maison de retraite, est hanté par ses souvenirs. Gardien-chef du pénitencier de Cold Mountain, en 1935, en Louisiane, il était chargé de veiller au bon déroulement des exécutions capitales au bloc E (la ligne verte) en s\'efforçant d\'adoucir les derniers moments des condamnés. Parmi eux se trouvait un colosse du nom de John Coffey, accusé du viol et du meurtre de deux fillettes.', 189, 'https://fr.web.img4.acsta.net/medias/nmedia/18/66/15/78/19254683.jpg', 4.6, 6),
	(9, 'La liste de Schindler', 1994, 'Les Allemands, victorieux de la Pologne, regroupent les Juifs dans des ghettos dans le but de s\'en servir comme main d\'oeuvre bon marché. Oskar Schindler, industriel et bon vivant, rachète pour une bouchée de pain une fabrique d\'ustensiles de cuisine.', 195, 'https://fr.web.img6.acsta.net/pictures/19/03/14/10/37/5927961.jpg', 4.5, 7),
	(10, 'Will Hunting', 1997, 'Will Hunting est un authentique génie mais également un rebelle aux élans imprévisibles. Il est né dans le quartier populaire de South Boston et a arrêté très tôt ses études, refusant le brillant avenir que pouvait lui procurer son intelligence. Il vit désormais entouré d\'une bande de copains et passe son temps dans les bars a chercher la bagarre. C\'est alors que ses dons prodigieux en mathématiques attirent l\'attention du professeur Lambeau, du Massachusetts Institute of Technology.', 126, 'https://fr.web.img4.acsta.net/medias/00/05/30/000530_af.jpg', 4.2, 8),
	(11, 'Le parrain', 1972, 'A New York, à la fin des années 70. Michael Corleone est parvenu à reconvertir les nombreuses affaires de la famille dans des secteurs parfaitement légaux. Il a multiplié les dons à l\'Eglise et s\'est attiré les bonnes grâces de l\'archevêque Gilday, directeur de la banque du Vatican. Gilday, au bout du rouleau, lui demande alors une forte avance. Michael accepte, en échange du contrôle d\'une société immobilière dont le Vatican possède une part importante.', 175, 'https://fr.web.img4.acsta.net/medias/nmedia/18/35/57/73/18660716.jpg', 4.6, 9),
	(12, 'Man of Steel', 2018, 'Un petit garçon découvre qu\'il possède des pouvoirs surnaturels et qu\'il n\'est pas né sur Terre. Plus tard, il s\'engage dans un périple afin de comprendre d\'où il vient et pourquoi il a été envoyé sur notre planète mais il devra devenir un héros s\'il veut sauver le monde de la destruction totale et incarner l\'espoir pour toute l\'humanité.', 143, 'https://images-na.ssl-images-amazon.com/images/I/51OrrZRXTvL._AC_.jpg', 3.9, 10),
	(13, 'Equalizer', 2014, 'McCall a abandonné un passé mystérieux pour se refaire une nouvelle vie sans histoire. Lorsque McCall rencontre Teri, une jeune femme contrôlée par de violents gangsters russes, il doit l\'aider. Armé de talents cachés, McCall retrouve son désir ardent de justice et de vengeance contre ceux qui brutalisent les innocents. Si quelqu\'un a un problème, si les chances s\'accumulent contre lui, s\'il n\'a aucun autre recours, McCall sera là. Il est Le justicier.', 132, 'https://fr.web.img5.acsta.net/pictures/14/08/28/16/00/452053.jpg', 4.3, 11),
	(14, 'Si je reste', 2014, 'À Portland, sur la côte ouest des États-Unis, la famille Hall mène une vie heureuse. Le père, ancien musicien punk, et la mère, ancienne groupie, sont devenus des parents poules de deux enfants eux aussi musiciens passionnés. À 17 ans, leur fille Mia est une violoncelliste prometteuse, son petit frère rêve, lui, de devenir batteur. Si elle veut poursuivre ses études musicales, Mia devra quitter sa ville natale.', 106, 'https://fr.web.img5.acsta.net/pictures/14/08/29/12/58/542031.jpg', 4, 12),
	(15, 'Le Hobbit : Un voyage inattendu', 2012, 'Bilbon n\'est plus tout jeune et décide d\'entamer la rédaction de ses Mémoires ; il commence par faire le récit de l\'aventure qu\'il vécut quelque soixante ans plus tôt. Il se remémore notamment, alors qu\'il profitait paisiblement de sa journée, l\'arrivée du sorcier Gandalf. Ce dernier avait vu en lui la personne capable d\'aider des nains barbus à retrouver leur trésor volé par le terrifiant dragon Smaug.', 169, 'https://fr.web.img6.acsta.net/medias/nmedia/18/93/43/35/20273834.jpg', 4.9, 13),
	(16, 'Le hobbit : La désolation de Smaug', 2013, 'Les aventures de Bilbon Sacquet, paisible hobbit, qui sera entraîné, lui et une compagnie de Nains, par le magicien Gandalf pour récupérer le trésor détenu par le dragon Smaug. Au cours de ce périple, il mettra la main sur l\'anneau de pouvoir que possédait Gollum.', 161, 'https://fr.web.img4.acsta.net/pictures/210/552/21055250_20131106114016251.jpg', 4.9, 13),
	(17, 'Le hobbit : La bataille des Cinq Armées', 2014, 'Atteignant enfin la Montagne Solitaire, Thorin et les Nains, aidés par Bilbon le Hobbit, ont réussi à récupérer leur royaume et leur trésor. Ils ont également réveillé le dragon Smaug qui déchaîne désormais sa colère sur les habitants de Lac-ville. A présent, les Nains, les Elfes, les Humains mais aussi les Wrags et les Orques menés par le Nécromancien, convoitent les richesses de la Montagne Solitaire.', 144, 'https://fr.web.img3.acsta.net/pictures/14/11/14/17/43/568445.jpg', 4.9, 13),
	(18, 'Moulin rouge', 2001, 'A la fin du XIXe siècle, dans le Paris de la Belle Epoque, Christian, un jeune poète désargenté, s\'installe dans le quartier de Montmartre et découvre un univers où se mêlent sexe, drogue et french cancan, mais se rebelle contre ce milieu décadent en menant une vie de bohème. Il rêve d\'écrire une grande pièce, et le peintre Henri de Toulouse-Lautrec est prêt à lui donner sa chance.', 127, 'https://fr.web.img2.acsta.net/medias/nmedia/00/02/25/85/69216008_af.jpg', 4.5, 14),
	(19, 'Trois amigos !', 1986, 'À Mexico en 1916, Carmen, accompagnée de Rodrigo, venus d\'un petit village du nom de Santo Poco, demandent de l\'aide dans un bar, afin de chasser El Guapo, qui les tyrannise. Le seul volontaire qui se présente ne s\'intéresse qu\'aux beaux yeux de Carmen. S\'enfuyant du bar, Carmen et Rodrigo se retrouvent dans une église, où sur un écran, elle aperçoit trois justiciers en action qui viennent en aide à un petit village en y chassant des bandits. Carmen décide de leur envoyer un télégramme.', 98, 'https://img7.cdn.cinoche.com/images/0ee57fa5331287d3556d708123f1e993.jpg', 1.2, 15),
	(20, 'Evil dead 2', 1987, 'Ash et Linda retournent dans la cabane où, quatre ans plus tôt, ils avaient été attaqués par les démons qui hantaient les bois environnants.', 85, 'https://img-4.linternaute.com/1QDkey_o4Z0GIKYJ8_rfd3eJAus=/1240x/a2a2338ca81b4304bef66e1f3290f56e/ccmcms-linternaute/34977.jpg', 0.3, 16),
	(21, 'Gran Torino', 2008, 'Walt Kowalski, un vétéran de la guerre de Corée, vient de perdre sa femme. Seul, misanthrope, bougon et raciste, il veille jalousement sur sa Ford Gran Torino, râlant sans cesse contre les habitants de son quartier, en majorité d\'origine asiatique. Un jour, son jeune voisin, Tao, tente de lui voler sa voiture sous la pression d\'un gang. Walt s\'aperçoit bientôt que l\'adolescent est littéralement harcelé par les jeunes caïds. Prenant la défense de Tao, Walt devient malgré lui le héros du quartier.', 112, 'https://fr.web.img6.acsta.net/medias/nmedia/18/67/90/93/19057560.jpg', 4.9, 17);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Dumping structure for table exercice_cinema_vt.genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table exercice_cinema_vt.genre: ~14 rows (approximately)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(5, 'Romance'),
	(6, 'Fantastique'),
	(7, 'Drame'),
	(8, 'Comedie'),
	(9, 'Policier'),
	(10, 'Historique'),
	(11, 'Guerre'),
	(12, 'Gangster'),
	(13, 'Super-heros'),
	(14, 'Action'),
	(15, 'Musical'),
	(16, 'Western'),
	(17, 'Aventure'),
	(18, 'Horreur');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Dumping structure for table exercice_cinema_vt.realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_real` int(11) NOT NULL AUTO_INCREMENT,
  `nom_realisateur` varchar(255) NOT NULL,
  `prenom_realisateur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_real`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table exercice_cinema_vt.realisateur: ~13 rows (approximately)
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`id_real`, `nom_realisateur`, `prenom_realisateur`) VALUES
	(1, 'Zemeckis', 'Robert'),
	(6, 'Darabont', 'Franck'),
	(7, 'Spielberg', 'Steven'),
	(8, 'Van Sant', 'Gus'),
	(9, 'Ford Coppola', 'Francis'),
	(10, 'Snyder', 'Zack'),
	(11, 'Fuqua', 'Antoine'),
	(12, 'Cutler', 'R.J'),
	(13, 'Jackson', 'Peter'),
	(14, 'Luhrmann', 'Baz'),
	(15, 'Landis', 'John'),
	(16, 'Raimi', 'Sam'),
	(17, 'Eastwood', 'Clint');
/*!40000 ALTER TABLE `realisateur` ENABLE KEYS */;

-- Dumping structure for table exercice_cinema_vt.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table exercice_cinema_vt.role: ~16 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(6, 'Forrest Gump'),
	(7, 'Paul Edgecomb'),
	(8, 'Jennifer Curran'),
	(9, 'Lieutenant Dan Taylot'),
	(10, 'Oskar Schindler'),
	(11, 'Will Hunting'),
	(12, 'Don Vito Corleonne'),
	(13, 'Clark-Kent'),
	(14, 'Robert McCall'),
	(15, 'Mia Hall'),
	(16, 'Sacquet Bilbon'),
	(17, 'Christian'),
	(18, 'Dusty Bottoms'),
	(19, 'Williams Ash'),
	(20, 'Walt Kowalski'),
	(21, 'Thao');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
