-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 21 juin 2023 à 23:58
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `etablissement`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenant`
--

CREATE TABLE `apprenant` (
  `id_apprenant` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `age` varchar(2) NOT NULL,
  `numero_tuteur` varchar(12) NOT NULL,
  `CIN_tuteur` varchar(10) NOT NULL,
  `lien_tuteur` varchar(10) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `penalites_admin` varchar(1) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `exclus` BOOLEAN NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT curdate(),
  `etat_inscription` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `apprenant`
--

INSERT INTO `apprenant` (`id_apprenant`, `nom`, `prenom`, `age`, `numero_tuteur`, `CIN_tuteur`, `lien_tuteur`, `adresse`, `type`, `penalites_admin`, `photo`, `exclus`, `date_inscription`, `etat_inscription`) VALUES
(1, 'Mer', 'Mohamed', '12', '0612345678', 'z123456', 'père', 'avenue la résistance, Tahla', 'interne', '0', 'etudiant.png', 0, '2022-03-11 23:00:00', 'non payée'),
(2, 'Mer', 'omar', '15', '0612345678', 'z123456', 'père', 'avenue la résistance, Tahla', 'interne', '0', 'etudiant.png', 0, '2022-03-11 23:00:00', 'payée'),
(3, 'Mer', 'khalid', '14', '0612345678', 'z123456', 'père', 'avenue la résistance, Tahla', 'interne', '0', 'etudiant.png', 0, '2022-03-11 23:00:00', 'non payée'),
(4, 'Mer', 'Hassan', '17', '0612345678', 'z123456', 'père', 'avenue la résistance, Tahla', 'interne', '0', 'etudiant.png', 0, '2022-03-11 23:00:00', 'payée'),
(5, 'Mer', 'Youness', '18', '0612345678', 'z123456', 'père', 'avenue la résistance, Tahla', 'externe', '0', 'etudiant.png', 0, '2022-03-11 23:00:00', 'non payée'),
(7, 'Jani', 'Zakaria', '16', '0612345687', 'z123465', 'mère', 'avenue la belle vue Tahla', 'externe', '1', 'etudiant.png', 1, '2022-03-11 23:00:00', ' non payée'),
(8, 'Mer', 'Hicham', '14', '0612345678', 'z123456', 'père', 'avenue la résistance, Tahla', 'interne', '0', 'etudiant.png', 0, '2022-03-11 23:00:00', 'payée');

-- --------------------------------------------------------

--
-- Structure de la table `comptable`
--

CREATE TABLE `comptable` (
  `id_comptable` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passes` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comptable`
--

INSERT INTO `comptable` (`id_comptable`, `nom`, `prenom`, `email`, `mot_de_passes`) VALUES
(1, 'merrah', 'zineb', 'zineb@gmail.com', 'zineb@2002');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `id_evaluation` int(11) NOT NULL,
  `note` varchar(25) NOT NULL,
  `date` date DEFAULT NULL,
  `commentaire` varchar(100) NOT NULL,
  `annee_scolaire` varchar(20) NOT NULL,
  `id_apprenant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evaluation`
--

INSERT INTO `evaluation` (`id_evaluation`, `note`, `date`, `commentaire`, `annee_scolaire`, `id_apprenant`) VALUES
(1, '10', '2022-10-27', '', '2022-2023', 1),
(2, '8', '2022-11-27', '', '2022-2023', 1),
(3, '9', '2022-12-27', '', '2022-2023', 1),
(4, '10', '2023-01-27', '', '2022-2023', 1),
(5, '7', '2023-02-27', '', '2022-2023', 1),
(6, '4', '2023-03-27', '', '2022-2023', 1),
(7, '5', '2023-04-27', '', '2022-2023', 1),
(8, '10', '2022-10-27', '', '2022-2023', 2),
(9, '8', '2022-11-27', '', '2022-2023', 2),
(10, '9', '2022-12-27', '', '2022-2023', 2),
(11, '10', '2023-01-27', '', '2022-2023', 2),
(12, '7', '2023-02-27', '', '2022-2023', 2),
(13, '4', '2023-03-27', '', '2022-2023', 2),
(14, '6', '2023-04-27', '', '2022-2023', 2),
(15, '10', '2022-10-27', '', '2022-2023', 3),
(16, '8', '2022-11-27', '', '2022-2023', 3),
(17, '9', '2022-12-27', '', '2022-2023', 3),
(18, '10', '2023-01-27', '', '2022-2023', 3),
(19, '7', '2023-02-27', '', '2022-2023', 3),
(20, '4', '2023-03-27', '', '2022-2023', 3),
(21, '6', '2023-04-27', '', '2022-2023', 3),
(22, '10', '2022-10-27', '', '2022-2023', 4),
(23, '8', '2022-11-27', '', '2022-2023', 4),
(24, '9', '2022-12-27', '', '2022-2023', 4),
(25, '10', '2023-01-27', '', '2022-2023', 4),
(26, '7', '2023-02-27', '', '2022-2023', 4),
(27, '4', '2023-03-27', '', '2022-2023', 4),
(28, '6', '2023-04-27', '', '2022-2023', 4),
(29, '10', '2022-10-27', '', '2022-2023', 5),
(30, '8', '2022-11-27', '', '2022-2023', 5),
(31, '9', '2022-12-27', '', '2022-2023', 5),
(32, '10', '2023-01-27', '', '2022-2023', 5),
(33, '7', '2023-02-27', '', '2022-2023', 5),
(34, '4', '2023-03-27', '', '2022-2023', 5),
(35, '6', '2023-04-27', '', '2022-2023', 5);

-- --------------------------------------------------------

--
-- Structure de la table `suivie_financière`
--

CREATE TABLE `suivie_financière` (
  `id_suivie` int(11) NOT NULL,
  `montant` varchar(25) NOT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(225) NOT NULL,
  `type` varchar(25) NOT NULL,
  `categorie` varchar(25) NOT NULL,
  `id_comptable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `suivie_financière`
--

INSERT INTO `suivie_financière` (`id_suivie`, `montant`, `date`, `description`, `type`, `categorie`, `id_comptable`) VALUES
(1, '3000', '2023-06-20', 'les revenus de ce mois', 'revenus', '', 1),
(2, '2500', '2023-05-20', 'les revenus de ce mois', 'revenus', '', 1),
(3, '2800', '2023-04-20', 'les revenus de ce mois', 'revenus', '', 1),
(4, '3600', '2023-03-20', 'les revenus de ce mois', 'revenus', '', 1),
(5, '4500', '2023-02-20', 'les revenus de ce mois', 'revenus', '', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprenant`
--
ALTER TABLE `apprenant`
  ADD PRIMARY KEY (`id_apprenant`);

--
-- Index pour la table `comptable`
--
ALTER TABLE `comptable`
  ADD PRIMARY KEY (`id_comptable`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id_evaluation`),
  ADD KEY `id_apprenant` (`id_apprenant`);

--
-- Index pour la table `suivie_financière`
--
ALTER TABLE `suivie_financière`
  ADD PRIMARY KEY (`id_suivie`),
  ADD KEY `id_comptable` (`id_comptable`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apprenant`
--
ALTER TABLE `apprenant`
  MODIFY `id_apprenant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `comptable`
--
ALTER TABLE `comptable`
  MODIFY `id_comptable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id_evaluation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `suivie_financière`
--
ALTER TABLE `suivie_financière`
  MODIFY `id_suivie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`id_apprenant`) REFERENCES `apprenant` (`id_apprenant`);

--
-- Contraintes pour la table `suivie_financière`
--
ALTER TABLE `suivie_financière`
  ADD CONSTRAINT `suivie_financière_ibfk_1` FOREIGN KEY (`id_comptable`) REFERENCES `comptable` (`id_comptable`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;









<?php
include "connect.php";

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $idApprenant = $_POST["id_apprenant"];
    $noteOct = $_POST["note_oct"];
    $noteNov = $_POST["note_nov"];
    $noteDec = $_POST["note_dec"];
    $noteJan = $_POST["note_jan"];
    $noteFev = $_POST["note_fev"];
    $noteMars = $_POST["note_mars"];
    $noteAvril = $_POST["note_avril"];
    $noteMai = $_POST["note_mai"];
    $noteJuin = $_POST["note_juin"];
    $noteJuillet = $_POST["note_juillet"];

    // Requête de mise à jour des notes
    $sql = "UPDATE evaluation SET
                note = CASE
                    WHEN MONTH(date) = 10 THEN :noteOct
                    WHEN MONTH(date) = 11 THEN :noteNov
                    WHEN MONTH(date) = 12 THEN :noteDec
                    WHEN MONTH(date) = 1 THEN :noteJan
                    WHEN MONTH(date) = 2 THEN :noteFev
                    WHEN MONTH(date) = 3 THEN :noteMars
                    WHEN MONTH(date) = 4 THEN :noteAvril
                    WHEN MONTH(date) = 5 THEN :noteMai
                    WHEN MONTH(date) = 6 THEN :noteJuin
                    WHEN MONTH(date) = 7 THEN :noteJuillet
                END
            WHERE id_apprenant = :idApprenant";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':noteOct', $noteOct);
    $stmt->bindParam(':noteNov', $noteNov);
    $stmt->bindParam(':noteDec', $noteDec);
    $stmt->bindParam(':noteJan', $noteJan);
    $stmt->bindParam(':noteFev', $noteFev);
    $stmt->bindParam(':noteMars', $noteMars);
    $stmt->bindParam(':noteAvril', $noteAvril);
    $stmt->bindParam(':noteMai', $noteMai);
    $stmt->bindParam(':noteJuin', $noteJuin);
    $stmt->bindParam(':noteJuillet', $noteJuillet);
    $stmt->bindParam(':idApprenant', $idApprenant);
    $stmt->execute();
}

// Requête pour récupérer les données de l'apprenant
$sql = "SELECT
            a.id_apprenant AS ID,
            CONCAT(a.nom, ' ', a.prenom) AS `Nom et Prénom`,
            e.note AS Oct,
            e.note AS Nov,
            e.note AS Déc,
            e.note AS Jan,
            e.note AS Fév,
            e.note AS Mars,
            e.note AS Avril,
            e.note AS Mai,
            e.note AS Juin,
            e.note AS Juillet
        FROM
            apprenant a
        LEFT JOIN
            evaluation e ON a.id_apprenant = e.id_apprenant
        WHERE
            a.id_apprenant = :idApprenant";

$idApprenant = 1; // Remplacez par l'ID de l'apprenant que vous souhaitez modifier
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idApprenant', $idApprenant);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!-- Formulaire de modification des notes -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="id_apprenant" value="<?php echo $row['ID']; ?>">
    <table>
        <thead>
            <tr>
                <th>Mois</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Octobre</td>
                <td><input type="text" name="note_oct" value="<?php echo $row['Oct']; ?>"></td>
            </tr>
            <tr>
                <td>Novembre</td>
                <td><input type="text" name="note_nov" value="<?php echo $row['Nov']; ?>"></td>
            </tr>
            <tr>
                <td>Décembre</td>
                <td><input type="text" name="note_dec" value="<?php echo $row['Déc']; ?>"></td>
            </tr>
            <tr>
                <td>Janvier</td>
                <td><input type="text" name="note_jan" value="<?php echo $row['Jan']; ?>"></td>
            </tr>
            <tr>
                <td>Février</td>
                <td><input type="text" name="note_fev" value="<?php echo $row['Fév']; ?>"></td>
            </tr>
            <tr>
                <td>Mars</td>
                <td><input type="text" name="note_mars" value="<?php echo $row['Mars']; ?>"></td>
            </tr>
            <tr>
                <td>Avril</td>
                <td><input type="text" name="note_avril" value="<?php echo $row['Avril']; ?>"></td>
            </tr>
            <tr>
                <td>Mai</td>
                <td><input type="text" name="note_mai" value="<?php echo $row['Mai']; ?>"></td>
            </tr>
            <tr>
                <td>Juin</td>
                <td><input type="text" name="note_juin" value="<?php echo $row['Juin']; ?>"></td>
            </tr>
            <tr>
                <td>Juillet</td>
                <td><input type="text" name="note_juillet" value="<?php echo $row['Juillet']; ?>"></td>
            </tr>
        </tbody>
    </table>
    <button type="submit">Enregistrer les modifications</button>
</form>
