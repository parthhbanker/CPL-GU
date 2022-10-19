<?php include('db_connect.php'); ?>

<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
				<form action="" id="manage-category">
					<div class="card">
						<div class="card-header">
							Category Form
						</div>
						<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Name</label>
								<input type="text" class="form-control" name="name" id="team_name">
								<input type="hidden" name="team_id" id="team_id" value="" >
								<input type="hidden" name="old_team_name" id="old_team_name" value="" >
							</div>

							<div class="form-group">
								<label class="control-label">Logo</label>
								<input type="file" class="" value="null" name="img" accept="image/png" id="inp">
							</div>
							<div class="form-group">
								<label class="control-label">Logo Preview</label>&nbsp;
								<img src="" alt="" height="75" id="lp">
							</div>
						</div>

						<div class="card-footer">
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
									<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="cancel()"> Cancel</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- FORM Panel -->

			<!-- <script>
				function ch() {
					document.getElementById("lp").src = document.getElementById("inp").val();
				}

				$(function() {
					$('#inp').on('change', function() {
						var filePath = $(this).val();
						console.log(filePath);
					});
				});
			</script> -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<b>Category List</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Logo</th>
									<th class="text-center">Category</th>
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
										<td class="text-center"><img height="50" src="../assets/logos/<?php echo $row['team_name'] ?>.png" alt=""></td>
										<td class="">
											<p><b><?php echo $row['team_name'] ?></b></p>
										</td>
										<td class="text-center">
											<button class="btn btn-sm btn-outline-primary edit_product" type="button" data-id='<?php echo $row['team_id'] ?>' data-name='<?php echo $row['team_name'] ?>' onclick="edit(<?php echo $row['team_id'] ?>)">Edit</button>
											<button class="btn btn-sm btn-danger delete_category" type="button" data-id='<?php echo $row['team_id'] ?>'  >Delete</button>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel End -->
		</div>
	</div>
</div>
<style>
	td {
		vertical-align: middle !important;
	}
</style>

<script>
	function edit(id) {

		jQuery.ajax({
			url: 'get_players.php',
			type: 'post',
			data: '&team_id=' + id + '&data=edit_team',
			success: function(result) {

				array = result.split(";");

				document.getElementById("team_id").value = array[0];

				// alert(document.getElementById("team_id").value);

				x = document.getElementById("team_name");
				x.value = array[1];

				document.getElementById("old_team_name").value = array[1];

				var img = document.getElementById("lp");
				img.src = "../assets/logos/"+x.value+".png";

			}

		})

	}

	function cancel() {

		var img = document.getElementById("lp");
		img.src = ""
		$('#manage-category').get(0).reset();


	}

	$("input").change(function(e) {

		for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

			var file = e.originalEvent.srcElement.files[i];

			var img = document.getElementById("lp");
			var reader = new FileReader();
			reader.onloadend = function() {
				img.src = reader.result;
			}
			reader.readAsDataURL(file);

		}
	});

	$('#manage-category').submit(function(e) {
		e.preventDefault()
		start_load()
		var img = document.getElementById("lp");
		img.src = ""
		$.ajax({
			url: 'ajax.php?action=save_category	',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully added", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				} else if (resp == 2) {
					alert_toast("Data successfully updated", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				} else if (resp == 3) {
					alert_toast("Unable to add data", 'warning')
					setTimeout(function() {
						location.reload()
					}, 1500)

				} else if (resp == 4) {
					alert_toast("Unable to update data", 'warning')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
				window.location.reload();
			}
		})
	})
	$('.edit_category').click(function() {
		start_load()
		var cat = $('#manage-category')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='description']").val($(this).attr('data-description'))
		end_load()
	})
	$('.delete_category').click(function() {
		_conf("Are you sure to delete this category?", "delete_category", [$(this).attr('data-id')])
	})

	function delete_category($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_category',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				alert(resp);

				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}

				if (resp == 2) {
					alert_toast("Unable to delete data", 'warning')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
				
			}
		})
	}
	$('table').dataTable()
</script>