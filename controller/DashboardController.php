<?php
$m = trim($_GET['m']??'index');//hàm mặc định trong controller tên là index
$m = strtolower($m);// vietes thường tất cả các tên hàm 
switch($m){
    case 'index':
        index();
    break;
    default:
    index();
    break;
}
function index(){
    //phai daang nhao moi duoc su dung cuc nang nay
    if(!isLoginUser()){
        header("Location:index.php");
        exit();

}
    require 'view/dashboard/index_view.php';

}