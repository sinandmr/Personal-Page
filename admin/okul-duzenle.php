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
                            <div class="panel-title ">Okul Düzenle</div>
                        </div>
                        <div class="content-box-large box-with-header">

                            <?php
                            if(isset($_GET['okulduzenleid'])){

                                $id = $_GET['okulduzenleid'];

                                $beca = $db->prepare("SELECT * FROM okul WHERE okul_id=?");
                                $beca->execute(array($id));
                                $becacek = $beca->fetch(PDO::FETCH_OBJ);
                            }

                            ?>

                            <div class="tab-pane active" id="tab1">

                                <form class="form-horizontal" action="islem.php" method="post" role="form">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Okul Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="okul_ad" class="form-control" value="<?php echo $becacek->okul_ad; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Okul Açıklaması</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="okul_aciklama" class="form-control" value="<?php echo $becacek->okul_aciklama; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Okul Tarihi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="okul_tarih" class="form-control" value="<?php echo $becacek->okul_tarih; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Okul Devam Durumu</label>
                                        <div class="col-sm-9">
                                            <?php
                                            if($becacek->okul_devam==1){
                                                echo '<input type="radio" name="okul_devam" value="1" checked> Şu an burada okuyorum.<br>';
                                                echo '<input type="radio" name="okul_devam" value="2"> Şu an burada okumuyorum.<br>';
                                            }elseif($becacek->okul_devam!=1){
                                                echo '<input type="radio" name="okul_devam" value="1"> Şu an burada okuyorum.<br>';
                                                echo '<input type="radio" name="okul_devam" value="2" checked> Şu an burada okumuyorum.<br>';
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group" >
                                        <label for="inputPassword3" class="col-sm-2 control-label">Okul İd</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="okul_id" class="form-control" value="<?php echo $becacek->okul_id;?>">
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-11">
                                        <button name="okul-duzenle" class="btn btn-success pull-right">Güncelle</button>
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