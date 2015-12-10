<?php

require_once('piute_includes.php');

session_start();

		try  {
			$maxUsers = $_POST['userCount'];

			for($i = 1; $i <= $maxUsers; $i++) {
				$userIdName = "userId_".$i;
				$hunterLinkName = "hunterLink_".$i;

			    $userId = $_POST[$userIdName];
			    $hunterId = $_POST[$hunterLinkName];

			    if($hunterId == 0) {
			    	removeUserHunterId($userId);
			    } else if($hunterId > 0) {
			    	updateUserHunterId($userId, $hunterId);
			    }
			}

			header("Location: /php/hunter_link_home.php");
		} catch(Exception $e)  {
			addError('login', 'We could not find you in our system');
			header('Location: /index.php');
		}

?>
