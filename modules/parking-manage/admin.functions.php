<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN')) {
    exit('Stop!!!');
}

define('NV_IS_FILE_ADMIN', true);
$allow_func = ['main', 'vehicle', 'vehicle_type'];

/**
 * nv_show_block_vehicle_list()
 *
 * @return
 */
function nv_show_block_vehicle_list()
{
    global $db_slave, $lang_module, $lang_global, $module_name, $module_data, $module_file, $global_config, $module_info;

    $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_type ORDER BY weight ASC';
    $_array_block_cat = $db_slave->query($sql)->fetchAll();
    $num = sizeof($_array_block_cat);
    
    if ($num > 0) {
        $array_adddefault = [
            $lang_global['no'],
            $lang_global['yes']
        ];
        $xtpl = new XTemplate('blockvehicle.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
        $xtpl->assign('LANG', $lang_module);
        $xtpl->assign('GLANG', $lang_global);
        $xtpl->assign('TOTAL', $num);

            foreach ($_array_block_cat as $row) {
                $numnews = $db_slave->query('SELECT COUNT(*) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_block where bid=' . $row['bid'])->fetchColumn();

                $xtpl->assign('ROW', [
                    'bid' => $row['bid'],
                    'weight' => $row['weight'],
                    'title' => $row['title'],
                    'numnews' => $numnews,
                    'link' => NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=block&amp;bid=' . $row['bid'],
                    //'linksite' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $module_info['alias']['groups'] . '/' . $row['alias'],
                    //'url_edit' => NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=groups&amp;bid=' . $row['bid'] . '#edit'
                ]);

                foreach ($array_adddefault as $key => $val) {
                    $xtpl->assign('ADDDEFAULT', [
                        'key' => $key,
                        'title' => $val,
                        'selected' => $key == $row['adddefault'] ? ' selected="selected"' : ''
                    ]);
                    $xtpl->parse('main.loop.adddefault');
                }

                for ($i = 1; $i <= 30; ++$i) {
                    $xtpl->assign('NUMBER', [
                        'key' => $i,
                        'title' => $i,
                        'selected' => $i == $row['numbers'] ? ' selected="selected"' : ''
                    ]);
                    $xtpl->parse('main.loop.number');
                }

                $xtpl->parse('main.loop');
            }
            $xtpl->parse('main');
            $contents = $xtpl->text('main');
    } else {
        $contents = '&nbsp;';
    }
    

    return $contents;
}



