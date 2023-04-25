<?php
class BeanieFactory
{

    public function create(?array $dbData): Beanie
    {
        $beanie = new Beanie;

        $beanie->setId($dbData['id']);
        $beanie->setName($dbData['name']);
        $beanie->setPath($dbData['pathImg']);
        $beanie->setPrix($dbData['price']);
        $beanie->setDescritpion($dbData['description']);
        if (is_string($dbData['sizes'])) {
            $dbData['sizes'] = json_decode($dbData['sizes']);
        }
        $beanie->setSizes($dbData['sizes']);
        if (is_string($dbData['materials'])) {
            $dbData['materials'] = json_decode($dbData['materials']);
        }
        $beanie->setMaterials($dbData['materials']);

        return $beanie;
    }
}