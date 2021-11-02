<?php
class UserModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->_db->query( $sql );
        $stmt-> setFetchMOde(PDO::FETCH_OBJ);
        $items = $stmt->fetchAll();

        return $items;
    }
    public function getOne($id)
    {
        $sql = "SELECT * FROM users WHERE id ='$id'";
        $stmt = $this->_db->query( $sql );
        $stmt-> setFetchMOde(PDO::FETCH_OBJ);
        $items = $stmt->fetch();

        return $items;
    }
    public function add($firstName, $lastName, $email, $password) 
    {
        $sql = "INSERT INTO users (id, firstName, lastName, email, password, repeatpassword ) VALUES (NULL, '$firstName', '$lastName', '$email', '$password')";
        echo '<pre>';
            print_r( $sql );
        echo '</pre>';
        $this->_db->query( $sql); 
        
    }
    public function edit($id, $firstName, $lastName, $email, $password)
    {
        $sql = "UPDATE users SET firstName = '$firstName', lastName = '$lastName' ,email = '$email', password = '$password'  WHERE id ='$id'";
        $this->_db->query( $sql );            
    }
    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = '$id'";
        $this->_db->query( $sql );
        
    }
}


?>