<?php
// migration scripts
$db = $this->di->get('db');
$db->execute(
	"ALTER TABLE `em_names` ADD COLUMN `tab` int(11) DEFAULT NULL, AFTER `show`;"
);