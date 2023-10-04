<?php
// Instalar composer e agregar a variables de Sistema, dodne esta el php y composer
//ANTES DE TODO: Instala la biblioteca dotenv a través de Composer. En tu terminal, navega hasta la raíz de tu proyecto y ejecuta el siguiente comando:
//> composer init
 //ingresar: yourname/myproject
/*
 Abre el archivo composer.json en un editor de texto y agrega la dependencia de la biblioteca dotenv en la sección "require":

{
    "require": {
        "vlucas/phpdotenv": "^5.2"
    }
}
*/
//> composer install

//Incluye la biblioteca dotenv y carga los valores de las variables de entorno del archivo .env
require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$PUBLIC_KEY = $_ENV['API_KEY'];
$SECRET_KEY = $_ENV['SECRET_KEY'];

echo "PUBLIC_KEY:".$PUBLIC_KEY.", SECRET_KEY:".$SECRET_KEY;

?>
