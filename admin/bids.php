<?php include('db_connect.php'); ?>

<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
				<form action="" id="manage-category">
					<div class="card">
						<div class="card-header">
							Bid Form
						</div>
						<div class="card-body">
							<input type="hidden" name="id">

							<div class="form-group">
								<label class="control-label">Category</label>
								<select onchange="change()" id="category">
									<option selected disabled>Select</option>

									<?php
									$i = 1;
									$category = $conn->query("SELECT * FROM player_role order by pro_id	 asc");
									while ($row = $category->fetch_assoc()) :
									?>

										<option value='<?php echo $row['pro_Id'] ?>'><?php echo $row['player_role'] ?></option>

									<?php endwhile; ?>

								</select>
							</div>

							<div class="form-group" id="player_div" style="display:none">
								<label class="control-label">Player</label>
								<select id="player">
									<option selected disabled>Select</option>

								</select>
							</div>

							<div class="form-group">
								<label class="control-label">Base Price</label>
								<input type="text" class="form-control" name="name" disabled>
							</div>


							<div class="form-group">
								<label class="control-label">Bid Price</label>
								<input type="text" class="form-control" name="name">
							</div>

							<div class="form-group">
								<label class="control-label">Team</label>
								<select>
									<option>Select</option>
									<?php
									$i = 1;
									$category = $conn->query("SELECT * FROM team order by team_id asc");
									while ($row = $category->fetch_assoc()) :
									?>

										<option value='<?php echo $row['id'] ?>'><?php echo $row['team_name'] ?></option>

									<?php endwhile; ?>
								</select>
							</div>


						</div>


						<div class="card-footer">
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
									<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-category').get(0).reset()"> Cancel</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<b>Bids List</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Bids</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$category = $conn->query("SELECT * FROM team order by team_id asc");
								while ($row = $category->fetch_assoc()) :
								?>
									<tr>
										<td class="text-center"><?php echo $i++ ?></td>
										<td class="">
											<p><b><?php echo $row['team_name'] ?></b></p>
										</td>
										<td class="text-center">
											<!-- data-id="<?php echo $row['id'] ?>" -->
											<!-- data-id="<?php echo $row['id'] ?>" -->
											<button class="btn btn-sm btn-outline-primary edit_product" type="button">Edit</button>
											<button class="btn btn-sm btn-outline-danger delete_product" type="button">Delete</button>
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
	function change() {

		var dropdown_player = document.getElementById("player_div");
		dropdown_player.style.display = "block";

		var category_id = document.getElementById("category");
		var player_role_value = category_id.value;

		var array;

		jQuery.ajax({
			url: 'get_players.php',
			type: 'post',
			data: '&pro_id=' + player_role_value,
			success: function(result) {
				array = result.split(";");
				var x = document.getElementById("player");

				$("#player").empty();

				var option = document.createElement("option");
				option.text = "Select";
				option.selected = true ;
				option.disabled = true ;
				x.add(option);
				// creating options
				for (var i = 0; i < array.length; i++) {

					if (i % 2 == 0 && array[i + 1] != undefined) {

						var option = document.createElement("option");
						option.value = array[i];
						option.text = array[i + 1];
						x.add(option);

					}

				}

			}
		})
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