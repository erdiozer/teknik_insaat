<?php require_once "header.php"; ?>

<?php
$cari;
if (isset($_GET['cari_id'])) {
    $sorgu = $db->prepare("SELECT * FROM cari WHERE id={$_GET['cari_id']}");
    $sorgu->execute();
    $cari = $sorgu->fetch(PDO::FETCH_ASSOC);
    //extract($cari);
    //print_r($cari);
}

if (isset($_POST['cariguncelle'])) {

    $sorgu = $db->prepare("UPDATE cari SET
            adsoyad=:cari_adsoyad,
            unvan=:cari_unvan,
            tel=:cari_tel,
            eposta=:cari_eposta,
            tc_vergino=:cari_vergino,
            vergidaire=:cari_vergidaire,
            website=:cari_website,
            il=:cari_il,
            adres=:cari_adres,
            guncelleme_tarihi=:guncelleme_tarihi,
            guncelleyen=:guncelleyen,
            durum=:durum WHERE id=:cari_id
            ");

    date_default_timezone_set('Europe/Istanbul'); //İstanbul Türkiye
    setlocale(LC_ALL, 'tr-TR', 'tr', 'turkish');
    list($day, $month, $year, $hour, $min, $sec) = explode("/", date('d/m/Y/h/i/s'));
    $zaman = $day . '/' . $month . '/' . $year . ' ' . $hour . ':' . $min . ':' . $sec;

    $sonuc = $sorgu->execute(
        array(
            'cari_adsoyad' => $_POST['cari_adsoyad'],
            'cari_unvan' => $_POST['cari_unvan'],
            'cari_tel' => $_POST['cari_tel'],
            'cari_eposta' => $_POST['cari_eposta'],
            'cari_vergino' => $_POST['cari_vergino'],
            'cari_vergidaire' => $_POST['cari_vergidaire'],
            'cari_website' => $_POST['cari_website'],
            'cari_il' => $_POST['cari_il'],
            'cari_adres' => $_POST['cari_adres'],
            'guncelleme_tarihi' => $zaman,
            'guncelleyen' => "Admin",
            'durum' => 1,
            'cari_id' => $_POST['cari_id']
        )
    );

    $cariAdSoyad = $_POST['cari_adsoyad'];
    $cariUnvan = $_POST['cari_unvan'];
    if ($_FILES['cari_resim']['error'] == 0) {
        // echo "Dosya yüklendi";
        // echo "<pre>";
        // print_r($_FILES['cari_resim']);

        $gecici_isim = $_FILES['cari_resim']['tmp_name'];
        $dosya_ismi = $_FILES['cari_resim']['name'];
        $sayi = rand(100000, 999999);
        $isim = $sayi . $dosya_ismi;

        move_uploaded_file($gecici_isim, "img/cari/$isim");

        $sorgu = $db->prepare("UPDATE cari SET resim=:cari_resim WHERE adsoyad='" . $cariAdSoyad . "' AND unvan='" . $cariUnvan . "' AND eklenme_tarihi='" . $zaman . "'");
        $sonuc = $sorgu->execute(
            array(
                "cari_resim" => $isim
            )
        );
        echo $_POST['cari_adsoyad'];
    }

    if ($sonuc) {
        // header("location:cari_duzenle.php?cari_id=".$cari["id"]."durum=ok");
        header("location:cariler.php?durum=ok");
    } else {
        // header("location:cari_duzenle.php?cari_id=".$cari["id"]."durum=no");
        header("location:cariler.php?durum=no");
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="font-weight-bold text-primary">Cari Düzenle</h5>
                </div>
                <div class="card-body">

                    <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

                        <div class="form-row ">

                            <div class="col-md-6 form-group mt-3" style="">
                                <input type="hidden" name="cari_id" value="<?php echo $_GET['cari_id'] ?>">
                                <div class="form-row">
                                    <div class="col-md-12 form-group">
                                        <label>Ad Soyad</label>
                                        <input type="text" value="<?php echo $cari['adsoyad'] ?>" name="cari_adsoyad"
                                            id="cari_adsoyad" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 form-group">
                                        <label>Ticari Unvan</label>
                                        <input type="text" value="<?php echo $cari['unvan'] ?>" name="cari_unvan"
                                            id="cari_unvan" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group justify-content-center m-auto">
                                <div class="form-row mb-1">
                                    <img src='img/cari/<?php echo $cari['resim'] ?>' alt=""
                                        class="img-fluid col-md-5 m-auto " style="width:160px; height:auto;">
                                </div>
                                <div class="form-row">
                                    <input type="file" value="<?php echo $cari['resim'] ?>" name="cari_resim"
                                        class="form-control text-s m-auto mt-2" style="width:70%">
                                </div>
                            </div>

                        </div>

                        <!-- <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Ticari Unvan</label>
                                <input type="text" name="cari_unvan" id="cari_unvan" class="form-control">
                            </div>
                        </div> -->
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Telefon Numarası</label>
                                <input type="text" value="<?php echo $cari['tel'] ?>" name="cari_tel" id="cari_tel"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-posta</label>
                                <input type="text" value="<?php echo $cari['eposta'] ?>" name="cari_eposta"
                                    id="cari_eposta" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>TC Kimlik / Vergi Numarası</label>
                                <input type="text" value="<?php echo $cari['tc_vergino'] ?>" name="cari_vergino"
                                    id="cari_vergino" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Vergi Dairesi</label>
                                <input type="text" value="<?php echo $cari['vergidaire'] ?>" name="cari_vergidaire"
                                    id="cari_vergidaire" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Websitesi</label>
                                <input type="text" value="<?php echo $cari['website'] ?>" name="cari_website"
                                    id="cari_website" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>İl</label>
                                <input type="text" value="<?php echo $cari['il'] ?>" name="cari_il" id="cari_il"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label>Adres</label>
                                <textarea value="" name="cari_adres" id="cari_adres" rows="3"
                                    class="form-control"><?php echo $cari['adres'] ?></textarea>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" name="cariguncelle" class="btn btn-info btn-lg">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once "footer.php"; ?>