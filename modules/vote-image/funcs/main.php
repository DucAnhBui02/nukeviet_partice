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
$perpage = 5;
$page = $nv_Request->get_int('page', "get", 1);
$keyword = $nv_Request->get_title('keyword', "get", '');

$db->sqlreset()
    ->select('COUNT(*)')
    ->from("nv4_vi_samples")
    ->where("fullname LIKE " . $db->quote('%'.$keyword.'%'));
$sql = $db->sql();
$total = $db->query($sql)->fetchColumn();

$db->select('*')
    ->order('weight ASC')
    ->limit($perpage)
    ->offset(($page - 1) * $perpage);

$sql = $db->sql();
$result = $db->query($sql);

while ($row = $result->fetch()) {
    // $row['url_detail'] = nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . 
    // NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=detail/' . change_alias($row['fullname']) . '-' . $row['id'] . $global_config['rewrite_exturl']);

    $row['url_detail'] = nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . 
    NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=detail&id='. $row['id']);
    $array_data[$row['id']] = $row;
}

$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=list';
if($keyword != '') {
    $base_url .= '$keyword=' . $keyword;
}
$generate_page = nv_generate_page($base_url, $total, $perpage, $page);

$contents = nv_theme_samples_main($array_data, $page, $perpage, $generate_page, $keyword);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
