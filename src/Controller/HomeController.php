<?php
namespace Controller;


use Service\BeanieFactory;
use PDO;

class HomeController extends AbstractController
{
    protected ?string $pageTitle = "Chez beanies";

    protected ?array $fetchResult = [];

    public function getContent()
    {

        $this->setPageTitle("Chez beanies");
        $this->setFetchResult();
        $beanies = [];
        $beanieFactory = new BeanieFactory();
        foreach ($this->getFetchResult() as $beanieData) {
            $beanies[] = $beanieFactory->create($beanieData);
        }
        return [
            "beanies" => $beanies
        ];

    }

    public function getFetchResult(): ?array
    {
        return $this->fetchResult;
    }

    public function setFetchResult(): self
    {

        $sql = 'SELECT * FROM beanies ORDER BY id ASC LIMIT 4';
        $statement = $this->db->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $success = $statement->execute();
        $results = $statement->fetchall();
        $this->fetchResult = $results;
        return $this;
    }
}