<?php
	// connection
	require_once('connection.php');

	// sql query
	$query = "SELECT * FROM users";
	$url_authors = "index.php?page=authors/";
?>

<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-bordered" style="margin-top: 10px">
			<tr>
				<th width="50px">No</th>
				<th>Username</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Status</th>
			</tr>

			<?php
			$data = mysqli_query($connection, $query);

			if ($data->num_rows > 0) {
				$no = 1;
				while ( $obj = mysqli_fetch_object($data) ) {
			?>

					<tr>
						<td><?= $no ?></td>
						<td><?= $obj->username ?></td>
						<td><?= $obj->name ?></td>
						<td><?= $obj->email ?></td>
						<td><?= $obj->is_active == '1' ? 'Active' : 'Unactive' ?></td>
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