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
                            <div class="panel-title ">Dil Düzenle</div>
                        </div>
                        <div class="content-box-large box-with-header">

                            <?php
                            if (isset($_GET['dilduzenleid'])) {

                                $id = $_GET['dilduzenleid'];

                                $beca = $db->prepare("SELECT * FROM dil WHERE dil_id=?");
                                $beca->execute(array($id));
                                $becacek = $beca->fetch(PDO::FETCH_OBJ);
                            }

                            ?>

                            <div class="tab-pane active" id="tab1">

                                <form class="form-horizontal" action="islem.php" method="post" role="form">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Dil Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="dil_ad" class="form-control"
                                                   value="<?php echo $becacek->dil_ad; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Dil Yüzdesi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="dil_yuzde" class="form-control"
                                                   value="<?php echo $becacek->dil_yuzde; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Dil id</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="dil_id" class="form-control"
                                                   value="<?php echo $becacek->dil_id; ?> - id değerini değiştiremezsiniz.">
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-11">
                                        <button name="dil-duzenle" class="btn btn-success pull-right">Güncelle</button>
                                    </div>
                                </form>
                            </div>
                            <br/><br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  FOOTER -->
<?php include "footer.php"; ?>