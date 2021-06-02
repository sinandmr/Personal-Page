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
                            <div class="panel-title ">Okul Ekle</div>
                        </div><br>
                        <?php
                        if(isset($_GET['okul'])=="bos"){
                            ?>
                            <div class="alert alert-danger h5" role="alert">
                                <span class="glyphicon glyphicon-remove-sign"></span> Lütfen boş alan bırakmayınız!
                            </div>
                        <?php } ?>
                        <div class="content-box-large box-with-header">
                            <?php
                            if(isset($_POST['ekle'])){

                                $okul_ad        = $_POST['okul_ad'];
                                $okul_aciklama  = $_POST['okul_aciklama'];
                                $okul_tarih     = $_POST['okul_tarih'];
                                $okul_devam     = $_POST['okul_devam'];


                                if(!$okul_ad || !$okul_aciklama || !$okul_tarih || !$okul_devam){
                                    header("Location: okul-ekle.php?okul=bos");
                                }else{
                                    $okulekle = $db->prepare("INSERT INTO okul(okul_ad,okul_aciklama,okul_tarih,okul_devam) VALUES (?,?,?,?)");
                                    $okulekle->execute(array($okul_ad,$okul_aciklama,$okul_tarih,$okul_devam));
                                    if($okulekle){
                                        header("Location: okullar.php?okul=yes");
                                    }else {
                                        header("Location: okullar.php?okul=no");
                                    }
                                }
                            }
                            ?>

                            <div class="tab-pane active" id="tab1">

                                <form class="form-horizontal" action="" method="post" role="form">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Okul Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="okul_ad" class="form-control" placeholder="İş Adı">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">İş Açıklaması</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="okul_aciklama" placeholder="İş Açıklaması" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Okul Tarihi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="okul_tarih" class="form-control" placeholder="İş Tarihi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Okul Durumu</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="okul_devam" class="form-control" placeholder="İş Durumu (Bu işte çalışıyorsanız 1, çalışmıyorsanız 2 yazın.)">
                                        </div>
                                    </div>

                                    <div class="col-md-11">
                                        <button name="ekle" class="btn btn-success pull-right">Ekle</button>
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