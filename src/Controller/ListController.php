<?php
namespace Controller;

use Service\BeanieFactory;
use Service\BeanieFilter;
use Model\Beanie;
use PDO;


class ListController extends AbstractController
{
    protected ?string $pageTitle = "Tous nos beanies";
    public function getContent()
    {
        $this->setPageTitle("Tous nos Beanies");

        $sql = 'SELECT * FROM beanies';
        $statement = $this->db->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();
        $results = $statement->fetchall();
        $beanieFactory = new BeanieFactory();
        $beanies = [];

        foreach ($results as $beanieData) {
            $beanies[] = $beanieFactory->create($beanieData);
        }
        $beanieFiltered = new BeanieFilter($_POST);
        $beanieFiltered->Filter($beanies);

        $matieres = Beanie::AVAILABLES_MATERIALS;
        $sizes = Beanie::AVAILABLES_SIZES;

        return [
            "beanieFiltered" => $beanieFiltered,
            "matieres" => $matieres,
            "sizes" => $sizes
        ];
    }

}