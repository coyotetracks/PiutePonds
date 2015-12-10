<?php

function sendPushover($message) {
	curl_setopt_array($ch = curl_init(),
		array(CURLOPT_URL => "https://api.pushover.net/1/messages.json",
			CURLOPT_POSTFIELDS => array(
				"token" => "vfi988XFdLR7bdMxv4GGTEWhLkjgdR",
				"user" => "RCXrcDXG7p3BvDY54hHVPobEGxTz3D",
				"message" => $message,
			)
		)
	);
	curl_exec($ch);
	curl_close($ch);
}

?>