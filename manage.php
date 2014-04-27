<?php
session_start();

require_once("headers/mysql.php");

$user = empty($_SESSION['USER'])?"":$_SESSION['USER'];
$group = empty($_SESSION['GROUP'])?"":$_SESSION['GROUP'];
$admin = empty($_SESSION['G_ADMIN'])?false:$_SESSION['G_ADMIN'];

$req = $_POST['req'];
$body = $_POST['body'];

if(!empty($user) && $admin)
{
	if($req == "a-ad") {
		mysql_query("UPDATE user_groups SET admin='1' WHERE u_id='" . intval($body) . "' AND g_id='" . $group['id'] . "'");
		echo "Admin Privileges Granted!";
	}
	else if($req == "r-ad") {
		mysql_query("UPDATE user_groups SET admin='0' WHERE u_id='" . intval($body) . "' AND g_id='" . $group['id'] . "'");
		echo "Admin Privileges Revoked!";
	}
	else if($req == "del") {
		mysql_query("DELETE FROM user_groups WHERE u_id='" . intval($body) . "' AND g_id='" . $group['id'] . "'");
		echo "User Removed!";
	}
	else if($req == "news") {
		$body = json_decode($body);
		$args = array();
		foreach ($body as $b) {
			array_push($args, $b);
		}

		// [0] = g_id, [1] = title, [2] = text
		if(empty($args[1]) || empty($args[2])) {
			echo "Your post must have a title and a body!";
		}
		else if($args[0] == $group['id']) {
				mysql_query("INSERT INTO news (g_id, title, text) VALUES (" . $group['id'] . ", '" . addslashes($args[1]) . "', '" . addslashes($args[2]) . "')");
				echo "Added news post!";
		}
		else {
			echo "Groups did not match in the news post request!";
		}
	}
	else if($req == "video") {
		$body = json_decode($body);
		$args = array();
		foreach ($body as $b) {
			array_push($args, $b);
		}

		// [0] = g_id, [1] = title, [2] = video link
		if(empty($args[1]) || empty($args[2])) {
			echo "Your post must have a title and a link!";
		}
		else if($args[0] == $group['id']) {
			mysql_query("INSERT INTO videos (g_id, title, filepath) VALUES (" . $group['id'] . ", '" . addslashes($args[1]) . "', '" . addslashes($args[2]) . "')");
			echo "Added video post!";
		}
		else {
			echo "Groups did not match in the video post request!";
		}
	}

	else if($req == "c-n") {
		mysql_query("DELETE FROM news WHERE g_id='" . $group['id'] . "'");
		echo "Deleted all news posts!";
	}
	else if($req == "c-w") {
		// Find all workout post ids
		$sql = mysql_query("SELECT id FROM workouts WHERE g_id='" . $group['id'] . "'");
		$w_s = array();
		while($temp = mysql_fetch_array($sql)) {
			array_push($w_s, $temp['id']);
		}
		$in_str = "'" . implode("', '", $w_s) . "'";

		// Delete all files for the group
		$sql = mysql_query("SELECT filepath FROM workout_files WHERE w_id IN (" . $in_str . ")");
		while($temp = mysql_fetch_array($sql)) {
			unlink($temp['filepath']);
		}

		// Delete all file posts
		mysql_query("DELETE FROM workout_files WHERE w_id IN (" . $in_str . ")");
		// Delete all workout posts
		mysql_query("DELETE FROM workouts WHERE g_id='" . $group['id'] . "'");

		echo "Deleted all workout posts!";
	}
	else if($req == "c-p") {
		mysql_query("DELETE FROM news WHERE g_id='" . $group['id'] . "'");
		echo "Deleted all play posts!";
	}
	else if($req == "c-v") {
		mysql_query("DELETE FROM news WHERE g_id='" . $group['id'] . "'");
		echo "Deleted all video posts!";
	}
	else if($req == "d-g") {
		
	}
	else {
		echo "No operation request was matched.";
	}
}

mysql_close();
?>