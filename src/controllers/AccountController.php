<?php

use JetBrains\PhpStorm\NoReturn;

class AccountController
{

    public function __construct()
    {
    }

    #[NoReturn] public function SignIn(): void
    {
        if (!isset($_SESSION["session_usr"])):
            header('Location: d0/Account/Signin.php');
        else:
            header('Location: d0/Error/Page404.php');
        endif;
        die();
    }

    public function SignOut(): string {
        @session_start();
        session_destroy();
        return 'index.php';
    }
}