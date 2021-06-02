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
                            <div class="panel-title ">Sosyal Medya Hesapları <i style="color:black">(Hesabınızın
                                    olmadığı platformu boş bırakırsanız ana sitede gözükmez)</i></div>
                        </div>
                        <div class="content-box-large box-with-header">


                            <!-- ALERT KISMI BAŞLANGIÇ -->
                            <?php
                            if (isset($_GET['sosyal-guncelle'])) {
                                if ($_GET['sosyal-guncelle'] == "bos") {
                                    ?>
                                    <div class="alert alert-danger h5" role="alert">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Lütfen boş alan
                                        bırakmayınız!
                                    </div>
                                    <?php
                                } elseif ($_GET['sosyal-guncelle'] == "yes") {
                                    ?>
                                    <div class="alert alert-success h5" role="alert">
                                        <span class="bi bi-hand-thumbs-up"></span> Bilgiler güncellendi.
                                    </div>
                                <?php } elseif ($_GET['sosyal-guncelle'] == "no") {
                                    ?>
                                    <div class="alert alert-danger h5" role="alert">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Bilinmeyen bir hata
                                        oluştu!
                                    </div>
                                <?php }
                            }
                            ?>
                            <!-- ALERT KISMI BİTİŞ -->
                            <?php
                            $sm = $db->prepare("SELECT * FROM sosyalmedya");
                            $sm->execute();
                            $smcek = $sm->fetch(PDO::FETCH_OBJ);
                            ?>

                            <div class="tab-pane active" id="tab1">

                                <form class="form-horizontal" action="islem.php" method="post" role="form">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Facebook</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sm_facebook" class="form-control"
                                                   value="<?php echo $smcek->sm_facebook; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Twitter</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sm_twitter" class="form-control"
                                                   value="<?php echo $smcek->sm_twitter; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">İnstagram</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sm_instagram" class="form-control"
                                                   value="<?php echo $smcek->sm_instagram; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Youtube</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sm_youtube" class="form-control"
                                                   value="<?php echo $smcek->sm_youtube; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Google</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sm_google" class="form-control"
                                                   value="<?php echo $smcek->sm_google; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Pinterest</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sm_pinterest" class="form-control"
                                                   value="<?php echo $smcek->sm_pinterest; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Linkedin</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sm_linkedin" class="form-control"
                                                   value="<?php echo $smcek->sm_linkedin; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Snapchat</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sm_snapchat" class="form-control"
                                                   value="<?php echo $smcek->sm_snapchat; ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-11">
                                        <button name="sosyal-medya" class="btn btn-success pull-right">Güncelle</button>
                                    </div>
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