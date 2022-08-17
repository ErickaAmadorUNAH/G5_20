<?php
class Transaccion extends conectar{
    public function get_transaccions(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM transaccion ";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_transaccion($CodigoTransaccion){
        $conectar= parent::conexion();
        parent:: set_names();
        $sql="SELECT * FROM transaccion WHERE  CodigoTransaccion=?";
        $sql=$conectar->prepare($sql);
        $sql ->bindvalue(1, $CodigoTransaccion);
        $sql ->execute();
        return $resultado=$sql ->fetchAll(PDO:: FETCH_ASSOC);
    }

    public function insert_transaccion($CodigoTransaccion, $TipoTransaccion, $CodigoCliente, $FechaTransaccion, $MontoTransaccion, $Sucursal, $NumeroCuenta){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO Transaccion(CodigoTransaccion,TipoTransaccion,CodigoCliente,FechaTransaccion,MontoTransaccion,Sucursal,NumeroCuenta)
        VALUES (?,?,?,?,?,?,?);";
        $sql=$conectar ->prepare($sql);
        $sql ->bindvalue(1, $CodigoTransaccion); 
        $sql ->bindvalue(2, $TipoTransaccion); 
        $sql ->bindvalue(3, $CodigoCliente); 
        $sql ->bindvalue(4, $FechaTransaccion); 
        $sql ->bindvalue(5, $MontoTransaccion); 
        $sql ->bindvalue(6, $Sucursal); 
        $sql ->bindvalue(7, $NumeroCuenta);
        $sql ->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_transaccion($CodigoTransaccion, $TipoTransaccion, $CodigoCliente, $FechaTransaccion, $MontoTransaccion, $Sucursal, $NumeroCuenta){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE Transaccion SET TipoTransaccion=? ,CodigoCliente=? ,FechaTransaccion=? ,MontoTransaccion=? ,Sucursal=?, NumeroCuenta=? WHERE CodigoTransaccion=?"; 
        $sql=$conectar ->prepare($sql);
        $sql ->bindvalue(1, $TipoTransaccion); 
        $sql ->bindvalue(2, $CodigoCliente); 
        $sql ->bindvalue(3, $FechaTransaccion); 
        $sql ->bindvalue(4, $MontoTransaccion); 
        $sql ->bindvalue(5, $Sucursal); 
        $sql ->bindvalue(6, $NumeroCuenta);
        $sql ->bindvalue(7, $CodigoTransaccion);
        $sql ->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);   
    }

    public function delete_transaccion($CodigoTransaccion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM Transaccion WHERE CodigoTransaccion=?";
        $sql=$conectar ->prepare($sql);
        $sql->bindValue(1, $CodigoTransaccion);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>