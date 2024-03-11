SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `form_entries` (
  `id` int(11) NOT NULL,
  `visit_id` int(11) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `form` varchar(255) DEFAULT NULL,
  `form_data` text NOT NULL,
  `csrf_token` varchar(35) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `user_agent` text NOT NULL,
  `fingerprint` varchar(255) NOT NULL,
  `cookie_id` varchar(100) NOT NULL,
  `ip_address` varchar(25) NOT NULL,
  `screen_info` varchar(250) DEFAULT NULL,
  `data` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `visits` (
  `id` int(11) NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



ALTER TABLE `form_entries`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `form_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

ALTER TABLE `visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
