<?php
class db {
	function connect($host, $user, $pw, $db){
		$conn = new mysqli($host, $user, $pw, $db);
		if ($conn->connect_error) {
			die('Keine Verbindung zu DB möglich.<br /><b>Connect Error</b>: <i>' . $conn->connect_error) . '</i></font><br />';
		}
		$conn->query('SET NAMES \'utf8\'');
		return $conn;
	}
	function disconnect($conn){
		mysqli_close($conn);		
	}
	function query($sql){
		$conn= $this->connect(DB_IP, DB_USER, DB_PW, DB_DB);
		$result = $conn->query($sql);
		if (!$result) {
			echo '<b>$result may be NULL</b> -- Konnte Abfrage (<font color=\'red\'>' . $sql . '</font>) nicht erfolgreich ausführen.<br /><b>Error</b>: <i>' . $conn->error . '</i><br />';
		}
		$this->disconnect($conn);
		return $result;
	}
	function query_id($sql){
		$conn= $this->connect(DB_IP, DB_USER, DB_PW, DB_DB);
		$result = array();
		$result['db_erg'] = $conn->query($sql);
		$result['id'] = mysqli_insert_id($conn);
		if (!$result) {
			echo '<b>$result may be NULL</b> -- Konnte Abfrage (<font color=\'red\'>' . $sql . '</font>) nicht erfolgreich ausführen.<br /><b>Error</b>: <i>' . $conn->error . '</i><br />';
		}
		$this->disconnect($conn);
		return $result;
	}
}
class dbedit {
	function removequestion($id){
		
	}
}
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
			
			$response=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . G_RECAPTCHA_SECRET . '&response=' . $captcha);
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
class language {
	public $data;
	function __construct($language) {
		$data = file_get_contents('json/lang/' . $language . '.json');
		$this->data = json_decode($data);
	}
	function translate() {
		return $this->data;
	}
}
?>
