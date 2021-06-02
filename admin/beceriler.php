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
                            <div class="panel-title ">Beceriler</div>
                            <div class="panel-options">
                                <a href="beceri-ekle.php" data-rel="collapse" style="color:white" title="Beceri Ekle"><i class="glyphicon glyphicon-plus"></i></a>
                            </div>
                        </div>
                        <div class="content-box-large box-with-header">


                            <!-- ALERT KISMI BAŞLANGIÇ -->
                            <?php
                            if(isset($_GET['beceri'])){
                                if($_GET['beceri']=="yes"){?>
                                    <div class="alert alert-success h5" role="alert">
                                        <span class="bi bi-hand-thumbs-up"></span> Yeni Beceri Eklendi.
                                    </div>
                                <?php }elseif ($_GET['beceri']=="no"){?>
                                    <div class="alert alert-danger h5" role="alert">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Bilinmeyen bir hata oluştu!
                                    </div>
                                <?php }} ?>
                            <!-- ALERT KISMI BİTİŞ -->
                            <?php
                            if(isset($_GET['beceri-guncelle'])){
                            if($_GET['beceri-guncelle']=="bos"){?>
                            <div class="alert alert-danger h5" role="alert">
                                <span class="bi bi-hand-thumbs-up"></span> Lütfen boş alan bırakmayınız..
                            </div>
                            <?php }} ?>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th style="width:200px">#</th>
                                                <th>Beceri Adı</th>
                                                <th>Beceri Yüzdesi</th>
                                                <th style="width:200px">İşlemler</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            if(isset($_GET['sil'])){
                                                if($_GET['sil']=="yes"){?>
                                                    <div class="alert alert-success h5" role="alert">
                                                        <span class="bi bi-hand-thumbs-up"></span> Silme işlemi gerçekleşti.
                                                    </div>
                                            <?php }
                                                elseif($_GET['sil']=="no"){?>
                                                    <div class="alert alert-danger h5" role="alert">
                                                        <span class="glyphicon glyphicon-remove-sign"></span> Bilinmeyen bir hata oluştu!
                                                    </div>
                                            <?php }
                                            }
                                            $beceri = $db->prepare("SELECT * FROM becerilerim ORDER BY beceri_id DESC");
                                            $beceri->execute();
                                            $becericek = $beceri->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($becericek as $row){ ?>
                                                <tr>
                                                    <td><?php echo $row->beceri_id;?></td>
                                                    <td><?php echo $row->beceri_ad;?></td>
                                                    <td><?php echo $row->beceri_yuzde;?></td>
                                                    <td>
                                                        <a href="beceri-duzenle.php?beceriduzenleid=<?php echo $row->beceri_id;?>" class="btn btn-primary btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Düzenle</a>
                                                        <a href="islem.php?becerisilid=<?php echo $row->beceri_id;?>" class="btn btn-primary btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i> Sil</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!-- BECERİ DÜZENLE ALERT KISMI BAŞLANGIÇ -->
                                            <?php
                                            if(isset($_GET['duzenle'])){
                                                if($_GET['duzenle']=="yes"){?>
                                                    <div class="alert alert-success h5" role="alert">
                                                        <span class="bi bi-hand-thumbs-up"></span> Beceri başarıyla düzenlendi.
                                                    </div>
                                                <?php }elseif ($_GET['beceri']=="no"){?>
                                                    <div class="alert alert-danger h5" role="alert">
                                                        <span class="glyphicon glyphicon-remove-sign"></span> Bilinmeyen bir hata oluştu!
                                                    </div>
                                                <?php }} ?>
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
<?php include"footer.php"; ?>