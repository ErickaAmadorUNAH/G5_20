<?php
 if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Banco.php");

    $bancos=new Bancos();

    $body=json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){

       case"GetBancos":
          $datos=$bancos->get_bancos();
          echo json_encode($datos);
       break;

         case"GetBanco":
          $datos=$bancos->get_banco($body["CodigoBanco"]); 
          echo json_encode($datos);
         break;

        case"InsertBanco":
          $datos=$bancos->insert_banco($body["CodigoBanco"],$body["NombreBanco"],$body["OficinaPrincipal"],$body["CantidadSucursales"],$body["FechaFundacion"],$body["Pais"],$body["RTN"]);
          echo json_encode("Banco Agregado");
        break;

        case"UpdateBanco":
         $datos=$bancos->update_banco($body["CodigoBanco"],$body["NombreBanco"],$body["OficinaPrincipal"],$body["CantidadSucursales"],$body["FechaFundacion"],$body["Pais"],$body["RTN"]);
         echo json_encode("Banco Actualizado");
         break;
                                                    
        case"DeleteBanco":
          $datos=$bancos->delete_banco($body["CodigoBanco"]);
          echo json_encode("Banco Eliminado ");
         break;
   }
   

?>