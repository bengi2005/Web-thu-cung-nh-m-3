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

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">

                        <div class="col-12">
                            <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">

                        </div>
                        <div class="col-12 product-image-thumbs">
                            <!-- <?php foreach ($listAnhSanPham as $key->$anhSp): ?>
                <div class="product-image-thumb active"><img src="<?= BASE_URL . $anhSp[$key]['link_hinh_anh'] ?>" alt="Product Image"></div>
                <?php endforeach ?> -->
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Tên sản phẩm: <?= $sanPham['ten_san_pham'] ?></h3>


                        <hr>


                        <h4 class="mt-3">Giá tiền: <small><?= $sanPham['gia_san_pham'] ?></small></h4>
                        <h4 class="mt-3">Giá khuyến mãi: <small><?= $sanPham['gia_khuyen_mai'] ?></small></h4>
                        <h4 class="mt-3">Số lượng: <small><?= $sanPham['so_luong'] ?></small></h4>
                        <h4 class="mt-3">Lượt xem: <small><?= $sanPham['luot_xem'] ?></small></h4>
                        <h4 class="mt-3">Ngày nhập: <small><?= $sanPham['ngay_nhap'] ?></small></h4>
                        <h4 class="mt-3">Danh mục: <small><?= $sanPham['ten_danh_muc'] ?></small></h4>
                        <h4 class="mt-3">Trạng thái: <small><?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?> </small></h4>


                    </div>
                </div>
                <!-- <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                href="#binh_luan" role="tab" aria-controls="product-desc"
                                aria-selected="true">Bình luận của sản phẩm</a>
                
                        </div>
                    </nav> -->
                    <!-- <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active " id="binh_luan" role="tabpanel"
                            aria-labelledby="product-desc-tab"> 
                            <div class="container-fluid">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên người bình luận</th>
                                        <th>Nội dung</th>
                                        <th>Ngày đăng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Công Bằng</td>
                                        <td>Chó hơi già</td>
                                        <td>20/11/2025</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                                                <a href="#"><button class="btn btn-danger">Xóa</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Phú</td>
                                        <td>Chó hơi già</td>
                                        <td>20/11/2025</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                                                <a href="#"><button class="btn btn-danger">Xóa</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                       </div>
                    </div>
                </div> -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên người bình luận</th>
                                        <th>Nội dung</th>
                                        <th>Ngày đăng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Công Bằng</td>
                                        <td>Chó hơi già</td>
                                        <td>20/11/2025</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                                                <a href="#"><button class="btn btn-danger">Xóa</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Phú</td>
                                        <td>Chó hơi già</td>
                                        <td>20/11/2025</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                                                <a href="#"><button class="btn btn-danger">Xóa</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
  </div>
  
</div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--Footer-->
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
<!--endFooter-->

<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</body >
</html >