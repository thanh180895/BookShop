<?php
    class OrderdetailModel extends Model 
    {
        public function getAll()
        {
            $sql = "SELECT * FROM orderdetails";
            $stmt = $this->_db->query( $sql );
            $stmt-> setFetchMOde(PDO::FETCH_OBJ);
            $items = $stmt->fetchAll();

            return $items;

        }
        public function getOne($id)
        {
            $sql = "SELECT * FROM orderdetails WHERE id ='$id'";
            $stmt = $this->_db->query( $sql );
            $stmt-> setFetchMOde(PDO::FETCH_OBJ);
            $items = $stmt->fetch();

            return $items;
        }
        public function add( $id_order, $productCode, $quantityOrdered) 
        {
            $sql = "INSERT INTO orderdetails (id, id_order, productCode, quantityOrdered) VALUES (NULL, '$id_order', '$productCode', '$quantityOrdered')";
            $this->_db->query( $sql);       
            
        }
        public function edit($id, $id_order ,$productCode, $quantityOrdered)
        {
            $sql = "UPDATE orderdetails SET id_order ='$id_order', productCode = '$productCode', quantityOrdered = '$quantityOrdered' WHERE id ='$id'";
            $this->_db->query( $sql );            
        }
        public function delete($id)
        {
            $sql = "DELETE FROM orderdetails WHERE id = '$id'";
            $this->_db->query( $sql );
            
        }
       

    }


?>  