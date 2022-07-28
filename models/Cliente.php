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
            return $resultado=$sql->fetcAll(PDO::FETCH_ASSOC);
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
    }
?>