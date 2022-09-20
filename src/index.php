<?php
include_once 'controllers/AccountController.php';
session_start();
$accountController = new AccountController();
$accountController->SignIn();