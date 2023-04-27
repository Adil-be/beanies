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

            $sql = "INSERT INTO contact (sujet, email, message)
            VALUES (:sujet, :email, :message)";

            $statement = $this->db->prepare($sql);

            $sujet = $contact->getSujet();
            $email = $contact->getEmail();
            $message = $contact->getMessage();

            $statement->bindParam(":sujet", $sujet, PDO::PARAM_STR);
            $statement->bindParam(":email", $email, PDO::PARAM_STR);
            $statement->bindParam(":message", $message, PDO::PARAM_STR);

            $statement->execute();
        }

        return ["contact" => $contact];
    }
}