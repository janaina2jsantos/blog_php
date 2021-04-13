

USE blog_udemy;

# Dump of table categories
# ------------------------------------------------------------
DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_posts_categories_idx` (`category_id`),
  KEY `fk_posts_users1_idx` (`user_id`),
  CONSTRAINT `fk_posts_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_posts_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# ------------------------------------------------------------

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `created_at`, `updated_at`)
VALUES
	(1,'Paulo','Soares','teste@gmail.com','PauloSoaresNet','123456','2018-05-02 20:10:36','2019-01-05 14:56:31')


INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`)
VALUES
  (1, 'Informática', 'lorem ipsum', '2018-05-02 20:10:36','2019-01-05 14:56:31'),
  (2, 'Games', 'lorem ipsum', '2018-05-02 20:10:36','2019-01-05 14:56:31'),
  (3, 'Cursos', 'lorem ipsum', '2018-05-02 20:10:36','2019-01-05 14:56:31')


INSERT INTO `posts` (`id`, `title`, `description`, `content`, `slug`, `type`, `created_at`, `updated_at`, `category_id`, `user_id`)
VALUES
  (1,'Meu primeiro post','lorem ipsum','lorem ipsum','meu-primeiro-post','post','2018-05-02 20:10:36','2019-01-05 14:56:31',1,1),
  (2,'Curso PHP do zero','lorem ipsum','lorem ipsum','curso-php-zero','page','2018-05-02 20:10:36','2019-01-05 14:56:31',3,1),
  (3,'Curso de Javascript','lorem ipsum','lorem ipsum','curso-javascript','page','2018-05-02 20:10:36','2019-01-05 14:56:31',2,1),
  (4,'Como criar um marketplace ','lorem ipsum','lorem ipsum','como-criar-marketplace','post','2018-05-02 20:10:36','2019-01-05 14:56:31',2,1)



