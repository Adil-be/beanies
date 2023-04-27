<?php
namespace Controller;


use Service\BeanieFactory;
use PDO;

class HomeController extends AbstractController
{
    protected ?string $pageTitle = "Chez beanies";

    public function getContent()
    {

        $this->setPageTitle("Chez beanies");

        $sql = 'SELECT * FROM beanies ORDER BY price ASC LIMIT 3';
        $statement = $this->db->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $success = $statement->execute();
        $results = $statement->fetchall();
        $beanies = [];
        $beanieFactory = new BeanieFactory();
        foreach ($results as $beanieData) {
            $beanies[] = $beanieFactory->create($beanieData);
        }

        return [
            "beanies" => $beanies
        ];

    }

}