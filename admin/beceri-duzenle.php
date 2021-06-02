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
                            <div class="panel-title ">Beceri Düzenle</div>
                        </div>
                        <div class="content-box-large box-with-header">

                            <?php
                            if(isset($_GET['beceriduzenleid'])){

                                $id = $_GET['beceriduzenleid'];

                                $beca = $db->prepare("SELECT * FROM becerilerim WHERE beceri_id=?");
                                $beca->execute(array($id));
                                $becacek = $beca->fetch(PDO::FETCH_OBJ);
                            }

                            ?>

                            <div class="tab-pane active" id="tab1">

                                <form class="form-horizontal" action="islem.php" method="post" role="form">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Beceri Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="beceri_ad" class="form-control" value="<?php echo $becacek->beceri_ad; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Beceri Yüzdesi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="beceri_yuzde" class="form-control" value="<?php echo $becacek->beceri_yuzde; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group" >
                                        <label for="inputPassword3" class="col-sm-2 control-label">Beceri id</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="beceri_id" class="form-control" value="<?php echo $becacek->beceri_id;?> - id değerini değiştiremezsiniz.">
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-11">
                                        <button name="beceri-duzenle" class="btn btn-success pull-right">Güncelle</button>
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