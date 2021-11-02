<?php
class ProductModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMOde(PDO::FETCH_OBJ);
        $items = $stmt->fetchAll();

        return $items;
    }
    public function getOne($id)
    {
        $sql = "SELECT * FROM products WHERE id ='$id'";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMOde(PDO::FETCH_OBJ);
        $items = $stmt->fetch();

        return $items;
    }
    public function add($productCode, $productName, $price, $description, $producer, $id_category)
    {
        $sql = "INSERT INTO products (id, productCode, productName, price, description, producer, id_category ) VALUES (NULL,'$productCode', '$productName', '$price', '$description', '$producer', '$id_category')";
        $this->_db->query($sql);
    }
    public function edit($id, $productCode, $productName, $price, $description, $producer, $id_category)
    {
        $sql = "UPDATE products SET productCode = '$productCode', productName = '$productName', price = '$price', description = '$description', producer = '$producer', id_category = '$id_category' WHERE id ='$id'";
        $this->_db->query($sql);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = '$id'";
        $this->_db->query($sql);
    }
    public function search($productName)
    {
        $sql = "SELECT * FROM products WHERE productName LIKE '%$productName%'";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMOde(PDO::FETCH_OBJ);
        $items = $stmt->fetchAll();
        
        return $items;
    }
}
