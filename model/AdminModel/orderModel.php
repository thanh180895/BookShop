<?php
    class OrderModel extends Model 
    {
        public function getAll()
        {
            $sql = "SELECT * FROM orders";
            $stmt = $this->_db->query( $sql );
            $stmt-> setFetchMOde(PDO::FETCH_OBJ);
            $items = $stmt->fetchAll();

            return $items;

        }
        public function getOne($id)
        {
            $sql = "SELECT * FROM orders WHERE id ='$id'";
            $stmt = $this->_db->query( $sql );
            $stmt-> setFetchMOde(PDO::FETCH_OBJ);
            $items = $stmt->fetch();

            return $items;
        }
        public function add($orderCode, $orderDate, $shippedDate, $status, $id_user) 
        {
            $sql = "INSERT INTO orders (id, orderCode, orderDate, shippedDate, status, id_user ) VALUES (NULL,'$orderCode', '$orderDate', '$shippedDate', '$status', '$id_user')";
            $this->_db->query( $sql); 
            
        }
        public function edit($id, $orderCode, $orderDate, $shippedDate, $status, $id_user)
        {
            $sql = "UPDATE orders SET orderCode = '$orderCode', orderDate = '$orderDate', shippedDate = '$shippedDate', status = '$status', id_user = '$id_user' WHERE id ='$id'";
            $this->_db->query( $sql );            
        }
        public function delete($id)
        {
            $sql = "DELETE FROM orders WHERE id = '$id'";
            $this->_db->query( $sql );
            
        }
       

    }


?>  