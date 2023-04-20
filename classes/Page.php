<?php
class Page
{
    protected ?string $name = 'home';
    protected ?string $title = 'Chez beanies';

    protected const PAGES_TITLES = [
        'home' => 'Chez beanies',
        'list' => 'tous nos beanies',
        'login' => 'Connection',
        'cart' => 'Panier',
        'contact' => 'nous contacter',
        'logout' => '',
    ];

    protected const AVAILABLE_PAGES = ['home', 'list', 'login', 'cart', 'contact', 'logout'];

    public function __construct(?array $getdata)
    {
        if (isset($getdata['page'])) {
            $this->setName(trim($getdata['page']));
            $this->setTitle(trim($getdata['page']));
        }
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        if (!in_array($name, self::AVAILABLE_PAGES)) {
            $this->name = '404';
            $this->title = 'not found';

        } else {
            $this->name = $name;

        }
        return $this;

    }
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $key): self
    {
        if (array_key_exists($key, self::PAGES_TITLES)) {
            $this->title = self::PAGES_TITLES[$key];
        }
        return $this;
    }
}
?>