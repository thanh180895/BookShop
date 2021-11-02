<?php
    class CategoryModel extends Model 
    {
        public function getAll()
        {
            $sql = "SELECT * FROM categorys";
            $stmt = $this->_db->query( $sql );
            $stmt-> setFetchMOde(PDO::FETCH_OBJ);
            $items = $stmt->fetchAll();

            return $items;

        }
        public function getOne($id)
        {
            $sql = "SELECT * FROM categorys WHERE id ='$id'";
            $stmt = $this->_db->query( $sql );
            $stmt-> setFetchMOde(PDO::FETCH_OBJ);
            $items = $stmt->fetch();

            return $items;
        }
        public function add($categoryCode, $categoryName) 
        {
            $sql = "INSERT INTO categorys (id, categoryCode, categoryName ) VALUES (NULL,'$categoryCode', '$categoryName')";
            $this->_db->query( $sql ); 
            
        }
        public function edit($id, $categoryCode, $categoryName)
        {
            $sql = "UPDATE categorys SET categoryCode = '$categoryCode', categoryName = '$categoryName' WHERE id ='$id'";
            $this->_db->query( $sql );            
        }
        public function delete($id)
        {
            $sql = "DELETE FROM categorys WHERE id = '$id'";
            $this->_db->query( $sql );
            
        }
    }
