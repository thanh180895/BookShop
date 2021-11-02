<?php 
    class UserModel extends Model
    {
        public function create($firstName, $lastName, $email, $password)
        {
            $sql = "INSERT INTO Users (id, firstName, lastname, email, password) 
            VALUES (NULL, '$firstName', '$lastName', '$email', '$password')";
            
            $this->_db->query( $sql );
        }
        public function checkmail($email, $password){
            $sql = "SELECT * FROM Users WHERE email = '$email' AND password = '$password'";
            $stmt=  $this->_db->query( $sql );
            $stmt->setFetchMOde(PDO::FETCH_OBJ);
            $item = $stmt->fetch();
            return $item;
        }
        public function home()
        {
            // $sql = "SELECT * FROM Users"();
        }
    }


?>