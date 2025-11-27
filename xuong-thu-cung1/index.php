<?php 

// Require file Common
require_once __DIR__ . '/commons/env.php';
 // Khai báo biến môi trường
require_once __DIR__ . '/commons/function.php';
 // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once __DIR__ . '/controllers/HomeController.php';


// Require toàn bộ file Models
require_once __DIR__ . '/models/Student.php';
require_once __DIR__ . '/models/SanPham.php';


// Route
$act = $_GET['act'] ?? '/';
// var_dump($_GET['act']);
// die;
// if($_GET['act'])
// {
//     $act = $_GET['act'];
// }else{
//     $act = '/';
// }

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new HomeController())-> home(),
//BASE_URL/?act=trangchu
    'trangchu' => (new HomeController())-> trangChu(),
//BASE_URL/?act=danh-sach-san-pham
    'danh-sach-san-pham' => (new HomeController())-> danhSachSanPham()
};