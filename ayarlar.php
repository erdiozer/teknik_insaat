<?php require_once "header.php"; ?>

<?php 
    if (isset($_POST['ayarKaydet'])) {
        $sorgu = $db->prepare("UPDATE ayarlar SET
            site_baslik=:site_baslik,
            site_aciklama=:site_aciklama,
            site_link=:site_link
            ");
        $sonuc = $sorgu->execute(array(
            "site_baslik" => $_POST["site_baslik"],
            "site_aciklama" => $_POST["site_aciklama"],
            "site_link" => $_POST["site_link"],
        ));

        // print_r($_FILES);
        // exit;
        // Array ( [site_logo] => Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 ) )

        // Array
        //     (
        //         [name] => WhatsApp Image 2024-01-20 at 19.06.21 (3).jpeg
        //         [type] => image/jpeg
        //         [tmp_name] => D:\PROGRAMLAR\xampp\tmp\php22EC.tmp
        //         [error] => 0
        //         [size] => 3226367
        //     )

        if ($_FILES['site_logo']['error']==0) {
            // echo "Dosya yüklendi";
            // echo "<pre>";
            // print_r($_FILES['site_logo']);
            $gecici_isim = $_FILES['site_logo']['tmp_name'];
            $dosya_ismi = $_FILES['site_logo']['name'];
            $sayi = rand(100000,999999);
            $isim = $sayi.$dosya_ismi;

            move_uploaded_file($gecici_isim,"img/$isim");

            $sorgu = $db->prepare("UPDATE ayarlar SET
                site_logo=:site_logo
                ");
            $sonuc = $sorgu->execute(array(
                "site_logo" => $isim
                ));

        }

        if ($sonuc) {
            header("location:ayarlar.php?durum=ok");
        } else {
            header("location:ayarlar.php?durum=no");
        }
    }
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Ayarlar Sayfası</h5>
                </div>
                <div class="card-body">
                                                                           <!-- dosya yükleme -->
                    <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data"> 
                        <div class="form-row">
                            <div class="col-md6 form-group">
                                <label>Site Başlığı</label>
                                <input type="text" name="site_baslik" value="<?php echo $ayarcek['site_baslik'] ?>" placeholder="Site başlığı" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md6 form-group">
                                <label>Site Açıklaması</label>
                                <input type="text" name="site_aciklama" value="<?php echo $ayarcek['site_aciklama'] ?>" placeholder="Site açıklaması" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md6 form-group">
                                <label>Site Linki</label>
                                <input type="text" name="site_link" value="<?php echo $ayarcek['site_link'] ?>" placeholder="Site linki" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md6 form-group">
                                <label>Site Logo</label>
                                <input type="file" name="site_logo" value="" class="form-control">
                            </div>
                        </div>

                        <button type="submit" name="ayarKaydet" class="btn btn-info">Kaydet</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer.php"; ?>