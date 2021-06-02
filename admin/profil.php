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
                            <div class="panel-title ">Admin Bilgileri</div>
                        </div>
                        <div class="content-box-large box-with-header">
                            <!-- ALERT KISMI BAŞLANGIÇ -->
                            <?php
                            if (isset($_GET['guncelle'])) {
                                if ($_GET['guncelle'] == "yes") {
                                    ?>
                                    <div class="alert alert-success h5" role="alert">
                                        <span class="bi bi-hand-thumbs-up"></span> Başarıyla Güncellendi.
                                    </div>
                                <?php } elseif ($_GET['guncelle'] == "no") {
                                    ?>
                                    <div class="alert alert-warning h5" role="alert">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Bilinmeyen bir hata
                                        oluştu!
                                    </div>
                                <?php } elseif ($_GET['guncelle'] == 'bos') { ?>
                                    <div class="alert alert-danger h5" role="alert">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Lütfen boş alan
                                        bırakmayın!
                                    </div>
                                <?php }
                            } ?>
                            <!-- ALERT KISMI BİTİŞ -->
                            <div class="row">
                                <?php
                                $id = $_SESSION['admin_id'];
                                $admin = $db->prepare("SELECT * FROM admin WHERE admin_id=?");
                                $admin->execute(array($id));
                                $cek = $admin->fetch(PDO::FETCH_OBJ);
                                ?>
                                <div class="tab-pane active" id="tab1">

                                    <form class="form-horizontal" action="islem.php" method="post" role="form">

                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Admin Kullanıcı
                                                Adı</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="admin_kadi" class="form-control"
                                                       value="<?php echo $cek->admin_kadi; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Admin Şifre</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="admin_sifre" class="form-control"
                                                       value="<?php echo $cek->admin_sifre; ?>">
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="col-md-11">
                                            <button name="adminguncelle" class="btn btn-success pull-right">Güncelle
                                            </button>
                                        </div>
                                </div>

                                <div class="content-box-large box-with-header">
                                    <div class="row">

                                        <center>
                                            <span style="font-size: 35px"></span>
                                        </center>
                                    </div>
                                </div>


                            </div>
                            .
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  FOOTER -->
<?php include "footer.php"; ?>