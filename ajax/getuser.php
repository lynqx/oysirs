<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = intval($_GET['q']);
$db = 'market';
include_once('../init_connect.php');
//$con = mysqli_connect('localhost','root','','market');
if (!$dbc) {
    die('Could not connect: ' . mysqli_error($dbc));
}

//mysqli_select_db($con,"market");
$sql="SELECT * FROM lga WHERE state_id = '".$q."'";
$result = $dbc->query($sql);

?>

			<label class="col-sm-2 control-label">Local Govt Area:</label> 
				<div class="col-sm-4">
				<select class="form-control">
				<option>(Pls choose One)</option>
				<?php
				if($result->num_rows == 0) { echo "No records found"; 
				} else {
				while($lga = $result->fetch_assoc()) {
					?>
	            <option value="<?php echo $lga['lga_id']; ?>"> <?php echo $lga['lga_name']; ?></option>
	            <?php 
								} 
	            		}
	            ?>
	            </select>
				</div>	
												
<?php //close db connection
mysqli_close($dbc); 
?>
</body>
</html>