<?php
class loginCheck {
	function status(){
		# returns:
		# 0	=>	logged out
		# 1	=>	logged in
		# 2	=>	login error
		if (isset($_SESSION['username'])){
			return 1;
		} else if(isset($_POST['sent'])){
			$username	= $_POST['username'];
			$password	= $_POST['password'];
			$captcha	= $_POST['g-recaptcha-response'];
			
			require_once('config.inc.php');
			$response=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $g_recaptcha_secret . '&response=' . $captcha);
			$responseKeys = json_decode($response,true);
			
			if(intval($responseKeys['success']) === 1) {
				require('config.inc.php');
				if ($username == $login_username and $password == $login_pw){
					$_SESSION['username'] = $username;
//					$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
					echo '
					<script language=\'javascript\' type=\'text/javascript\'>
						storeLocalData(\'username\',\'' . $username . '\');
						<!-- ... -->
						<!-- ... -->
						<!-- ... -->
					</script>';
					return 1;
				} else {
					return 2;	// username or password => false
				}
			} else {
					return 2;	// captcha => false
			}
		} else{
			return 0;
		}
	}
}
class db {
	function connect($host, $user, $pw, $db){
		$conn = new mysqli($host, $user, $pw, $db);
		if (!$conn) {
			echo 'Keine Verbindung zu DB möglich: ' . mysql_error();
			exit;
		}
		$conn->query('SET NAMES \'utf8\'');
		return $conn;
	}
	function disconnect($conn){
		mysqli_close($conn);		
	}
	function query($sql){
		require('config.inc.php');
		$conn= $this->connect($db_ip, $db_user, $db_pw, $db_db);
		$result = $conn->query($sql);
		if (!$result) {
			echo '$result may be NULL -- Konnte Abfrage (' . $sql . ') nicht erfolgreich ausführen: ' . mysqli_error($conn);
		}
		$this->disconnect($conn);
		return $result;
	}
	function query_id($sql){
		require('config.inc.php');
		$conn= $this->connect($db_ip, $db_user, $db_pw, $db_db);
		$result = array();
		$result['db_erg'] = $conn->query($sql);
		$result['id'] = mysqli_insert_id($conn);
		if (!$result) {
			echo '$result may be NULL -- Konnte Abfrage (' . $sql . ') nicht erfolgreich ausführen: ' . mysqli_error($conn);
		}
		$this->disconnect($conn);
		return $result;
	}
}
?>
