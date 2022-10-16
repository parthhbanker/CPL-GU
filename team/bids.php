<?php include('db_connect.php'); ?>
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
						<!-- show how many players are bideed -->
						<?php
						$team_id = $_SESSION['team_login_team_id'] ;
						$players = $conn->query("SELECT * from bids where team_id = $team_id");
						$player_count = $players->num_rows;

						$bids = $conn->query("SELECT sum(bid_price) from bids where team_id = $team_id");
						$bid_count = $bids->fetch_array()[0];

						$bid_left = 50000 - $bid_count;

						$player_left = 13 - $player_count;

						$bid_avg = $player_count != 0 ?  $bid_count / $player_count : 0;

						$bid_left_avg = $bid_left / $player_left;

						$highest_bid = $conn->query("SELECT max(bid_price) from bids where team_id = $team_id");

						$lowest_bid = $conn->query("SELECT min(bid_price) from bids where team_id = $team_id");
						?>
						<div class="form-group">
							<label for="" class="control-label">Players Bidded</label>
							<input type="text" class="form-control" name="player_count" value="<?php echo $player_count ?>" readonly>
						</div>	
						<div class="form-group">
							<label for="" class="control-label">Total Point Used</label>
							<input type="text" class="form-control" name="bid_count" value="<?php echo $bid_count ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Points Left</label>
							<input type="number" class="form-control" name="bid_left" value="<?php echo $bid_left ?>" readonly>
						</div>	
						<div class="form-group">
							<label for="" class="control-label">Players Left</label>
							<input type="number" class="form-control" name="player_left" value="<?php echo $player_left ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Average Bid</label>
							<input type="number" class="form-control" name="bid_avg" value="<?php echo $bid_avg ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Average Bid Left</label>
							<input type="number" class="form-control" name="bid_left_avg" value="<?php echo $bid_left_avg ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Highest Bid</label>
							<input type="number" class="form-control" name="highest_bid" value="<?php echo $highest_bid->fetch_array()[0] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Lowest Bid</label>
							<input type="number" class="form-control" name="lowest_bid" value="<?php echo $lowest_bid->fetch_array()[0] ?>" readonly>
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
							<tbody>
								<?php
								$i = 1;
								$team_id = $_SESSION['team_login_team_id'];
								$category = $conn->query("SELECT b.*, p.player_name, t.team_name FROM bids b join player p on b.player_id = p.id join team t on b.team_id = t.team_id where b.team_id = $team_id order by p.player_name asc;");
								while ($row = $category->fetch_assoc()) :
								?>
									<tr>
										<td class="">
											<p><b><?php echo $row['player_id'] ?></b></p>
										</td>
										<td class="">
											<p><b><?php echo $row['player_name'] ?></b></p>
										</td>
										<td class="">
											<p><b><?php echo $row['base_price'] ?></b></p>
										</td>
										<td class="">
											<p><b><?php echo $row['bid_price'] ?></b></p>
										</td>
									</tr>
								<?php endwhile; ?>
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
	function edit(id) {

		// alert(id);

		jQuery.ajax({
			url: 'get_players.php',
			type: 'post',
			data: '&player_id=' + id + '&data=edit',
			success: function(result) {

				array = result.split(";");

				var category_id = document.getElementById("base_price").value = array[4];

				var bid_price = document.getElementById("bid_price");
				bid_price.value = array[5];
				bid_price.disabled = false;
				bid_price.min = array[4] ;

				// alert(result);
				var category_options_length = document.getElementById("category").options.length;
				var category_option = document.getElementById("category");
				for (var i = 0; i < category_options_length; i++) {

					if (category_option.options[i].value == array[0]) {

						category_option.options[i].selected = true;

					}

				}

				var dropdown_player = document.getElementById("player_div").style.display = "block";
				var x = document.getElementById("player");
				var option = document.createElement("option");
				option.value = array[2];
				option.text = array[3];
				option.selected = true;

				x.add(option);

				var team_options_length = document.getElementById("team").options.length;
				var team_option = document.getElementById("team");
				for (var i = 0; i < team_options_length; i++) {

					if (team_option.options[i].value == array[6]) {

						team_option.options[i].selected = true;

					}

				}

			}

		})

	}

	function cancel() {

		var dropdown_player = document.getElementById("player_div").style.display = "none";
		var category_id = document.getElementById("category").value = "select";
		var category_id = document.getElementById("base_price").value = "";
		var category_id = document.getElementById("bid_price").value = "";
		var category_id = document.getElementById("team").value = "select";
		<?php $query_i_u = "update" ?>



	}

	function change(id) {

		if (id == "save") {
			var player_id = document.getElementById("player").value;
			var base_price = document.getElementById("base_price").value;
			var bid_price = document.getElementById("bid_price").value;
			var team_id = document.getElementById("team").value;

			jQuery.ajax({
				url: 'get_players.php',
				type: 'post',
				data: '&player_id=' + player_id + '&team_id=' + team_id + '&base_price=' + base_price + '&bid_price=' + bid_price + '&data=save',
				success: function(result) {

					// cancel();
					window.location.replace("index.php?page=bids");

				}

			})

		} else if (id == "category") {

			var dropdown_player = document.getElementById("player_div");
			dropdown_player.style.display = "block";

			var category_id = document.getElementById("category");
			var player_role_value = category_id.value;

			var array;

			jQuery.ajax({
				url: 'get_players.php',
				type: 'post',
				data: '&pro_id=' + player_role_value + '&data=category',
				success: function(result) {
					array = result.split(";");

					var x = document.getElementById("player");

					$("#player").empty();

					var option = document.createElement("option");
					option.text = "Select";
					option.selected = true;
					option.disabled = true;
					x.add(option);
					// creating options
					for (var i = 0; i < array.length; i++) {

						if (i % 2 == 0 && array[i + 1] != undefined) {
							console.log(array[i]);

							var option = document.createElement("option");
							option.value = array[i];
							option.text = array[i + 1];
							x.add(option);

						}

					}

				}
			})

		} else if (id == "player") {

			var player_id = document.getElementById("player");
			var player_id_value = player_id.value;

			var array;

			jQuery.ajax({
				url: 'get_players.php',
				type: 'post',
				data: '&player_id=' + player_id_value + '&data=player',
				success: function(result) {
					var x = document.getElementById("base_price");
					x.value = result;
					var y = document.getElementById("bid_price");
					y.disabled = false;
					y.min = result;

				}
			})

		}

	}

	function delete_(id) {

		jQuery.ajax({
			url: 'get_players.php',
			type: 'post',
			data: '&bid_id=' + id + '&data=delete',
			success: function(result) {

				window.location.replace("index.php?page=bids");

			}

		})

	}

	function on_select() {

		alert("hidden");
		var select_option = document.getElementById("select");
		select_option.style.visibility = "hidden"

	}

	$(document).ready(function() {
		$('table').dataTable()
	})

	$('.view_user').click(function() {
		uni_modal("<i class'fa fa-card-id'></i> Buyer Details", "view_udet.php?id=" + $(this).attr('data-id'))

	})
	$('#new_book').click(function() {
		uni_modal("New Book", "manage_booking.php", "mid-large")

	})
	$('.edit_book').click(function() {
		uni_modal("Manage Book Details", "manage_booking.php?id=" + $(this).attr('data-id'), "mid-large")

	})
	$('.delete_book').click(function() {
		_conf("Are you sure to delete this book?", "delete_book", [$(this).attr('data-id')])
	})

	function delete_book($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_book',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	}

</script>