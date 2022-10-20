<?php include('db_connect.php'); ?>
<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
				<!-- <form action="" id="manage-category"> -->
				<div class="card">
					<div class="card-header">
						Bid Form
					</div>
					<div class="card-body">
						<input type="hidden" name="id">

						<div class="form-group">
							<label class="control-label">Player Role</label>
							<select onchange="change(this.id)" id="category" class="select2">

								<option selected disabled>Select</option>

								<?php
								$i = 1;
								$category = $conn->query("SELECT * FROM player_role order by pro_id asc");
								while ($row = $category->fetch_assoc()) :
								?>
									<option value='<?php echo $row['pro_id'] ?>'><?php echo $row['player_role'] ?></option>

								<?php endwhile; ?>

							</select>
						</div>

						<div class="form-group" id="random_player" style="display:none">
							<label class="control-label">Random Player</label>
							<button type="button" class="btn btn-primary btn-sm btn-block" id="random_player" onclick="getRandomPlayer()">Random Player</button>
						</div>
						<div class="form-group" id="player_div" style="display:none">
							<label class="control-label">Player</label>
							<select id="player" onchange="change(this.id)" class="select">

								<option selected disabled id="select" onclick="on_select(this.id)">Select</option>

							</select>
						</div>

						<div class="form-group">
							<label class="control-label">Base Price</label>
							<input type="text" class="form-control" name="base_price" id="base_price" disabled>
						</div>


						<div class="form-group">
							<label class="control-label">Bid Price</label>
							<input type="number" class="form-control" name="bid_price" id="bid_price" required disabled>
						</div>

						<div class="form-group">
							<label class="control-label">Team</label>
							<select id="team" class="select2">
								<option selected disabled>Select</option>
								<?php
								$i = 1;
								$category = $conn->query("SELECT * FROM team order by team_id asc");
								while ($row = $category->fetch_assoc()) :
								?>

									<option value='<?php echo $row['team_id'] ?>'><?php echo $row['team_name'] ?></option>

								<?php endwhile; ?>
							</select>
						</div>


					</div>


					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3" type="button" id="save" onclick="change(this.id)"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" onclick="cancel()"> Cancel</button>
							</div>
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
									<th class="text-center">Team Name</th>
									<th class="text-center">Base Price</th>
									<th class="text-center">Bid Price</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$category = $conn->query("SELECT b.*, p.player_name, t.team_name FROM bids b join player p on b.player_id = p.id join team t on b.team_id = t.team_id order by p.player_name asc;");
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
											<p><b><?php echo $row['team_name'] ?></b></p>
										</td>
										<td class="">
											<p><b><?php echo $row['base_price'] ?></b></p>
										</td>
										<td class="">
											<p><b><?php echo $row['bid_price'] ?></b></p>
										</td>
										<td class="text-center">
											<button class="btn btn-sm btn-outline-primary edit_product" id="<?php echo $row['player_id'] ?>" onclick="edit(this.id)" type="button">Edit</button>
											<button class="btn btn-sm btn-outline-danger delete_product" id="<?php echo $row['id'] ?>" onclick="delete_(this.id,<?php echo $row['team_id'] ?>)" type="button">Delete</button>
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

	/* style select tag  */
	.select {
		/* make it use full width */
		width: 100%;
		/* remove default arrow */
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;

		/* increse height and give rounded border and disable it */
		height: 40px;
		border-radius: 5px;
		border: 1px solid #ccc;
		background: #fff;

		/* add padding */
		padding: 0 10px;
	}
</style>
<script>
	var players = [];
	var randomPlayer;
	// make a function to get a random player and set the value to the input
	function getRandomPlayer() {
		// get a random player from the array
		if (players.length > 0) {
			randomPlayer = players[Math.floor(Math.random() * players.length)];

			if (document.getElementById("player").value == randomPlayer) {
				getRandomPlayer();
			} else {
				// set the value of the select input to the random player
				$('#player').val(randomPlayer);
				lol1();
				change("player");
			}
		} else {
			// show no more players
			alert("No more players");
		}
	}


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
				bid_price.min = array[4];

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

					lol1();
					lol();
					lol2();

					window.location.replace("index.php?page=bids");

				}

			})

		} else if (id == "category") {

			var category_id = document.getElementById("category").value;
			var dropdown_player = document.getElementById("player_div");
			dropdown_player.style.display = "block";

			document.getElementById("random_player").style.display = "block";

			var category_id = document.getElementById("category");
			var player_role_value = category_id.value;

			var array;

			jQuery.ajax({
				url: 'get_players.php',
				type: 'post',
				data: '&pro_id=' + player_role_value + '&data=category',
				success: function(result) {
					players = [];
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
							players.push(array[i]);

							var option = document.createElement("option");
							option.value = array[i];
							option.text = array[i + 1];
							x.add(option);
						}

					}




				}
			})

		} else if (id == "player") {

			var player_id = document.getElementById("player").value;
			var array;

			jQuery.ajax({
				url: 'get_players.php',
				type: 'post',
				data: '&player_id=' + player_id + '&data=player',
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

	function delete_(id, tid) {

		jQuery.ajax({
			url: 'get_players.php',
			type: 'post',
			data: '&bid_id=' + id + '&data=delete',
			success: function(result) {
				lol();
				lol1();
				lol2();
				window.location.replace("index.php?page=bids");

			}

		})

	}

	function lol1() {


		jQuery.ajax({
			url: '../Bid/server.php',
			type: 'post',
			data: '&action=refresh',
			success: function(result) {

				// alert(result);

			},
		})

	}

	function lol() {


		jQuery.ajax({
			url: '../team/server.php',
			type: 'post',
			data: '&action=refresh',
			success: function(result) {

				// alert(result);

			},
		})

	}

	function lol2() {


		jQuery.ajax({
			url: '../stats/server.php',
			type: 'post',
			data: '&action=refresh',
			success: function(result) {

				// alert(result);

			},
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


	// // function
	// $(document).ready(function() {

	// 	$('#bid_price').on('input', function() {
	// 		if (document.getElementById("bid_price").value >= document.getElementById("base_price").value) {
	// 				document.getElementById("save").disabled = false;
	// 		} else {
	// 			document.getElementById("save").disabled = true;
	// 		}
	// 	});
	// });
	// $(document).ready(function() {

	// 	$('#team').on('change', function() {
	// 		if (document.getElementById("team").value != "Select") {
	// 			document.getElementById("save").disabled = false;

	// 			if (document.getElementById("bid_price").value >= document.getElementById("base_price").value) {
	// 				// onchange of team select box check if the team is already selected

	// 				document.getElementById("save").disabled = false;

	// 			}else{
	// 				document.getElementById("save").disabled = true;
	// 			}
	// 		} else {
	// 			document.getElementById("save").disabled = true;
	// 		}
	// 	});
	// });

	// 
</script>