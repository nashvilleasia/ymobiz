SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dev
-- ----------------------------
DROP TABLE IF EXISTS `dev`;
CREATE TABLE `dev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `content` longtext,
  `path` text CHARACTER SET utf8,
  `mimetype` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `extension` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dev
-- ----------------------------
INSERT INTO `dev` VALUES ('1', 'Portugal', 'email@ymocard.com', '123456', 'Albania,Brazil,Portugal', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis cursus interdum tellus ut porta. Maecenas sagittis felis sit amet molestie vestibulum. Donec non feugiat elit. Suspendisse potenti. Aenean vulputate euismod lectus sit amet cursus. Phasellus porttitor viverra vehicula. Morbi tincidunt mattis justo. Duis pellentesque, nisl sed vestibulum gravida, velit enim pretium metus, quis eleifend lorem enim consequat magna. Aenean a libero diam. Curabitur ac lacinia mauris.', null, null, null, '1434669900', '1405345821');
INSERT INTO `dev` VALUES ('2', 'montain.jpg', null, null, null, null, '<iframe width=\"363\" height=\"240\" src=\"//www.youtube.com/embed/quXw0K3ESTk?rel=0\" frameborder=\"0\" allowfullscreen></iframe>', '/home/web/upload/', 'image/jpeg', 'jpg', '1402926901', '1410188472');
INSERT INTO `dev` VALUES ('3', 'American Samoa', null, null, null, '1', null, null, null, null, '1402926901', '1405966505');
INSERT INTO `dev` VALUES ('4', 'Video Embed', null, null, null, null, '<iframe width=\"363\" height=\"240\" src=\"//www.youtube.com/embed/quXw0K3ESTk\" frameborder=\"0\" allowfullscreen></iframe>', null, null, null, '1402926901', '1404250698');
INSERT INTO `dev` VALUES ('5', 'TypeHeadJs', null, null, 'Brazil', null, null, null, null, null, '1402926901', '1405336682');
INSERT INTO `dev` VALUES ('6', 'Full Freedom in Money Transactions', null, null, null, null, '<p>\r\n                        É um cartão de débito\r\n                            pré-pago recarregável tanto pela empresa contratante, como pelo\r\n                            próprio usuário. Ele oferece vantagens e serviços, de forma simples e direta, criadas\r\n                            especialmente para seus negócios. Além de todas as vantagens, o cartão pode agregar\r\n                            diversos serviços como cobrança, relacionamento e fidelização, produtos financeiros,\r\n                            cargas de telefonia, entre outros.<br><br>\r\n                            O MOBICARD é um cartão de saque na rede Banco 24HORAS. Pode ser utilizado em compra de\r\n                            produtos em mais de 1.500.000 de estabelecimentos em toda a Rede VISA E VISA ELETRON,\r\n                            além da facilidade de utilização via internet.<br><br>\r\n                            Através de parcerias com instituições renomadas, o cartão MOBICARD oferece uma diversidade\r\n                            de serviços financeiros, com vantagens exclusivas para colaboradores e clientes, agregando\r\n                            valores ao produto e oferecendo “CIDADANIA FINANCEIRA” aos usuários.<br><br>\r\n                            Confira nosso portfólio de serviços que pode ser agregado ao cartão:<br><br>						<strong>\r\n                            • Seguro de Acidentes Pessoais premiáveis;<br><br>\r\n                                • Crédito pré-aprovado;<br><br>\r\n                                • Carga para telefonia fixa ou móvel com economia de até 40% nos custos das ligações;<br><br>\r\n                                • Recargas de telefones celulares por telefone ou internet;<br><br>\r\n                                • Prêmios em dinheiro originados em sorteios legitimados por Títulos de Capitalização						</strong>\r\n					</p>', null, null, null, '0', '1403811338');
INSERT INTO `dev` VALUES ('7', 'Order your Ymocard®', null, null, null, null, '<br>Items marked with a * are mandatory.<br>All fields must be completed with Latin Characters only.<br>', null, null, null, '0', '1409259791');
INSERT INTO `dev` VALUES ('8', 'terms&conditions', null, null, null, null, ' <p>\r\n                        Nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat ut wisi enim ad!\r\n                        In iis qui facit eorum claritatem Investigationes demonstraverunt lectores legere me lius quod.\r\n                        Quam littera gothica quam nunc putamus parum claram anteposuerit litterarum formas. Et quinta\r\n                        decima eodem modo typi qui nunc nobis videntur: parum clari fiant sollemnes in. Exerci tation\r\n                        ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat duis autem vel eum.\r\n                        Saepius claritas est etiam processus dynamicus qui sequitur mutationem consuetudium lectorum\r\n                        mirum est. <br/><br/>\r\n                        Iusto odio dignissim qui, blandit praesent luptatum zzril delenit. Suscipit lobortis nisl ut\r\n                        aliquip ex ea commodo consequat. Amet consectetuer adipiscing elit sed diam nonummy nibh.\r\n                        Qui nunc nobis videntur parum clari fiant sollemnes in? Quam nunc putamus parum claram\r\n                        anteposuerit litterarum formas humanitatis per. Facer possim assum typi non habent claritatem\r\n                        insitam est usus legentis! Congue nihil imperdiet doming id quod mazim placerat in!<br/><br/>\r\n                        Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis per seacula quarta\r\n                        decima et quinta decima. Autem vel eum iriure dolor in hendrerit in vulputate velit esse\r\n                        molestie! Littera gothica eodem modo typi qui nunc nobis videntur parum clari fiant sollemnes\r\n                        in? Nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent.\r\n                        Adipiscing elit sed, diam nonummy nibh euismod tincidunt ut laoreet. Luptatum zzril delenit\r\n                        augue duis dolore te feugait nulla facilisi nam liber tempor cum soluta. Congue nihil imperdiet\r\n                        doming id quod mazim placerat. Ea commodo consequat duis consequat vel illum dolore eu.\r\n                        Congue nihil imperdiet doming id quod mazim placerat. Ea commodo consequat duis consequat\r\n                        vel illum dolore eu.<br/><br/>\r\n                        Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis per seacula quarta\r\n                        decima et quinta decima. Autem vel eum iriure dolor in hendrerit in vulputate velit esse\r\n                        molestie! Littera gothica eodem modo typi qui nunc nobis videntur parum clari fiant sollemnes\r\n                        in? Nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent.\r\n                        Adipiscing elit sed, diam nonummy nibh euismod tincidunt ut laoreet. Luptatum zzril delenit\r\n                        augue duis dolore te feugait nulla facilisi nam liber tempor cum soluta. Congue nihil imperdiet\r\n                        doming id quod mazim placerat. Ea commodo consequat duis consequat vel illum dolore eu.\r\n                        Congue nihil imperdiet doming id quod mazim placerat. Ea commodo consequat duis consequat\r\n                        vel illum dolore eu.\r\n                    </p>', null, null, null, '0', '0');
INSERT INTO `dev` VALUES ('9', 'faqs', null, null, null, null, '<div class=\"col-md-12 popup-list\"><ul class=\"popup-faqs-list\">\r\n                        <li>\r\n                            <a href=\"#\">\r\n                                <span>1 |</span>\r\n                               Dignissim qui blandit praesent luptatum; zzril delenit augue?\r\n                            </a>\r\n                        </li>\r\n                        <li>\r\n                            <a href=\"#\">\r\n                                <span>2 |</span>\r\n                                Erat volutpat ut wisi enim ad minim veniam quis nostrud exerci tation ullamcorper suscipit lobortis?\r\n                            </a>\r\n                        </li>\r\n                        <li>\r\n                            <a href=\"#\">\r\n                                <span>3 |</span>\r\n                                Vel illum dolore eu feugiat nulla facilisis at vero eros?\r\n                            </a>\r\n                        </li>\r\n                        <li>\r\n                            <a href=\"#\">\r\n                                <span>4 |</span>\r\n                                Et quinta decima eodem modo typi qui nunc nobis videntur parum clari fiant sollemnes in?\r\n                            </a>\r\n                        </li>\r\n                        <li>\r\n                            <a href=\"#\">\r\n                                <span>5 |</span>\r\n                                Facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit?\r\n                            </a>\r\n                        </li>\r\n                    </ul>\r\n                    <hr>\r\n                    <ul class=\" popup-text\">\r\n                        <li>\r\n                            <p>\r\n                                <span>1 |</span>\r\n                                Dignissim qui blandit praesent luptatum; zzril delenit augue?<br><br>\r\n                                Legentis in iis qui facit eorum claritatem Investigationes demonstraverunt lectores\r\n                                legere. Iriure dolor in hendrerit in vulputate velit esse molestie consequat vel.\r\n                                Liber tempor cum: soluta nobis eleifend option congue! Notare quam littera gothica\r\n                                quam nunc putamus parum claram. Dignissim qui blandit praesent luptatum zzril delenit\r\n                                augue duis; dolore te feugait nulla. Aliquam erat volutpat ut wisi enim ad minim.\r\n                                Claritas est etiam processus dynamicus qui sequitur mutationem consuetudium lectorum mirum?\r\n                            </p>\r\n                        </li>\r\n                        <li>\r\n                            <p>\r\n                                <span>2 |</span>\r\n                                Dignissim qui blandit praesent luptatum; zzril delenit augue?<br><br>\r\n                                Legentis in iis qui facit eorum claritatem Investigationes demonstraverunt lectores\r\n                                legere. Iriure dolor in hendrerit in vulputate velit esse molestie consequat vel.\r\n                                Liber tempor cum: soluta nobis eleifend option congue! Notare quam littera gothica\r\n                                quam nunc putamus parum claram. Dignissim qui blandit praesent luptatum zzril delenit\r\n                                augue duis; dolore te feugait nulla. Aliquam erat volutpat ut wisi enim ad minim.\r\n                                Claritas est etiam processus dynamicus qui sequitur mutationem consuetudium lectorum mirum?\r\n                            </p>\r\n                        </li>\r\n                    </ul></div>', null, null, null, '0', '0');
INSERT INTO `dev` VALUES ('10', null, 'email@teste.com', null, null, null, null, null, null, null, '1406897363', '1406897363');

-- ----------------------------
-- Table structure for ymo_business_areas
-- ----------------------------
DROP TABLE IF EXISTS `ymo_business_areas`;
CREATE TABLE `ymo_business_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `languages_id` varchar(100) DEFAULT NULL,
  `name` text,
  `content` longtext,
  `slug` text,
  `status` int(1) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_business_areas
-- ----------------------------
INSERT INTO `ymo_business_areas` VALUES ('1', null, 'Advertising', null, null, '1', '1412615929', '1412615929');
INSERT INTO `ymo_business_areas` VALUES ('2', null, 'Alternative/Renewable fuels', null, null, '1', '1412615961', '1412615961');
INSERT INTO `ymo_business_areas` VALUES ('3', null, 'American Government', null, null, '1', '1412615977', '1412615977');
INSERT INTO `ymo_business_areas` VALUES ('4', null, 'Anthropology', null, null, '1', '1412615986', '1412615986');
INSERT INTO `ymo_business_areas` VALUES ('5', null, 'Archaeology', null, null, '1', '1412615997', '1412615997');
INSERT INTO `ymo_business_areas` VALUES ('6', null, 'Arms Control', null, null, '1', '1412616009', '1412616009');
INSERT INTO `ymo_business_areas` VALUES ('7', null, 'Art Education (K-12)', null, null, '1', '1412616022', '1412616022');
INSERT INTO `ymo_business_areas` VALUES ('8', null, 'Asian American Studies', null, null, '1', '1412616033', '1412616033');
INSERT INTO `ymo_business_areas` VALUES ('9', null, 'Auditing', null, null, '1', '1412616061', '1412616061');
INSERT INTO `ymo_business_areas` VALUES ('10', null, 'Biofuels', null, null, '1', '1412616073', '1412616073');
INSERT INTO `ymo_business_areas` VALUES ('11', null, 'Behavior change and the environment', null, null, '1', '1412616083', '1412616083');
INSERT INTO `ymo_business_areas` VALUES ('12', null, 'Biomedical Sciences', null, null, '1', '1412616097', '1412616097');
INSERT INTO `ymo_business_areas` VALUES ('13', null, 'Book History / Print Culture History', null, null, '1', '1412616107', '1412616107');
INSERT INTO `ymo_business_areas` VALUES ('14', null, 'Brand Management', null, null, '1', '1412616117', '1412616117');
INSERT INTO `ymo_business_areas` VALUES ('15', null, 'Broadcasting', null, null, '1', '1412616127', '1412616127');
INSERT INTO `ymo_business_areas` VALUES ('16', null, 'Business Planning', null, null, '1', '1412616137', '1412616137');
INSERT INTO `ymo_business_areas` VALUES ('17', null, 'Business school education', null, null, '1', '1412616148', '1412616148');
INSERT INTO `ymo_business_areas` VALUES ('18', null, 'Business Statistics and Data (US and Int\'l government)', null, null, '1', '1412616159', '1412616159');
INSERT INTO `ymo_business_areas` VALUES ('19', null, 'Business Statistics and Data (US and Int\'l government)', null, null, '1', '1412616169', '1412616169');
INSERT INTO `ymo_business_areas` VALUES ('20', null, 'Business Statistics and Data (US and Int\'l government)', null, null, '1', '1412616179', '1412616179');
INSERT INTO `ymo_business_areas` VALUES ('21', null, 'Career and Technical education', null, null, '1', '1412616190', '1412616190');
INSERT INTO `ymo_business_areas` VALUES ('22', null, 'Career Information', null, null, '1', '1412616200', '1412616200');
INSERT INTO `ymo_business_areas` VALUES ('23', null, 'Censorship', null, null, '1', '1412616209', '1412616209');
INSERT INTO `ymo_business_areas` VALUES ('24', null, 'Children\'s and young adult literature', null, null, '1', '1412616220', '1412616220');
INSERT INTO `ymo_business_areas` VALUES ('25', null, 'Children\'s and young adult literature', null, null, '1', '1412616231', '1412616231');
INSERT INTO `ymo_business_areas` VALUES ('26', null, 'Climate change', null, null, '1', '1412616240', '1412616240');
INSERT INTO `ymo_business_areas` VALUES ('27', null, 'Communication', null, null, '1', '1412616250', '1412616250');
INSERT INTO `ymo_business_areas` VALUES ('28', null, 'Company and industry information', null, null, '1', '1412616260', '1412616260');
INSERT INTO `ymo_business_areas` VALUES ('29', null, 'Company and Industry information', null, null, '1', '1412616270', '1412616270');
INSERT INTO `ymo_business_areas` VALUES ('30', null, 'Company and Industry information', null, null, '1', '1412616281', '1412616281');
INSERT INTO `ymo_business_areas` VALUES ('31', null, 'Comparative Government', null, null, '1', '1412616290', '1412616290');
INSERT INTO `ymo_business_areas` VALUES ('32', null, 'Competitive intelligence', null, null, '1', '1412616300', '1412616300');
INSERT INTO `ymo_business_areas` VALUES ('33', null, 'Consulting', null, null, '1', '1412616309', '1412616309');
INSERT INTO `ymo_business_areas` VALUES ('34', null, 'Corporate and business theory', null, null, '1', '1412616319', '1412616319');
INSERT INTO `ymo_business_areas` VALUES ('35', null, 'Country data', null, null, '1', '1412616329', '1412616329');
INSERT INTO `ymo_business_areas` VALUES ('36', null, 'Curriculum and instruction', null, null, '1', '1412616339', '1412616339');
INSERT INTO `ymo_business_areas` VALUES ('37', null, 'Early childhood education', null, null, '1', '1412616349', '1412616349');
INSERT INTO `ymo_business_areas` VALUES ('38', null, 'E-commerce', null, null, '1', '1412616359', '1412616359');
INSERT INTO `ymo_business_areas` VALUES ('39', null, 'Economic statistics', null, null, '1', '1412616369', '1412616369');
INSERT INTO `ymo_business_areas` VALUES ('40', null, 'Educational policy, organization and leadership', null, null, '1', '1412616382', '1412616382');
INSERT INTO `ymo_business_areas` VALUES ('41', null, 'Educational psychology', null, null, '1', '1412616392', '1412616392');
INSERT INTO `ymo_business_areas` VALUES ('42', null, 'Elections and Voting', null, null, '1', '1412616404', '1412616404');
INSERT INTO `ymo_business_areas` VALUES ('43', null, 'Elementary education (K-9)', null, null, '1', '1412616414', '1412616414');
INSERT INTO `ymo_business_areas` VALUES ('44', null, 'Employee motivation', null, null, '1', '1412616423', '1412616423');
INSERT INTO `ymo_business_areas` VALUES ('45', null, 'Employment Relations', null, null, '1', '1412616433', '1412616433');
INSERT INTO `ymo_business_areas` VALUES ('46', null, 'Energy efficiency', null, null, '1', '1412616443', '1412616443');
INSERT INTO `ymo_business_areas` VALUES ('47', null, 'Entrepreneurship', null, null, '1', '1412616452', '1412616452');
INSERT INTO `ymo_business_areas` VALUES ('48', null, 'Environmental laws/regulations', null, null, '1', '1412616463', '1412616463');
INSERT INTO `ymo_business_areas` VALUES ('49', null, 'Environmental and energy data sets and statistics', null, null, '1', '1412616473', '1412616473');
INSERT INTO `ymo_business_areas` VALUES ('50', null, 'Environmental education', null, null, '1', '1412616483', '1412616483');
INSERT INTO `ymo_business_areas` VALUES ('51', null, 'Environmental Policy Studies', null, null, '1', '1412616493', '1412616493');
INSERT INTO `ymo_business_areas` VALUES ('52', null, 'Epidemiology', null, null, '1', '1412616502', '1412616502');
INSERT INTO `ymo_business_areas` VALUES ('53', null, 'European Union Studies', null, null, '1', '1412616511', '1412616511');
INSERT INTO `ymo_business_areas` VALUES ('54', null, 'Evidence-Based Practice', null, null, '1', '1412616521', '1412616521');
INSERT INTO `ymo_business_areas` VALUES ('55', null, 'Finance', null, null, '1', '1412616530', '1412616530');
INSERT INTO `ymo_business_areas` VALUES ('56', null, 'Financial statistics', null, null, '1', '1412616540', '1412616540');
INSERT INTO `ymo_business_areas` VALUES ('57', null, 'Financial structure', null, null, '1', '1412616550', '1412616550');
INSERT INTO `ymo_business_areas` VALUES ('58', null, 'Financial structure', null, null, '1', '1412616560', '1412616560');
INSERT INTO `ymo_business_areas` VALUES ('59', null, 'Gender and Women\'s Studies', null, null, '1', '1412616570', '1412616570');
INSERT INTO `ymo_business_areas` VALUES ('60', null, 'Geography', null, null, '1', '1412616579', '1412616579');
INSERT INTO `ymo_business_areas` VALUES ('61', null, 'Global Health', null, null, '1', '1412616590', '1412616590');
INSERT INTO `ymo_business_areas` VALUES ('62', null, 'Global Studies', null, null, '1', '1412616599', '1412616599');
INSERT INTO `ymo_business_areas` VALUES ('63', null, 'Great lakes environment', null, null, '1', '1412616610', '1412616610');
INSERT INTO `ymo_business_areas` VALUES ('64', null, 'Green business', null, null, '1', '1412616619', '1412616619');
INSERT INTO `ymo_business_areas` VALUES ('65', null, 'Green Government', null, null, '1', '1412616629', '1412616629');
INSERT INTO `ymo_business_areas` VALUES ('66', null, 'Green Libraries', null, null, '1', '1412616638', '1412616638');
INSERT INTO `ymo_business_areas` VALUES ('67', null, 'Green Manufacturing/industrial practices', null, null, '1', '1412616649', '1412616649');
INSERT INTO `ymo_business_areas` VALUES ('68', null, 'Grey Literature', null, null, '1', '1412616657', '1412616657');
INSERT INTO `ymo_business_areas` VALUES ('69', null, 'Health', null, null, '1', '1412616667', '1412616667');
INSERT INTO `ymo_business_areas` VALUES ('70', null, 'Health Literacy', null, null, '1', '1412616676', '1412616676');
INSERT INTO `ymo_business_areas` VALUES ('71', null, 'Historical financial and economic statistics', null, null, '1', '1412616687', '1412616687');
INSERT INTO `ymo_business_areas` VALUES ('72', null, 'Human Resources Management', null, null, '1', '1412616698', '1412616698');
INSERT INTO `ymo_business_areas` VALUES ('73', null, 'Industry analysis', null, null, '1', '1412616708', '1412616708');
INSERT INTO `ymo_business_areas` VALUES ('74', null, 'Information science', null, null, '1', '1412616718', '1412616718');
INSERT INTO `ymo_business_areas` VALUES ('75', null, 'International Business', null, null, '1', '1412616728', '1412616728');
INSERT INTO `ymo_business_areas` VALUES ('76', null, 'International Relations', null, null, '1', '1412616737', '1412616737');
INSERT INTO `ymo_business_areas` VALUES ('77', null, 'International Studies', null, null, '1', '1412616747', '1412616747');
INSERT INTO `ymo_business_areas` VALUES ('78', null, 'Internet', null, null, '1', '1412616757', '1412616757');
INSERT INTO `ymo_business_areas` VALUES ('79', null, 'Investments and securities', null, null, '1', '1412616767', '1412616767');
INSERT INTO `ymo_business_areas` VALUES ('80', null, 'Journalism', null, null, '1', '1412616777', '1412616777');
INSERT INTO `ymo_business_areas` VALUES ('81', null, 'Knowledge management', null, null, '1', '1412616786', '1412616786');
INSERT INTO `ymo_business_areas` VALUES ('82', null, 'Labor arbitration', null, null, '1', '1412616796', '1412616796');
INSERT INTO `ymo_business_areas` VALUES ('83', null, 'Labor economics', null, null, '1', '1412616805', '1412616805');
INSERT INTO `ymo_business_areas` VALUES ('84', null, 'Labor Studies', null, null, '1', '1412616814', '1412616814');
INSERT INTO `ymo_business_areas` VALUES ('85', null, 'Latina/o Studies', null, null, '1', '1412616823', '1412616823');
INSERT INTO `ymo_business_areas` VALUES ('86', null, 'Lesbian, Gay,  Bisexual and Transgender Studies', null, null, '1', '1412616835', '1412616835');
INSERT INTO `ymo_business_areas` VALUES ('87', null, 'Library Science', null, null, '1', '1412616843', '1412616843');
INSERT INTO `ymo_business_areas` VALUES ('88', null, 'Management theory', null, null, '1', '1412616853', '1412616853');
INSERT INTO `ymo_business_areas` VALUES ('89', null, 'Market Research', null, null, '1', '1412616862', '1412616862');
INSERT INTO `ymo_business_areas` VALUES ('90', null, 'Mass Media', null, null, '1', '1412616871', '1412616871');
INSERT INTO `ymo_business_areas` VALUES ('91', null, 'Medical Informatics', null, null, '1', '1412616881', '1412616881');
INSERT INTO `ymo_business_areas` VALUES ('92', null, 'Medicine', null, null, '1', '1412616889', '1412616889');
INSERT INTO `ymo_business_areas` VALUES ('93', null, 'Mergers and acquisitions', null, null, '1', '1412616900', '1412616900');
INSERT INTO `ymo_business_areas` VALUES ('94', null, 'Mergers and acquisitions', null, null, '1', '1412616910', '1412616910');
INSERT INTO `ymo_business_areas` VALUES ('95', null, 'Museum Studies', null, null, '1', '1412616920', '1412616920');
INSERT INTO `ymo_business_areas` VALUES ('96', null, 'Neuroscience / Neuropsychology', null, null, '1', '1412616935', '1412616935');
INSERT INTO `ymo_business_areas` VALUES ('97', null, 'New product development', null, null, '1', '1412616944', '1412616944');
INSERT INTO `ymo_business_areas` VALUES ('98', null, 'Non-Governmental Organizations', null, null, '1', '1412616953', '1412616953');
INSERT INTO `ymo_business_areas` VALUES ('99', null, 'Nonprofit organizations', null, null, '1', '1412616962', '1412616962');
INSERT INTO `ymo_business_areas` VALUES ('100', null, 'Nursing', null, null, '1', '1412616973', '1412616973');
INSERT INTO `ymo_business_areas` VALUES ('101', null, 'Organizational Behavior', null, null, '1', '1412616982', '1412616982');
INSERT INTO `ymo_business_areas` VALUES ('102', null, 'Organizational design', null, null, '1', '1412616991', '1412616991');
INSERT INTO `ymo_business_areas` VALUES ('103', null, 'Peace Research', null, null, '1', '1412617000', '1412617000');
INSERT INTO `ymo_business_areas` VALUES ('104', null, 'Policy Studies', null, null, '1', '1412617010', '1412617010');
INSERT INTO `ymo_business_areas` VALUES ('105', null, 'Political Communication', null, null, '1', '1412617019', '1412617019');
INSERT INTO `ymo_business_areas` VALUES ('106', null, 'Political Economy', null, null, '1', '1412617029', '1412617029');
INSERT INTO `ymo_business_areas` VALUES ('107', null, 'Political Science', null, null, '1', '1412617039', '1412617039');
INSERT INTO `ymo_business_areas` VALUES ('108', null, 'Pollution prevention', null, null, '1', '1412617048', '1412617048');
INSERT INTO `ymo_business_areas` VALUES ('109', null, 'Psychology', null, null, '1', '1412617057', '1412617057');
INSERT INTO `ymo_business_areas` VALUES ('110', null, 'Public Health', null, null, '1', '1412617067', '1412617067');
INSERT INTO `ymo_business_areas` VALUES ('111', null, 'Public Opinion', null, null, '1', '1412617076', '1412617076');
INSERT INTO `ymo_business_areas` VALUES ('112', null, 'Public Relations', null, null, '1', '1412617085', '1412617085');
INSERT INTO `ymo_business_areas` VALUES ('113', null, 'Publishing', null, null, '1', '1412617095', '1412617095');
INSERT INTO `ymo_business_areas` VALUES ('114', null, 'Radio', null, null, '1', '1412617104', '1412617104');
INSERT INTO `ymo_business_areas` VALUES ('115', null, 'Real estate', null, null, '1', '1412617116', '1412617116');
INSERT INTO `ymo_business_areas` VALUES ('116', null, 'Recycling', null, null, '1', '1412617124', '1412617124');
INSERT INTO `ymo_business_areas` VALUES ('117', null, 'Renewable energy', null, null, '1', '1412617133', '1412617133');
INSERT INTO `ymo_business_areas` VALUES ('118', null, 'Second language acquisition & teacher education', null, null, '1', '1412617143', '1412617143');
INSERT INTO `ymo_business_areas` VALUES ('119', null, 'Secondary education', null, null, '1', '1412617152', '1412617152');
INSERT INTO `ymo_business_areas` VALUES ('120', null, 'Security Studies', null, null, '1', '1412617161', '1412617161');
INSERT INTO `ymo_business_areas` VALUES ('121', null, 'Small business', null, null, '1', '1412617171', '1412617171');
INSERT INTO `ymo_business_areas` VALUES ('122', null, 'Smart growth', null, null, '1', '1412617180', '1412617180');
INSERT INTO `ymo_business_areas` VALUES ('123', null, 'Social informatics', null, null, '1', '1412617189', '1412617189');
INSERT INTO `ymo_business_areas` VALUES ('124', null, 'Social Psychology', null, null, '1', '1412617199', '1412617199');
INSERT INTO `ymo_business_areas` VALUES ('125', null, 'Social Science Research Methods', null, null, '1', '1412617207', '1412617207');
INSERT INTO `ymo_business_areas` VALUES ('126', null, 'Social Science Statistical Resources', null, null, '1', '1412617216', '1412617216');
INSERT INTO `ymo_business_areas` VALUES ('127', null, 'Social Services', null, null, '1', '1412617225', '1412617225');
INSERT INTO `ymo_business_areas` VALUES ('128', null, 'Social Work', null, null, '1', '1412617235', '1412617235');
INSERT INTO `ymo_business_areas` VALUES ('129', null, 'Sociology', null, null, '1', '1412617243', '1412617243');
INSERT INTO `ymo_business_areas` VALUES ('130', null, 'Special education', null, null, '1', '1412617252', '1412617252');
INSERT INTO `ymo_business_areas` VALUES ('131', null, 'Speech', null, null, '1', '1412617261', '1412617261');
INSERT INTO `ymo_business_areas` VALUES ('132', null, 'Storytelling', null, null, '1', '1412617270', '1412617270');
INSERT INTO `ymo_business_areas` VALUES ('133', null, 'Strategic planning', null, null, '1', '1412617280', '1412617280');
INSERT INTO `ymo_business_areas` VALUES ('134', null, 'Supply chain management', null, null, '1', '1412617289', '1412617289');
INSERT INTO `ymo_business_areas` VALUES ('135', null, 'Sustainability', null, null, '1', '1412617298', '1412617298');
INSERT INTO `ymo_business_areas` VALUES ('136', null, 'Sustainable electronics', null, null, '1', '1412617351', '1412617351');
INSERT INTO `ymo_business_areas` VALUES ('137', null, 'Teacher education', null, null, '1', '1412617360', '1412617360');
INSERT INTO `ymo_business_areas` VALUES ('138', null, 'Technology management', null, null, '1', '1412617368', '1412617368');
INSERT INTO `ymo_business_areas` VALUES ('139', null, 'Technology transfer', null, null, '1', '1412617378', '1412617378');
INSERT INTO `ymo_business_areas` VALUES ('140', null, 'Television', null, null, '1', '1412617386', '1412617386');
INSERT INTO `ymo_business_areas` VALUES ('141', null, 'Testing resources', null, null, '1', '1412617394', '1412617394');
INSERT INTO `ymo_business_areas` VALUES ('142', null, 'Training', null, null, '1', '1412617411', '1412617411');
INSERT INTO `ymo_business_areas` VALUES ('143', null, 'Transnational Migration Studies', null, null, '1', '1412617421', '1412617421');
INSERT INTO `ymo_business_areas` VALUES ('144', null, 'United Nations (and its Specialized Agencies)', null, null, '1', '1412617429', '1412617429');
INSERT INTO `ymo_business_areas` VALUES ('145', null, 'Usability Testing', null, null, '1', '1412617439', '1412617439');
INSERT INTO `ymo_business_areas` VALUES ('146', null, 'Venture Capital', null, null, '1', '1412617447', '1412617447');

-- ----------------------------
-- Table structure for ymo_clusters
-- ----------------------------
DROP TABLE IF EXISTS `ymo_clusters`;
CREATE TABLE `ymo_clusters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_clusters
-- ----------------------------
INSERT INTO `ymo_clusters` VALUES ('1', 'BIZ', 'Business', '1');
INSERT INTO `ymo_clusters` VALUES ('2', 'MKT', 'Marketing', '1');
INSERT INTO `ymo_clusters` VALUES ('3', 'NET', 'Networking', '1');
INSERT INTO `ymo_clusters` VALUES ('4', 'CRD', 'Card', '1');
INSERT INTO `ymo_clusters` VALUES ('5', 'YMO', 'Ymobiz', '1');
INSERT INTO `ymo_clusters` VALUES ('6', 'YMC', 'Ymocard', '1');
INSERT INTO `ymo_clusters` VALUES ('7', 'MASTER', 'Master', '1');

-- ----------------------------
-- Table structure for ymo_contactus
-- ----------------------------
DROP TABLE IF EXISTS `ymo_contactus`;
CREATE TABLE `ymo_contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cluster_id` int(11) DEFAULT NULL,
  `fname` varchar(30) NOT NULL COMMENT 'First Name',
  `lname` varchar(20) NOT NULL COMMENT 'Last Name',
  `email` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `lang_id` varchar(20) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='0 - free, 1 - Basic, 2 - Premium';

-- ----------------------------
-- Records of ymo_contactus
-- ----------------------------
INSERT INTO `ymo_contactus` VALUES ('1', '5', 'Whoopi Randolph', 'Nissim Stafford', 'lizeqarufa@yahoo.com', null, 'Kylan Hess', 'Omnis nihil sit, necessitatibus anim unde similique dolor totam similique debitis soluta harum.', 'english', '1408562027', '1408562027');
INSERT INTO `ymo_contactus` VALUES ('2', '5', 'Ingrid Garner', 'Chelsea Merrill', 'syxutimyzy@yahoo.com', null, 'Lucas Ferrell', 'Quia pariatur. Minus perferendis sunt deleniti proident, deserunt nostrum voluptas repellendus. Nemo ducimus.', 'english', '1408564092', '1408564092');
INSERT INTO `ymo_contactus` VALUES ('3', '5', 'Rylee Woodward', 'Avram Lynch', 'kuvuqaj@gmail.com', null, 'Avram Benjamin', 'Ad at voluptas quos sit deserunt quasi natus sunt, ipsum sequi impedit, illum, sint omnis suscipit ut proident, modi porro.', 'pt-PT', '1408564228', '1408564228');
INSERT INTO `ymo_contactus` VALUES ('4', '5', 'Alea Combs', 'Norman Sosa', 'desyb@gmail.com', null, 'Grace Mcknight', 'In esse, ipsum non laboriosam, et esse deserunt occaecat unde aliqua. Dolore duis sint iusto minima quia sint.', 'pt-PT', '1408564351', '1408564351');
INSERT INTO `ymo_contactus` VALUES ('5', '5', 'Yuri Wheeler', 'Aspen Burt', 'liqosux@yahoo.com', null, 'Julie Long', 'Eum ut rem possimus, dolorum quidem sunt voluptate temporibus ut.', 'pt-PT', '1408564588', '1408564588');
INSERT INTO `ymo_contactus` VALUES ('6', '5', 'Geraldine Dillard', 'Irene Olsen', 'jyle@hotmail.com', null, 'Joshua Houston', 'Voluptatem tenetur laborum. Eos ducimus, adipisci vel unde consequatur sit, consequatur qui perferendis praesentium obcaecati sit, quo illum, in aut.', 'pt-PT', '1408564611', '1408564611');
INSERT INTO `ymo_contactus` VALUES ('7', '5', 'Basia Wong', 'Aaron Potts', 'wafiburag@yahoo.com', null, 'Sean Patterson', 'Voluptas aliquid ut et itaque cumque eum cumque hic cum dicta non ea atque minima est.', 'pt-PT', '1408564718', '1408564718');
INSERT INTO `ymo_contactus` VALUES ('8', '5', 'Odette Osborne', 'Zephania Maynard', 'menibo@hotmail.com', null, 'Cyrus Lawrence', 'Anim labore consequuntur nihil et tempore, elit, dolores laboris nulla omnis et in occaecat aut soluta pariatur? Nam.', 'pt-PT', '1408564838', '1408564838');
INSERT INTO `ymo_contactus` VALUES ('9', '5', 'Brandon French', 'Kiara Massey', 'nugomoj@hotmail.com', null, 'Kelsey Elliott', 'Corrupti, nihil atque ad optio, officiis sit quisquam anim delectus, cupidatat tenetur sit, doloremque iure laborum occaecat vitae et qui.', 'pt-PT', '1408564923', '1408564923');
INSERT INTO `ymo_contactus` VALUES ('10', '5', 'Asher Mullins', 'Germaine Johns', 'kocit@gmail.com', null, 'Jolie Jacobson', 'Deserunt ut perferendis non dolor delectus, sint reprehenderit Nam impedit, doloribus ex reiciendis sit.', 'english', '1408582568', '1408582568');
INSERT INTO `ymo_contactus` VALUES ('11', '5', 'Willow Orr', 'Brandon Gonzales', 'lefeh@gmail.com', null, 'Hedley Dotson', 'Laborum veniam, voluptas molestiae voluptate placeat, est, eiusmod eligendi tenetur error inventore vel deserunt non velit perspiciatis.', 'english', '1408629162', '1408629162');
INSERT INTO `ymo_contactus` VALUES ('12', '5', 'Beau Cardenas', 'Velma Rios', 'lavyhoj@yahoo.com', 'Marquez and Rodriguez Trading', 'Oscar Johns', 'Est, ea pariatur? Quasi provident, totam sunt ipsa, pariatur. Possimus, eum inventore quis alias aut illum.', 'english', '1408979198', '1408979198');

-- ----------------------------
-- Table structure for ymo_contents
-- ----------------------------
DROP TABLE IF EXISTS `ymo_contents`;
CREATE TABLE `ymo_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `languages_id` varchar(100) DEFAULT NULL,
  `name` text,
  `content` longtext,
  `slug` text,
  `status` int(1) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_contents
-- ----------------------------
INSERT INTO `ymo_contents` VALUES ('1', 'english', 'Full Freedom in Money Transactions', '<p>&Eacute; um cart&atilde;o de d&eacute;bito pr&eacute;-pago recarreg&aacute;vel tanto pela empresa contratante, como pelo pr&oacute;prio usu&aacute;rio. Ele oferece vantagens e servi&ccedil;os, de forma simples e direta, criadas especialmente para seus neg&oacute;cios. Al&eacute;m de todas as vantagens, o cart&atilde;o pode agregar diversos servi&ccedil;os como cobran&ccedil;a, relacionamento e fideliza&ccedil;&atilde;o, produtos financeiros, cargas de telefonia, entre outros.<br />\n<br />\nO MOBICARD &eacute; um cart&atilde;o de saque na rede Banco 24HORAS. Pode ser utilizado em compra de produtos em mais de 1.500.000 de estabelecimentos em toda a Rede VISA E VISA ELETRON, al&eacute;m da facilidade de utiliza&ccedil;&atilde;o via internet.<br />\n<br />\nAtrav&eacute;s de parcerias com institui&ccedil;&otilde;es renomadas, o cart&atilde;o MOBICARD oferece uma diversidade de servi&ccedil;os financeiros, com vantagens exclusivas para colaboradores e clientes, agregando valores ao produto e oferecendo &ldquo;CIDADANIA FINANCEIRA&rdquo; aos usu&aacute;rios.<br />\n<br />\nConfira nosso portf&oacute;lio de servi&ccedil;os que pode ser agregado ao cart&atilde;o:<br />\n<br />\n<strong>&bull; Seguro de Acidentes Pessoais premi&aacute;veis;<br />\n<br />\n&bull; Cr&eacute;dito pr&eacute;-aprovado;<br />\n<br />\n&bull; Carga para telefonia fixa ou m&oacute;vel com economia de at&eacute; 40% nos custos das liga&ccedil;&otilde;es;<br />\n<br />\n&bull; Recargas de telefones celulares por telefone ou internet;<br />\n<br />\n&bull; Pr&ecirc;mios em dinheiro originados em sorteios legitimados por T&iacute;tulos de Capitaliza&ccedil;&atilde;o </strong></p>\n', 'learn-more', '1', '127', '1412464025');
INSERT INTO `ymo_contents` VALUES ('2', 'english', 'Video home', '<iframe width=\"363\" height=\"240\" src=\"//www.youtube.com/embed/4dy8gSGPMMw?rel=0\" frameborder=\"0\" allowfullscreen></iframe>', 'video-home', '1', '127', '1410700041');
INSERT INTO `ymo_contents` VALUES ('3', 'english', 'Order your Ymocard®', '<br>Items marked with a * are mandatory.<br>All fields must be completed with Latin Characters only.<br>', 'order-text', '1', '127', '127');
INSERT INTO `ymo_contents` VALUES ('4', 'english', 'Faqs', '<div class=\"col-md-12 popup-list\"><ul class=\"popup-faqs-list\">\r\n                        <li>\r\n                            <a href=\"#\">\r\n                                <span>1 |</span>\r\n                               Dignissim qui blandit praesent luptatum; zzril delenit augue?\r\n                            </a>\r\n                        </li>\r\n                        <li>\r\n                            <a href=\"#\">\r\n                                <span>2 |</span>\r\n                                Erat volutpat ut wisi enim ad minim veniam quis nostrud exerci tation ullamcorper suscipit lobortis?\r\n                            </a>\r\n                        </li>\r\n                        <li>\r\n                            <a href=\"#\">\r\n                                <span>3 |</span>\r\n                                Vel illum dolore eu feugiat nulla facilisis at vero eros?\r\n                            </a>\r\n                        </li>\r\n                        <li>\r\n                            <a href=\"#\">\r\n                                <span>4 |</span>\r\n                                Et quinta decima eodem modo typi qui nunc nobis videntur parum clari fiant sollemnes in?\r\n                            </a>\r\n                        </li>\r\n                        <li>\r\n                            <a href=\"#\">\r\n                                <span>5 |</span>\r\n                                Facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit?\r\n                            </a>\r\n                        </li>\r\n                    </ul>\r\n                    <hr>\r\n                    <ul class=\" popup-text\">\r\n                        <li>\r\n                            <p>\r\n                                <span>1 |</span>\r\n                                Dignissim qui blandit praesent luptatum; zzril delenit augue?<br><br>\r\n                                Legentis in iis qui facit eorum claritatem Investigationes demonstraverunt lectores\r\n                                legere. Iriure dolor in hendrerit in vulputate velit esse molestie consequat vel.\r\n                                Liber tempor cum: soluta nobis eleifend option congue! Notare quam littera gothica\r\n                                quam nunc putamus parum claram. Dignissim qui blandit praesent luptatum zzril delenit\r\n                                augue duis; dolore te feugait nulla. Aliquam erat volutpat ut wisi enim ad minim.\r\n                                Claritas est etiam processus dynamicus qui sequitur mutationem consuetudium lectorum mirum?\r\n                            </p>\r\n                        </li>\r\n                        <li>\r\n                            <p>\r\n                                <span>2 |</span>\r\n                                Dignissim qui blandit praesent luptatum; zzril delenit augue?<br><br>\r\n                                Legentis in iis qui facit eorum claritatem Investigationes demonstraverunt lectores\r\n                                legere. Iriure dolor in hendrerit in vulputate velit esse molestie consequat vel.\r\n                                Liber tempor cum: soluta nobis eleifend option congue! Notare quam littera gothica\r\n                                quam nunc putamus parum claram. Dignissim qui blandit praesent luptatum zzril delenit\r\n                                augue duis; dolore te feugait nulla. Aliquam erat volutpat ut wisi enim ad minim.\r\n                                Claritas est etiam processus dynamicus qui sequitur mutationem consuetudium lectorum mirum?\r\n                            </p>\r\n                        </li>\r\n                    </ul></div>', 'faqs', '1', '127', '127');
INSERT INTO `ymo_contents` VALUES ('14', null, 'Check your data', '<p class=\"ymo-text-a\">If everything is correct, click &#39;Finish&#39; and complete your registration, if you wish to change any information, click back.</p>', 'order-text-finish', '1', '1409701399', '1409701520');

-- ----------------------------
-- Table structure for ymo_content_files
-- ----------------------------
DROP TABLE IF EXISTS `ymo_content_files`;
CREATE TABLE `ymo_content_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `path` text CHARACTER SET utf8,
  `slug` text,
  `mimetype` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `extension` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_content_files
-- ----------------------------
INSERT INTO `ymo_content_files` VALUES ('1', 'Portugal', null, null, null, null, '1', '1434669900', '1405345821');
INSERT INTO `ymo_content_files` VALUES ('2', 'montain.jpg', '/home/web/upload/', null, 'image/jpeg', 'jpg', null, '1402926901', '1405333355');
INSERT INTO `ymo_content_files` VALUES ('3', 'American Samoa', null, null, null, null, '1', '1402926901', '1405966505');
INSERT INTO `ymo_content_files` VALUES ('4', 'Video Embed', null, null, null, null, null, '1402926901', '1404250698');
INSERT INTO `ymo_content_files` VALUES ('5', 'TypeHeadJs', null, null, null, null, null, '1402926901', '1405336682');
INSERT INTO `ymo_content_files` VALUES ('6', 'Full Freedom in Money Transactions', null, null, null, null, null, '0', '1403811338');
INSERT INTO `ymo_content_files` VALUES ('7', 'Order your Ymocard®', null, null, null, null, null, '0', '1409259791');
INSERT INTO `ymo_content_files` VALUES ('8', 'terms&conditions', null, null, null, null, null, '0', '0');
INSERT INTO `ymo_content_files` VALUES ('9', 'faqs', null, null, null, null, null, '0', '0');
INSERT INTO `ymo_content_files` VALUES ('10', null, null, null, null, null, null, '1406897363', '1406897363');

-- ----------------------------
-- Table structure for ymo_countries
-- ----------------------------
DROP TABLE IF EXISTS `ymo_countries`;
CREATE TABLE `ymo_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `uppername` varchar(100) DEFAULT NULL,
  `code` varchar(2) NOT NULL DEFAULT '',
  `code1` varchar(3) NOT NULL DEFAULT '',
  `num_code` smallint(6) DEFAULT NULL,
  `phone_code` int(5) DEFAULT NULL,
  `address_id` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `currencies_id` tinyint(4) DEFAULT NULL,
  `doctype_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_countries
-- ----------------------------
INSERT INTO `ymo_countries` VALUES ('1', 'Afghanistan', 'AFGHANISTAN', 'AF', 'AFG', '4', '93', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('2', 'Albania', 'ALBANIA', 'AL', 'ALB', '8', '355', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('3', 'Algeria', 'ALGERIA', 'DZ', 'DZA', '12', '213', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('4', 'American Samoa', 'AMERICAN SAMOA', 'AS', 'ASM', '16', '1684', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('5', 'Andorra', 'ANDORRA', 'AD', 'AND', '20', '376', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('6', 'Angola', 'ANGOLA', 'AO', 'AGO', '24', '244', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('7', 'Anguilla', 'ANGUILLA', 'AI', 'AIA', '660', '1264', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('8', 'Antarctica', 'ANTARCTICA', 'AQ', '', null, '0', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('9', 'Antigua and Barbuda', 'ANTIGUA AND BARBUDA', 'AG', 'ATG', '28', '1268', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('10', 'Argentina', 'ARGENTINA', 'AR', 'ARG', '32', '54', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('11', 'Armenia', 'ARMENIA', 'AM', 'ARM', '51', '374', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('12', 'Aruba', 'ARUBA', 'AW', 'ABW', '533', '297', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('13', 'Australia', 'AUSTRALIA', 'AU', 'AUS', '36', '61', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('14', 'Austria', 'AUSTRIA', 'AT', 'AUT', '40', '43', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('15', 'Azerbaijan', 'AZERBAIJAN', 'AZ', 'AZE', '31', '994', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('16', 'Bahamas', 'BAHAMAS', 'BS', 'BHS', '44', '1242', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('17', 'Bahrain', 'BAHRAIN', 'BH', 'BHR', '48', '973', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('18', 'Bangladesh', 'BANGLADESH', 'BD', 'BGD', '50', '880', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('19', 'Barbados', 'BARBADOS', 'BB', 'BRB', '52', '1246', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('20', 'Belarus', 'BELARUS', 'BY', 'BLR', '112', '375', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('21', 'Belgium', 'BELGIUM', 'BE', 'BEL', '56', '32', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('22', 'Belize', 'BELIZE', 'BZ', 'BLZ', '84', '501', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('23', 'Benin', 'BENIN', 'BJ', 'BEN', '204', '229', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('24', 'Bermuda', 'BERMUDA', 'BM', 'BMU', '60', '1441', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('25', 'Bhutan', 'BHUTAN', 'BT', 'BTN', '64', '975', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('26', 'Bolivia', 'BOLIVIA', 'BO', 'BOL', '68', '591', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('27', 'Bosnia and Herzegovina', 'BOSNIA AND HERZEGOVINA', 'BA', 'BIH', '70', '387', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('28', 'Botswana', 'BOTSWANA', 'BW', 'BWA', '72', '267', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('29', 'Bouvet Island', 'BOUVET ISLAND', 'BV', '', null, '0', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('30', 'Brazil', 'BRAZIL', 'BR', 'BRA', '76', '55', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('31', 'British Indian Ocean Territory', 'BRITISH INDIAN OCEAN TERRITORY', 'IO', '', null, '246', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('32', 'Brunei Darussalam', 'BRUNEI DARUSSALAM', 'BN', 'BRN', '96', '673', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('33', 'Bulgaria', 'BULGARIA', 'BG', 'BGR', '100', '359', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('34', 'Burkina Faso', 'BURKINA FASO', 'BF', 'BFA', '854', '226', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('35', 'Burundi', 'BURUNDI', 'BI', 'BDI', '108', '257', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('36', 'Cambodia', 'CAMBODIA', 'KH', 'KHM', '116', '855', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('37', 'Cameroon', 'CAMEROON', 'CM', 'CMR', '120', '237', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('38', 'Canada', 'CANADA', 'CA', 'CAN', '124', '1', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('39', 'Cape Verde', 'CAPE VERDE', 'CV', 'CPV', '132', '238', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('40', 'Cayman Islands', 'CAYMAN ISLANDS', 'KY', 'CYM', '136', '1345', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('41', 'Central African Republic', 'CENTRAL AFRICAN REPUBLIC', 'CF', 'CAF', '140', '236', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('42', 'Chad', 'CHAD', 'TD', 'TCD', '148', '235', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('43', 'Chile', 'CHILE', 'CL', 'CHL', '152', '56', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('44', 'China', 'CHINA', 'CN', 'CHN', '156', '86', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('45', 'Christmas Island', 'CHRISTMAS ISLAND', 'CX', '', null, '61', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('46', 'Cocos (Keeling) Islands', 'COCOS (KEELING) ISLANDS', 'CC', '', null, '672', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('47', 'Colombia', 'COLOMBIA', 'CO', 'COL', '170', '57', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('48', 'Comoros', 'COMOROS', 'KM', 'COM', '174', '269', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('49', 'Congo', 'CONGO', 'CG', 'COG', '178', '242', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('50', 'Congo, the Democratic Republic of the', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'CD', 'COD', '180', '242', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('51', 'Cook Islands', 'COOK ISLANDS', 'CK', 'COK', '184', '682', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('52', 'Costa Rica', 'COSTA RICA', 'CR', 'CRI', '188', '506', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('53', 'Cote D\'Ivoire', 'COTE D\'IVOIRE', 'CI', 'CIV', '384', '225', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('54', 'Croatia', 'CROATIA', 'HR', 'HRV', '191', '385', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('55', 'Cuba', 'CUBA', 'CU', 'CUB', '192', '53', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('56', 'Cyprus', 'CYPRUS', 'CY', 'CYP', '196', '357', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('57', 'Czech Republic', 'CZECH REPUBLIC', 'CZ', 'CZE', '203', '420', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('58', 'Denmark', 'DENMARK', 'DK', 'DNK', '208', '45', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('59', 'Djibouti', 'DJIBOUTI', 'DJ', 'DJI', '262', '253', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('60', 'Dominica', 'DOMINICA', 'DM', 'DMA', '212', '1767', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('61', 'Dominican Republic', 'DOMINICAN REPUBLIC', 'DO', 'DOM', '214', '1809', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('62', 'Ecuador', 'ECUADOR', 'EC', 'ECU', '218', '593', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('63', 'Egypt', 'EGYPT', 'EG', 'EGY', '818', '20', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('64', 'El Salvador', 'EL SALVADOR', 'SV', 'SLV', '222', '503', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('65', 'Equatorial Guinea', 'EQUATORIAL GUINEA', 'GQ', 'GNQ', '226', '240', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('66', 'Eritrea', 'ERITREA', 'ER', 'ERI', '232', '291', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('67', 'Estonia', 'ESTONIA', 'EE', 'EST', '233', '372', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('68', 'Ethiopia', 'ETHIOPIA', 'ET', 'ETH', '231', '251', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('69', 'Falkland Islands (Malvinas)', 'FALKLAND ISLANDS (MALVINAS)', 'FK', 'FLK', '238', '500', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('70', 'Faroe Islands', 'FAROE ISLANDS', 'FO', 'FRO', '234', '298', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('71', 'Fiji', 'FIJI', 'FJ', 'FJI', '242', '679', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('72', 'Finland', 'FINLAND', 'FI', 'FIN', '246', '358', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('73', 'France', 'FRANCE', 'FR', 'FRA', '250', '33', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('74', 'French Guiana', 'FRENCH GUIANA', 'GF', 'GUF', '254', '594', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('75', 'French Polynesia', 'FRENCH POLYNESIA', 'PF', 'PYF', '258', '689', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('76', 'French Southern Territories', 'FRENCH SOUTHERN TERRITORIES', 'TF', '', null, '0', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('77', 'Gabon', 'GABON', 'GA', 'GAB', '266', '241', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('78', 'Gambia', 'GAMBIA', 'GM', 'GMB', '270', '220', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('79', 'Georgia', 'GEORGIA', 'GE', 'GEO', '268', '995', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('80', 'Germany', 'GERMANY', 'DE', 'DEU', '276', '49', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('81', 'Ghana', 'GHANA', 'GH', 'GHA', '288', '233', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('82', 'Gibraltar', 'GIBRALTAR', 'GI', 'GIB', '292', '350', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('83', 'Greece', 'GREECE', 'GR', 'GRC', '300', '30', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('84', 'Greenland', 'GREENLAND', 'GL', 'GRL', '304', '299', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('85', 'Grenada', 'GRENADA', 'GD', 'GRD', '308', '1473', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('86', 'Guadeloupe', 'GUADELOUPE', 'GP', 'GLP', '312', '590', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('87', 'Guam', 'GUAM', 'GU', 'GUM', '316', '1671', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('88', 'Guatemala', 'GUATEMALA', 'GT', 'GTM', '320', '502', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('89', 'Guinea', 'GUINEA', 'GN', 'GIN', '324', '224', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('90', 'Guinea-Bissau', 'GUINEA-BISSAU', 'GW', 'GNB', '624', '245', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('91', 'Guyana', 'GUYANA', 'GY', 'GUY', '328', '592', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('92', 'Haiti', 'HAITI', 'HT', 'HTI', '332', '509', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('93', 'Heard Island and Mcdonald Islands', 'HEARD ISLAND AND MCDONALD ISLANDS', 'HM', '', null, '0', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('94', 'Holy See (Vatican City State)', 'HOLY SEE (VATICAN CITY STATE)', 'VA', 'VAT', '336', '39', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('95', 'Honduras', 'HONDURAS', 'HN', 'HND', '340', '504', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('96', 'Hong Kong', 'HONG KONG', 'HK', 'HKG', '344', '852', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('97', 'Hungary', 'HUNGARY', 'HU', 'HUN', '348', '36', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('98', 'Iceland', 'ICELAND', 'IS', 'ISL', '352', '354', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('99', 'India', 'INDIA', 'IN', 'IND', '356', '91', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('100', 'Indonesia', 'INDONESIA', 'ID', 'IDN', '360', '62', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('101', 'Iran, Islamic Republic of', 'IRAN, ISLAMIC REPUBLIC OF', 'IR', 'IRN', '364', '98', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('102', 'Iraq', 'IRAQ', 'IQ', 'IRQ', '368', '964', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('103', 'Ireland', 'IRELAND', 'IE', 'IRL', '372', '353', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('104', 'Israel', 'ISRAEL', 'IL', 'ISR', '376', '972', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('105', 'Italy', 'ITALY', 'IT', 'ITA', '380', '39', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('106', 'Jamaica', 'JAMAICA', 'JM', 'JAM', '388', '1876', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('107', 'Japan', 'JAPAN', 'JP', 'JPN', '392', '81', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('108', 'Jordan', 'JORDAN', 'JO', 'JOR', '400', '962', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('109', 'Kazakhstan', 'KAZAKHSTAN', 'KZ', 'KAZ', '398', '7', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('110', 'Kenya', 'KENYA', 'KE', 'KEN', '404', '254', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('111', 'Kiribati', 'KIRIBATI', 'KI', 'KIR', '296', '686', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('112', 'Korea, Democratic People\'s Republic of', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'KP', 'PRK', '408', '850', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('113', 'Korea, Republic of', 'KOREA, REPUBLIC OF', 'KR', 'KOR', '410', '82', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('114', 'Kuwait', 'KUWAIT', 'KW', 'KWT', '414', '965', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('115', 'Kyrgyzstan', 'KYRGYZSTAN', 'KG', 'KGZ', '417', '996', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('116', 'Lao People\'s Democratic Republic', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'LA', 'LAO', '418', '856', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('117', 'Latvia', 'LATVIA', 'LV', 'LVA', '428', '371', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('118', 'Lebanon', 'LEBANON', 'LB', 'LBN', '422', '961', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('119', 'Lesotho', 'LESOTHO', 'LS', 'LSO', '426', '266', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('120', 'Liberia', 'LIBERIA', 'LR', 'LBR', '430', '231', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('121', 'Libyan Arab Jamahiriya', 'LIBYAN ARAB JAMAHIRIYA', 'LY', 'LBY', '434', '218', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('122', 'Liechtenstein', 'LIECHTENSTEIN', 'LI', 'LIE', '438', '423', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('123', 'Lithuania', 'LITHUANIA', 'LT', 'LTU', '440', '370', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('124', 'Luxembourg', 'LUXEMBOURG', 'LU', 'LUX', '442', '352', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('125', 'Macao', 'MACAO', 'MO', 'MAC', '446', '853', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('126', 'Macedonia, the Former Yugoslav Republic of', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'MK', 'MKD', '807', '389', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('127', 'Madagascar', 'MADAGASCAR', 'MG', 'MDG', '450', '261', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('128', 'Malawi', 'MALAWI', 'MW', 'MWI', '454', '265', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('129', 'Malaysia', 'MALAYSIA', 'MY', 'MYS', '458', '60', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('130', 'Maldives', 'MALDIVES', 'MV', 'MDV', '462', '960', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('131', 'Mali', 'MALI', 'ML', 'MLI', '466', '223', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('132', 'Malta', 'MALTA', 'MT', 'MLT', '470', '356', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('133', 'Marshall Islands', 'MARSHALL ISLANDS', 'MH', 'MHL', '584', '692', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('134', 'Martinique', 'MARTINIQUE', 'MQ', 'MTQ', '474', '596', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('135', 'Mauritania', 'MAURITANIA', 'MR', 'MRT', '478', '222', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('136', 'Mauritius', 'MAURITIUS', 'MU', 'MUS', '480', '230', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('137', 'Mayotte', 'MAYOTTE', 'YT', '', null, '269', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('138', 'Mexico', 'MEXICO', 'MX', 'MEX', '484', '52', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('139', 'Micronesia, Federated States of', 'MICRONESIA, FEDERATED STATES OF', 'FM', 'FSM', '583', '691', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('140', 'Moldova, Republic of', 'MOLDOVA, REPUBLIC OF', 'MD', 'MDA', '498', '373', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('141', 'Monaco', 'MONACO', 'MC', 'MCO', '492', '377', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('142', 'Mongolia', 'MONGOLIA', 'MN', 'MNG', '496', '976', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('143', 'Montserrat', 'MONTSERRAT', 'MS', 'MSR', '500', '1664', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('144', 'Morocco', 'MOROCCO', 'MA', 'MAR', '504', '212', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('145', 'Mozambique', 'MOZAMBIQUE', 'MZ', 'MOZ', '508', '258', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('146', 'Myanmar', 'MYANMAR', 'MM', 'MMR', '104', '95', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('147', 'Namibia', 'NAMIBIA', 'NA', 'NAM', '516', '264', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('148', 'Nauru', 'NAURU', 'NR', 'NRU', '520', '674', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('149', 'Nepal', 'NEPAL', 'NP', 'NPL', '524', '977', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('150', 'Netherlands', 'NETHERLANDS', 'NL', 'NLD', '528', '31', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('151', 'Netherlands Antilles', 'NETHERLANDS ANTILLES', 'AN', 'ANT', '530', '599', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('152', 'New Caledonia', 'NEW CALEDONIA', 'NC', 'NCL', '540', '687', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('153', 'New Zealand', 'NEW ZEALAND', 'NZ', 'NZL', '554', '64', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('154', 'Nicaragua', 'NICARAGUA', 'NI', 'NIC', '558', '505', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('155', 'Niger', 'NIGER', 'NE', 'NER', '562', '227', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('156', 'Nigeria', 'NIGERIA', 'NG', 'NGA', '566', '234', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('157', 'Niue', 'NIUE', 'NU', 'NIU', '570', '683', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('158', 'Norfolk Island', 'NORFOLK ISLAND', 'NF', 'NFK', '574', '672', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('159', 'Northern Mariana Islands', 'NORTHERN MARIANA ISLANDS', 'MP', 'MNP', '580', '1670', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('160', 'Norway', 'NORWAY', 'NO', 'NOR', '578', '47', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('161', 'Oman', 'OMAN', 'OM', 'OMN', '512', '968', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('162', 'Pakistan', 'PAKISTAN', 'PK', 'PAK', '586', '92', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('163', 'Palau', 'PALAU', 'PW', 'PLW', '585', '680', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('164', 'Palestinian Territory, Occupied', 'PALESTINIAN TERRITORY, OCCUPIED', 'PS', '', null, '970', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('165', 'Panama', 'PANAMA', 'PA', 'PAN', '591', '507', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('166', 'Papua New Guinea', 'PAPUA NEW GUINEA', 'PG', 'PNG', '598', '675', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('167', 'Paraguay', 'PARAGUAY', 'PY', 'PRY', '600', '595', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('168', 'Peru', 'PERU', 'PE', 'PER', '604', '51', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('169', 'Philippines', 'PHILIPPINES', 'PH', 'PHL', '608', '63', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('170', 'Pitcairn', 'PITCAIRN', 'PN', 'PCN', '612', '0', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('171', 'Poland', 'POLAND', 'PL', 'POL', '616', '48', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('172', 'Portugal', 'PORTUGAL', 'PT', 'PRT', '620', '351', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('173', 'Puerto Rico', 'PUERTO RICO', 'PR', 'PRI', '630', '1787', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('174', 'Qatar', 'QATAR', 'QA', 'QAT', '634', '974', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('175', 'Reunion', 'REUNION', 'RE', 'REU', '638', '262', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('176', 'Romania', 'ROMANIA', 'RO', 'ROM', '642', '40', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('177', 'Russian Federation', 'RUSSIAN FEDERATION', 'RU', 'RUS', '643', '70', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('178', 'Rwanda', 'RWANDA', 'RW', 'RWA', '646', '250', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('179', 'Saint Helena', 'SAINT HELENA', 'SH', 'SHN', '654', '290', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('180', 'Saint Kitts and Nevis', 'SAINT KITTS AND NEVIS', 'KN', 'KNA', '659', '1869', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('181', 'Saint Lucia', 'SAINT LUCIA', 'LC', 'LCA', '662', '1758', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('182', 'Saint Pierre and Miquelon', 'SAINT PIERRE AND MIQUELON', 'PM', 'SPM', '666', '508', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('183', 'Saint Vincent and the Grenadines', 'SAINT VINCENT AND THE GRENADINES', 'VC', 'VCT', '670', '1784', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('184', 'Samoa', 'SAMOA', 'WS', 'WSM', '882', '684', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('185', 'San Marino', 'SAN MARINO', 'SM', 'SMR', '674', '378', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('186', 'Sao Tome and Principe', 'SAO TOME AND PRINCIPE', 'ST', 'STP', '678', '239', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('187', 'Saudi Arabia', 'SAUDI ARABIA', 'SA', 'SAU', '682', '966', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('188', 'Senegal', 'SENEGAL', 'SN', 'SEN', '686', '221', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('189', 'Serbia and Montenegro', 'SERBIA AND MONTENEGRO', 'CS', '', null, '381', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('190', 'Seychelles', 'SEYCHELLES', 'SC', 'SYC', '690', '248', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('191', 'Sierra Leone', 'SIERRA LEONE', 'SL', 'SLE', '694', '232', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('192', 'Singapore', 'SINGAPORE', 'SG', 'SGP', '702', '65', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('193', 'Slovakia', 'SLOVAKIA', 'SK', 'SVK', '703', '421', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('194', 'Slovenia', 'SLOVENIA', 'SI', 'SVN', '705', '386', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('195', 'Solomon Islands', 'SOLOMON ISLANDS', 'SB', 'SLB', '90', '677', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('196', 'Somalia', 'SOMALIA', 'SO', 'SOM', '706', '252', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('197', 'South Africa', 'SOUTH AFRICA', 'ZA', 'ZAF', '710', '27', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('198', 'South Georgia and the South Sandwich Islands', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'GS', '', null, '0', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('199', 'Spain', 'SPAIN', 'ES', 'ESP', '724', '34', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('200', 'Sri Lanka', 'SRI LANKA', 'LK', 'LKA', '144', '94', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('201', 'Sudan', 'SUDAN', 'SD', 'SDN', '736', '249', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('202', 'Suriname', 'SURINAME', 'SR', 'SUR', '740', '597', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('203', 'Svalbard and Jan Mayen', 'SVALBARD AND JAN MAYEN', 'SJ', 'SJM', '744', '47', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('204', 'Swaziland', 'SWAZILAND', 'SZ', 'SWZ', '748', '268', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('205', 'Sweden', 'SWEDEN', 'SE', 'SWE', '752', '46', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('206', 'Switzerland', 'SWITZERLAND', 'CH', 'CHE', '756', '41', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('207', 'Syrian Arab Republic', 'SYRIAN ARAB REPUBLIC', 'SY', 'SYR', '760', '963', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('208', 'Taiwan, Province of China', 'TAIWAN, PROVINCE OF CHINA', 'TW', 'TWN', '158', '886', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('209', 'Tajikistan', 'TAJIKISTAN', 'TJ', 'TJK', '762', '992', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('210', 'Tanzania, United Republic of', 'TANZANIA, UNITED REPUBLIC OF', 'TZ', 'TZA', '834', '255', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('211', 'Thailand', 'THAILAND', 'TH', 'THA', '764', '66', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('212', 'Timor-Leste', 'TIMOR-LESTE', 'TL', '', null, '670', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('213', 'Togo', 'TOGO', 'TG', 'TGO', '768', '228', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('214', 'Tokelau', 'TOKELAU', 'TK', 'TKL', '772', '690', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('215', 'Tonga', 'TONGA', 'TO', 'TON', '776', '676', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('216', 'Trinidad and Tobago', 'TRINIDAD AND TOBAGO', 'TT', 'TTO', '780', '1868', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('217', 'Tunisia', 'TUNISIA', 'TN', 'TUN', '788', '216', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('218', 'Turkey', 'TURKEY', 'TR', 'TUR', '792', '90', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('219', 'Turkmenistan', 'TURKMENISTAN', 'TM', 'TKM', '795', '7370', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('220', 'Turks and Caicos Islands', 'TURKS AND CAICOS ISLANDS', 'TC', 'TCA', '796', '1649', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('221', 'Tuvalu', 'TUVALU', 'TV', 'TUV', '798', '688', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('222', 'Uganda', 'UGANDA', 'UG', 'UGA', '800', '256', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('223', 'Ukraine', 'UKRAINE', 'UA', 'UKR', '804', '380', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('224', 'United Arab Emirates', 'UNITED ARAB EMIRATES', 'AE', 'ARE', '784', '971', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('225', 'United Kingdom', 'UNITED KINGDOM', 'GB', 'GBR', '826', '44', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('226', 'United States', 'UNITED STATES', 'US', 'USA', '840', '1', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('227', 'United States Minor Outlying Islands', 'UNITED STATES MINOR OUTLYING ISLANDS', 'UM', '', null, '1', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('228', 'Uruguay', 'URUGUAY', 'UY', 'URY', '858', '598', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('229', 'Uzbekistan', 'UZBEKISTAN', 'UZ', 'UZB', '860', '998', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('230', 'Vanuatu', 'VANUATU', 'VU', 'VUT', '548', '678', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('231', 'Venezuela', 'VENEZUELA', 'VE', 'VEN', '862', '58', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('232', 'Viet Nam', 'VIET NAM', 'VN', 'VNM', '704', '84', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('233', 'Virgin Islands, British', 'VIRGIN ISLANDS, BRITISH', 'VG', 'VGB', '92', '1284', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('234', 'Virgin Islands, U.s.', 'VIRGIN ISLANDS, U.S.', 'VI', 'VIR', '850', '1340', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('235', 'Wallis and Futuna', 'WALLIS AND FUTUNA', 'WF', 'WLF', '876', '681', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('236', 'Western Sahara', 'WESTERN SAHARA', 'EH', 'ESH', '732', '212', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('237', 'Yemen', 'YEMEN', 'YE', 'YEM', '887', '967', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('238', 'Zambia', 'ZAMBIA', 'ZM', 'ZMB', '894', '260', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('239', 'Zimbabwe', 'ZIMBABWE', 'ZW', 'ZWE', '716', '263', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('240', 'Serbia', 'SERBIA', 'RS', 'SRB', '688', '381', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('241', 'Asia / Pacific Region', 'ASIA PACIFIC REGION', 'AP', '0', '0', '0', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('242', 'Montenegro', 'MONTENEGRO', 'ME', 'MNE', '499', '382', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('243', 'Aland Islands', 'ALAND ISLANDS', 'AX', 'ALA', '248', '358', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('244', 'Bonaire, Sint Eustatius and Saba', 'BONAIRE, SINT EUSTATIUS AND SABA', 'BQ', 'BES', '535', '599', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('245', 'Curacao', 'CURACAO', 'CW', 'CUW', '531', '599', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('246', 'Guernsey', 'GUERNSEY', 'GG', 'GGY', '831', '44', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('247', 'Isle of Man', 'ISLE OF MAN', 'IM', 'IMN', '833', '44', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('248', 'Jersey', 'JERSEY', 'JE', 'JEY', '832', '44', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('249', 'Kosovo', 'KOSOVO', 'XK', '---', '0', '381', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('250', 'Saint Barthelemy', 'SAINT BARTHELEMY', 'BL', 'BLM', '652', '590', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('251', 'Saint Martin', 'SAINT MARTIN', 'MF', 'MAF', '663', '590', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('252', 'Sint Maarten', 'SINT MAARTEN', 'SX', 'SXM', '534', '1', '0', '', '', '0', null, '0');
INSERT INTO `ymo_countries` VALUES ('253', 'South Sudan', 'SOUTH SUDAN', 'SS', 'SSD', '728', '211', '0', '', '', '0', null, '0');

-- ----------------------------
-- Table structure for ymo_currencies
-- ----------------------------
DROP TABLE IF EXISTS `ymo_currencies`;
CREATE TABLE `ymo_currencies` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) DEFAULT NULL,
  `simbol` varchar(3) DEFAULT NULL,
  `sbl_position` varchar(1) NOT NULL,
  `sbl_decimal` varchar(1) NOT NULL,
  `sbl_hundred` varchar(1) NOT NULL,
  `num_decimal` tinyint(4) NOT NULL,
  `group_dig` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_currencies
-- ----------------------------
INSERT INTO `ymo_currencies` VALUES ('1', 'USD', '$', 'l', '.', ',', '2', '3');
INSERT INTO `ymo_currencies` VALUES ('2', 'EUR', 'â‚¬', 'r', ',', '.', '2', '3');
INSERT INTO `ymo_currencies` VALUES ('3', 'YEN', 'Â¥', 'r', '.', ',', '2', '4');
INSERT INTO `ymo_currencies` VALUES ('4', 'GBP', 'Â£', 'r', '.', ',', '2', '3');
INSERT INTO `ymo_currencies` VALUES ('5', 'CAD', '$', 'l', '.', ',', '2', '3');

-- ----------------------------
-- Table structure for ymo_doctypes
-- ----------------------------
DROP TABLE IF EXISTS `ymo_doctypes`;
CREATE TABLE `ymo_doctypes` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='1 - nationalid\r\n2 - passport\r\n3 - driverlicense';

-- ----------------------------
-- Records of ymo_doctypes
-- ----------------------------
INSERT INTO `ymo_doctypes` VALUES ('1', 'Nationality Card', '1');
INSERT INTO `ymo_doctypes` VALUES ('2', 'Passport', '1');
INSERT INTO `ymo_doctypes` VALUES ('3', 'Drivers Licence', '0');
INSERT INTO `ymo_doctypes` VALUES ('4', 'Social Security Card', '0');

-- ----------------------------
-- Table structure for ymo_languages
-- ----------------------------
DROP TABLE IF EXISTS `ymo_languages`;
CREATE TABLE `ymo_languages` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` mediumtext,
  `status` int(1) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_languages
-- ----------------------------
INSERT INTO `ymo_languages` VALUES ('1', 'english', 'english', null, '1', '0', '0');
INSERT INTO `ymo_languages` VALUES ('2', 'pt-PT', 'portuguese', null, '1', '0', '0');
INSERT INTO `ymo_languages` VALUES ('3', 'es', 'spanish', null, '1', '0', '0');
INSERT INTO `ymo_languages` VALUES ('4', 'fr', 'french', null, '0', '0', '0');
INSERT INTO `ymo_languages` VALUES ('5', 'de', 'german', null, '0', '0', '0');
INSERT INTO `ymo_languages` VALUES ('6', 'pt-BR', 'portuguese brazilian', null, '1', '0', '0');

-- ----------------------------
-- Table structure for ymo_modules
-- ----------------------------
DROP TABLE IF EXISTS `ymo_modules`;
CREATE TABLE `ymo_modules` (
  `id` int(11) NOT NULL,
  `cluster_id` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_modules
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_newletter
-- ----------------------------
DROP TABLE IF EXISTS `ymo_newletter`;
CREATE TABLE `ymo_newletter` (
  `email` varchar(100) NOT NULL,
  `emailtype` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `datelastsend` datetime DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='<double-click to overwrite multiple objects>';

-- ----------------------------
-- Records of ymo_newletter
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_payment_methods
-- ----------------------------
DROP TABLE IF EXISTS `ymo_payment_methods`;
CREATE TABLE `ymo_payment_methods` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `content` text,
  `message` text,
  `type` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='1 - nationalid\r\n2 - passport\r\n3 - driverlicense';

-- ----------------------------
-- Records of ymo_payment_methods
-- ----------------------------
INSERT INTO `ymo_payment_methods` VALUES ('1', 'default', '<p><strong>NIB</strong>: XXX XXXX XXXXXXXXX XX<br />\n<strong>IBAN</strong>: XXXX XXXX XXXX XXXX XXXX XXXX X<br />\n<strong>BIC/END SWIFT</strong>: BESCPTPL<br />\n<strong>Name</strong>: Ymocard, LLC<br />\n<strong>Banco</strong>: Banco XPTO<br />\n<strong>Conta</strong>: XXXXX XXXXX XXXXX</p>\n', 'After payment by bank transfer, please send us by email a certificate referring the following order identification number: ID xxxxxxx', '1', '1', '1409490278', '1409494884');
INSERT INTO `ymo_payment_methods` VALUES ('2', 'visa', 'Visa method payment', null, '2', '1', '1409490440', '1409490440');

-- ----------------------------
-- Table structure for ymo_payment_types
-- ----------------------------
DROP TABLE IF EXISTS `ymo_payment_types`;
CREATE TABLE `ymo_payment_types` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='1 - nationalid\r\n2 - passport\r\n3 - driverlicense';

-- ----------------------------
-- Records of ymo_payment_types
-- ----------------------------
INSERT INTO `ymo_payment_types` VALUES ('1', 'bank transfer', '1', '1409490076', '1409490076');
INSERT INTO `ymo_payment_types` VALUES ('2', 'credit card', '1', '1409490094', '1409490094');
INSERT INTO `ymo_payment_types` VALUES ('3', 'paypal', '0', '1409490101', '1409490123');

-- ----------------------------
-- Table structure for ymo_pricing
-- ----------------------------
DROP TABLE IF EXISTS `ymo_pricing`;
CREATE TABLE `ymo_pricing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `value` varchar(20) DEFAULT NULL,
  `currencies_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_pricing
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_pricing_cat
-- ----------------------------
DROP TABLE IF EXISTS `ymo_pricing_cat`;
CREATE TABLE `ymo_pricing_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_pricing_cat
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_pricing_orders
-- ----------------------------
DROP TABLE IF EXISTS `ymo_pricing_orders`;
CREATE TABLE `ymo_pricing_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pricing_id` int(11) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  `currencies_id` tinyint(4) DEFAULT NULL,
  `paym_id` tinyint(4) DEFAULT NULL,
  `dateend` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_pricing_orders
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_pricing_paym
-- ----------------------------
DROP TABLE IF EXISTS `ymo_pricing_paym`;
CREATE TABLE `ymo_pricing_paym` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(6) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymo_pricing_paym
-- ----------------------------
INSERT INTO `ymo_pricing_paym` VALUES ('1', 'card', 'credit card', '0');
INSERT INTO `ymo_pricing_paym` VALUES ('2', 'paypal', 'paypal', '0');
INSERT INTO `ymo_pricing_paym` VALUES ('3', 'banktr', 'bank transfer', '0');
INSERT INTO `ymo_pricing_paym` VALUES ('4', 'ymopay', 'ymopay', '0');

-- ----------------------------
-- Table structure for ymo_states
-- ----------------------------
DROP TABLE IF EXISTS `ymo_states`;
CREATE TABLE `ymo_states` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_states
-- ----------------------------
INSERT INTO `ymo_states` VALUES ('1', 'Alabama', 'AL', 'USA');
INSERT INTO `ymo_states` VALUES ('2', 'Alaska', 'AK', 'USA');
INSERT INTO `ymo_states` VALUES ('3', 'Arizona', 'AZ', 'USA');
INSERT INTO `ymo_states` VALUES ('4', 'Arkansas', 'AR', 'USA');
INSERT INTO `ymo_states` VALUES ('5', 'California', 'CA', 'USA');
INSERT INTO `ymo_states` VALUES ('6', 'Colorado', 'CO', 'USA');
INSERT INTO `ymo_states` VALUES ('7', 'Connecticut', 'CT', 'USA');
INSERT INTO `ymo_states` VALUES ('8', 'Delaware', 'DE', 'USA');
INSERT INTO `ymo_states` VALUES ('9', 'Florida', 'FL', 'USA');
INSERT INTO `ymo_states` VALUES ('10', 'Georgia', 'GA', 'USA');
INSERT INTO `ymo_states` VALUES ('11', 'Hawaii', 'HI', 'USA');
INSERT INTO `ymo_states` VALUES ('12', 'Idaho', 'ID', 'USA');
INSERT INTO `ymo_states` VALUES ('13', 'Illinois', 'IL', 'USA');
INSERT INTO `ymo_states` VALUES ('14', 'Indiana', 'IN', 'USA');
INSERT INTO `ymo_states` VALUES ('15', 'Iowa', 'IA', 'USA');
INSERT INTO `ymo_states` VALUES ('16', 'Kansas', 'KS', 'USA');
INSERT INTO `ymo_states` VALUES ('17', 'Kentucky', 'KY', 'USA');
INSERT INTO `ymo_states` VALUES ('18', 'Louisiana', 'LA', 'USA');
INSERT INTO `ymo_states` VALUES ('19', 'Maine', 'ME', 'USA');
INSERT INTO `ymo_states` VALUES ('20', 'Maryland', 'MD', 'USA');
INSERT INTO `ymo_states` VALUES ('21', 'Massachusetts', 'MA', 'USA');
INSERT INTO `ymo_states` VALUES ('22', 'Michigan', 'MI', 'USA');
INSERT INTO `ymo_states` VALUES ('23', 'Minnesota', 'MN', 'USA');
INSERT INTO `ymo_states` VALUES ('24', 'Mississippi', 'MS', 'USA');
INSERT INTO `ymo_states` VALUES ('25', 'Missouri', 'MO', 'USA');
INSERT INTO `ymo_states` VALUES ('26', 'Montana', 'MT', 'USA');
INSERT INTO `ymo_states` VALUES ('27', 'Nebraska', 'NE', 'USA');
INSERT INTO `ymo_states` VALUES ('28', 'Nevada', 'NV', 'USA');
INSERT INTO `ymo_states` VALUES ('29', 'New Hampshire', 'NH', 'USA');
INSERT INTO `ymo_states` VALUES ('30', 'New Jersey', 'NJ', 'USA');
INSERT INTO `ymo_states` VALUES ('31', 'New Mexico', 'NM', 'USA');
INSERT INTO `ymo_states` VALUES ('32', 'New York', 'NY', 'USA');
INSERT INTO `ymo_states` VALUES ('33', 'North Carolina', 'NC', 'USA');
INSERT INTO `ymo_states` VALUES ('34', 'North Dakota', 'ND', 'USA');
INSERT INTO `ymo_states` VALUES ('35', 'Ohio', 'OH', 'USA');
INSERT INTO `ymo_states` VALUES ('36', 'Oklahoma', 'OK', 'USA');
INSERT INTO `ymo_states` VALUES ('37', 'Oregon', 'OR', 'USA');
INSERT INTO `ymo_states` VALUES ('38', 'Pennsylvania', 'PA', 'USA');
INSERT INTO `ymo_states` VALUES ('39', 'Rhode Island', 'RI', 'USA');
INSERT INTO `ymo_states` VALUES ('40', 'South Carolina', 'SC', 'USA');
INSERT INTO `ymo_states` VALUES ('41', 'South Dakota', 'SD', 'USA');
INSERT INTO `ymo_states` VALUES ('42', 'Tennessee', 'TN', 'USA');
INSERT INTO `ymo_states` VALUES ('43', 'Texas', 'TX', 'USA');
INSERT INTO `ymo_states` VALUES ('44', 'Utah', 'UT', 'USA');
INSERT INTO `ymo_states` VALUES ('45', 'Vermont', 'VT', 'USA');
INSERT INTO `ymo_states` VALUES ('46', 'Virginia', 'VA', 'USA');
INSERT INTO `ymo_states` VALUES ('47', 'Washington', 'WA', 'USA');
INSERT INTO `ymo_states` VALUES ('48', 'West Virginia', 'WV', 'USA');
INSERT INTO `ymo_states` VALUES ('49', 'Wisconsin', 'WI', 'USA');
INSERT INTO `ymo_states` VALUES ('50', 'Wyoming', 'WY', 'USA');
INSERT INTO `ymo_states` VALUES ('51', 'Washington DC', 'DC', 'USA');
INSERT INTO `ymo_states` VALUES ('60', 'Alberta', 'AB', 'CAN');
INSERT INTO `ymo_states` VALUES ('61', 'British Columbia', 'BC', 'CAN');
INSERT INTO `ymo_states` VALUES ('62', 'Manitoba', 'MB', 'CAN');
INSERT INTO `ymo_states` VALUES ('63', 'New Brunswick', 'NB', 'CAN');
INSERT INTO `ymo_states` VALUES ('64', 'Newfoundland and Labrador', 'NL', 'CAN');
INSERT INTO `ymo_states` VALUES ('65', 'Nova Scotia', 'NS', 'CAN');
INSERT INTO `ymo_states` VALUES ('66', 'Ontario', 'ON', 'CAN');
INSERT INTO `ymo_states` VALUES ('67', 'Prince Edward Island', 'PE', 'CAN');
INSERT INTO `ymo_states` VALUES ('68', 'Quebec', 'QC', 'CAN');
INSERT INTO `ymo_states` VALUES ('69', 'Saskatchewan', 'SK', 'CAN');
INSERT INTO `ymo_states` VALUES ('70', 'Northwest Territories', 'NT', 'CAN');
INSERT INTO `ymo_states` VALUES ('71', 'Nunavut', 'NU', 'CAN');
INSERT INTO `ymo_states` VALUES ('72', 'Yukon Territory', 'YT', 'CAN');
INSERT INTO `ymo_states` VALUES ('73', 'Acre', 'AC', 'BRA');
INSERT INTO `ymo_states` VALUES ('74', 'Alagoas', 'AL', 'BRA');
INSERT INTO `ymo_states` VALUES ('75', 'Amazonas', 'AM', 'BRA');
INSERT INTO `ymo_states` VALUES ('76', 'Amapá', 'AP', 'BRA');
INSERT INTO `ymo_states` VALUES ('77', 'Bahia', 'BA', 'BRA');
INSERT INTO `ymo_states` VALUES ('78', 'Ceará', 'CE', 'BRA');
INSERT INTO `ymo_states` VALUES ('79', 'Distrito Federal', 'DF', 'BRA');
INSERT INTO `ymo_states` VALUES ('80', 'Espírito Santo', 'ES', 'BRA');
INSERT INTO `ymo_states` VALUES ('81', 'Goiás', 'GO', 'BRA');
INSERT INTO `ymo_states` VALUES ('82', 'Maranhão', 'MA', 'BRA');
INSERT INTO `ymo_states` VALUES ('83', 'Minas Gerais', 'MG', 'BRA');
INSERT INTO `ymo_states` VALUES ('84', 'Mato Grosso do Sul', 'MS', 'BRA');
INSERT INTO `ymo_states` VALUES ('85', 'Mato Grosso', 'MT', 'BRA');
INSERT INTO `ymo_states` VALUES ('86', 'Pará', 'PA', 'BRA');
INSERT INTO `ymo_states` VALUES ('87', 'Paraíba', 'PB', 'BRA');
INSERT INTO `ymo_states` VALUES ('88', 'Pernambuco', 'PE', 'BRA');
INSERT INTO `ymo_states` VALUES ('89', 'Piauí', 'PI', 'BRA');
INSERT INTO `ymo_states` VALUES ('90', 'Paraná', 'PR', 'BRA');
INSERT INTO `ymo_states` VALUES ('91', 'Rio de Janeiro', 'RJ', 'BRA');
INSERT INTO `ymo_states` VALUES ('92', 'Rio Grande do Norte', 'RN', 'BRA');
INSERT INTO `ymo_states` VALUES ('93', 'Rondônia', 'RO', 'BRA');
INSERT INTO `ymo_states` VALUES ('94', 'Roraima', 'RR', 'BRA');
INSERT INTO `ymo_states` VALUES ('95', 'Rio Grande do Sul', 'RS', 'BRA');
INSERT INTO `ymo_states` VALUES ('96', 'Santa Catarina', 'SC', 'BRA');
INSERT INTO `ymo_states` VALUES ('97', 'Sergipe', 'SE', 'BRA');
INSERT INTO `ymo_states` VALUES ('98', 'São Paulo', 'SP', 'BRA');
INSERT INTO `ymo_states` VALUES ('99', 'Tocantins', 'TO', 'BRA');

-- ----------------------------
-- Table structure for ymo_system
-- ----------------------------
DROP TABLE IF EXISTS `ymo_system`;
CREATE TABLE `ymo_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `languages_id` smallint(6) DEFAULT NULL,
  `code` varchar(6) DEFAULT NULL,
  `name` text,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_system
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_system_files
-- ----------------------------
DROP TABLE IF EXISTS `ymo_system_files`;
CREATE TABLE `ymo_system_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` text,
  `mimetype` varchar(45) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_system_files
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_system_logs
-- ----------------------------
DROP TABLE IF EXISTS `ymo_system_logs`;
CREATE TABLE `ymo_system_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `modules_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `query` longtext,
  `route` text,
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_system_logs
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_system_messages
-- ----------------------------
DROP TABLE IF EXISTS `ymo_system_messages`;
CREATE TABLE `ymo_system_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `languages_id` smallint(6) DEFAULT NULL,
  `cluster_id` int(11) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `code` varchar(6) DEFAULT NULL,
  `name` text,
  `content` longtext,
  `type` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_system_messages
-- ----------------------------
INSERT INTO `ymo_system_messages` VALUES ('1', '1', '6', 'site', '200', 'successful contact us', 'thank you for your contact', 'success', '1', '1409436114', '1409437090');

-- ----------------------------
-- Table structure for ymo_tellfriends
-- ----------------------------
DROP TABLE IF EXISTS `ymo_tellfriends`;
CREATE TABLE `ymo_tellfriends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `code` varchar(12) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ymo_tellfriends
-- ----------------------------

-- ----------------------------
-- Table structure for ymo_timezones
-- ----------------------------
DROP TABLE IF EXISTS `ymo_timezones`;
CREATE TABLE `ymo_timezones` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL,
  `langword` varchar(255) NOT NULL DEFAULT '',
  `diffgmt` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COMMENT='TimeZones';

-- ----------------------------
-- Records of ymo_timezones
-- ----------------------------
INSERT INTO `ymo_timezones` VALUES ('1', 'UTC', 'Dateline Standard Time (GMT-12:00)', 'International Date Line West', 'UTC', '-12:00:00');
INSERT INTO `ymo_timezones` VALUES ('2', 'Pacific/Midway', 'Samoa Standard Time (GMT-11:00)', 'Midway Island, Samoa', 'Pacific/Midway', '-11:00:00');
INSERT INTO `ymo_timezones` VALUES ('3', '002', 'Hawaiian Standard Time (GMT-10:00)', 'Hawaii', 'timezone_002', '-10:00:00');
INSERT INTO `ymo_timezones` VALUES ('4', '003', 'Alaskan Standard Time (GMT-09:00)', 'Alaska', 'timezone_003', '-09:00:00');
INSERT INTO `ymo_timezones` VALUES ('5', '004', 'Pacific Standard Time (GMT-08:00)', 'Pacific Time (US and Canada); Tijuana', 'timezone_004', '-08:00:00');
INSERT INTO `ymo_timezones` VALUES ('6', '010', 'Mountain Standard Time (GMT-07:00)', 'Mountain Time (US and Canada)', 'timezone_010', '-07:00:00');
INSERT INTO `ymo_timezones` VALUES ('7', '013', 'Mexico Standard Time 2 (GMT-07:00)', 'Chihuahua, La Paz, Mazatlan', 'timezone_013', '-07:00:00');
INSERT INTO `ymo_timezones` VALUES ('8', '015', 'U.S. Mountain Standard Time (GMT-07:00)', 'Arizona', 'timezone_015', '-07:00:00');
INSERT INTO `ymo_timezones` VALUES ('9', '020', 'Central Standard Time (GMT-06:00)', 'Central Time (US and Canada)', 'timezone_020', '-06:00:00');
INSERT INTO `ymo_timezones` VALUES ('10', '025', 'Canada Central Standard Time (GMT-06:00)', 'Saskatchewan', 'timezone_025', '-06:00:00');
INSERT INTO `ymo_timezones` VALUES ('11', '030', 'Mexico Standard Time (GMT-06:00)', 'Guadalajara, Mexico City, Monterrey', 'timezone_030', '-06:00:00');
INSERT INTO `ymo_timezones` VALUES ('12', '033', 'Central America Standard Time (GMT-06:00)', 'Central America', 'timezone_033', '-06:00:00');
INSERT INTO `ymo_timezones` VALUES ('13', '035', 'Eastern Standard Time (GMT-05:00)', 'Eastern Time (US and Canada)', 'timezone_035', '-05:00:00');
INSERT INTO `ymo_timezones` VALUES ('14', '040', 'U.S. Eastern Standard Time (GMT-05:00)', 'Indiana (East)', 'timezone_040', '-05:00:00');
INSERT INTO `ymo_timezones` VALUES ('15', '045', 'S.A. Pacific Standard Time (GMT-05:00)', 'Bogota, Lima, Quito', 'timezone_045', '-05:00:00');
INSERT INTO `ymo_timezones` VALUES ('16', '050', 'Atlantic Standard Time (GMT-04:00)', 'Atlantic Time (Canada)', 'timezone_050', '-04:00:00');
INSERT INTO `ymo_timezones` VALUES ('17', '055', 'S.A. Western Standard Time (GMT-04:00)', 'Caracas, La Paz', 'timezone_055', '-04:00:00');
INSERT INTO `ymo_timezones` VALUES ('18', '056', 'Pacific S.A. Standard Time (GMT-04:00)', 'Santiago', 'timezone_056', '-04:00:00');
INSERT INTO `ymo_timezones` VALUES ('19', '060', 'Newfoundland Standard Time (GMT-03:30)', 'Newfoundland', 'timezone_060', '-03:30:00');
INSERT INTO `ymo_timezones` VALUES ('20', '065', 'E. South America Standard Time (GMT-03:00)', 'Brasilia', 'timezone_065', '-03:00:00');
INSERT INTO `ymo_timezones` VALUES ('21', '070', 'S.A. Eastern Standard Time (GMT-03:00)', 'Buenos Aires, Georgetown', 'timezone_070', '-03:00:00');
INSERT INTO `ymo_timezones` VALUES ('22', '073', 'Greenland Standard Time (GMT-03:00)', 'Greenland', 'timezone_073', '-03:00:00');
INSERT INTO `ymo_timezones` VALUES ('23', '075', 'Mid-Atlantic Standard Time (GMT-02:00)', 'Mid-Atlantic', 'timezone_075', '-02:00:00');
INSERT INTO `ymo_timezones` VALUES ('24', '080', 'Azores Standard Time (GMT-01:00)', 'Azores', 'timezone_080', '-01:00:00');
INSERT INTO `ymo_timezones` VALUES ('25', '083', 'Cape Verde Standard Time (GMT-01:00)', 'Cape Verde Islands', 'timezone_083', '-01:00:00');
INSERT INTO `ymo_timezones` VALUES ('26', '085', 'GMT Mean Time (GMT) - London, Lisboa', 'Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London', 'timezone_085', '00:00:00');
INSERT INTO `ymo_timezones` VALUES ('27', '090', 'Greenwich Standard Time (GMT)', 'Casablanca, Monrovia', 'timezone_090', '00:00:00');
INSERT INTO `ymo_timezones` VALUES ('28', '095', 'Central Europe Standard Time (GMT+01:00)', 'Belgrade, Bratislava, Budapest, Ljubljana, Prague', 'timezone_095', '01:00:00');
INSERT INTO `ymo_timezones` VALUES ('29', '100', 'Central European Standard Time (GMT+01:00)', 'Sarajevo, Skopje, Warsaw, Zagreb', 'timezone_100', '01:00:00');
INSERT INTO `ymo_timezones` VALUES ('30', '105', 'Romance Standard Time (GMT+01:00)', 'Brussels, Copenhagen, Madrid, Paris', 'timezone_105', '01:00:00');
INSERT INTO `ymo_timezones` VALUES ('31', '110', 'W. Europe Standard Time (GMT+01:00)', 'Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna', 'timezone_110', '01:00:00');
INSERT INTO `ymo_timezones` VALUES ('32', '113', 'W. Central Africa Standard Time (GMT+01:00)', 'West Central Africa', 'timezone_113', '01:00:00');
INSERT INTO `ymo_timezones` VALUES ('33', '115', 'E. Europe Standard Time (GMT+02:00)', 'Bucharest', 'timezone_115', '02:00:00');
INSERT INTO `ymo_timezones` VALUES ('34', '120', 'Egypt Standard Time (GMT+02:00)', 'Cairo', 'timezone_120', '02:00:00');
INSERT INTO `ymo_timezones` VALUES ('35', '125', 'FLE Standard Time (GMT+02:00)', 'Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius', 'timezone_125', '02:00:00');
INSERT INTO `ymo_timezones` VALUES ('36', '130', 'GTB Standard Time (GMT+02:00)', 'Athens, Istanbul, Minsk', 'timezone_130', '02:00:00');
INSERT INTO `ymo_timezones` VALUES ('37', '135', 'Israel Standard Time (GMT+02:00)', 'Jerusalem', 'timezone_135', '02:00:00');
INSERT INTO `ymo_timezones` VALUES ('38', '140', 'South Africa Standard Time (GMT+02:00)', 'Harare, Pretoria', 'timezone_140', '02:00:00');
INSERT INTO `ymo_timezones` VALUES ('39', '145', 'Russian Standard Time (GMT+03:00)', 'Moscow, St. Petersburg, Volgograd', 'timezone_145', '03:00:00');
INSERT INTO `ymo_timezones` VALUES ('40', '150', 'Arab Standard Time (GMT+03:00)', 'Kuwait, Riyadh', 'timezone_150', '03:00:00');
INSERT INTO `ymo_timezones` VALUES ('41', '155', 'E. Africa Standard Time (GMT+03:00)', 'Nairobi', 'timezone_155', '03:00:00');
INSERT INTO `ymo_timezones` VALUES ('42', '158', 'Arabic Standard Time (GMT+03:00)', '', 'timezone_158', '03:00:00');
INSERT INTO `ymo_timezones` VALUES ('43', '160', 'Iran Standard Time (GMT+03:30)', 'Tehran', 'timezone_160', '03:30:00');
INSERT INTO `ymo_timezones` VALUES ('44', '165', 'Arabian Standard Time (GMT+04:00)', 'Abu Dhabi, Muscat', 'timezone_165', '04:00:00');
INSERT INTO `ymo_timezones` VALUES ('45', '170', 'Caucasus Standard Time (GMT+04:00)', 'Baku, Tbilisi, Yerevan', 'timezone_170', '04:00:00');
INSERT INTO `ymo_timezones` VALUES ('46', '175', 'Afghanistan Standard Time (GMT+04:30)', 'Kabul', 'timezone_175', '04:30:00');
INSERT INTO `ymo_timezones` VALUES ('47', '180', 'Ekaterinburg Standard Time (GMT+05:00)', 'Ekaterinburg', 'timezone_180', '05:00:00');
INSERT INTO `ymo_timezones` VALUES ('48', '185', 'West Asia Standard Time (GMT+05:00)', 'Islamabad, Karachi, Tashkent', 'timezone_185', '05:00:00');
INSERT INTO `ymo_timezones` VALUES ('49', '190', 'India Standard Time (GMT+05:30)', 'Chennai, Kolkata, Mumbai, New Delhi', 'timezone_190', '05:30:00');
INSERT INTO `ymo_timezones` VALUES ('50', '193', 'Nepal Standard Time (GMT+05:45)', 'Kathmandu', 'timezone_193', '05:45:00');
INSERT INTO `ymo_timezones` VALUES ('51', '195', 'Central Asia Standard Time (GMT+06:00)', 'Astana, Dhaka', 'timezone_195', '06:00:00');
INSERT INTO `ymo_timezones` VALUES ('52', '200', 'Sri Lanka Standard Time (GMT+06:00)', 'Sri Jayawardenepura', 'timezone_200', '06:00:00');
INSERT INTO `ymo_timezones` VALUES ('53', '201', 'N. Central Asia Standard Time (GMT+06:00)', 'Almaty, Novosibirsk', 'timezone_201', '06:00:00');
INSERT INTO `ymo_timezones` VALUES ('54', '203', 'Myanmar Standard Time (GMT+06:30)', 'Rangoon', 'timezone_203', '06:30:00');
INSERT INTO `ymo_timezones` VALUES ('55', '205', 'S.E. Asia Standard Time (GMT+07:00)', 'Bangkok, Hanoi, Jakarta', 'timezone_205', '07:00:00');
INSERT INTO `ymo_timezones` VALUES ('56', '207', 'North Asia Standard Time (GMT+07:00)', 'Krasnoyarsk', 'timezone_207', '07:00:00');
INSERT INTO `ymo_timezones` VALUES ('57', '210', 'China Standard Time (GMT+08:00)', 'Beijing, Chongqing, Hong Kong SAR, Urumqi', 'timezone_210', '08:00:00');
INSERT INTO `ymo_timezones` VALUES ('58', '215', 'Singapore Standard Time (GMT+08:00)', 'Kuala Lumpur, Singapore', 'timezone_215', '08:00:00');
INSERT INTO `ymo_timezones` VALUES ('59', '220', 'Taipei Standard Time (GMT+08:00)', 'Taipei', 'timezone_220', '08:00:00');
INSERT INTO `ymo_timezones` VALUES ('60', '225', 'W. Australia Standard Time (GMT+08:00)', 'Perth', 'timezone_225', '08:00:00');
INSERT INTO `ymo_timezones` VALUES ('61', '227', 'North Asia East Standard Time (GMT+08:00)', 'Irkutsk, Ulaan Bataar', 'timezone_227', '08:00:00');
INSERT INTO `ymo_timezones` VALUES ('62', '230', 'Korea Standard Time (GMT+09:00)', 'Seoul', 'timezone_230', '09:00:00');
INSERT INTO `ymo_timezones` VALUES ('63', '235', 'Tokyo Standard Time (GMT+09:00)', 'Osaka, Sapporo, Tokyo', 'timezone_235', '09:00:00');
INSERT INTO `ymo_timezones` VALUES ('64', '240', 'Yakutsk Standard Time (GMT+09:00)', 'Yakutsk', 'timezone_240', '09:00:00');
INSERT INTO `ymo_timezones` VALUES ('65', '245', 'A.U.S. Central Standard Time (GMT+09:30)', 'Darwin', 'timezone_245', '09:30:00');
INSERT INTO `ymo_timezones` VALUES ('66', '250', 'Cen. Australia Standard Time (GMT+09:30)', 'Adelaide', 'timezone_250', '09:30:00');
INSERT INTO `ymo_timezones` VALUES ('67', '255', 'A.U.S. Eastern Standard Time (GMT+10:00)', 'Canberra, Melbourne, Sydney', 'timezone_255', '10:00:00');
INSERT INTO `ymo_timezones` VALUES ('68', '260', 'E. Australia Standard Time (GMT+10:00)', 'Brisbane', 'timezone_260', '10:00:00');
INSERT INTO `ymo_timezones` VALUES ('69', '265', 'Tasmania Standard Time (GMT+10:00)', 'Hobart', 'timezone_265', '10:00:00');
INSERT INTO `ymo_timezones` VALUES ('70', '270', 'Vladivostok Standard Time (GMT+10:00)', 'Vladivostok', 'timezone_270', '10:00:00');
INSERT INTO `ymo_timezones` VALUES ('71', '275', 'West Pacific Standard Time (GMT+10:00)', 'Guam, Port Moresby', 'timezone_275', '10:00:00');
INSERT INTO `ymo_timezones` VALUES ('72', '280', 'Central Pacific Standard Time (GMT+11:00)', 'Magadan, Solomon Islands, New Caledonia', 'timezone_280', '11:00:00');
INSERT INTO `ymo_timezones` VALUES ('73', '285', 'Fiji Islands Standard Time (GMT+12:00)', 'Fiji Islands, Kamchatka, Marshall Islands', 'timezone_285', '12:00:00');
INSERT INTO `ymo_timezones` VALUES ('74', '290', 'New Zealand Standard Time (GMT+12:00)', 'Auckland, Wellington', 'timezone_290', '12:00:00');
INSERT INTO `ymo_timezones` VALUES ('75', '300', 'Tonga Standard Time (GMT+13:00)', 'Nuku\'alofa', 'timezone_300', '13:00:00');
