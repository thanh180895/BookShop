<?php
include 'model/AdminModel/orderModel.php';
include_once 'model/AdminModel/userModel.php';


class OrderController
{
    public function view()
    {
        $objOrderModel = new OrderModel();
        $items = $objOrderModel->getAll();

        include_once 'view/Admins/order/list.php';
    }
    public function create()
    {
        $objUserModel = new UserModel();
        $useres = $objUserModel->getAll();

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $orderCode   = $_POST['orderCode'];
            $orderDate   = $_POST['orderDate'];
            $shippedDate = $_POST['shippedDate'];
            $status      = $_POST['status'];
            $id_user     = $_POST['id_user'];

            $objOrderModel = new OrderModel();
            $objOrderModel->add($orderCode, $orderDate, $shippedDate, $status, $id_user);
            $this->redirect('admin.php?controller=orders&action=view');
        }

        include_once 'view/Admins/order/add.php';
    }
    public function update()
    {
        $id = $_GET['id'];
        $objOrderModel = new orderModel();
        $items = $objOrderModel->getOne($id);

        $objUserModel = new UserModel();
        $useres = $objUserModel->getAll();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $orderCode   = $_POST['orderCode'];
            $orderDate   = $_POST['orderDate'];
            $shippedDate = $_POST['shippedDate'];
            $status      = $_POST['status'];       
            $id_user     = $_POST['id_user'];


            $objOrderModel->edit($id, $orderCode, $orderDate, $shippedDate, $status, $id_user);
            $this->redirect('admin.php?controller=orders&action=view');
        }

        include_once 'view/Admins/order/edit.php';
    }
    public function delete()
    {
        $id = $_GET['id'];
        $objOrderModel = new orderModel();
        $objOrderModel->delete($id);

        $this->redirect('admin.php?controller=orders&action=view');
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
    // public function search()
    // {   
    //     if($_SERVER["REQUEST_METHOD"] == "POST")
    //     {
    //         $orderName = $_POST['orderName'];

    //         $objOrderModel = new orderModel();          
    //         $items = $objOrderModel->find($orderName);

    //     }
    //     include_once 'view/Admins/order/search.php';
    //}


}



?>