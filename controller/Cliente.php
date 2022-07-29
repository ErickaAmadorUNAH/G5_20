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
    require_once("../models/Cliente.php");
    $clientes = new Clientes();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){

        case "GetClientes":
            $datos=$clientes->get_clientes();
            echo json_encode($datos);
            break;
        
        case "GetCliente": 
            $datos=$clientes->get_cliente($body["NumeroCliente"]); 
            echo json_encode($datos);
            break;

        case "InsertCliente":
            $datos=$clientes->insert_cliente($body["NumeroCliente"],$body["Nombres"],$body["Apellidos"],$body["RTN"],$body["FechaAfiliacion"],$body["SaldoActual"],$body["NumeroCuenta"]);
            echo json_encode("Cliente Agregado Exitosamente");
            break; 

        case "EliminarCliente":
            $datos=$clientes->get_eliminar_cliente($body["NumeroCliente"]);
            echo json_encode("Cliente Eliminado Con Exito");
            break; 

        case "UpdateCliente":
            $datos=$clientes->update_cliente($body["NumeroCliente"],$body["Nombres"],$body["Apellidos"],$body["RTN"],$body["FechaAfiliacion"],$body["SaldoActual"],$body["NumeroCuenta"]);
            echo json_encode("Cliente Se ACTUALIZO Con Exito");
            break;
    }
?>