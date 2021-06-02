<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">


<div class="page-content container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-wrapper">
                <div class="box">
                    <div class="content-wrap">
                        <h6>ADMİN PANELİ KAYIT</h6>
                        <form action="islem.php" method="post">
                            <input class="form-control" name="admin_kadi" type="text" placeholder="Kullanıcı Adı">
                            <input class="form-control" name="admin_sifre" type="password" placeholder="Şifre">
                            <?php
                            if(isset($_GET['kayit'])){
                                if($_GET['kayit']=='bos'){?>
                                    <div class="alert alert-danger">Lütfen boş alan bırakmayınız.</div>
                                    <?php
                                }elseif($_GET['kayit']=='yes'){?>
                                    <div class="alert alert-success">Başarıyla kayıt oldunuz.</div>
                                <?php }elseif($_GET['kayit']=='no'){?>
                                    <div class="alert alert-warning">Kayıt olurken bir hata oluştu.</div>
                            <?php }} ?>

                            <button name="adminkayit" class="btn btn-success">Giriş Yap</button>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>