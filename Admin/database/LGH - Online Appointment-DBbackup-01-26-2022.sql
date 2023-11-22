DROP TABLE IF EXISTS appointment_list;

CREATE TABLE `appointment_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(30) NOT NULL,
  `patient_id` int(30) NOT NULL,
  `a_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= for verification, 1=confirmed,2= reschedule,3=done',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO appointment_list VALUES("1","1","6","2022-01-05","2022-01-05 09:06:00","2","2022-01-02 13:10:27"),
("2","1","21","2022-01-21","2022-01-21 09:06:00","2","2022-01-02 13:10:59"),
("5","1","22","2022-01-03","2022-01-03 14:00:00","2","2022-01-03 13:33:54"),
("7","15","21","2022-02-05","2022-02-05 10:00:00","2","2022-01-04 02:47:46"),
("8","15","23","2022-02-05","2022-02-05 10:00:00","2","2022-01-04 02:48:26"),
("9","15","22","2022-02-05","2022-02-05 10:00:00","2","2022-01-04 02:49:17"),
("10","15","21","2022-01-20","2022-01-20 09:00:00","1","2022-01-04 14:46:34"),
("11","15","21","2022-02-03","2022-02-03 10:00:00","2","2022-01-10 13:59:28"),
("12","15","25","2022-01-25","2022-01-25 08:00:00","2","2022-01-12 17:02:54"),
("14","1","21","2022-01-21","2022-01-21 09:00:00","2","2022-01-12 17:17:04"),
("18","16","21","2022-01-24","2022-01-24 15:00:00","1","2022-01-15 16:37:08"),
("21","16","21","2022-01-31","2022-01-31 09:16:00","1","2022-01-19 14:16:53"),
("24","16","22","2022-01-26","2022-01-26 10:09:00","1","2022-01-24 12:20:00"),
("26","16","21","2022-02-28","2022-02-28 09:00:00","2","2022-01-24 16:06:42"),
("27","2","21","2022-01-26","2022-01-26 10:00:00","0","2022-01-26 12:59:13"),
("28","2","23","2022-01-26","2022-01-26 10:00:00","0","2022-01-26 13:00:38"),
("29","2","22","2022-01-28","2022-01-28 10:00:00","0","2022-01-26 13:01:17"),
("30","2","43","2022-01-31","2022-01-31 10:00:00","2","2022-01-26 16:32:52"),
("31","2","43","2022-02-02","2022-02-02 10:00:00","1","2022-01-26 16:42:53");



DROP TABLE IF EXISTS doctors_list;

CREATE TABLE `doctors_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_pref` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinic_roomno` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty_ids` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(25) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO doctors_list VALUES("1","Nicole Chan","M.D.","Room 101","09752160829","[3,6]","1643121120_nikko.jpg","1","2021-12-22 16:19:03"),
("2","Rea Jane","M.D.","Room 101","09752160829","[1]","1643121180_Rea.jpg","0","2021-12-22 16:20:40"),
("15","Jalen Rose Adriano","M.D.","Room 102","09752160829","[8]","1643121060_jalen.jpg","0","2021-12-28 15:28:21"),
("16","Robert Miles Padua","M.D","Room 1","09752160829","[8]","1643121180_miles.jpg","0","2022-01-01 14:08:22"),
("22","kwak kwak","","13","0129313","[9]","1643121600_doctor.jpg","0","2022-01-25 22:40:05"),
("24","Ferdinand","","69","00941248221","[5]","1643186760_nikko.jpg","0","2022-01-26 16:46:58");



DROP TABLE IF EXISTS doctors_schedule;

CREATE TABLE `doctors_schedule` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(30) NOT NULL,
  `day` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO doctors_schedule VALUES("7","4","Monday","13:00:00","15:00:00"),
("8","4","Tuesday","13:00:00","15:00:00"),
("10","15","Tuesday","08:00:00","16:00:00"),
("11","15","Thursday","09:00:00","16:00:00"),
("12","15","Saturday","08:30:00","16:00:00"),
("13","16","Monday","09:00:00","15:00:00"),
("14","16","Wednesday","08:00:00","13:00:00"),
("15","1","Monday","09:00:00","14:00:00"),
("16","1","Wednesday","09:00:00","14:00:00"),
("17","1","Thursday","08:00:00","15:00:00"),
("18","1","Friday","09:00:00","12:00:00"),
("19","2","Monday","08:00:00","12:00:00"),
("20","2","Wednesday","08:00:00","12:00:00"),
("21","2","Friday","08:00:00","12:00:00"),
("22","2","Sunday","08:00:00","17:00:00");



DROP TABLE IF EXISTS events;

CREATE TABLE `events` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `event_date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO events VALUES("4","2022-02-14","Valentine Day","<span style=\"color: rgb(24, 24, 24); font-family: open-sans, sans-serif; font-size: 18px; letter-spacing: 0.8px;\">Valentine’s Day occurs every February 14. Across the United States and in other places around the world, candy, flowers and gifts are exchanged between loved ones, all in the name of St. Valentine. But who is this mysterious saint and where did these traditions come from? Find out about the history of Valentine’s Day, from the ancient Roman ritual of Lupercalia that welcomed spring to the card-giving customs of Victorian England.</span>","1642065720_valin.jpg"),
("5","2022-01-20","Libreng Tuli","This events will be conducted in Labuan General Hospital. Please Be early ","1642066320_tuli1.jpg");



DROP TABLE IF EXISTS medical_specialty;

CREATE TABLE `medical_specialty` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO medical_specialty VALUES("1","Pediatrics","A pediatrician is a medical doctor who specializes in treating infants, children, adolescents, and young adults.","1641234300_pediatrics.jpg"),
("3","Cardiology","Cardiologists diagnose, assess and treat patients with defects and diseases of the heart and the blood vessels, which are known as the cardiovascular system.","1641234300_cardiology.jpg"),
("4","Orthopaedics","Orthopaedics is the medical specialty that focuses on injuries and deceases of your body musculoskeletal  system ","1641234360_orthopedic.jpg"),
("5","Obstetrician","An obstetrician is  a doctor who specialize in pregnancy and child birth","1641234420_obstertrician.jpg"),
("6","Neurologists","Neurology is the branch of medicine concerned with the study and treatment of disorders of the nervous system.","1641234480_neurology.jpg"),
("8","Internal Medicine","Doctors of internal medicine focus on adult medicine and have had special study and training focusing on the prevention and treatment of adult diseases.","1643041860_internal.png"),
("9","Dental","Dental or oral health is concerned with your teeth, gums and mouth. The goal is to prevent complications such as tooth decay (cavities) and gum disease and to maintain the overall health of your mouth.","1641217140_Dental.jpg"),
("17","surgeon","cure","1643187240_nikko.jpg");



DROP TABLE IF EXISTS system_settings;

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO system_settings VALUES("1","LGH - Online Appointment","labuangeneralhospital@gmail.com","*911","1641233700_hospital_week_upload.jpg","&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;b style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span style=&quot;font-size:18px;text-align: center; background: transparent; position: relative;&quot;&gt;About Us&lt;/span&gt;&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;b style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;History&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;Labuan Public Hospital was Created under&lt;/span&gt;&lt;span style=&quot;box-sizing: inherit; color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254); line-height: normal;&quot;&gt;&amp;nbsp;&amp;nbsp;&lt;/span&gt;&lt;span lang=&quot;EN-GB&quot; style=&quot;box-sizing: inherit; color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254);&quot;&gt;Section 40 of PD 1177 as amended&amp;nbsp;&lt;/span&gt;&lt;span lang=&quot;EN-GB&quot; style=&quot;box-sizing: inherit; color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254); text-indent: -0.25in;&quot;&gt;No. 29 dated December 5, 1975, BP Blg. 517 - Act Establishing 10 Bed Capacity Infirmary Hospital in Labuan, Z.C. Labuan Public Hospital is Extension Hospital of the Zamboanga Regional Hospital now known as Zamboanga City Medical Center, About 35KM along the West Coast of Zamboanga City.&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254);&quot;&gt;It has a land area&lt;/span&gt;&lt;span style=&quot;box-sizing: inherit; color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254); line-height: normal;&quot;&gt;&amp;nbsp; of&amp;nbsp;&lt;/span&gt;&lt;span lang=&quot;EN-GB&quot; style=&quot;box-sizing: inherit; color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254); text-indent: -0.25in;&quot;&gt;5,000 sq. meter and Floor area 602.25 sq. meter, the edipies was created on 1980&rsquo;s and formaly open to Public on Novermber 14, 1984.&lt;/span&gt;&lt;br style=&quot;text-align: left; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span lang=&quot;EN-GB&quot; style=&quot;box-sizing: inherit; color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254); text-indent: -0.25in;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;b style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;Vision&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span style=&quot;color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; text-align: start; background-color: rgb(254, 254, 254);&quot;&gt;A premier hospital in the west coast area of Zamboanga City that is dedicated to advancing the health of the people through accessible, affordable, quality health care and employee commitment.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span style=&quot;color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; text-align: start; background-color: rgb(254, 254, 254);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span style=&quot;color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; text-align: start; background-color: rgb(254, 254, 254);&quot;&gt;&lt;b style=&quot;color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; text-align: start; background-color: rgb(254, 254, 254);&quot;&gt;Mission&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span style=&quot;color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; text-align: start; background-color: rgb(254, 254, 254);&quot;&gt;To provide a prompt, quality, accessible, equitable, cost effective, sustainable and responsive hospital care services.&lt;/span&gt;&lt;span style=&quot;color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; text-align: start; background-color: rgb(254, 254, 254);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTY0MTE4NDE4OCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjkyMjM5LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.075s_YxKZIXSRbMSOuaAlhOfPMIFsRqBD3oJV5Pb8So","126791");



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=admin , 2 = secretary, 3 = patient, 4 = doctor',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("1","","Administrator","","","","admin","admin123","1"),
("2","","Husin, Haidhar S","1995-06-09","Sinunuc","09752160829","ching","ching","3"),
("3","","Nurshela B. Omar","1995-10-12","Sinunuc","09559956119","shelang","shelang","3"),
("4","","Nurhaida Canaria","1995-06-27","Mampang","09274725672","jams","jams","3"),
("5","","Secretary","","","","Secretary","123","2"),
("6","","Cotelo, Arjoelyn B.","1995-06-06","sinunuc","09752160829","123","123","3"),
("12","15","Jalen Rose Adriano","","","","ads","ads1","4"),
("16","","JC","","","","JCs","123","2"),
("17","1","Nicole Chan","","","","ads1","ads1","4"),
("18","2","Rea Jane","","","","ads22","ads22","4"),
("20","16","Robert Miles Padua","","","","ads3","ads3","4"),
("21","","nicole","2022-01-03","Upper","09974409963","Nikko","123123","3"),
("22","","Miles","2022-01-03","Canelar","09278255005","miles","123","3"),
("23","","Jalen","2000-03-12","Labuan","09758692965","Jalen","123","3"),
("24","","Chan","","","","Chan","123","2"),
("25","","celso Lobree","","labuanaaas","09066654881","cels","123456","3"),
("26","","Rea","","sinunuc","09614583791","rea","123","3"),
("27","","nicole11","","asskdjajdlasd","091238123712","nii","123","3"),
("28","","Hello","","Sinunuc","091238123710","aa","aa","3"),
("36","","pads","","asdasd","09238123122","gasf","123123","3"),
("37","","pads","","askakjsdasdkjkjasd","0123812389","123123","2313223","3"),
("41","22","kwak kwak","","","","kwak","123","4"),
("43","","Belyn Engera","","Labuan","09173193379","belyn","123123","3"),
("44","24","Ferdinand","","","","ferdinan","123123","4");



