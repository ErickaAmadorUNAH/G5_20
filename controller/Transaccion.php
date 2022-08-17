<?php
if($_SERVER['REQUEST_METHOD']=== 'OPCIONS'){
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Transaccion.php");

    $transaccion = new Transaccion();
    $body = json_decode(file_get_contents("php://input"), true);
    switch($_GET["opc"]){
        case "Get_transaccions":
            $datos=$transaccion->get_transaccions();
            echo json_encode($datos);
        break;
            case "Get_transaccion":
                $datos=$transaccion->get_transaccion($body["CodigoTransaccion"]);
                echo json_encode($datos);
            break;

            case "Insert_Transaccion":
                $datos=$transaccion->insert_transaccion($body["CodigoTransaccion"],$body ["TipoTransaccion"],$body ["CodigoCliente"],$body ["FechaTransaccion"],$body ["MontoTransaccion"],$body ["Sucursal"],$body ["NumeroCuenta"]);
                echo json_encode("Nueva Transacción Agregada Correctamente");

            break;

            case "Update_Transaccion":
                $datos=$transaccion->update_transaccion($body["CodigoTransaccion"],$body ["TipoTransaccion"],$body ["CodigoCliente"],$body ["FechaTransaccion"],$body ["MontoTransaccion"],$body ["Sucursal"],$body ["NumeroCuenta"]);
                echo json_encode("Datos Transacción Actualizados Correctamente");

            break;

            case "Delete_Transaccion":
                $datos=$transaccion->delete_transaccion($body["CodigoTransaccion"]);
                echo json_encode("Datos de Transacción Eliminados Correctamente");

            break;


    }
?>