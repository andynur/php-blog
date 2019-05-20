<?php
	// connection
	require_once('connection.php');

	// sql query
	$query = "SELECT * FROM posts";
	if ( !empty($_GET['search']) ) {
		$query = "SELECT * FROM posts WHERE title LIKE '%". $_GET['search'] ."%'";
	}

	$url_post = "index.php?page=posts/";
?>

<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-8">
				<a href="<?= $url_post . 'create' ?>" class="btn btn-success btn-sm">
					<span class="fa fa-plus"></span> Tambah
				</a>

				<?php 
					if ( !empty($_GET['search']) ) { 
				?>
					<a href="<?= $url_post . 'index' ?>" class="btn btn-primary btn-sm">
						<span class="fa fa-refresh"></span> Tampilkan Semua
					</a>
				<?php 
					} 
				?>

			</div>
			<div class="col-md-4">
				<form action="">
					<div class="input-group">
						<input type="hidden" name="page" value="posts/index">
						<input type="text" name="search" class="form-control" value="<?= $_GET['search'] ?? '' ?>" placeholder="Pencarian...">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit" id="button-addon2" style="border-color: #ccc;">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<table class="table table-striped table-bordered" style="margin-top: 10px">
			<tr>
				<th width="50px">No</th>
				<th>Judul</th>
				<th>isi Konten</th>
				<th>Tanggal</th>
				<th>Status</th>
				<th style="text-align: center; width: 100px;">Aksi</th>
			</tr>

			<?php
			$data = mysqli_query($connection, $query);

			if ($data->num_rows > 0) {
				$no = 1;
				while ( $obj = mysqli_fetch_object($data) ) {
			?>

					<tr>
						<td><?= $no ?></td>
						<td><?= $obj->title ?></td>
						<td><?= substr($obj->content, 0, 100) . '...'; ?></td>
						<td><?= date('d/m/Y', strtotime($obj->created_at)) ?></td>
						<td>
							<span class="badge badge-<?= $obj->is_draft == '0' ? 'success' : 'warning' ?>">
								<?= $obj->is_draft == '0' ? 'Publish' : 'Draft' ?>
							</span>
						</td>
						<td style="text-align: center;">
							<a href="<?= $url_post . 'edit&id='.$obj->id ?>" class="btn btn-primary btn-sm">
								<span class="fa fa-edit"></span>
							</a>

							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="<?= $url_post . 'delete&id='.$obj->id ?>" class="btn btn-danger btn-sm">
								<span class="fa fa-trash"></span>
							</a>
						</td>
					</tr>

			<?php 
					$no++;
				}

				mysqli_free_result($data);
			} else {
				echo '<tr><td colspan="6">Tidak ada yang sesuai untuk ditampilkan.</td></tr>';
			}
			?>

		</table>
	</div>
</div>

<?php mysqli_close($connection); ?>