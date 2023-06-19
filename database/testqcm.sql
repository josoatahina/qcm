--
-- Base de données : `testqcm`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(100) NOT NULL,
    `psswd` VARCHAR(100) NOT NULL,
    `is_admin` BOOLEAN DEFAULT false,
    CONSTRAINT `pk_users` PRIMARY KEY (`id`),
    CONSTRAINT `uc_users` UNIQUE (`username`)
);

--
-- Structure de la table `qcm`
--

CREATE TABLE IF NOT EXISTS `qcm` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(255) NOT NULL,
    `descriptions` LONGTEXT DEFAULT NULL,
    `sujet` VARCHAR(255) DEFAULT NULL,
    `niveau` VARCHAR(255) NOT NULL,
    CONSTRAINT `pk_qcm` PRIMARY KEY (`id`)
);

--
-- Structure de la table `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `texte` VARCHAR(255) NOT NULL,
    `options` JSON NOT NULL,
    `reponse` VARCHAR(255) NOT NULL,
    `id_qcm` INTEGER NOT NULL,
    CONSTRAINT `pk_questionnaire` PRIMARY KEY (`id`),
    CONSTRAINT `fk_qcm` FOREIGN KEY (`id_qcm`) REFERENCES `qcm` (`id`)
);

--
-- Structure de la table `collect_data`
--

CREATE TABLE IF NOT EXISTS `collect_data` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `id_qcm` INTEGER NOT NULL,
    `id_user` INTEGER NOT NULL,
    `reponse_choisi` JSON NOT NULL,
    `nb_bonne_reponse` INTEGER NOT NULL,
    `nb_reponse` INTEGER NOT NULL,
    CONSTRAINT `pk_collect_data` PRIMARY KEY (`id`),
    CONSTRAINT `fk_qcm_collect_data` FOREIGN KEY (`id_qcm`) REFERENCES `qcm` (`id`),
    CONSTRAINT `fk_users_collect_data` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
);

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`username`, `psswd`, `is_admin`) VALUES ('Tahina54', '0192023a7bbd73250516f069df18b500', 1);