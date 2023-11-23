<?php if (isset($_GET['dangkytc'])) { ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Đăng ký thành công",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php } ?>

<?php if (isset($_GET['dangnhaptc'])) { ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Đăng nhập thành công",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php } ?>
<?php if (isset($_GET['dangxuattc'])) { ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Đăng xuất thành công",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php } ?>
<?php if (isset($_GET['changepasswordtc'])) { ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Đổi mật khẩu thành công",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php } ?>
<?php if (isset($_GET['changeinfotc'])) { ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Thay đổi thông tin thành công",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php } ?>
