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
 /**
  
  **/
$post['id'] = $nv_Request->get_int('id', "post,get", 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $post['fullname'] = $nv_Request->get_title('fullname', 'post', ''); 
    $post['email'] = $nv_Request->get_title('email', 'post', ''); 
    $post['phone'] = $nv_Request->get_title('phone', 'post', ''); 
    $post['gender'] = $nv_Request->get_int('gender', 'post', 0); 
    $post['provide'] = $nv_Request->get_int('provide', 'post', 0); 
    $post['district'] = $nv_Request->get_int('district', 'post', 0);
    
    if ($post['fullname'] == '') {
        $error[] = "Chưa nhập name";
    }

    if ($post['email'] == '') {
        $error[] = "Chưa nhập email";
    } else if (!preg_match("/^(.*?)@(.*?)$/", $post['email'])) {
        $error[] = "Email chưa đúng quy tắc";
    }

    if ($post['phone'] == '') {
        $error[] = "Chưa nhập sdt";
    } 
    else if (!preg_match("/(84|0[3|5|7|8|9])+([0-9]{8})\b/", $post['phone'])) {
        $error[] = "Số điện thoại chưa đúng quy tắc";
    }

    if (empty($error)) {
        if($post['id'] > 0) {
            $sql =" UPDATE " . NV_PREFIXLANG . "_samples SET 
            fullname=:fullname,email=:email,phone=:phone,gender=:gender,provide=:provide,district=:district,updatetime=:updatetime WHERE id = " . $post['id'];
            $stmt = $db->prepare($sql);
            $stmt->bindValue('updatetime', 0);
        } else {
            $sql = "INSERT INTO " . NV_PREFIXLANG . "_samples(fullname, email, phone, gender, provide, district, active, addtime, weight) 
            VALUES 
            (:fullname, :email, :phone, :gender, :provide, :district, :active, :addtime, :weight)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue('active', 1);
            $stmt->bindValue('weight', 1);
            $stmt->bindValue('addtime', NV_CURRENTTIME);
        }
        $stmt->bindParam(':fullname', $post['fullname']);
        $stmt->bindParam(':email', $post['email']);
        $stmt->bindParam(':phone', $post['phone']);
        $stmt->bindParam(':gender', $post['gender']);
        $stmt->bindParam(':provide', $post['provide']);
        $stmt->bindParam(':district', $post['district']);
        $exe = $stmt->execute();
        if($exe) {
            if($post['id'] > 0) {
                $error[] = "Update Ok!";
            } else {
                $error[] = "Insert Ok!";
            }
        
        }else {
            $error[] = "Error!";
        }
    }
} else if($post['id'] > 0) {
    $sql = "SELECT * FROM " . NV_PREFIXLANG . "_samples WHERE id = " . $post['id'];
    $post = $db->query($sql)->fetch();
} else {
    $post['fullname'] = ''; 
    $post['email'] = ''; 
    $post['phone'] = ''; 
    $post['gender'] = 3; 
    $post['provide'] = 0; 
    $post['district'] = 0;
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

foreach ($arr_gender as $key => $gender) {
    $xtpl->assign('GENDER', array(
        'key' => $key,
        'title' => $gender,
        "checked" => $key == $post['gender'] ? 'checked = "checked" ' : '',
    ));
    $xtpl->parse('main.gender');
}

foreach ($array_province as $key => $province) {
    $xtpl->assign('PROVINCE', array(
        'key' => $key,
        'title' => $province['title'],
        "selected" => $key == $post['provide'] ? 'selected = "selected" ' : '',
    ));
    $xtpl->parse('main.provide');
}
$xtpl->assign('POST', $post);
if(!empty($error)) {
    $xtpl->assign('ERROR', implode("<br/>", $error));
    $xtpl->parse('main.error');
}

//-------------------------------
// Viết code xuất ra site vào đây
//-------------------------------

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
