<?php
/**
 * @Author: Jad
 * @Date:   2016-12-20 16:47:58
 * @Last Modified by:   Adil Jad Allah Eddib
 * @Last Modified time: 2016-12-26 12:08:58
 */

include 'config/credentials.php';
include 'vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $db_host,
    'database'  => $db_name,
    'username'  => $db_user,
    'password'  => $db_password,
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => ''
]);

$capsule->bootEloquent();

?>