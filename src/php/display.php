<?php

require_once('piute_includes.php');

function displayLoginBanner() {
	$userInfo = getCurrentUserInfo();

	if(isset($userInfo)) {
		displayWelcomeBack($userInfo);
	} else {
		displayLoginForm();
	}
}

//function getPersonLoggedIn() {
//	$userInfo = new user_info();
//
//	$userInfo->setEmail("jeff@coyotetracks.com");
//	$userInfo->setFirstName("Jeffrey");
//	$userInfo->setLastName("Blatt");
//	return $userInfo;
//}

function displayWelcomeBack($userInfo) {
	echo "<table>";
	echo "<tr>";
	echo "<td>Welcome Back ";
	echo $userInfo->getFirstName();
	echo "</td>";
	echo "<td>";
	echo "<a href='php/logout_action.php'><font size='-1'>Logout</font></a>";
	echo "</td>";
	echo "<td>";
	echo "<a href='/profile.php'><font size='-1'>Profile</font></a>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
}

function displayLoginForm() {
	$root = getRootPage();
	echo "<form method='POST' action='".$root."/php/login_action.php'>";
	echo "<table>";
	echo "<tr>";
	echo "<td>email:</td>";
    echo "<td><input type='text' name='email'></td>";
	echo "<td>password:</td>";
    echo "<td><input type='password' name='password'></td>";
    echo "<td><input type='submit' value='Login'/></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td></td>";
	echo "<td>";
	echo "<a href='".$root."/register.php'><font size=-1>Register</font></a>";
	echo "</td>";
	echo "<td></td>";
	echo "<td>";
	echo "<a href='".$root."/forgot.php'><font size=-1>Forgot Password?</font></a>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</form>";
}

?>
