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
                            <div class="panel-title ">Beceri Ekle</div>
                        </div><br>
                        <?php
                        if(isset($_GET['beceri'])=="bos"){
                            ?>
                            <div class="alert alert-danger h5" role="alert">
                                <span class="glyphicon glyphicon-remove-sign"></span> Lütfen boş alan bırakmayınız!
                            </div>
                        <?php } ?>
                        <div class="content-box-large box-with-header">
                            <?php
                            if(isset($_POST['ekle'])){

                                $beceri_ad = $_POST['beceri_ad'];
                                $beceri_yuzde = $_POST['beceri_yuzde'];

                                if(!$beceri_ad || !$beceri_yuzde){
                                    header("Location: beceri-ekle.php?beceri=bos");
                                }else{
                                    $beceriekle = $db->prepare("INSERT INTO becerilerim(beceri_ad,beceri_yuzde) VALUES (?,?)");
                                    $beceriekle->execute(array($beceri_ad,$beceri_yuzde));
                                    if($beceriekle){
                                        header("Location: beceriler.php?beceri=yes");
                                    }else {
                                        header("Location: beceriler.php?beceri=no");
                                    }
                                }
                            }
                            ?>

                            <div class="tab-pane active" id="tab1">

                                <form class="form-horizontal" action="" method="post" role="form">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Beceri Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="beceri_ad" class="form-control" placeholder="Beceri Adı">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Beceri Yüzdesi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="beceri_yuzde" class="form-control" placeholder="Beceri Yüzdesi">
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