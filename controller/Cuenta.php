<?php
if ($_SERVER['REQUEST_METHOD']=='OPTIONS'){
    header('Access-Control-Allow-Origin: * ');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: Token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}

    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    require_once('../config/conexion.php');
    require_once('../models/Cuenta.php');

     $cuenta = new Cuenta();
     
     $body = json_decode(file_get_contents("php://input"),true);

     switch($_GET ["opc"]){
      case "Get_Cuentas":
        $datos=$cuenta -> Get_Cuentas();
        echo json_encode($datos);
       break;

       case "Get_Cuenta":
            $datos=$cuenta -> Get_Cuenta($body["NumeroCuenta"]);
            echo json_encode($datos);
        break;

        case "InsertCuenta":
            $datos = $cuenta -> Insert_Cuenta($body["NumeroCuenta"],$body["NombreCuenta"],$body["NumeroCliente"],$body["FechApertura"],$body["SaldoActual"],$body["SaldoRetenido"],$body["TipoMoneda"]);
            echo json_encode("Cuenta Agregado Exitosamente");
        break; 

        case "EliminarCuenta":
            $datos = $cuenta -> Eliminar_Cuenta($body["NumeroCuenta"]);
            echo json_encode("Cuenta ELIMINADA Con Exito");
         break; 
         

        case "UpdateCuenta":
            $datos=$cuenta->Update_Cuenta($body["NumeroCuenta"],$body["NombreCuenta"],$body["NumeroCliente"],$body["FechApertura"],$body["SaldoActual"],$body["SaldoRetenido"],$body["TipoMoneda"]);
            echo json_encode("La Cuenta Se ACTUALIZO Con Exito");
        break;
            




     }





?>
