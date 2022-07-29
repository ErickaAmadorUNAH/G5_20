<?php
  class Cuenta extends conectar{
   
    public function Get_Cuentas(){
          $conectar = parent::conexion();
          parent:: set_names();
          $sql="SELECT * FROM Cuenta";
          $sql=$conectar-> prepare($sql);
          $sql->execute(); 
          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 


     }


     public function Get_Cuenta($NumeroCuenta){
        $conectar = parent::conexion();
        parent:: set_names();
        $sql="SELECT * FROM Cuenta WHERE NumeroCuenta = ?";
        $sql=$conectar-> prepare($sql);
        $sql-> bindValue(1,$NumeroCuenta);
        $sql->execute(); 
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
     }




     public function Insert_Cuenta($NumeroCuenta, $NombreCuenta, $NumeroCliente, $FechApertura, $SaldoActual, $SaldoRetenido, $TipoMoneda)
     {
      $conectar= parent::conexion();
      parent::set_names();
      $sql="INSERT INTO Cuenta(NumeroCuenta, NombreCuenta, NumeroCliente, FechApertura, SaldoActual, SaldoRetenido, TipoMoneda)
      VALUES (?,?,?,?,?,?,?);";
       $sql=$conectar->prepare($sql); 
       $sql->bindValue(1, $NumeroCuenta);
       $sql->bindValue(2, $NombreCuenta);
       $sql->bindValue(3, $NumeroCliente);
       $sql->bindValue(4, $FechApertura);
       $sql->bindValue(5, $SaldoActual);
       $sql->bindValue(6, $SaldoRetenido);
       $sql->bindValue(7, $TipoMoneda);
       $sql->execute();
       return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }

     public function Eliminar_Cuenta($NumeroCuenta)
     { 
      $conectar= parent::conexion();
      parent::set_names();
      $sql="DELETE FROM Cuenta WHERE NumeroCuenta = ?";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $NumeroCuenta);
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }

     public function Update_Cuenta($NumeroCuenta, $NombreCuenta, $NumeroCliente, $FechApertura, $SaldoActual, $SaldoRetenido, $TipoMoneda)
     {
      $conectar= parent::conexion();
      parent::set_names();
      $sql="UPDATE Cuenta SET NombreCuenta = ?, NumeroCliente = ?, FechApertura = ?, SaldoActual = ?, SaldoRetenido = ?, TipoMoneda = ?
      WHERE NumeroCuenta = ?;";
       $sql=$conectar->prepare($sql); 
       $sql->bindValue(1, $NombreCuenta);
       $sql->bindValue(2, $NumeroCliente);
       $sql->bindValue(3, $FechApertura);
       $sql->bindValue(4, $SaldoActual);
       $sql->bindValue(5, $SaldoRetenido);
       $sql->bindValue(6, $TipoMoneda);
       $sql->bindValue(7, $NumeroCuenta);
       $sql->execute();
       return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }











 }
?>
