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
                            <div class="panel-title ">Dil Ekle</div>
                        </div><br>
                        <?php
                        if(isset($_GET['dil'])=="bos"){
                            ?>
                            <div class="alert alert-danger h5" role="alert">
                                <span class="glyphicon glyphicon-remove-sign"></span> Lütfen boş alan bırakmayınız!
                            </div>
                        <?php } ?>
                        <div class="content-box-large box-with-header">
                            <?php
                            if(isset($_POST['ekle'])){

                                $dil_ad = $_POST['dil_ad'];
                                $dil_yuzde = $_POST['dil_yuzde'];

                                if(!$dil_ad || !$dil_yuzde){
                                    header("Location: dil-ekle.php?dil=bos");
                                }else{
                                    $dilekle = $db->prepare("INSERT INTO dil(dil_ad,dil_yuzde) VALUES (?,?)");
                                    $dilekle->execute(array($dil_ad,$dil_yuzde));
                                    if($dilekle){
                                        header("Location: diller.php?dil=yes");
                                    }else {
                                        header("Location: diller.php?dil=no");
                                    }
                                }
                            }
                            ?>

                            <div class="tab-pane active" id="tab1">

                                <form class="form-horizontal" action="" method="post" role="form">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Dil Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="dil_ad" class="form-control" placeholder="Dil Adı">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Dil Yüzdesi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="dil_yuzde" class="form-control" placeholder="Dil Yüzdesi">
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