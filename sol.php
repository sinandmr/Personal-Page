<?php
# Bilgilerim Başlangıç
$bilgi = $db->prepare("SELECT * FROM bilgilerim");
$bilgi->execute();
$bilgicek = $bilgi->fetch(PDO::FETCH_OBJ);
# Bilgilerim Bitiş

# Beceriler Başlangıç
# Becerileri foreach döngüsünde kullanacağımız için fetchAll'ı kullandık.
$beceri = $db->prepare("SELECT * FROM becerilerim");
$beceri->execute();
$becericek = $beceri->fetchAll(PDO::FETCH_OBJ);
# Beceriler Bitiş

# Dil Başlangıç
$dil = $db->prepare("SELECT * FROM dil");
$dil->execute();
$dilcek = $dil->fetchAll(PDO::FETCH_OBJ);
# Dil Bitiş
?>
<div class="w3-third">

    <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
            <img src="<?php echo $bilgicek->bilgi_fotoğraf;?>" style="width:100%" alt="Avatar">
            <div class="w3-display-bottomleft w3-container w3-text-black">
                <h2 style="color:white"><?php echo $bilgicek->bilgi_isim;?></h2>
            </div>
        </div>
        <!-- Sosyal Medya Başlangıç -->
        <div class="w3-container">
            <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $bilgicek->bilgi_meslek;?></p>
            <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $bilgicek->bilgi_ikamet;?></p>
            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $bilgicek->bilgi_mail;?></p>
            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $bilgicek->bilgi_telefon;?></p>
            <p><i class="fa fa-skype fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $bilgicek->bilgi_skype;?></p>
            <hr>
            <!-- Sosyal Medya Bitiş -->

            <!-- Beceriler Başlangıç -->
            <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Beceriler</b></p>
            <?php
            foreach ($becericek as $bc){?>
                <p><?php echo $bc->beceri_ad;?></p>
                <div class="w3-light-grey w3-round-xlarge w3-small">
                    <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:<?php echo $bc->beceri_yuzde;?>%">%<?php echo $bc->beceri_yuzde;?></div>
                </div>
            <?php } ?>
            <!-- Beceriler Bitiş -->

            <br>

            <!-- Dil Başlangıç -->
            <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Diller</b></p>
            <?php
            foreach ($dilcek as $dc) {?>
                <p><?php echo $dc->dil_ad;?></p>
                <div class="w3-light-grey w3-round-xlarge ">
                    <div class="w3-round-xlarge  w3-center w3-teal" style="height:24px;width:<?php echo $dc->dil_yuzde;?>%"><?php echo $dc->dil_yuzde;?>%</div>
                </div>
            <?php } ?>
            <!-- Dil Bitiş -->

            <br>
        </div>
    </div><br>

    <!-- End Left Column -->
</div>