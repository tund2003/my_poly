<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

require './Core/Database.php';
require './app/Models/BaseModel.php';
require './app/Controllers/BaseController.php';
require './helpers/view.php';
require './helpers/currentUrl.php';
require './helpers/priceFormat.php';
require './helpers/handleImage.php';
require './helpers/getUrl.php';
require './helpers/loadUser.php';
require './helpers/css.php';
require './configs/routes.php';
require './Core/Route.php';
require './app/App.php';

if (isset($_SESSION["auth"])) {
    $loadUser = new loadUser;
    $GLOBALS['userInfo'] = $loadUser->loadUser($_SESSION["auth"]['id']);
}
if (isset($_SESSION["admin"])) {
    $loadUser = new loadUser;
    $GLOBALS['adminInfo'] = $loadUser->loadAdmin($_SESSION["admin"]['id']);
}

$app = new App();