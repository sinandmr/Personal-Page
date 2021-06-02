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
                            <div class="panel-title ">İşler</div>
                            <div class="panel-options">
                                <a href="is-ekle.php" data-rel="collapse" style="color:white" title="İş Ekle"><i class="glyphicon glyphicon-plus"></i></a>
                            </div>
                        </div>
                        <div class="content-box-large box-with-header">


                            <!-- ALERT KISMI BAŞLANGIÇ -->
                            <?php
                            if(isset($_GET['is'])){
                                if($_GET['is']=="yes"){?>
                                    <div class="alert alert-success h5" role="alert">
                                        <span class="bi bi-hand-thumbs-up"></span> Yeni İş Eklendi.
                                    </div>
                                <?php }elseif ($_GET['is']=="no"){?>
                                    <div class="alert alert-danger h5" role="alert">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Bilinmeyen bir hata oluştu!
                                    </div>
                                <?php }}
                            if(isset($_GET['is-guncelle'])){
                                if($_GET['is-guncelle']=='bos'){?>
                                    <div class="alert alert-danger h5" role="alert">
                                        <span class="bi bi-hand-thumbs-up"></span> Lütfen boş alan bırakmayınız.
                                    </div>
                            <?php }} ?>
                            <!-- ALERT KISMI BİTİŞ -->

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>İş Adı</th>
                                        <th>İş Kurumu</th>
                                        <th style="width:500px">İş Açıklaması</th>
                                        <th>İş Tarihi</th>
                                        <th>İş Durum</th>
                                        <th>İşlemler</th>
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
                                    $is = $db->prepare("SELECT * FROM isler ORDER BY is_id DESC");
                                    $is->execute();
                                    $iscek = $is->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($iscek as $row){ ?>
                                        <tr>
                                            <td><?php echo $row->is_id;?></td>
                                            <td><?php echo $row->is_ad;?></td>
                                            <td><?php echo $row->is_kurum;?></td>
                                            <td><?php echo $row->is_aciklama;?></td>
                                            <td><?php echo $row->is_tarih;?></td>
                                            <td><?php
                                                if($row->is_devam==1){
                                                    echo '<span class="glyphicon glyphicon-ok"></span>';
                                                }else {
                                                    echo '<span class="glyphicon glyphicon-remove"></span>';
                                                }
                                                ?></td>

                                            <td>
                                                <a href="is-duzenle.php?isduzenleid=<?php echo $row->is_id;?>" class="btn btn-primary btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Düzenle</a>
                                                <a href="islem.php?issilid=<?php echo $row->is_id;?>" class="btn btn-primary btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i> Sil</a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <!-- BECERİ DÜZENLE ALERT KISMI BAŞLANGIÇ -->
                                    <?php
                                    if(isset($_GET['duzenle'])){
                                        if($_GET['duzenle']=="yes"){?>
                                            <div class="alert alert-success h5" role="alert">
                                                <span class="bi bi-hand-thumbs-up"></span> İş başarıyla düzenlendi.
                                            </div>
                                        <?php }elseif ($_GET['duzenle']=="no"){?>
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