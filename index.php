<?php 
session_start();
include './database.php';
include 'layouts/headeruser.php';

$controller = '';
$action = '';

if(isset($_GET['controller']))
{
    $controller= $_GET['controller'];
}
if(isset($_GET['action']))
{
    $action = $_GET['action'];  
}
if($controller == 'users')
{
    include_once 'controller/UserController/userController.php';  
    $objUserController = new UserController();
    if($action == 'register')
    {
        $objUserController-> register();
    }
    if($action == 'login')
    {
        $objUserController-> login();
    }
    if($action == 'home')
    {
        $objUserController-> home();
    }
  
}


?>
<?php include 'layouts/footer.php';?>
