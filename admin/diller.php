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
                            <div class="panel-title ">Diller</div>
                            <div class="panel-options">
                                <a href="dil-ekle.php" data-rel="collapse" style="color:white" title="Dil Ekle"><i class="glyphicon glyphicon-plus"></i></a>
                            </div>
                        </div>
                        <div class="content-box-large box-with-header">


                            <!-- ALERT KISMI BAŞLANGIÇ -->
                            <?php
                            if(isset($_GET['dil'])){
                                if($_GET['dil']=="yes"){?>
                                    <div class="alert alert-success h5" role="alert">
                                        <span class="bi bi-hand-thumbs-up"></span> Yeni Dil Eklendi.
                                    </div>
                                <?php }elseif ($_GET['dil']=="no"){?>
                                    <div class="alert alert-danger h5" role="alert">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Bilinmeyen bir hata oluştu!
                                    </div>
                                <?php }} ?>
                            <!-- ALERT KISMI BİTİŞ -->

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width:200px">#</th>
                                        <th>Dil Adı</th>
                                        <th>Dil Yüzdesi</th>
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
                                    $dil = $db->prepare("SELECT * FROM dil ORDER BY dil_id DESC");
                                    $dil->execute();
                                    $dilcek = $dil->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($dilcek as $row){ ?>
                                        <tr>
                                            <td><?php echo $row->dil_id;?></td>
                                            <td><?php echo $row->dil_ad;?></td>
                                            <td><?php echo $row->dil_yuzde;?></td>
                                            <td>
                                                <a href="dil-duzenle.php?dilduzenleid=<?php echo $row->dil_id;?>" class="btn btn-primary btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Düzenle</a>
                                                <a href="islem.php?dilsilid=<?php echo $row->dil_id;?>" class="btn btn-primary btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i> Sil</a>
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