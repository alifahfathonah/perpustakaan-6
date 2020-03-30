<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    harga: <input type="text" name="dio" id="dava" value="<?php echo $harga ?>" />
    <select id="ini">
        <option selected>-Silahkan Pilih-</option>
        <option value="1">1</option>
        <option value="2">2</option>
    </select>

    Harga Total: <span id="sor"></span>

    <script type="text/javascript">
        $(document).ready(function(){

            var hargaAwal = $('#dava').val();

            $('#ini').change(function(event) {
                var hargaTotal;
                hargaTotal = hargaAwal * this.value;
                $('#sor').text(hargaTotal);
            });
        });
    </script>
</body>
</html>