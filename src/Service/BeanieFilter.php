<?php
namespace Service;

class BeanieFilter
{
    protected ?string $material = null;
    protected ?string $size = null;
    protected ?float $minPrice = null;
    protected ?float $maxPrice = null;
    protected ?array $FilteredBeanies = [];

    public function __construct(?array $postData)
    {
        if (isset($postData['material'])) {
            $this->setMaterial($postData['material']);
        }
        if (isset($postData['size'])) {
            $this->setSize($postData['size']);
        }
        if (isset($postData['minPrice'])) {
            $this->setMinPrice(floatval($postData['minPrice']));
        }
        if (isset($postData['maxPrice'])) {
            $this->setMaxPrice(floatval($postData['maxPrice']));
        }

    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(?string $material): self
    {
        $this->material = $material;
        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;
        return $this;
    }

    public function getMinPrice(): ?float
    {
        return $this->minPrice;
    }

    public function setMinPrice(?string $minPrice): self
    {
        $this->minPrice = floatval($minPrice);
        return $this;
    }

    public function getMaxPrice(): ?float
    {
        return $this->maxPrice;
    }

    public function setMaxPrice(?string $maxPrice): self
    {
        $this->maxPrice = floatval($maxPrice);
        return $this;
    }

    public function getFilteredBeanies(): ?array
    {
        return $this->FilteredBeanies;
    }
    public function Filter(?array $objectTab): self
    {
        $this->FilteredBeanies = $objectTab;

        if (!empty($this->material)) {
            $filter = $this->material;
            $this->FilteredBeanies = array_filter(
                $this->FilteredBeanies,
                function ($object) use ($filter) {
                    return (in_array($filter, $object->GetMaterials()));
                }
            );

        }
        if (!empty($this->size)) {
            $filter = $this->size;
            $this->FilteredBeanies = array_filter(
                $this->FilteredBeanies,
                function ($object) use ($filter) {
                    return (in_array($filter, $object->GetSizes()));
                }
            );

        }



        if (!empty($this->maxPrice)) {
            $filter = $this->maxPrice;
            $this->FilteredBeanies = array_filter(
                $this->FilteredBeanies,
                function ($object) use ($filter) {
                    return ($object->getPrix() <= $filter);
                }
            );
        }
        if (!empty($this->minPrice)) {
            $filter = $this->minPrice;
            $this->FilteredBeanies = array_filter(
                $this->FilteredBeanies,
                function ($object) use ($filter) {
                    return ($object->getPrix() >= $filter);
                }
            );
        }
        return $this;
    }


}