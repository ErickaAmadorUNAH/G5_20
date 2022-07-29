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
    require_once("../models/transaccion.php");
    $transaccion = new transaccion();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){

        case "Get_Transaccion":
            $datos=$transaccion->get_transaccion();
            echo json_encode($datos);
            break;
        
        case "Get_Transaccion": 
            $datos=$transaccion->get_transaccion($body["CodigoTransaccion"]); 
            echo json_encode($datos);
            break;

        case "Insert_Transaccion":
            $datos=$clientes->insert_transaccion($body["CodigoTransaccion"],$body["TipoTransaccion"],$body["CodigoCliente"],$body["FechaTransaccion"],$body["MontoTransaccion"],$body["Sucursal"],$body["NumeroCuenta"]);
            echo json_encode("transaccion Agregada Exitosamente");
            break; 

        case "Eliminartransaccion":
            $datos=$clientes->get_eliminar_transaccion($body["CodigoTransaccion"]);
            echo json_encode("Transaccion Eliminado Exitosamente");
            break; 
    }
?>