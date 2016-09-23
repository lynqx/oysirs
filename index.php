<?php
## Created : Akinyemi Akinjiola
## Created : 27062016
## Purpose : Blank page

$page_title='MARKET DATA CAPTURE';
$header_title='MARKET DATA CAPTURE';
$page='Market Information';
$set_page='forms';
$desc = 'Market biodota capture';
?>
	<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("showLga").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("showLga").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<?php include 'C:\xampp\htdocs\market\includes\header.php'; ?>

<?php
 //if(isset($_POST['submit'])) { 
 	if (isset($_POST['submitted'])) { // Handle the form.
 	
 	// Assume invalid values:
 	$mname = $mno = $sn = $fn = $mn = FALSE;
	
 	$mname = prepare($_POST['marketName']);
 	$mno = prepare($_POST['marketNo']);
 	$sn = prepare($_POST['surName']);
 	$fn = prepare($_POST['firstName']);
 	$mn = prepare($_POST['middleName']);
 	$bz = prepare($_POST['businessName']);
	
	if ($mname && $mno && $sn && $fn && $mn && $bz) { // If everything's OK...

// Make sure the email address is available:
$q = "SELECT * FROM markets WHERE businessName='$bz'";
$r = $dbc->query($q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

if($r->num_rows == 0) { //Available
//if (mysqli_num_rows($r) == 0) { // Available.


// Create the activation code:
// $a = md5(uniqid(rand(), true));

// Add the market info to the database:
$q = "INSERT INTO markets (marketName, marketNo, surName, firstName, middleName, businessName, date_created) 
		VALUES ('$mname', '$mno', '$sn', '$fn', '$mn', '$bz', NOW() )";
$r = $dbc->query($q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

if (mysqli_affected_rows($dbc) == 1)
{ // If it ran OK.

// Show the confirmation:
// Finish the page:
echo '<p class="success"><span style=" font-size:16px; color:#6B0707; font-weight:bold;">The information has been saved! </span> <br /> <br /> 
Please check your email and click on the link to activate your account. <br /> Thank You.</p></div>';
 } else {
echo '<p class="danger"><span style=" font-size:16px; color:#6B0707; font-weight:bold;">The account could not be created</div>';
}

} else {
	echo '<p class="danger"><span style=" font-size:16px; color:#6B0707; font-weight:bold;">The information could not be stored. 
	<br /><p>Please check that you entered a unique business name</div> </div>';
	
}
} else {
echo '<p class="danger"><span style=" font-size:16px; color:#6B0707; font-weight:bold;">Something was not right about the information you gave</div>';
	
}
}

?>
						<!-- FORMS -->
						<div class="box border green">
    <div class="box-title">
        <h4><i class="fa fa-bars"></i>SECTION A: Personal Data</h4>
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
        <form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"
        onsubmit = "document.getElementById('myButton').disabled=true; 
        document.getElementById('myButton').value='Submitting, please wait...';" >

            <div class="form-group">
                <label class="col-sm-2 control-label hidden-xs">Market Name</label>
                <div class="col-sm-5">
                    <input type="text" name="marketName" title="Enter the name of the market" class="form-control tip" placeholder="...Enter name of market" required>
                </div>
                <label class="col-sm-1 control-label hidden-xs">Market No</label>
                <div class="col-sm-3">
                    <input type="number" name="marketNo" title="Unique ID of market" class="form-control tip" placeholder="...Market No." required>
                </div>
            </div>
			<br /><hr /><br />

            <div class="form-group">
                <label class="col-sm-1 control-label hidden-xs">Surname</label>
                <div class="col-sm-3">
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-group"></i></span>
                    <input type="text" name="surName" title="" class="form-control tip" placeholder="...Surname" required>
                </div>
                </div>
                <label class="col-sm-1 control-label hidden-xs">Fisrtname</label>
                <div class="col-sm-3">
                	<div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="firstName" title="" class="form-control tip" placeholder="...Firstname" required>
                    </div>
                </div>

                <label class="col-sm-1 control-label hidden-xs">Middlename</label>
                <div class="col-sm-3">
                	<div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="middleName" title="" class="form-control tip" placeholder="...Middlename">
                    </div>
                </div>
            </div>

             <div class="form-group">
                                   <label class="col-sm-1 control-label">Gender:</label> 
												 <div class="col-sm-5">
														<select class="form-control" placeholder="Gender" required>
															<option>(Pls select a gender)</option>
															<option>Male</option>
                                            				<option>Female</option>
														</select>
												</div>
                                                      
                                       <label class="col-md-1 control-label">Marital Status</label>
                                    <div class="col-sm-5">
                                    	<?php
                                    	$sql = "SELECT * FROM m_status ORDER BY status_id";
										$result = $dbc->query($sql);
										?>
                                        <select class="form-control">
                                        	<option>(Choose One)</option>
                                        	<?php
                                        	if($result->num_rows > 0) {
                                        		while ($status = $result->fetch_assoc()) {
                                        	?>
                                            <option value = <?php echo $status['status_id']?>> <?php echo $status['status']?> </option>
                                            <?php }
											} else { echo 'no records found'; 
											
											} ?>
                                            
                                       </select>
                                    </div>
                                </div>
                                       
                           <div class="form-group">
												 <label class="col-md-1 control-label">Date of Birth:</label> 
												 <div class="col-md-5">
													<div class="input-group"> 
														<input type="text" class="form-control" data-mask="99/99/9999"><span class="input-group-btn"> <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i> Go!</button> </span></div>
													<span class="help-block">25/12/2001</span>
												</div>
												
												
												<label class="col-md-2 control-label"> State </label>
                                    <div class="col-md-4">
                                <?php
                                // select from database table state
								$sql = "SELECT * FROM  states";
								$result = $dbc->query($sql);
								
								?>
                                        <select id="e4" class="col-md-12" placeholder="...Select a state" onchange="showUser(this.value)">
                                       <option></option>
                                       
                                       <?php if ($result->num_rows > 0) {
   									 // output data of each row
    									while($sta = $result->fetch_assoc()) {
                                            ?>
                                            
                                        <option value="<?php echo $sta['state_id']; ?>"> <?php echo $sta['name']; ?></option>
                                            <?php  }
									   } else { echo 'no records found'; } ?>
                                            
                                       </select>
                                    </div>
							</div>  
							
							<div class="form-group" id="showLga">
								<!-- Show LGA selected from db acording to state here -->
							</div>
							
							<div class="form-group">
                <label class="col-sm-1 control-label">Maiden Name</label>
                <div class="col-sm-5">
                    <input type="text" name="regular" title="" class="form-control tip" placeholder="...Maiden Name">
                </div>

                <label class="col-sm-1 control-label">Phone:</label> 
												 <div class="col-sm-5">
													<div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i></span> <input type="text" class="form-control" data-mask="(999) 999-999-9999"></div>
													<span class="help-block">(234) 802-345-6789</span>
												</div>
                </div>      
                
                <div class="form-group">
                <label class="col-sm-1 control-label">Permanenet Address</label>
                <div class="col-sm-11">
                    <input type="text" name="regular" title="" class="form-control tip" placeholder="...Permanent Address">
                </div>
                </div>   
                
                
                 
                </div>
                </div>
                
                <div class="box border green">
    <div class="box-title">
        <h4><i class="fa fa-bars"></i>SECTION B: Company Details</h4>
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
        	
        	<div class="form-group">
                <label class="col-sm-2 control-label">Business Name</label>
                <div class="col-sm-5">
                    <input type="text" name="businessName" title="Enter the name of the market" class="form-control tip" placeholder="...Enter name of market" required>
                </div>

                <label class="col-sm-1 control-label">TIN</label>
                <div class="col-sm-4">
                    <input type="number" name="regular" title="Unique ID of market" class="form-control tip">
                </div>
    
              </div>
              <hr /> <br/>
              
              <div class="form-group">
                <label class="col-sm-1 control-label">Nature of Business</label>
                <div class="col-sm-4">
                	<div class="input-group"><span class="input-group-addon"><i class="fa fa-cog"></i></span>
                    <input type="text" name="businessName" title="" class="form-control tip" placeholder="...Nature of Business">
                    </div>
                </div>

                <label class="col-sm-1 control-label">Shop Number:</label> 
					<div class="col-sm-2">
					<div class="input-group"> <span class="input-group-addon"><i class="fa fa-plus-circle"></i></span> <input type="number" class="form-control"></div>
					</div>
												
				<label class="col-sm-1 control-label">Category:</label> 
												 <div class="col-sm-3">
														<select class="form-control">
															<option>(Pls choose One)</option>
															<option>Small</option>
                                            				<option>Medium</option>
                                            				<option>Large</option>
															</select>
												 </div>	
												</div>
												<br /><hr />	
						<input type="submit" id="myButton" class="btn btn-success right" name="submit" value="Submit" />
                 <input type="hidden" name="submitted" value="TRUE" />						
                </div>
              
              
                            </form>
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

<?php include 'C:\xampp\htdocs\market\includes\footer.php';?>
					