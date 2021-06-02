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
                            <div class="panel-title ">Genel Ayarlar</div>
                        </div>
                        <div class="content-box-large box-with-header">


                            <!-- ALERT KISMI BAŞLANGIÇ -->
                            <?php
                            if(isset($_GET['ayar-guncelle'])){
                                if($_GET['ayar-guncelle']=="bos"){
                                ?>
                                <div class="alert alert-danger h5" role="alert">
                                    <span class="glyphicon glyphicon-remove-sign"></span> Lütfen boş alan bırakmayınız!
                                </div>
                                    <?php
                                }elseif($_GET['ayar-guncelle']=="yes"){?>
                                    <div class="alert alert-success h5" role="alert">
                                        <span class="bi bi-hand-thumbs-up"></span> Bilgiler güncellendi.
                                    </div>
                                <?php }elseif ($_GET['ayar-guncelle']=="no"){?>
                                    <div class="alert alert-danger h5" role="alert">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Bilinmeyen bir hata oluştu!
                                    </div>
                                <?php }
                            }
                                ?>
                            <!-- ALERT KISMI BİTİŞ -->


                            <div class="tab-pane active" id="tab1">

                                <form class="form-horizontal" action="islem.php" method="post" role="form">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Site Başlık</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="site_title" class="form-control" value="<?php echo $ayarcek->site_title; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Site URL</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="site_url" class="form-control" value="<?php echo $ayarcek->site_url; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Site Açıklama</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="site_desc" class="form-control" value="<?php echo $ayarcek->site_desc; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Site Anahtar Kelimeler</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="site_keyw" class="form-control" value="<?php echo $ayarcek->site_keyw; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Site Footer Yazısı</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="site_footer" class="form-control" value="<?php echo $ayarcek->site_footer; ?>">
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-11">
                                        <button name="genel-ayarlar" class="btn btn-success pull-right">Güncelle</button>
                                    </div>
                            </div>
                            <br /><br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  FOOTER -->
<?php include"footer.php"; ?>