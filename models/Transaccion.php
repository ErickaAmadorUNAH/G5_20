<?php

    class Transaccion extends conectar{
        
        public function get_transacciones(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Transaccion";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_transaccion($CodigoTransaccion){ 
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Transaccion WHERE CodigoTransaccion = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $CodigoTransaccion);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_transaccion($CodigoTransaccion, $TipoTransaccion, $CodigoCliente, $FechaTransaccion, $MontoTransaccion, $Sucursal , $NumeroCuenta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO Transaccion(CodigoTransaccion, TipoTransaccion, CodigoCliente, FechaTransaccion, MontoTransaccion, Sucursal , NumeroCuenta)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql); 
            $sql->bindValue(1, $CodigoTransaccion);
            $sql->bindValue(2, $TipoTransaccion);
            $sql->bindValue(3, $CodigoCliente);
            $sql->bindValue(4, $FechaTransaccion);
            $sql->bindValue(5, $MontoTransaccion);
            $sql->bindValue(6, $Sucursal);
            $sql->bindValue(7, $NumeroCuenta);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_eliminar_Transaccion($CodigoTransaccion){ 
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM Transaccion WHERE CodigoTransaccion = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $CodigoTransaccion);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_Transaccion($CodigoTransaccion, $TipoTransaccion, $CodigoCliente, $FechaTransaccion, $MontoTransaccion, $Sucursal , $NumeroCuenta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE Transaccion SET  TipoTransaccion = ?, CodigoCliente = ?,FechaTransaccion=?, MontoTransaccion = ?, Sucursal = ?, NumeroCuenta = ? 
                 WHERE CodigoTransaccion = ?;";
           $sql=$conectar->prepare($sql); 
           $sql->bindValue(1, $TipoTransaccion);
           $sql->bindValue(2, $CodigoCliente);
           $sql->bindValue(3, $FechaTransaccion);
           $sql->bindValue(4, $MontoTransaccion);
           $sql->bindValue(5, $Sucursal);
           $sql->bindValue(6, $NumeroCuenta);
           $sql->bindValue(7, $CodigoTransaccion);
           $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>