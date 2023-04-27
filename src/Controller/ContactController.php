<?php
namespace Controller;

use Model\Contact;
use PDO;

class ContactController extends AbstractController
{
    public function getContent()
    {
        $this->setPageTitle("Contact");

        $contact = new Contact($_POST);
        if ($contact->isSubmitted() && $contact->isValid()) {
            $this->setRequestSQL($contact);
        }

        return ["contact" => $contact];
    }
    public function setRequestSQL(Contact $contact)
    {
        $sql = "INSERT INTO contact (sujet, email, message)
        VALUES (:sujet, :email, :message)";

        $statement = $this->db->prepare($sql);
        $statement->bindValue(":sujet", $contact->getSujet(), PDO::PARAM_STR);
        $statement->bindValue(":email", $contact->getEmail(), PDO::PARAM_STR);
        $statement->bindValue(":message", $contact->getMessage(), PDO::PARAM_STR);
        $statement->execute();

    }
}