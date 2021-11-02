<?php
include 'model/AdminModel/productModel.php';
include_once 'model/AdminModel/categoryModel.php';

class ProductController
{
    public function view()
    {
        $objProductModel = new ProductModel();

        // $productName = $_GET['s'];
        $items = $objProductModel->getAll();

        // $items = $objProductModel->search($productName);
        
        include_once 'view/Admins/product/list.php';
    }
    public function create()
    {
        $objcategoryModel= new CategoryModel();
        $categories = $objcategoryModel->getAll();

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $productCode = $_POST['productCode'];
            $productName = $_POST['productName'];
            $price       = $_POST['price'];
            $description = $_POST['description'];
            $producer    = $_POST['producer'];
            $id_category = $_POST['id_category'];

            $objProductModel = new ProductModel();
            $objProductModel->add($productCode, $productName, $price, $description, $producer, $id_category);
            $this->redirect('admin.php?controller=products&action=view');
        }
        
        include_once 'view/Admins/product/add.php';

    }
    public function update()
    {
        $id = $_GET['id'];    
        $objProductModel = new ProductModel();
        $items = $objProductModel->getOne($id);
        
        $objcategoryModel= new CategoryModel();
        $categories = $objcategoryModel->getAll();

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $productCode = $_POST['productCode'];
            $productName = $_POST['productName'];
            $price       = $_POST['price'];
            $description = $_POST['description'];
            $producer    = $_POST['producer'];
            $id_category = $_POST['id_category'];

            
            $objProductModel->edit($id, $productCode, $productName, $price, $description, $producer, $id_category);
            $this->redirect('admin.php?controller=products&action=view');
        }
        
        include_once 'view/Admins/product/edit.php';

    }
    public function delete()
    {
        $id = $_GET['id'];
        $objProductModel = new ProductModel();
       
        $objProductModel->delete($id);
        $this->redirect('admin.php?controller=products&action=view');     

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
    public function search()
    {   
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $productName = $_POST['productName'];

            $objProductModel = new ProductModel();          
            $items = $objProductModel->search($productName);

        }
        include_once 'view/Admins/product/search.php';
    }
    
  
}



?>