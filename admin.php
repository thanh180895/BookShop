<?php
include './database.php';
include 'layouts/header.php';
include 'layouts/dasboar.php';

$controller = '';
$action     = '';

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if ($controller == 'products') {
    include_once 'controller/AdminController/productController.php';
    $objProductController = new ProductController();

    if ($action == 'view') {
        $objProductController->view();
    }
    if ($action == 'add') {
        $objProductController->create();
    }
    if ($action == 'update') {
        $objProductController->update();
    }
    if ($action == 'delete') {
        $objProductController->delete();
    }
    if ($action == 'search') {
        $objProductController->search();
    }
}

if ($controller == 'categorys') {
    include_once 'controller/AdminController/categoryController.php';
    $objCategoryController = new CategoryController();

    if ($action == 'view') {
        $objCategoryController->view();
    }
    if ($action == 'add') {
        $objCategoryController->create();
    }
    if ($action == 'update') {
        $objCategoryController->update();
    }
    if ($action == 'delete') {
        $objCategoryController->delete();
    }
}
if ($controller == 'users') {
    include_once 'controller/AdminController/userController.php';
    $objUserController = new UserController();

    if ($action == 'view') {
        $objUserController->view();
    }
    if ($action == 'add') {
        $objUserController->create();
    }
    if ($action == 'update') {
        $objUserController->update();
    }

    if ($action == 'delete') {
        $objUserController->delete();
    }
}
if ($controller == 'orders') {
    include_once 'controller/AdminController/orderController.php';
    $objOrderController = new OrderController();

    if ($action == 'view') {
        $objOrderController->view();
    }
    if ($action == 'add') {
        $objOrderController->create();
    }
    if ($action == 'update') {
        $objOrderController->update();
    }
    if ($action == 'delete') {
        $objOrderController->delete();
    }
}
if ($controller == 'orderdetails') {
    include_once 'controller/AdminController/orderdetailController.php';
    $objOrderdetailController = new OrderdetailController();

    if ($action == 'view') {
        $objOrderdetailController->view();
    }
    if ($action == 'add') {
        $objOrderdetailController->create();
    }
    if ($action == 'update') {
        $objOrderdetailController->update();
    }
    if ($action == 'delete') {
        $objOrderdetailController->delete();
    }
}

?>
<?php include 'layouts/footer.php'; ?>   
