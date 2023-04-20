<?php

class Contact
{

    protected ?string $sujet = null;
    protected ?string $email = null;
    protected ?string $message = null;
    protected ?array $errors = [];

    public function __construct(?array $postData)
    {
        if (isset($postData['email'])) {
            $this->setEmail($postData['email']);
        }

        if (isset($postData['sujet'])) {
            $this->setSujet($postData['sujet']);
        }
        if (isset($postData['message'])) {
            $this->setMessage($postData['message']);
        }

    }

    public function setSujet($value)
    {

        $this->sujet = $value;
        if (empty($this->sujet)) {
            $this->errors[] = "sujet ne doit pas etre vide";
        } elseif (ctype_space($this->sujet)) {
            $this->errors[] = "sujet ne doit pas etre vide";
        }

        return $this;
    }
    public function setEmail($value)
    {

        $this->email = $value;
        if (empty($this->email) || ctype_space($this->email)) {
            $this->errors[] = "l'email doit etre non vide";
        } elseif (!filter_var(($this->email), FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "l'email doit etre au format test@test.test";
        }

        return $this;
    }
    public function setMessage($value)
    {

        $this->message = $value;
        if (empty($this->email) || ctype_space($this->email)) {
            $this->errors[] = "le message doit etre non vide";
        } elseif (strlen($this->email) < 15) {
            $this->errors[] = "le message est trop court";
        }

        return $this;
    }
    public function getSujet()
    {
        return $this->sujet;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function getErrors()
    {
        return $this->errors;
    }

    public function isSubmitted()
    {
        if (!empty($this->getEmail()) || !empty($this->getMessage()) || !empty($this->getSujet())) {
            return true;
        } else {
            return false;
        }
    }
    public function isValid()
    {
        if (empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }

}

?>