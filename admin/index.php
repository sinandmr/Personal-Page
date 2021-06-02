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
	  					<div class="panel-title ">Anasayfa Bilgilendirme</div>
		  			</div>
		  			<div class="content-box-large box-with-header">
			  			  <div class="row">


                              <div class="col-md-3 panel-danger">
                                  <div class="content-box-header panel-heading">
                                      <div class="panel-title"><span class="glyphicon glyphicon-star"></span> Becerilerim</div>
                                  </div>
                                  <div class="content-box-large box-with-header">
                                      <div class="row">
                                      <?php
                                      $x = $db->prepare("SELECT * FROM becerilerim");
                                      $x->execute();
                                      $x->fetch(PDO::FETCH_OBJ);
                                      $say = $x->rowCount();
                                      ?>
                                          <center>
                                              <span style="font-size: 35px"><?php echo $say; ?></span>
                                              <p>Adet</p>
                                          </center>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-md-3 panel-warning">
                                  <div class="content-box-header panel-heading">
                                      <div class="panel-title "><span class="glyphicon glyphicon-globe"></span> Dillerim</div>
                                  </div>
                                  <div class="content-box-large box-with-header">
                                      <div class="row">
                                          <?php
                                          $x = $db->prepare("SELECT * FROM dil");
                                          $x->execute();
                                          $x->fetch(PDO::FETCH_OBJ);
                                          $say = $x->rowCount();
                                          ?>
                                          <center>
                                              <span style="font-size: 35px"><?php echo $say; ?></span>
                                              <p>Adet</p>
                                          </center>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-md-3 panel-info">
                                  <div class="content-box-header panel-heading">
                                      <div class="panel-title "><span class="glyphicon glyphicon-briefcase"></span> İşlerim</div>
                                  </div>
                                  <div class="content-box-large box-with-header">
                                      <div class="row">
                                          <?php
                                          $x = $db->prepare("SELECT * FROM isler");
                                          $x->execute();
                                          $x->fetch(PDO::FETCH_OBJ);
                                          $say = $x->rowCount();
                                          ?>
                                          <center>
                                              <span style="font-size: 35px"><?php echo $say; ?></span>
                                              <p>Adet</p>
                                          </center>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-md-3 panel-success">
                                  <div class="content-box-header panel-heading">
                                      <div class="panel-title "><span class="glyphicon glyphicon-edit"></span> Okullarım</div>
                                  </div>
                                  <div class="content-box-large box-with-header">
                                      <div class="row">
                                          <?php
                                          $x = $db->prepare("SELECT * FROM okul");
                                          $x->execute();
                                          $x->fetch(PDO::FETCH_OBJ);
                                          $say = $x->rowCount();
                                          ?>
                                          <center>
                                              <span style="font-size: 35px"><?php echo $say; ?></span>
                                              <p>Adet</p>
                                          </center>
                                      </div>
                                  </div>
                              </div>

                          </div>.
					</div>
		  		</div>
		  	</div>
		  </div>
		</div>
    </div>
<!--  FOOTER -->
<?php include"footer.php"; ?>