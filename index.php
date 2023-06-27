<?php
namespace local_moodle_dshboard;

use local_moodle_dshboard\Counter\LoginMethodCounter;

require(__DIR__ . '/../../config.php');

global $DB;

//$user_count=$DB->count_records('user');
//echo "felhasználók száma :" . " " . $user_count . '<br>';
//
//$user_auth_count=$DB->count_records('user', ['auth'=>'manual']);
//echo "száma :" . " " . $user_auth_count . '<br>';
//
//$user_auth_count=$DB->count_records('user', ['auth'=>'shibboleth']);
//echo "száma :" . " " . $user_auth_count;
$sql='SELECT id, auth FROM {user} ';
$user_auth_array=$DB->get_records_sql($sql);

$counter = new LoginMethodCounter();

foreach ($user_auth_array as $key => $value) {
    //echo $value->auth . '<br>';
/*     if ($value->auth === 'manual') {
        $counter->add_manual();
        continue;
     }

    if ($value->auth === 'shibboleth') {
        $counter->add_shibboleth();
        continue;
    }

    $counter->add_other(); */
    switch ($value->auth) {
        case 'manual':
            $counter->add_manual();
            break;
        
        case 'shibboleth':
            $counter->add_shibboleth();
            break;

        default:
            $counter->add_other();
            break;
    }
}

$counter->print();

$counter->purge();

foreach ($user_auth_array as $key => $value) {
    //echo $value->auth . '<br>';
/*     if ($value->auth === 'manual') {
        $counter->add_manual();
        continue;
     }

    if ($value->auth === 'shibboleth') {
        $counter->add_shibboleth();
        continue;
    }

    $counter->add_other(); */
    switch ($value->auth) {
        case 'manual':
            $counter->add_manual();
            break;
        
        case 'shibboleth':
            $counter->add_shibboleth();
            break;

        default:
            $counter->add_other();
            break;
    }
}

$counter->print();

$sql='SELECT id, timeaccess access, userid FROM {user_lastaccess} ';
$user_access_array=$DB->get_records_sql($sql);
$user_access_array = array_values($user_access_array);
$admin = $user_auth_array[reset($user_access_array)->userid];
var_dump($admin);
var_dump($user_access_array);