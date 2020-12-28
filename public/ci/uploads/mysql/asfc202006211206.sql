set charset utf8;
CREATE TABLE `asfc_driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(11) DEFAULT '0',
  `toid` varchar(200) DEFAULT '',
  `oname` varchar(200) DEFAULT '',
  `dname` varchar(200) DEFAULT '',
  `totime` int(11) DEFAULT '0',
  `people` int(1) DEFAULT '0',
  `status` int(1) DEFAULT '0',
  `sok` int(11) DEFAULT '0',
  `atime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
insert into `asfc_driver`(`id`,`mobile`,`toid`,`oname`,`dname`,`totime`,`people`,`status`,`sok`,`atime`) values('1','13560515715','110.300832,21.151235|110.406337,21.248722','广东海洋大学主校区','万达广场','1578627000','4','1','3','1578626490');
CREATE TABLE `asfc_fbp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_a` decimal(3,2) NOT NULL,
  `fb_b` decimal(3,2) NOT NULL,
  `fb_c` decimal(3,2) NOT NULL,
  `fb_d` decimal(3,2) NOT NULL,
  `fb_e` decimal(3,2) NOT NULL,
  `wee` int(1) NOT NULL DEFAULT '0',
  `o` int(4) NOT NULL DEFAULT '0',
  `d` int(4) NOT NULL DEFAULT '0',
  `sok` int(11) NOT NULL DEFAULT '0',
  `adate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
insert into `asfc_fbp`(`id`,`fb_a`,`fb_b`,`fb_c`,`fb_d`,`fb_e`,`wee`,`o`,`d`,`sok`,`adate`) values('1','1.50','1.60','1.80','2.00','2.60','0','0','0','1','0000-00-00 00:00:00');
insert into `asfc_fbp`(`id`,`fb_a`,`fb_b`,`fb_c`,`fb_d`,`fb_e`,`wee`,`o`,`d`,`sok`,`adate`) values('2','1.40','1.60','1.80','2.00','2.50','1','1800','2000','0','0000-00-00 00:00:00');
insert into `asfc_fbp`(`id`,`fb_a`,`fb_b`,`fb_c`,`fb_d`,`fb_e`,`wee`,`o`,`d`,`sok`,`adate`) values('3','1.40','1.60','1.80','2.00','2.50','2','1300','1500','0','0000-00-00 00:00:00');
insert into `asfc_fbp`(`id`,`fb_a`,`fb_b`,`fb_c`,`fb_d`,`fb_e`,`wee`,`o`,`d`,`sok`,`adate`) values('4','1.40','1.60','1.80','2.00','2.50','3','1300','1500','0','0000-00-00 00:00:00');
insert into `asfc_fbp`(`id`,`fb_a`,`fb_b`,`fb_c`,`fb_d`,`fb_e`,`wee`,`o`,`d`,`sok`,`adate`) values('5','1.40','1.60','1.80','2.00','2.50','4','1300','1500','0','0000-00-00 00:00:00');
insert into `asfc_fbp`(`id`,`fb_a`,`fb_b`,`fb_c`,`fb_d`,`fb_e`,`wee`,`o`,`d`,`sok`,`adate`) values('6','1.40','1.60','1.80','2.00','2.50','5','1700','1900','0','0000-00-00 00:00:00');
insert into `asfc_fbp`(`id`,`fb_a`,`fb_b`,`fb_c`,`fb_d`,`fb_e`,`wee`,`o`,`d`,`sok`,`adate`) values('7','1.50','1.70','1.90','2.00','2.50','6','0','2359','0','0000-00-00 00:00:00');
insert into `asfc_fbp`(`id`,`fb_a`,`fb_b`,`fb_c`,`fb_d`,`fb_e`,`wee`,`o`,`d`,`sok`,`adate`) values('8','1.50','1.70','1.90','2.10','2.50','7','0','2359','0','0000-00-00 00:00:00');
CREATE TABLE `asfc_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `keywords` varchar(250) DEFAULT '',
  `content` text NOT NULL,
  `sid` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `sok` int(11) NOT NULL DEFAULT '0',
  `atime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
insert into `asfc_info`(`id`,`title`,`keywords`,`content`,`sid`,`sort`,`sok`,`atime`) values('1','联系客服','<div style=\"text-align:center;\"><img src=\"uploads/style/img/weixinimg.jpg\" /><div style=\"font-size:14px; line-height:30px;\">【客服微信：a_高佬】</div></div>','','1','0','1','0');
insert into `asfc_info`(`id`,`title`,`keywords`,`content`,`sid`,`sort`,`sok`,`atime`) values('2','价格计算','价格计算1','价格计算','1','0','1','0');
insert into `asfc_info`(`id`,`title`,`keywords`,`content`,`sid`,`sort`,`sok`,`atime`) values('3','顺风规则','顺风<br />规则','顺风规则','1','0','1','0');
CREATE TABLE `asfc_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(11) DEFAULT '0',
  `toid` varchar(200) DEFAULT '',
  `oname` varchar(200) DEFAULT '',
  `dname` varchar(200) DEFAULT '',
  `totime` int(11) DEFAULT '0',
  `people` int(1) DEFAULT '0',
  `price` decimal(5,2) NOT NULL DEFAULT '0.00',
  `price_p` decimal(5,2) NOT NULL DEFAULT '0.00',
  `netprice` decimal(5,2) NOT NULL DEFAULT '0.00',
  `pok` int(1) DEFAULT '0',
  `km` varchar(200) DEFAULT '',
  `distance` varchar(200) DEFAULT '',
  `message` text NOT NULL,
  `thank` decimal(3,0) NOT NULL DEFAULT '0',
  `s_id` int(11) DEFAULT '0',
  `s_mobile` varchar(11) DEFAULT '0',
  `s_atime` int(11) DEFAULT '0',
  `s_status` int(1) DEFAULT '0',
  `c_status` int(1) DEFAULT '0',
  `status` int(1) DEFAULT '0',
  `sok` int(11) DEFAULT '0',
  `pay` int(1) DEFAULT '0',
  `utime` int(11) NOT NULL,
  `atime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `asfc_passenger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(11) DEFAULT '0',
  `toid` varchar(200) DEFAULT '',
  `oname` varchar(200) DEFAULT '',
  `dname` varchar(200) DEFAULT '',
  `totime` int(11) DEFAULT '0',
  `people` int(1) DEFAULT '0',
  `price` decimal(5,2) NOT NULL DEFAULT '0.00',
  `price_p` decimal(5,2) NOT NULL DEFAULT '0.00',
  `pok` int(1) DEFAULT '0',
  `km` varchar(200) DEFAULT '',
  `distance` varchar(200) DEFAULT '',
  `message` text NOT NULL,
  `thank` decimal(3,0) NOT NULL DEFAULT '0',
  `sok` int(11) DEFAULT '0',
  `atime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
insert into `asfc_passenger`(`id`,`mobile`,`toid`,`oname`,`dname`,`totime`,`people`,`price`,`price_p`,`pok`,`km`,`distance`,`message`,`thank`,`sok`,`atime`) values('1','13560515715','110.300832,21.151235|110.406337,21.248722','广东海洋大学主校区','万达广场','1578312600','1','37.40','29.90','1','','24.90','','0','3','1578312167');
insert into `asfc_passenger`(`id`,`mobile`,`toid`,`oname`,`dname`,`totime`,`people`,`price`,`price_p`,`pok`,`km`,`distance`,`message`,`thank`,`sok`,`atime`) values('2','17507590132','110.300832,21.151215|110.406188,21.198655','广东海洋大学主校区','城市广场(民享西四路)','1578313500','1','24.90','19.90','1','','16.60','','0','3','1578312986');
insert into `asfc_passenger`(`id`,`mobile`,`toid`,`oname`,`dname`,`totime`,`people`,`price`,`price_p`,`pok`,`km`,`distance`,`message`,`thank`,`sok`,`atime`) values('3','17507590132','110.300832,21.151215|110.402467,21.210272','广东海洋大学主校区','鼎盛广场','1578627000','1','32.70','26.20','1','','21.81','','0','3','1578626548');
insert into `asfc_passenger`(`id`,`mobile`,`toid`,`oname`,`dname`,`totime`,`people`,`price`,`price_p`,`pok`,`km`,`distance`,`message`,`thank`,`sok`,`atime`) values('4','13560515715','110.300832,21.151235|110.406188,21.198655','广东海洋大学主校区','城市广场(民享西四路)','1578841200','1','31.50','25.20','1','','21.02','','0','3','1578840410');
CREATE TABLE `asfc_poi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(250) DEFAULT NULL,
  `content` longtext,
  `adate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `asfc_pois` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(200) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `adname` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `hits` int(11) DEFAULT '0',
  `udate` datetime NOT NULL,
  `adate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
insert into `asfc_pois`(`id`,`location`,`name`,`adname`,`address`,`hits`,`udate`,`adate`) values('1','110.35894,21.27134','湛江市第十五小学','赤坎区','跃进路75号','0','0000-00-00 00:00:00','2020-05-16 14:00:34');
insert into `asfc_pois`(`id`,`location`,`name`,`adname`,`address`,`hits`,`udate`,`adate`) values('2','110.39821,21.19169','湛江市霞山区人民政府','霞山区','中国建设银行(湛江荷花支行)人民政府','0','0000-00-00 00:00:00','2020-05-25 19:01:46');
CREATE TABLE `asfc_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xid` varchar(200) DEFAULT NULL,
  `origin` varchar(200) DEFAULT NULL,
  `destination` varchar(200) DEFAULT NULL,
  `distance` int(11) DEFAULT '0',
  `duration` int(11) DEFAULT '0',
  `tolls` int(11) DEFAULT '0',
  `hits` int(11) DEFAULT '0',
  `adate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
insert into `asfc_route`(`id`,`xid`,`origin`,`destination`,`distance`,`duration`,`tolls`,`hits`,`adate`) values('1','110.300832,21.151235|110.406337,21.248722','110.300832,21.151235','110.406337,21.248722','24904','2435','0','0','2020-01-06 20:02:45');
insert into `asfc_route`(`id`,`xid`,`origin`,`destination`,`distance`,`duration`,`tolls`,`hits`,`adate`) values('2','110.300832,21.151215|110.406188,21.198655','110.300832,21.151215','110.406188,21.198655','16600','1812','0','0','2020-01-06 20:16:25');
insert into `asfc_route`(`id`,`xid`,`origin`,`destination`,`distance`,`duration`,`tolls`,`hits`,`adate`) values('3','110.300832,21.151215|110.402467,21.210272','110.300832,21.151215','110.402467,21.210272','21807','2523','0','0','2020-01-10 11:22:27');
insert into `asfc_route`(`id`,`xid`,`origin`,`destination`,`distance`,`duration`,`tolls`,`hits`,`adate`) values('4','110.300832,21.151235|110.300832,21.151215','110.300832,21.151235','110.300832,21.151215','2','1','0','0','2020-01-12 22:37:39');
insert into `asfc_route`(`id`,`xid`,`origin`,`destination`,`distance`,`duration`,`tolls`,`hits`,`adate`) values('5','110.300832,21.151235|110.406188,21.198655','110.300832,21.151235','110.406188,21.198655','21022','2166','0','0','2020-01-12 22:41:28');
insert into `asfc_route`(`id`,`xid`,`origin`,`destination`,`distance`,`duration`,`tolls`,`hits`,`adate`) values('6','110.35894,21.27134|110.300832,21.151215','110.35894,21.27134','110.300832,21.151215','24656','2590','0','0','2020-05-25 19:24:34');
insert into `asfc_route`(`id`,`xid`,`origin`,`destination`,`distance`,`duration`,`tolls`,`hits`,`adate`) values('7','110.39821,21.19169|110.406337,21.248722','110.39821,21.19169','110.406337,21.248722','8635','1096','0','0','2020-05-26 00:52:55');
CREATE TABLE `asfc_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `settit` varchar(50) NOT NULL,
  `pcodds` decimal(5,1) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
insert into `asfc_site`(`id`,`settit`,`pcodds`,`price`) values('1','海大顺风车（体验版）','0.0','7.00');
CREATE TABLE `asfc_stroke` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(11) DEFAULT '0',
  `pids` varchar(200) DEFAULT '0',
  `people` int(1) DEFAULT '0',
  `pok` int(1) DEFAULT NULL,
  `likecode` varchar(50) DEFAULT '',
  `sok` int(11) DEFAULT '0',
  `ntime` int(11) NOT NULL,
  `vtime` int(11) NOT NULL,
  `atime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `asfc_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(11) DEFAULT '0',
  `email` varchar(200) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  `callname` varchar(200) DEFAULT '',
  `avatarid` int(2) NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `fee` decimal(3,2) NOT NULL DEFAULT '0.00',
  `oid` varchar(200) DEFAULT '',
  `oname` varchar(200) DEFAULT '',
  `cint` int(11) NOT NULL DEFAULT '0',
  `ctime` int(11) NOT NULL DEFAULT '0',
  `sint` int(11) NOT NULL DEFAULT '0',
  `stime` int(11) NOT NULL DEFAULT '0',
  `owner` int(11) DEFAULT '0',
  `numberplate` varchar(50) DEFAULT '',
  `ownertxt` varchar(50) DEFAULT '',
  `sok` int(11) DEFAULT '0',
  `logincode` varchar(50) DEFAULT '',
  `ldate` datetime NOT NULL,
  `udate` datetime NOT NULL,
  `adate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
insert into `asfc_user`(`id`,`mobile`,`email`,`password`,`callname`,`avatarid`,`price`,`fee`,`oid`,`oname`,`cint`,`ctime`,`sint`,`stime`,`owner`,`numberplate`,`ownertxt`,`sok`,`logincode`,`ldate`,`udate`,`adate`) values('1','13560515715','online@ecgam.com','','袁先生','13','800.00','0.10','110.39821,21.19169','湛江市霞山区人民政府','0','0','0','0','1','粤GF132','大众 捷达 银色','1','5c412f1f346b7538c0c6feb09fe383dc','2020-05-26 03:16:20','0000-00-00 00:00:00','2019-10-25 08:46:37');
insert into `asfc_user`(`id`,`mobile`,`email`,`password`,`callname`,`avatarid`,`price`,`fee`,`oid`,`oname`,`cint`,`ctime`,`sint`,`stime`,`owner`,`numberplate`,`ownertxt`,`sok`,`logincode`,`ldate`,`udate`,`adate`) values('2','17507590132','','','尾号0132','12','300.00','0.10','110.35894,21.27134','湛江市第十五小学','0','0','0','0','1','粤GF132','大众 捷达 银色','1','cf161c47f59d2870fc48179f51260c53','2020-05-19 17:07:46','0000-00-00 00:00:00','2019-11-02 19:03:07');
CREATE TABLE `asfc_userowner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(11) DEFAULT '0',
  `did` varchar(200) DEFAULT '',
  `dname` varchar(200) DEFAULT '',
  `utime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `asfc_usprice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) DEFAULT NULL,
  `cuid` int(11) DEFAULT NULL,
  `suid` int(11) DEFAULT NULL,
  `cmobile` varchar(11) DEFAULT '',
  `smobile` varchar(11) DEFAULT '',
  `price` decimal(5,2) NOT NULL DEFAULT '0.00',
  `sprice` decimal(5,2) NOT NULL DEFAULT '0.00',
  `aprice` decimal(5,2) NOT NULL DEFAULT '0.00',
  `way` int(1) DEFAULT NULL,
  `atime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
insert into `asfc_usprice`(`id`,`oid`,`cuid`,`suid`,`cmobile`,`smobile`,`price`,`sprice`,`aprice`,`way`,`atime`) values('1','0','1','0','','','10.00','0.00','0.00','0','1575874279');
insert into `asfc_usprice`(`id`,`oid`,`cuid`,`suid`,`cmobile`,`smobile`,`price`,`sprice`,`aprice`,`way`,`atime`) values('2','0','1','0','','','20.00','0.00','0.00','0','1575874279');
insert into `asfc_usprice`(`id`,`oid`,`cuid`,`suid`,`cmobile`,`smobile`,`price`,`sprice`,`aprice`,`way`,`atime`) values('3','0','1','2','','','200.00','0.00','0.00','3','1575875523');
CREATE TABLE `asfc_uspro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(11) DEFAULT '0',
  `s` int(4) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `cid` int(11) NOT NULL,
  `info` varchar(200) DEFAULT '',
  `sok` int(1) NOT NULL,
  `h` int(1) NOT NULL,
  `adate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('1','13560515715','1','0.00','1','','1','1','2019-11-16 14:41:59');
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('2','13560515715','0','0.00','2','','1','0','2019-11-16 18:15:01');
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('3','13560515715','0','0.00','5','','1','0','2019-11-17 12:52:08');
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('4','13560515715','0','0.00','6','','1','0','2019-11-17 12:52:08');
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('5','13560515715','0','0.00','7','','1','0','2019-11-17 12:52:08');
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('6','13560515715','1','0.00','2','','1','1','2019-11-17 15:10:02');
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('7','13560515715','0','0.00','9','','1','0','2019-11-17 15:35:03');
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('8','13560515715','0','0.00','1','','1','0','2020-01-06 20:16:39');
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('9','17507590132','0','0.00','2','','1','0','2020-01-10 11:21:45');
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('10','13560515715','1','0.00','1','','1','1','2020-01-10 11:31:36');
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('11','13560515715','0','0.00','4','','1','0','2020-01-12 23:00:01');
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('12','13560515715','0','0.00','4','','1','0','2020-01-12 23:00:01');
insert into `asfc_uspro`(`id`,`mobile`,`s`,`price`,`cid`,`info`,`sok`,`h`,`adate`) values('13','17507590132','0','0.00','3','','1','0','2020-05-19 17:07:50');
CREATE TABLE `asfc_usverify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(11) DEFAULT '0',
  `vcode` varchar(50) DEFAULT '',
  `atime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
insert into `asfc_usverify`(`id`,`mobile`,`vcode`,`atime`) values('1','13560515715','6736','1573876670');
insert into `asfc_usverify`(`id`,`mobile`,`vcode`,`atime`) values('2','13560515715','3545','1577677753');
insert into `asfc_usverify`(`id`,`mobile`,`vcode`,`atime`) values('3','17507590132','9854','1577682870');
insert into `asfc_usverify`(`id`,`mobile`,`vcode`,`atime`) values('4','13560515715','2233','1579654056');
insert into `asfc_usverify`(`id`,`mobile`,`vcode`,`atime`) values('5','13560515715','7432','1580621891');
insert into `asfc_usverify`(`id`,`mobile`,`vcode`,`atime`) values('6','17507590132','2811','1589879254');
insert into `asfc_usverify`(`id`,`mobile`,`vcode`,`atime`) values('7','13560515715','7402','1589879425');
insert into `asfc_usverify`(`id`,`mobile`,`vcode`,`atime`) values('8','13560515715','2796','1590434164');
CREATE TABLE `pu_gzj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n` int(1) DEFAULT '0',
  `a` varchar(100) DEFAULT '',
  `b` varchar(100) DEFAULT '',
  `c` varchar(100) DEFAULT '',
  `d` varchar(100) DEFAULT '',
  `e` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=298 DEFAULT CHARSET=utf8;
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('1','1616','后金太祖爱新觉罗努尔哈赤','天命','元年','公元 1616年','丙辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('2','1617','后金太祖爱新觉罗努尔哈赤','天命','二年','公元 1617年','丁巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('3','1618','后金太祖爱新觉罗努尔哈赤','天命','三年','公元 1618年','戊午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('4','1619','后金太祖爱新觉罗努尔哈赤','天命','四年','公元 1619年','己未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('5','1620','后金太祖爱新觉罗努尔哈赤','天命','五年','公元 1620年','庚申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('6','1621','后金太祖爱新觉罗努尔哈赤','天命','六年','公元 1621年','辛酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('7','1622','后金太祖爱新觉罗努尔哈赤','天命','七年','公元 1622年','壬戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('8','1623','后金太祖爱新觉罗努尔哈赤','天命','八年','公元 1623年','癸亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('9','1624','后金太祖爱新觉罗努尔哈赤','天命','九年','公元 1624年','甲子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('10','1625','后金太祖爱新觉罗努尔哈赤','天命','十年','公元 1625年','乙丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('11','1626','后金太祖爱新觉罗努尔哈赤','天命','十一年','公元 1626年','丙寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('12','1627','后金大宗爱新觉罗皇太极','天聪','元年','公元 1627年','丁卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('13','1628','后金大宗爱新觉罗皇太极','天聪','二年','公元 1628年','戊辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('14','1629','后金大宗爱新觉罗皇太极','天聪','三年','公元 1629年','己巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('15','1630','后金大宗爱新觉罗皇太极','天聪','四年','公元 1630年','庚午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('16','1631','后金大宗爱新觉罗皇太极','天聪','五年','公元 1631年','辛未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('17','1632','后金大宗爱新觉罗皇太极','天聪','六年','公元 1632年','壬申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('18','1633','后金大宗爱新觉罗皇太极','天聪','七年','公元 1633年','癸酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('19','1634','后金大宗爱新觉罗皇太极','天聪','八年','公元 1634年','甲戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('20','1635','后金大宗爱新觉罗皇太极','天聪','九年','公元 1635年','乙亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('21','1636','后金大宗爱新觉罗皇太极','崇德','元年','公元 1636年','丙子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('22','1636','后金大宗爱新觉罗皇太极','天聪','十年','公元 1636年','丙子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('23','1637','后金大宗爱新觉罗皇太极','崇德','二年','公元 1637年','丁丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('24','1638','后金大宗爱新觉罗皇太极','崇德','三年','公元 1638年','戊寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('25','1639','后金大宗爱新觉罗皇太极','崇德','四年','公元 1639年','己卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('26','1640','后金大宗爱新觉罗皇太极','崇德','五年','公元 1640年','庚辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('27','1641','后金大宗爱新觉罗皇太极','崇德','六年','公元 1641年','辛巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('28','1642','后金大宗爱新觉罗皇太极','崇德','七年','公元 1642年','壬午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('29','1643','后金大宗爱新觉罗皇太极','崇德','八年','公元 1643年','癸未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('30','1644','清世祖福临','顺治','元年','公元 1644年','甲申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('31','1645','清世祖福临','顺治','二年','公元 1645年','乙酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('32','1646','清世祖福临','顺治','三年','公元 1646年','丙戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('33','1647','清世祖福临','顺治','四年','公元 1647年','丁亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('34','1648','清世祖福临','顺治','五年','公元 1648年','戊子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('35','1649','清世祖福临','顺治','六年','公元 1649年','己丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('36','1650','清世祖福临','顺治','七年','公元 1650年','庚寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('37','1651','清世祖福临','顺治','八年','公元 1651年','辛卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('38','1652','清世祖福临','顺治','九年','公元 1652年','壬辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('39','1653','清世祖福临','顺治','十年','公元 1653年','癸巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('40','1654','清世祖福临','顺治','十一年','公元 1654年','甲午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('41','1655','清世祖福临','顺治','十二年','公元 1655年','乙未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('42','1656','清世祖福临','顺治','十三年','公元 1656年','丙申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('43','1657','清世祖福临','顺治','十四年','公元 1657年','丁酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('44','1658','清世祖福临','顺治','十五年','公元 1658年','戊戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('45','1659','清世祖福临','顺治','十六年','公元 1659年','己亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('46','1660','清世祖福临','顺治','十七年','公元 1660年','庚子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('47','1661','清世祖福临','顺治','十八年','公元 1661年','辛丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('48','1662','清圣祖玄烨','康熙','元年','公元 1662年','壬寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('49','1663','清圣祖玄烨','康熙','二年','公元 1663年','癸卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('50','1664','清圣祖玄烨','康熙','三年','公元 1664年','甲辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('51','1665','清圣祖玄烨','康熙','四年','公元 1665年','乙巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('52','1666','清圣祖玄烨','康熙','五年','公元 1666年','丙午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('53','1667','清圣祖玄烨','康熙','六年','公元 1667年','丁未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('54','1668','清圣祖玄烨','康熙','七年','公元 1668年','戊申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('55','1669','清圣祖玄烨','康熙','八年','公元 1669年','己酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('56','1670','清圣祖玄烨','康熙','九年','公元 1670年','庚戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('57','1671','清圣祖玄烨','康熙','十年','公元 1671年','辛亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('58','1672','清圣祖玄烨','康熙','十一年','公元 1672年','壬子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('59','1673','清圣祖玄烨','康熙','十二年','公元 1673年','癸丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('60','1674','清圣祖玄烨','康熙','十三年','公元 1674年','甲寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('61','1675','清圣祖玄烨','康熙','十四年','公元 1675年','乙卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('62','1676','清圣祖玄烨','康熙','十五年','公元 1676年','丙辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('63','1677','清圣祖玄烨','康熙','十六年','公元 1677年','丁巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('64','1678','清圣祖玄烨','康熙','十七年','公元 1678年','戊午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('65','1679','清圣祖玄烨','康熙','十八年','公元 1679年','己未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('66','1680','清圣祖玄烨','康熙','十九年','公元 1680年','庚申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('67','1681','清圣祖玄烨','康熙','二十年','公元 1681年','辛酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('68','1682','清圣祖玄烨','康熙','二十一年','公元 1682年','壬戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('69','1683','清圣祖玄烨','康熙','二十二年','公元 1683年','癸亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('70','1684','清圣祖玄烨','康熙','二十三年','公元 1684年','甲子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('71','1685','清圣祖玄烨','康熙','二十四年','公元 1685年','乙丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('72','1686','清圣祖玄烨','康熙','二十五年','公元 1686年','丙寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('73','1687','清圣祖玄烨','康熙','二十六年','公元 1687年','丁卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('74','1688','清圣祖玄烨','康熙','二十七年','公元 1688年','戊辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('75','1689','清圣祖玄烨','康熙','二十八年','公元 1689年','己巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('76','1690','清圣祖玄烨','康熙','二十九年','公元 1690年','庚午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('77','1691','清圣祖玄烨','康熙','三十年','公元 1691年','辛未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('78','1692','清圣祖玄烨','康熙','三十一年','公元 1692年','壬申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('79','1693','清圣祖玄烨','康熙','三十二年','公元 1693年','癸酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('80','1694','清圣祖玄烨','康熙','三十三年','公元 1694年','甲戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('81','1695','清圣祖玄烨','康熙','三十四年','公元 1695年','乙亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('82','1696','清圣祖玄烨','康熙','三十五年','公元 1696年','丙子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('83','1697','清圣祖玄烨','康熙','三十六年','公元 1697年','丁丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('84','1698','清圣祖玄烨','康熙','三十七年','公元 1698年','戊寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('85','1699','清圣祖玄烨','康熙','三十八年','公元 1699年','己卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('86','1700','清圣祖玄烨','康熙','三十九年','公元 1700年','庚辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('87','1701','清圣祖玄烨','康熙','四十年','公元 1701年','辛巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('88','1702','清圣祖玄烨','康熙','四十一年','公元 1702年','壬午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('89','1703','清圣祖玄烨','康熙','四十二年','公元 1703年','癸未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('90','1704','清圣祖玄烨','康熙','四十三年','公元 1704年','甲申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('91','1705','清圣祖玄烨','康熙','四十四年','公元 1705年','乙酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('92','1706','清圣祖玄烨','康熙','四十五年','公元 1706年','丙戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('93','1707','清圣祖玄烨','康熙','四十六年','公元 1707年','丁亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('94','1708','清圣祖玄烨','康熙','四十七年','公元 1708年','戊子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('95','1709','清圣祖玄烨','康熙','四十八年','公元 1709年','己丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('96','1710','清圣祖玄烨','康熙','四十九年','公元 1710年','庚寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('97','1711','清圣祖玄烨','康熙','五十年','公元 1711年','辛卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('98','1712','清圣祖玄烨','康熙','五十一年','公元 1712年','壬辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('99','1713','清圣祖玄烨','康熙','五十二年','公元 1713年','癸巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('100','1714','清圣祖玄烨','康熙','五十三年','公元 1714年','甲午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('101','1715','清圣祖玄烨','康熙','五十四年','公元 1715年','乙未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('102','1716','清圣祖玄烨','康熙','五十五年','公元 1716年','丙申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('103','1717','清圣祖玄烨','康熙','五十六年','公元 1717年','丁酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('104','1718','清圣祖玄烨','康熙','五十七年','公元 1718年','戊戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('105','1719','清圣祖玄烨','康熙','五十八年','公元 1719年','己亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('106','1720','清圣祖玄烨','康熙','五十九年','公元 1720年','庚子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('107','1721','清圣祖玄烨','康熙','六十年','公元 1721年','辛丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('108','1722','清圣祖玄烨','康熙','六十一年','公元 1722年','壬寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('109','1723','清世宗胤禛','雍正','元年','公元 1723年','癸卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('110','1724','清世宗胤禛','雍正','二年','公元 1724年','甲辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('111','1725','清世宗胤禛','雍正','三年','公元 1725年','乙巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('112','1726','清世宗胤禛','雍正','四年','公元 1726年','丙午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('113','1727','清世宗胤禛','雍正','五年','公元 1727年','丁未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('114','1728','清世宗胤禛','雍正','六年','公元 1728年','戊申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('115','1729','清世宗胤禛','雍正','七年','公元 1729年','己酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('116','1730','清世宗胤禛','雍正','八年','公元 1730年','庚戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('117','1731','清世宗胤禛','雍正','九年','公元 1731年','辛亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('118','1732','清世宗胤禛','雍正','十年','公元 1732年','壬子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('119','1733','清世宗胤禛','雍正','十一年','公元 1733年','癸丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('120','1734','清世宗胤禛','雍正','十二年','公元 1734年','甲寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('121','1735','清世宗胤禛','雍正','十三年','公元 1735年','乙卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('122','1736','清高宗弘历','乾隆','元年','公元 1736年','丙辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('123','1737','清高宗弘历','乾隆','二年','公元 1737年','丁巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('124','1738','清高宗弘历','乾隆','三年','公元 1738年','戊午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('125','1739','清高宗弘历','乾隆','四年','公元 1739年','己未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('126','1740','清高宗弘历','乾隆','五年','公元 1740年','庚申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('127','1741','清高宗弘历','乾隆','六年','公元 1741年','辛酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('128','1742','清高宗弘历','乾隆','七年','公元 1742年','壬戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('129','1743','清高宗弘历','乾隆','八年','公元 1743年','癸亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('130','1744','清高宗弘历','乾隆','九年','公元 1744年','甲子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('131','1745','清高宗弘历','乾隆','十年','公元 1745年','乙丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('132','1746','清高宗弘历','乾隆','十一年','公元 1746年','丙寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('133','1747','清高宗弘历','乾隆','十二年','公元 1747年','丁卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('134','1748','清高宗弘历','乾隆','十三年','公元 1748年','戊辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('135','1749','清高宗弘历','乾隆','十四年','公元 1749年','己巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('136','1750','清高宗弘历','乾隆','十五年','公元 1750年','庚午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('137','1751','清高宗弘历','乾隆','十六年','公元 1751年','辛未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('138','1752','清高宗弘历','乾隆','十七年','公元 1752年','壬申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('139','1753','清高宗弘历','乾隆','十八年','公元 1753年','癸酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('140','1754','清高宗弘历','乾隆','十九年','公元 1754年','甲戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('141','1755','清高宗弘历','乾隆','二十年','公元 1755年','乙亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('142','1756','清高宗弘历','乾隆','二十一年','公元 1756年','丙子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('143','1757','清高宗弘历','乾隆','二十二年','公元 1757年','丁丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('144','1758','清高宗弘历','乾隆','二十三年','公元 1758年','戊寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('145','1759','清高宗弘历','乾隆','二十四年','公元 1759年','己卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('146','1760','清高宗弘历','乾隆','二十五年','公元 1760年','庚辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('147','1761','清高宗弘历','乾隆','二十六年','公元 1761年','辛巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('148','1762','清高宗弘历','乾隆','二十七年','公元 1762年','壬午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('149','1763','清高宗弘历','乾隆','二十八年','公元 1763年','癸未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('150','1764','清高宗弘历','乾隆','二十九年','公元 1764年','甲申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('151','1765','清高宗弘历','乾隆','三十年','公元 1765年','乙酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('152','1766','清高宗弘历','乾隆','三十一年','公元 1766年','丙戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('153','1767','清高宗弘历','乾隆','三十二年','公元 1767年','丁亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('154','1768','清高宗弘历','乾隆','三十三年','公元 1768年','戊子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('155','1769','清高宗弘历','乾隆','三十四年','公元 1769年','己丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('156','1770','清高宗弘历','乾隆','三十五年','公元 1770年','庚寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('157','1771','清高宗弘历','乾隆','三十六年','公元 1771年','辛卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('158','1772','清高宗弘历','乾隆','三十七年','公元 1772年','壬辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('159','1773','清高宗弘历','乾隆','三十八年','公元 1773年','癸巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('160','1774','清高宗弘历','乾隆','三十九年','公元 1774年','甲午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('161','1775','清高宗弘历','乾隆','四十年','公元 1775年','乙未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('162','1776','清高宗弘历','乾隆','四十一年','公元 1776年','丙申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('163','1777','清高宗弘历','乾隆','四十二年','公元 1777年','丁酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('164','1778','清高宗弘历','乾隆','四十三年','公元 1778年','戊戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('165','1779','清高宗弘历','乾隆','四十四年','公元 1779年','己亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('166','1780','清高宗弘历','乾隆','四十五年','公元 1780年','庚子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('167','1781','清高宗弘历','乾隆','四十六年','公元 1781年','辛丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('168','1782','清高宗弘历','乾隆','四十七年','公元 1782年','壬寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('169','1783','清高宗弘历','乾隆','四十八年','公元 1783年','癸卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('170','1784','清高宗弘历','乾隆','四十九年','公元 1784年','甲辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('171','1785','清高宗弘历','乾隆','五十年','公元 1785年','乙巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('172','1786','清高宗弘历','乾隆','五十一年','公元 1786年','丙午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('173','1787','清高宗弘历','乾隆','五十二年','公元 1787年','丁未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('174','1788','清高宗弘历','乾隆','五十三年','公元 1788年','戊申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('175','1789','清高宗弘历','乾隆','五十四年','公元 1789年','己酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('176','1790','清高宗弘历','乾隆','五十五年','公元 1790年','庚戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('177','1791','清高宗弘历','乾隆','五十六年','公元 1791年','辛亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('178','1792','清高宗弘历','乾隆','五十七年','公元 1792年','壬子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('179','1793','清高宗弘历','乾隆','五十八年','公元 1793年','癸丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('180','1794','清高宗弘历','乾隆','五十九年','公元 1794年','甲寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('181','1795','清高宗弘历','乾隆','六十年','公元 1795年','乙卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('182','1796','清仁宗顺琰','嘉庆','元年','公元 1796年','丙辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('183','1797','清仁宗顺琰','嘉庆','二年','公元 1797年','丁巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('184','1798','清仁宗顺琰','嘉庆','三年','公元 1798年','戊午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('185','1799','清仁宗顺琰','嘉庆','四年','公元 1799年','己未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('186','1800','清仁宗顺琰','嘉庆','五年','公元 1800年','庚申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('187','1801','清仁宗顺琰','嘉庆','六年','公元 1801年','辛酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('188','1802','清仁宗顺琰','嘉庆','七年','公元 1802年','壬戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('189','1803','清仁宗顺琰','嘉庆','八年','公元 1803年','癸亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('190','1804','清仁宗顺琰','嘉庆','九年','公元 1804年','甲子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('191','1805','清仁宗顺琰','嘉庆','十年','公元 1805年','乙丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('192','1806','清仁宗顺琰','嘉庆','十一年','公元 1806年','丙寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('193','1807','清仁宗顺琰','嘉庆','十二年','公元 1807年','丁卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('194','1808','清仁宗顺琰','嘉庆','十三年','公元 1808年','戊辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('195','1809','清仁宗顺琰','嘉庆','十四年','公元 1809年','己巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('196','1810','清仁宗顺琰','嘉庆','十五年','公元 1810年','庚午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('197','1811','清仁宗顺琰','嘉庆','十六年','公元 1811年','辛未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('198','1812','清仁宗顺琰','嘉庆','十七年','公元 1812年','壬申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('199','1813','清仁宗顺琰','嘉庆','十八年','公元 1813年','癸酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('200','1814','清仁宗顺琰','嘉庆','十九年','公元 1814年','甲戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('201','1815','清仁宗顺琰','嘉庆','二十年','公元 1815年','乙亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('202','1816','清仁宗顺琰','嘉庆','二十一年','公元 1816年','丙子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('203','1817','清仁宗顺琰','嘉庆','二十二年','公元 1817年','丁丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('204','1818','清仁宗顺琰','嘉庆','二十三年','公元 1818年','戊寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('205','1819','清仁宗顺琰','嘉庆','二十四年','公元 1819年','己卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('206','1820','清仁宗顺琰','嘉庆','二十五年','公元 1820年','庚辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('207','1821','清宣宗旻宁','道光','元年','公元 1821年','辛巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('208','1822','清宣宗旻宁','道光','二年','公元 1822年','壬午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('209','1823','清宣宗旻宁','道光','三年','公元 1823年','癸未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('210','1824','清宣宗旻宁','道光','四年','公元 1824年','甲申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('211','1825','清宣宗旻宁','道光','五年','公元 1825年','乙酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('212','1826','清宣宗旻宁','道光','六年','公元 1826年','丙戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('213','1827','清宣宗旻宁','道光','七年','公元 1827年','丁亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('214','1828','清宣宗旻宁','道光','八年','公元 1828年','戊子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('215','1829','清宣宗旻宁','道光','九年','公元 1829年','己丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('216','1830','清宣宗旻宁','道光','十年','公元 1830年','庚寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('217','1831','清宣宗旻宁','道光','十一年','公元 1831年','辛卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('218','1832','清宣宗旻宁','道光','十二年','公元 1832年','壬辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('219','1833','清宣宗旻宁','道光','十三年','公元 1833年','癸巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('220','1834','清宣宗旻宁','道光','十四年','公元 1834年','甲午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('221','1835','清宣宗旻宁','道光','十五年','公元 1835年','乙未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('222','1836','清宣宗旻宁','道光','十六年','公元 1836年','丙申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('223','1837','清宣宗旻宁','道光','十七年','公元 1837年','丁酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('224','1838','清宣宗旻宁','道光','十八年','公元 1838年','戊戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('225','1839','清宣宗旻宁','道光','十九年','公元 1839年','己亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('226','1840','清宣宗旻宁','道光','二十年','公元 1840年','庚子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('227','1841','清宣宗旻宁','道光','二十一年','公元 1841年','辛丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('228','1842','清宣宗旻宁','道光','二十二年','公元 1842年','壬寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('229','1843','清宣宗旻宁','道光','二十三年','公元 1843年','癸卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('230','1844','清宣宗旻宁','道光','二十四年','公元 1844年','甲辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('231','1845','清宣宗旻宁','道光','二十五年','公元 1845年','乙巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('232','1846','清宣宗旻宁','道光','二十六年','公元 1846年','丙午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('233','1847','清宣宗旻宁','道光','二十七年','公元 1847年','丁未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('234','1848','清宣宗旻宁','道光','二十八年','公元 1848年','戊申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('235','1849','清宣宗旻宁','道光','二十九年','公元 1849年','己酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('236','1850','清宣宗旻宁','道光','三十年','公元 1850年','庚戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('237','1851','清文宗奕詝','咸丰','元年','公元 1851年','辛亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('238','1852','清文宗奕詝','咸丰','二年','公元 1852年','壬子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('239','1853','清文宗奕詝','咸丰','三年','公元 1853年','癸丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('240','1854','清文宗奕詝','咸丰','四年','公元 1854年','甲寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('241','1855','清文宗奕詝','咸丰','五年','公元 1855年','乙卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('242','1856','清文宗奕詝','咸丰','六年','公元 1856年','丙辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('243','1857','清文宗奕詝','咸丰','七年','公元 1857年','丁巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('244','1858','清文宗奕詝','咸丰','八年','公元 1858年','戊午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('245','1859','清文宗奕詝','咸丰','九年','公元 1859年','己未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('246','1860','清文宗奕詝','咸丰','十年','公元 1860年','庚申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('247','1861','清文宗奕詝','咸丰','十一年','公元 1861年','辛酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('248','1862','清穆宗载淳','同治','元年','公元 1862年','壬戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('249','1863','清穆宗载淳','同治','二年','公元 1863年','癸亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('250','1864','清穆宗载淳','同治','三年','公元 1864年','甲子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('251','1865','清穆宗载淳','同治','四年','公元 1865年','乙丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('252','1866','清穆宗载淳','同治','五年','公元 1866年','丙寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('253','1867','清穆宗载淳','同治','六年','公元 1867年','丁卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('254','1868','清穆宗载淳','同治','七年','公元 1868年','戊辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('255','1869','清穆宗载淳','同治','八年','公元 1869年','己巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('256','1870','清穆宗载淳','同治','九年','公元 1870年','庚午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('257','1871','清穆宗载淳','同治','十年','公元 1871年','辛未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('258','1872','清穆宗载淳','同治','十一年','公元 1872年','壬申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('259','1873','清穆宗载淳','同治','十二年','公元 1873年','癸酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('260','1874','清穆宗载淳','同治','十三年','公元 1874年','甲戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('261','1875','清德宗载湉','光绪','元年','公元 1875年','乙亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('262','1876','清德宗载湉','光绪','二年','公元 1876年','丙子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('263','1877','清德宗载湉','光绪','三年','公元 1877年','丁丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('264','1878','清德宗载湉','光绪','四年','公元 1878年','戊寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('265','1879','清德宗载湉','光绪','五年','公元 1879年','己卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('266','1880','清德宗载湉','光绪','六年','公元 1880年','庚辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('267','1881','清德宗载湉','光绪','七年','公元 1881年','辛巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('268','1882','清德宗载湉','光绪','八年','公元 1882年','壬午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('269','1883','清德宗载湉','光绪','九年','公元 1883年','癸未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('270','1884','清德宗载湉','光绪','十年','公元 1884年','甲申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('271','1885','清德宗载湉','光绪','十一年','公元 1885年','乙酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('272','1886','清德宗载湉','光绪','十二年','公元 1886年','丙戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('273','1887','清德宗载湉','光绪','十三年','公元 1887年','丁亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('274','1888','清德宗载湉','光绪','十四年','公元 1888年','戊子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('275','1889','清德宗载湉','光绪','十五年','公元 1889年','己丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('276','1890','清德宗载湉','光绪','十六年','公元 1890年','庚寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('277','1891','清德宗载湉','光绪','十七年','公元 1891年','辛卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('278','1892','清德宗载湉','光绪','十八年','公元 1892年','壬辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('279','1893','清德宗载湉','光绪','十九年','公元 1893年','癸巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('280','1894','清德宗载湉','光绪','二十年','公元 1894年','甲午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('281','1895','清德宗载湉','光绪','二十一年','公元 1895年','乙未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('282','1896','清德宗载湉','光绪','二十二年','公元 1896年','丙申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('283','1897','清德宗载湉','光绪','二十三年','公元 1897年','丁酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('284','1898','清德宗载湉','光绪','二十四年','公元 1898年','戊戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('285','1899','清德宗载湉','光绪','二十五年','公元 1899年','己亥年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('286','1900','清德宗载湉','光绪','二十六年','公元 1900年','庚子年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('287','1901','清德宗载湉','光绪','二十七年','公元 1901年','辛丑年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('288','1902','清德宗载湉','光绪','二十八年','公元 1902年','壬寅年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('289','1903','清德宗载湉','光绪','二十九年','公元 1903年','癸卯年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('290','1904','清德宗载湉','光绪','三十年','公元 1904年','甲辰年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('291','1905','清德宗载湉','光绪','三十一年','公元 1905年','乙巳年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('292','1906','清德宗载湉','光绪','三十二年','公元 1906年','丙午年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('293','1907','清德宗载湉','光绪','三十三年','公元 1907年','丁未年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('294','1908','清德宗载湉','光绪','三十四年','公元 1908年','戊申年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('295','1909','清溥仪','宣统','元年','公元 1909年','己酉年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('296','1910','清溥仪','宣统','二年','公元 1910年','庚戌年');
insert into `pu_gzj`(`id`,`n`,`a`,`b`,`c`,`d`,`e`) values('297','1911','清溥仪','宣统','三年','公元 1911年','辛亥年');
CREATE TABLE `pu_puinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(1) DEFAULT '0',
  `tit` varchar(250) DEFAULT '',
  `imgs` longtext NOT NULL,
  `content` longtext NOT NULL,
  `adate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=444 DEFAULT CHARSET=utf8;
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('1','2','客路村总谱（现谱）','uploads/yuan/style/img/1.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('2','2','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/1.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('3','6','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/1.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('4','9','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/1.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('5','14','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/1.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('6','15','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/1.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('7','18','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/2.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('8','21','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/2.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('9','23','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/3.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('10','25','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/3.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('11','28','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/3.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('12','29','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/4.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('13','33','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/4.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('14','34','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/4.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('15','35','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/4.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('16','36','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/4.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('17','37','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/5.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('18','38','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/5.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('19','39','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/5.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('20','40','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/5.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('21','41','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/6.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('22','42','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/6.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('23','43','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/6.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('24','44','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/6.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('25','45','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/6.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('26','46','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/7.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('27','47','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/7.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('28','48','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/7.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('29','49','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/7.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('30','50','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/7.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('31','53','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/7.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('32','54','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/8.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('33','55','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/8.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('34','56','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/8.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('35','57','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/8.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('36','58','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/8.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('37','59','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/9.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('38','60','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/9.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('39','61','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/9.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('40','62','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/9.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('41','63','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/9.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('42','64','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/9.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('43','65','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/10.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('44','66','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/10.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('45','67','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/10.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('46','68','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/10.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('47','69','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/10.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('48','70','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/10.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('49','71','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/11.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('50','72','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/12.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('51','73','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/12.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('52','74','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/12.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('53','75','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/12.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('54','76','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/12.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('55','77','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/12.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('56','79','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/13.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('57','125','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/13.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('58','78','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/13.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('59','80','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/13.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('60','81','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/13.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('61','82','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/13.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('62','83','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/13.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('63','84','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/13.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('64','85','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/14.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('65','86','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/14.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('66','87','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/14.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('67','88','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/14.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('68','91','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/14.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('69','92','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/14.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('70','93','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/14.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('71','94','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/14.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('72','95','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/14.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('73','96','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('74','97','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('75','98','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('76','99','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('77','100','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('78','101','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('79','147','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('80','102','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('81','103','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('82','104','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('83','108','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('84','109','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('85','110','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/16.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('86','111','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/16.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('87','112','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/16.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('88','113','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/16.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('89','114','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/16.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('90','115','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/16.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('91','116','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/16.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('92','117','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/16.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('93','148','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/16.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('94','118','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/16.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('95','119','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/16.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('96','120','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/17.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('97','121','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/17.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('98','122','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/17.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('99','123','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/17.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('100','2','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/18.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('101','2','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/19.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('102','2','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/20.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('103','2','客路村总谱（老谱）','uploads/yuan/style/img/jiupu/21.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('104','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/1.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('105','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/2.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('106','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/3.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('107','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/4.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('108','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/5.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('109','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/6.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('110','2','客路村总谱（现谱）','uploads/yuan/style/img/xian/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('111','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/7.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('112','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/8.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('113','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/9.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('114','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/10.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('115','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/11.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('116','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/12.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('117','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/13.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('118','28','客路村总谱（现谱）','uploads/yuan/style/img/xian/14.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('119','6','客路村总谱（现谱）','uploads/yuan/style/img/xian/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('120','9','客路村总谱（现谱）','uploads/yuan/style/img/xian/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('121','14','客路村总谱（现谱）','uploads/yuan/style/img/xian/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('122','18','客路村总谱（现谱）','uploads/yuan/style/img/xian/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('123','21','客路村总谱（现谱）','uploads/yuan/style/img/xian/15.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('124','23','客路村总谱（现谱）','uploads/yuan/style/img/xian/17.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('125','25','客路村总谱（现谱）','uploads/yuan/style/img/xian/17.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('126','24','客路村总谱（现谱）','uploads/yuan/style/img/xian/17.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('127','29','客路村总谱（现谱）','uploads/yuan/style/img/xian/17.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('128','30','客路村总谱（现谱）','uploads/yuan/style/img/xian/18.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('129','31','客路村总谱（现谱）','uploads/yuan/style/img/xian/18.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('130','32','客路村总谱（现谱）','uploads/yuan/style/img/xian/18.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('131','33','客路村总谱（现谱）','uploads/yuan/style/img/xian/19.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('132','35','客路村总谱（现谱）','uploads/yuan/style/img/xian/19.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('133','36','客路村总谱（现谱）','uploads/yuan/style/img/xian/19.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('134','40','客路村总谱（现谱）','uploads/yuan/style/img/xian/19.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('135','39','客路村总谱（现谱）','uploads/yuan/style/img/xian/19.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('136','51','客路村总谱（现谱）','uploads/yuan/style/img/xian/19.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('137','52','客路村总谱（现谱）','uploads/yuan/style/img/xian/19.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('138','34','客路村总谱（现谱）','uploads/yuan/style/img/xian/20.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('139','37','客路村总谱（现谱）','uploads/yuan/style/img/xian/20.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('140','41','客路村总谱（现谱）','uploads/yuan/style/img/xian/20.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('141','53','客路村总谱（现谱）','uploads/yuan/style/img/xian/20.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('142','54','客路村总谱（现谱）','uploads/yuan/style/img/xian/21.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('143','55','客路村总谱（现谱）','uploads/yuan/style/img/xian/22.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('144','78','客路村总谱（现谱）','uploads/yuan/style/img/xian/23.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('145','125','客路村总谱（现谱）','uploads/yuan/style/img/xian/23.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('146','242','客路村总谱（现谱）','uploads/yuan/style/img/xian/23.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('147','244','客路村总谱（现谱）','uploads/yuan/style/img/xian/23.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('148','245','客路村总谱（现谱）','uploads/yuan/style/img/xian/23.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('149','243','客路村总谱（现谱）','uploads/yuan/style/img/xian/24.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('150','246','客路村总谱（现谱）','uploads/yuan/style/img/xian/24.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('151','247','客路村总谱（现谱）','uploads/yuan/style/img/xian/25.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('152','248','客路村总谱（现谱）','uploads/yuan/style/img/xian/26.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('153','249','客路村总谱（现谱）','uploads/yuan/style/img/xian/27.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('154','245','客路村总谱（现谱）','uploads/yuan/style/img/xian/28.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('155','250','客路村总谱（现谱）','uploads/yuan/style/img/xian/28.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('156','251','客路村总谱（现谱）','uploads/yuan/style/img/xian/28.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('157','252','客路村总谱（现谱）','uploads/yuan/style/img/xian/29.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('158','258','客路村总谱（现谱）','uploads/yuan/style/img/xian/29.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('159','259','客路村总谱（现谱）','uploads/yuan/style/img/xian/29.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('160','260','客路村总谱（现谱）','uploads/yuan/style/img/xian/29.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('161','253','客路村总谱（现谱）','uploads/yuan/style/img/xian/30.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('162','261','客路村总谱（现谱）','uploads/yuan/style/img/xian/30.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('163','254','客路村总谱（现谱）','uploads/yuan/style/img/xian/31.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('164','248','客路村总谱（现谱）','uploads/yuan/style/img/xian/32.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('165','255','客路村总谱（现谱）','uploads/yuan/style/img/xian/32.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('166','79','客路村总谱（现谱）','uploads/yuan/style/img/xian/33.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('167','78','客路村总谱（现谱）','uploads/yuan/style/img/xian/33.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('168','125','客路村总谱（现谱）','uploads/yuan/style/img/xian/33.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('169','126','客路村总谱（现谱）','uploads/yuan/style/img/xian/33.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('170','127','客路村总谱（现谱）','uploads/yuan/style/img/xian/34.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('171','128','客路村总谱（现谱）','uploads/yuan/style/img/xian/34.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('172','129','客路村总谱（现谱）','uploads/yuan/style/img/xian/35.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('173','262','客路村总谱（现谱）','uploads/yuan/style/img/xian/35.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('174','80','客路村总谱（现谱）','uploads/yuan/style/img/xian/35.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('175','80','客路村总谱（现谱）','uploads/yuan/style/img/xian/36.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('176','129','客路村总谱（现谱）','uploads/yuan/style/img/xian/36.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('177','56','客路村总谱（现谱）','uploads/yuan/style/img/xian/38.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('178','81','客路村总谱（现谱）','uploads/yuan/style/img/xian/39.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('179','130','客路村总谱（现谱）','uploads/yuan/style/img/xian/39.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('180','263','客路村总谱（现谱）','uploads/yuan/style/img/xian/39.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('181','264','客路村总谱（现谱）','uploads/yuan/style/img/xian/39.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('182','265','客路村总谱（现谱）','uploads/yuan/style/img/xian/40.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('183','267','客路村总谱（现谱）','uploads/yuan/style/img/xian/40.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('184','266','客路村总谱（现谱）','uploads/yuan/style/img/xian/41.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('185','270','客路村总谱（现谱）','uploads/yuan/style/img/xian/41.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('186','269','客路村总谱（现谱）','uploads/yuan/style/img/xian/42.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('187','268','客路村总谱（现谱）','uploads/yuan/style/img/xian/43.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('188','271','客路村总谱（现谱）','uploads/yuan/style/img/xian/44.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('189','274','客路村总谱（现谱）','uploads/yuan/style/img/xian/44.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('190','272','客路村总谱（现谱）','uploads/yuan/style/img/xian/45.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('191','273','客路村总谱（现谱）','uploads/yuan/style/img/xian/45.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('192','82','客路村总谱（现谱）','uploads/yuan/style/img/xian/47.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('193','130','客路村总谱（现谱）','uploads/yuan/style/img/xian/47.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('194','131','客路村总谱（现谱）','uploads/yuan/style/img/xian/47.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('195','275','客路村总谱（现谱）','uploads/yuan/style/img/xian/47.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('196','277','客路村总谱（现谱）','uploads/yuan/style/img/xian/47.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('197','278','客路村总谱（现谱）','uploads/yuan/style/img/xian/47.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('198','276','客路村总谱（现谱）','uploads/yuan/style/img/xian/47.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('199','279','客路村总谱（现谱）','uploads/yuan/style/img/xian/47.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('200','281','客路村总谱（现谱）','uploads/yuan/style/img/xian/49.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('201','282','客路村总谱（现谱）','uploads/yuan/style/img/xian/49.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('202','280','客路村总谱（现谱）','uploads/yuan/style/img/xian/49.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('203','132','客路村总谱（现谱）','uploads/yuan/style/img/xian/50.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('204','133','客路村总谱（现谱）','uploads/yuan/style/img/xian/51.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('205','277','客路村总谱（现谱）','uploads/yuan/style/img/xian/52.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('206','292','客路村总谱（现谱）','uploads/yuan/style/img/xian/52.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('207','293','客路村总谱（现谱）','uploads/yuan/style/img/xian/52.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('208','283','客路村总谱（现谱）','uploads/yuan/style/img/xian/53.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('209','284','客路村总谱（现谱）','uploads/yuan/style/img/xian/53.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('210','285','客路村总谱（现谱）','uploads/yuan/style/img/xian/54.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('211','286','客路村总谱（现谱）','uploads/yuan/style/img/xian/54.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('212','297','客路村总谱（现谱）','uploads/yuan/style/img/xian/54.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('213','298','客路村总谱（现谱）','uploads/yuan/style/img/xian/54.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('214','294','客路村总谱（现谱）','uploads/yuan/style/img/xian/54.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('215','295','客路村总谱（现谱）','uploads/yuan/style/img/xian/54.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('216','296','客路村总谱（现谱）','uploads/yuan/style/img/xian/54.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('217','287','客路村总谱（现谱）','uploads/yuan/style/img/xian/55.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('218','288','客路村总谱（现谱）','uploads/yuan/style/img/xian/56.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('219','289','客路村总谱（现谱）','uploads/yuan/style/img/xian/57.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('220','290','客路村总谱（现谱）','uploads/yuan/style/img/xian/57.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('221','291','客路村总谱（现谱）','uploads/yuan/style/img/xian/57.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('222','299','客路村总谱（现谱）','uploads/yuan/style/img/xian/59.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('223','300','客路村总谱（现谱）','uploads/yuan/style/img/xian/59.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('224','83','客路村总谱（现谱）','uploads/yuan/style/img/xian/60.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('225','133','客路村总谱（现谱）','uploads/yuan/style/img/xian/60.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('226','301','客路村总谱（现谱）','uploads/yuan/style/img/xian/60.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('227','302','客路村总谱（现谱）','uploads/yuan/style/img/xian/60.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('228','303','客路村总谱（现谱）','uploads/yuan/style/img/xian/60.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('229','304','客路村总谱（现谱）','uploads/yuan/style/img/xian/60.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('230','306','客路村总谱（现谱）','uploads/yuan/style/img/xian/62.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('231','307','客路村总谱（现谱）','uploads/yuan/style/img/xian/62.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('232','305','客路村总谱（现谱）','uploads/yuan/style/img/xian/62.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('233','57','客路村总谱（现谱）','uploads/yuan/style/img/xian/62.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('234','43','客路村总谱（现谱）','uploads/yuan/style/img/xian/62.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('235','58','客路村总谱（现谱）','uploads/yuan/style/img/xian/63.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('236','59','客路村总谱（现谱）','uploads/yuan/style/img/xian/63.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('237','60','客路村总谱（现谱）','uploads/yuan/style/img/xian/64.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('238','84','客路村总谱（现谱）','uploads/yuan/style/img/xian/65.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('239','142','客路村总谱（现谱）','uploads/yuan/style/img/xian/65.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('240','143','客路村总谱（现谱）','uploads/yuan/style/img/xian/65.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('241','85','客路村总谱（现谱）','uploads/yuan/style/img/xian/66.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('242','144','客路村总谱（现谱）','uploads/yuan/style/img/xian/66.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('243','145','客路村总谱（现谱）','uploads/yuan/style/img/xian/67.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('244','309','客路村总谱（现谱）','uploads/yuan/style/img/xian/67.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('245','312','客路村总谱（现谱）','uploads/yuan/style/img/xian/67.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('246','314','客路村总谱（现谱）','uploads/yuan/style/img/xian/68.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('247','315','客路村总谱（现谱）','uploads/yuan/style/img/xian/68.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('248','317','客路村总谱（现谱）','uploads/yuan/style/img/xian/68.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('249','316','客路村总谱（现谱）','uploads/yuan/style/img/xian/68.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('250','318','客路村总谱（现谱）','uploads/yuan/style/img/xian/69.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('251','319','客路村总谱（现谱）','uploads/yuan/style/img/xian/69.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('252','320','客路村总谱（现谱）','uploads/yuan/style/img/xian/69.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('253','311','客路村总谱（现谱）','uploads/yuan/style/img/xian/70.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('254','323','客路村总谱（现谱）','uploads/yuan/style/img/xian/70.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('255','324','客路村总谱（现谱）','uploads/yuan/style/img/xian/70.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('256','325','客路村总谱（现谱）','uploads/yuan/style/img/xian/70.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('257','322','客路村总谱（现谱）','uploads/yuan/style/img/xian/71.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('258','321','客路村总谱（现谱）','uploads/yuan/style/img/xian/71.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('259','86','客路村总谱（现谱）','uploads/yuan/style/img/xian/72.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('260','87','客路村总谱（现谱）','uploads/yuan/style/img/xian/73.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('261','88','客路村总谱（现谱）','uploads/yuan/style/img/xian/74.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('262','89','客路村总谱（现谱）','uploads/yuan/style/img/xian/75.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('263','90','客路村总谱（现谱）','uploads/yuan/style/img/xian/75.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('264','44','客路村总谱（现谱）','uploads/yuan/style/img/xian/76.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('265','61','客路村总谱（现谱）','uploads/yuan/style/img/xian/76.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('266','62','客路村总谱（现谱）','uploads/yuan/style/img/xian/77.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('267','91','客路村总谱（现谱）','uploads/yuan/style/img/xian/78.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('268','326','客路村总谱（现谱）','uploads/yuan/style/img/xian/78.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('269','327','客路村总谱（现谱）','uploads/yuan/style/img/xian/78.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('270','328','客路村总谱（现谱）','uploads/yuan/style/img/xian/78.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('271','327','客路村总谱（现谱）','uploads/yuan/style/img/xian/79.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('272','329','客路村总谱（现谱）','uploads/yuan/style/img/xian/79.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('273','330','客路村总谱（现谱）','uploads/yuan/style/img/xian/79.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('274','331','客路村总谱（现谱）','uploads/yuan/style/img/xian/79.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('275','332','客路村总谱（现谱）','uploads/yuan/style/img/xian/80.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('276','334','客路村总谱（现谱）','uploads/yuan/style/img/xian/79.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('277','336','客路村总谱（现谱）','uploads/yuan/style/img/xian/81.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('278','92','客路村总谱（现谱）','uploads/yuan/style/img/xian/82.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('279','93','客路村总谱（现谱）','uploads/yuan/style/img/xian/82.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('280','94','客路村总谱（现谱）','uploads/yuan/style/img/xian/83.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('281','95','客路村总谱（现谱）','uploads/yuan/style/img/xian/83.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('282','337','客路村总谱（现谱）','uploads/yuan/style/img/xian/84.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('283','338','客路村总谱（现谱）','uploads/yuan/style/img/xian/84.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('284','38','客路村总谱（现谱）','uploads/yuan/style/img/xian/85.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('285','45','客路村总谱（现谱）','uploads/yuan/style/img/xian/85.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('286','63','客路村总谱（现谱）','uploads/yuan/style/img/xian/85.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('287','64','客路村总谱（现谱）','uploads/yuan/style/img/xian/86.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('288','65','客路村总谱（现谱）','uploads/yuan/style/img/xian/86.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('289','66','客路村总谱（现谱）','uploads/yuan/style/img/xian/87.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('290','96','客路村总谱（现谱）','uploads/yuan/style/img/xian/89.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('291','135','客路村总谱（现谱）','uploads/yuan/style/img/xian/89.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('292','149','客路村总谱（现谱）','uploads/yuan/style/img/xian/89.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('293','161','客路村总谱（现谱）','uploads/yuan/style/img/xian/89.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('294','150','客路村总谱（现谱）','uploads/yuan/style/img/xian/90.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('295','152','客路村总谱（现谱）','uploads/yuan/style/img/xian/91.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('296','151','客路村总谱（现谱）','uploads/yuan/style/img/xian/90.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('297','162','客路村总谱（现谱）','uploads/yuan/style/img/xian/90.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('298','176','客路村总谱（现谱）','uploads/yuan/style/img/xian/92.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('299','339','客路村总谱（现谱）','uploads/yuan/style/img/xian/92.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('300','177','客路村总谱（现谱）','uploads/yuan/style/img/xian/93.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('301','137','客路村总谱（现谱）','uploads/yuan/style/img/xian/94.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('302','136','客路村总谱（现谱）','uploads/yuan/style/img/xian/94.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('303','138','客路村总谱（现谱）','uploads/yuan/style/img/xian/95.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('304','97','客路村总谱（现谱）','uploads/yuan/style/img/xian/96.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('305','139','客路村总谱（现谱）','uploads/yuan/style/img/xian/96.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('306','153','客路村总谱（现谱）','uploads/yuan/style/img/xian/96.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('307','163','客路村总谱（现谱）','uploads/yuan/style/img/xian/96.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('308','164','客路村总谱（现谱）','uploads/yuan/style/img/xian/96.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('309','165','客路村总谱（现谱）','uploads/yuan/style/img/xian/97.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('310','154','客路村总谱（现谱）','uploads/yuan/style/img/xian/97.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('311','155','客路村总谱（现谱）','uploads/yuan/style/img/xian/97.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('312','166','客路村总谱（现谱）','uploads/yuan/style/img/xian/97.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('313','167','客路村总谱（现谱）','uploads/yuan/style/img/xian/98.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('314','168','客路村总谱（现谱）','uploads/yuan/style/img/xian/99.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('315','169','客路村总谱（现谱）','uploads/yuan/style/img/xian/99.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('316','165','客路村总谱（现谱）','uploads/yuan/style/img/xian/100.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('317','178','客路村总谱（现谱）','uploads/yuan/style/img/xian/100.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('318','179','客路村总谱（现谱）','uploads/yuan/style/img/xian/100.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('319','340','客路村总谱（现谱）','uploads/yuan/style/img/xian/100.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('320','180','客路村总谱（现谱）','uploads/yuan/style/img/xian/101.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('321','182','客路村总谱（现谱）','uploads/yuan/style/img/xian/101.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('322','186','客路村总谱（现谱）','uploads/yuan/style/img/xian/101.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('323','187','客路村总谱（现谱）','uploads/yuan/style/img/xian/101.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('324','183','客路村总谱（现谱）','uploads/yuan/style/img/xian/102.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('325','184','客路村总谱（现谱）','uploads/yuan/style/img/xian/103.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('326','185','客路村总谱（现谱）','uploads/yuan/style/img/xian/103.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('327','343','客路村总谱（现谱）','uploads/yuan/style/img/xian/103.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('328','188','客路村总谱（现谱）','uploads/yuan/style/img/xian/104.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('329','189','客路村总谱（现谱）','uploads/yuan/style/img/xian/104.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('330','190','客路村总谱（现谱）','uploads/yuan/style/img/xian/104.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('331','191','客路村总谱（现谱）','uploads/yuan/style/img/xian/105.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('332','192','客路村总谱（现谱）','uploads/yuan/style/img/xian/105.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('333','140','客路村总谱（现谱）','uploads/yuan/style/img/xian/106.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('334','156','客路村总谱（现谱）','uploads/yuan/style/img/xian/106.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('335','157','客路村总谱（现谱）','uploads/yuan/style/img/xian/106.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('336','170','客路村总谱（现谱）','uploads/yuan/style/img/xian/106.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('337','193','客路村总谱（现谱）','uploads/yuan/style/img/xian/107.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('338','194','客路村总谱（现谱）','uploads/yuan/style/img/xian/107.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('339','98','客路村总谱（现谱）','uploads/yuan/style/img/xian/108.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('340','141','客路村总谱（现谱）','uploads/yuan/style/img/xian/108.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('341','158','客路村总谱（现谱）','uploads/yuan/style/img/xian/108.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('342','171','客路村总谱（现谱）','uploads/yuan/style/img/xian/108.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('343','172','客路村总谱（现谱）','uploads/yuan/style/img/xian/108.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('344','159','客路村总谱（现谱）','uploads/yuan/style/img/xian/109.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('345','160','客路村总谱（现谱）','uploads/yuan/style/img/xian/109.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('346','173','客路村总谱（现谱）','uploads/yuan/style/img/xian/109.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('347','174','客路村总谱（现谱）','uploads/yuan/style/img/xian/109.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('348','160','客路村总谱（现谱）','uploads/yuan/style/img/xian/110.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('349','175','客路村总谱（现谱）','uploads/yuan/style/img/xian/110.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('350','202','客路村总谱（现谱）','uploads/yuan/style/img/xian/111.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('351','203','客路村总谱（现谱）','uploads/yuan/style/img/xian/111.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('352','195','客路村总谱（现谱）','uploads/yuan/style/img/xian/112.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('353','196','客路村总谱（现谱）','uploads/yuan/style/img/xian/112.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('354','197','客路村总谱（现谱）','uploads/yuan/style/img/xian/113.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('355','198','客路村总谱（现谱）','uploads/yuan/style/img/xian/113.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('356','199','客路村总谱（现谱）','uploads/yuan/style/img/xian/113.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('357','200','客路村总谱（现谱）','uploads/yuan/style/img/xian/113.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('358','99','客路村总谱（现谱）','uploads/yuan/style/img/xian/114.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('359','146','客路村总谱（现谱）','uploads/yuan/style/img/xian/114.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('360','100','客路村总谱（现谱）','uploads/yuan/style/img/xian/115.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('361','100','客路村总谱（现谱）','uploads/yuan/style/img/xian/116.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('362','101','客路村总谱（现谱）','uploads/yuan/style/img/xian/117.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('363','147','客路村总谱（现谱）','uploads/yuan/style/img/xian/118.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('364','102','客路村总谱（现谱）','uploads/yuan/style/img/xian/119.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('365','103','客路村总谱（现谱）','uploads/yuan/style/img/xian/120.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('366','104','客路村总谱（现谱）','uploads/yuan/style/img/xian/121.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('367','46','客路村总谱（现谱）','uploads/yuan/style/img/xian/122.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('368','122','客路村总谱（现谱）','uploads/yuan/style/img/xian/123.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('369','123','客路村总谱（现谱）','uploads/yuan/style/img/xian/123.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('370','47','客路村总谱（现谱）','uploads/yuan/style/img/xian/124.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('371','67','客路村总谱（现谱）','uploads/yuan/style/img/xian/124.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('372','68','客路村总谱（现谱）','uploads/yuan/style/img/xian/125.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('373','69','客路村总谱（现谱）','uploads/yuan/style/img/xian/125.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('374','105','客路村总谱（现谱）','uploads/yuan/style/img/xian/126.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('375','106','客路村总谱（现谱）','uploads/yuan/style/img/xian/127.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('376','107','客路村总谱（现谱）','uploads/yuan/style/img/xian/127.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('377','106','客路村总谱（现谱）','uploads/yuan/style/img/xian/128.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('378','107','客路村总谱（现谱）','uploads/yuan/style/img/xian/129.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('379','208','客路村总谱（现谱）','uploads/yuan/style/img/xian/129.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('380','209','客路村总谱（现谱）','uploads/yuan/style/img/xian/129.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('381','210','客路村总谱（现谱）','uploads/yuan/style/img/xian/129.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('382','211','客路村总谱（现谱）','uploads/yuan/style/img/xian/130.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('383','48','客路村总谱（现谱）','uploads/yuan/style/img/xian/131.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('384','70','客路村总谱（现谱）','uploads/yuan/style/img/xian/131.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('385','71','客路村总谱（现谱）','uploads/yuan/style/img/xian/132.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('386','72','客路村总谱（现谱）','uploads/yuan/style/img/xian/133.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('387','108','客路村总谱（现谱）','uploads/yuan/style/img/xian/134.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('388','109','客路村总谱（现谱）','uploads/yuan/style/img/xian/135.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('389','110','客路村总谱（现谱）','uploads/yuan/style/img/xian/136.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('390','111','客路村总谱（现谱）','uploads/yuan/style/img/xian/137.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('391','112','客路村总谱（现谱）','uploads/yuan/style/img/xian/138.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('392','113','客路村总谱（现谱）','uploads/yuan/style/img/xian/138.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('393','114','客路村总谱（现谱）','uploads/yuan/style/img/xian/139.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('394','115','客路村总谱（现谱）','uploads/yuan/style/img/xian/140.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('395','116','客路村总谱（现谱）','uploads/yuan/style/img/xian/140.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('396','49','客路村总谱（现谱）','uploads/yuan/style/img/xian/141.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('397','73','客路村总谱（现谱）','uploads/yuan/style/img/xian/141.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('398','74','客路村总谱（现谱）','uploads/yuan/style/img/xian/142.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('399','75','客路村总谱（现谱）','uploads/yuan/style/img/xian/143.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('400','117','客路村总谱（现谱）','uploads/yuan/style/img/xian/144.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('401','118','客路村总谱（现谱）','uploads/yuan/style/img/xian/145.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('402','212','客路村总谱（现谱）','uploads/yuan/style/img/xian/145.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('403','213','客路村总谱（现谱）','uploads/yuan/style/img/xian/145.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('404','214','客路村总谱（现谱）','uploads/yuan/style/img/xian/147.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('405','215','客路村总谱（现谱）','uploads/yuan/style/img/xian/147.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('406','217','客路村总谱（现谱）','uploads/yuan/style/img/xian/147.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('407','216','客路村总谱（现谱）','uploads/yuan/style/img/xian/148.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('408','218','客路村总谱（现谱）','uploads/yuan/style/img/xian/149.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('409','119','客路村总谱（现谱）','uploads/yuan/style/img/xian/150.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('410','222','客路村总谱（现谱）','uploads/yuan/style/img/xian/152.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('411','120','客路村总谱（现谱）','uploads/yuan/style/img/xian/151.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('412','219','客路村总谱（现谱）','uploads/yuan/style/img/xian/151.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('413','220','客路村总谱（现谱）','uploads/yuan/style/img/xian/151.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('414','221','客路村总谱（现谱）','uploads/yuan/style/img/xian/151.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('415','121','客路村总谱（现谱）','uploads/yuan/style/img/xian/153.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('416','50','客路村总谱（现谱）','uploads/yuan/style/img/xian/154.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('417','76','客路村总谱（现谱）','uploads/yuan/style/img/xian/154.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('418','77','客路村总谱（现谱）','uploads/yuan/style/img/xian/155.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('419','122','客路村总谱（现谱）','uploads/yuan/style/img/xian/156.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('420','204','客路村总谱（现谱）','uploads/yuan/style/img/xian/156.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('421','223','客路村总谱（现谱）','uploads/yuan/style/img/xian/156.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('422','224','客路村总谱（现谱）','uploads/yuan/style/img/xian/157.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('423','123','客路村总谱（现谱）','uploads/yuan/style/img/xian/158.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('424','204','客路村总谱（现谱）','uploads/yuan/style/img/xian/158.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('425','205','客路村总谱（现谱）','uploads/yuan/style/img/xian/158.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('426','206','客路村总谱（现谱）','uploads/yuan/style/img/xian/159.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('427','225','客路村总谱（现谱）','uploads/yuan/style/img/xian/159.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('428','228','客路村总谱（现谱）','uploads/yuan/style/img/xian/159.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('429','229','客路村总谱（现谱）','uploads/yuan/style/img/xian/160.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('430','226','客路村总谱（现谱）','uploads/yuan/style/img/xian/160.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('431','227','客路村总谱（现谱）','uploads/yuan/style/img/xian/161.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('432','233','客路村总谱（现谱）','uploads/yuan/style/img/xian/161.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('433','234','客路村总谱（现谱）','uploads/yuan/style/img/xian/162.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('434','230','客路村总谱（现谱）','uploads/yuan/style/img/xian/162.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('435','231','客路村总谱（现谱）','uploads/yuan/style/img/xian/163.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('436','232','客路村总谱（现谱）','uploads/yuan/style/img/xian/163.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('437','207','客路村总谱（现谱）','uploads/yuan/style/img/xian/164.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('438','235','客路村总谱（现谱）','uploads/yuan/style/img/xian/164.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('439','238','客路村总谱（现谱）','uploads/yuan/style/img/xian/164.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('440','236','客路村总谱（现谱）','uploads/yuan/style/img/xian/164.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('441','237','客路村总谱（现谱）','uploads/yuan/style/img/xian/165.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('442','124','客路村总谱（现谱）','uploads/yuan/style/img/xian/166.jpg','','0000-00-00 00:00:00');
insert into `pu_puinfo`(`id`,`pid`,`tit`,`imgs`,`content`,`adate`) values('443','207','客路村总谱（现谱）','uploads/yuan/style/img/xian/167.jpg','','0000-00-00 00:00:00');
CREATE TABLE `pu_puus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xing` varchar(10) NOT NULL,
  `zb` varchar(20) NOT NULL,
  `sid` int(11) DEFAULT '0',
  `paixu` int(11) NOT NULL,
  `name` varchar(200) DEFAULT '',
  `fname` varchar(200) NOT NULL,
  `names` varchar(200) DEFAULT '',
  `qizi` varchar(200) DEFAULT '',
  `qidata` text NOT NULL,
  `fqizi` varchar(200) NOT NULL,
  `cunzhuan` varchar(200) DEFAULT '',
  `zids` varchar(200) DEFAULT '',
  `xf` varchar(10) NOT NULL,
  `xz` varchar(10) NOT NULL,
  `info` text NOT NULL,
  `info2` text NOT NULL,
  `info3` varchar(50) NOT NULL,
  `txt` text NOT NULL,
  `sids` text NOT NULL,
  `utime` int(11) NOT NULL,
  `atime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=344 DEFAULT CHARSET=utf8;
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('1','袁','','0','0','温塘袁氏','溫塘袁氏','','','','','','3,2','','','','','','','','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('2','袁','','1','2','观清','觀清','','殷氏','','殷氏','温塘村','4,5,6,7,8','','','','殷氏:,
葬在官渡镇','','','1','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('3','袁','','1','1','观贵','','','','','','','','','','','','','','1','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('4','袁','','2','1','云尕','雲尕','','','','','在温塘','','','','','','','','1,2','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('5','袁','','2','2','云汉','雲漢','','','','','','','','','','','','','1,2','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('6','袁','','2','3','云淇','雲淇','宣','曾氏蔡氏','','曾氏蔡氏','','9,10,11,12,13','','','名豪,
葬在现庄垌村福山坐乙向辛兼辰戌分金','曾氏:,
生三子德堂德富德远,
蔡氏:,
生二子荣卿荣彩','客路谱记载：袁豪娶胡氏生二子云谭, 怀谭','待','1,2','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('7','袁','','2','4','云超','雲超','','','','','在温塘','','','','','','','','1,2','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('8','袁','','2','5','云墅','雲墅','','','','','在石城','','','','','','','','1,2','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('9','袁','','6','1','德堂','德堂','','刘氏','','劉氏','','14,15','','','','','客路谱记载：袁豪娶胡氏生二子云谭, 怀谭','待','1,2,6','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('10','袁','','6','2','德富','德富','','','','','','','','','','','','','1,2,6','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('11','袁','','6','3','德远','德遠','','','','','','','','','','','','','1,2,6','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('12','袁','','6','4','荣卿','榮卿','','','','','','','','','','','','','1,2,6','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('13','袁','','6','5','荣彩','榮彩','','','','','','','','','','','','','1,2,6','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('14','袁','','9','1','云谭','雲譚','','龙氏','','龍氏','','16,17,18,19,20','','','','','客路谱记载：袁豪娶胡氏生二子云谭, 怀谭','待','1,2,6,9','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('15','袁','','9','2','怀谭','懷譚','','叶氏','','葉氏','','','','','','','','','1,2,6,9','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('16','袁','','14','1','清堂','清堂','','招氏李氏','','招氏李氏','','','','','','','','','1,2,6,9,14','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('17','袁','','14','2','振堂','振堂','','龙氏','','龍氏','','','','','','','','','1,2,6,9,14','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('18','袁','','14','3','悦堂','悅堂','','黄氏','','黃氏','','21,22','','','','','','','1,2,6,9,14','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('19','袁','','14','4','隐堂','隱堂','','郑氏','','鄭氏','','','','','','','','','1,2,6,9,14','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('20','袁','','14','5','敬堂','敬堂','','龙氏','','龍氏','','','','','','','','','1,2,6,9,14','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('21','袁','','18','1','仲仁','仲仁','','李氏','','李氏','','23','','','','','','','1,2,6,9,14,18','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('22','袁','','18','2','仲壁','仲壁','','谢氏','','謝氏','','','','','','','','','1,2,6,9,14,18','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('23','袁','','21','1','毓珍','毓珍','','温氏','娶温氏生二子长子参胜次子参荣','溫氏','','24,25,26','','','','','','总谱:娶温氏生三子长子参国（应举 应进 应通）次子参圣三子参贤,
参胜（北坡三合村）,
参荣（湖光客路村）,
参贤（龙头庄垌村）,
应通（失记）','1,2,6,9,14,18,21','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('24','袁','','23','1','参胜','參勝','','温氏','','溫氏','','27','','','葬在赤坎坐南向北','','','','1,2,6,9,14,18,21,23','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('25','袁','','23','2','参荣','參榮','','龙氏','','龍氏','','28','','','葬在赤坎坐南向北','','','','1,2,6,9,14,18,21,23','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('26','袁','','23','3','参贤','參賢','','','','','','','','','后裔龙头庄垌村等','','','','1,2,6,9,14,18,21,23','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('27','袁','','24','1','应举','應舉','','叶氏','','葉氏','','','','','','','应举公移居北坡三合村（三合仔村，寮联村）','','1,2,6,9,14,18,21,23,24','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('28','袁','','25','1','应进','應進','','李氏','','李氏','泰安村（现客路村）','29,30,31,32','','','葬在木兰西谭土岭坐北向南','李氏:,
移居,
生辰失记,
葬在木兰西谭土岭坐北向南','','客路村共记载四谱,
竹子谱已丢失,
记载到学字辈为旧谱,
旧二谱,
2012年谱','1,2,6,9,14,18,21,23,25','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('29','袁','','28','1','仕爵','仕爵','','林氏','娶林氏生二子','林氏','客路村','33,34','','','葬在谭土岭坐北向南','林氏:,
葬在谭土岭坐北向南','','','1,2,6,9,14,18,21,23,25,28','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('30','袁','','28','2','仕贵','仕貴','','杨氏','','楊氏','泰安村（现客路村）','','','','','','移居徐闻县盐灶村松树园','','1,2,6,9,14,18,21,23,25,28','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('31','袁','','28','3','仕武','仕武','','','','','泰安村（现客路村）','','','','','','移居琼州（现海南省）','','1,2,6,9,14,18,21,23,25,28','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('32','袁','','28','4','仕志','仕誌','','','','','泰安村（现客路村）','','','','','','','','1,2,6,9,14,18,21,23,25,28','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('33','袁','','29','1','秀兴','秀興','','陈陈二氏','娶陈陈二氏生二子','陳陳二氏','客路村','35,36','','','','秀兴公:,
葬在谭土岭坐北向南','','','1,2,6,9,14,18,21,23,25,28,29','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('34','袁','','29','2','秀义','秀義','','郑氏吴氏','郑氏,吴氏','鄭氏吳氏','客路村','37,38','','','葬在谭土岭坐北向南','','','','1,2,6,9,14,18,21,23,25,28,29','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('35','袁','','33','1','起候','起候','','刘氏','','劉氏','客路村','','','40','葬在谭土岭坐北向南','','','景春入继','1,2,6,9,14,18,21,23,25,28,29,33','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('36','袁','','33','2','起端','起端','','王氏','','王氏','客路村','39,40','','','葬在谭土岭坐北向南','','','','1,2,6,9,14,18,21,23,25,28,29,33','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('37','袁','','34','1','起诚','起誠','','孙氏','','孫氏','客路村','41,42,43,44','','','生辰失记,
卒二月十七日忌辰,
葬在谭土岭','孙氏:,
生辰失记,
卒二月十七日忌辰,
葬在谭肚岭','','','1,2,6,9,14,18,21,23,25,28,29,34','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('38','袁','','34','2','起政','起政','','蔡氏','','蔡氏','客路村','45,46,47,48,49,50','','','生于乾隆丁酉年(1777年)六月二十一日辰时,
享阳六十九年,
卒道光乙巳年(1845年)正月二十日,
葬在土地公后坐艮向坤','蔡氏:,
生辰失记,
卒正月二十五忌辰,
沙溝(沟)园坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('39','袁','','36','1','景昌','景昌','','彭氏','','彭氏','客路村','51','','','葬在谭土岭坐北向南','','','','1,2,6,9,14,18,21,23,25,28,29,33,36','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('40','袁','','36','2','景春','景春','','何氏','','何氏','客路村','52','35','','葬在谭土岭坐北向南','','','出继起候','1,2,6,9,14,18,21,23,25,28,29,33,36','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('41','袁','','37','1','景佳','景佳','','谢氏彭氏','娶谢氏无子次娶彭氏生三子','謝氏彭氏','客路村','53,54,55','','','生于乾隆甲寅年(1794年)九月初二日辰时,
享阳七十八岁,
卒同治庚午年(1870年)七月初八日午时,
客路村后园坐乾向巽','谢氏:,
生辰失记,
卒十二月初六日忌时,
葬在谭肚岭坐北向南,
彭氏:,
生辰失记,
卒十一月廿八日忌时,
葬在谭肚岭坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,37','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('42','袁','','37','2','景端','景端','','彭氏','','彭氏','客路村','56','','','神主焚化内函,
生辰忌日失记,
葬在谭土岭坐北向南','彭氏:,
生辰失记,
卒十一月初八日忌时,
葬在谭肚岭坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,37','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('43','袁','','37','3','景美','景美','','叶氏','','葉氏','客路村','57,58,59,60','','','生于嘉庆丙寅年(1806年)正月十三日辰时,
享阳七十五岁,
卒光绪庚辰年(1880年)二月十一日寅时,
葬在沙溝(沟)坡坐北向南','叶氏:,
生于嘉庆丙寅年(1806年)十一月初十日戌时,
享阳六十岁,
卒同治乙丑年(1865年)十月初四日卯时,
葬在沙溝(沟)坡坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,37','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('44','袁','','37','4','景泰','景泰','','王氏李氏','','王氏李氏','客路村','61,62','','','生辰失记,
卒閏十月廿三日忌时,
葬在谭土岭坐北向南','李氏:,
生辰焚化内函不记,
卒正月廿九日忌时,
葬在谭肚岭坐北向南,
王氏:,
生辰焚化内函不记,
卒九月十八日忌时,
葬在谭肚岭坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,37','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('45','袁','','38','1','景鸾','景鸞','','黄氏','','黃氏','客路村','63,64,65,66','','','生于嘉庆己未年(1799年)七月二十日丑时,
享阳六十五岁,
卒同治癸亥年(1863年)七月初九日申时,
葬在土地公东杆葬在谭土岭坐北向南','黄氏:,
生于嘉庆戊午年(1798年)十二月初四日巳时,
享阳八十六岁,
卒光绪甲申年(1884年)十二月十六日寅时,
葬在沙溝(沟)坡园坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,38','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('46','袁','','38','2','景后','景後','','李氏','','李氏','客路村','','','76','生辰失记,
卒十一月十一日忌时,
葬在谭土岭坐北向南','李氏:,
生辰忌日失记,
葬在谭肚岭坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,38','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('47','袁','','38','3','景兰','景蘭','','梁氏','','梁氏','客路村','67,68,69','','','生于嘉庆戊辰年(1808年)八月初六日子时,
享阳五十四岁,
卒咸丰辛酉年(1861年)十一月初六日辰时,
葬在土地宫后园坐艮向坤','梁氏:,
生于嘉庆甲戌年(1814年)三月廿二日未时,
享阳五十一岁,
卒同治甲子年(1864年)十月十九日申时,
葬在谭肚岭坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,38','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('48','袁','','38','4','景福','景福','','陈氏','','陳氏','客路村','70,71,72','','','生于嘉庆癸酉年(1813年)五月二十日卯时,
享阳七十二岁,
卒光绪乙酉年(1885年)十月廿二日辰时,
葬在土地宫东园坐乾向巽','陈氏:,
生于嘉庆丙子年(1816年)二月三十日卯时,
享阳七十九岁,
卒光绪甲午年(1894年)二月十一日辰时,
葬在土地宫东园坐乾向巽','','','1,2,6,9,14,18,21,23,25,28,29,34,38','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('49','袁','','38','5','景礼','景禮','','陈氏','','陳氏','客路村','73,74,75','','','生于嘉庆丙子年(1816年)二月初八日卯时,
享阳七十五岁,
卒光绪庚寅年(1890年)閏二月初一日申时,
葬在土地宫后园坐( )向坤','陈氏:,
生于嘉庆戊辰年(1808年)十一月十四日丑时,
享阳八十一岁,
卒光绪庚子年(1900年)正月二十日卯时,
葬在土地宫东园坐乾向巽','','','1,2,6,9,14,18,21,23,25,28,29,34,38','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('50','袁','','38','6','景寿','景壽','','陈氏','','陳氏','客路村','76,77','','','神主内函失迷,
生辰忌日失记,
葬在土地公后园坐艮向坤','陈氏:,
生于道光壬午年(1822年)八月十三日子时,
享阳七十二岁,
卒光绪癸巳年(1893年)二月十二日申时,
葬在土地公后园坐艮向坤','','','1,2,6,9,14,18,21,23,25,28,29,34,38','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('51','袁','','39','1','国通','國通','','','','','客路村','','','','葬在谭土岭坐北向南','','无配','','1,2,6,9,14,18,21,23,25,28,29,33,36,39','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('52','袁','','40','1','国吉','國吉','','','','','客路村','','','','不知抛往在何方','','无配','','1,2,6,9,14,18,21,23,25,28,29,33,36,40','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('53','袁','','41','1','国熈','國熈','','周氏溤氏','娶周氏无子次娶冯氏生一子','周氏溤氏','客路村','240','','78','生于嘉庆戊寅年(1818年)二月廿七日卯时,
享阳六十四岁,
卒光绪辛巳年(1881年)七月廿七日亥时,
葬在客路村后园坐壬向丙','周氏:,
生于嘉庆庚辰年(1820年)正月初八日子时,
享阳三十岁,
卒道光己酉年(1849年)闰四月廿二日酉时,
葬在客路村园坐戌向辰,
冯氏:,
生嘉庆丁丑年(1817年)七月十五日卯时,
葬在临海()坡坐北向南','那祝早亡不幸','待','1,2,6,9,14,18,21,23,25,28,29,34,37,41','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('54','袁','','41','2','国壮','國壯','','李氏','','李氏','客路村','78,79,80','','','生于道光辛巳年(1821年)三月廿四日亥时,
享阳七十五岁,
卒光绪甲午年(1894年)三月初一日辰时,
葬在客路村后园坐乾向巽','李氏:,
生于道光辛巳年(1821年)六月廿四日寅时,
享阳七十一岁,
卒光绪辛卯年(1891年)九月十一日辰时,
葬在客路村后园坐乾向巽','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('55','袁','','41','3','国胜','國勝','','王氏彭氏','娶王氏次娶彭氏生一子','王氏彭氏','客路村','241','','80','生于道光戊子年(1828年)五月廿八日酉时,
享阳三十六岁,
卒同治癸亥年(1863年)七月十二日亥时,
葬在客路村后园坐壬向丙','王氏:,
生辰失记,
卒九月初三日,
葬在客路村园坐乾向巽,
彭氏:,
彭氏出嫁','康仁早亡不幸','','1,2,6,9,14,18,21,23,25,28,29,34,37,41','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('56','袁','','42','1','国盈','國盈','','李氏方氏翟氏萧氏','娶李氏 次娶方氏生三子长学真次学道三学才 三娶翟氏 四娶萧氏','李氏方氏翟氏蕭氏','客路村','81,82,83','','','生于道光辛巳年(1821年)十月十二日午时,
享阳七十三岁,
卒光绪癸巳年(1893年)四月初六日酉时,
葬在客路村后园坐壬向丙加亥巳','李氏:,
生辰亡日失记,
葬在泉淈沟坡仔坟失,
方氏:,
生辰失记,
卒五月十二日忌辰,
葬在谭肚岭坐北向南,
翟氏:,
生辰失记,
卒七月廿九日忌辰,
葬在泉淈沟上坡仔坐北向南,
萧氏:,
生于道光丁亥年(1827年)六月十一日酉时,
享阳七十一岁,
卒光绪丁酉年(1897年)八月廿三日子时,
葬在村后路东园坐壬向丙加子午','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('57','袁','','43','1','国戴','國戴','','林氏','娶林氏生一子那综早亡','林氏','客路村','308','','84','生辰失记,
卒道光戊申年(1848年)十一月初十日卯时,
葬在谭土岭坐北向南','林氏:,
林氏出嫁','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('58','袁','','43','2','国祯','國禎','','陈氏','','陳氏','客路村','84,85','','','生于道光壬辰年(1832年)六月十二日子时,
享阳五十九岁,
卒光绪辛巳年(1881年)八月三十日午时,
葬在谭土岭坐北向南','陈氏:,
生于道光癸巳年(1833年)八月十八日酉时,
享阳六十四岁,
卒光绪丙申年(1896年)九月初七日酉时,
葬在沙溝(沟)坡坐北向南','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,43','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('59','袁','','43','3','国祥','國祥','','彭氏','','彭氏','客路村','86,87,88','','','生于道光丙申年(1836年)八月二十日戌时,
享阳四十一岁,
卒光绪丙子年(1876年)十一月廿三日戌时,
葬在谭土岭坐北向南','彭氏:,
生于道光丙申年(1836年)六月十九日未时,
享阳六十四岁,
卒光绪己亥年(1899年)六月廿八日辰时,
葬在沙溝(沟)坡坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('60','袁','','43','4','国存','國存','','陈氏','','陳氏','客路村','89,90','','','生于道光甲辰年(1844年)三月廿五日,
享阳四十一岁,
卒十月二十日辰时,
葬在谭土岭坐北向南','陈氏:,
陈氏出','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('61','袁','','44','1','国均','國均','','李氏','','李氏','客路村','91,92','','','生于道光戊戌年(1838年)五月廿七日辰时,
享阳六十三岁,
卒光绪庚子年(1900年)二月初一日,
葬在客路村后园坐乾向巽','李氏:,
生于道光戊戌年(1838年)正月十八日子时,
享阳五十九岁,
卒光绪丙申年(1896年)九月十六日申时,
葬在客路村后土地公东坐乾向巽','','','1,2,6,9,14,18,21,23,25,28,29,34,37,44','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('62','袁','','44','2','国任','國任','','陈氏','','陳氏','客路村','93,94,95','','','生于道光丁未年(1847年)十一月廿二日丑时,
享阳四十六岁,
卒光绪壬辰年(1892年)三月廿一日申时,
葬在客路村后土地公东园坐乾向巽','陈氏:,
生于咸丰壬子年(1852年)十二月二十日寅时,
享阳七十三岁,
卒民国甲子年(1924年)十二月廿一日卯时,
葬在土地公东坐亥向巳兼乾巽','','','1,2,6,9,14,18,21,23,25,28,29,34,37,44','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('63','袁','','45','1','国举','國舉','','李氏','','李氏','客路村','96,97,98,99','','','生于道光癸未年(1823年)八月二十七日亥时,
享阳五十八岁,
卒光绪辛巳年(1881年)七月廿五日巳时,
葬在土地公东园坐北向南','李氏:,
生于道光丙戌年(1826年)九月初二日辰时,
享阳七十五岁,
卒光绪庚子年(1900年)九月廿四日申时,
葬在沙溝(沟)下园坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('64','袁','','45','2','国富','國富','','','','','客路村','','','100','生于道光甲午年(1834年)六月初二日巳时,
享阳十四岁,
卒道光丁未年(1847年)十一月十三日亥时,
葬在沙溝(沟)坡下园坐北向南','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('65','袁','','45','3','国端','國端','','陈氏','','陳氏','客路村','100,101,147','','','生于道光戊戌年(1838年)正月初三日,
享阳四十二岁,
卒光绪己卯年(1879年)五月初三日寅时,
葬在沙溝(沟)坡下园坐艮向坤','陈氏:,
生于道光戊戌年(1838年)七月廿五日丑时,
享阳六十一岁,
卒光绪戊戌年(1898年)十月初一日申时,
葬在沙溝(沟)坡下园坐艮向坤','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('66','袁','','45','4','国开','國開','','吴氏','','吳氏','客路村','102,103,104','','','生于道光庚子年(1840年)正月廿八日巳时,
享阳五十七岁,
卒光绪丙申年(1896年)二月十九日丑时,
葬在土地公东园坐乾向巽','吴氏:,
生道光乙巳年(1845年)十二月二十日申时,
享阳七十五岁,
卒民国己未年(1919年)十二月初七日寅时,
葬在沙溝(沟)坡下坐癸向丁兼子午','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('67','袁','','47','1','国兴','國興','','陈氏','','陳氏','客路村','105,106,107','','','生于道光壬寅年(1842年)九月十七日卯时,
享阳五十二岁,
卒光绪癸巳年(1893年)十二月初十日卯时,
葬在谭土岭坐壬向丙加子午','陈氏:,
生于咸丰戊午年(1858年)十月十四日,
享阳四十五岁,
卒光绪壬寅年(1902年)六月三十日寅时,
葬在郡郞坡村后坐东北向西南','','老谱曾氏','1,2,6,9,14,18,21,23,25,28,29,34,38,47','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('68','袁','','47','2','国发','國發','国香','','','','客路村','','','106','生辰忌日死葬失记','','无配','','1,2,6,9,14,18,21,23,25,28,29,34,38,47','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('69','袁','','47','3','国达','國達','国臣','','','','客路村','','','107','生辰忌日死葬失记','','无配','','1,2,6,9,14,18,21,23,25,28,29,34,38,47','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('70','袁','','48','1','国纯','國純','','孙氏彭氏','娶孙氏娶彭氏生三子','孫氏彭氏','客路村','108,109,110','','','生道光癸卯年(1843年)正月廿九日戌时,
享阳五十八岁,
卒光绪庚子年(1900年)九月廿一日辰时,
葬在土地宫东园坐乾向巽','孙氏:,
生辰失记,
卒二月十六日辰时,
葬在上湾岭墓失记,
彭氏:,
生于道光癸卯年(1843年)二月初八日戌时,
享阳四十一岁,
卒光绪癸巳年(1893年)二月初二日丑时,
葬在土地宫东园坐乾向巽','','','1,2,6,9,14,18,21,23,25,28,29,34,38,48','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('71','袁','','48','2','国安','國安','','李氏','','李氏','客路村','111,112,113','','','生于道光戊申年(1848年)十二月廿五日丑时,
享阳六十九岁,
卒民国丙辰年(1916年)五月初五日戌时,
葬在书房园坐乾向巽','李氏:,
生于咸丰丙辰年(1856年)十一月廿四日辰时,
享阳四十一岁,
卒光绪丙申年(1896年)五月十一日巳时,
葬在沙时溝(沟)坡塘东园坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,38,48','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('72','袁','','48','3','国良','國良','','吴氏','','吳氏','客路村','114,115,116','','','生于咸丰丁巳年(1857年)九月初五日未时,
享阳三十二岁,
卒光绪戊子年(1888年)十月廿六日寅时,
葬在土地宫东园坐乾向巽','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,48','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('73','袁','','49','1','国善','國善','','谢氏','','謝氏','客路村','117','','','往新州生辰失记','谢氏:,
生于道光辛丑年(1841年)八月初九日丑时,
享阳五十七岁,
卒光绪丁酉年(1897年)四月廿一日辰时,
葬在客路村后土地宫东园坐乾向巽','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('74','袁','','49','2','国友','國友','','黄氏','','黃氏','客路村','148','','118','生于道光丙午年(1846年)六月十五日酉时,
享阳三十七岁,
卒光绪壬午年(1882年)十一月廿一日卯时,
葬在客路村后土地宫东园坐乾向巽','黄氏:,
出东海北山村','亚九早死不幸','','1,2,6,9,14,18,21,23,25,28,29,34,38,49','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('75','袁','','49','3','国南','國南','','李氏','','李氏','客路村','118,119,120,121','','','生于咸丰乙卯年(1855年)十月廿六日亥时,
享阳四十四岁,
卒光绪戊戌年(1898年)六月十一日辰时,
葬在土地宫后园坐艮向坤','李氏:,
生于咸丰甲寅年(1854年)五月初一日酉时,
时享阳五十九岁,
卒光绪壬寅年(1902年)二月十二日巳时,
葬在土地宫后园坐艮向坤','','待调','1,2,6,9,14,18,21,23,25,28,29,34,38,49','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('76','袁','','50','1','国亲','國親','','符氏','','符氏','客路村','122,123','46','','生于道光乙巳年(1845年)二月二十日寅时,
享阳六十四岁,
卒光绪戊申年(1908年)十二月十三日未时,
葬在土地公后园坐艮向坤','符氏:,
生于道光己酉年(1849年)二月十二日酉时,
享阳三十四岁,
卒光绪壬午年(1882年)正月初七日申时,
葬在土地公后园坐艮向坤','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('77','袁','','50','2','国仪','國儀','国宜','吴氏','','吳氏','客路村','124','','','生于道光戊申年(1848年)十二月初六日卯时,
享阳五十岁,
卒光绪丁酉年(1897年)十月十五日丑时,
葬在土地公后园坐艮向坤','吴氏:,
生于咸丰辛亥年(1851年)三月十九日寅时,
享阳三十岁,
卒光绪庚辰年(1880年)十一月十一日子时,
葬在谭肚岭坐子向午','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('78','袁','','54','1','学忠','學忠','','李氏','','李氏','客路村','','53','125','生于咸丰壬子年(1852年)八月二十日申时,
享阳三十一岁,
卒光绪壬午年(1882年)十月初二日酉时,
葬在客路村后坐亥向巳加壬丙','李氏:,
李氏出嫁石头村','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('79','袁','','54','2','学信','學信','','孙氏陈氏','娶孙氏生五子长杨名次杨登三杨龙四杨虎五杨榜次娶陈氏生一男杨声','孫氏陳氏','客路村','125,126,127,128,129,262','','','生于咸丰丙辰年(1856年)八月三十日酉时,
享阳六十七岁,
卒民国壬戌年(1922年)前五月初二日辰时,
疾终正寝,
葬在书房沟下坡坐乾向巽','孙氏:,
生于咸丰乙卯年(1855年)九月廿四日巳时,
享阳五十二岁,
卒光绪丙午年(1906年)三月十二日申时,
葬在客路村后坐乾向巽,
陈氏:,
生于同治戊辰年(1868年)八月十九日申时,
享阳八十二岁,
卒民国己丑年(1949年)十一月廿四日,
葬在坡仔东园','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('80','袁','','54','3','学谦','學謙','学廉','王氏林氏','娶王氏出次娶林氏无子','王氏林氏','客路村','','55','129','生于同治甲子年(1864年)八月廿八日酉时,
享阳三十六岁,
卒光绪己亥年(1899年)九月廿八日亥时,
葬在客路村后园坐乾向巽','王氏出,
林氏:,
生于同治戊辰年(1868年)九月二十日亥时,
享阳三十三岁,
卒光绪庚子年(1900年)正月十二日午时,
葬在客路村后园坐乾向巽','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('81','袁','','56','1','学真','學真','','陈氏','','陳氏','客路村','','','130','生辰焚化,
卒七月十九忌辰,
葬在谭土岭坐北向南','陈氏:,
生辰失记,
卒五月初四日卯时忌辰,
葬在宝满','配陈氏未娶','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('82','袁','','56','2','学道','學道','','李氏梁氏','娶李氏生三子长杨荣次杨光三杨煇次娶梁氏生一子长杨耀','李氏梁氏','客路村','130,131,132,133','','','生于咸丰戊午年(1858年)十月初五日巳时,
享阳五十三岁,
卒宣统庚戌年(1910年)九月十八日未时,
葬在客路村后园坐乾向巽','李氏:,
生于咸丰丁巳年(1857年)十月初七日巳时,
享阳四十六岁,
卒光绪辛丑年(1901年)三月十四日申时,
葬在客路村东园坐亥向巳,
梁氏:,
生于咸丰辛酉年(1861年)十月十一日申时,
享阳六十九岁,
卒民国己巳年(1929年)七月廿五日巳时,
葬在沙墩园坐子向午加壬丙','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('83','袁','','56','3','学才','學才','','陈氏','','陳氏','客路村','','','133','生于同治壬戌年(1862年)十月廿一日巳时,
享阳二十四岁,
卒光绪乙酉年(1885年)四月廿一日未时,
葬在后坡子坐北向南','陈氏:,
陈氏去嫁鹿渚','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('84','袁','','58','1','  学谦','  學謙','','陈氏','','陳氏','客路村','142,143','57','','生于同治甲子年(1864年)九月廿一日申时,
享阳三十四岁,
卒光绪戊戌年(1898年)四月十八日午时,
葬在沙溝(沟)坡坐北向南','陈氏:,
生于同治甲子年(1864年)七月廿二日酉时,
陈氏出嫁','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('85','袁','','58','2','学譲','學譲','','彭氏','','彭氏','客路村','144,145','','','生于同治丙寅年(1866年)七月廿三日申时,
享阳六十二岁,
卒民国戊辰年(1928年)正月初十日子时,
葬在沙溝(沟)坡坐子向午兼壬丙','彭氏:,
生于年月','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('86','袁','','59','1','学璸','學璸','','陈氏','娶陈氏生一子那文早死不幸','陳氏','客路村','','','134','生于咸丰丁巳年(1857年)正月廿六日戌时,
享阳三十岁,
卒光绪丁亥年(1887年)四月初一日忌辰,
葬在谭土岭坐北向南','陈氏:,
陈氏出嫁','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,59','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('87','袁','','59','2','学琼','學瓊','','梁氏陈氏','梁氏生一子杨楹陈氏无子','梁氏陳氏','客路村','134','','','生于同治丁卯年(1867年)正月廿七日酉时,
享阳四十三岁,
卒光绪戊申年(1908年)五月初八日申时,
葬在沙溝(沟)坡坐子向午加癸丁','梁氏:,
生于同治戊辰年(1868年)八月十九日卯时,
享阳三十一岁,
卒光绪戊戌年(1898年)七月初二日酉时,
葬在谭肚岭坐北向南坐艮向坤,
陈氏:,
生于同治癸酉年(1873年)十月初六日子时,
享阳三十二岁,
卒光绪甲辰年(1904年)五月初四日辰时,
葬在客路村后园沙溝(沟)坡坐乾向巽','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,59','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('88','袁','','59','3','学瑞','學瑞','','何氏','','何氏','客路村','','','134','生于同治庚午年(1870年)七月初八日丑时,
享阳二十九岁,
卒光绪戊戌年(1898年)七月初四日辰时,
葬在谭土岭坐艮向坤','何氏:,
何氏嫁去','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,59','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('89','袁','','60','1','学旋','學旋','','彭氏','','彭氏','客路村','','','','生于同治戊辰年(1868年)八月廿三日亥时,
享阳二十四岁,
卒光绪辛卯年(1891年)五月初十日午时,
葬在客路村后沙园坐乾向巽','彭氏:,
配彭氏未娶','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,60','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('90','袁','','60','2','学四','學四','学赐','','','','客路村','','','','','','投往新州','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,60','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('91','袁','','61','1','学脩','學脩','学修','吴氏冯氏','娶吴氏无子继娶岑擎冯氏生二子','吳氏馮氏','客路村','326,327','','','生于同治壬申年(1872年)十一月初九日辰时,
卒民国丙寅年(1926年)七月初六日丑时,
葬在书房仔园坐乾向巽加戌辰','吴氏:,
生于同治壬申年(1872年)十月廿四日申时,
享阳三十岁,
卒光绪辛丑年(1901年)九月十七日亥时,
葬在客路村后园坐乾向巽,
冯氏:,
生辰失记,
卒辛卯年(公元1951年)十一月三十日,
葬在沙墩西南向','','','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('92','袁','','61','2','学叶','學葉','','','','','客路村','','','','生于光绪戊寅年(1878年)三月初九日未时,
享阳二十八岁,
卒光绪乙巳年(1905年)四月初十日午时,
葬在客路村土地公东园坐乾向巽','','无配','','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('93','袁','','62','1','学轩','學軒','','','','','客路村','','','','生于光绪乙亥年(1875年)十一月十五日申时','','无配往新州','','1,2,6,9,14,18,21,23,25,28,29,34,37,44,62','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('94','袁','','62','2','学本','學本','','','','','客路村','','','','生于光绪庚辰年(1880年)正月十二日酉时,
享阳三十岁,
卒光绪己酉年(1909年)三月初一日未时,
葬在客路村后园坐乾向巽','','无配','','1,2,6,9,14,18,21,23,25,28,29,34,37,44,62','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('95','袁','','62','3','学木','學木','学睦','','','','客路村','','','','生于光绪丙戌年(1886年)七月十四日巳时,
享阳十二岁,
卒光绪丁酉年(1897年)十月十四日,
葬在客路村后园坐乾向巽','','中殇','','1,2,6,9,14,18,21,23,25,28,29,34,37,44,62','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('96','袁','','63','1','学芝','學芝','','梁氏','','梁氏','客路村','135,136,137,138','','','生于道光丙午年(1846年)十二月二十五日亥时,
享阳六十九岁,
卒民国癸丑年三月初二日丑时,
葬在沙溝(沟)坡下园坐子向午加癸丁','梁氏:,
生于咸丰丙辰年(1856年)五月廿五日午时,
享阳四十六岁,
卒光绪辛丑年(1901年)三月廿七日未时,
葬在沙溝(沟)坡下园坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('97','袁','','63','2','学璋','學璋','','陈氏','','陳氏','客路村','139,140,141','','','生于道光庚戌年(1850年)三月初十日寅时,
享阳四十八岁,
卒光绪丁酉年(1897年)六月初四日寅时,
葬在沙溝(沟)下园坐北向南','陈氏:,
生于咸丰丙辰年(1856年)十月初四日子时,
享阳四十九岁,
卒光绪甲辰年(1904年)六月廿一日卯时,
葬在沙溝(沟)园坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('98','袁','','63','3','学辅','學輔','','','','','客路村','','','141','生于咸丰戊午年(1858年)十月初五日子时,
卒光绪辛卯年(1891年)四月三十日巳时,
享阳三十四岁,
葬在客路村后土地公东园坐乾向巽','','无配','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('99','袁','','63','4','学志','學誌','','彭氏','','彭氏','客路村','146','','','生于同治甲子年(1864年)十一月十一日酉时,
享阳三十七岁,
卒光绪庚子年(1900年)七月初九日戌时,
葬在沙溝(沟)坡下园坐北向南','彭氏:,
生于同治戊辰年(1868年)七月廿五日戌时,
享阳三十四岁,
卒光绪辛丑年(1901年)四月初四日午时,
','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('100','袁','','65','1','学逢','學逢','学鸿','','','','客路村','','64','','生于同治壬戌年(1862年)十一月初四日寅时,
享阳四十四岁,
卒光绪乙巳年(1905年)三月初二日卯时,
葬在少沟坡下园坐北向南','','无配','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,65','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('101','袁','','65','2','学诚','學誠','','','','','客路村','','','','生于同治甲戌年(1874年)五月初六日酉时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,65','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('102','袁','','66','1','学保','學保','','陈氏陈氏','娶陈氏次娶陈氏','陳氏陳氏','客路村','','','','生于光绪乙亥年(1875年)十一月初三日亥时,
','陈氏:,
生于光绪戊寅年(1878年),
享阳四十五岁,
卒民国辛酉年(1921年)五月廿八日戌时,
葬在沙溝(沟)坡下园坐乾向巽,
继陈氏生于年月','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,66','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('103','袁','','66','2','学终','學終','','','','','客路村','','','','生于光绪壬午年(1882年)三月十七日巳时,
享阳二十一岁,
卒光绪壬寅年(1902年)二月十一日未时,
葬在土地宫东园坐乾向巽','','无配','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,66','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('104','袁','','66','3','学铁','學鐵','','','','','客路村','','','','生于光绪甲申年(1884年)正月初七日子时,
享阳三十二岁,
卒民国乙卯年(1915年)十一月十九日申时,
葬在客路村后土地宫东园坐乾向巽','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,66','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('105','袁','','67','1','学亦','學亦','','','','','客路村','','','','生于光绪甲申年(1884年)八月初六日子时,
享阳三十六岁,
卒民国己未年(1919年)七月午时,
葬在客路村后坡坐癸向丁','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,47,67','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('106','袁','','67','2','学孟','學孟','学善','','','','客路村','','68','','生于光绪戊子年(1888年)六月初六日丑时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,47,67','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('107','袁','','67','3','学书','學書','学诗','','','','客路村','208','69','','生于光绪壬辰年(1892年)十一月十一日寅时','','','娶氏失记','1,2,6,9,14,18,21,23,25,28,29,34,38,47,67','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('108','袁','','70','1','学生','學生','','陈氏','','陳氏','客路村','','','','生于同治丙寅年(1866年)九月十四日丑时,
享阳三十五岁,
卒光绪庚子年(1900年)六月廿二日午时,
葬在土地宫东园坐乾向巽','陈氏出','','','1,2,6,9,14,18,21,23,25,28,29,34,38,48,70','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('109','袁','','70','2','学同','學同','学潼','','','','客路村','','','','生于同治甲戌年(1874年)四月初二日申时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,48,70','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('110','袁','','70','3','学尊','學尊','学暂','','','','客路村','','','','生于光绪丙子年(1876年)生日失记,
享阳三十三岁,
卒光绪戊申年(1908年)十一月廿一日,
往海南时营谋而亡,
葬在红坎坡坐南向北','','无配','','1,2,6,9,14,18,21,23,25,28,29,34,38,48,70','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('111','袁','','71','1','学黎','學黎','','','','','客路村','','','','生于光绪丙子年(1876年)五月十五日戌时,
享阳三十五岁,
卒宣统庚戌年(1910年)正月廿五日辰时,
葬在沙溝(沟)坡坐北向南','','未娶','','1,2,6,9,14,18,21,23,25,28,29,34,38,48,71','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('112','袁','','71','2','学宝','學寶','学民','','','','客路村','','','','生辰失记','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,48,71','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('113','袁','','71','3','学坤','學坤','学暴','','','','客路村','','','','在赤坎人养育','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,48,71','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('114','袁','','72','1','学本','學本','学炳','','','','客路村','','','','生于光绪丁丑年(1877年)七月十八日辰时','','往新州','','1,2,6,9,14,18,21,23,25,28,29,34,38,48,72','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('115','袁','','72','2','学宜','學宜','学彩','','','','客路村','','','','生于光绪己卯年(1879年)八月初五日未时,
惨在疫命亡日失记,
葬在沙溝(沟)坡','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,48,72','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('116','袁','','72','3','学来','學來','学勤','','','','客路村','','','','生于光绪辛巳年(1881年)六月初四日戌时,
惨在疫命亡日失记,
葬在沙溝(沟)坡','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,48,72','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('117','袁','','73','1','学德','學德','','吕氏','','呂氏','客路村','','','','往新州,
生辰失记','吕氏:,
出嫁鹿渚村','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,73','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('118','袁','','75','1','学清','學清','','陈氏陈氏','娶陈氏生一子那科次娶陈氏生三子','陳氏陳氏','客路村','212,213,214','74','','生于光绪丙子年(1876年)七月初六日卯时,
享阳七十六岁,
卒七月二十日,
葬在土地宫园西向南','陈氏:,
生于光绪丙子年(1876年)六月十八日巳时,
享阳二十五岁,
卒光绪庚子年(1900年)正月十四日卯时,
葬在土地宫园坐乾向巽,
次陈氏:,
生于光绪辛巳年(1881年)十一月廿六日申时,
享阳七十六岁,
卒十一月十三日,
附葬','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('119','袁','','75','2','学妻','學妻','','','','','客路村','','','','生于光绪壬午年(1882年)十一月廿八日未时,
享阳二十一岁,
卒光绪壬寅年(1902年)四月初七日午时,
葬在土地宫后园坐艮向坤','','无配','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('120','袁','','75','3','学碧','學碧','学济','陈氏','','陳氏','客路村','219,220,221,222','','','生于光绪丁亥年(1887年)閏四月初八日卯时,
享阳四十岁,
卒民国丙寅年(1926年)七月十三日申时,
葬在书房园仔坐西北向东南','陈氏:,
生于光绪癸巳年(1893年)七月初八日丑时,
陈氏出嫁','','娶陈氏生四子','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('121','袁','','75','4','学益','學益','学海','唐氏','娶吴村唐氏无子','唐氏','客路村','','','','生于光绪辛卯年(1891年)七月初六日巳时,
享阳八十一岁,
卒壬子年(公元1972年)七月十六日,
葬在土地宫园西南向','唐氏:,
生于光绪甲午年(1894年)三月十二日辰时,
卒八月十三日,
附葬','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('122','袁','','76','1','学奢','學奢','','','','','客路村','','','204','生于同治己巳年(1869年)十月十五日巳时,
享阳二十岁,
卒光绪己丑年(1889年)十一月十五日辰时,
葬在土地公后园坐艮向坤','','无配','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('123','袁','','76','2','学敏','學敏','','梁氏','娶大路前梁氏生四子','梁氏','客路村','204,205,206,207','','','生于同治甲戌年(1874年)十二月初七日午时','梁氏:,
生于光绪己卯年(1879年)九月廿五日亥时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('124','袁','','77','1','学养','學養','','','','','客路村','','','','往新州生辰失记','','未娶','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,77','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('125','袁','','79','1','杨明','楊明','杨名','冯氏刘氏孙氏','娶冯氏次娶刘氏生一子永茂三娶孙氏生一子宝荣','馮氏劉氏孫氏','客路村','242,243','78','','生于光绪庚辰年(1880年)六月三十日戌时,
享阳七十四岁,
卒民国二十四年乙亥年(1935年)正月初四日,
葬在沙墩东塘仔后','冯氏:,
生于光绪丁丑年(1877年)五月十三日午时,
享阳二十三岁,
卒光绪戊戌年(1898年)十二月廿四日申时,
葬在客路村后园坐亥向巳加壬丙,
刘氏:,
生于光绪甲申年(1884年)七月廿五日巳时,
享阳二十四岁,
卒光绪丁未年(1907年)四月廿八日辰时,
葬在客路村后园坐壬向丙,
迁葬村后东边塘东边角,
孙氏:,
生于光绪戊寅年(1878年)九月十九日午时,
孙氏出嫁','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('126','袁','','79','2','杨登','楊登','那南','陈氏','','陳氏','客路村','','','','生于光绪癸未年(1883年)八月廿八日卯时,
享阳十八岁,
卒光绪庚子年(1900年)正月初九日巳时,
葬在客路村后园坐乾向巽','陈氏:,
未娶','配陈氏未娶','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('127','袁','','79','3','杨龙','楊龍','','','','','客路村','','','','生于光绪丁亥年(1887年)九月十四日戌时,
享阳十四岁,
卒光绪庚子年(1900年)正月初五日亥时,
葬在客路村后园坐乾向巽','','未配','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('128','袁','','79','4','杨虎','楊虎','','','','','客路村','','','','生于光绪壬辰年(1892年)六月初六日酉时,
享阳十一岁,
卒光绪壬寅年(1902年)三月廿三日戌时,
葬在客路村后园坐艮向坤加丑未','','未配中殇','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('129','袁','','79','5','杨榜','楊榜','','','','','客路村','','80','','生于光绪乙未年(1895年)八月初六日寅时,
享阳六岁,
卒光绪庚子年(1900年)正月初十日戌时,
葬在客路村后园坐乾向巽','','少殇','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('130','袁','','82','1','杨荣','楊榮','','陈氏','','陳氏','客路村','263,264,265,266','81','','生于光绪庚辰年(1880年)八月廿八日巳时,
享阳六十一岁,
卒民国壬午年(1942年)十二月十六日,
葬在沙墩下园','陈氏:,
生于光绪庚辰年(1880年)四月廿七日申时,
享阳六十四岁,
卒民国甲申年(1944年)八月十四日,
附葬','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('131','袁','','82','2','杨光','楊光','','吴氏黄氏','娶吴氏生二子长永发次永达次娶腻樑村黄氏','吳氏黃氏','客路村','275,276','','','生于光绪壬午年(1882年)九月廿一日卯时,
享阳六十一岁,
卒民国壬午年(1942年)九月十九日,
葬在沙墩下园','吴氏:,
生于光绪乙酉年(1885年)十月廿四日寅时,
享阳三十一岁,
卒民国乙卯年(1915年)六月廿七日卯时,
葬在客路村后路东园坐乾向巽分金,
黄氏:,
生于光绪庚辰年(1880年)六月廿五日申时,
享阳九十岁,
卒辛亥年(公元1971年)八月十六日,
附葬','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('132','袁','','82','3','杨煇','楊煇','','陈氏','','陳氏','客路村','','','','生于光绪丁酉年(1897年)九月十四日子时,
享阳十五岁,
卒宣统辛亥年(1911年)三月廿五日,
葬在客路村后园坐北向南','陈氏:,
生于光绪丁酉年(1897年)十月十四日午时,
未娶出嫁','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('133','袁','','82','4','杨耀','楊耀','','梁氏','娶龙登村梁氏生二子','梁氏','客路村','301,302','83','','生于光绪壬寅年(1902年)十一月廿一日戌时,
享阳三十五岁,
卒民国丙子年(1936年)三月廿五日申时,
葬在沙墩坐北向南','梁氏:,
生于光绪庚子年(1900年)九月十七日巳时,
享阳九十一岁,
卒辛酉年(公元1981年)三月,
火葬','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('134','袁','','87','1','杨楹','楊楹','','','','','客路村','','','','生于光绪丁酉年(1897年)','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,59,87','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('135','袁','','96','1','杨梅','楊梅','','陈氏王氏','娶陈氏次娶临海王氏生四子','陳氏王氏','客路村','149,150,151,152','','','生于光绪丁丑年(1877年)九月初六日子时','陈氏:,
生于光绪壬辰年(1892年)十一月十一日戌时,
享阳二十一岁,
卒民国壬子年(1912年)四月廿七日辰时,
葬在沙溝(沟)坡下园坐癸向丁,
王氏:,
生于光绪庚寅年(1890年)六月廿八日亥时,
卒八月十三日,
葬在沙溝(沟)坡下园','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('136','袁','','96','2','杨守','楊守','','','','','客路村','','','','生于光绪甲申年(1884年)二月十六日,
享阳二十四岁,
卒光绪丁未年(1907年),
葬在海南琼城宫地','','无配','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('137','袁','','96','3','杨泰','楊泰','','','','','客路村','','','','生于光绪己丑年(1889年)十月初十日酉时,
享阳十五岁,
卒光绪癸卯年(1903年)五月初二日申时,
葬在沙溝(沟)坡下园坐北向南','','无配','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('138','袁','','96','4','杨四','楊四','','','','','客路村','','','','享阳五岁七生庚亡日,
葬俱失记','','少殇','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('139','袁','','97','1','杨馨','楊馨','','张氏','娶张氏生三子','張氏','客路村','153,154,155','','','生于光绪癸未年(1883年)二月十六日辰时,
享年四十一岁,
卒民国癸亥年(1923年)十二月十七日申时,
葬在沙溝(沟)下园坐癸向丁现移葬水厂东坐东向西','张氏:,
生于光绪乙未年(1895年)十一月廿二日酉时,
享年六十二岁,
卒丙申年(公元1956年)二月十二日(年份谱失记推算的),
葬在东塘西南向现移葬水厂东坐东北向西南','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('140','袁','','97','2','杨珍','楊珍','杨湖','陈氏','','陳氏','客路村','156,157','','','杨湖公:,
生于光绪戊子年(1888年)二月初五日','陈氏:,
生于光绪辛丑年(1901年)九月初八日辰时,
享阳三十五岁,
卒民国正月十七日午时,
葬在沙溝(沟)坡园坐巳向亥加壬丙分金','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('141','袁','','97','3','杨齐','楊齊','','冯氏','','馮氏','客路村','158,159,160','98','','生于光绪癸巳年(1893年)正月廿七日,
享阳六十岁,
卒甲午年(公元1954年)四月十三日,
葬在字房园','冯氏:,
生于光绪丙申年(1896年)七月初七日巳时,
享阳七十八岁,
卒甲寅年(公元1974年)十月初七日,
附葬','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('142','袁','','84','1','扬貌','揚貌','','','','','客路村','','','','生于光绪己丑年(1889年)七月初二日未时,
享阳十三岁,
卒光绪辛丑年(1901年)正月十三日戌时,
葬在沙溝(沟)坡坐北向南','','中殇','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,84','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('143','袁','','84','2','杨林','楊林','','','','','客路村','','','','生于光绪丁酉年(1897年)九月初八日寅时,
享阳二十二岁,
卒民国戊午年(1918年)十一月廿六日辰时,
葬在沙溝(沟)坡坐艮向坤','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,84','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('144','袁','','85','1','杨声','楊聲','','','','','客路村','','','','生于光绪庚寅年(1890年)十月廿七日午时','','往去新州','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('145','袁','','85','2','杨振','楊振','','梁氏','娶龙潮村梁氏生三子','梁氏','客路村','309,310,311','','','生于光绪丙申年(1896年)九月初四日酉时,
享阳五十三岁,
卒七月二十日,
葬在沙溝(沟)坡南向','梁氏:,
生于光绪甲辰年(1904年)十二月廿八日,
享阳五十一岁,
卒七月廿八日,
附葬','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('146','袁','','99','1','杨新','楊新','','','','','客路村','','','','生于光绪庚寅年(1890年)十二月十五日酉时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,99','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('147','袁','','65','3','学就','學就','','','','','客路村','','','','生辰忌日失记,
享阳四岁而亡','','早死不幸','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,65','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('148','袁','','74','1','亚九','亞九','','','','','客路村','','','','','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,74','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('149','袁','','135','1','永生','永生','','林氏','娶石头林氏生一子','林氏','客路村','161','','','生于民国癸丑年(1913年)十二月初四日巳时,
享阳六十岁,
卒正月十三日,
葬在沙溝(沟)坡东南向,
移葬海洋大学后蜈蚣岭坐寅向申兼艮坤','林氏:,
生于民国甲寅年(1914年)八月十三日子时,
卒六月十七日,
附葬,
移葬海洋大学后蜈蚣岭坐向丙兼子午','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96,135','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('150','袁','','135','2','陈毓','陳毓','','','','','客路村','','','','生于民国丙辰年(1916年)五月初四日戌时,
享阳二岁,
卒閏二月日时失记','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96,135','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('151','袁','','135','3','那发','那發','','陈氏','','陳氏','客路村','162','','','生于民国癸亥年(1923年)六月十三日卯时,
享阳四十九岁,
卒辛亥年(公元1971年)二月初八日,
葬在沙溝(沟)坡南向','陈氏:,
生于民国庚申年(1920年)八月初八日申时,
卒甲申年(公元2004年)閏二月廿二日酉时,
葬在沙溝(沟)坡坐北向南','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96,135','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('152','袁','','135','4','那歪','那歪','','','','','客路村','','','','生于民国戊辰年(1928年)閏二月二十日戌时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96,135','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('153','袁','','139','1','永伦','永倫','','梁氏','娶土地卜梁氏生三子','梁氏','客路村','163,164,165','','','生于民国丙辰年(1916年)十月十八日午时,
卒丁亥年(公元2007年)五月二十日卯时,
葬在公老西坐东北向西南','梁氏:,
生于民国丁巳年(1917年)七月十一日戌时,
卒丙戌年(公元2006年)十月初六日未时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('154','袁','','139','2','那宋','那宋','','','','','客路村','','','','生于民国己未年(1919年)九月廿三日申时,
享阳四岁,
卒民国壬戌年(1922年)七月十八日戌时,
葬在沙溝(沟)坡下,
现移葬水厂东','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('155','袁','','139','3','那活','那活','','钟氏林氏','娶麒麟井村钟氏又娶林氏生四子','鍾氏林氏','客路村','166,167,168,169','','','生于民国壬戌年(1922年)九月廿四日子时,
享阳六十四岁,
卒七月十七日,
葬在字房坡西南向','钟氏,
生于民国壬戌年(1922年)復月廿二日子时,
另適,
林氏:,
生于民国乙丑年(1925年)正月廿八日戌时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('156','袁','','140','1','保永','保永','','','','','客路村','','','','生于民国壬戌年(1922年)十月十五日卯时,
享阳十四岁,
卒民国乙亥年(1935年)六月廿三日午时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,140','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('157','袁','','140','2','永德','永德','那操','潘氏','','潘氏','客路村','170','','','生于民国辛未年(1931年)十一月十四日辰时','潘氏:,
生于民国庚辰年(1940年)十二月初三日戌时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,140','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('158','袁','','141','1','保明','保明','','叶氏','娶良丰村叶氏生四子','葉氏','客路村','171,172,173,174','','','生于民国辛酉年(1921年)七月二十日未时,
卒庚辰年(公元2000年)五月十八日寅时,
葬在书房仔坡坐北向南','叶氏:,
生于民国壬戌年(1922年)六月廿三日申时,
卒庚寅年(公元2010年)八月二十日未时,
葬在书房仔坡坐北向南','','待','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('159','袁','','141','2','保朋','保朋','','','','','客路村','','','','生于民国丁卯年(1927年)六月三十日巳时,
享阳二岁,
卒二月廿八日寅时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('160','袁','','141','3','日生','日生','','王氏','上门王氏生一子','王氏','客路村','175','','','生于民国庚午年(1930年)十月十三日戌时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('161','袁','','149','1','朝仁','朝仁','金仁','何氏','娶何氏生一子','何氏','客路村','176','','','生于民国癸酉年(1933年)十月初八日戌时,
卒己卯年(公元1999年)二月十三日酉时,
葬在海洋大学后蜈蚣岭坐寅向申兼艮坤','何氏:,
生于民国己巳年(1929年)七月初三日巳时','','待','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96,135,149','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('162','袁','','151','1','朝进','朝進','','彭氏','娶旧县彭氏生一子','彭氏','客路村','177','','','生于庚寅年(公元1950年)四月廿六日辰时','彭氏:,
生于己丑年(公元1949年)十月廿七日卯时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96,135,151','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('163','袁','','153','1','朝明','朝明','','李氏','','李氏','客路村','178,179,180,181','','','生于民国丙戌年(1946年)六月初三日酉时','李氏:,
生于民国己丑年(1949年)十月初三日丑时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,153','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('164','袁','','153','2','福旺','福旺','','','','','客路村','','','','享阳十三岁,
卒八月廿九日,
同祖公葬在公老西坐东北向西南','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,153','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('165','袁','','153','3','朝周','朝周','','王氏方氏','娶王氏生二女继妻湖北省方氏生一子','王氏方氏','客路村','340','','','生于壬辰年(公元1952年)十一月初二日子时','王氏:,
生于甲辰年(公元1964年),
卒十月廿四日,
葬在字房坡西南向,
方氏:,
生于甲寅年(公元1974年)十二月初九日子时','','待','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,153','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('166','袁','','155','1','朝净','朝淨','福静','蔡氏','娶蔡氏生四男','蔡氏','客路村','182,183,184,185','','','生于民国戊子年(1948年)八月十一日酉时','蔡氏:,
生于癸巳年(公元1953年)九月十八日子时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('167','袁','','155','2','朝友','朝友','','王氏','娶临东村王氏生三女二男','王氏','客路村','186,187','','','生于壬辰年(公元1952年)十二月十八日寅时','王氏:,
生于戊戌年(公元1958年)正月十九日寅时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('168','袁','','155','3','朝权','朝權','福权','黄氏','娶黄氏生三男一女','黃氏','客路村','188,189,190','','','生于丁酉年(公元1957年)十一月廿五日寅时','黄氏:,
生于己亥年(公元1959年)二月三十日申时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('169','袁','','155','4','朝盛','朝盛','','','','','客路村','191,192','','','生于乙巳年(公元1965年)十一月廿二日辰时','','','生一女二男','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('170','袁','','157','1','朝建','朝建','','陈氏','','陳氏','客路村','193,194','','','生于己亥年(公元1959年)九月十九日子时','陈氏:,
生于壬寅年(公元1962年)八月十八日亥时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,140,157','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('171','袁','','158','1','福堂','福堂','','','','','客路村','','','','享阳四岁,
卒八月初四日,
葬在沙溝(沟)坡下','','幼殇','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('172','袁','','158','2','朝胜','朝勝','刘胜','林氏','娶东岭村林氏生四男一女','林氏','客路村','195,196,197,198','','','生于癸巳年(公元1953年)五月十三日亥时','林氏:,
生于乙未年(公元1955年)十二月初九日丑时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('173','袁','','158','3','朝平','朝平','刘平','吴氏','娶祝美村吴氏生二男一女','吳氏','客路村','199,200','','','生于庚子年(公元1960年)三月初十日亥时','吴氏:,
生于丁酉年(公元1957年)十一月廿三日未时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('174','袁','','158','4','朝安','朝安','','郑氏','娶新圩郑氏生三男三女','鄭氏','客路村','201,202,203','','','生于乙巳年(公元1965年)五月初三日亥时','郑氏:,
生于戊申年(公元1968年)四月十四日辰时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('175','袁','','160','1','华强','華強','','','','','客路村','','','','享阳五岁,
卒二月十一日,
葬在字房坡','','幼殇','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,160','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('176','袁','','161','1','乃兴','乃興','','吴氏','娶吴氏生一子','吳氏','客路村','339','','','生于丁酉年(公元1957年)五月十八日戌时','吴氏:,
生于癸卯年(公元1963年)九月初二日午时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96,135,149,161','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('177','袁','','162','1','乃宏','乃宏','','','','','客路村','','','','生于戊午年(公元1978年)十一月十二日辰时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96,135,151,162','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('178','袁','','163','1','乃敬','乃敬','清华','','','','客路村','','','','生于乙卯年(公元1975年)三月廿九日辰时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,153,163','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('179','袁','','163','2','那生','那生','','','','','客路村','','','','享阳二岁,
卒十一月廿八日,
葬在公老西坡坐东北向西南','','幼殇','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,153,163','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('180','袁','','163','3','乃保','乃保','珠保','','','','客路村','','','','生于壬戌年(公元1982年)正月十八日丑时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,153,163','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('181','袁','','163','4','乃柏','乃柏','珠柏','','','','客路村','','','','生于丁卯年(公元1987年)十月十五日午时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,153,163','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('182','袁','','166','1','乃清','乃清','','陈氏','娶百儒村陈氏生二子','陳氏','客路村','341,342','','','生于己未年(公元1979年)七月十一日子时','陈氏:,
生于戊午年(公元1978年)七月廿七日子时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,166','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('183','袁','','166','2','乃飞','乃飛','罗飞','','','','客路村','','','','生于辛酉年(公元1981年)七月廿五日辰时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,166','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('184','袁','','166','3','乃创','乃創','罗创','杨氏','娶英豪村杨氏','楊氏','客路村','343','','','生于癸亥年(公元1983年)七月初十日申时','杨氏:,
生于丁卯年(公元1987年)六月初二日子时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,166','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('185','袁','','166','4','乃腾','乃騰','','','','','客路村','','','','生于丁卯年(公元1987年)九月十一日卯时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,166','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('186','袁','','167','1','乃进','乃進','','','','','客路村','','','','生于丁卯年(公元1987年)十一月初五日子时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,167','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('187','袁','','167','2','乃保','乃保','乃二','','','','客路村','','','','生于壬申年(公元1992年)十月十三日戌时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,167','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('188','袁','','168','1','乃登','乃登','志登','孔氏','娶南城村孔氏','孔氏','客路村','','','','生于乙丑年(公元1985年)五月初七日午时','孔氏:,
生于乙丑年(公元1985年)七月二十日寅时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,168','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('189','袁','','168','2','乃龙','乃龍','志龙','','','','客路村','','','','生于己巳年(公元1989年)十二月十三日午时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,168','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('190','袁','','168','3','乃攀','乃攀','志攀','','','','客路村','','','','生于壬申年(公元1992年)十二月十二日丑时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,168','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('191','袁','','169','1','乃健','乃健','','','','','客路村','','','','生于戊寅年(公元1998年)三月二十日巳时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,169','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('192','袁','','169','2','乃康','乃康','','','','','客路村','','','','生于庚辰年(公元2000年)七月初七日申时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,169','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('193','袁','','170','1','乃丰','乃豐','','','','','客路村','','','','生于丙寅年(公元1986年)十一月十八日吉时','','','待','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,140,157,170','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('194','袁','','170','2','乃霖','乃霖','','','','','客路村','','','','生于甲戌年(公元1994年)四月二十日吉时','','','待','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,140,157,170','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('195','袁','','172','1','乃和','乃和','华江','','','','客路村','','','','生于庚申年(公元1980年)九月廿二日辰时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158,172','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('196','袁','','172','2','乃香','乃香','','','','','客路村','','','','生于丙寅年(公元1986年)二月十四日子时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158,172','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('197','袁','','172','3','乃庆','乃慶','','','','','客路村','','','','生于丁卯年(公元1987年)十月廿七日午时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158,172','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('198','袁','','172','4','乃盈','乃盈','','','','','客路村','','','','生于庚午年(公元1990年)正月十六日卯时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158,172','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('199','袁','','173','1','乃东','乃東','','','','','客路村','','','','生于丙寅年(公元1986年)六月十四日丑时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158,173','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('200','袁','','173','2','乃仁','乃仁','','','','','客路村','','','','生于庚午年(公元1990年)十二月廿五日午时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158,173','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('201','袁','','174','1','夭逝','夭逝','','','','','客路村','','','','','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158,174','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('202','袁','','174','2','乃德','乃德','','','','','客路村','','','','生于癸酉年(公元1993年)九月廿三日丑时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158,174','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('203','袁','','174','3','乃顺','乃順','','','','','客路村','','','','生于戊寅年(公元1998年)四月二十日申时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,141,158,174','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('204','袁','','123','1','杨春','楊春','','王氏','娶临海王氏生二子','王氏','客路村','223,224','122','','生于光绪己亥年(1899年)八月初一日子时','王氏:,
生于光绪辛丑年(1901年)二月十六日卯时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('205','袁','','123','2','那有','那有','杨风','','','','客路村','','','','生于光绪乙巳年(1905年)六月初六日戌时,
享阳六岁,
卒宣统庚戌年(1910年)七月初十日未时,
葬在土地公后祖坟边','','少殇','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('206','袁','','123','3','杨和','楊和','','梁氏','娶宝满村梁氏生三子','梁氏','客路村','225,226,227','','','生于宣统辛亥年(1911年)八月十二日戌时,
享阳六十一岁,
卒辛亥年(公元1971年)九月十八日,
葬在宫老后园西南向','生于民国丙辰年(1916年)四月廿二日申时,
享阳四十六岁,
卒辛卯年(公元1951年)三月十一日,
附葬','','待','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('207','袁','','123','4','公存','公存','杨求','陈氏庐氏吴氏','娶临西陈氏次娶庐氏生一子名康母子生卒失记三娶吴氏生三子','陳氏廬氏吳氏','客路村','235,236,237','','','生于民国戊午年(1918年)四月二十日,
享阳五十八岁,
卒乙卯年(公元1975年)十二月初四日,
葬在土地宫后西南向','陈氏:,
生于民国壬戌年(1922年)四月十一日卯时,
卒葬忌辰失记,
吴氏:,
生于民国戊辰年(1928年)五月初三日','','待','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('208','袁','','107','1','杨太','楊太','杨泰','张氏','','張氏','客路村','209','','','生于民国壬戌年(1922年)七月廿一日午时,
享阳四十四岁,
卒癸卯年(公元1963年)九月十一日','张氏:,
生于民国壬申年(1932年)十月初一日丑时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,47,67,107','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('209','袁','','208','1','永昌','永昌','','陈氏','','陳氏','客路村','210,211','','','生于庚子年(公元1960年)十月十二日酉时','陈氏:,
生于辛丑年(公元1961年)六月十四日辰时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,47,67,107,208','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('210','袁','','209','1','朝志','朝誌','','','','','客路村','','','','生于癸亥年(公元1983年)四月初三日巳时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,47,67,107,208,209','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('211','袁','','209','2','朝伟','朝偉','','','','','客路村','','','','生于乙丑年(公元1985年)三月廿六日巳时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,47,67,107,208,209','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('212','袁','','118','1','杨贵','楊貴','','朱氏','临海朱氏出嫁','朱氏','客路村','','','','生于光绪丁未年(1907年)五月初九日丑时,
享阳二十二岁,
卒九月初一日巳时,
葬在公老北坐艮向坤兼寅申','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75,118','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('213','袁','','118','2','杨儒','楊儒','','吴氏','娶东山吴氏另適','吳氏','客路村','','','','生于宣统庚戌年(1910年)四月廿三日子时,
享阳六十二岁,
卒乙丑年(公元1985年)六月廿九日,
葬在土地宫园巽向','吴氏:,
生于民国丙辰年(1916年)十一月廿二日寅时,
吴氏出嫁','','待','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75,118','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('214','袁','','118','3','杨真','楊真','','姚氏','娶颜村姚氏生二子','姚氏','客路村','215,216','','','生于民国癸丑年(1913年)七月初八日戌时,
享阳八十七岁,
卒己卯年(公元1999年)十二月廿一日丑时,
葬在公老后坐东北向西南','姚氏:,
生于民国丁巳年(1917年)九月初五日卯时,
享阳七十九岁,
卒乙亥年(公元1995年)十一月十二日子时,
葬在沙溝(沟)坡坐东北向西南','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75,118','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('215','袁','','214','1','永南','永南','','刘氏','','劉氏','客路村','217','','','生于民国丙子年(1936年)二月初五日戌时,
享阳六十岁,
卒乙亥年(公元1995年)九月十一日未时,
葬在沙溝(沟)坡东北向西南','刘氏:,
生于民国戊寅年(1938年)三月初十日丑时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75,118,214','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('216','袁','','214','2','永桂','永桂','','陈氏','','陳氏','客路村','','','','生于民国癸未年(1943年)十月初六日申时','陈氏:,
生于辛卯年(公元1951年)十二月十五日丑时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75,118,214','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('217','袁','','215','1','朝德','朝德','','陈氏','娶太平陈氏生一男','陳氏','客路村','218','','','生于甲寅年(公元1974年)九月十五日丑时','陈氏:,
生辰不详','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75,118,214,215','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('218','袁','','217','1','乃琪','乃琪','','','','','客路村','','','','生于壬午年(公元2002年)七月十六日酉时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75,118,214,215,217','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('219','袁','','120','1','那有','那有','','','','','客路村','','','','','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75,120','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('220','袁','','120','2','那芝','那芝','','','','','客路村','','','','生于民国丁巳年(1917年)十一月初一日丑时,
卒民国丙寅年(1926年)七月十五日午时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75,120','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('221','袁','','120','3','光芝','光芝','','','','','客路村','','','','生于民国壬戌年(1922年)正月廿九日寅时,
卒民国丙寅年(1926年)七月十二日午时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75,120','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('222','袁','','120','4','那荣','那榮','','','','','客路村','','','','生于民国乙丑年(1925年)三月初九日子时,
享阳二十五岁,
卒民国己丑年(1949年)八月十六日申时正寝出,
葬在字房坡','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,49,75,120','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('223','袁','','204','1','秋妹','秋妹','','','','','客路村','','','','生于民国己巳年(1929年)正月十二日寅时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,204','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('224','袁','','204','2','秋生','秋生','','','','','客路村','','','','生于民国乙亥年(1935年)七月初九日子时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,204','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('225','袁','','206','1','永保','永保','','祝氏','娶廉江祝氏生二子','祝氏','客路村','228,229','','','生于民国丙子年(1936年)正月十七日丑时','祝氏:,
生于民国戊寅年(1938年)七月十八日子时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,206','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('226','袁','','206','2','永权','永權','','彭氏候氏','娶彭氏另適继妻湖光下溪村候氏','彭氏候氏','客路村','','','','生于民国丁亥年(1947年)七月初四日卯时','候氏:,
生于丁酉年(公元1957年)四月十三日申时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,206','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('227','袁','','206','3','永旺','永旺','','吴氏','娶文昌吴氏生二子','吳氏','客路村','233,234','','','生于民国己丑年(1949年)七月初二日亥时,
享阳六十五岁,
卒癸巳年(公元2013年)二月廿四日卯时,
葬在宫老园西南向','吴氏:,
生于乙未年(公元1955年)八月廿三日寅时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,206','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('228','袁','','225','1','朝文','朝文','','李氏','','李氏','客路村','230,231','','','生于辛丑年(公元1961年)十月初六日卯时','李氏:,
生于辛丑年(公元1961年)三月廿二日申时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,206,225','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('229','袁','','225','2','朝武','朝武','','庞氏','娶龙头庞氏生一男','龐氏','客路村','232','','','生于庚戌年(公元1970年)十月初五日未时','庞氏:,
生于庚戌年(公元1970年)十一月初三日戌时','','待','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,206,225','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('230','袁','','228','1','乃发','乃發','明洪','黄氏','娶本村黄氏','黃氏','客路村','','','','生于丙寅年(公元1986年)三月十一日午时','黄氏:,
生于丙寅年(公元1986年)四月初四日巳时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,206,225,228','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('231','袁','','228','2','乃达','乃達','明军','','','','客路村','','','','生于庚午年(公元1990年)八月十八日巳时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,206,225,228','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('232','袁','','229','1','乃伟','乃偉','','','','','客路村','','','','生于','','','待','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,206,225,229','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('233','袁','','227','1','朝清','朝清','','陈氏','娶沈塘圩陈氏','陳氏','客路村','','','','生于壬戌年(公元1982年)六月初八日申时','陈氏:,
生于己未年(公元1979年)七月廿七日未时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,206,227','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('234','袁','','227','2','朝廉','朝廉','','','','','客路村','','','','生于庚午年(公元1990年)六月初六日申时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,206,227','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('235','袁','','207','1','永时','永時','','余氏','','餘氏','客路村','238','','','生于乙未年(公元1955年)正月十六日酉时','余氏:,
生于己亥年(公元1959年)六月二十日','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,207','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('236','袁','','207','2','永益','永益','','杨氏','','楊氏','客路村','239','','','生于丙申年(公元1956年)八月十三日午时','杨氏:,
生于己亥年(公元1959年)九月初二日','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,207','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('237','袁','','207','3','永太','永太','永泰','黄氏','','黃氏','客路村','','','','生于己亥年(公元1959年)八月廿三日酉时','黄氏:,
生于壬寅年(公元1962年)四月十二日','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,207','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('238','袁','','235','1','朝欣','朝欣','','李氏','娶贵州省李氏','李氏','客路村','','','','生于甲子年(公元1984年)四月廿五日亥时','李氏:,
生于癸亥年(公元1983年)七月初七日吉时','','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,207,235','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('239','袁','','236','1','朝乐','朝樂','','','','','客路村','','','','生于','','待','','1,2,6,9,14,18,21,23,25,28,29,34,38,50,76,123,207,236','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('240','袁','','53','1','那祝','那祝','','','','','客路村','','','','','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,53','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('241','袁','','55','1','康仁','康仁','','','','','客路村','','','','','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,55','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('242','袁','','125','1','永茂','永茂','','梁氏','娶宝满村梁氏生五子','梁氏','客路村','244,245,246,247,248','','','生于光绪丙午年(1906年)十一月初三日申时,
享阳七十七岁,
卒壬戌年(公元1982年)闰四月十三日,
葬在坡仔东园南向','梁氏:,
生于光绪乙巳年(1905年)正月初一日子时,
享阳七十四岁,
卒戊午年(公元1978年)八月十八日,
附葬','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('243','袁','','125','2','宝荣','寶榮','','','','','客路村','','','','生于宣统己酉年(1909年)六月十六日寅时,
享阳二十八岁,
葬俱失记','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('244','袁','','242','1','金清','金清','朝兴','李氏陈氏','娶李氏另適继娶乾塘陈氏生一子','李氏陳氏','客路村','249','','','生于民国戊辰年(1928年)十一月初八日亥时,
卒丁亥年(公元2007年)三月廿八日卯时,
葬在坡仔东园坐北向南','陈氏:,
生于民国戊子年(1948年)十月初八日申时,
卒戊寅年(公元1998年)七月初六日吉时,
葬在坡仔东园','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('245','袁','','242','2','朝惠','朝惠','','廖氏','娶北和市廖氏生二子','廖氏','客路村','250,251','','','生于民国丁丑年(1937年)二月十八日戌时,
享阳七十岁,
卒丙戌年(公元2006年)十一月廿六日未时,
葬在坡仔东园坐东北向西南分针','廖氏:,
生于辛卯年(公元1951年)二月初三日辰时','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('246','袁','','242','3','朝相','朝相','','吴氏','娶文昌村吴氏生二子','吳氏','客路村','252,253,254','','','生于民国庚辰年(1940年)二月初八日子时','吴氏:,
生于民国甲申年(1944年)五月廿五日卯时,
卒壬午年(公元2002年)九月廿五日辰时,
葬在坡仔园东坐西向东','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('247','袁','','242','4','朝杰','朝傑','','','','','客路村','','','','生于民国壬午年(1942年)十二月初七日亥时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('248','袁','','242','5','朝南','朝南','','全氏','娶遂溪出口村全氏生一子','全氏','客路村','255','','','生于民国乙酉年(1945年)十一月廿一日','全氏:,
生于年月','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('249','袁','','244','1','乃良','乃良','','','','','客路村','','','','','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,244','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('250','袁','','245','1','乃焦','乃焦','','符氏','娶雷州杨家镇调乃家村符氏','符氏','客路村','260','','','生于己酉年(公元1969年)二月初五日卯时','符氏:,
生于丁巳年(公元1977年)八月初一日寅时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,245','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('251','袁','','245','2','乃兿','乃兿','','','','','客路村','','','','生于壬子年(公元1972年)九月十三日卯时,
卒丙戌年(公元2006年)四月初二日,
葬在黄略镇狮子岭坐西向东','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,245','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('252','袁','','246','1','乃文','乃文','','殷氏','娶黄略镇殷氏村生四子','殷氏','客路村','256,257,258,259','','','生于戊申年(公元1968年)九月廿九日申时','殷氏:,
生于甲寅年(公元1974年)八月初八日申时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,246','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('253','袁','','246','2','乃华','乃華','','陈氏','娶雷州下岚村陈氏','陳氏','客路村','261','','','生于甲寅年(公元1974年)十二月三十日亥时','陈氏:,
生于壬戌年(公元1982年)五月初九日卯时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,246','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('254','袁','','246','3','乃玉','乃玉','','刘氏','娶河北省刘氏','劉氏','客路村','','','','生于壬戌年(公元1982年)八月初二日子时','刘氏:,
生于辛酉年(公元1981年)二月十一日丑时','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,246','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('255','袁','','248','1','乃生','乃生','','郑氏','娶麻章李家坡村郑氏','鄭氏','客路村','','','','生于甲子年(公元1984年)二月十七日申时','郑氏:,
生于乙丑年(公元1985年)五月初二日辰时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,248','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('256','袁','','252','1','长子','長子','','','','','客路村','','','','','','','夭逝','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,246,252','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('257','袁','','252','2','次子','次子','','','','','客路村','','','','','','','夭亡','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,246,252','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('258','袁','','252','3','昌炳','昌炳','','','','','客路村','','','','生于戊寅年(公元1998年)十月十三日子时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,246,252','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('259','袁','','252','4','昌鸿','昌鴻','','','','','客路村','','','','生于庚辰年(公元2000年)六月初五日巳时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,246,252','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('260','袁','','250','1','昌康','昌康','','','','','客路村','','','','生于丁亥年(公元2007年)五月初十日丑时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,245,250','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('261','袁','','253','1','昌栩','昌栩','','','','','客路村','','','','生于丙戌年(公元2006年)四月十四日丑时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79,125,242,246,253','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('262','袁','','79','6','杨声','楊聲','','林氏','娶仙村林氏另適','林氏','客路村','','','','生于宣统庚戌年(1910年)五月十九日戌时,
享阳三十五岁,
卒民国甲申年(1944年)十一月廿九日,
葬在坡仔东园','林氏:,
生于宣统己酉年(1909年)九月十四日','','','1,2,6,9,14,18,21,23,25,28,29,34,37,41,54,79','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('263','袁','','130','1','康寿','康壽','','','','','客路村','','','','生辰失记,
卒二月十六日忌辰','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,130','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('264','袁','','130','2','那逊','那逊','','','','','客路村','','','','卒十一月失记','','小殇','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,130','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('265','袁','','130','3','永英','永英','','吕氏','娶吕宅吕氏生一子','呂氏','客路村','267','','','生于光绪丁未年(1907年)十月廿三日子时,
享阳六十一岁,
卒戊申年(公元1968年)三月廿三日,
葬在沙墩下园','吕氏:,
生于宣统辛亥年(1911年)十一月初七日卯时,
卒葬失记','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,130','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('266','袁','','130','4','永隆','永隆','','黄氏陈氏','娶净宅黄氏继娶特呈陈氏生二子','黃氏陳氏','客路村','269,270','','','生于民国丙辰年(1916年)三月廿七日巳时,
享阳八十八岁,
卒癸未年(公元2003年)十月三十日卯时,
葬在山墩前坐东北向西南正分金','黄氏:,
生于民国戊午年(1918年)五月廿九日卯时,
另適,
陈氏:,
生于民国戊午年(1918年)三月初九日寅时,
享阳九十二岁,
卒己丑年(公元2009年)闰五月廿七日巳时,
葬在沙老前坐东北向西南','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,130','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('267','袁','','265','1','朝富','朝富','','周氏','娶北海市周氏生一子','周氏','客路村','268','','','生于民国戊寅年(1938年)闰七月十四日戌时,
卒戊子年(公元2008年)十二月初八日吉时,
葬在黄略镇狮子岭','周氏:,
生于民国乙酉年(1945年)三月初七日','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,130,265','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('268','袁','','267','1','乃晖','乃暉','','田氏','娶河北省田氏','田氏','客路村','','','','生于戊申年(公元1968年)三月廿三日寅时','田氏:,
生于丁未年(公元1967年)六月初七日吉时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,130,265,267','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('269','袁','','266','2','朝兴','朝興','','周氏','娶后塘村周氏生二子','周氏','客路村','272,273','','','生于庚寅年(公元1950年)十二月十二日丑时','周氏:,
生于壬辰年(公元1952年)二月初一日亥时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,130,266','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('270','袁','','266','1','朝发','朝發','','庐氏','','廬氏','客路村','271','','','生于民国庚辰年(1940年)七月初八日戌时,
享阳五十五岁,
卒甲戌年(公元1994年)十一月初九日寅时,
葬在泉淈沟坡仔坐北向南正分金','庐氏:,
生于民国癸未年(1943年)五月廿二日','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,130,266','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('271','袁','','270','1','乃虎','乃虎','','汤氏','娶北海市汤氏','湯氏','客路村','274','','','生于己酉年(公元1969年)九月三十日亥时','汤氏:,
生于庚戌年(公元1970年)三月廿七日丑时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,130,266,270','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('272','袁','','269','1','乃坚','乃堅','','','','','客路村','','','','生于壬戌年(公元1982年)正月三十日午时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,130,266,269','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('273','袁','','269','2','乃成','乃成','','','','','客路村','','','','生于丙寅年(公元1986年)十一月廿三日申时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,130,266,269','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('274','袁','','271','1','昌权','昌權','','','','','客路村','','','','生于己卯年(公元1999年)正月十八日申时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,130,266,270,271','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('275','袁','','131','1','永发','永發','','梁氏莫氏','娶宝满村梁氏出嫁次娶木宅村莫氏生二子','梁氏莫氏','客路村','277,278','','','生于宣统己酉年(1909年)六月三十日午时,
享阳六十五岁,
卒十二月初九日,
葬在沙墩下园','梁氏:,
梁氏出嫁,
莫氏:,
生于民国甲寅年(1914年)八月十九日寅时,
享阳五十四岁,
卒乙未年(公元1955年)正月十二日,
附葬','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('276','袁','','131','2','永达','永達','','周氏','娶那仙村周氏生四子','周氏','客路村','279,280,281,282','','','生于宣统辛亥年(1911年)九月十七日寅时,
享阳四十六岁,
卒戊戌年(公元1958年)七月十一日,
葬在沙墩下园','周氏:,
生于民国丁巳年(1917年)十二月初四日寅时,
周氏另適','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('277','袁','','275','1','朝民','朝民','','刘氏','','劉氏','客路村','','','','生于民国乙酉年(1945年)十二月廿七日寅时','刘氏:,
刘氏另適','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,275','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('278','袁','','275','2','朝赤','朝赤','','梁氏','娶宝满梁氏','梁氏','客路村','292,293','','','生于甲午年(公元1954年)三月十一日丑时,
卒庚辰年(公元2000年)六月廿二日亥时,
葬在泉水沟坡坐东北向西南','梁氏:,
生于壬寅年(公元1962年)六月初七日亥时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,275','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('279','袁','','276','1','朝福','朝福','','万氏','娶遂溪万氏生二子','萬氏','客路村','283,284','','','生于民国己卯年(1939年)十月十六日寅时','万氏:,
生于民国壬午年(1942年)十月廿六日未时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('280','袁','','276','2','朝任','朝任','','王氏','娶四川省王氏生二子','王氏','客路村','287,288','','','生于民国乙酉年(1945年)十月','王氏:,
生于辛卯年(公元1951年)九月初十日','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('281','袁','','276','3','朝林','朝林','','铜氏','','銅氏','客路村','285,286','','','生于民国壬午年(1942年)八月廿八日','铜氏:,
生于民国辛巳年(1941年)六月初一日亥时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('282','袁','','276','4','朝胜','朝勝','','陈氏','娶调罗陈氏生三子','陳氏','客路村','289,290,291','','','生于辛卯年(公元1951年)四月十七日戌时,
享阳六十九岁,
卒己亥年(公元2019年)十一月初八日戌时,
泉水沟坐西北向东南','陈氏:,
生于癸巳年(公元1953年)六月初六日卯时','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('283','袁','','279','1','乃荣','乃榮','','李氏叶氏','配娶吴川李氏妾妻梅录叶氏','李氏葉氏','客路村','','','','生于辛亥年(公元1971年)十月十三日辰时','李氏:,
生于戊申年(公元1968年)七月初九日寅时,
叶氏:,
生于乙卯年(公元1975年)八月十五日未时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,279','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('284','袁','','279','2','乃二','乃二','','','','','客路村','','','','生于辛酉年(公元1981年),
享阳四岁,
卒丙寅年(公元1986年)五月廿五日','','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,279','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('285','袁','','281','1','乃龙','乃龍','','黄氏','娶溪北村黄氏生三子','黃氏','客路村','294,295,296','','','生于甲辰年(公元1964年)六月初九日戌时','黄氏:,
生于丁未年(公元1967年)九月十二日吉时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,281','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('286','袁','','281','2','乃景','乃景','','黄氏','娶吴川溪洋村黄氏','黃氏','客路村','297,298','','','生于癸丑年(公元1973年)十月初七日未时','黄氏:,
生于甲寅年(公元1974年)十一月二十日寅时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,281','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('287','袁','','280','1','乃川','乃川','','','','','客路村','','','','生于癸丑年(公元1973年)四月初三日止','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,280','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('288','袁','','280','2','乃军','乃軍','','候氏','娶韶光市候氏','候氏','客路村','','','','生于乙卯年(公元1975年)九月廿三日','候氏:,
生于丙辰年(公元1976年)九月十三日吉时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,280','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('289','袁','','282','1','乃山','乃山','','宋氏','娶廉江宋氏','宋氏','客路村','299','','','生于己未年(公元1979年)六月初四日卯时','宋氏:,
生于庚申年(公元1980年)七月初四日卯时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,282','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('290','袁','','282','2','乃南','乃南','','钟氏','娶海康钟氏','鍾氏','客路村','300','','','生于辛酉年(公元1981年)八月十三日子时','钟氏:,
生于庚申年(公元1980年)十月十七日卯时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,282','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('291','袁','','282','3','乃平','乃平','','帅氏','娶四川省帅氏','帥氏','客路村','','','','生于癸亥年(公元1983年)十月廿九日子时','帅氏:,
生于甲子年(公元1984年)五月初三日午时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,282','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('292','袁','','278','1','乃彬','乃彬','','','','','客路村','','','','生于辛未年(公元1991年)七月初七日戌时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,275,278','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('293','袁','','278','2','乃鸿','乃鴻','','','','','客路村','','','','生于乙亥年(公元1995年)二月初七日申时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,275,278','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('294','袁','','285','1','昌健','昌健','','','','','客路村','','','','生于庚午年(公元1990年)七月初四日丑时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,281,285','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('295','袁','','285','2','昌伟','昌偉','','','','','客路村','','','','生于壬申年(公元1992年)七月十一日未时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,281,285','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('296','袁','','285','3','昌斌','昌斌','','','','','客路村','','','','生于甲戌年(公元1994年)五月初十日申时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,281,285','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('297','袁','','286','1','昌起','昌起','','','','','客路村','','','','生于壬午年(公元2002年)二月十二日寅时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,281,286','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('298','袁','','286','2','昌涛','昌濤','','','','','客路村','','','','生于辛卯年(公元2011年)二月初一日寅时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,281,286','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('299','袁','','289','1','昌求','昌求','','','','','客路村','','','','生于乙酉年(公元2005年)七月初五日卯时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,282,289','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('300','袁','','290','1','昌迪','昌迪','','','','','客路村','','','','生于乙酉年(公元2005年)九月十八日卯时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,131,276,282,290','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('301','袁','','133','1','公典','公典','','','','','客路村','','','','生于民国丙寅年(1926年)生时失记,
享阳三岁,
卒三月十六日忌辰','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,133','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('302','袁','','133','2','公生','公生','永民','杨氏','','楊氏','客路村','303,304','','','生于民国庚午年(1930年)三月廿七日丑时','杨氏:,
生于民国辛巳年(1941年)七月十四日','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,133','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('303','袁','','302','1','朝明','朝明','','钟氏','娶遂溪银村钟氏生一男','鍾氏','客路村','305','','','生于丙午年(公元1966年)四月三十日','钟氏:,
生于己酉年(公元1969年)十月初一日吉时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,133,302','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('304','袁','','302','2','朝仁','朝仁','','赖氏','海康客路六梅村赖氏生二子','賴氏','客路村','306,307','','','生于辛亥年(公元1971年)六月廿九日','赖氏:,
生于丙辰年(公元1976年)正月廿九日','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,133,302','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('305','袁','','303','1','乃秋','乃秋','','','','','客路村','','','','生于癸酉年(公元1993年)八月廿三日吉时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,133,302,303','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('306','袁','','304','1','乃杰','乃傑','','','','','客路村','','','','生于丙子年(公元1996年)十月廿六日吉时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,133,302,304','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('307','袁','','304','2','乃超','乃超','','','','','客路村','','','','生于庚辰年(公元2000年)三月十一日吉时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,42,56,82,133,302,304','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('308','袁','','57','1','那综','那綜','','','','','客路村','','','','','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,57','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('309','袁','','145','1','永泽','永澤','康泽','王氏','','王氏','客路村','312','','','生于民国壬戌年(1922年)十二月二十日卯时,
享阳七十四岁,
卒乙亥年(公元1995年)十二月初八日巳时,
葬在水厂东北角坡坐西北向东南','王氏:,
生于民国壬戌年(1922年)五月廿四日卯时,
享阳八十七岁,
卒戊子年(公元2008年)七月廿三日午时疾终,
葬在水厂北角坡坐乾向巽','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('310','袁','','145','2','永求','永求','','候氏','','候氏','客路村','316,317,318','','','生于民国戊寅年(1938年)九月十七日辰时,
享阳六十八岁,
卒乙酉年(公元2005年)正月初十日午时,
葬在沙溝(沟)坡坐北向南','候氏:,
生于民国庚辰年(1940年)十月廿二日子时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('311','袁','','145','3','永运','永運','','余氏','娶西岭余氏生三子','餘氏','客路村','323,324,325','','','生于民国壬午年(1942年)四月廿六日子时','余氏:,
生于民国己卯年(1939年)八月廿一日申时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('312','袁','','309','1','朝强','朝強','','周氏','娶那仙周氏','周氏','客路村','313,314,315','','','生于戊戌年(公元1958年)三月廿七日未时','周氏:,
生于丙午年(公元1966年)八月十六日卯时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,309','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('313','袁','','312','1','长子','長子','','','','','客路村','','','','','','','夭逝','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,309,312','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('314','袁','','312','2','乃才','乃才','','','','','客路村','','','','生于己巳年(公元1989年)九月廿七日未时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,309,312','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('315','袁','','312','3','乃富','乃富','','','','','客路村','','','','生于壬申年(公元1992年)三月廿九日酉时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,309,312','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('316','袁','','310','1','朝荣','朝榮','','许氏','娶湖光四桥村许氏生二男','許氏','客路村','319,320','','','生于乙巳年(公元1965年)九月二十日辰时,
卒乙酉年(公元2005年)七月初二日申时,
葬在沙溝(沟)坡下坐北向南兼癸丁','许氏:,
生于己酉年(公元1969年)四月十二日申时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,310','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('317','袁','','310','2','朝能','朝能','','罗氏','娶界炮麻塘上村罗氏','羅氏','客路村','321','','','生于乙卯年(公元1975年)八月廿四日子时','罗氏:,
生于乙卯年(公元1975年)十一月十五日子时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,310','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('318','袁','','310','3','朝华','朝華','','叶氏','娶海康客路上塘村叶氏生一男','葉氏','客路村','322','','','生于戊午年(公元1978年)十月廿三日子时','叶氏:,
生于壬戌年(公元1982年)四月初九日申时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,310','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('319','袁','','316','1','乃君','乃君','','','','','客路村','','','','生于己巳年(公元1989年)二月十三日午时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,310,316','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('320','袁','','316','2','乃俊','乃俊','','','','','客路村','','','','生于丁丑年(公元1997年)二月初七日丑时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,310,316','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('321','袁','','317','1','乃涛','乃濤','','','','','客路村','','','','生于己丑年(公元2009年)四月十五日卯时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,310,317','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('322','袁','','318','1','乃彦','乃彥','','','','','客路村','','','','生于壬辰年(公元2012年)三月廿八日午时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,310,318','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('323','袁','','311','1','朝顺','朝順','','','','','客路村','','','','生于己酉年(公元1969年)二月初七日卯时,
享阳二十六岁,
卒甲戌年(公元1994年)六月十六日亥时,
葬在沙溝(沟)坡坐北向南','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,311','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('324','袁','','311','2','朝利','朝利','','吴氏','娶祝美村吴氏','吳氏','客路村','','','','生于辛亥年(公元1971年)十月十五日卯时','吴氏:,
生于癸丑年(公元1973年)五月十五日未时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,311','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('325','袁','','311','3','朝壮','朝壯','','','','','客路村','','','','生于戊午年(公元1978年)四月初四日卯时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,43,58,85,145,311','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('326','袁','','91','1','杨养','楊養','','吴氏','娶南山吴氏生一子','吳氏','客路村','328','','','生于民国壬子年(1912年)十一月十四日卯时','吴氏:,
生于民国甲寅年(1914年)正月十八日卯时,
另適','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('327','袁','','91','2','杨福','楊福','','吴氏','','吳氏','客路村','329,330','','','生于民国己未年(1919年)十一月廿二日酉时,
卒辛巳年(公元2001年)正月初三日吉时','吴氏:,
生于民国庚申年(1920年)十一月廿九日酉时,
卒乙酉年(公元2005年)六月十八日子时','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('328','袁','','326','1','那赤','那赤','','','','','客路村','','','','二岁跟母别嫁东海','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91,326','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('329','袁','','327','1','永才','永才','','周氏','','周氏','客路村','331,332,333','','','生于民国戊子年(1948年)八月十七日未时','周氏:,
生于乙未年(公元1955年)四月初三日寅时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91,327','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('330','袁','','327','2','永来','永來','来才','翁氏','娶南边洋翁氏生三子','翁氏','客路村','334,335,336','','','生于甲午年(公元1954年)五月初九日,
卒辛卯年十一月初十日,
葬在字房仔园东南向','翁氏:,
生于乙未年(公元1955年)四月十九日寅时','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91,327','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('331','袁','','329','1','朝隆','朝隆','','黄氏','娶云脚村黄氏','黃氏','客路村','','','','生于辛酉年(公元1981年)八月廿七日丑时','黄氏:,
生于甲子年(公元1984年)十一月十六日亥时','','','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91,327,329','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('332','袁','','329','2','朝金','朝金','','','','','客路村','','','','生于癸酉年(公元1993年)二月十三日巳时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91,327,329','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('333','袁','','329','3','三子','三子','','','','','客路村','','','','','','','夭逝','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91,327,329','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('334','袁','','330','1','朝坚','朝堅','','叶氏','娶良丰村叶氏生一男','葉氏','客路村','337','','','生于己未年(公元1979年)二月廿九日未时','叶氏:,
生于甲子年(公元1984年)三月十九日','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91,327,330','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('335','袁','','330','2','朝政','朝政','','','','','客路村','','','','生于','','','待','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91,327,330','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('336','袁','','330','3','朝忠','朝忠','','李氏','娶鹿渚李氏生一男','李氏','客路村','338','','','生于甲子年(公元1984年)十一月初十日酉时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91,327,330','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('337','袁','','334','1','乃浩','乃浩','','','','','客路村','','','','生于己丑年(公元2009年)四月十八日卯时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91,327,330,334','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('338','袁','','336','1','乃锋','乃鋒','','','','','客路村','','','','生于癸未年(公元2003年)三月廿三日辰时','','','','1,2,6,9,14,18,21,23,25,28,29,34,37,44,61,91,327,330,336','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('339','袁','','176','1','昌誉','昌譽','','','','','客路村','','','','生于辛未年(公元1991年)十二月廿八日巳时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,96,135,149,161,176','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('340','袁','','165','1','乃方','乃方','','','','','客路村','','','','生于癸未年(公元2003年)三月廿二日巳时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,153,165','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('341','袁','','182','1','昌聪','昌聰','','','','','客路村','','','','生于丙戌年(公元2006年)二月廿二日','','','待','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,166,182','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('342','袁','','182','2','昌煇','昌煇','','','','','客路村','','','','生于壬辰年(公元2012年)四月初一日子时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,166,182','0','0');
insert into `pu_puus`(`id`,`xing`,`zb`,`sid`,`paixu`,`name`,`fname`,`names`,`qizi`,`qidata`,`fqizi`,`cunzhuan`,`zids`,`xf`,`xz`,`info`,`info2`,`info3`,`txt`,`sids`,`utime`,`atime`) values('343','袁','','184','1','昌斌','昌斌','','','','','客路村','','','','生于辛卯年(公元2011年)十一月十九日未时','','','','1,2,6,9,14,18,21,23,25,28,29,34,38,45,63,97,139,155,166,184','0','0');
