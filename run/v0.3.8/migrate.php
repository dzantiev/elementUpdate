<?php
// migration scripts
$db = $this->di->get('db');
$db->execute(
	"CREATE TABLE `em_tabs` (
		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`table` varchar(200) DEFAULT NULL,
		`name` varchar(200) DEFAULT NULL,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;"
);