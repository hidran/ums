    CREATE TABLE `users` (
         
          `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
         
          `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
         
          `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
         
          `fiscalcode` char(16) COLLATE utf8_unicode_ci NOT NULL,
         
          `age` smallint(3) UNSIGNED NOT NULL,
         
          UNIQUE KEY `u_fiscalcode` (`fiscalcode`),
         
        KEY `i_email` (`email`),
        KEY `i_username` (`username`)
         
         
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 
