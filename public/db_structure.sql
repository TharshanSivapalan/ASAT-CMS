CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `article` (`id`, `titre`, `content`) VALUES
(1, 'Lorem Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero itaque ratione voluptate excepturi repellendus aliquam recusandae architecto, vero nemo quo doloremque quasi odit consectetur rem magnam, aliquid ea quidem deleniti. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero itaque ratione voluptate excepturi repellendus aliquam recusandae architecto, vero nemo quo doloremque quasi odit consectetur rem magnam, aliquid ea quidem deleniti.</p>'),
(2, 'Lorem Ipsum Dolor', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero itaque ratione voluptate excepturi repellendus aliquam recusandae architecto, vero nemo quo doloremque quasi odit consectetur rem magnam, aliquid ea quidem deleniti. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero itaque ratione voluptate excepturi repellendus aliquam recusandae architecto, vero nemo quo doloremque quasi odit consectetur rem magnam, aliquid ea quidem deleniti.</p>');


CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `entree` int(11) DEFAULT NULL,
  `plat` int(11) DEFAULT NULL,
  `dessert` int(11) DEFAULT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu` (`id`, `nom`, `description`, `image`, `entree`, `plat`, `dessert`, `prix`) VALUES
(12, 'menu 1', '', '59778880639eb.png', 4, 14, 15, 20.34),
(13, 'menu 2', '<p>cococo</p>', '597788bdac3b0.png', 15, 14, NULL, 34567),
(14, 'menu 3', '', 'default.jpg', NULL, NULL, NULL, 123),
(20, 'menu 4', '', 'default.jpg', NULL, NULL, NULL, 1234);


CREATE TABLE `repas` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `repas` (`id`, `nom`, `category`) VALUES
(4, 'salade thai', 1),
(14, 'boeuf aux piments', 2),
(15, 'glace a la fraise', 3);


CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `valeur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `settings` (`id`, `nom`, `valeur`) VALUES
(1, 'nom du site', 'Buffalo grill'),
(2, 'slogan', 'manger c est manger'),
(3, 'logo', 'logo.png'),
(4, 'google maps', '++++++++++++++++%3Ciframe+src%3D%22https%3A%2F%2Fwww.google.com%2Fmaps%2Fembed%3Fpb%3D%211m18%211m12%211m3%211d5272.2919181837515%212d2.357604020175256%213d48.64532289769136%212m3%211f0%212f0%213f0%213m2%211i1024%212i768%214f13.1%213m3%211m2%211s0x0%253A0x1783cf2150f7aaa2%212sBOUCHERIE%2BHALAL%215e0%213m2%211sfr%212sfr%214v1500120742880%22+width%3D%22600%22+height%3D%22450%22+frameborder%3D%220%22+style%3D%22border%3A0%22+allowfullscreen%3E%3C%2Fiframe%3E++++++++++++'),
(5, 'pays', 'France'),
(6, 'ville', 'Paris'),
(7, 'adresse', '22 rue de Picpus'),
(9, 'code postal', '609326621'),
(10, 'telephone', 'effe@eefef.fr'),
(11, 'email', 'metro 34 sortie 2'),
(12, 'itineraire', 'metro 34 sortie 2');


CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `theme` (`id`, `name`, `thumbnail`, `statut`) VALUES
(1, 'Black Forest', 'template1.png', 1),
(2, 'Mcdiz', 'template2.png', 0);


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

ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `repas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `repas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;