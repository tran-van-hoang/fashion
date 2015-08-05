CREATE DATABASE IF NOT EXISTS `fashion_live` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
CREATE DATABASE IF NOT EXISTS `fashion_dev` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
CREATE DATABASE IF NOT EXISTS `fashion_testing` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

CREATE USER 'fashion_live'@'localhost' IDENTIFIED BY 'fashion_live';
CREATE USER 'fashion_dev'@'localhost' IDENTIFIED BY 'fashion_dev';
CREATE USER 'fashion_testing'@'localhost' IDENTIFIED BY 'fashion_testing';

GRANT ALL PRIVILEGES ON fashion_live.* TO 'fashion_live'@'%' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON fashion_dev.* TO 'fashion_dev'@'%' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON fashion_testing.* TO 'fashion_testing'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;