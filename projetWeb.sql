

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `code_raccourci` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL
);

CREATE TABLE `licencie` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `num_licence` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  UNIQUE(`num_licence`),
  FOREIGN KEY (`id_categorie`) REFERENCES categorie(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE `contact` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `num_tel` int(11) NOT NULL,
  `id_licencie` int(11) NOT NULL,
  FOREIGN KEY (`id_licencie`) REFERENCES licencie(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE `educateur` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `id_licencie` int(11) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  FOREIGN KEY (`id_licencie`) REFERENCES licencie(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);