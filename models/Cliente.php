<?php

    class Clientes extends conectar{
        
        public function get_clientes(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM cliente";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_cliente($NumeroCliente){ 
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM cliente WHERE NumeroCliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroCliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_cliente($NumeroCliente, $Nombres, $Apellidos, $RTN, $FechaAfiliacion, $SaldoActual, $NumeroCuenta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO cliente(NumeroCliente, Nombres, Apellidos, RTN, FechaAfiliacion, SaldoActual, NumeroCuenta)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql); 
            $sql->bindValue(1, $NumeroCliente);
            $sql->bindValue(2, $Nombres);
            $sql->bindValue(3, $Apellidos);
            $sql->bindValue(4, $RTN);
            $sql->bindValue(5, $FechaAfiliacion);
            $sql->bindValue(6, $SaldoActual);
            $sql->bindValue(7, $NumeroCuenta);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_eliminar_cliente($NumeroCliente){ 
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM cliente WHERE NumeroCliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroCliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_cliente($NumeroCliente, $Nombres, $Apellidos, $RTN, $FechaAfiliacion, $SaldoActual, $NumeroCuenta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE cliente SET  Nombres = ?, Apellidos = ?, RTN = ?, FechaAfiliacion = ?, SaldoActual = ?, NumeroCuenta = ? 
                 WHERE NumeroCliente = ?;";
            $sql=$conectar->prepare($sql); 
            $sql->bindValue(1, $Nombres);
            $sql->bindValue(2, $Apellidos);
            $sql->bindValue(3, $RTN);
            $sql->bindValue(4, $FechaAfiliacion);
            $sql->bindValue(5, $SaldoActual);
            $sql->bindValue(6, $NumeroCuenta);
            $sql->bindValue(7, $NumeroCliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>