<?php

class FormValidator
{
     

    function validate_email()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
         
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)||empty($_POST["email"])) {
                return ["isValid" => false, "message" => "please entre valid  email"];
            } else {
                return ["isValid" => true];
            }
        }
       
    }

    function validate_password()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (strlen($_POST["password"]) < 1 ||empty($_POST["email"])) {
                return ["isValid" => false, "message" => "please entre valid  password"];
            } else {
                return ["isValid" => true];
            }
        }
  
    }


    function validate_credit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (strlen($_POST["credit_card"]) < 16||empty($_POST["email"])) {
                return ["isValid" => false, "message" => "please entre valid  creditcard"];
            } else {
                return ["isValid" => true];
            }
        }
    }

    function validate_cvv()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["cvv"])) {
                return ["isValid" => false, "message" => "please entre valid cvv"];
            } else {
                return ["isValid" => true];
            }
        }
    }
}
