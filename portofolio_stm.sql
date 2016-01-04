-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.6.26 - MySQL Community Server (GPL)
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table latihan_task_manager.task
CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `task_name` varchar(100) DEFAULT NULL,
  `task_start` datetime,
  `task_end` datetime DEFAULT NULL,
  `is_finish` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table latihan_task_manager.task: ~4 rows (approximately)
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` (`task_id`, `task_name`, `task_start`, `task_end`, `is_finish`, `is_deleted`) VALUES
	(1, 'Repair bug login qbaca1', '2015-11-04 12:46:15', '2015-10-18 18:01:00', 'N', 'Y'),
	(2, 'Repair bug login qbaca2', '2015-11-04 12:45:39', '2015-10-18 18:01:00', 'Y', 'Y'),
	(3, 'Repair bug login qbaca3', '2015-11-04 12:45:00', '2015-11-30 00:00:00', 'N', 'Y'),
	(4, 'Make mozaik web CMS!', '2016-01-02 16:57:44', '2016-01-31 00:00:00', 'N', 'N'),
	(5, 'Make mozaik web CMS! 2', '2015-11-04 12:52:51', '2015-11-30 00:00:00', 'N', 'Y'),
	(6, 'Portofolio Website', '2016-01-02 00:00:00', '2016-01-16 00:00:00', 'N', 'N');
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
