<?php
session_start();
ini_set('display_errors', 1);
class Action
{
	private $db;

	public function __construct()
	{
		ob_start();
		include 'db_connect.php';

		$this->db = $conn;
	}

	function bids_left()
	{
		extract($_POST);

		$bid_point_left = $this->db->query("SELECT sum(bid_price) from bids where team_id = $team_id")->fetch_array()[0];

		echo $bid_point_left;
	}

	function get_bids_pie_chart()
	{
		extract($_POST);
		$result = $this->db->query("SELECT p.player_name, b.bid_price from bids b , player p where p.id = b.player_id and b.team_id = $team_id");
		$bid_point_left = $this->db->query("SELECT sum(bid_price) from bids where team_id = $team_id")->fetch_array()[0];

		$str = "" ;

		$str = $str . $team_id . ";" ;
		$str = $str . $bid_point_left . ";" ;

		while ($row = $result->fetch_assoc()) {

			foreach ($row as $value) {

				$str = $str . $value . ";";
			}
		}

		echo $str ;

	}

	function __destruct()
	{
		$this->db->close();
		ob_end_flush();
	}
	function login2()
	{

		extract($_POST);
		$qry = $this->db->query("SELECT * FROM team_login where username = '" . $username . "' and password = '" . md5($password) . "' ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'password' && !is_numeric($key))
					$_SESSION['team_login_' . $key] = $value;
			}
			return 1;
		} else {
			return 3;
		}
	}
	function logout2()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:./index.php");
	}
}
