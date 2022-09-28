<?php
	include 'koneksi.php';
 
	echo "<option value=''>Pilih Area</option>";
 
	$query = "SELECT * FROM area ORDER BY nama ASC";
	$cottage1 = $db1->prepare($query);
	$cottage1->execute();
	$res1 = $cottage1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['id_area'] . "'>" . $row['nama'] . "</option>";
	}
?>