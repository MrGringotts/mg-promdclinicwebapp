DROP TABLE IF EXISTS appointment_list;

CREATE TABLE `appointment_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(30) NOT NULL,
  `patient_id` int(30) NOT NULL,
  `a_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= for verification, 1=confirmed,2= reschedule,3=done',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO appointment_list VALUES("1","1","6","2022-01-05","2022-01-05 09:06:00","2","2022-01-02 13:10:27"),
("2","1","2","2022-01-14","2022-01-14 09:06:00","2","2022-01-02 13:10:59"),
("3","1","3","2022-01-05","2022-01-05 09:09:00","0","2022-01-02 13:11:40"),
("4","2","21","2022-01-10","2022-01-10 08:00:00","1","2022-01-03 13:03:40"),
("5","1","22","2022-01-03","2022-01-03 14:00:00","2","2022-01-03 13:33:54"),
("6","2","23","2022-01-05","2022-01-05 08:00:00","1","2022-01-03 14:01:03"),
("7","15","21","2022-01-18","2022-01-18 11:00:00","2","2022-01-04 02:47:46"),
("8","15","23","2022-01-18","2022-01-18 11:00:00","2","2022-01-04 02:48:26"),
("9","15","22","2022-01-18","2022-01-18 11:00:00","2","2022-01-04 02:49:17"),
("10","15","21","2022-01-13","2022-01-13 09:00:00","1","2022-01-04 14:46:34"),
("11","15","21","2022-01-15","2022-01-15 09:00:00","1","2022-01-10 13:59:28"),
("12","15","25","2022-01-25","2022-01-25 08:00:00","1","2022-01-12 17:02:54"),
("13","15","21","2022-01-20","2022-01-20 09:00:00","0","2022-01-12 17:15:14"),
("14","1","21","2022-01-17","2022-01-17 09:00:00","1","2022-01-12 17:17:04");



DROP TABLE IF EXISTS doctors_list;

CREATE TABLE `doctors_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_pref` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinic_roomno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty_ids` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(25) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO doctors_list VALUES("1","Haidhar S. Husin","M.D.","Room 101","09752160829","[3,6]","1641949980_doctor.jpg","0","2021-12-22 16:19:03"),
("2","Nurshela B. Omar","M.D.","Room 101","09752160829","[5,4,1]","1641949980_doctor.jpg","0","2021-12-22 16:20:40"),
("15","Hello Husin","M.D.","Room 101","09752160829","[8]","1641234780_doctor.jpg","0","2021-12-28 15:28:21"),
("16","Faidhar S. Husin","M.D","Room 1","09752160829","[8]","1641234840_doctor.jpg","0","2022-01-01 14:08:22");



DROP TABLE IF EXISTS doctors_schedule;

CREATE TABLE `doctors_schedule` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(30) NOT NULL,
  `day` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO doctors_schedule VALUES("1","1","Monday","09:00:00","14:00:00"),
("2","1","Wednesday","09:00:00","14:00:00"),
("3","1","Friday","09:00:00","12:00:00"),
("4","2","Monday","08:00:00","12:00:00"),
("5","2","Wednesday","08:00:00","12:00:00"),
("6","2","Friday","08:00:00","12:00:00"),
("7","4","Monday","13:00:00","15:00:00"),
("8","4","Tuesday","13:00:00","15:00:00"),
("9","16","Saturday","08:00:00","16:00:00"),
("10","15","Tuesday","08:00:00","16:00:00"),
("11","15","Thursday","09:00:00","16:00:00"),
("12","15","Saturday","08:30:00","16:00:00");



DROP TABLE IF EXISTS events;

CREATE TABLE `events` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `event_date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO events VALUES("1","2022-01-12","Hello","jahsjdhsakjdhakjshdkjahsdkjhaskjdhaskhdsad","1641793560_cardiology.jpg"),
("2","2022-01-12","Lop","jjjjjhfhjjhhhjyjyjyj","1641794460_Dental.jpg");



DROP TABLE IF EXISTS medical_specialty;

CREATE TABLE `medical_specialty` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO medical_specialty VALUES("1","Pediatrics","1641234300_pediatrics.jpg"),
("3","Cardiology","1641234300_cardiology.jpg"),
("4","Orthopaedics","1641234360_orthopedic.jpg"),
("5","Obstetrician/gynecologists","1641234420_obstertrician.jpg"),
("6","Neurologists","1641234480_neurology.jpg"),
("8","Internal Medicine","1641234480_internal med.jpg"),
("9","Dental","1641217140_Dental.jpg");



DROP TABLE IF EXISTS system_settings;

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO system_settings VALUES("1","LGH - Online Appointment","labuangeneralhospital@gmail.com","*911","1641233700_hospital_week_upload.jpg","&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;ABOUT US&lt;/span&gt;&lt;/p&gt;&lt;blockquote style=&quot;margin: 0 0 0 40px; border: none; padding: 0px;&quot;&gt;&lt;p style=&quot;text-align: center; font-weight: 400; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;/blockquote&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTY0MTE4NDE4OCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjkyMjM5LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.075s_YxKZIXSRbMSOuaAlhOfPMIFsRqBD3oJV5Pb8So","126791");



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=admin , 2 = secretary, 3 = patient, 4 = doctor',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("1","","Administrator","","","","admin","admin123","1"),
("2","","Husin, Haidhar S","1995-06-09","Sinunuc","09752160829","ching","ching","3"),
("3","","Nurshela B. Omar","1995-10-12","Sinunuc","09559956119","shelang","shelang","3"),
("4","","Nurhaida Canaria","1995-06-27","Mampang","09274725672","jams","jams","3"),
("5","","Juldemar Capillan","","","","JC","123","2"),
("6","","Cotelo, Arjoelyn B.","1995-06-06","sinunuc","09752160829","123","123","3"),
("12","15","Hello Husin","","","","ads","ads","4"),
("16","","JC","","","","JCs","123","2"),
("17","1","Haidhar S. Husin","","","","ads1","ads1","4"),
("18","2","Nurshela B. Omar","","","","ads22","ads22","4"),
("20","16","Faidhar S. Husin","","","","ads3","ads3","4"),
("21","","nicole","2022-01-03","Upper","09974409963","Nikko","123123","3"),
("22","","Miles","2022-01-03","Canelar","09278255005","miles","123","3"),
("23","","Jalen","2000-03-12","Labuan","09758692965","Jalen","123","3"),
("24","","Chan","","","","Chan","123","2"),
("25","","cels","2006-05-12","labuan","09066654881","cels","123","3");



