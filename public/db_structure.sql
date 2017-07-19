CREATE TABLE `groupuser` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `permission` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL,
  `id_groupuser` int(11) NOT NULL,
  `token` char(60) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `article` (`id`, `titre`, `content`, `date_created`, `date_update`, `id_user`) VALUES
(1, 'Article 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero itaque ratione voluptate excepturi repellendus aliquam recusandae architecto, vero nemo quo doloremque quasi odit consectetur rem magnam, aliquid ea quidem deleniti.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Libero itaque ratione voluptate excepturi repellendus aliquam recusandae architecto, vero nemo quo doloremque quasi odit consectetur rem magnam, aliquid ea quidem deleniti.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', 1),
(2, 'Article 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero itaque ratione voluptate excepturi repellendus aliquam recusandae architecto, vero nemo quo doloremque quasi odit consectetur rem magnam, aliquid ea quidem deleniti.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Libero itaque ratione voluptate excepturi repellendus aliquam recusandae architecto, vero nemo quo doloremque quasi odit consectetur rem magnam, aliquid ea quidem deleniti.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', 1);



CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `statut` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `livredor` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `entree` int(11) DEFAULT NULL,
  `plat` int(11) DEFAULT NULL,
  `dessert` int(11) DEFAULT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `menu` (`id`, `nom`, `description`, `image`, `entree`, `plat`, `dessert`, `prix`) VALUES
(1, 'enfant', 'menu enfant', 'plat.jpg', 1, 2, 3, 100),
(2, 'gastronomique', 'menu gastronomique', 'plat.jpg', 6, 7, 8, 200);



CREATE TABLE `repas` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `repas` (`id`, `nom`, `category`) VALUES
(1, 'salade', 1),
(2, 'steak frite', 2),
(3, 'glace', 3),
(4, 'couscous', 2),
(5, 'fruit', 3),
(6, 'tomates', 1),
(7, 'casoulet', 2),
(8, 'yaourt', 3),
(9, 'fromage', 3);



CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `postal_code` varchar(7) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `day` int(1) NOT NULL,
  `openning_time` varchar(4) NOT NULL,
  `closing_time` varchar(4) NOT NULL,
  `id_restaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;



CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `settings` (`id`, `nom`, `valeur`) VALUES
(1, 'nom du site', 'SITETITLE'),
(2, 'slogan', 'manger c est manger'),
(3, 'logo', 'logo.png'),
(4, 'google maps', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5272.2919181837515!2d2.357604020175256!3d48.64532289769136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1783cf2150f7aaa2!2sBOUCHERIE+HALAL!5e0!3m2!1sfr!2sfr!4v1500120742880\" w'),
(5, 'pays', 'France'),
(6, 'ville', 'Paris'),
(7, 'adresse', '22 rue de Picpus'),
(9, 'code postal', '91700'),
(10, 'telephone', '3456789'),
(11, 'email', 'effe@eefef.fr'),
(12, 'itineraire', 'metro 34 sortie 2');



CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `theme` (`id`, `name`, `thumbnail`, `statut`, `link`) VALUES
(1, 'theme1', 'template1.png', 0, ''),
(2, 'theme2', 'template2.png', 1, '');



ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `groupuser`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `groupuser` ADD UNIQUE(`name`);


ALTER TABLE `livredor`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `repas`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `groupuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `livredor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `repas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;