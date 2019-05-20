<?php
	// connection
	require_once('connection.php');

	// sql query
	if ($_POST) {
		$sql = "UPDATE posts SET title='".$_POST['title']."', content='".$_POST['content']."', is_draft='".$_POST['status']."' WHERE id=".$_POST['id'];

		if ($connection->query($sql) === TRUE) {
			echo "<script>
				alert('Data berhasil diubah');
				window.location.href='index.php?page=posts/index';
			</script>";
		} else {
			echo "Gagal: " . $connection->error;
		}

		$connection->close();
	} 
	else
	{
		$query = $connection->query("SELECT * FROM posts WHERE id=".$_GET['id']);

		if ($query->num_rows > 0) {
			$data = mysqli_fetch_object($query);
		} else {
			echo "Data tidak tersedia";
			die();
		}
?>

		<div class="row">
			<div class="col-lg-6">
				<a href="index.php?page=posts/index" class="btn btn-secondary btn-sm" style="margin-bottom: 1rem;">
					<i class="fa fa-arrow-left"></i> Kembali
				</a>

				<h2>Form Posts > Ubah Data</h2>
				<hr>
				<form action="" method="POST">
					<input type="hidden" name="id" value="<?= $data->id ?>">
					<div class="form-group">
						<label>Judul</label>
						<input type="text" value="<?= $data->title ?>" class="form-control" name="title">
					</div>
					<div class="form-group">
						<label>Isi Konten</label>
						<textarea class="form-control" name="content" rows="6"><?= $data->content ?></textarea>
					</div>
					<div class="form-group">
						<label>Status</label>
						<div>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" value="1" name="status" <?= $data->is_draft == '1' ? 'checked' : ''; ?> >Draft
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" value="0" name="status" <?= $data->is_draft == '0' ? 'checked' : ''; ?> >Publish
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

<?php
	}

mysqli_close($connection);
?>