<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex" id="wrapper">

	<div id="page-content-wrapper">
		<div class="container mt-4">

			<h3 class="pb-3 text-center">Daftar Harga Komoditas di Pasar
				<hr>
			</h3>

			<table id="surveyor-commodity" class="table table-striped table-bordered  text-center" style="width:100%">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Komoditas</th>
						<th>Pasar</th>
						<th>Harga</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($market_commodity as $mc) : ?>
						<?php
						$date = date("d/m/Y", strtotime($mc['survey_date']));
						$price = number_format($mc['price'], 0, ".", ".");
						?>

						<tr>
							<td><?= $i++; ?></td>
							<td><?= htmlentities($mc['commodity_name'], ENT_QUOTES, 'UTF-8') ?></td>
							<td><?= htmlentities($mc['market_name'], ENT_QUOTES, 'UTF-8') ?></td>
							<td><?= $price ?></td>
							<td><?= $date ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

		</div>
	</div>

	<footer>
		<div class="footer shadow">
			<p class="my-3"><a href="/users" class="">Login Staff</a></p>
		</div>
	</footer>
</div>

</div>

<?php $this->endSection(); ?>