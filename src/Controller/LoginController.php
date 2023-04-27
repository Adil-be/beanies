<?php
namespace Controller;

use Model\Login;

class LoginController extends AbstractController
{
    protected ?string $password = "12345";
    public function getContent()
    {
        $this->setPageTitle("Connexion");
        $login = new Login;
        $login->handle($_POST);

        return ["login" => $login];
    }
}