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
                            <div class="panel-title ">İş Ekle</div>
                        </div><br>
                        <?php
                        if(isset($_GET['is'])=="bos"){
                            ?>
                            <div class="alert alert-danger h5" role="alert">
                                <span class="glyphicon glyphicon-remove-sign"></span> Lütfen boş alan bırakmayınız!
                            </div>
                        <?php } ?>
                        <div class="content-box-large box-with-header">
                            <?php
                            if(isset($_POST['ekle'])){

                                $is_ad = $_POST['is_ad'];
                                $is_kurum = $_POST['is_kurum'];
                                $is_aciklama = $_POST['is_aciklama'];
                                $is_tarih = $_POST['is_tarih'];
                                $is_devam = $_POST['is_devam'];


                                if(!$is_ad || !$is_kurum || !$is_aciklama || !$is_tarih || !$is_devam){
                                    header("Location: is-ekle.php?is=bos");
                                }else{
                                    $isekle = $db->prepare("INSERT INTO isler(is_ad,is_kurum,is_aciklama,is_tarih,is_devam) VALUES (?,?,?,?,?)");
                                    $isekle->execute(array($is_ad,$is_kurum,$is_aciklama,$is_tarih,$is_devam));
                                    if($isekle){
                                        header("Location: isler.php?is=yes");
                                    }else {
                                        header("Location: isler.php?is=no");
                                    }
                                }
                            }
                            ?>

                            <div class="tab-pane active" id="tab1">

                                <form class="form-horizontal" action="" method="post" role="form">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">İş Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="is_ad" class="form-control" placeholder="İş Adı">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">İş Kurumu</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="is_kurum" class="form-control" placeholder="İş Kurumu">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">İş Açıklaması</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="is_aciklama" placeholder="İş Açıklaması" rows="3"></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">İş Tarihi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="is_tarih" class="form-control" placeholder="İş Tarihi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">İş Durumu</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="is_devam" class="form-control" placeholder="İş Durumu (Bu işte çalışıyorsanız 1, çalışmıyorsanız 2 yazın.)">
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