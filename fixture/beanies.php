<?php

spl_autoload_register(function ($class) {
    require_once "../classes/$class.php";
});
require_once "../include/config.inc.php";

$beaniesObj = [
    (new Beanie())
        ->setId(1)
        ->setName("Bonnet en laine")
        ->setPrix(10)
        ->setPath("img/beanie1.jpg")
        ->setDescritpion("Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam voluptates labore aut odio aliquid tempore consequatur, nihil doloremque magni,")
        ->setSizes(["S", "L"])
        ->setMaterials(["laine", "coton"]),
    (new Beanie())
        ->setId(2)
        ->setName("Bonnet en laine bio")
        ->setPrix(14)
        ->setPath('img/beanie2.jpg')
        ->setDescritpion("Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio et repellat odit harum sed perspiciatis")
        ->setSizes(["S", "M", "L"])
        ->setMaterials(["laine", "coton"]),
    (new Beanie())
        ->setId(3)
        ->setName("Bonnet en laine et cachemire")
        ->setPath('img/beanie3.jpg')
        ->setPrix(20)
        ->setDescritpion("Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia magnam adipisci temporibus maiores quo id distinctio alias earum voluptatem vitae,")
        ->setSizes(["M", "L"])
        ->setMaterials(["laine", "cachemire"]),
    (new Beanie())
        ->setId(4)
        ->setName("Bonnet arc-en-ciel")
        ->setPath('img/beanie4.jpg')
        ->setPrix(12)
        ->setDescritpion("Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nam reprehenderit veniam aperiam impedit iure delectus,")
        ->setSizes(["S", "XL"])
        ->setMaterials(["soie", "coton"]),
];

$sql = 'INSERT INTO beanies ( name, pathImg, price, description, size, material)
    VALUES ( :name, :pathImg, :price, :description, :size, :material)';

$statement = $db->prepare($sql);

$name = NULL;
$pathImg = NULL;
$price = NULL;
$description = NULL;
$size = NULL;
$material = NULL;

$statement->bindParam(":name", $name, PDO::PARAM_STR);
$statement->bindParam(":pathImg", $pathImg, PDO::PARAM_STR);
$statement->bindParam(":price", $price, PDO::PARAM_INT);
$statement->bindParam(":description", $description, PDO::PARAM_STR);
$statement->bindParam(":size", $size, PDO::PARAM_STR);
$statement->bindParam(":material", $material, PDO::PARAM_STR);


foreach ($beaniesObj as $object) {
    $name = $object->getName();
    $pathImg = $object->getPath();
    $price = $object->getPrix() * 100;
    $description = $object->getDescription();
    $size = json_encode($object->GetSizes());
    $material = json_encode($object->GetMaterials());

    $statement->execute();

}

?>