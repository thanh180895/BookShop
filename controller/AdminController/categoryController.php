<?php
include_once 'model/AdminModel/categoryModel.php';

class CategoryController 
{ 
    public function view()
    {
        $objCategoryModel = new CategoryModel();
        $items = $objCategoryModel->getAll();
        
        include_once 'view/Admins/category/list.php';
    }
    public function create()
    {
        
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $categoryCode = $_POST['categoryCode'];
            $categoryName = $_POST['categoryName'];
         
            $objCategoryModel = new CategoryModel();
            $objCategoryModel->add($categoryCode, $categoryName);
            $this->redirect('admin.php?controller=categorys&action=view');
            
        }
        include_once 'view/Admins/category/add.php';
       

    }
    public function update()
    {
        $id = $_GET['id'];    
        $objcategoryModel = new CategoryModel();
        $items = $objcategoryModel->getOne($id);
        
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $categoryCode = $_POST['categoryCode'];
            $categoryName = $_POST['categoryName'];
          

            
            $objcategoryModel->edit($id, $categoryCode, $categoryName);
            $this->redirect('admin.php?controller=categorys&action=view');
            
        }    
        include_once 'view/Admins/category/edit.php';

    }
    public function delete()
    {
        $id = $_GET['id'];
        $objcategoryModel = new CategoryModel();
       
        $objcategoryModel->delete($id);
        $this->redirect('admin.php?controller=categorys&action=view');     

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