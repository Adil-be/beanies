<?php
namespace Controller;

use Service\BeanieFactory;
use Service\BeanieFilter;
use Model\Beanie;
use PDO;


class ListController extends AbstractController
{
    protected ?string $pageTitle = "Tous nos beanies";

    protected ?array $fetchResult = [];
    public function getContent()
    {
        $this->setPageTitle("Tous nos Beanies");
        $this->setFetchResult();
        $beanieFactory = new BeanieFactory();
        $beanies = [];

        foreach ($this->getFetchResult() as $beanieData) {
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


    /**
     * @return array|null
     */
    public function getFetchResult(): ?array
    {

        return $this->fetchResult;
    }

    public function setFetchResult(): self
    {
        $sql = 'SELECT * FROM beanies';
        $statement = $this->db->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();
        $results = $statement->fetchall();
        $this->fetchResult = $results;
        return $this;
    }
}