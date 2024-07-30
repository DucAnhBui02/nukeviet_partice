<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_ADMIN')) {
    exit('Stop!!!');
}

$submenu['vehicle'] = $lang_module['add'];

if (defined('NV_IS_SPADMIN')) {
    $submenu['vehicle_type'] = $lang_module['vehicle_type_management'];
    $submenu['manage_pickup_vehicles'] = $lang_module['manage_pickup_vehicles'];
    $submenu['statistics_function'] = $lang_module['statistics_function'];
    $submenu['history_detailed'] = $lang_module['history_detailed'];
}
