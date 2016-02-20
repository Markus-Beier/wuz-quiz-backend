<?php
class loginCheck {
	# returns:
	# 0 logged out
	# 1	logged in
	# 2	login error
	function status(){
		if (isset($_SESSION['username'])){
			return 1;
		} else if(isset($_POST['sent'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			if ($username == 'testuser' and $password == 'testpw'){
				$_SESSION['username'] = $username;
				echo '
				<script language=\'javascript\' type=\'text/javascript\'>
					storeLocalData(\'username\',\'' . $username . '\');
					<!-- ... -->
					<!-- ... -->
					<!-- ... -->
				</script>';
				return 1;
			} else {
				return 2;
			}
		} else{
			return 0;
		}
	}
}
class db {
	function connect($sql){
		$conn = new mysqli('127.0.0.1', 'testdb', 'testpw', 'testdb');
		if (!$conn) {
			echo 'Keine Verbindung zu DB möglich: ' . mysql_error();
			exit;
		}
		$conn->query('SET NAMES \'utf8\'');
		$result = $conn->query($sql);
		if (!$result) {
			echo 'Konnte Abfrage (' . $sql . ') nicht erfolgreich ausführen von DB: ' . mysql_error();
			exit;
		}
		mysqli_close($conn);
		return $result;
	}
}
?>