SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ymo_clients
-- ----------------------------
DROP TABLE IF EXISTS `ymo_clients`;
CREATE TABLE `ymo_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `fname` varchar(30) NOT NULL COMMENT 'First Name',
  `lname` varchar(20) NOT NULL COMMENT 'Last Name',
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `terms` text,
  `newsletter` varchar(20) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='0 - free, 1 - Basic, 2 - Premium';

-- ----------------------------
-- Records of ymo_clients
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_companies
-- ----------------------------
DROP TABLE IF EXISTS `ymo_companies`;
CREATE TABLE `ymo_companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `altemail` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `mobphone` varchar(30) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  `altaddress` varchar(2555) DEFAULT NULL,
  `altzipcode` varchar(45) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `longitude` varchar(12) DEFAULT NULL,
  `latitude` varchar(12) DEFAULT NULL,
  `taxcode` varchar(20) DEFAULT NULL,
  `companies_cats_id` smallint(6) DEFAULT NULL,
  `currencies_id` tinyint(4) DEFAULT NULL,
  `countries_id` int(11) DEFAULT NULL,
  `languages_id` smallint(6) DEFAULT NULL,
  `bizpartner` enum('0','1') DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ymo_companies_ymo_countries_idx` (`countries_id`),
  KEY `fk_ymo_companies_ymo_currencies1_idx` (`currencies_id`),
  KEY `fk_ymo_companies_ymo_languages1_idx` (`languages_id`),
  KEY `fk_ymo_companies_ymo_companies_cats1_idx` (`companies_cats_id`),
  CONSTRAINT `fk_ymo_companies_ymo_companies_cats1` FOREIGN KEY (`companies_cats_id`) REFERENCES `ymo_companies_cats` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ymo_companies_ymo_countries` FOREIGN KEY (`countries_id`) REFERENCES `ymodb_common`.`ymo_countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ymo_companies_ymo_currencies1` FOREIGN KEY (`currencies_id`) REFERENCES `ymodb_common`.`ymo_currencies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ymo_companies_ymo_languages1` FOREIGN KEY (`languages_id`) REFERENCES `ymodb_common`.`ymo_languages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_companies
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_companies_cats
-- ----------------------------
DROP TABLE IF EXISTS `ymo_companies_cats`;
CREATE TABLE `ymo_companies_cats` (
  `id` smallint(6) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='<double-click to overwrite multiple objects>';

-- ----------------------------
-- Records of ymo_companies_cats
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_companies_users
-- ----------------------------
DROP TABLE IF EXISTS `ymo_companies_users`;
CREATE TABLE `ymo_companies_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `companies_id` int(11) DEFAULT NULL,
  `profile_id` smallint(6) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ymo_companies_users_ymo_user1_idx` (`user_id`),
  KEY `fk_ymo_companies_users_ymo_companies1_idx` (`companies_id`),
  CONSTRAINT `fk_ymo_companies_users_ymo_companies1` FOREIGN KEY (`companies_id`) REFERENCES `ymo_companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ymo_companies_users_ymo_user1` FOREIGN KEY (`user_id`) REFERENCES `ymodb_auth`.`ymo_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_companies_users
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_sharelevels
-- ----------------------------
DROP TABLE IF EXISTS `ymo_sharelevels`;
CREATE TABLE `ymo_sharelevels` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_sharelevels
-- ----------------------------
