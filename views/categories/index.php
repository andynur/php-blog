<?php
	// connection
	require_once('connection.php');

	// sql query
	$query = "SELECT * FROM categories";
	$url_categories = "index.php?page=categories/";
?>

<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-bordered" style="margin-top: 10px">
			<tr>
				<th width="50px">No</th>
				<th>Nama Kategori</th>
			</tr>

			<?php
			$data = mysqli_query($connection, $query);

			if ($data->num_rows > 0) {
				$no = 1;
				while ( $obj = mysqli_fetch_object($data) ) {
			?>

					<tr>
						<td><?= $no ?></td>
						<td><?= $obj->name ?></td>
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