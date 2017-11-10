<?php
// migration scripts
$db = $this->di->get('db');
$db->execute(
    "CREATE TABLE IF NOT EXISTS `em_views` (
		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`name` varchar(100) DEFAULT NULL,
		`table` varchar(200) NOT NULL DEFAULT '',
		`type` varchar(10) NOT NULL DEFAULT '',
		`filter` text,
		`sort` text,
		`columns` text,
		`default` int(11) DEFAULT NULL,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	ALTER TABLE `em_types` ADD COLUMN `hidden` int(11) DEFAULT NULL AFTER `settings`;"
);