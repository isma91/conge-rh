<?php
/**
* Index.php
*
* All ajax request go here and be sended to different Controller
*
* PHP 7.0.28
*
* @category Controller
* @package  Controller
* @author   isma91 <ismaydogmus@gmail.com>
* @license  http://opensource.org/licenses/gpl-license.php GNU Public License
*/
session_start();
require '../autoload.php';
use controller\UserController;
$user = new UserController();
switch ($_POST["action"]) {
    case 'getData':
    $data = $user->getData();
    break;
}