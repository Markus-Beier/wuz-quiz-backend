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
?>