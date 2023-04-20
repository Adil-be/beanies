<?php

class Cart
{

    protected $content = [];

    public function __construct()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $this->content = $_SESSION['cart'];
    }


    public function add(?int $id)
    {
        if (!isset($this->content[$id])) {
            $this->content[$id] = 0;
        }
        $this->content[$id]++;

        $this->save();
        return $this;
    }
    public function minus(?int $id)
    {
        if (isset($this->content[$id])) {
            $this->content[$id]--;
            if ($this->content[$id] <= 0)
                unset($this->content[$id]);
        }

        $this->save();
        return $this;
    }
    public function delete(?int $id)
    {
        if (isset($this->content[$id])) {
            unset($this->content[$id]);
        }

        $this->save();
        return $this;
    }

    public function empty()
    {
        $this->content = [];
        $this->save();
    }

    public function save()
    {
        $_SESSION['cart'] = $this->content;
    }

    public function handle(?array $getData)
    {

        if (isset($getData['id'])) {

            $id = $getData['id'];

            $action = 'add';
            if (isset($getData['action'])) {

                $action = $getData['action'];
            }

            switch ($action) {
                case 'add':
                    $this->add($id);
                    break;
                case 'remove':
                    $this->minus($id);
                    break;
                case 'delete':
                    $this->delete($id);
                    break;
            }

            $this->save();
            return true;

        } elseif (!isset($getData['id']) && isset($getData['action']) && $getData['action'] == "empty") {
            $this->empty();
            $this->save();
            return true;
        }
        return false;
    }



    public function getContent()
    {
        return $this->content;
    }
}