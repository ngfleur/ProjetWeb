

CREATE TABLE `categorie` (
  `code_raccourci` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY(`code_raccourci`)
);

CREATE TABLE `licencie` (
  `num_licence` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `code_raccourci` varchar(255) NOT NULL,
  PRIMARY KEY(`num_licence`),
  FOREIGN KEY (`code_raccourci`) REFERENCES categorie(`code_raccourci`)
);


CREATE TABLE `contact` (
  `num_tel` int(11) NOT NULL,
  `num_licence` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY(`num_tel`),
  FOREIGN KEY (`num_licence`) REFERENCES licencie(`num_licence`)
);


CREATE TABLE `educateur` (
  `email` varchar(255) NOT NULL,
  `num_licence` int(11) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY(`email`),
  FOREIGN KEY (`num_licence`) REFERENCES licencie(`num_licence`)
);