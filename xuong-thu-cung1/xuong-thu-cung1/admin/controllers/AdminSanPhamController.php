<?php

class AdminSanPhamController{

    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachSanPham(){

        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once __DIR__ . '/../views/sanpham/listSanPham.php';

    }

    public function formAddSanPham(){
        //ham nay dung de hien thi form nhap
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once __DIR__ . '/../views/sanpham/addSanPham.php';
    }
    public function postAddSanPham(){
        //ham nay dung de xu ly them du lieu
        // Kiem tra xem du lieu co phai duoc submit lên không
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Lấy ra dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $so_luong = $_POST['so_luong'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            $mo_ta = $_POST['mo_ta'];

            $hinh_anh = $_FILES['hinh_anh'];

            //Lưu hình ảnh vào
            $file_thumb = uploadFiles($hinh_anh, './uploads/');

            // Mảng hình ảnh
            $img_array = $_FILES['img_array'];




            //Tao 1 mang trong de chua du lieu
            $errors = [];
            if(empty($ten_san_pham)){
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if(empty($gia_san_pham)){
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if(empty($gia_khuyen_mai)){
                $errors['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
            }
            if(empty($so_luong)){
                $errors['so_luong'] = 'Số lượng không được để trống';
            }
            if(empty($ngay_nhap)){
                $errors['ngay_nhap'] = 'Ngày nhập không được để trống';
            }
            if(empty($danh_muc_id)){
                $errors['danh_muc_id'] = 'Danh mục phải chọn';
            }
            if(empty($trang_thai)){
                $errors['trang_thai'] = 'Trạng thái phải chọn';
            }
            

            //Nếu không có lỗi thì tiến hành thêm sản phảm
            if (empty($errors)){
                //Nếu không có lỗi thì tiến hành thêm sản phẩm
                // var_dump('Oke');

                $this->modelSanPham->insertSanPham($ten_san_pham,
                                                   $gia_san_pham,
                                                   $gia_khuyen_mai,
                                                   $so_luong,
                                                   $ngay_nhap,
                                                   $danh_muc_id,
                                                   $trang_thai,
                                                   $mo_ta,
                                                    $file_thumb);
                header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=san-pham' );
                exit();
            }else{
                //Tra ve form va loi
                require_once __DIR__ . '/../views/sanpham/addSanPham.php';
            }
        }
    }
    // public function formEditDanhMuc(){
    //     //ham nay dung de hien thi form nhap
    //     // Lay ra thong tin
    //     $id = $_GET['id_san_pham'];
    //     $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
    //     if($danhmuc){
    //         require_once __DIR__ . '/../views/danhmuc/editDanhMuc.php';
    //     }else{
    //         header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=danh-muc' );
    //             exit();
    //     }
        
    // }
    // public function postEditDanhMuc(){
    //     //ham nay dung de xu ly them du lieu
    //     // Kiem tra xem du lieu co phai duoc submit lên không
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         //Lấy ra dữ liệu
    //         $ten_san_pham = $_POST['ten_san_pham'];
    //         $mo_ta = $_POST['mo_ta'];
    //         $id = $_POST['id'];

    //         //Tao 1 mang trong de chua du lieu
    //         $errors = [];
    //         if(empty($ten_san_pham)){
    //             $errors['ten_san_pham'] = 'Tên danh mục không được để trống';
    //         }

    //         //Nếu không có lỗi thì tiến hành sua danh mục
    //         if (empty($errors)){
    //             //Nếu không có lỗi thì tiến hành thêm danh mục
    //             // var_dump('Oke');

    //             $this->modelDanhMuc->updateDanhMuc($id , $ten_san_pham, $mo_ta   ); 
    //             header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=danh-muc' );
    //             exit();
    //         }else{
    //             //Tra ve form va loi
    //             $danhMuc = ['id' => $id, 'ten_san_pham' => $ten_san_pham, 'mo_ta' => $mo_ta];
    //             require_once __DIR__ . '/../views/danhmuc/editDanhMuc.php';
    //         }
    //     }
    // }

    // public function deleteDanhMuc() {
    //     $id = $_GET['id_san_pham'];
    //     $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);

    //     if($danhmuc){
    //         $this -> modelDanhMuc->destroyDanhMuc($id);
    //     }
    //     header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=danh-muc' );
    //             exit();
    // }
}