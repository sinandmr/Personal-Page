<?php include "header.php"; ?>
    <!-- header -->

    <div class="page-content">
        <div class="row">
            <!-- sidebar -->
            <?php include "sidebar.php"; ?>
            <!-- sidebar bitiş -->
            <div class="col-md-10">

                <div class="row">
                    <div class="col-md-12 panel-primary">
                        <div class="content-box-header panel-heading">
                            <div class="panel-title ">Okullar</div>
                            <div class="panel-options">
                                <a href="okul-ekle.php" data-rel="collapse" style="color:white" title="Okul Ekle"><i
                                            class="glyphicon glyphicon-plus"></i></a>
                            </div>
                        </div>
                        <div class="content-box-large box-with-header">


                            <!-- ALERT KISMI BAŞLANGIÇ -->
                            <?php
                            if (isset($_GET['okul'])) {
                                if ($_GET['okul'] == "yes") {
                                    ?>
                                    <div class="alert alert-success h5" role="alert">
                                        <span class="bi bi-hand-thumbs-up"></span> Yeni Okul Eklendi.
                                    </div>
                                <?php } elseif ($_GET['okul'] == "no") {
                                    ?>
                                    <div class="alert alert-danger h5" role="alert">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Bilinmeyen bir hata
                                        oluştu!
                                    </div>
                                <?php }
                            }
                            if (isset($_GET['okul-guncelle'])) {
                                if ($_GET['okul-guncelle'] == 'bos') {
                                    ?>
                                    <div class="alert alert-danger h5" role="alert">
                                        <span class="bi bi-hand-thumbs-up"></span> Lütfen boş alan bırakmayınız.
                                    </div>
                                <?php }
                            } ?>
                            <!-- ALERT KISMI BİTİŞ -->

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Okul Adı</th>
                                        <th style="width:500px">İş Açıklaması</th>
                                        <th>Okul Tarihi</th>
                                        <th>İş Durum</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    if (isset($_GET['sil'])) {
                                        if ($_GET['sil'] == "yes") {
                                            ?>
                                            <div class="alert alert-success h5" role="alert">
                                                <span class="bi bi-hand-thumbs-up"></span> Silme işlemi gerçekleşti.
                                            </div>
                                        <?php } elseif ($_GET['sil'] == "no") {
                                            ?>
                                            <div class="alert alert-danger h5" role="alert">
                                                <span class="glyphicon glyphicon-remove-sign"></span> Bilinmeyen bir
                                                hata oluştu!
                                            </div>
                                        <?php }
                                    }
                                    $okul = $db->prepare("SELECT * FROM okul ORDER BY okul_id DESC");
                                    $okul->execute();
                                    $okulcek = $okul->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($okulcek as $row) { ?>
                                        <tr>
                                            <td><?php echo $row->okul_id; ?></td>
                                            <td><?php echo $row->okul_ad; ?></td>
                                            <td><?php echo $row->okul_aciklama; ?></td>
                                            <td><?php echo $row->okul_tarih; ?></td>
                                            <td><?php echo $row->okul_devam; ?></td>
                                            <td><?php
                                                if ($row->okul_devam == 1) {
                                                    echo '<span class="glyphicon glyphicon-ok"></span>';
                                                } else {
                                                    echo '<span class="glyphicon glyphicon-remove"></span>';
                                                }
                                                ?></td>

                                            <td>
                                                <a href="okul-duzenle.php?okulduzenleid=<?php echo $row->okul_id; ?>"
                                                   class="btn btn-primary btn-primary btn-xs"><i
                                                            class="glyphicon glyphicon-edit"></i> Düzenle</a>
                                                <a href="islem.php?okulsilid=<?php echo $row->okul_id; ?>"
                                                   class="btn btn-primary btn-danger btn-xs"><i
                                                            class="glyphicon glyphicon-remove"></i> Sil</a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <!-- BECERİ DÜZENLE ALERT KISMI BAŞLANGIÇ -->
                                    <?php
                                    if (isset($_GET['duzenle'])) {
                                        if ($_GET['duzenle'] == "yes") {
                                            ?>
                                            <div class="alert alert-success h5" role="alert">
                                                <span class="bi bi-hand-thumbs-up"></span> okul başarıyla düzenlendi.
                                            </div>
                                        <?php } elseif ($_GET['duzenle'] == "no") {
                                            ?>
                                            <div class="alert alert-danger h5" role="alert">
                                                <span class="glyphicon glyphicon-remove-sign"></span> Bilinmeyen bir
                                                hata oluştu!
                                            </div>
                                        <?php }
                                    } ?>
                                    <!-- BECERİ DÜZENLE ALERT KISMI BİTİŞ -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  FOOTER -->
<?php include "footer.php"; ?>