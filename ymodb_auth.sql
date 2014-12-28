SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ymo_auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `ymo_auth_assignment`;
CREATE TABLE `ymo_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `ymo_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `ymo_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_auth_assignment
-- ----------------------------
INSERT INTO `ymo_auth_assignment` VALUES ('admin', '129', '1411475416');
INSERT INTO `ymo_auth_assignment` VALUES ('admin', '179', '1413551173');
INSERT INTO `ymo_auth_assignment` VALUES ('admin', '48', '1403811267');
INSERT INTO `ymo_auth_assignment` VALUES ('admin', '49', '1401972371');
INSERT INTO `ymo_auth_assignment` VALUES ('admin', '50', '1403781308');
INSERT INTO `ymo_auth_assignment` VALUES ('admin', '53', '1408741429');
INSERT INTO `ymo_auth_assignment` VALUES ('Admin Supervisor', '150', '1411739055');
INSERT INTO `ymo_auth_assignment` VALUES ('Admin Ymobiz', '169', '1412465795');
INSERT INTO `ymo_auth_assignment` VALUES ('Backoffice Ymobiz', '173', '1412514868');
INSERT INTO `ymo_auth_assignment` VALUES ('Business Ymobiz', '172', '1412514881');
INSERT INTO `ymo_auth_assignment` VALUES ('Card Holder', '106', '1410051102');
INSERT INTO `ymo_auth_assignment` VALUES ('Card Holder', '160', '1411899941');
INSERT INTO `ymo_auth_assignment` VALUES ('Card Holder', '175', '1412729748');
INSERT INTO `ymo_auth_assignment` VALUES ('Card Holder', '178', '1412891970');
INSERT INTO `ymo_auth_assignment` VALUES ('dev', '48', '1401972367');
INSERT INTO `ymo_auth_assignment` VALUES ('Guest Role', '106', '1410051102');
INSERT INTO `ymo_auth_assignment` VALUES ('Guest Role', '170', '1412514917');
INSERT INTO `ymo_auth_assignment` VALUES ('Guest Role', '171', '1412514895');
INSERT INTO `ymo_auth_assignment` VALUES ('Guest Role', '172', '1412514881');
INSERT INTO `ymo_auth_assignment` VALUES ('Guest Role', '173', '1412514868');
INSERT INTO `ymo_auth_assignment` VALUES ('Guest Role', '174', '1412160601');
INSERT INTO `ymo_auth_assignment` VALUES ('Guest Role', '175', '1412729748');
INSERT INTO `ymo_auth_assignment` VALUES ('Guest Role', '178', '1412891970');
INSERT INTO `ymo_auth_assignment` VALUES ('Guest Role', '179', '1413551120');
INSERT INTO `ymo_auth_assignment` VALUES ('Marketing Ymobiz', '170', '1412514799');
INSERT INTO `ymo_auth_assignment` VALUES ('Network Ymobiz', '171', '1412514895');
INSERT INTO `ymo_auth_assignment` VALUES ('Partner Account', '156', '1411821329');
INSERT INTO `ymo_auth_assignment` VALUES ('Partner Seller', '155', '1411821285');
INSERT INTO `ymo_auth_assignment` VALUES ('Partner Seller', '166', '1412038072');
INSERT INTO `ymo_auth_assignment` VALUES ('Partner Seller', '168', '1412240825');
INSERT INTO `ymo_auth_assignment` VALUES ('Partner Supervisor', '107', '1411813161');
INSERT INTO `ymo_auth_assignment` VALUES ('Partner Supervisor', '157', '1411821390');
INSERT INTO `ymo_auth_assignment` VALUES ('Partner Supervisor', '158', '1411822784');
INSERT INTO `ymo_auth_assignment` VALUES ('Partner Supervisor', '159', '1411822967');
INSERT INTO `ymo_auth_assignment` VALUES ('Partner Supervisor', '161', '1411914751');
INSERT INTO `ymo_auth_assignment` VALUES ('Partner Supervisor', '176', '1412886672');
INSERT INTO `ymo_auth_assignment` VALUES ('Partner Supervisor', '177', '1412886827');
INSERT INTO `ymo_auth_assignment` VALUES ('Settings Ymobiz', '174', '1412514849');
INSERT INTO `ymo_auth_assignment` VALUES ('Staff Call', '151', '1411820998');
INSERT INTO `ymo_auth_assignment` VALUES ('Staff Compliance', '152', '1411821042');
INSERT INTO `ymo_auth_assignment` VALUES ('Staff Emission', '154', '1411821242');
INSERT INTO `ymo_auth_assignment` VALUES ('Staff Treasury', '153', '1411821084');

-- ----------------------------
-- Table structure for ymo_auth_item
-- ----------------------------
DROP TABLE IF EXISTS `ymo_auth_item`;
CREATE TABLE `ymo_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `redirect` varchar(255) DEFAULT NULL,
  `data` text,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `ymo_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `ymo_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_auth_item
-- ----------------------------
INSERT INTO `ymo_auth_item` VALUES ('*', '2', null, null, 'site', null, '1401972324', '1401972324');
INSERT INTO `ymo_auth_item` VALUES ('admin', '1', 'Rules from admin', null, 'supervisor', null, '1401972314', '1408894601');
INSERT INTO `ymo_auth_item` VALUES ('Admin Superuser', '1', 'Default Permissions from a Admin Superuser', null, 'superuser', null, '1410910517', '1410910517');
INSERT INTO `ymo_auth_item` VALUES ('Admin Supervisor', '1', 'Default Permissions from a Admin Supervisor', null, 'supervisor', null, '1410910492', '1410910492');
INSERT INTO `ymo_auth_item` VALUES ('Admin Ymobiz', '1', 'Rules from master admin in cluster Ymobiz', null, 'manager', null, '1412465761', '1412465761');
INSERT INTO `ymo_auth_item` VALUES ('Backoffice Ymobiz', '1', 'Rules from backoffice module', null, 'backoffice', null, '1412514778', '1412514778');
INSERT INTO `ymo_auth_item` VALUES ('backoffice/*', '2', null, null, null, null, '1412514644', '1412514644');
INSERT INTO `ymo_auth_item` VALUES ('Business Ymobiz', '1', 'Rules from business module', null, 'business ', null, '1412514706', '1412514706');
INSERT INTO `ymo_auth_item` VALUES ('business/*', '2', null, null, null, null, '1412514613', '1412514613');
INSERT INTO `ymo_auth_item` VALUES ('Card Holder', '1', 'Role for Car Holder user group', null, 'card-holder', null, '1409063372', '1410102971');
INSERT INTO `ymo_auth_item` VALUES ('card-holder/default/*', '2', null, null, null, null, '1409063693', '1409063693');
INSERT INTO `ymo_auth_item` VALUES ('debug/*', '2', null, null, null, null, '1409064112', '1409064112');
INSERT INTO `ymo_auth_item` VALUES ('dev', '1', 'Rules from dev', null, 'dev', null, '1401972352', '1401972352');
INSERT INTO `ymo_auth_item` VALUES ('Guest Role', '1', 'Role for guest actions', null, null, null, '1409064035', '1409064035');
INSERT INTO `ymo_auth_item` VALUES ('Marketing Ymobiz', '1', 'Rules from marketing module', null, 'marketing', null, '1412514677', '1412514677');
INSERT INTO `ymo_auth_item` VALUES ('marketing/*', '2', null, null, null, null, '1412514603', '1412514603');
INSERT INTO `ymo_auth_item` VALUES ('Network Ymobiz', '1', 'Rules from network module', null, 'network', null, '1412514733', '1412514733');
INSERT INTO `ymo_auth_item` VALUES ('network/*', '2', null, null, null, null, '1412514624', '1412514624');
INSERT INTO `ymo_auth_item` VALUES ('Partner Account', '1', 'Default Permissions from a Partner Account', null, 'partner-account', null, '1410909957', '1410909957');
INSERT INTO `ymo_auth_item` VALUES ('Partner Seller', '1', 'Default Permissions from a Partner Seller', null, 'partner-seller', null, '1408735126', '1410909819');
INSERT INTO `ymo_auth_item` VALUES ('Partner Supervisor', '1', 'Default Permissions from a Partner Supervisor', null, 'partner-supervisor', null, '1410910005', '1410910005');
INSERT INTO `ymo_auth_item` VALUES ('partner-account/*', '2', null, null, null, null, '1410911407', '1410911407');
INSERT INTO `ymo_auth_item` VALUES ('partner-seller/*', '2', null, null, null, null, '1410906597', '1410906597');
INSERT INTO `ymo_auth_item` VALUES ('partner-supervisor/*', '2', null, null, null, null, '1410911236', '1410911236');
INSERT INTO `ymo_auth_item` VALUES ('partner/default/index', '2', null, null, null, null, '1408735254', '1408735254');
INSERT INTO `ymo_auth_item` VALUES ('Settings Ymobiz', '1', 'Rules from settings module', null, 'settings', null, '1412514748', '1412514748');
INSERT INTO `ymo_auth_item` VALUES ('settings/*', '2', null, null, null, null, '1412514634', '1412514634');
INSERT INTO `ymo_auth_item` VALUES ('site/default/*', '2', null, null, null, null, '1409063869', '1409063869');
INSERT INTO `ymo_auth_item` VALUES ('site/default/error', '2', null, null, null, null, '1409064003', '1409064003');
INSERT INTO `ymo_auth_item` VALUES ('site/error', '2', null, null, null, null, '1409064011', '1409064011');
INSERT INTO `ymo_auth_item` VALUES ('Staff Call', '1', 'Default Permissions from a Staff Call', null, 'staff-call', null, '1410910360', '1410910360');
INSERT INTO `ymo_auth_item` VALUES ('Staff Compliance', '1', 'Default Permissions from a Staff Compliance', null, 'staff-compliance', null, '1410910388', '1410910388');
INSERT INTO `ymo_auth_item` VALUES ('Staff Emission', '1', 'Default Permissions from a Staff Emission', null, 'staff-emission', null, '1410910435', '1410910435');
INSERT INTO `ymo_auth_item` VALUES ('Staff Treasury', '1', 'Default Permissions from a Staff Treasury', null, 'staff-treasury', null, '1410910406', '1410910406');
INSERT INTO `ymo_auth_item` VALUES ('staff-call/*', '2', null, null, null, null, '1410911419', '1410911419');
INSERT INTO `ymo_auth_item` VALUES ('staff-compliance/*', '2', null, null, null, null, '1410911441', '1410911441');
INSERT INTO `ymo_auth_item` VALUES ('staff-emission/*', '2', null, null, null, null, '1410911451', '1410911451');
INSERT INTO `ymo_auth_item` VALUES ('staff-treasury/*', '2', null, null, null, null, '1410911430', '1410911430');
INSERT INTO `ymo_auth_item` VALUES ('superuser/*', '2', null, null, null, null, '1410911480', '1410911480');
INSERT INTO `ymo_auth_item` VALUES ('supervisor/*', '2', null, null, null, null, '1410911468', '1410911468');

-- ----------------------------
-- Table structure for ymo_auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `ymo_auth_item_child`;
CREATE TABLE `ymo_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `ymo_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `ymo_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ymo_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `ymo_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_auth_item_child
-- ----------------------------
INSERT INTO `ymo_auth_item_child` VALUES ('admin', '*');
INSERT INTO `ymo_auth_item_child` VALUES ('Admin Ymobiz', '*');
INSERT INTO `ymo_auth_item_child` VALUES ('dev', '*');
INSERT INTO `ymo_auth_item_child` VALUES ('Backoffice Ymobiz', 'backoffice/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Business Ymobiz', 'business/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Card Holder', 'card-holder/default/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Guest Role', 'debug/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Marketing Ymobiz', 'marketing/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Network Ymobiz', 'network/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Partner Account', 'partner-account/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Partner Seller', 'partner-seller/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Partner Supervisor', 'partner-supervisor/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Settings Ymobiz', 'settings/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Card Holder', 'site/default/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Guest Role', 'site/default/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Guest Role', 'site/default/error');
INSERT INTO `ymo_auth_item_child` VALUES ('Guest Role', 'site/error');
INSERT INTO `ymo_auth_item_child` VALUES ('Staff Call', 'staff-call/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Staff Compliance', 'staff-compliance/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Staff Emission', 'staff-emission/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Staff Treasury', 'staff-treasury/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Admin Superuser', 'superuser/*');
INSERT INTO `ymo_auth_item_child` VALUES ('Admin Supervisor', 'supervisor/*');

-- ----------------------------
-- Table structure for ymo_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `ymo_auth_rule`;
CREATE TABLE `ymo_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_session
-- ----------------------------
DROP TABLE IF EXISTS `ymo_session`;
CREATE TABLE `ymo_session` (
  `id` char(40) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  `captcha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ymo_user
-- ----------------------------
DROP TABLE IF EXISTS `ymo_user`;
CREATE TABLE `ymo_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cluster_id` varchar(50) DEFAULT NULL,
  `group_id` varchar(50) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `receive_news` int(11) DEFAULT NULL,
  `logged_in_at` int(11) DEFAULT NULL,
  `confirmation_token` varchar(32) DEFAULT NULL,
  `confirmation_sent_at` int(11) DEFAULT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `recovery_token` varchar(32) DEFAULT NULL,
  `recovery_sent_at` int(11) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registered_from` int(11) DEFAULT NULL,
  `logged_in_from` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `status_code` varchar(50) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_user
-- ----------------------------
INSERT INTO `ymo_user` VALUES ('50', 'MASTER', 'Admin', 'dev', 'SllXejhg1cw5C0jSe770eDv1bQaCoD-O', '$2y$10$Hf8jwCm56gCaE5Xpu4YX7.henHPoDLW3oUc2uzRlaE6JhjT9u1Chu', null, 'dev@ymobiz.com', 'yutyurtyutyutyutyu4567456456', '10', null, '1406570029', '', null, '1406570029', '', null, null, null, null, null, '1', 'active', '1403781273', '1406570029');
INSERT INTO `ymo_user` VALUES ('106', 'YMC', 'Account', 'jack chan', 'jmmwi6PxSKFPCriL0LIDlOhsVcrmlWO6', '$2y$10$kYgHgSouTec0rm1Ms65bAupawpZe0NcoA49lj5oAqYBn7miIxKn2m', null, 'ymocard@gmail.com', 'G1IiS78plOwftwxJCDelDhPJZ8M9ICvF', '10', null, '1412857454', null, null, '1412857454', null, null, null, null, null, null, '1', 'active', '1410051099', '1412857454');
INSERT INTO `ymo_user` VALUES ('107', 'YMC', 'Partner', 'Xpto Inc', 'zLIcgA1S-C0qPM7kSUyAsmjMJ4aOL_Bi', '$2y$10$nbdQP0e3qIxzuo6MS9sTlO13vN8djvFwekK1U8TcSoLkpjowSc.5S', null, 'partner001@ymocard.com', '84fghfghfghrty45763425234524', '10', null, '1412892456', null, null, '1412892456', null, null, null, null, null, null, '1', 'active', '1410905788', '1412892456');
INSERT INTO `ymo_user` VALUES ('129', 'MASTER', 'Admin', 'master', 'ZXqcR65zcXCdSHvqqlJROl3-3zP3LUZ_', '$2y$10$.u7ZZFxTTIVsHN7.c5MC0eoN87cVpFI/QLyRpo8RvYK8QPbfCzLJG', null, 'master@ymocard.com', null, '10', null, '1412890460', null, null, '1412890460', null, null, null, null, null, null, '1', 'active', '1411475316', '1412890460');
INSERT INTO `ymo_user` VALUES ('150', 'YMC', 'Admin', 'Supervisor 001', '5KitjsLVIraLM-o4k0XoYRKG2Arlp55b', '$2y$10$KXNETsYZ1vHJ8O.dvv5.I.TlENEGo1jdUASEJf8V3LpZvCEAFxzDG', null, 'supervisor001@ymocard.com', 'l31UO7ad9bTx4jd14uHxyxkSHYCVrSOX', '10', null, '1412244070', null, null, '1412244070', null, null, null, null, null, null, '1', 'active', '1411739050', '1412244070');
INSERT INTO `ymo_user` VALUES ('151', 'YMC', 'Call Center', 'Staff Call 001', '3hlyJSBaFwZpTT45xrAoKIYIdbLQeZd-', '$2y$10$8fVOzOH1sHO2m6agpBGnCeZg9NiaNWGA7fuAvQITC7nwQwmKxjrHe', null, 'staffcall001@ymocard.com', 'uQgs30Tnzgs380NcntN16NggPus3CqGV', '10', null, '1412856904', null, null, '1412856904', null, null, null, null, null, null, '1', 'active', '1411820994', '1412856904');
INSERT INTO `ymo_user` VALUES ('152', 'YMC', 'Staff', 'Staff Compliance 001', 'BrLKOSIBG1zAUAKVQ9XaDkOnFcuqGWoz', '$2y$10$zX6Lwj5fyW4LVtGKQuZKAee8Qt8irDPXxPgGWEFnmymRp2fX1hMZC', null, 'staffcompliance001@ymocard.com', 'hq4YVCO1DTnNHpQ4V10JYXh-SSPWPMwd', '10', null, '1412856755', null, null, '1412856755', null, null, null, null, null, null, '1', 'active', '1411821038', '1412856755');
INSERT INTO `ymo_user` VALUES ('153', 'YMC', 'Staff', 'Staff Treasury 001', 'VmbYeSfitLt17jrF0UFvKC81AyRFVCAg', '$2y$10$A67gUHWZ3Yklbr.gZNr5auviJQkqSr7T1zQhuhvQ0i97W1YSToZUa', null, 'stafftreasury001@ymocard.com', 'h10JJe9sl6nymiVWoyvU02_NsMkceoH7', '10', null, '1412680427', null, null, '1412680427', null, null, null, null, null, null, '1', 'active', '1411821080', '1412680427');
INSERT INTO `ymo_user` VALUES ('154', 'YMC', 'Staff', 'Staff Emission 001', '40yjMTyvWL9fikT0_E-qsTB5NAwFTyIu', '$2y$10$i1U31AodLt4lWEp4qsJBTuMio5iINJZeTsKwIYovteCYbuIqosmu2', null, 'staffemission001@ymocard.com', 'gkccFV0ZWHMSuL7EWu81ISfFlWoHEGf4', '10', null, '1412680940', null, null, '1412680940', null, null, null, null, null, null, '1', 'active', '1411821238', '1412680940');
INSERT INTO `ymo_user` VALUES ('155', 'YMC', 'Seller', 'Partner Seller 001', 'GQ4t_WAq8ASk_4kAKU8XW1LfdjjKKMeX', '$2y$10$racb7/DDXULq7wKY.WQk6.lAgZ0dwz63oDoApizpmy6C8a/ej0gZK', null, 'partnerseller001@ymocard.com', 'TVxc2QR2JPztkR8fc6AAqaFT461DRAE3', '10', null, '1412678215', null, null, '1412678215', null, null, null, null, null, null, '1', 'active', '1411821281', '1412678215');
INSERT INTO `ymo_user` VALUES ('156', 'YMC', 'Account', 'Partner Account 001', 's8vQD7EU5a85d3VXg2Npmda2syni60GY', '$2y$10$et4a0dPi7hi7CHFefAhx2unOaEmTaxYbj9MaSwXAD/uZXVTMkrQ0S', null, 'partneraccount001@ymocard.com', '3DEMN4a_mVg2uHcwTmPLRrGaLE6VDgUA', '10', null, '1412679030', null, null, '1412679030', null, null, null, null, null, null, '1', 'active', '1411821324', '1412679030');
INSERT INTO `ymo_user` VALUES ('157', 'YMC', 'Partner', 'Partner Supervisor 001', '1LqWlaPA6--hwvzu1yJuwOJjtuBHVCbk', '$2y$10$5anJQk3LUqkivdkpwK0.TOCm/Ww0CjqBRFD62wHDKneo9JaN1dleK', null, 'partnersupervisor001@ymocard.com', 'n_-1QtnNsVkwicwka8LSM-QuqO7DFV-D', '10', null, '1412616327', null, null, '1412616327', null, null, null, null, null, null, '1', 'active', '1411821385', '1412616327');
INSERT INTO `ymo_user` VALUES ('160', 'YMC', 'Staff', 'Client 002', 'X2Up8uNipe2ND-6vGAQabin_j_zTqmyt', '$2y$10$srugQN/ARnXJtJGcApt1v.4q0E6lgee93G1jt7oobzSaNYybzfnae', null, 'client002@ymocard.com', 'u_A85QotLtTjr8zzIPFqiiNzrfKvjDQf', '10', null, '1411899950', null, null, '1411899950', null, null, null, null, null, null, '1', 'active', '1411899937', '1411899950');
INSERT INTO `ymo_user` VALUES ('161', 'YMC', 'Partner', 'Partner Supervisor 002', 'v4u6R4EBmu6s8AIsY0GoCxDQwhnKpsCJ', '$2y$10$QPi.GhmyQkswSDnVi9hjPuBkSaUITbdOigQfthkN8c1QQ3KYQZ52G', null, 'partnersupervisor002@ymocard.com', 'TzJM6ct6A0nmmaYKQUG3qNg9rjudsSf6', '10', null, '1412188777', null, null, '1412188777', null, null, null, null, null, null, '1', 'active', '1411914747', '1412188777');
INSERT INTO `ymo_user` VALUES ('166', 'YMC', 'Seller', 'Other Seller 001', 'Bwj1PftqhMN3JFn2yM9pmXt2ZH7S-Wxq', '$2y$10$HLN18TghhgKboup3lmnFo.pksP1CUQZIeAlZ0vzkaGeRgMT11FLb2', null, 'otherseller001@ymocard.com', 'Cs5kNvuYId6HUobicL1K1ObRwZ-FBJ11', '10', null, null, null, null, '1412038067', null, null, null, null, null, null, '1', 'active', '1412038067', '1412038067');
INSERT INTO `ymo_user` VALUES ('169', 'MASTER', 'Admin', 'Admin Ymobiz 001', 'z10lL04xozBlG3JZf4izMci3RqnegbZM', '$2y$10$J.Qcn0mCrhgjhvaykp4XEe9jS6D4g.f2aq8Okh6a1zdDrtzWR1OBG', null, 'master@ymobiz.com', null, '10', null, '1412466528', null, null, '1412466528', null, null, null, null, null, null, '1', 'active', '1412465610', '1412466528');
INSERT INTO `ymo_user` VALUES ('170', 'YMO', 'Marketing', 'Marketing 001', '6SksfGWfiBHOkmPUoFS0mAtq0sCwEDdl', '$2y$10$Q1dULQYuVuGzP8pSbrxnJu2oQVmCILjuHp5OJVAb.0I47zIXWGHhW', null, 'marketing001@ymobiz.com', null, '10', null, '1412515008', null, null, '1412515008', null, null, null, null, null, null, '1', 'active', '1412514411', '1412515008');
INSERT INTO `ymo_user` VALUES ('171', 'YMO', 'Network', 'Network 001', 'UQCJEeqC8M-wuEBGo9cRE0F3zITffuZR', '$2y$10$DDlgb/MpjvdVBueovcZO6Oc4yTdCdQ1B1QCdX8dUIEVF8YXl.qrdK', null, 'network001@ymobiz.com', null, '10', null, null, null, null, '1412514444', null, null, null, null, null, null, '1', 'active', '1412514444', '1412514444');
INSERT INTO `ymo_user` VALUES ('172', 'YMO', 'Business', 'Business 001', 'DTYKuTkTgs9oWHDw4_Y03VrWBhyyTT08', '$2y$10$/v0RuXNQU1mx7/iNmYASQOTREz1HK0SbAXOzAIUGS.DyqE.j/DwPW', null, 'business001@ymobiz.com', null, '10', null, null, null, null, '1412514467', null, null, null, null, null, null, '1', 'active', '1412514467', '1412514467');
INSERT INTO `ymo_user` VALUES ('173', 'YMO', 'Backoffice', 'Backoffice 001', 'jtHwv1D8DzE2RsXPO3YunIrXLMHbXvmx', '$2y$10$C8Ra0WpCzgb.wnaO6eJctu2b7MhQ08eQdTdEe8Aqc6VlT0ajQ/8gm', null, 'backoffice001@ymobiz.com', null, '10', null, null, null, null, '1412514496', null, null, null, null, null, null, '1', 'active', '1412514496', '1412514496');
INSERT INTO `ymo_user` VALUES ('174', 'YMO', 'Settings', 'Settings 001', '77OckFmSJ4zIs_ZSVKR3FJ4pi7f6Kq7D', '$2y$10$vI6rRHEWoa1HuAXIE4H2SufuTV0xTqKqMJNxPKRbipJJy/qnq5F.e', null, 'settings001@ymobiz.com', null, '10', null, null, null, null, '1412514520', null, null, null, null, null, null, '1', 'active', '1412514520', '1412514520');

-- ----------------------------
-- Table structure for ymo_users_activity
-- ----------------------------
DROP TABLE IF EXISTS `ymo_users_activity`;
CREATE TABLE `ymo_users_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` mediumtext,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ymo_clients_ymo_user1_idx` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_users_activity
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_user_copy
-- ----------------------------
DROP TABLE IF EXISTS `ymo_user_copy`;
CREATE TABLE `ymo_user_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cluster_id` varchar(50) DEFAULT NULL,
  `group_id` varchar(50) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `receive_news` int(11) DEFAULT NULL,
  `logged_in_at` int(11) DEFAULT NULL,
  `confirmation_token` varchar(32) DEFAULT NULL,
  `confirmation_sent_at` int(11) DEFAULT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `recovery_token` varchar(32) DEFAULT NULL,
  `recovery_sent_at` int(11) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registered_from` int(11) DEFAULT NULL,
  `logged_in_from` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `status_code` varchar(50) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_user_copy
-- ----------------------------
INSERT INTO `ymo_user_copy` VALUES ('50', 'YMC', 'Admin', 'dev', 'OR7DVcgDvDY9z7t6XpmEsc7s8zBvl4u3', '$2y$10$Hf8jwCm56gCaE5Xpu4YX7.henHPoDLW3oUc2uzRlaE6JhjT9u1Chu', null, 'dev@ymobiz.com', 'yutyurtyutyutyutyu4567456456', '10', null, '1406570029', '', null, '1406570029', '', null, null, null, null, null, '1', 'active', '1403781273', '1406570029');
INSERT INTO `ymo_user_copy` VALUES ('53', 'YMC', 'Admin', 'josecarlos', 'v_sPnr5DNVgwfQvF4lSDCqvT9f53a3jt', '$2y$10$.DOzqdqn9HZTfliNJRjZ..wPECSMXRi1skcht3Zr9PL7ZTA9R.V1q', null, 'josecarlosdagraca@gmail.com', '546436utyrt365345634rty', '10', null, null, null, null, '1405463431', null, null, null, null, null, null, '1', 'active', '1405463431', '1405463431');
INSERT INTO `ymo_user_copy` VALUES ('54', 'YMC', 'Staff', 'client', 'm-JeTytEx3J-9chjOE6sNcCzejVLwpXi', '$2y$10$Vm6B1w3vJVtgMpNl9W8E9OTWXTb.t9RVao90CpdzHPITEVWYJpOyq', null, 'client@ymocard.com', 'rtyrty456rtyrtyrtyt', '10', null, '1411122386', null, null, '1411122386', null, null, null, null, null, null, '1', 'active', '1407435866', '1411122386');
INSERT INTO `ymo_user_copy` VALUES ('56', 'YMC', 'Staff', 'joao', 'kClYNzMEgBZQd2AQ_3XIL93PXrJHmcaR', '$2y$10$8f1/VMJnaz1qQGE3NucN5eOEf78VNMeH.sY9lD3YIwrqKZ7K5./z6', null, 'joao@teste.com', '4365435rtyrtytry', '10', null, null, null, null, '1408915565', null, null, null, null, null, null, '1', 'active', '1408896432', '1408915565');
INSERT INTO `ymo_user_copy` VALUES ('57', 'YMC', 'Partner', 'Arnold Stalone', 'gzDP0nUj9ITCaUrrUOubl3jyvY4xhQ-_', '$2y$10$PEpT8PF9FSn.rbSmQyGucuzZxFaE9XIfmwFEkWMkWuiXU5bD6FwYe', null, 'arnold@ymocard.ws', '47645yrtyrtytrytry324rer', '10', null, '1409063844', null, null, '1408915565', null, null, null, null, null, null, '1', 'active', '1409063329', '1409063844');
INSERT INTO `ymo_user_copy` VALUES ('106', 'YMC', 'Staff', 'jack chan', '7XbWtFeQYkhDtbFaHyCiiOHXV4RiicEa', '$2y$10$NxCCv88hk/SC7VwWvPCtie.GI6gOG7X373BA6XD/RWtMsL2girjf.', null, 'ymocard@gmail.com', 'G1IiS78plOwftwxJCDelDhPJZ8M9ICvF', '10', null, '1411565033', null, null, '1411565033', null, null, null, null, null, null, '1', 'active', '1410051099', '1411565033');
INSERT INTO `ymo_user_copy` VALUES ('107', 'YMC', 'Partner', 'Xpto Inc', 'jKnpNJngyjta6XEnq65sx2Tr4CJLzabH', '$2y$10$z75g/mpXmE.AXqLqsrQU/OwY3cTjdtc/WdaUisP52RLy/.cBhlFLm', null, 'partner_ymocard@gmail.com', '84fghfghfghrty45763425234524', '10', null, '1410963631', null, null, '1410963834', null, null, null, null, null, null, '1', 'active', '1410905788', '1410963834');
INSERT INTO `ymo_user_copy` VALUES ('125', 'YMC', 'Staff', 'Staff Member 001', 'XOTyF2kS10GMIrJ_jJWEcC1Q8CPMmJkO', '$2y$10$oVS3DPwqSwhnRF/gfDAJnuHsyTq4ONSUui5C9ZVli98k5DFyv3ZL2', null, 'staff001@email.com', 'QkLoLuvP3XlMF9X_w1hULAYPa3zQrgaG', '10', null, '1411227536', null, null, '1411495394', null, null, null, null, null, null, '1', 'active', '1411227133', '1411495394');
INSERT INTO `ymo_user_copy` VALUES ('126', 'YMC', 'Partner', 'Partner Member 001', 'XtkLrTXECtdDC2A1R0JeHwYqyl58X0sA', '$2y$10$wes99xp2CJyHETNPPUt.wuEZZg.evgoAyGpR/LRkZGHmATGLuBtCW', null, 'partner001@email.com', 'X-WzqgoYAiQZjvLYg5_9aPVaqV5q3Wqf', '10', null, '1411227699', null, null, '1411227699', null, null, null, null, null, null, '1', 'active', '1411227338', '1411227699');
INSERT INTO `ymo_user_copy` VALUES ('127', 'YMC', 'Admin', 'Admin Member 001', 'JEj7OpMSZvMSpP9R_T06hiv2BOsYKnup', '$2y$10$XlXQBMs8.0AfsHxYACd8T.h9R0CD/hWOI29HZP7eQhBxiWzvKFyd2', null, 'admin001@email.com', 'd1FTdyPQ8ZZEuzRqoO7trbU8sJJZ8ZfE', '10', null, '1411227787', null, null, '1411227787', null, null, null, null, null, null, '1', 'active', '1411227390', '1411227787');
INSERT INTO `ymo_user_copy` VALUES ('128', 'YMC', 'Call Center', 'Call Center Member 001', '7TucmJsiWcviNygkZUMyje6UPXG8-2Uk', '$2y$10$M0WDVLEJMz9pC1WQC7fi3.DTdFj/8YXWzEbbs6giMzbivnYeqwMvy', null, 'callcenter001@email.com', 'CUIznDp_jfw2OcKRdmenc3hEzt8FbmKD', '10', null, '1411227933', null, null, '1411227933', null, null, null, null, null, null, '1', 'active', '1411227430', '1411227933');
INSERT INTO `ymo_user_copy` VALUES ('129', 'MASTER', 'Admin', 'master', 'lc2DxjqYRM3fEWrQSLn1npJ8s81f_OMd', '$2y$10$dT1R33XAOXSs6nUYIj6we.OssJTcQo9q5ipXMjH1qey3x7a901Owy', null, 'master@ymocard.com', null, '10', null, null, null, null, '1411475316', null, null, null, null, null, null, '1', 'active', '1411475316', '1411475316');
