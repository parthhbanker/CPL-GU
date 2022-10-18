<?php include('data.php'); ?>
<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
				<!-- <form action="" id="manage-category"> -->
				<div class="card">
					<div class="card-header">
						Team Bid Stats
					</div>
					<div class="card-body">
						<!-- show how many players are bidded -->
						<div class="form-group">
							<label for="" class="control-label">Players Bidded</label>
							<input type="text" class="form-control" id="player_count" name="player_count" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Total Point Used</label>
							<input type="text" class="form-control" id="bid_count" name="bid_count" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Points Left</label>
							<input type="number" class="form-control" id="bid_left" name="bid_left" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Players Left</label>
							<input type="number" class="form-control" id="player_left" name="player_left" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Average Bid</label>
							<input type="number" class="form-control" id="bid_avg" name="bid_avg" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Average Bid Left</label>
							<input type="number" class="form-control" id="bid_left_avg" name="bid_left_avg" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Highest Bid</label>
							<input type="number" class="form-control" id="highest_bid" name="highest_bid" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Lowest Bid</label>
							<input type="number" class="form-control" id="lowest_bid" name="lowest_bid" readonly>
						</div>
					</div>
				</div>
				<!-- </form> -->
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<b>Bids List</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover" id="bid_table">
							<thead>
								<tr>
									<th class="text-center">Player ID</th>
									<th class="text-center">Player Name</th>
									<th class="text-center">Base Point</th>
									<th class="text-center">Bid Point</th>
								</tr>
							</thead>

							<tbody  id="bid_data">

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

	img {
		max-width: 100px;
		max-height: 150px;
	}
</style>


<script>
	$(document).ready(function() {
		$('table').dataTable()
	})
	// use get_data on load

	// map the data to a dictionary
	datas = {}


	get_data();

	// call getdata on every seconf

	setInterval(function() {
		get_data();
	}, 100);

	// make a function to continously call data.php
	function get_data() {
		$.ajax({
			url: "data.php",
			type: "POST",
			data: "&team_id=<?php echo $_SESSION['team_login_team_id'] ?>&page=bids",
			success: function(data) {
				// console.log(data);
				datas = JSON.parse(data);

				console.log(datas);

				// if the bid is not yet started
				if (datas.bid_avg == null) {
					$("#bid_avg").html("0");
				} else {
					$("#bid_avg").html(datas.bid_avg);
				}

				// if highest bid is zero show no bid
				if (datas.highest_bid == 0) {
					$("#highest_bid").html("No Bid");
				}
				// if lowest bid is zero show no bid
				if (datas.lowest_bid == 0) {
					$("#lowest_bid").html("No Bid");
				}


				// map all the data to the input box
				document.getElementById("highest_bid").value = datas.highest_bid;
				document.getElementById("lowest_bid").value = datas.lowest_bid;

				document.getElementById("bid_left_avg").value = datas.bid_left_avg;
				document.getElementById("bid_avg").value = datas.bid_avg;
				document.getElementById("player_left").value = datas.player_left;

				document.getElementById("player_count").value = datas.player_count;
				document.getElementById("bid_count").value = datas.bid_count;
				document.getElementById("bid_left").value = datas.bid_left;
			}

		});
	}

	function table() {
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			document.getElementById('bid_data').innerHTML = this.responseText;

		}

		// xhttp.open("GET","getBidData.php");
		// send the team id to the getBidData.php
		xhttp.open("GET", "getBidData.php?team_id=<?php echo $_SESSION['team_login_team_id'] ?>&page=bids");
		xhttp.send();
	}

	setInterval(function() {
		table();
	}, 100);
</script>