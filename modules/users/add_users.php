<?php
## Created : Akinyemi Akinjiola
## Created : 27062016
## Purpose : Blank page

$page_title='ADD USERS';
$header_title='ADD USERS';
$page='Add Users';
$set_page='forms';
$desc = 'This page is only accesible to IT unit staff to create a new member.';
?>

<?php include 'C:\xampp\htdocs\oysirs\includes\header.php'; ?>
<?php // check user roles and permission
$allowed = array(1, 2);
check_user_role($_SESSION['user_role'], $allowed);
?>
<?php
 //if(isset($_POST['submit'])) { 
 	if (isset($_POST['submitted'])) { // Handle the form.
 	$tbl ='users';
 	// Assume invalid values:
 	$fname = $lname = $em = $role = $active = FALSE;
	
 	
 	 $fname = prepare($_POST['firstName']);
	 $lname = prepare($_POST['lastName']);
	 $lname = prepare($_POST['lastName']);
	 $em = prepare($_POST['email']);
	 $role = prepare($_POST['role']);
 	 $active = 1;
	
	if ($fname && $lname && $em && $role && $active) { // If everything's OK...

	
// Make sure the email is available (unique value):
$q = "SELECT * FROM $tbl WHERE email='$em'";
$r = $dbc->query($q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

if($r->num_rows == 0) { //Available

// Create the unique password:
$p = uniqid();

// Add the market info to the database:
$q = "INSERT INTO $tbl (firstname, lastname, email, password, role, active, date_modified) 
		VALUES ('$fname', '$lname', '$em', '$p', '$role', '$active', NOW() )";
$r = $dbc->query($q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

if (mysqli_affected_rows($dbc) == 1)
{ // If it ran OK.

// Show the confirmation:
// Finish the page:
echo '<p class="success"><span style=" font-size:16px; color:#6B0707; font-weight:bold;">The user has been created and the password has been forwareded to the user\'s email address.! </span> <br /> <br /> 
 <br /> Thank You.</p>';
 } else {
echo '<p class="danger"><span style=" font-size:16px; color:#6B0707; font-weight:bold;">The user could not be created';
}

} else {
	echo '<p class="danger"><span style=" font-size:16px; color:#6B0707; font-weight:bold;">The information could not be stored. 
	<br /><p>Please check that you entered a unique email address';
	
}
} else {
echo '<p class="danger"><span style=" font-size:16px; color:#6B0707; font-weight:bold;">Something was not right about the information you gave';
	
}
}

?>
						<!-- FORMS -->
						<div class="box border green">
    <div class="box-title">
        <h4><i class="fa fa-bars"></i>Add New User</h4>
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
                               
                <label class="col-sm-1 control-label hidden-xs">Firstname</label>
                <div class="col-sm-5">
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="firstName" title="" class="form-control tip" placeholder="...Firstname" required>
                </div>
                </div>
                
                <label class="col-sm-1 control-label hidden-xs">Lastname</label>
                <div class="col-sm-5">
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="lastName" title="" class="form-control tip" placeholder="...Lastname">
                </div>
                </div>
                </div>
	
				<div class="form-group">
                
				<label class="col-sm-1 control-label">Email:</label> 
												 <div class="col-sm-5">
													<div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
														<input type="email" class="form-control" name="email" ></div>
												</div>
                
		
												<label class="col-md-1 control-label"> Role </label>
                                    <div class="col-md-5">
                                <?php
                                // select from database table state
								$sql = "SELECT * FROM  roles";
								$result = $dbc->query($sql);
								
								?>
                                        <select class="form-control" placeholder="...Select a user role" name="role">
                                       <option>(Select a role)</option>
                                       
                                       <?php if ($result->num_rows > 0) {
   									 // output data of each row
    									while($tt = $result->fetch_assoc()) {
                                            ?>
                                            
                                        <option value="<?php echo $tt['role_id']; ?>"> <?php echo $tt['role']; ?></option>
                                            <?php  }
									   } else { echo 'no records found'; } ?>
                                            
                                       </select>
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

<?php include 'C:\xampp\htdocs\oysirs\includes\footer.php';?>
					