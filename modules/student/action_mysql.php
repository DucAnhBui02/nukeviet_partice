<?php
 
/**
 * @Project Module Nukeviet 4.x
 * @Author Webvang.vn (hoang.nguyen@webvang.vn)
 * @copyright 2014 J&A.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @createdate 08/10/2014 09:47
 */
if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');
 
 
$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_hocvien";
 
$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_hocvien (
    id MEDIUMINT( 8 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    hoten VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
    ngaysinh MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
    quequan MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
    )ENGINE=MyISAM  DEFAULT CHARSET=utf8";