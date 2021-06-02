<!-- End Grid -->
</div>

<!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
    <p>Sosyal Medya Hesaplarım</p>
    <?php

    $sosyal = $db->prepare("SELECT * FROM sosyalmedya");
    $sosyal->execute();
    $sosyalcek = $sosyal->fetch(PDO::FETCH_OBJ);
    ?>
    <?php
    if($sosyalcek->sm_facebook==''){
        null;
    }else{?>
        <a href="<?php echo $sosyalcek->sm_facebook;?>" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>

    <?php }
    if($sosyalcek->sm_twitter==''){
        null;
    }else{ ?>
        <a href="<?php echo $sosyalcek->sm_twitter;?>" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>

    <?php }
    if($sosyalcek->sm_instagram==''){
        null;
    }else{?>
        <a href="<?php echo $sosyalcek->sm_instagram;?>" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>

    <?php }
    if($sosyalcek->sm_snapchat==''){
        null;
    }else{?>
        <a href="<?php echo $sosyalcek->sm_snapchat;?>" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>

    <?php }
    if($sosyalcek->sm_pinterest==''){
        null;
    }else{?>
        <a href="<?php echo $sosyalcek->sm_pinterest;?>" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>

    <?php }
    if($sosyalcek->sm_linkedin==''){
        null;
    }else{?>
        <a href="<?php echo $sosyalcek->sm_linkedin;?>" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>

    <?php }
    ?>
    <p><?php echo $ayarcek->site_footer ?></p>
</footer>

</body>
</html>
