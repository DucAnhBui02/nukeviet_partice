<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 31 Oct 2020 02:20:33 GMT
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

$module_version = [
    'name' => 'Vote-image',
    'modfuncs' => 'main,detail,search',
    'change_alias' => 'main,detail,search',
    'submenu' => 'main,detail,search',
    'is_sysmod' => 0,
    'virtual' => 1,
    'version' => '4.5.05',
    'date' => 'Friday, March 22, 2024 4:00:00 PM GMT+07:00',
    'author' => 'VINADES.,JSC <contact@vinades.vn>',
    'note' => '',
    'uploads_dir' => [
        $module_upload
    ],
];
