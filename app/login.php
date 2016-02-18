<?php
require_once('functions.inc.php');

$behavior = new loginCheck;

		echo '<div id=\'popup-background\' onclick=\'initLogin();\' style=\'opacity: 0.0;\'></div>';
		echo '
		<div class=\'pointer\' id=\'divID_login\' onclick=\'initLogin();setFocusToTextBox("username");\' style=\'height: 30px;\'>';
?>

			<div id='login_frame'>
				<div class='center bold' id='login' style='color:rgba(52, 73, 94, 1.0);'>Login
				<?php			
				if ($behavior->status() == 2){
					echo '<br /><span style=\'font-size: 12pt; color: red;\'>LOGIN-ERROR!</span>';
				}
				?><p />
				</div>
				<form method='post' action=''>
					<div class='inputfield'>
						<input id='username' onclick='stopBubble(event)' type='text' name='username' placeholder='Username' /><p />
						<input onclick='stopBubble(event)' type='password' name='password' placeholder='Passwort' /><p />
					</div>
					<div class='right' style='width: 100%;'>
						<span class='inline-block'>
							<input class='pointer' onclick='stopBubble(event)' type='submit' value='Login' />
						</span>
					</div>
					<input type='hidden' value='1' name='sent' />
				</form>
				<?php
				if($behavior->status() == 2){
					echo '
				<div style=\'width: 100%; font-size: 14px; font-style: italic;\'>' . '
					<span style=\'text-align:right;\'><p /><a href=\'/index.php?action=restore_passwd\'>Passwort vergessen?</a></span>
				</div>' . "\n";
				}
				?>
				<div class='right bold blue' style='font-size: 12px;'>Admin-Configuration v1.0</div>
			</div>
		</div>
