<?php require_once "header.php"; ?>

<?php
if (isset($_GET['islem'])) {

    if ($_GET['islem'] == 'sil') {
        $sorgu = $db->prepare("DELETE FROM cari WHERE id={$_GET['cari_id']}");
        $sonuc = $sorgu->execute();

        if ($sonuc) {
            header("location:cariler.php?durum=ok");
        } else {
            header("location:cariler.php?durum=no");
        }
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold text-primary">Cariler</h4>
                    <hr class="bg-primary">
                </div>
                <div class="card-body">

                    <table class="table-responsive table-bordered hover" id="carilerTablo">
                        <thead>
                            <tr style="height:15px;" class="bg-primary text-light">
                            <!-- <th></th> -->
                                <th style="max-width:30px;">No</th>
                                <th style="max-width:150px;">Ad Soyad</th>
                                <th style="max-width:700px;">Ticari Unvan</th>
                                <th style="max-width:150px;">Borç</th>
                                <th style="max-width:150px;">Alacak</th>
                                <th style="max-width:150px;">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $sorgu = $db->prepare("SELECT * FROM cari WHERE durum=1");
                            $sorgu->execute();
                            $liste = $sorgu->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($liste as $key => $cari) { ?>
                                <tr style="height:20px;">
                                    <td style="height:20px;">
                                        <?php echo $cari['id'] ?>
                                    </td>
                                    <td style="height:20px;">
                                        <?php echo $cari['adsoyad'] ?>
                                    </td>
                                    <td style="height:20px;">
                                        <?php echo $cari['unvan'] ?>
                                    </td>
                                    <td style="height:20px;"></td>
                                    <td style="height:20px;"></td>
                                    <td class="d-flex justify-content-center"
                                        style="height:40px; top:0; left:0; margin:0; padding:0;">
                                        <div class="d-flex align-items-center justify-content-center"
                                            style="height:40px; top:3px; left:0; margin:0; padding:0; gap:3px;">
                                            
                                            <a href="cari.php?islem=goruntule&cari_id=<?php echo $cari['id'] ?>"
                                                class="btn btn-primary btn-sm" style="height:30px; ">Görüntüle</a>
                                            <a href="cari_duzenle.php?cari_id=<?php echo $cari['id'] ?>"
                                                class="btn btn-success btn-sm" style="height:30px; ">Düzenle</a>
                                            <a href="cariler.php?islem=sil&cari_id=<?php echo $cari['id'] ?>"
                                                class="btn btn-danger btn-sm" style="height:30px; ">Sil</a>
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




<?php require_once "footer.php"; ?>

<script>

function format(d) {
    // `d` is the original data object for the row
    return (
        '<dl>' +
        '<dt>Full name:</dt>' +
        '<dd>' +
        d.name +
        '</dd>' +
        '<dt>Extension number:</dt>' +
        '<dd>' +
        d.extn +
        '</dd>' +
        '<dt>Extra info:</dt>' +
        '<dd>And any further details here (images etc)...</dd>' +
        '</dl>'
    );
}
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