<!-- Right Column -->
<div class="w3-twothird">

    <!-- İş Deneyimleri Başlangıç -->
    <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>İş Deneyimleri</h2>
        <div class="w3-container">
            <?php
            $is = $db->prepare("SELECT * FROM isler ORDER BY is_id DESC");
            $is->execute();
            $iscek = $is->fetchAll(PDO::FETCH_OBJ);
            foreach ($iscek as $ic){
            ?>
            <h5 class="w3-opacity"><b><?php echo $ic->is_ad; ?> / <?php echo $ic->is_kurum;?></b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right">
                </i><?php echo $ic->is_tarih;?> - <span class="w3-tag w3-teal w3-round">

                    <?php
                    if($ic->is_devam==1){
                        echo 'Devam Ediyor';
                    }
                    ?>
                </span></h6>
            <p><?php echo $ic->is_aciklama; ?></p>
            <hr>
            <?php } ?>
        </div>
    </div>






    <!-- İş Deneyimleri Bitiş -->

    <!-- Okul Başlangıç -->
    <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Eğitim</h2>
        <?php
            $egitim = $db->prepare("SELECT * FROM okul ORDER BY okul_id DESC");
            $egitim->execute();
            $egitimcek = $egitim->fetchAll(PDO::FETCH_OBJ);
            foreach ($egitimcek as $egitimrow){
        ?>
            <div class="w3-container">
                <h5 class="w3-opacity"><b><?php echo $egitimrow->okul_ad; ?></b></h5>
                <?php
                if($egitimrow->okul_devam==1){
                    echo '<span class="w3-tag w3-teal w3-round">Son Okul</span>';
                }else{
                    echo '<h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>'.$egitimrow->okul_tarih.'</h6>';
                }
                ?>
                <p><?php echo $egitimrow->okul_aciklama;?></p>
                <hr>
            </div>
            <?php } ?>
    <!-- Okul Bitiş -->


    <!-- End Right Column -->
</div>