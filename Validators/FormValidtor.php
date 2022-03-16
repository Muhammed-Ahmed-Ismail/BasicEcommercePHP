<?php

class FormValidator
{


    function validate_email()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                return ["isValid" => false, "message" => "wrong"];
            } else {
                return ["isValid" => true];
            }
        }
       
    }

    function validate_password()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (strlen($_POST["password"]) < 1) {
                return ["isValid" => false, "message" => "wrong"];
            } else {
                return ["isValid" => true];
            }
        }
  
    }


    function validate_credit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (strlen($_POST["credit_card"]) < 16) {
                return ["isValid" => false, "message" => "wrong"];
            } else {
                return ["isValid" => true];
            }
        }
    }

    function validate_cvv()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($this->cvv)) {
                return ["isValid" => false, "message" => "wrong"];
            } else {
                return ["isValid" => true];
            }
        }
    }
}
