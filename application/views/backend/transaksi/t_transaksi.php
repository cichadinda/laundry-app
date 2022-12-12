<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
       <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
       <div class="card shadow mb-4">
            <div class="card-body">
                <form  method="post" action="<?= base_url()?>paket/simpan">
                    <div class="form-group">
                        <input type="text" name="kode_transaksi"  class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <select name="kode_konsumen" class="form-control">
                            <option value="" selected> - Pilih Konsumen - </option>
                            <?php 
                                foreach ($konsumen as $row) {?>
                                    <option value="<?= $row->kode_konsumen?>"> <?= $row->nama_konsumen;?></option>
                              <?php }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="kode_paket" id="paket" class="form-control">
                            <option value="" selected> - Pilih Paket - </option>
                            <?php 
                                foreach ($paket as $row) {?>
                                    <option value="<?= $row->kode_paket?>"> <?= $row->nama_paket;?></option>
                              <?php }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                       <input type="text" id="harga" class="form-control" placeholder="Harga Paket">
                    </div>

                    <div class="form-group">
                        <input type="number" name="harga_paket" class="form-control" placeholder="Input Harga Paket" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"> Simpan </button>
                        <a href="<?= base_url()?>konsumen" class="btn btn-danger"> Batal </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>


<script>
     $('#paket').change(function(){
        var kode_paket = $(this).val();

        $.ajax({
            url : '<?= base_url()?>transaksi/getHargaPaket',
            data : {kode_paket : kode_paket},
            method : 'post',
            dataType : 'JSON',
            success : function(){
                $('#harga').val(hasil.harga_paket);
            }
        });
     });

     
</script>

