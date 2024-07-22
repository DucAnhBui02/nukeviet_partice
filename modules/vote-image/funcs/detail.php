<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 31 Oct 2020 02:20:33 GMT
 */

if (!defined('NV_IS_MOD_VOTE_IMAGE')) {
    die('Stop!!!');
}

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];

$array_data = [];
$array_mod_title[] = [
    'title' => $lang_module['main'],
    'link' => nv_url_rewrite(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . 
    NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=main', true)
];

$id = $nv_Request->get_int('id', 'get', 0);

if($id > 0) {
    $sql = "SELECT * FROM nv4_vi_samples WHERE id = " . $id;
    $result = $db->query($sql);
    if(!$array_data = $result->fetch()) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . 
        NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=main');
    }

    $page_title = $array_data['fullname'];
    $array_mod_title[] = [
        'title' => $array_data['fullname'],
        'link' => nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=detail&amp;id=' . $array_data['id'], true)
    ];
    $array_data['gender'] = !empty($arr_gender[$array_data['gender']]) ? $arr_gender[$array_data['gender']] : '';
    $array_data['address'] = !empty($array_province[$array_data['provide']]) ? $array_province[$array_data['provide']]['title'] : '';
} else {
    nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . 
    NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=main');
}

$contents = nv_theme_samples_detail($array_data);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
