<?php

class AdminDanhMucController{

    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc(){

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        require_once __DIR__ . '/../views/danhmuc/listDanhMuc.php';

    }

    public function formAddDanhMuc(){
        //ham nay dung de hien thi form nhap
        require_once __DIR__ . '/../views/danhmuc/addDanhMuc.php';
    }
    public function postAddDanhMuc(){
        //ham nay dung de xu ly them du lieu
        // Kiem tra xem du lieu co phai duoc submit lên không
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Lấy ra dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            //Tao 1 mang trong de chua du lieu
            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            //Nếu không có lỗi thì tiến hành thêm danh mục
            if (empty($errors)){
                //Nếu không có lỗi thì tiến hành thêm danh mục
                // var_dump('Oke');

                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc,$mo_ta);
                header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=danh-muc' );
                exit();
            }else{
                //Tra ve form va loi
                require_once __DIR__ . '/../views/danhmuc/addDanhMuc.php';
            }
        }
    }
    public function formEditDanhMuc(){
        //ham nay dung de hien thi form nhap
        // Lay ra thong tin
        $id = $_GET['id_danh_muc'];
        $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if($danhmuc){
            require_once __DIR__ . '/../views/danhmuc/editDanhMuc.php';
        }else{
            header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=danh-muc' );
                exit();
        }
        
    }
    public function postEditDanhMuc(){
        //ham nay dung de xu ly them du lieu
        // Kiem tra xem du lieu co phai duoc submit lên không
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Lấy ra dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $id = $_POST['id'];

            //Tao 1 mang trong de chua du lieu
            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            //Nếu không có lỗi thì tiến hành sua danh mục
            if (empty($errors)){
                //Nếu không có lỗi thì tiến hành thêm danh mục
                // var_dump('Oke');

                $this->modelDanhMuc->updateDanhMuc($id , $ten_danh_muc, $mo_ta   ); 
                header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=danh-muc' );
                exit();
            }else{
                //Tra ve form va loi
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once __DIR__ . '/../views/danhmuc/editDanhMuc.php';
            }
        }
    }

    public function deleteDanhMuc() {
        $id = $_GET['id_danh_muc'];
        $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);

        if($danhmuc){
            $this -> modelDanhMuc->destroyDanhMuc($id);
        }
        header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=danh-muc' );
                exit();
    }
}