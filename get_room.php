<?php
	include 'koneksi.php';
	$area = $_POST['area'];
 
	echo "<option value=''>Pilih Kamar</option>";
 
	$query = "SELECT * FROM room WHERE id_area=? ORDER BY nama ASC";
	$cottage1 = $db1->prepare($query);
	$cottage1->bind_param("i", $area);
	$cottage1->execute();
	$res1 = $cottage1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['id_room'] . "'>" . $row['nama'] . "</option>";
	}
?>