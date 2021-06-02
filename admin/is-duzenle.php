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
                            <div class="panel-title ">İş Düzenle</div>
                        </div>
                        <div class="content-box-large box-with-header">

                            <?php
                            if(isset($_GET['isduzenleid'])){

                                $id = $_GET['isduzenleid'];

                                $beca = $db->prepare("SELECT * FROM isler WHERE is_id=?");
                                $beca->execute(array($id));
                                $becacek = $beca->fetch(PDO::FETCH_OBJ);
                            }

                            ?>

                            <div class="tab-pane active" id="tab1">

                                <form class="form-horizontal" action="islem.php" method="post" role="form">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">İş Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="is_ad" class="form-control" value="<?php echo $becacek->is_ad; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">İş Kurumu</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="is_kurum" class="form-control" value="<?php echo $becacek->is_kurum; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">İş Açıklaması</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="is_aciklama" class="form-control" value="<?php echo $becacek->is_aciklama; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">İş Tarihi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="is_tarih" class="form-control" value="<?php echo $becacek->is_tarih; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">İş Devam Durumu</label>
                                        <div class="col-sm-9">
                                            <?php
                                            if($becacek->is_devam==1){
                                                echo '<input type="radio" name="is_devam" value="1" checked> Şu an burada çalışıyorum.<br>';
                                                echo '<input type="radio" name="is_devam" value="2"> Şu an burada çalışmıyorum.<br>';
                                            }elseif($becacek->is_devam!=1){
                                                echo '<input type="radio" name="is_devam" value="1"> Şu an burada çalışıyorum.<br>';
                                                echo '<input type="radio" name="is_devam" value="2" checked> Şu an burada çalışmıyorum.<br>';
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group" >
                                        <label for="inputPassword3" class="col-sm-2 control-label">İş İd</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="is_id" class="form-control" value="<?php echo $becacek->is_id;?>">
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-11">
                                        <button name="is-duzenle" class="btn btn-success pull-right">Güncelle</button>
                                    </div>
                                </form>
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