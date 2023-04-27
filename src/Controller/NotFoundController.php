<?php
namespace Controller;

class NotFoundController extends AbstractController
{
    public function getContent()
    {
        $this->setPageTitle("404");

        return [];
    }
}