<?php
include 'model/AdminModel/orderdetailModel.php';
include_once 'model/AdminModel/orderModel.php';
include_once 'model/AdminModel/productModel.php';

class OrderdetailController
{
    public function view()
    {
        $objOrderdetailModel = new OrderdetailModel();
        $items = $objOrderdetailModel->getAll();

        include_once 'view/Admins/orderdetail/list.php';
    }
    public function create()
    {
        $objOrderModel = new OrderModel();
        $orderes = $objOrderModel->getAll();

        $objProductModel = new ProductModel();
        $productes = $objProductModel->getAll();

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $id_order         = $_POST['id_order'];
            $productCode      = $_POST['productCode'];
            $quantityOrdered  = $_POST['quantityOrdered'];
         
            $objOrderdetailModel = new OrderdetailModel();
            $objOrderdetailModel->add($id_order, $productCode, $quantityOrdered);
            $this->redirect('admin.php?controller=orderdetails&action=view');
        }

        include_once 'view/Admins/orderdetail/add.php';
    }
    public function update()
    {
        $id = $_GET['id'];
        $objOrderdetailModel = new OrderdetailModel();
        $items = $objOrderdetailModel->getOne($id);

        $objOrderModel = new OrderModel();
        $orderes = $objOrderModel->getAll();

        $objProductModel = new ProductModel();
        $productes = $objProductModel->getAll();

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $id_order         = $_POST['id_order'];
            $productCode      = $_POST['productCode'];
            $quantityOrdered  = $_POST['quantityOrdered'];
         
            $objOrderdetailModel->edit($id, $id_order, $productCode, $quantityOrdered);
            $this->redirect('admin.php?controller=orderdetails&action=view');
        }

        include_once 'view/Admins/orderdetail/edit.php';
    }
    public function delete()
    {
        $id = $_GET['id'];
        $objOrderdetailModel = new OrderdetailModel();
        $objOrderdetailModel->delete($id);

        $this->redirect('admin.php?controller=orderdetails&action=view');
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
    //         $orderdetailName = $_POST['orderdetailName'];

    //         $objOrderdetailModel = new orderdetailModel();          
    //         $items = $objOrderdetailModel->find($orderdetailName);

    //     }
    //     include_once 'view/Admins/orderdetail/search.php';
    //}


}



?>