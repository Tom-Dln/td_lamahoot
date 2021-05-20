-- Foreign key



--
-- database creation 
--

DROP DATABASE IF EXISTS `lamahoot` ;

CREATE DATABASE `lamahoot` CHARACTER SET utf8;

USE `lamahoot`; 

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `questions`
--


CREATE TABLE `questions`(
    `question_id` INT(11) NOT NULL,
    `culture` VARCHAR(150) NOT NULL,
    `theme_id` INT(11) NOT NULL,
    `type` INT(11) NOT NULL,
    `question_name` VARCHAR(150) NOT NULL,
    `answer_1` VARCHAR(150) NOT NULL,
    `answer_2` VARCHAR(150) NOT NULL,
    `answer_3` VARCHAR(150) NOT NULL,
    `answer_4` VARCHAR(150) NOT NULL,
    `right_answer` INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Remplissage du tableau `questions`
--

INSERT INTO `questions` (`question_id`, `culture`, `theme_id`, `type`, `question_name` , `answer_1` ,`answer_2` ,`answer_3` ,`answer_4` ,`right_answer` ) VALUES
(1,'Culture japonaise',1,2,'Combien de temps a durée l''époque Edo  ','500 ans','265 ans','345 ans','425 ans',2),
(2,'Culture japonaise',1,2,'Quelle est la significaiton du mot « ronin » ?','un ninja déserteur','maître bouddhiste','un samouraï sans maître','le chef des armées',3),
(3,'Culture japonaise',2,2,'Combien d''îles principales y a-t-il au Culture japonaise ?','7','3','5','4',4),
(4,'Culture japonaise',2,2,'Le Culture japonaise est surtout constitué d''un relief  ?','Plaine','Plateau','Montagne','NULL',3),
(5,'Culture japonaise',3,2,'Quel est le sport national au Culture japonaise ?','Sumo','Ping-pong','Judo','Kendo',1),
(6,'Culture japonaise',3,2,'Qu''est-ce qu''un « onsen » ?','un jaccuzi en pleine nature','un bain thermal','le nom d''une rivière','une piscine',2),
(7,'Culture japonaise',4,2,'Au Culture japonaise la cérémonie du thé est tout un art comment l''appelle-t-on ?','Ukiyo-e','Chanoyu','Ikebana','Ikataku',2),
(8,'Culture japonaise',4,2,'Quel terme désignant la calligraphie Culture japonaiseaise signifie « voie de l''écriture »  ?','Dojo','Nindo','Shodo','Shippuden',3),
(9,'Culture japonaise',5,2,'Qu''est-ce qu''un Karesansui ?','un jardin zen','un groupement de pierre dréssés','le jardin de thé  ','un bambou sacré',2),
(10,'Culture japonaise',5,2,'Quelle invention n''a pas était découvert par un Culture japonaiseais ?','Adrénaline','Machine à tisser en bois','Vitamine B1','le papier',4),
(11,'Culture japonaise',6,1,'Il n''y a quasiment aucune poubelle publique disponible au Culture japonaise ?','NULL','NULL','NULL','NULL',1),
(12,'Culture japonaise',6,1,'Dans le monde du travaille il est plutôt bien vu de faire des siestes pour faire des pauses ?','NULL','NULL','NULL','NULL',1),
(13,'Culture coréenne',1,1,'La guerre de corée aura durer 3 ans','NULL','NULL','NULL','NULL',1),
(14,'Culture coréenne',1,2,'Le premier leader suprême de corée du nord s''appelait Kim Jong-il','NULL','NULL','NULL','NULL',2),
(15,'Culture coréenne',2,1,'La Corée à des frontières avec la russie ?','NULL','NULL','NULL','NULL',1),
(16,'Culture coréenne',2,2,'Quel est la taille de la frontière entre les deux corées ?','238','274','350','173',1),
(17,'Culture coréenne',3,2,'Quel est le sport le plus populaire de Corée','L''Esport','Le Taekwondo','Le Football','La boxe thai',4),
(18,'Culture coréenne',3,1,'Les jeux olympiques de Seoul ont eu lieu en 1992','NULL','NULL','NULL','NULL',2),
(19,'Culture coréenne',4,2,'Laquelle de ces arts est la plus prohéminente en corée ?','Caligraphie','Peinture','Poterie','Musique',1),
(20,'Culture coréenne',4,1,'La Couronne royale de Silla est faite en platine et en rubis','NULL','NULL','NULL','NULL',2),
(21,'Culture coréenne',5,1,'Avant l''arrivée des humains modernes les ours lynx et tigres étaient très abondants en corée','NULL','NULL','NULL','NULL',1),
(22,'Culture coréenne',5,2,'Quel est l''entreprise coréene ayant révolutioné la technologie moderne ?','Samsung','Hyundai','NULL','NULL',1),
(23,'Culture coréenne',6,1,'La K-Pop à été inventé pour créer une ère de divertissement après la seconde guerre mondiale','NULL','NULL','NULL','NULL',2),
(24,'Culture coréenne',6,1,'Les joueurs d''Esport en corées sont des véritables stars nationales.','NULL','NULL','NULL','NULL',1);

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
    `theme_id` INT(11) NOT NULL,
    `name` VARCHAR(150) NOT NULL,
    `desc` VARCHAR(150) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Remplissage du tableau `themes`
--

INSERT INTO `themes` (`theme_id`, `name`, `desc`) VALUES
(1, 'Histoire', 'Map test'),
(2, 'Geographie', 'Map test'),
(3, 'Sports et Loisirs', 'Map test'),
(4, 'Art et Litterature', 'Map test'),
(5, 'Science et Nature', 'Map test'),
(6, 'Divertissement', 'Map test');


CREATE TABLE `score` (
    `user_id` INT(11) NOT NULL,
    `username` VARCHAR(150) NOT NULL,
    `value` INT(11) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`user_id`, `username`, `value`) VALUES
(1, 'John', 10);

-- https://www.w3schools.com/sql/sql_join.asp


ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `themes_choice_FK` (`theme_id`);

ALTER TABLE `themes`
  ADD PRIMARY KEY (`theme_id`);

ALTER TABLE `score`
  ADD PRIMARY KEY (`user_id`);


--
-- AUTO_INCREMENT pour la table `questions`
--

ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
--  Foreign key
--

ALTER TABLE `questions`
  ADD CONSTRAINT `themes_choice_FK` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`theme_id`);
  COMMIT;

