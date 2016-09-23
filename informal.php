<?php
## Created : Akinyemi Akinjiola
## Created : 27062016
## Purpose : Blank page

$page_title='INFORMAL SECTOR DATA CAPTURE';
$header_title='INFORMAL SECTOR DATA CAPTURE';
$page='Informal Sector Information';
$set_page='forms';
$desc = 'Informal Sector biodota capture';
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
 	$tbl ='informal';
 	// Assume invalid values:
 	$title = $lname = $fname = $mname = $mo = $em = $cat = $amt = $add = FALSE;
	
 	if (isset($_POST['title'])) {
 		$title  = prepare($_POST['title']);
	} else {
		 $title = NULL; 
	}
 	 $lname = prepare($_POST['lastName']);
 	 $fname = prepare($_POST['firstName']);
	
	if (isset($_POST['middleName'])) {
 		$mname  = prepare($_POST['middleName']);
	} else {
		 $mname = NULL; 
	}
 	 $mo = prepare($_POST['mobile']);
	
	if (isset($_POST['email'])) {
 		$em  = prepare($_POST['email']);
	} else {
		 $em = NULL; 
	}
 	 $cat = prepare($_POST['category']);
 	 $amt = prepare($_POST['amount']);
 	 $add = prepare($_POST['address']);
 	 $yr = date('Y');
	
	if ($title && $lname && $fname && $mname && $mo && $em && $cat && $amt && $add) { // If everything's OK...

	/* select the table to post to depending on the category
$q = "SELECT category FROM category WHERE cat_id='$cat'";
$r = $dbc->query($q);
$t = $r->fetch_assoc();
echo $tbl =strtolower($t['category']);
	 * */
	 

// Make sure the mobile no is available (unique value for each category):
$q = "SELECT * FROM $tbl WHERE mobile='$mo' AND category='$cat'";
$r = $dbc->query($q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

if($r->num_rows == 0) { //Available
//if (mysqli_num_rows($r) == 0) { // Available.


// Create the activation code:
// $a = md5(uniqid(rand(), true));

// Add the market info to the database:
$q = "INSERT INTO $tbl (title, lastname, firstname, middlename, mobile, email, category, amount, address, year, date_modified) 
		VALUES ('$title', '$lname', '$fname', '$mname', '$mo', '$em', '$cat', '$amt', '$add', $yr, NOW() )";
$r = $dbc->query($q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

if (mysqli_affected_rows($dbc) == 1)
{ // If it ran OK.

// Show the confirmation:
// Finish the page:
echo '<p class="success"><span style=" font-size:16px; color:#6B0707; font-weight:bold;">The information has been saved! </span> <br /> <br /> 
Please select the user and upload his/her passport and signature below. <br /> Thank You.</p>';
 } else {
echo '<p class="danger"><span style=" font-size:16px; color:#6B0707; font-weight:bold;">The account could not be created';
}

} else {
	echo '<p class="danger"><span style=" font-size:16px; color:#6B0707; font-weight:bold;">The information could not be stored. 
	<br /><p>Please check that you entered a unique mobile number';
	
}
} else {
echo '<p class="danger"><span style=" font-size:16px; color:#6B0707; font-weight:bold;">Something was not right about the information you gave';
	
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
		
												<label class="col-md-1 control-label"> Title </label>
                                    <div class="col-md-5">
                                <?php
                                // select from database table state
								$sql = "SELECT * FROM  title";
								$result = $dbc->query($sql);
								
								?>
                                        <select class="form-control" placeholder="...Select a title" name="title">
                                       <option>(Select a title)</option>
                                       
                                       <?php if ($result->num_rows > 0) {
   									 // output data of each row
    									while($tt = $result->fetch_assoc()) {
                                            ?>
                                            
                                        <option value="<?php echo $tt['title_id']; ?>"> <?php echo $tt['title']; ?></option>
                                            <?php  }
									   } else { echo 'no records found'; } ?>
                                            
                                       </select>
                                    </div>
                    
							</div>
							
            <div class="form-group">
                <label class="col-sm-1 control-label hidden-xs">Lastname</label>
                <div class="col-sm-3">
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-group"></i></span>
                    <input type="text" name="lastName" title="" class="form-control tip" placeholder="...Lastname" required>
                </div>
                </div>
                
                <label class="col-sm-1 control-label hidden-xs">Firstname</label>
                <div class="col-sm-3">
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="firstName" title="" class="form-control tip" placeholder="...Firstname" required>
                </div>
                </div>
                
                <label class="col-sm-1 control-label hidden-xs">Middlename</label>
                <div class="col-sm-3">
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="middleName" title="" class="form-control tip" placeholder="...middlename">
                </div>
                </div>
                
                </div>
	
				<div class="form-group">
                <label class="col-sm-1 control-label">Phone:</label> 
												 <div class="col-sm-5">
													<div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>
														<input type="text" class="form-control" data-mask="(999) 999-999-9999" name="mobile" required></div>
													<span class="help-block">(234) 802-345-6789</span>
												</div>
				<label class="col-sm-1 control-label">Email:</label> 
												 <div class="col-sm-5">
													<div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="email" class="form-control" name="email" ></div>
												</div>
                </div>  
                <div class="form-group">
		
												<label class="col-md-1 control-label"> Category </label>
                                    <div class="col-md-5">
                                <?php
                                // select from database table state
								$sql = "SELECT * FROM  category";
								$result = $dbc->query($sql);
								
								?>
                                        <select id="e4" class="col-md-12" placeholder="...Select a category" name="category" required>
                                       <option></option>
                                       
                                       <?php if ($result->num_rows > 0) {
   									 // output data of each row
    									while($cat = $result->fetch_assoc()) {
                                            ?>
                                            
                                        <option value="<?php echo $cat['cat_id']; ?>"> <?php echo $cat['category']; ?></option>
                                            <?php  }
									   } else { echo 'no records found'; } ?>
                                            
                                       </select>
                                    </div>
                 <label class="col-md-2 control-label"> Amount Paid </label>
					<div class="col-md-4">
                    <input type="number" name="amount" title="" class="form-control tip" placeholder="...Amount Paid" required>
							</div>    
							</div>    
                
                <div class="form-group">
                <label class="col-sm-1 control-label">Permanenet Address</label>
                <div class="col-sm-11">
                    <input type="text" name="address" title="" class="form-control tip" placeholder="...Permanent Address" required>
                </div>
                </div>   
                
                <input type="submit" id="myButton" class="btn btn-success right" name="submit" value="Submit" />
                 <input type="hidden" name="submitted" value="TRUE" />
                                             </form>

                </div>
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

<?php include 'C:\xampp\htdocs\market\includes\footer.php';?>
					