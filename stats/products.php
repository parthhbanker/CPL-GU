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


								<?php
								$players = $conn->query("SELECT p.*, (SELECT team_name from team t where t.team_id = p.team_id) as team_name FROM player p join bids b on b.player_id = p.id order by p.id asc");
								while ($row = $players->fetch_assoc()) :
								?>

									<tr data-id='<?php echo $row['id'] ?>'>
										<td class="text-center"><?php echo $row['id'] ?></td>
										<td class="">
											<div class="row justify-content-center">
												<img height="50" src="../assets/players/<?php
																						// check if file is available on name of id
																						if (file_exists('../assets/players/' . $row['id'] . '.png')) {
																							echo $row['id'] . '.png';
																						} else {
																							echo 'common.jpeg';
																						}
																						?>" alt="">
											</div>
										</td>
										<td>
											<p> <b><?php echo $row['team_name'] ?></b></p>
										</td>
										<td class="">
											<p>Name: <b><?php echo ucwords($row['player_name']) ?></b></p>
											<p><small>Role: <b><?php

																// select from table	
																if ($row['pro_id'] == "") {
																	echo "N/A";
																} else {
																	$role_id = $row['pro_id'];
																	$roles = $conn->query("SELECT * FROM player_role where pro_id = '$role_id'");
																	$role = $roles->fetch_assoc();
																	echo $role['player_role'];
																}


																?></b></small></p>
											<?php if ($row['bs_id'] != NULL) {
											?>
												<p><small>Bowling Style: <b><?php
																			$bs = $conn->query("SELECT * FROM bowling_style where bs_id = " . $row['bs_id']);
																			$bs = $bs->fetch_assoc();
																			echo $bs['bowling_style'] ?></b></small></p>
											<?php
											} ?>
											<?php if ($row['bth_id'] != NULL) {
											?>
												<p><small>Batting Hand: <b>
															<?php echo $row['bth_id'] == 1 ? 'Right Hand Batsman' : 'Left Hand Batsman' ?></b></small></p>
											<?php
											} ?>

										</td>
										<td>
											<p><small>Base Price: <b><?php echo number_format($row['base_price'], 2) ?></b></small></p>
											<p><small>Highest Bid: <b class="highest_bid"><?php
																							// get bid from bid table
																							$bid = $conn->query("SELECT * FROM bids where player_id = '" . $row['id'] . "'");
																							$bids = $bid->fetch_assoc();
																							echo mysqli_num_rows($bid) > 0 ? $bids['bid_price'] : 0;
																							?>

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
</script>