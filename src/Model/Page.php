<?php

namespace Model;

use Controller\HomeController;
use Controller\ListController;
use Controller\LoginController;
use Controller\LogoutController;
use Controller\NotFoundController;
use Controller\CartController;
use Controller\ContactController;

class Page
{
    protected ?string $name = 'Home';
    protected ?string $controller = HomeController::class;

    protected const AVAILABLE_PAGES = [
        'home' => HomeController::class,
        'list' => ListController::class,
        'login' => LoginController::class,
        'cart' => CartController::class,
        'contact' => ContactController::class,
        'logout' => LogoutController::class
    ];

    public function __construct(?array $getdata)
    {
        if (isset($getdata['page'])) {
            $this->pageHandler(trim($getdata['page']));
        }
    }

    public function getController(): ?string
    {
        return $this->controller;
    }

    public function setController(?string $pageClass): self
    {
        $this->controller = $pageClass;
        return $this;

    }


    public function getName(): ?string
    {
        return $this->name;
    }


    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function pageHandler($page)
    {
        if (!array_key_exists($page, self::AVAILABLE_PAGES)) {
            $this->controller = NotFoundController::class;
            $this->name = '404';

        } else {
            $this->controller = self::AVAILABLE_PAGES[$page];
            $this->setName($page);
            $this->setController(self::AVAILABLE_PAGES[$page]);

        }
        return $this;

    }
}