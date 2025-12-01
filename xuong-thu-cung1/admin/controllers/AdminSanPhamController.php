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

        //Xoa session sau khi load trang
        deleteSessionError();
    }
    public function postAddSanPham(){
        //ham nay dung de xu ly them du lieu
        // Kiem tra xem du lieu co phai duoc submit lên không
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Lấy ra dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;

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
            if($hinh_anh['error'] !== 0){
                $errors['trang_thai'] = 'Phải chọn ảnh sản phẩm';
            }
            
            $_SESSION['error'] = $errors;

            //Nếu không có lỗi thì tiến hành thêm sản phảm
            if (empty($errors)){
                //Nếu không có lỗi thì tiến hành thêm sản phẩm
                // var_dump('Oke');

                $san_pham_id =$this->modelSanPham->insertSanPham($ten_san_pham,
                                                   $gia_san_pham,
                                                   $gia_khuyen_mai,
                                                   $so_luong,
                                                   $ngay_nhap,
                                                   $danh_muc_id,
                                                   $trang_thai,
                                                   $mo_ta,
                                                    $file_thumb);

                // Xu ly them album anh san pham img_array 
                if(!empty($img_array['name'])){
                    foreach($img_array['name']as $key => $value){
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key],
                        ];

                        $link_hinh_anh = uploadFiles($file, './uploads/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }                                   
                header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=san-pham' );
                exit();
            }else{
                //Tra ve form va loi
                //dat chi thi xoa session sau khi hien thi form
                $_SESSION ['flash'] = true;
                header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=form-them-san-pham' );
                exit();
            }
        }
    }
    public function formEditSanPham(){
        //ham nay dung de hien thi form nhap
        // Lay ra thong tin
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this -> modelSanPham -> getListAnhSanPham($id);
        $listDanhMuc = $this -> modelDanhMuc ->getAllDanhMuc();
        if($sanPham){
            require_once __DIR__ . '/../views/sanpham/editSanPham.php';
            deleteSessionError();
        }else{
            header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=san-pham' );
                exit();
        }
        
     }
     public function postEditSanPham(){
        //ham nay dung de xu ly them du lieu
        // Kiem tra xem du lieu co phai duoc submit lên không
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Lấy ra dữ liệu
            //Lay ra du lieu cu cua san pham
            
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            //truy van
            $sanPhamOld =  $this->modelSanPham-> getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; // Lay anh cu de phuc vu cho sua anh

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;





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
            
            $_SESSION['error'] = $errors;
            // var_dump($errors);die;
            //logic sua anh
            if(isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK){
                $new_file = uploadFiles($hinh_anh, './uploads/');
                if(!empty($old_file)){
                    deleteFile($old_file);
                }
            }else{
                $new_file = $old_file;
            }

            //Nếu không có lỗi thì tiến hành thêm sản phảm
            if (empty($errors)){
                
                //Nếu không có lỗi thì tiến hành thêm sản phẩm
                // var_dump('Oke');
                
                $this->modelSanPham->updateSanPham(
                                                        $san_pham_id,
                                        $ten_san_pham,
                                                   $gia_san_pham,
                                                   $gia_khuyen_mai,
                                                   $so_luong,
                                                   $ngay_nhap,
                                                   $danh_muc_id,
                                                   $trang_thai,
                                                   $mo_ta,
                                                    $new_file);

                                                  
                header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=san-pham' );
                exit();
            }else{
                //Tra ve form va loi
                //dat chi thi xoa session sau khi hien thi form
                $_SESSION ['flash'] = true;
                header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=form-sua-san-pham&id_san_pham=' . $san_pham_id );
                exit();
            }
        }
    }

    public function deleteSanPham() {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        
        $listAnhSanPham = $this -> modelSanPham-> getListAnhSanPham($id);
        if($sanPham){
            deleteFile($sanPham['hinh_anh']);
            $this -> modelSanPham->destroySanPham($id);
        }
        if($listAnhSanPham){
            foreach($listAnhSanPham as $key => $anhSp){
                deleteFile($anhSp['link_hinh_anh']);
                $this -> modelSanPham ->destroyAnhSanPham($anhSp['id']);
            }
        }
        header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=san-pham' );
                exit();
    }
    public function detailSanPham(){
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listSanPham = $this -> modelSanPham -> getListAnhSanPham($id);
        if($sanPham){
            require_once __DIR__ . '/../views/sanpham/detailSanPham.php';
        }else{
            header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=san-pham' );
                exit();
        }
        
     }
    //Sua anh cu
    // -sua anh  cu:
    // +Them anh moi
    // +không thêm ảnh mới
    // -khong sua anh cu
    // +thêm ảnh mới
    // +không thêm ảnh mới
    // -xoa ảnh cũ
    // +thêm ảnh mới
    // +không thêm ảnh mới

     public function postEditAnhSanPham(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $san_pham_id = $_POST['san_pham_id'] ?? '';

            //Lay danh sach anh hien tai cua san pham
            $listAnhSanPhamCurrent = $this ->modelSanPham ->getListAnhSanPham($san_pham_id);

            //Xu ly cac anh duoc gui tu form

            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete'] ) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];

            //Khai bao mang de luu anh them moi hoac thay the anh cu
            $upload_file = [];

            //Upload anh moi hoac thay the anh cu
            foreach($img_array['name'] as $key=>$value){
                if($img_array['error'][$key] == UPLOAD_ERR_OK){
                    $new_file = uploadFileAlbum($img_array, './upload/', $key);
                    if($new_file){
                        $upload_file[]= [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }

            //Luu anh moi vao db va xoa anh cu
            foreach($upload_file as $file_info){
                if($file_info['id']){
                    $old_file = $this -> modelSanPham-> getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];

                    //Cap nhat anh cu
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

                    deleteFile($old_file);

                }else{
                    //Them anh moi
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }

            //Xu ly xoa anh  
            foreach($listAnhSanPhamCurrent as $anhSP){
                $anh_id = $anhSP['id'];
                if(in_array($anh_id, $img_delete)){
                    //Xoa anh
                    $this->modelSanPham->destroyAnhSanPham($anh_id);

                    //Xoa file 
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }
            header("Location:" . 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=san-pham' );
                exit();
        }
     }

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