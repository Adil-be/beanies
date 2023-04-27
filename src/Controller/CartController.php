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
        $param = ["total" => null, "cartBeanies" => []];

        $cart = new Cart();
        $isCartModified = $cart->handle($_GET);

        if ($isCartModified) {
            header("Location: ?page=cart");
        }
        if (!empty($cart->getContent())) {
            $total = 0;
            $cartBeanies = [];
            foreach ($cart->getContent() as $id => $quantity) {
                $beanie = getBeanieById($this->db, $id);

                if (empty($beanie)) {
                    continue;
                }
                $cartBeanies[] = ["beanie" => $beanie, "quantity" => $quantity];

                $total += $quantity * $beanie->getPrix();
            }
            $param = ["total" => $total, "cartBeanies" => $cartBeanies];
        }
        return $param;
    }
}