<?php
include "dbconnect.php";

mysqli_select_db($conn,"ABB") or die ("database not found!!!");
$date = date("Y-m-d h:i:sa");

if(isset($_POST['submit'])){ 

	$poststatus = $_POST['status'];
	$postphase = $_POST['phase'];
	$postnumber = $_POST['number'];

	$sql = "INSERT INTO device (number, s_id, p_id) VALUES ('".$postnumber."', '".$poststatus."', '".$postphase."')";
	echo $sql;
	$result = mysqli_query($conn, $sql);
}

?>

<form method="post" action="">

	<input value="" name="number" placeholder="Dispositivo"><br><br>

	<select name="status">
	<?php	
		$sql = "SELECT * FROM status";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc ($result)){
			$step=$row['step'];
			$s_id=$row['id'];
	
		echo "<option value='$s_id'><center>" . $step . "</center></option>";
		}
	?>
	</select>
	
	<select name="phase">
	<?php	
		$sql = "SELECT * FROM phase";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc ($result)){
			$stage=$row['stage'];
			$p_id=$row['id'];
	
		echo "<option value='$p_id'><center>" . $stage . "</center></option>";
		}
	?>
	</select>
<br><br>
<input value="<?php echo $date; ?>" name="date">
<br><br>
<input type="submit" value="Submit" name="submit">

</form>

<?php
?>
