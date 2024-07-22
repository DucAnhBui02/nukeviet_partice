<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 31 Oct 2020 02:20:33 GMT
 */

if (!defined('NV_SYSTEM')) {
    die('Stop!!!');
}
define('NV_IS_MOD_VOTE_IMAGE', true);

$arr_gender = []; 
$arr_gender[1] = 'Nam';
$arr_gender[2] = 'Nữ';
$arr_gender[3] = 'N/A';

$sql = "SELECT id, title FROM `nv4_vi_location_province` ORDER BY weight ASC";
$result = $db->query($sql);
$array_province = [];
while ($province = $result->fetch()) {
    $array_province[$province['id']] = $province;
}