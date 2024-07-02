<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 31 Oct 2020 02:20:33 GMT
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$page_title = $lang_module['main'];

$post = [];
$error = [];
if ($nv_Request->isset_request('submit', 'post')) {
    $post['fullname'] = $nv_Request->get_title('fullname', 'post', ''); 
    $post['email'] = $nv_Request->get_title('email', 'post', ''); 
    $post['phone'] = $nv_Request->get_title('phone', 'post', ''); 
    $post['gender'] = $nv_Request->get_int('gender', 'post', 0); 
    $post['provide'] = $nv_Request->get_int('provide', 'post', 0); 
    $post['district'] = $nv_Request->get_int('district', 'post', 0);
    
    if ($post['fullname'] != '') {
        $error[] = "Chưa nhập";
    }

    if ($post['email'] != '') {
        $error[] = "Chưa nhập";
    } else if (!preg_match("/^(.*?)@(.*?)$/", $post['email'])) {
        $error[] = "Email chưa đúng quy tắc";
    }

    if ($post['phone'] != '') {
        $error[] = "Chưa nhập";
    } else if (!preg_match("/[0-9]{10|11}/", $post['phone'])) {
        $error[] = "Số điện thoại chưa đúng quy tắc";
    }

    if (!empty($error)) {
        $sql = "INSERT INTO `nv4_vi_samples`(`fullname`, `email`, `phone`, `gender`, `provide`, `district`, `active`, `addtime`, `updatetime`, `weight`) 
        VALUES (:fullname, :email, :phone, :gender, :provide, :district, :active, :addtime, :updatetime, :weight)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("fullname", $post['fullname']);
        $stmt->bindParam("email", $post['email']);
        $stmt->bindParam("phone", $post['phone']);
        $stmt->bindParam("gender", $post['gender']);
        $stmt->bindParam("provide", $post['provide']);
        $stmt->bindParam("district", $post['district']);
        $stmt->bindValue("active", 1);
        $stmt->bindValue("addtime", NV_CURRENTTIME);
        $stmt->bindValue("updatetime", 0);
        $stmt->bindValue("weight", 1);
        $exe = $stmt->execute();
        if($exe) {
            $error[] = "Insert succeeded";
        } else {
            $error[] = "Insert failed";
        }
    }
}

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);
$xtpl->assign('POST', $post);

//-------------------------------
// Viết code xuất ra site vào đây
//-------------------------------

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
