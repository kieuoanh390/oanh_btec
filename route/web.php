<?php
//localhost/management-student/index.php?=login&m=index
// c = tên của controller nằm trong thư mục controller
// m = tên của hàm nằm trong file controller trong thư mục controller
$c =trim($_GET['c']??'login');//controller mặc định là login
$c = ucfirst($c);//Viết hoa chữ cái đầu
switch($c){
    case 'Login':
        require "controller/LoginController.php";
        break;
    case 'Dashboard';
        require "controller/DashboardController.php";
        break;
    case 'Department';
        require "controller/DepartmentController.php";
        break;
    case 'Courses':
        require "controller/CoursesController.php";
        break;
    case 'User':
            require "controller/UserController.php";
            break;
    default:
        require "controller/LoginController.php";
        break;
}