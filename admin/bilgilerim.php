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
                            <div class="panel-title ">Bilgiler</div>
                        </div>
                        <div class="content-box-large box-with-header">


                            <!-- ALERT KISMI BAŞLANGIÇ -->
                            <?php
                            if(isset($_GET['bilgi-guncelle'])){
                                if($_GET['bilgi-guncelle']=="bos"){
                                    ?>
                                    <div class="alert alert-danger h5" role="alert">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Lütfen boş alan bırakmayınız!
                                    </div>
                                    <?php
                                }elseif($_GET['bilgi-guncelle']=="yes"){?>
                                    <div class="alert alert-success h5" role="alert">
                                        <span class="bi bi-hand-thumbs-up"></span> Bilgiler güncellendi.
                                    </div>
                                <?php }elseif ($_GET['bilgi-guncelle']=="no"){?>
                                    <div class="alert alert-danger h5" role="alert">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Bilinmeyen bir hata oluştu!
                                    </div>
                                <?php }
                            }
                            ?>
                            <!-- ALERT KISMI BİTİŞ -->
                            <?php

                            $bilgilerim = $db->prepare("SELECT * FROM bilgilerim");
                            $bilgilerim->execute();
                            $bilgicek = $bilgilerim->fetch(PDO::FETCH_OBJ);

                            ?>

                            <div class="tab-pane active" id="tab1">

                                <form class="form-horizontal" action="islem.php" method="post" role="form">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Yüklü Fotoğraf</label>
                                        <div class="col-sm-9">
                                            <img width="350" src="<?php echo $bilgicek->bilgi_fotoğraf;?>" alt="<?php echo $bilgicek->bilgi_fotoğraf;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Fotoğraf</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bilgi_fotoğraf" class="form-control" value="<?php echo $bilgicek->bilgi_fotoğraf; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">İsim</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bilgi_isim" class="form-control" value="<?php echo $bilgicek->bilgi_isim; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Meslek</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bilgi_meslek" class="form-control" value="<?php echo $bilgicek->bilgi_meslek; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">İkamet Adresi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bilgi_ikamet" class="form-control" value="<?php echo $bilgicek->bilgi_ikamet; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">E-posta Adresi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bilgi_mail" class="form-control" value="<?php echo $bilgicek->bilgi_mail; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Telefon Numarası</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bilgi_telefon" class="form-control" value="<?php echo $bilgicek->bilgi_telefon; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Skype Adresi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bilgi_skype" class="form-control" value="<?php echo $bilgicek->bilgi_skype; ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-11">
                                        <button name="bilgilerim" class="btn btn-success pull-right">Güncelle</button>
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