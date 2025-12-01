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
                <div class="col-sm-11">
                    <h1>Sửa thông tin sản phẩm: <?= $sanPham['ten_san_pham'] ?></h1>
                </div>
                <div class="col-sm-1 ">
                    <a href="<?= 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=san-pham' ?>"
                        class="btn btn-secondary">Quay lai</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin sản phẩm</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form
                        action="<?= 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=sua-san-pham' ?>"
                        method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                <label for="inputName">Tên sản phẩm</label>
                                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control"
                                    value="<?= $sanPham['ten_san_pham'] ?>">
                                <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="gia_san_pham">Giá sản phẩm</label>
                                <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control"
                                    value="<?= $sanPham['gia_san_pham'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                                <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control"
                                    value="<?= $sanPham['gia_khuyen_mai'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="hinh_anh">Hình ảnh</label>
                                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="so_luong">Số lượng</label>
                                <input type="number" id="so_luong" name="so_luong" class="form-control"
                                    value="<?= $sanPham['so_luong'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="ngay_nhap">Ngày nhập</label>
                                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control"
                                    value="<?= $sanPham['ngay_nhap'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Danh mục sản phẩm</label>
                                <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                                    <?php foreach ($listDanhMuc as $danhMuc): ?>
                                        <option value="<?= $danhMuc['id'] ?>" <?= ($danhMuc['id'] == $sanPham['danh_muc_id']) ? 'selected' : '' ?>>
                                            <?= $danhMuc['ten_danh_muc'] ?>
                                        </option>

                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="trang_thai">Trạng thái sản phẩm</label>
                                <select id="trang_thai" name="trang_thai" class="form-control custom-select">

                                    <option <?= $sanPham['id'] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                                    <option <?= $sanPham['id'] == 2 ? 'selected' : '' ?> value="2">Dừng bán</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mo_ta">Mô tả sản phẩm</label>
                                <textarea id="mo_ta" class="form-control" name="mo_ta"
                                    rows="4"><?= $sanPham['mo_ta'] ?></textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <button class="btn btn-primary" type="submit"> Sua thong tin</button>
                        </div>
                </div>
                </form>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <!-- /.card -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Album ảnh sản phẩm</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card-body p-0">



                    <div class="table-responsive">
                        <table id="faqs" class="table table-hover">
                            <form
                                action="<?= 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=sua-san-pham' ?>"
                                method="post" enctype="multipart/form-data">
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>File</th>
                                        <th>
                                            <div class="text-center"><button onclick="addfaqs();" type="button"
                                                    class="badge badge-success"><i class="fa fa-plus"></i> Thêm</button>
                                            </div>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                    <input type="hidden" id="image_delete" name="img_delete">
                                    <?php foreach ($listAnhSanPham as $key => $value): ?>
                                        <tr id="faqs-row-<?= $key ?>">
                                            <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">

                                            <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" style="width: 50px; height: 50px" alt=""></td>
                                            <td><input type="file" name="img_array[]" placeholder="Product name" class="form-control"></td>

                                            <td class="mt-10"><button class="badge badge-danger" type="button" onclick="removeRow( <?= $key ?>,<?= $value['id'] ?>  )"><i class="fa fa-trash"></i>
                                                    Delete</button></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                        </table>
                    </div>
                    <div class="text-center"><button onclick="addfaqs();" class="badge badge-success"><i
                                class="fa fa-plus"></i> ADD
                            NEW</button></div>

                </div>

                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <button class="btn btn-primary" type="sumbit"> Sua thong tin</button>
                </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--Footer-->
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
<!--endFooter-->

</body>

<script>
    var faqs_row = <?= count($listAnhSanPham); ?>;
    function addfaqs() {
        console.log('asn')
        html = '<tr id="faqs-row-' + faqs_row + '">';
        html += '<td><img src="https://www.bing.com/th/id/OIP.spCHi4tTc5cIA3F7sr9lHwAAAA?w=186&h=211&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2" style="width: 50px; height: 50px" alt=""></td>';
        html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row +' , null);"><i class="fa fa-trash"></i> Delete</button></td>';

        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }

    function removeRow(rowId, imgId){
        $('#faqs-row-' + rowId).remove();
        if(imgId !== null){
            var imgDeleteInput = document.getElementById('image_delete')
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script>

</html>