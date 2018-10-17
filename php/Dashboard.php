<?php
/**
 * Created by PhpStorm.
 * User: hiago
 * Date: 12/10/2018
 * Time: 13:56
 */


function listarAguaDash()
{
    require 'Connection.php';
    $con = startConnection();
    $stmt = $con->prepare("SELECT * FROM esustentavel.consumo_agua");
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        $arrayAgua[] = $row;
    }

    return $arrayAgua;
}


function enviaEmail()
{

    ini_set('display_errors', 1);

    error_reporting(E_ALL);

    $from = "teste@teste.com";

    $to = "hiagofss98@gmail.com";

    $subject = "Verificando o correio do PHP";

    $message = "O correio do PHP funciona bem";

    $headers = "De:" . $from;

    mail($to, $subject, $message, $headers);

    echo "A mensagem de e-mail foi enviada.";


}

?>