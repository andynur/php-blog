<?php
	// connection
	require_once('connection.php');

	// sql query
	if ($_POST) {
		try {
			$sql = "INSERT INTO posts (title,content,is_draft) VALUES ('".$_POST['title']."','".$_POST['content']."','".$_POST['status']."')";

			if ( !$connection->query($sql) ) {
				echo $connection->error;
				die();
			}

		} catch (Exception $e) {
			echo $e;
			die();
		}
		
		echo "<script>
			alert('Data berhasil di simpan');
			window.location.href='index.php?page=posts/index';
		</script>";
	}
?>

<div class="row">
	<div class="col-lg-6">
		<a href="index.php?page=posts/index" class="btn btn-secondary btn-sm" style="margin-bottom: 1rem;">
			<i class="fa fa-arrow-left"></i> Kembali
		</a>

		<h2>Form Posts > Tambah Data</h2>
		<hr>
		<form action="" method="POST">
			<input type="hidden" name="id">
			<div class="form-group">
				<label>Judul</label>
				<input type="text" class="form-control" name="title">
			</div>
			<div class="form-group">
				<label>Isi Konten</label>
				<textarea class="form-control" name="content" rows="6"></textarea>
			</div>
			<div class="form-group">
				<label>Status</label>
				<div>
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="1" name="status" checked>Draft
						</label>
					</div>
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="0" name="status">Publish
						</label>
					</div>
				</div>
			</div>

			<hr>	
			
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-refresh"></i> Simpan Perubahan
			</button>
		</form>
	</div>
</div>