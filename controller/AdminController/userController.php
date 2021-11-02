<?php
include_once 'model/AdminModel/userModel.php';

class UserController 
{ 
    public function view()
    {
        $objUserModel = new UserModel();
        $items = $objUserModel->getAll();
        
        include_once 'view/Admins/user/list.php';
    }
    public function create()
    {
        
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $firstName      = $_POST['firstName'];
            $lastName       = $_POST['lastName'];
            $email          = $_POST['email'];
            $password       = $_POST['password'];

            $objUserModel = new UserModel();    
            $objUserModel->add( $firstName, $lastName, $email, $password);
            $this->redirect('admin.php?controller=users&action=view');
            
        }
        include_once 'view/Admins/user/add.php';
       

    }
    public function update()
    {
        $id = $_GET['id'];    
        $objUserModel = new UserModel();
        $items = $objUserModel->getOne($id);
        
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $firstName      = $_POST['firstName'];
            $lastName       = $_POST['lastName'];
            $email          = $_POST['email'];
            $password       = $_POST['password'];
        
     
            $objUserModel->edit($id, $firstName, $lastName, $email, $password);
            $this->redirect('admin.php?controller=users&action=view');
            
        }    
        include_once 'view/Admins/user/edit.php';

    }
    public function delete()
    {
        $id = $_GET['id'];
        $objUserModel = new UserModel();
       
        $objUserModel->delete($id);
        $this->redirect('admin.php?controller=users&action=view');     

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