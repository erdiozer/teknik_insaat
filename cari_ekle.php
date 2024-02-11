<?php require_once "header.php"; ?>

<?php
if (isset($_POST['cariekle'])) {

    $sorgu = $db->prepare("INSERT INTO cari SET
            adsoyad=:cari_adsoyad,
            unvan=:cari_unvan,
            tel=:cari_tel,
            eposta=:cari_eposta,
            tc_vergino=:cari_vergino,
            vergidaire=:cari_vergidaire,
            website=:cari_website,
            il=:cari_il,
            adres=:cari_adres,
            eklenme_tarihi=:eklenme_tarihi,
            ekleyen=:ekleyen,
            durum=:durum
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
            'eklenme_tarihi' => $zaman,
            'ekleyen' => "Admin",
            'durum' => 1
        )
    );

    $cariAdSoyad = $_POST['cari_adsoyad'];
    $cariUnvan = $_POST['cari_unvan'];
    if ($_FILES['cari_resim']['error'] == 0) {
        
        $gecici_isim = $_FILES['cari_resim']['tmp_name'];
        $dosya_ismi = $_FILES['cari_resim']['name'];
        $sayi = rand(100000, 999999);
        $isim = $sayi . $dosya_ismi;

        move_uploaded_file($gecici_isim, "img/cari/$isim");

        $sorgu = $db->prepare("UPDATE cari SET resim=:cari_resim WHERE adsoyad='".$cariAdSoyad."' AND unvan='".$cariUnvan."' AND eklenme_tarihi='".$zaman."'");
        $sonuc = $sorgu->execute(array(
            "cari_resim" => $isim
            ));
        echo $_POST['cari_adsoyad'];
    }

    if ($sonuc) {
        header("location:cari_ekle.php?durum=ok");
    } else {
        header("location:cari_ekle.php?durum=no");
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="font-weight-bold text-primary">Yeni Cari Ekle</h5>
                </div>
                <div class="card-body">

                    <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

                        <div class="form-row ">
                            
                            <div class="col-md-6 form-group mt-3" style="">

                                <div class="form-row">
                                    <div class="col-md-12 form-group" >
                                        <label>Ad Soyad</label>
                                        <input type="text" name="cari_adsoyad" id="cari_adsoyad" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 form-group">
                                        <label>Ticari Unvan</label>
                                        <input type="text" name="cari_unvan" id="cari_unvan" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group justify-content-center m-auto" >
                                <div class="form-row mb-1">
                                <img src="img/cari/user.png" alt="" class="img-fluid col-md-5 m-auto "
                                    style="width:160px; height:auto;">
                                </div>
                                <div class="form-row">
                                <input type="file" name="cari_resim" value="" class="form-control text-s m-auto mt-2" style="width:70%">
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
                                <input type="text" name="cari_tel" id="cari_tel" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-posta</label>
                                <input type="text" name="cari_eposta" id="cari_eposta" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>TC Kimlik / Vergi Numarası</label>
                                <input type="text" name="cari_vergino" id="cari_vergino" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Vergi Dairesi</label>
                                <input type="text" name="cari_vergidaire" id="cari_vergidaire" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Websitesi</label>
                                <input type="text" name="cari_website" id="cari_website" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>İl</label>
                                <input type="text" name="cari_il" id="cari_il" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label>Adres</label>
                                <textarea name="cari_adres" id="cari_adres" rows="3" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" name="cariekle" class="btn btn-info btn-lg">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once "footer.php"; ?>