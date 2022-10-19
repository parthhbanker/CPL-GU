<?php
require('db_connect.php');
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
	function __destruct()
	{
		$this->db->close();
		ob_end_flush();
	}

	function login()
	{

		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '" . $username . "' and password = '" . md5($password) . "' ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			return 1;
		} else {
			return 3;
		}
	}
	function login2()
	{

		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '" . $username . "' and password = '" . md5($password) . "' ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			if ($_SESSION['login_type'] == 1) {
				foreach ($_SESSION as $key => $value) {
					unset($_SESSION[$key]);
				}
				return 2;
				exit;
			}
			return 1;
		} else {
			return 3;
		}
	}
	function logout()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function logout2()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user()
	{
		extract($_POST);
		// name	
		$data = "name = '$name'";


		$data .= ", username = '$username' ";
		if (!empty($password))
			$data .= ", password = '" . md5($password) . "' ";
		if ($type == 1)
			$establishment_id = 0;
		$chk = $this->db->query("Select * from users where username = '$username' and id !='$id' ")->num_rows;
		if ($chk > 0) {
			echo 2;
			return;
			exit;
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO users set " . $data);
		} else {
			$save = $this->db->query("UPDATE users set " . $data . " where id = " . $id);
		}
		if ($save) {
			echo 1;
			return;
		}
	}
	function delete_user()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = " . $id);
		if ($delete)
			return 1;
	}
	function update_account()
	{
		extract($_POST);
		$data = " name = '" . $firstname . ' ' . $lastname . "' ";
		$data .= ", username = '$email' ";
		if (!empty($password))
			$data .= ", password = '" . md5($password) . "' ";
		$chk = $this->db->query("SELECT * FROM users where username = '$email' and id != '{$_SESSION['login_id']}' ")->num_rows;
		if ($chk > 0) {
			return 2;
			exit;
		}
		$save = $this->db->query("UPDATE users set $data where id = '{$_SESSION['login_id']}' ");
		if ($save) {
			$data = '';
			foreach ($_POST as $k => $v) {
				if ($k == 'password')
					continue;
				if (empty($data) && !is_numeric($k))
					$data = " $k = '$v' ";
				else
					$data .= ", $k = '$v' ";
			}
			if ($_FILES['img']['tmp_name'] != '') {
				$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
				$move = move_uploaded_file($_FILES['img']['tmp_name'], 'assets/uploads/' . $fname);
				$data .= ", avatar = '$fname' ";
			}
			$save_alumni = $this->db->query("UPDATE alumnus_bio set $data where id = '{$_SESSION['bio']['id']}' ");
			if ($data) {
				foreach ($_SESSION as $key => $value) {
					unset($_SESSION[$key]);
				}
				$login = $this->login2();
				if ($login)
					return 1;
			}
		}
	}

	function save_category()
	{
		extract($_POST);
		// $tid = $this->db->query("select * from team where team_name = '$old_team_name'")->fetch_array()['team_id'];

		if (empty($team_id)) {

			$save = $this->db->query("INSERT INTO team(team_name) values ('$name')");
			// add image to logo folder
			if ($save) {
				$fname = $_FILES['img']['name'];

				$team_id = $this->db->insert_id;

				if (empty($_FILES['img']['tmp_name'])) {

					$this->db->query("DELETE From team where team_name = '$name'");
					echo 3;
				} else {

					$move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/logos/' . $name . '.png');

					if ($move == 1) {
						echo 1;
					} else {
						echo 3;
					}
				}
			} else {

				echo 3;
			}
		} else {

			if (mysqli_num_rows(mysqli_query($this->db, "select * from team where team_id = '$team_id' ")) > 0) {

				if ($name != $old_team_name) {

					$save = $this->db->query("UPDATE team set team_name = '$name' where team_id = '$team_id' ");

					if ($save) {

						if (empty($_FILES['img']['tmp_name'])) {

							$rn = rename('../assets/logos/' . $old_team_name . '.png', '../assets/logos/' . $name . '.png');
							if ($rn) {
								echo 2;
							} else {
								$this->db->query("UPDATE team set team_name = '$old_team_name' where team_id = '$team_id' ");
								echo 4;
							}
						} else {

							$move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/logos/' . $name . '.png');

							if ($move == 1) {
								unlink('../assets/logos/' . $old_team_name . '.png');
								echo 2;
							} else {
								$this->db->query("UPDATE team set team_name = '$old_team_name' where team_id = '$team_id' ");
								echo 4;
							}
						}
					}
				} else {

					if (!empty($_FILES['img']['tmp_name'])) {

						unlink('../assets/logos/' . $name . '.png');
						$move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/logos/' . $name . '.png');

						if ($move == 1) {
							echo 2;
						} else {
							echo 4;
						}
					} else {

						echo 2;
					}
				}
			}
		}
	}
	function delete_category()
	{
		extract($_POST);

		$team_name = $this->db->query("SELECT team_name from team where team_id = " . $id)->fetch_array()['team_name'];
		$delete = unlink('../assets/logos/' . $team_name . '.png');

		if ($delete) {

			$delete = $this->db->query("DELETE FROM team where team_id = " . $id);

			if ($delete) {

				return 1;
			} else {

				return 2;
			}
		} else {

			return 2;
		}
	}
	function save_product()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'img')) && !is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}

		if (empty($id)) {
			$save = $this->db->query("INSERT INTO products set $data");
			$id = $this->db->insert_id;
		} else {
			$save = $this->db->query("UPDATE products set $data where id = $id");
		}

		if ($save) {

			if ($_FILES['img']['tmp_name'] != '') {
				$ftype = explode('.', $_FILES['img']['name']);
				$ftype = end($ftype);
				$fname = $id . '.' . $ftype;
				if (is_file('../assets/logo/' . $fname))
					unlink('../assets/logo/' . $fname);
				$move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/logo/' . $fname);
				$save = $this->db->query("UPDATE products set img_fname='$fname' where id = $id");
			}
			return 1;
		}
	}
	function delete_product()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM player where id = '" . $id . "'");
		if ($delete) {
			return 1;
		}
	}
	function delete_team_user()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM team_login where id = " . $id);
		if ($delete)
			return 1;
	}
}
