<?php
include('db_connect.php');
session_start();
if (isset($_GET['id'])) {
	$user = $conn->query("SELECT * FROM users where id =" . $_GET['id']);
	foreach ($user->fetch_array() as $k => $v) {
		$meta[$k] = $v;
	}
}
?>
<div class="container-fluid">
	<div id="msg"></div>

	<form action="" id="manage-user">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">
		<div class="form-group">
			<label for="name">Name</label>
			<!-- select team name from db -->
			<select name="team_name" id="tid" class="custom-select select2" onchange="getDetails()">
				<option value="" disabled selected>Select</option>
				<?php
				$team = $conn->query("SELECT * FROM team where team_id not in (select team_id from team_login)");
				while ($row = $team->fetch_assoc()) :
				?>
					<option value="<?php echo $row['team_name'] ?>"><?php echo $row['team_name'] ?></option>
				<?php endwhile; ?>

			</select>
		</div>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="usrn" id="username" class="form-control" readonly required autocomplete="off">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="text" name="password" id="password" class="form-control"  autocomplete="off"  required readonly>
		</div>


	</form>
</div>
<script>
	$('#manage-user').submit(function(e) {
		var team_name = document.getElementById("tid").value;
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;

		e.preventDefault();
		start_load()
		$.ajax({
			url: 'get_players.php',
				type: 'post',
				data: '&team_name=' + team_name + '&username=' + username + '&password=' + password +'&data=add_team_user',
				
			success: function(resp) {
				//alert(resp);
				if (resp == 1) {
					alert_toast("Data successfully saved", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)
				} else {
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					end_load()
				}
			}
		})
	})

	function getDetails() {
		var team_name = document.getElementById("tid").value;
		// remove all the spaces from the entered value
		team_name = team_name.replace(" ", '');
		// convert to lowercase
		team_name = team_name.toLowerCase();
		// set username as same value
		document.getElementById("username").value = team_name;
		// set password as same value
		document.getElementById("password").value = team_name + "@123";
	}
</script>