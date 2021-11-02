<?php
include_once 'model/UserModel/userModel.php';

class UserController
{
    public function register()
    {
        
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $firstName      = $_POST['firstName'];
            $lastName       = $_POST['lastName'];
            $email          = $_POST['email'];
            $password       = $_POST['password'];
            $repeatpassword = $_POST['repeatpassword'];

            if($password == $repeatpassword){   
                $objUserModel = new UserModel();
                $objUserModel->create ($firstName, $lastName, $email, $password);
            } else{
                
            }
      
            $this->redirect('index.php?controller=users&action=login');
            
        }
        include_once 'view/Users/register.php';
    }
    public function login()
    {
        include_once 'view/Users/login.php';
       
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $objUserModel = new UserModel();
            $check= $objUserModel->checkmail($email, $password);
            if($check && $email == 'admin@gmail.com' && $password == '123123')
            {
                $this->redirect('admin.php');
            }
            
            if($check)
            {   
                
                $_SESSION['check']= $check; 
                $this->redirect('index.php');
                
            }else {
                $_SESSION['check'] = null;
?>
                <script>
                    alert('tài khoản không đúng');
                </script>
        <?php
            }          
        }    
    }
    public function home()
    { 
        include_once 'view/Users/home.php';
    
    }

    public function redirect($url)
    {
        ?> 
        <script>
            let url = '<?= $url; ?>';
            window.location.href = url;
        </script>
        <?php
    }
}



?>