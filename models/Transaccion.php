<?php
  class  transaccion extends conectar{
public function get_transacciones(){
 $conectar = parent::Conexion();
 parent::set_names();
 $sql="SELECT*FROM Transaccion";
 $sql=$conectar->prepare($sql);
 $sql->execute();
 return $resultado=$sql->fetchAll(PDO::FETCH ASSOC)
}
public function get_transaccion($CodigoTransaccion){

    $conectar = parent::Conexion();
    parent::set_names();
    $sql="SELECT*FROM Transaccion WHERE CodigoTransaccion=?";
    $sql=$conectar->prepare($slq);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH ASSOC)
   
   }

public function insert_transaccion($CodigoTransaccion,$TipoTransaccion,$CodigoCliente ,$FechaTransaccion,$MontoTransaccion,$Sucursal,$NumeroCuenta){

    $conectar = parent::Conexion();
    parent::set_names();
    $sql="INSERT INTO Transaccion(CodigoTransaccion,TipoTransaccion,CodigoCliente ,FechaTransaccion,MontoTransaccion,Sucursal,NumeroCuenta)
    VALUES (?,?,?,?,?,?,?);";
    $sql=$conectar->prepare($slq);
    $SQL ->bindValue(1,$CodigoTransaccion)
    $SQL ->bindValue(2,$TipoTransaccion)
    $SQL ->bindValue(3,$CodigoCliente)
    $SQL ->bindValue(4,$FechaTransaccion)
    $SQL ->bindValue(5,$CodigoTransaccion)
    $SQL ->bindValue(6,$MontoTransaccion)
    $SQL ->bindValue(7,$NumeroCuenta)
    $sql-> execute();
    return $resultado=$sql->fetchAll(PDO::FETCH ASSOC);
   }



   






 }







?>
