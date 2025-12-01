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
          <h1>Quản lý danh mục sản phẩm</h1>
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
                <h3 class="card-title">Sửa danh mục sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=sua-danh-muc' ?>" method="post">
                <input type="text" name="id" value="<?= $danhmuc['id']?>" hidden >
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" class="form-control" name="ten_danh_muc" value="<?= $danhmuc['ten_danh_muc']?>" placeholder="Nhập tên danh mục">
                    <?php if(isset($errors['ten_danh_muc'])){ ?>
                        <p class="text-danger"><?= $errors['ten_danh_muc'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="mo_ta" id=""class="form-control" placeholder="Nhập mô tả"><?= $danhmuc['mo_ta']?>
                    </textarea>
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