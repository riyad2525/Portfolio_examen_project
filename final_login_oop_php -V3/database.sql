/*
Cheak out the file: dbh.classes.php  on line 9 for database name ("ooplogin").

Create this 2 tabels below with DB Name: "ooplogin" . 

TABLE: Users

CREATE TABLE `users` (
 `users_id` int(11) NOT NULL AUTO_INCREMENT,
 `users_uid` tinytext NOT NULL,
 `users_pwd` longtext NOT NULL,
 `users_email` tinytext NOT NULL,
 PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

TABLE: Profiels

CREATE TABLE `profiles` (
 `profiles_id` int(11) NOT NULL AUTO_INCREMENT,
 `profiles_about` text NOT NULL,
 `profiles_introtitle` text NOT NULL,
 `profiles_introtext` text NOT NULL,
 `users_id` int(11) DEFAULT NULL,
 PRIMARY KEY (`profiles_id`),
 KEY `users_id` (`users_id`),
 CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

*/