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