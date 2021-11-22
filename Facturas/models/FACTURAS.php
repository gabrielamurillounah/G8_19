<?php

    class FACTURAS extends Conectar{
        
        public function get_facturas(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_facturas" ;
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }    
    

        public function get_factura($ID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_facturas WHERE ESTADO = '1' AND ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    

        public function insert_factura($ID, $NUMERO_FACTURA, $ID_SOCIO, $FECHA_FACTURA,$DETALLE,$SUB_TOTAL,$TOTAL_ISV,$TOTAL,$FECHA_VENCIMIENTO,$ESTADO){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO ma_facturas(ID, NUMERO_FACTURA, ID_SOCIO, FECHA_FACTURA, DETALLE, SUB_TOTAL,TOTAL_ISV, TOTAL, FECHA_VENCIMIENTO, ESTADO)
            VALUES (?,?,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $ID);
            $sql->bindvalue(2, $NUMERO_FACTURA);
            $sql->bindValue(3, $ID_SOCIO);
            $sql->bindValue(4, $FECHA_FACTURA);
            $sql->bindvalue(5, $DETALLE);
            $sql->bindvalue(6, $SUB_TOTAL);
            $sql->bindvalue(7, $TOTAL_ISV);
            $sql->bindvalue(8, $TOTAL);
            $sql->bindvalue(9, $FECHA_VENCIMIENTO);
            $sql->bindvalue(10, $ESTADO);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_factura($ID){
            $conectar=parent :: conexion();
            parent::set_names();
            $sql= "DELETE FROM `g8_19`.`ma_facturas` WHERE (`ID` = ?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function actualizar_facturas($ID, $NUMERO_FACTURA, $ID_SOCIO, $FECHA_FACTURA,$DETALLE,$SUB_TOTAL,$TOTAL_ISV,$TOTAL,$FECHA_VENCIMIENTO,$ESTADO){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE ma_facturas SET
            ID=?, NUMERO_FACTURA=?,
            ID_SOCIO=?, FECHA_FACTURA=?,
            DETALLE=?, SUB_TOTAL=?,
            TOTAL_ISV=?, TOTAL=?,
            FECHA_VENCIMIENTO=?, ESTADO=?
            WHERE ID = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $ID);
            $sql->bindvalue(2, $NUMERO_FACTURA);
            $sql->bindValue(3, $ID_SOCIO);
            $sql->bindValue(4, $FECHA_FACTURA);
            $sql->bindvalue(5, $DETALLE);
            $sql->bindvalue(6, $SUB_TOTAL);
            $sql->bindvalue(7, $TOTAL_ISV);
            $sql->bindvalue(8, $TOTAL);
            $sql->bindvalue(9, $FECHA_VENCIMIENTO);
            $sql->bindvalue(10, $ESTADO);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }    
    }


?>



