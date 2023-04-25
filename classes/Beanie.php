<?php
class Beanie
{
    const AVAILABLES_SIZES = ['XS', 'S', 'M', 'L', 'XL'];
    const AVAILABLES_MATERIALS = ['laine', 'soie', 'coton', 'cachemire'];

    protected ?int $id;
    protected ?string $name;
    protected ?string $pathImg;
    protected float $price = 0.0;
    protected ?string $description;
    protected ?array $size = [];
    protected ?array $material = [];


    public function getAvailableSize()
    {
        return self::AVAILABLES_SIZES;
    }
    public function getAvailableMaterials()
    {
        return self::AVAILABLES_MATERIALS;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPath()
    {
        return $this->pathImg;
    }
    public function getPrix()
    {
        return $this->price;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function setName(string $text)
    {
        $this->name = $text;
        return $this;
    }
    public function setPath(string $text)
    {
        $this->pathImg = $text;
        return $this;
    }
    public function setPrix(float $number)
    {
        $this->price = $number / 100;
        return $this;
    }
    public function setDescritpion(string $text)
    {
        $this->description = $text;
        return $this;
    }

    public function GetSizes()
    {
        if ($this->size)
            return $this->size;
    }
    public function setSizes(array $sizes)
    {
        $tab = array_filter($sizes, function ($size) {
            return in_array($size, Beanie::AVAILABLES_SIZES);
        });
        $this->size = $tab;
        return $this;
    }
    public function GetMaterials()
    {
        return $this->material;
    }
    public function setMaterials(array $materials)
    {
        $tab = array_filter($materials, function ($material) {
            return in_array($material, Beanie::AVAILABLES_MATERIALS);
        });
        $this->material = $tab;
        return $this;
    }
}
?>