<?php
// Cargamos Requests y Culqi PHP
include_once dirname(__FILE__).'/Requests/library/Requests.php';
Requests::register_autoloader();
include_once dirname(__FILE__).'/culqi-php/lib/culqi.php';

// Configurar tu API Key y autenticación
include_once dirname(__FILE__).'/config.php'; // Archivo separado con tus credenciales

/*
// Configurar tu API Key y autenticación
$PUBLIC_KEY = "pk_test_c339645bc31111db";
$SECRET_KEY = "sk_test_5GWhZNikVwrwkpDd";
*/

$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

$description = $_POST['producto']; // La descripción enviada desde el formulario
$amount = $_POST['precio']; // El monto enviado desde el formulario
//$email = $_POST['email']; // El correo electrónico enviado desde el formulario
error_log("producto:".$description." precio:".$amount);

// CREAR Cargo en tarjeta
$charge = $culqi->Charges->create(
    array(
      "amount" => $amount,
      "capture" => false,
      //"capture" => true,
      "currency_code" => "PEN",
      "description" => $description,
      "email" => "correoprueba01@gmail.com",
      "installments" => 0,
      "antifraud_details" => array(
          "address" => "Av. Lima 123",
          "address_city" => "LIMA",
          "country_code" => "PE",
          "first_name" => "JUAN ALBERTO",
          "last_name" => "GOMEZ PAREDES",
          "phone_number" => "988967898"
      ),
      "source_id" => $_POST['token']
      //"source_id" => "tkn_test_0MpHRclsJ6yjC4z1"
    )
);
echo "cobro exitoso :  ";

//Respuesta
print_r($charge);
?>
