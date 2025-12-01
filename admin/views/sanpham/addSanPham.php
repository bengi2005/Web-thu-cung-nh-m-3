<!--header-->
<?php
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/navbar.php';
require_once __DIR__ . '/../layout/sidebar.php';
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý danh sách thú cưng</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=them-san-pham' ?>" method="post" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="form-group col-12" >
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên san phẩm">
                    <?php if(isset($_SESSION['error']['ten_san_pham'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Giá sản phẩm</label>
                    <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập giá sản phẩm">
                    <?php if(isset($_SESSION['error']['gia_san_pham'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Giá khuyến mãi</label>
                    <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi">
                    <?php if(isset($_SESSION['error']['gia_khuyen_mai'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="hinh_anh">
                    <?php if(isset($_SESSION['error']['hinh_anh'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Album ảnh</label>
                    <input type="file" class="form-control" name="img_array[]" multiple>
                    <?php if(isset($_SESSION['error']['hinh_anh'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Số lượng</label>
                    <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng">
                    <?php if(isset($_SESSION['error']['so_luong'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Ngày nhập</label>
                    <input type="date" class="form-control" name="ngay_nhap" placeholder="Nhập ngày nhập">
                    <?php if(isset($_SESSION['error']['ngay_nhap'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6" >
                    <label>Danh mục</label>
                    <select name="danh_muc_id" id="exampleFormControlSelect1" class="form-control">
                      <option selected disabled>Chọn danh mục</option>

                      <?php foreach($listDanhMuc as $danhMuc): ?>
                            <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                       <?php endforeach ?> 
                    </select>
                    <?php if(isset($_SESSION['error']['danh_muc_id'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Trạng thái</label>
                    <select name="trang_thai" id="exampleFormControlSelect1" class="form-control">
                      <option selected disabled>Chọn danh mục</option>
                      <option value="1">Còn Bán</option> 
                      <option value="2">Hết hàng</option> 
                    </select>
                    <?php if(isset($_SESSION['error']['trang_thai'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group col-12">
                    <label>Mô tả</label>
                    <textarea name="mo_ta" id=""class="form-control" placeholder="Nhập mô tả"></textarea>
                  </div>
                      
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--Footer-->
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
<!--endFooter-->

</body >
</html >