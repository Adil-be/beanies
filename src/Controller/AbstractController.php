<?php

namespace Controller;

use PDO;


abstract class AbstractController
{

    protected ?string $pageTitle;
    protected ?string $page;
    protected PDO $db;
    public function __construct($page, $db)
    {
        $this->setPage($page);
        $this->db = $db;

    }

    public function render()
    {
        session_start();
        require_once('include/function.php');

        ob_start();
        $viewParam = $this->getContent();
        $pageTitle = $this->getPageTitle();
        extract($viewParam);

        include 'include/header.php';
        include 'src/View/' . $this->getPage() . '.php';
        include 'include/footer.php';
        ob_end_flush();

    }

    abstract public function getContent();


    public function getPage(): ?string
    {
        return $this->page;
    }


    public function setPage(?string $page): self
    {
        $this->page = $page;
        return $this;
    }


    public function getPageTitle(): ?string
    {
        return $this->pageTitle;
    }


    public function setPageTitle(?string $pageTitle): self
    {
        $this->pageTitle = $pageTitle;
        return $this;
    }
}