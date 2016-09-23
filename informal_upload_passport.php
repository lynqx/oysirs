<?php
## Created : Akinyemi Akinjiola
## Created : 27062016
## Purpose : Blank page

$page_title='UPLOAD PASSPORT AND SIGNATURE';
$header_title='UPLOAD PASSPORT AND SIGNATURE';
$page='Informal Sector';
$set_page='forms';
$desc = 'Page to upload passport and signature of informal sector data';
?>
	
<?php include 'C:\xampp\htdocs\oysirs\includes\header.php'; ?>

				<!-- FORMS -->
						
<div class="box border green">
    <div class="box-title">
        <h4><i class="fa fa-bars"></i>SECTION A: Passport Upload</h4>
        <div class="tools hidden-xs">
            
            <a href="javascript:;" class="reload">
                <i class="fa fa-refresh"></i>
            </a>
            <a href="javascript:;" class="collapse">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="box-body big">
									
									<form class="form-horizontal " id="uploadimage" action="" method="post" enctype="multipart/form-data">
                
<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Passport</h3>
									</div>
									<div class="panel-body">
										<div class="col-md-10">
											<div class="form-group">
												<label class="col-md-2 control-label"> Full name </label>
                                    <div class="col-md-10">
                                <?php
                                // select from database table state
								$sql = "SELECT * FROM  informal";
								$result = $dbc->query($sql);
								
								?>
                                        <select id="e4" name="user" class="col-md-12" placeholder="...Select a member" onchange="showUser(this.value)" required>
                                       <option></option>
                                       
                                       <?php if ($result->num_rows > 0) {
   									 // output data of each row
    									while($sta = $result->fetch_assoc()) {
                                            ?>
                                            
                                        <option value="<?php echo $sta['informal_id']; ?>"> <?php echo ucwords($sta['lastname']); ?> <?php echo ucwords($sta['firstname']); ?> <?php echo ucwords($sta['middlename']); ?></option>
                                            <?php  }
									   } else { echo 'no records found'; } ?>
                                            
                                       </select>
                                       <span class="help-block"> Start typing the name to auto suggest the person. </span>
                                    </div>
                                    </div>
											<div id="image_preview">
												<img id="previewing" src="img/noimage.png" />
											</div>
											<hr id="line">
											<div class="form-group">
											<div id="selectImage">
											<input type="file" name="file" id="file" class="form-control tip col-md-5" required />
											<span class="help-block">Select Your Image</span>
											</div>
											</div>

											<input type="submit" value="Upload" class="btn btn-success right" />
											<h4 id='loading' >loading...</h4>
											<div id="message"></div>
										
									</div>
									</div>
									</div>
									</div>
								
								
								</div>
								<!-- /BOX -->
							</div>
							</div>
							
						</div>
                
                
             
										</div>
													
												</div>
											 </div>
												
                </div>
              
              
    </div>
                    </div>
                    <!-- /BOX -->
                </div>
            </div>
            <!-- /ADVANCED -->

</div>
</div>
</div>
<div class="separator"></div>

<?php $dbc->close(); ?>

<?php include 'C:\xampp\htdocs\oysirs\includes\footer.php';?>
					