<?php
	session_start();
	if (isset($_SESSION['login']))
		header('Location: dashboard-ui.php');
	include 'lhast.php'; 
	include 'dbconf.php';
			$result = $mysqli->query("select * from user WHERE user = '".$_POST['user']."' and pass = '".hashku(1,$_POST['pass'])."'");
			if(@$result->num_rows != 0){
				while ($row = $result->fetch_assoc()) {
					$_SESSION['login'] = 'KJHAbkfase86234809701234hgvbKHJGVYH%$&^$%&$^*';
					$_SESSION['user'] = $row['user'];
					$_SESSION['pass'] = $row['pass'];
					$_SESSION['level'] = $row['level'];
					$_SESSION['since'] = $row['since'];
					$_SESSION['foto'] = "uploads/".$row['foto'];
				}
				header('Location: dashboard-ui.php');
			}
			else{
				$_SESSION['error']=1;
				header('Location: index.php');
			}
?>