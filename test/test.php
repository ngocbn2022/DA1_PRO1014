<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        <?php
        $a = 1;
        for ($i = 0; $i < $a; $i++) { ?>
            <input type="text">
            <input type="submit">
            <button onclick="count(<?= $a ?>);">thêm mới</button>
        <?php } ?>
        <?=$a ?>;
    </form>
    <script>
        function count(index) {
            index++;
        }
   </script>
</body>

</html>