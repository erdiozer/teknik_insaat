<?php require_once "header.php"; ?>

<?php 

$formData = array("id" => "", "unvan" => "" );
if (isset($_GET['islem'])) {
    if ($_GET['islem']=='goruntule') {
        $formData["id"] = $_GET['cari_id'];
        
    }
}



if (isset($_POST['fatura_ekle'])) {
    print_r($_POST['fatura_no']);
    exit;
    $sorgu = $db->prepare("INSERT INTO cari SET
            fatura_no=:fatura_no,
            cari_id=:cari_unvan,
            proje_id=:proje_adi,
            aciklama=:aciklama,
            tip=:tip,
            kdv=:kdv_orani,
            kdvsiz_fiyat=:kdvsiz_tutar,
            kdvli_fiyat=:kdv_dahil,
            muhasebelendi=:cari_adres,
            eklenme_tarihi=:eklenme_tarihi,
            ekleyen=:ekleyen
            durum=:durum
            ");

    date_default_timezone_set('Europe/Istanbul'); //İstanbul Türkiye
    setlocale(LC_ALL, 'tr-TR', 'tr', 'turkish');
    list($day, $month, $year, $hour, $min, $sec) = explode("/", date('d/m/Y/h/i/s'));
    $zaman = $day . '/' . $month . '/' . $year . ' ' . $hour . ':' . $min . ':' . $sec;

    $sonuc = $sorgu->execute(
        array(
            'fatura_no' => $_POST['fatura_no'],
            'cari_adsoyad' => $_POST['cari_adsoyad'],
            'proje_adi' => $_POST['proje_adi'],
            'aciklama' => $_POST['aciklama'],
            'tip' => $_POST['tip'],
            'kdv_orani' => $_POST['kdv_orani'],
            'kdvsiz_tutar' => $_POST['kdvsiz_tutar'],
            'kdv_dahil' => $_POST['kdv_dahil'],
            'cari_adres' => $_POST['cari_adres'],
            'eklenme_tarihi' => $zaman,
            'ekleyen' => "Admin",
            'durum' => 1
        )
    );

    // $cariAdSoyad = $_POST['cari_adsoyad'];
    // $cariUnvan = $_POST['cari_unvan'];
    // if ($_FILES['cari_resim']['error'] == 0) {
    //     // echo "Dosya yüklendi";
    //     // echo "<pre>";
    //     // print_r($_FILES['cari_resim']);

    //     $gecici_isim = $_FILES['cari_resim']['tmp_name'];
    //     $dosya_ismi = $_FILES['cari_resim']['name'];
    //     $sayi = rand(100000, 999999);
    //     $isim = $sayi . $dosya_ismi;

    //     move_uploaded_file($gecici_isim, "img/cari/$isim");

    //     $sorgu = $db->prepare("UPDATE cari SET resim=:cari_resim WHERE adsoyad='" . $cariAdSoyad . "' AND unvan='" . $cariUnvan . "' AND eklenme_tarihi='" . $zaman . "'");
    //     $sonuc = $sorgu->execute(
    //         array(
    //             "cari_resim" => $isim
    //         )
    //     );
    //     echo $_POST['cari_adsoyad'];
    // }

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
                    <h5 class="font-weight-bold text-primary">Yeni Fatura Ekle</h5>
                </div>
                <div class="card-body">

                    <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

                        <div class="form-row ">
                            <div class="col-md-6 form-group ">
                                <label>Fatura No</label>
                                <input type="text" value="<?php echo $formData["id"]; ?>" name="fatura_no" id="fatura_no" class="form-control">
                            </div>


                            <div class="col-md-6 form-group">
                                <label>Cari</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2" readonly>
                                    <div class="input-group-append">

                                        <button class="btn btn-info" type="button" data-toggle="modal"
                                            data-target=".cari-bul-modal">
                                            <i class="bi bi-person-fill"></i>
                                            &nbsp;&nbsp;Bul
                                        </button>
                                        
                                        <div class="modal fade cari-bul-modal" id="cariModal" tabindex="-1" role="dialog"
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">

                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="font-weight-bold text-primary">Cari Bul</h4>
                                                                <hr class="bg-primary">
                                                            </div>
                                                            <div class="card-body">
                                                                <table class="table table-bordered hover mx-auto"
                                                                    id="carilerTablo">
                                                                    <thead>
                                                                        <tr style="height:15px;"
                                                                            class="bg-primary text-light">
                                                                            <!-- <th></th> -->
                                                                            <th class="col-md-4">Ad Soyad</th>
                                                                            <th class="col-md-6">Ticari Unvan</th>
                                                                            <th class="col-md-2">İşlemler</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $sorgu = $db->prepare("SELECT * FROM cari WHERE durum=1");
                                                                        $sorgu->execute();
                                                                        $liste = $sorgu->fetchAll(PDO::FETCH_ASSOC);

                                                                        foreach ($liste as $key => $cari) { ?>
                                                                            <tr style="height:20px;">
                                                                                <td style="height:20px; width: 35%;">
                                                                                    <?php echo $cari['adsoyad'] ?>
                                                                                </td>
                                                                                <td style="height:20px; width: 60%;">
                                                                                    <?php echo $cari['unvan'] ?>
                                                                                </td>
                                                                                <td class="d-flex justify-content-center"
                                                                                    style="height:40px; top:0; left:0; margin:0; padding:0;">
                                                                                    <div class="d-flex align-items-center justify-content-center"
                                                                                        style="height:40px; top:3px; left:0; margin:0; padding:0; gap:3px;">

                                                                                        <a onclick="" href="#"
                                                                                            class="btn btn-primary btn-sm" id="<?php echo $cari['id'].','.$cari['unvan'] ?>"
                                                                                            style="height:30px; ">Seç</a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                        <?php } ?>




                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="button"><i
                                                class="bi bi-person-plus-fill"></i>&nbsp;&nbsp;Ekle</button>
                                    </div>
                                </div>
                            </div>


                            <!-- <div class="col-md-6 form-group">
                                <label>Cari</label>
                                <input type="text" name="cari_adsoyad" id="cari_adsoyad" class="form-control">
                            </div> -->

                        </div>

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="id_end_time">Fatura Tarihi</label>
                                <div class="input-group date" id="fatura_tarih">
                                    <input type="text" class="form-control" required/>
                                    <div class="input-group-addon input-group-append">
                                        <div class="input-group-text">
                                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Tip</label>
                                <select class="custom-select" name="tip" id="tip">
                                    <option value="1" selected="selected">Alış</option>
                                    <option value="2">Satış</option>
                                </select>
                                <!-- <input type="text" name="cari_eposta" id="cari_eposta" class="form-control"> -->
                            </div>
                            <div class="col-md-3 form-group">
                                <label>KDV (%)</label>
                                <input type="number" value="18" name="kdv_orani" id="kdv_orani" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 form-group">
                                <label>KDV'siz Tutar</label>
                                <!-- <input type="number" name="kdvsiz_tutar" id="kdvsiz_tutar" class="form-control"> -->
                                <div class="input-group">
                                    <input type="text" name="kdvsiz_tutar" id="kdvsiz_tutar" class="form-control text-right" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">₺</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>KDV Tutarı</label>
                                <!-- <input type="text" name="kdv_tutarı" id="kdv_tutarı" class="form-control"> -->
                                <div class="input-group">
                                    <input type="text" name="kdv_tutarı" id="kdv_tutarı" class="form-control text-right" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">₺</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>KDV Dahil Toplam</label>
                                <!-- <input type="text" name="kdv_dahil" id="kdv_dahil" class="form-control"> -->
                                <div class="input-group">
                                    <input type="text" name="kdv_dahil" id="kdv_dahil" class="form-control text-right" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">₺</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label>Proje</label>
                                <input type="text" name="proje_adi" id="proje_adi" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label>Açıklama</label>
                                <textarea name="aciklama" id="aciklama" rows="3" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" name="fatura_ekle" class="btn btn-info btn-lg">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once "footer.php"; ?>


<script>

    var table;
    $(document).ready(function () {
        table = $('#carilerTablo').DataTable(
            {
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Hepsi"]],
                "language": dildosyasi,
                fixedColumns: {
                    heightMatch: 'none'
                },
                responsive: true

            }
        );
        
    });

</script>

<!-- <script type="text/javascript">
   $(function () {
       $('#fatura_tarih').datetimepicker(
        {"format": "DD/MM/YYYY",}
       );
       
//        $('#datetimepicker7').datetimepicker({
//    useCurrent: false //Important! See issue #1075
//    });
       $("#fatura_tarih").on("dp.change", function (e) {
           $('#fatura_tarih').data("DateTimePicker").minDate(e.date);
       });
    //    $("#datetimepicker7").on("dp.change", function (e) {
    //        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    //    });
   });
</script> -->