<?php

	require_once('connection.php');

	try {
		$sql = "DELETE FROM posts WHERE id=".$_GET['id'];
		$connection->query($sql);
	} catch (Exception $e) {
		echo $e;
		die();
	}

	echo "<script>
		alert('Data berhasil di hapus');
		window.location.href='index.php?page=posts/index';
	</script>";

?>