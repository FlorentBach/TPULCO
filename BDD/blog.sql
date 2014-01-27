/*
MySQL Data Transfer
Source Host: localhost
Source Database: blog
Target Host: localhost
Target Database: blog
Date: 27/01/2014 15:32:28
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for articles
-- ----------------------------
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `date` int(11) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tag
-- ----------------------------
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idarticle` int(11) DEFAULT NULL,
  `nomdutag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for utilisateur
-- ----------------------------
CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `articles` VALUES ('57', 'montag', 'montag', '1390812355', 'montag');
INSERT INTO `articles` VALUES ('58', 'ok', 'ok', '1390831299', 'yeah');
INSERT INTO `tag` VALUES ('1', '57', 'montag');
INSERT INTO `tag` VALUES ('2', '58', 'montag');
INSERT INTO `utilisateur` VALUES ('1', 'test@test.test', 'test', '5e1f5ezf065ezdf165ezf1z65e0fze65f0ezf1ez65f0ze65ze56fez65fze65g1ez65');
