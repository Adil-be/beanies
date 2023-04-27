<?php

namespace Model;

class Login
{
    const CORRECT_PASSWORD = "12345";
    protected ?string $userName = null;
    protected ?string $password = null;

    protected ?array $errors = [];

    public function __construct()
    {
        if (isset($_SESSION['login'])) {
            $this->userName = trim($_SESSION['login']);
        }
    }

    public function handle($postData)
    {
        if (isset($postData['login']) && isset($postData['password'])) {
            $this->setPassword(($postData['password']));
            $this->setUsername(($postData['login']));

            if ($this->isValid()) {
                $this->save();
                header('Location: ?login=success');
            }
        }
    }
    public function save()
    {
        $_SESSION['login'] = $this->userName;
    }

    public function getUsername(): ?string
    {
        return $this->userName;
    }

    public function setUsername($userName): self
    {
        $this->userName = $userName;
        if (empty($userName) || ctype_space($userName)) {
            $this->errors[] = "username vide";
        }
        return $this;

    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password 
     * @return self
     */
    public function setPassword(?string $password): self
    {

        if (empty($password) || ctype_space($password)) {
            $this->errors[] = "Mot de passe vide";
        }
        $this->password = $password;
        return $this;
    }

    public function isValid()
    {
        if (empty($this->errors)) {
            if ($this->password == self::CORRECT_PASSWORD) {
                return true;
            } else {
                $this->errors[] = "mot de passe incorect";
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @return array|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }
}