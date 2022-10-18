<?php include('db_connect.php'); ?>

<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">

			</div>
		</div>
		<div class="row">

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Players</b>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Img</th>
									<th class="">Team</th>
									<th class="">Players</th>
									<th class="">Other Info</th>
								</tr>
							</thead>
							<tbody id="player_data">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>

</div>
<style>
	td {
		vertical-align: middle !important;
	}

	td p {
		margin: unset
	}

	table td img {
		max-width: 100px;
		max-height: 150px;
	}

	img {
		max-width: 100px;
		max-height: 150px;
	}
</style>
<script>
	$(document).ready(function() {
		$('table').dataTable()
	})

	function table() {
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			document.getElementById('player_data').innerHTML = this.responseText;

		}

		// xhttp.open("GET","getBidData.php");
		// send the team id to the getBidData.php
		xhttp.open("GET", "getBidData.php?page=player");
		xhttp.send();
	}

	setInterval(function() {
		table();
	}, 100);
</script>