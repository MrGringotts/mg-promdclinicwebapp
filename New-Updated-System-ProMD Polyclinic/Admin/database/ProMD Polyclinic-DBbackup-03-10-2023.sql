DROP TABLE IF EXISTS appointment_list;

CREATE TABLE `appointment_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(30) NOT NULL,
  `patient_id` int(30) NOT NULL,
  `a_date` varchar(255) NOT NULL,
  `a_time` varchar(125) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= for verification, 1=confirmed,2= reschedule,3=done',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO appointment_list VALUES("8","16","23","2022-03-26","10:00 AM - 11:00 AM","0","2022-03-08 12:50:07"),
("21","23","21","2023-02-16","","2","2022-11-08 07:36:19"),
("25","1","45","2023-02-23","","1","2022-11-08 14:15:28"),
("28","15","46","2023-01-11","09:00 AM - 10:00 AM","1","2023-01-09 17:20:42"),
("31","2","50","2023-01-17","12:30 PM - 01:30 PM","1","2023-01-11 09:30:51"),
("35","2","53","2023-02-06","","0","2023-02-01 14:12:55"),
("38","1","53","2023-02-25","","2","2023-02-01 14:19:49"),
("41","2","53","2023-02-08","","1","2023-02-01 14:24:12"),
("42","15","54","2023-02-02","","3","2023-02-01 17:22:41"),
("43","15","55","2023-02-24","09:00 AM - 10:00 AM","2","2023-02-14 14:15:39"),
("44","2","55","2023-02-23","10:30 AM - 11:30 AM","1","2023-02-14 14:15:54"),
("45","1","55","2023-02-24","10:00 AM - 11:00 AM","2","2023-02-14 14:16:06"),
("46","23","55","2023-02-24","10:00 AM - 11:00 AM","1","2023-02-14 14:16:18"),
("47","1","56","2023-02-20","09:00 AM - 10:00 AM","1","2023-02-20 09:38:35"),
("48","1","51","2023-03-10","08:00 AM - 09:00 AM","1","2023-03-08 13:11:50");



DROP TABLE IF EXISTS doctors_list;

CREATE TABLE `doctors_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `name_pref` varchar(100) NOT NULL,
  `clinic_roomno` text NOT NULL,
  `contact` text NOT NULL,
  `specialty_ids` text NOT NULL,
  `img_path` text NOT NULL,
  `status` int(25) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO doctors_list VALUES("1","Kimberly Sucuajil","M.D.","Room 101","09654251798","[8]","1665964860_274328842_478759197171619_4545047242948647784_n.jpg","0","2021-12-22 16:19:03"),
("2","Ladylyn Napat","M.D.","Room 115","09659874562","[5]","1665965100_napat.jpg","0","2021-12-22 16:20:40"),
("15","Loricharna Ugay","M.D.","Room 103","09066432376","[8,5]","1665964800_287502825_799730014330208_8243885197319510617_n.jpg","0","2021-12-28 15:28:21"),
("23","Mary Joy De Paz","M.D","Room 206","09456987132","[17]","1665965160_depaz.jpg","0","2022-10-17 08:06:55"),
("24","Adrian Martin","","211","asdf","[17]","1673326680_1641217140_Dental.jpg","0","2023-01-10 12:58:20");



DROP TABLE IF EXISTS doctors_schedule;

CREATE TABLE `doctors_schedule` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(30) NOT NULL,
  `day` varchar(20) NOT NULL,
  `f_time_frame` varchar(125) NOT NULL,
  `t_time_frame` varchar(125) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO doctors_schedule VALUES("94","1","Monday","08:00","16:00","08:00:00","09:00:00"),
("95","1","Monday","08:00","16:00","09:00:00","10:00:00"),
("96","1","Monday","08:00","16:00","10:00:00","11:00:00"),
("97","1","Monday","08:00","16:00","11:00:00","12:00:00"),
("98","1","Monday","08:00","16:00","12:00:00","13:00:00"),
("99","1","Monday","08:00","16:00","13:00:00","14:00:00"),
("100","1","Monday","08:00","16:00","14:00:00","15:00:00"),
("101","1","Monday","08:00","16:00","15:00:00","16:00:00"),
("102","1","Wednesday","09:00","15:30","09:00:00","10:00:00"),
("103","1","Wednesday","09:00","15:30","10:00:00","11:00:00"),
("104","1","Wednesday","09:00","15:30","11:00:00","12:00:00"),
("105","1","Wednesday","09:00","15:30","12:00:00","13:00:00"),
("106","1","Wednesday","09:00","15:30","13:00:00","14:00:00"),
("107","1","Wednesday","09:00","15:30","14:00:00","15:00:00"),
("108","1","Wednesday","09:00","15:30","15:00:00","16:00:00"),
("109","1","Friday","07:00","17:00","07:00:00","08:00:00"),
("110","1","Friday","07:00","17:00","08:00:00","09:00:00"),
("111","1","Friday","07:00","17:00","09:00:00","10:00:00"),
("112","1","Friday","07:00","17:00","10:00:00","11:00:00"),
("113","1","Friday","07:00","17:00","11:00:00","12:00:00"),
("114","1","Friday","07:00","17:00","12:00:00","13:00:00"),
("115","1","Friday","07:00","17:00","13:00:00","14:00:00"),
("116","1","Friday","07:00","17:00","14:00:00","15:00:00"),
("117","1","Friday","07:00","17:00","15:00:00","16:00:00"),
("118","1","Friday","07:00","17:00","16:00:00","17:00:00"),
("149","16","Monday","09:00","16:00","09:00:00","10:00:00"),
("150","16","Monday","09:00","16:00","10:00:00","11:00:00"),
("151","16","Monday","09:00","16:00","11:00:00","12:00:00"),
("152","16","Monday","09:00","16:00","12:00:00","13:00:00"),
("153","16","Monday","09:00","16:00","13:00:00","14:00:00"),
("154","16","Monday","09:00","16:00","14:00:00","15:00:00"),
("155","16","Monday","09:00","16:00","15:00:00","16:00:00"),
("156","16","Thursday","08:30","16:00","08:30:00","09:30:00"),
("157","16","Thursday","08:30","16:00","09:30:00","10:30:00"),
("158","16","Thursday","08:30","16:00","10:30:00","11:30:00"),
("159","16","Thursday","08:30","16:00","11:30:00","12:30:00"),
("160","16","Thursday","08:30","16:00","12:30:00","13:30:00"),
("161","16","Thursday","08:30","16:00","13:30:00","14:30:00"),
("162","16","Thursday","08:30","16:00","14:30:00","15:30:00"),
("163","16","Thursday","08:30","16:00","15:30:00","16:30:00"),
("164","16","Saturday","09:00","16:00","09:00:00","10:00:00"),
("165","16","Saturday","09:00","16:00","10:00:00","11:00:00"),
("166","16","Saturday","09:00","16:00","11:00:00","12:00:00"),
("167","16","Saturday","09:00","16:00","12:00:00","13:00:00"),
("168","16","Saturday","09:00","16:00","13:00:00","14:00:00"),
("169","16","Saturday","09:00","16:00","14:00:00","15:00:00"),
("170","16","Saturday","09:00","16:00","15:00:00","16:00:00"),
("196","15","Monday","08:00","15:00","08:00:00","09:00:00"),
("197","15","Monday","08:00","15:00","09:00:00","10:00:00"),
("198","15","Monday","08:00","15:00","10:00:00","11:00:00"),
("199","15","Monday","08:00","15:00","11:00:00","12:00:00"),
("200","15","Monday","08:00","15:00","12:00:00","13:00:00"),
("201","15","Monday","08:00","15:00","13:00:00","14:00:00"),
("202","15","Monday","08:00","15:00","14:00:00","15:00:00"),
("203","15","Wednesday","08:00","14:00","08:00:00","09:00:00"),
("204","15","Wednesday","08:00","14:00","09:00:00","10:00:00"),
("205","15","Wednesday","08:00","14:00","10:00:00","11:00:00"),
("206","15","Wednesday","08:00","14:00","11:00:00","12:00:00"),
("207","15","Wednesday","08:00","14:00","12:00:00","13:00:00"),
("208","15","Wednesday","08:00","14:00","13:00:00","14:00:00"),
("209","15","Friday","08:00","11:00","08:00:00","09:00:00"),
("210","15","Friday","08:00","11:00","09:00:00","10:00:00"),
("211","15","Friday","08:00","11:00","10:00:00","11:00:00"),
("212","23","Tuesday","09:00","13:00","09:00:00","10:00:00"),
("213","23","Tuesday","09:00","13:00","10:00:00","11:00:00"),
("214","23","Tuesday","09:00","13:00","11:00:00","12:00:00"),
("215","23","Tuesday","09:00","13:00","12:00:00","13:00:00"),
("216","23","Thursday","10:00","12:00","10:00:00","11:00:00"),
("217","23","Thursday","10:00","12:00","11:00:00","12:00:00"),
("218","23","Friday","09:00","13:00","09:00:00","10:00:00"),
("219","23","Friday","09:00","13:00","10:00:00","11:00:00"),
("220","23","Friday","09:00","13:00","11:00:00","12:00:00"),
("221","23","Friday","09:00","13:00","12:00:00","13:00:00"),
("244","2","Tuesday","08:30","16:00","08:30:00","09:30:00"),
("245","2","Tuesday","08:30","16:00","09:30:00","10:30:00"),
("246","2","Tuesday","08:30","16:00","10:30:00","11:30:00"),
("247","2","Tuesday","08:30","16:00","11:30:00","12:30:00"),
("248","2","Tuesday","08:30","16:00","12:30:00","13:30:00"),
("249","2","Tuesday","08:30","16:00","13:30:00","14:30:00"),
("250","2","Tuesday","08:30","16:00","14:30:00","15:30:00"),
("251","2","Tuesday","08:30","16:00","15:30:00","16:30:00"),
("252","2","Thursday","07:30","21:00","07:30:00","08:30:00"),
("253","2","Thursday","07:30","21:00","08:30:00","09:30:00"),
("254","2","Thursday","07:30","21:00","09:30:00","10:30:00"),
("255","2","Thursday","07:30","21:00","10:30:00","11:30:00"),
("256","2","Thursday","07:30","21:00","11:30:00","12:30:00"),
("257","2","Thursday","07:30","21:00","12:30:00","13:30:00"),
("258","2","Thursday","07:30","21:00","13:30:00","14:30:00"),
("259","2","Thursday","07:30","21:00","14:30:00","15:30:00"),
("260","2","Thursday","07:30","21:00","15:30:00","16:30:00"),
("261","2","Thursday","07:30","21:00","16:30:00","17:30:00"),
("262","2","Thursday","07:30","21:00","17:30:00","18:30:00"),
("263","2","Thursday","07:30","21:00","18:30:00","19:30:00"),
("264","2","Thursday","07:30","21:00","19:30:00","20:30:00"),
("265","2","Thursday","07:30","21:00","20:30:00","21:30:00"),
("266","2","Saturday","07:30","15:30","07:30:00","08:30:00"),
("267","2","Saturday","07:30","15:30","08:30:00","09:30:00"),
("268","2","Saturday","07:30","15:30","09:30:00","10:30:00"),
("269","2","Saturday","07:30","15:30","10:30:00","11:30:00"),
("270","2","Saturday","07:30","15:30","11:30:00","12:30:00"),
("271","2","Saturday","07:30","15:30","12:30:00","13:30:00"),
("272","2","Saturday","07:30","15:30","13:30:00","14:30:00"),
("273","2","Saturday","07:30","15:30","14:30:00","15:30:00");



DROP TABLE IF EXISTS events;

CREATE TABLE `events` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `event_date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO events VALUES("6","2023-01-22","free check up","","1673326800_1641234300_cardiology.jpg");



DROP TABLE IF EXISTS medical_specialty;

CREATE TABLE `medical_specialty` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `img_path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO medical_specialty VALUES("5","Obstetrician","An obstetrician is  a doctor who specialize in pregnancy and child birth","1641234420_obstertrician.jpg"),
("8","Internal Medicine","Doctors of internal medicine focus on adult medicine and have had special study and training focusing on the prevention and treatment of adult diseases.","1665970020_best-internal-medicine-doctors-in-las-vegas-1536x1022.jpg"),
("17","Pediatrician","A pediatrician is a doctor who focuses on the health of infants, children, adolescents and young adults. Pediatric care starts at birth and lasts through a child’s 21st birthday or longer. Pediatricians prevent, detect and manage physical, behavioral and developmental issues that affect children.","1665970020_Pediatrician.jpg");



DROP TABLE IF EXISTS system_settings;

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `system_settings_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO system_settings VALUES("1","ProMD Polyclinic","promd@gmail.com","*223","1667888340_1667823660_1665966600_310596961_2223796141161345_1198972886419738186_n.jpg","&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;b style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span style=&quot;font-size:18px;text-align: center; background: transparent; position: relative;&quot;&gt;About Us&lt;/span&gt;&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;b style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;History&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTY0MTE4NDE4OCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjkyMjM5LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.075s_YxKZIXSRbMSOuaAlhOfPMIFsRqBD3oJV5Pb8So","126791");



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = secretary, 3 = patient, 4 = doctor',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("1","","Administrator","","","","admin","admin123","1"),
("2","","Husin, Haidhar S","1995-06-09","Sinunuc","09752160829","ching","ching","3"),
("3","","Nurshela B. Omar","1995-10-12","Sinunuc","09559956119","shelang","shelang","3"),
("4","","Nurhaida Canaria","1995-06-27","Mampang","09274725672","jams","jams","3"),
("5","","beast","","","","beast","123","2"),
("6","","Cotelo, Arjoelyn B.","1995-06-06","sinunuc","09752160829","123","123","3"),
("12","15","Loricharna Ugay","","","","ads","1234","4"),
("16","","belle","","","","belle","123","2"),
("17","1","Kimberly Sucuajil","","","","ads1","1234","4"),
("18","2","Ladylyn Napat","","","","ads22","1234","4"),
("21","","amada","2022-01-03","Sinunuc","09659874563","amada","123","3"),
("22","","Antonie ","2022-01-03","Putik","09356987454","antonie","123","3"),
("23","","intet","2000-03-12","Ayala","09879564123","intet","123","3"),
("24","","de paz","","","","de paz","123","2"),
("26","","Rea","","sinunuc","09614583791","rea","123","3"),
("27","","nicole11","","asskdjajdlasd","091238123712","nii","123","3"),
("28","","Hello","","Sinunuc","091238123710","aa","aa","3"),
("36","","pads","","asdasd","09238123122","gasf","123123","3"),
("37","","pads","","askakjsdasdkjkjasd","0123812389","123123","2313223","3"),
("41","","depas","","boalan","09069614618","depaz","123","3"),
("42","23","Mary Joy De Paz","","","","ads123","admin123","4"),
("43","","jhay","","sangali","0987451258","depaz123","123","3"),
("44","","kim","","san roque","0987456231","kim","123","3"),
("45","","Santos","","sangali","09263394576","santos","123","3"),
("46","","charna","","ayala","09066432376","char","1234","3"),
("47","24","Adrian Martin","","","","adsr","1234","4"),
("48","","adrian","","recodo","09576462","adrian","1234","3"),
("49","","marco","","ayala","1233456","marc","1234","3"),
("50","","john","","recodo","55885","john","123","3"),
("51","","jhay","","sangali","09094711351","jhay","1234","3"),
("52","","charna","","ayala","09973864361","charna","1234","3"),
("53","","Celso","","recodo","09066654881","celso","123","3"),
("54","","arvin","","calarian","09354884836","arvin","123","3"),
("55","","Clark","","ayala","09605095222","clark","123","3"),
("56","","Rodel Marquez","","Tumaga","09123456789","rodel","123","3");



