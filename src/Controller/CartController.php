<?php
namespace Controller;

use Model\Cart;
use Service\BeanieFactory;
use PDO;

class CartController extends AbstractController
{


    public function getContent()
    {
        $this->setPageTitle("Panier");

        $param = [];

        $cart = new Cart();
        $isCartModified = $cart->handle($_GET);

        if ($isCartModified) {
            header("Location: ?page=cart");
        }
        if (!empty($cart->getContent())) {
            $total = 0;
            $beanieFactory = new BeanieFactory();
            $cartBeanies = [];
            foreach ($cart->getContent() as $id => $data) {

                $sql = "SELECT * FROM beanies WHERE id=:id";
                $statement = $this->db->prepare($sql);
                $statement->bindValue(":id", $id, PDO::PARAM_INT);
                $success = $statement->execute();
                $result = $statement->fetch();
                $beanie = $beanieFactory->create($result);

                if (empty($beanie)) {
                    continue;
                }
                $cartBeanies[] = ["beanie" => $beanie, "quantity" => $data];
                $Montant = $data * $beanie->getPrix();
                $Montant = number_format($Montant, 2);
                $total += $Montant;

            }
            $param[] = ["total" => $total, "cartBeanies" => $cartBeanies];
        }
        return $param;
    }
}