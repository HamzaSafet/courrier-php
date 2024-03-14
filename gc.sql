-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 avr. 2021 à 16:31
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gc`
--

-- --------------------------------------------------------

--
-- Structure de la table `destinataires`
--

CREATE TABLE `destinataires` (
  `id_dest` int(11) NOT NULL,
  `destinataire` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `destinataires`
--

INSERT INTO `destinataires` (`id_dest`, `destinataire`) VALUES
(1, '1°B'),
(2, '2°B'),
(3, '3°B'),
(4, '4°B'),
(5, '5°B'),
(6, 'DRH'),
(7, 'INSP'),
(8, 'DPO'),
(9, 'test'),
(10, 'test1'),
(11, 'test1'),
(12, 'test2');

-- --------------------------------------------------------

--
-- Structure de la table `order_courrier`
--

CREATE TABLE `order_courrier` (
  `id_order` int(11) NOT NULL,
  `id_personne` int(11) DEFAULT NULL,
  `classification_courrier` char(50) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `numero_courrier` int(11) DEFAULT NULL,
  `courries` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `order_courrier`
--

INSERT INTO `order_courrier` (`id_order`, `id_personne`, `classification_courrier`, `date_order`, `numero_courrier`, `courries`) VALUES
(7, 2, 'classement2', '2021-03-10', 3, 'regester depart'),
(8, 3, 'classement2', '2021-03-12', 12, 'regester arrive'),
(9, 2, 'classement2', '2021-03-12', 13, 'regester arrive'),
(10, 3, 'classement1', '2021-03-12', 12, 'regester arrive'),
(12, 2, 'classement2', '2021-03-12', 1, 'regester depart'),
(13, 2, 'classement1', '2021-03-31', 4, 'regester depart'),
(14, 1, 'classement23', '2021-03-31', 4, 'regester depart'),
(15, 4, 'classement24', '2021-03-31', 121, 'regester arrive'),
(16, 1, 'classement2a', '2021-04-15', 1, 'regester depart');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id_permission` int(11) NOT NULL,
  `date_debu` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `motif` char(50) DEFAULT NULL,
  `adresse` char(50) DEFAULT NULL,
  `id_personne` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id_permission`, `date_debu`, `date_fin`, `motif`, `adresse`, `id_personne`) VALUES
(1, '2021-04-20', '2021-04-24', 'motif', 'adress', 2),
(2, '2021-04-22', '2021-04-25', 'motif 11', 'adress 11', 14);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom_prenom` char(50) DEFAULT NULL,
  `fonction` char(50) DEFAULT NULL,
  `grade` char(20) DEFAULT NULL,
  `tel` char(20) DEFAULT NULL,
  `matrecule` char(50) DEFAULT NULL,
  `cin` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom_prenom`, `fonction`, `grade`, `tel`, `matrecule`, `cin`) VALUES
(1, 'hamza safet', 'devloppement inforatique', 'serjent', '0691240172', '12853/far/19', 'cd88067'),
(2, 'Hajar', 'secritaria', 'srg', '0687456787', '12855/far', 'cd875645'),
(3, 'jaihane', 'reseaux', 'srg', '0687456787', '12845/far', 'cd875945'),
(4, 'maryam', 'reseaux', 'srg', '0687456787', '12745/far', 'cd825945'),
(14, 'nouhaila', 'dev', 'sgt', '0698765676', '1234457', 'CD682780');

-- --------------------------------------------------------

--
-- Structure de la table `regestre_arrivee`
--

CREATE TABLE `regestre_arrivee` (
  `id_regestre_arv` int(11) NOT NULL,
  `date_arrivee` date DEFAULT NULL,
  `num_ordere_arv` int(11) DEFAULT NULL,
  `date_courrier_arriver` date DEFAULT NULL,
  `num_lettre_arrivee` int(11) DEFAULT NULL,
  `objet_arriver` text DEFAULT NULL,
  `date_observation` date DEFAULT NULL,
  `id_personne` int(11) DEFAULT NULL,
  `id_type_courrier` int(11) DEFAULT NULL,
  `id_dest` int(11) DEFAULT NULL,
  `classement_arrivee` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `regestre_arrivee`
--

INSERT INTO `regestre_arrivee` (`id_regestre_arv`, `date_arrivee`, `num_ordere_arv`, `date_courrier_arriver`, `num_lettre_arrivee`, `objet_arriver`, `date_observation`, `id_personne`, `id_type_courrier`, `id_dest`, `classement_arrivee`) VALUES
(5, '2021-04-19', 1, '2021-04-19', 11111, 'azert UP', '2021-04-19', 4, 2, 7, 'classement 1'),
(6, '2021-04-19', 2, '2021-04-19', 2011, 'qesdtfbh', '2021-04-19', 14, 5, 8, NULL),
(7, '2021-04-19', 3, '2021-04-19', 201, 'trrrrcfjh', '0000-00-00', 3, 4, 7, NULL),
(12, '2021-04-19', 4, '2021-04-19', 121, 'aergreg trztg \"rga\"rg rgegfdg dfqeqr eqrgqert ergqerg ergsteh ', '0000-00-00', 3, 4, 7, 'classement 2');

-- --------------------------------------------------------

--
-- Structure de la table `regestre_depart`
--

CREATE TABLE `regestre_depart` (
  `id_regestre_dpr` int(11) NOT NULL,
  `date_courrier_dpr` date DEFAULT NULL,
  `num_ordere_dpr` int(11) DEFAULT NULL,
  `objet_depart` text DEFAULT NULL,
  `signature` char(50) DEFAULT NULL,
  `signer_par` char(50) DEFAULT NULL,
  `adress` char(50) DEFAULT NULL,
  `id_personne` int(11) DEFAULT NULL,
  `id_type_courrier` int(11) DEFAULT NULL,
  `id_dest` int(11) DEFAULT NULL,
  `classement_depart` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `regestre_depart`
--

INSERT INTO `regestre_depart` (`id_regestre_dpr`, `date_courrier_dpr`, `num_ordere_dpr`, `objet_depart`, `signature`, `signer_par`, `adress`, `id_personne`, `id_type_courrier`, `id_dest`, `classement_depart`) VALUES
(1, '2021-04-19', 1, 'azerty', 'signee', 'signee par', 'adress', 2, 5, 7, 'classement 1'),
(2, '2021-04-15', 2, 'ztzefz zu_ef iu iegyfy iyef uiegf Ã§pueigf pÃ§ugief pugeif uigef pÃ§ugief Ã§uigef Ã§uigef Ã§ugae Ã§ugioaef Ã§uige Ã§uief iaEBHKDC  IAEU ', 'signee_pas', '', 'qDC', 1, 1, 8, 'classement 3'),
(3, '2021-04-19', 3, 'azerty', 'signee_pas', '', 'adres', 4, 2, 6, NULL),
(5, '2021-04-19', 4, 'azert', 'signee', 'signee par', 'adres', 4, 1, 1, NULL),
(6, '2021-04-19', 5, 'erg', 'signee', 'zef', 'zef', 3, 2, 6, 'classement 2');

-- --------------------------------------------------------

--
-- Structure de la table `type_courriers`
--

CREATE TABLE `type_courriers` (
  `id_type_courrier` int(11) NOT NULL,
  `type_courrier` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_courriers`
--

INSERT INTO `type_courriers` (`id_type_courrier`, `type_courrier`) VALUES
(1, 'TO'),
(2, 'CORSP'),
(3, 'LISTE'),
(4, 'NDS'),
(5, 'BE'),
(6, 'testType');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `users` char(50) DEFAULT NULL,
  `pass` char(50) DEFAULT NULL,
  `logine` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `users`, `pass`, `logine`) VALUES
(3, 'secretariat', '123456', 'DPSIC'),
(4, 'user', '123', 'root');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `destinataires`
--
ALTER TABLE `destinataires`
  ADD PRIMARY KEY (`id_dest`);

--
-- Index pour la table `order_courrier`
--
ALTER TABLE `order_courrier`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_personne` (`id_personne`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_permission`),
  ADD KEY `id_personne` (`id_personne`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`),
  ADD UNIQUE KEY `matrecule` (`matrecule`);

--
-- Index pour la table `regestre_arrivee`
--
ALTER TABLE `regestre_arrivee`
  ADD PRIMARY KEY (`id_regestre_arv`),
  ADD KEY `id_personne` (`id_personne`),
  ADD KEY `id_type_courrier` (`id_type_courrier`),
  ADD KEY `id_dest` (`id_dest`);

--
-- Index pour la table `regestre_depart`
--
ALTER TABLE `regestre_depart`
  ADD PRIMARY KEY (`id_regestre_dpr`),
  ADD KEY `id_personne` (`id_personne`),
  ADD KEY `id_type_courrier` (`id_type_courrier`),
  ADD KEY `id_dest` (`id_dest`);

--
-- Index pour la table `type_courriers`
--
ALTER TABLE `type_courriers`
  ADD PRIMARY KEY (`id_type_courrier`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `destinataires`
--
ALTER TABLE `destinataires`
  MODIFY `id_dest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `order_courrier`
--
ALTER TABLE `order_courrier`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_permission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `regestre_arrivee`
--
ALTER TABLE `regestre_arrivee`
  MODIFY `id_regestre_arv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `regestre_depart`
--
ALTER TABLE `regestre_depart`
  MODIFY `id_regestre_dpr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `type_courriers`
--
ALTER TABLE `type_courriers`
  MODIFY `id_type_courrier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order_courrier`
--
ALTER TABLE `order_courrier`
  ADD CONSTRAINT `order_courrier_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `regestre_arrivee`
--
ALTER TABLE `regestre_arrivee`
  ADD CONSTRAINT `regestre_arrivee_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `regestre_arrivee_ibfk_2` FOREIGN KEY (`id_type_courrier`) REFERENCES `type_courriers` (`id_type_courrier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `regestre_arrivee_ibfk_3` FOREIGN KEY (`id_dest`) REFERENCES `destinataires` (`id_dest`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `regestre_depart`
--
ALTER TABLE `regestre_depart`
  ADD CONSTRAINT `regestre_depart_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `regestre_depart_ibfk_2` FOREIGN KEY (`id_type_courrier`) REFERENCES `type_courriers` (`id_type_courrier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `regestre_depart_ibfk_3` FOREIGN KEY (`id_dest`) REFERENCES `destinataires` (`id_dest`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
