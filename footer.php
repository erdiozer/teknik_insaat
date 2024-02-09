</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Bu websitesi <b>Erdi ÖZER</b> tarafından tasarlanmıştır. Copyright &copy; Teknik İnşaat 2024</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

<!-- DataTables JS-->
<script src="vendor/datatables/datatables/datatables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    var dildosyasi = {
        "info": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
        "infoEmpty": "Kayıt yok",
        "infoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
        "infoThousands": ".",
        "lengthMenu": "Sayfada _MENU_ kayıt göster",
        "loadingRecords": "Yükleniyor...",
        "processing": "İşleniyor...",
        "search": "Ara:",
        "zeroRecords": "Eşleşen kayıt bulunamadı",
        "paginate": {
            "first": "İlk",
            "last": "Son",
            "next": "Sonraki",
            "previous": "Önceki"
        },
        "aria": {
            "sortAscending": ": artan sütun sıralamasını aktifleştir",
            "sortDescending": ": azalan sütun sıralamasını aktifleştir"
        },
        "select": {
            "rows": {
                "_": "%d kayıt seçildi",
                "1": "1 kayıt seçildi"
            },
            "cells": {
                "1": "1 hücre seçildi",
                "_": "%d hücre seçildi"
            },
            "columns": {
                "1": "1 sütun seçildi",
                "_": "%d sütun seçildi"
            }
        },
        "autoFill": {
            "cancel": "İptal",
            "fillHorizontal": "Hücreleri yatay olarak doldur",
            "fillVertical": "Hücreleri dikey olarak doldur",
            "fill": "Bütün hücreleri <i>%d<\/i> ile doldur",
            "info": "Detayı"
        },
        "buttons": {
            "collection": "Koleksiyon <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
            "colvis": "Sütun görünürlüğü",
            "colvisRestore": "Görünürlüğü eski haline getir",
            "copySuccess": {
                "1": "1 satır panoya kopyalandı",
                "_": "%ds satır panoya kopyalandı"
            },
            "copyTitle": "Panoya kopyala",
            "csv": "CSV",
            "excel": "Excel",
            "pageLength": {
                "-1": "Bütün satırları göster",
                "_": "%d satır göster",
                "1": "1 Satır Göster"
            },
            "pdf": "PDF",
            "print": "Yazdır",
            "copy": "Kopyala",
            "copyKeys": "Tablodaki veriyi kopyalamak için CTRL veya u2318 + C tuşlarına basınız. İptal etmek için bu mesaja tıklayın veya escape tuşuna basın.",
            "createState": "Şuanki Görünümü Kaydet",
            "removeAllStates": "Tüm Görünümleri Sil",
            "removeState": "Aktif Görünümü Sil",
            "renameState": "Aktif Görünümün Adını Değiştir",
            "savedStates": "Kaydedilmiş Görünümler",
            "stateRestore": "Görünüm -&gt; %d",
            "updateState": "Aktif Görünümün Güncelle"
        },
        "searchBuilder": {
            "add": "Koşul Ekle",
            "button": {
                "0": "Arama Oluşturucu",
                "_": "Arama Oluşturucu (%d)"
            },
            "condition": "Koşul",
            "conditions": {
                "date": {
                    "after": "Sonra",
                    "before": "Önce",
                    "between": "Arasında",
                    "empty": "Boş",
                    "equals": "Eşittir",
                    "not": "Değildir",
                    "notBetween": "Dışında",
                    "notEmpty": "Dolu"
                },
                "number": {
                    "between": "Arasında",
                    "empty": "Boş",
                    "equals": "Eşittir",
                    "gt": "Büyüktür",
                    "gte": "Büyük eşittir",
                    "lt": "Küçüktür",
                    "lte": "Küçük eşittir",
                    "not": "Değildir",
                    "notBetween": "Dışında",
                    "notEmpty": "Dolu"
                },
                "string": {
                    "contains": "İçerir",
                    "empty": "Boş",
                    "endsWith": "İle biter",
                    "equals": "Eşittir",
                    "not": "Değildir",
                    "notEmpty": "Dolu",
                    "startsWith": "İle başlar",
                    "notContains": "İçermeyen",
                    "notStartsWith": "Başlamayan",
                    "notEndsWith": "Bitmeyen"
                },
                "array": {
                    "contains": "İçerir",
                    "empty": "Boş",
                    "equals": "Eşittir",
                    "not": "Değildir",
                    "notEmpty": "Dolu",
                    "without": "Hariç"
                }
            },
            "data": "Veri",
            "deleteTitle": "Filtreleme kuralını silin",
            "leftTitle": "Kriteri dışarı çıkart",
            "logicAnd": "ve",
            "logicOr": "veya",
            "rightTitle": "Kriteri içeri al",
            "title": {
                "0": "Arama Oluşturucu",
                "_": "Arama Oluşturucu (%d)"
            },
            "value": "Değer",
            "clearAll": "Filtreleri Temizle"
        },
        "searchPanes": {
            "clearMessage": "Hepsini Temizle",
            "collapse": {
                "0": "Arama Bölmesi",
                "_": "Arama Bölmesi (%d)"
            },
            "count": "{total}",
            "countFiltered": "{shown}\/{total}",
            "emptyPanes": "Arama Bölmesi yok",
            "loadMessage": "Arama Bölmeleri yükleniyor ...",
            "title": "Etkin filtreler - %d",
            "showMessage": "Tümünü Göster",
            "collapseMessage": "Tümünü Gizle"
        },
        "thousands": ".",
        "datetime": {
            "amPm": [
                "öö",
                "ös"
            ],
            "hours": "Saat",
            "minutes": "Dakika",
            "next": "Sonraki",
            "previous": "Önceki",
            "seconds": "Saniye",
            "unknown": "Bilinmeyen",
            "weekdays": {
                "6": "Paz",
                "5": "Cmt",
                "4": "Cum",
                "3": "Per",
                "2": "Çar",
                "1": "Sal",
                "0": "Pzt"
            },
            "months": {
                "9": "Ekim",
                "8": "Eylül",
                "7": "Ağustos",
                "6": "Temmuz",
                "5": "Haziran",
                "4": "Mayıs",
                "3": "Nisan",
                "2": "Mart",
                "11": "Aralık",
                "10": "Kasım",
                "1": "Şubat",
                "0": "Ocak"
            }
        },
        "decimal": ",",
        "editor": {
            "close": "Kapat",
            "create": {
                "button": "Yeni",
                "submit": "Kaydet",
                "title": "Yeni kayıt oluştur"
            },
            "edit": {
                "button": "Düzenle",
                "submit": "Güncelle",
                "title": "Kaydı düzenle"
            },
            "error": {
                "system": "Bir sistem hatası oluştu (Ayrıntılı bilgi)"
            },
            "multi": {
                "info": "Seçili kayıtlar bu alanda farklı değerler içeriyor. Seçili kayıtların hepsinde bu alana aynı değeri atamak için buraya tıklayın; aksi halde her kayıt bu alanda kendi değerini koruyacak.",
                "noMulti": "Bu alan bir grup olarak değil ancak tekil olarak düzenlenebilir.",
                "restore": "Değişiklikleri geri al",
                "title": "Çoklu değer"
            },
            "remove": {
                "button": "Sil",
                "confirm": {
                    "_": "%d adet kaydı silmek istediğinize emin misiniz?",
                    "1": "Bu kaydı silmek istediğinizden emin misiniz?"
                },
                "submit": "Sil",
                "title": "Kayıtları sil"
            }
        },
        "stateRestore": {
            "creationModal": {
                "button": "Kaydet",
                "columns": {
                    "search": "Kolon Araması",
                    "visible": "Kolon Görünümü"
                },
                "name": "Görünüm İsmi",
                "order": "Sıralama",
                "paging": "Sayfalama",
                "scroller": "Kaydırma (Scrool)",
                "search": "Arama",
                "searchBuilder": "Arama Oluşturucu",
                "select": "Seçimler",
                "title": "Yeni Görünüm Oluştur",
                "toggleLabel": "Kaydedilecek Olanlar"
            },
            "duplicateError": "Bu Görünüm Daha Önce Tanımlanmış",
            "emptyError": "Görünüm Boş Olamaz",
            "emptyStates": "Herhangi Bir Görünüm Yok",
            "removeJoiner": "ve",
            "removeSubmit": "Sil",
            "removeTitle": "Görünüm Sil",
            "renameButton": "Değiştir",
            "renameLabel": "Görünüme Yeni İsim Ver -&gt; %s:",
            "renameTitle": "Görünüm İsmini Değiştir",
            "removeConfirm": "Görünümü silmek istediğinize emin misiniz?",
            "removeError": "Görünüm silinemedi"
        },
        "emptyTable": "Tabloda veri bulunmuyor",
        "infoPostFix": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
        "searchPlaceholder": "Arayın..."
    }
</script>


<?php 
if (isset($_GET['durum'])) { ?>
    
    <script>
        <?php if ($_GET['durum'] == 'ok') { ?>
            alert('İşlem Başarılı !');
        <?php }?>
        <?php if ($_GET['durum'] == 'no') { ?>
            alert('İşlem Başarısız !');
        <?php }?>
    </script>

<?php } ?>


</body>

</html>