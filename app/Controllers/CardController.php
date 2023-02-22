<?php

namespace App\Controllers;

use App\Models\Card;

class CardController extends CoreController
{
    public function read(int $id)
    {
        $card = Card::find($id);
    
        $this->show( "single", [
            "card"  => $card,
        ] );
    }

    public function form(?int $id = null) 
    {
        if ($id !== null) {
            $card = Card::find($id);

            if ($card === false) {
                http_response_code( 404 );
                exit( "404 Not Found" );
            }
        }

        $this->displayForm(
            $id !== null ? $card : null
        );
    }

    public function record(?int $id = null)
    {
        global $router;

        $civility = trim($_POST["civility"] ?? '');
        $lname = trim(htmlspecialchars($_POST["lname"] ?? ''));
        $fname = trim(htmlspecialchars($_POST["fname"] ?? ''));
        $address = trim(htmlspecialchars($_POST["address"] ?? ''));
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_VALIDATE_INT);
        $city = trim(htmlspecialchars($_POST["city"] ?? ''));
        $country = trim(htmlspecialchars($_POST["country"] ?? ''));
        $birthdate = trim($_POST["birthdate"] ?? '');
        $phone = filter_input(INPUT_POST, 'phone');
        $fax = filter_input(INPUT_POST, 'fax');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);

        $errors = self::checkInputs(
            $civility,
            $lname,
            $fname,
            $address,
            $zipcode,
            $city,
            $country,
            $birthdate,
            $phone,
            $fax,
            $email,
            $url,
        );

        $card = $id === null ? new Card() : Card::find($id);
        $card->setCivility($civility);
        $card->setLastname($lname);
        $card->setFirstname($fname);
        $card->setAddress($address);
        $card->setZipcode($zipcode);
        $card->setCity($city);
        $card->setCountry($country);
        $card->setBirthdate($birthdate);
        $card->setPhone($phone);
        $card->setFax($fax);
        $card->setEmail($email);
        $card->setUrl($url); 

        if (empty($errors)){
            if ($card->save()) {
                if ($id === null) {
                    header('Location: '. $router->generate('main-home'));
                }
                else {
                    header('Location: '. $router->generate('card-read', ['id' => $card->getId()]));
                }
            }
            else {
                $errors[] = "La sauvegarde a échoué";
            }
        }

        if (!empty($errors)) {
            $this->displayForm($card, $errors);
        }

    }

    private function displayForm(?Card $card = null, array $errors = []) {
        $this->show("record", [
            'card' => $card ?? new Card(),
            'errors' => $errors,
        ]);
    }
    
    /**
     * @param mixed $civility
     * @param mixed $lname
     * @param mixed $fname
     * @param mixed $address
     * @param mixed $zipcode
     * @param mixed $city
     * @param mixed $country
     * @param mixed $birthdate
     * @param mixed $phone
     * @param mixed $fax
     * @param mixed $email
     * @param mixed $url
     *
     * @return string[]
     */
    private static function checkInputs(
        $civility,
        $lname,
        $fname,
        $address,
        $zipcode,
        $city,
        $country,
        $birthdate,
        $phone,
        $fax,
        $email,
        $url
    ): array 
    {

        $errors = [];

        if (empty($civility)) {
            $errors[] = 'Le civilité est vide';
        }

        if ($lname === false) {
            $errors[] = 'Le nom est invalide';
        }

        if ($fname === false) {
            $errors[] = 'Le prénom est invalide';
        }

        if ($address === false) {
            $errors[] = 'L\'adress est invalide';
        }

        if ($zipcode === false) {
            $errors[] = 'Le code postale est invalide';
        }

        if ($city === false) {
            $errors[] = 'La ville est invalide';
        }

        if ($country === false) {
            $errors[] = 'Le pays est invalide';
        }

        if ($birthdate === false) {
            $errors[] = 'La date de naissance est invalide';
        }

        if (!preg_match("((\+33|0|0033)[1-9]\d{8})", $phone)) {
            $errors[] = 'Le téléphone est invalide';
        }

        if (!preg_match("((\+33|0|0033)[1-9]\d{8})", $fax)) {
            $errors[] = 'Le fax est invalide';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'email est invalide";
        }

        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
            $errors[] = "L'URL' est invalide";
        }

        return $errors;
    }

}