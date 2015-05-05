<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	
	<title></title>
</head>
<body>
	
<table class="text-center table table-bordered table-hover table-striped">
	<?php
	$Wechat = new Wechat_Rank();

	$Wechat->cookie = "cookie.txt";
	$Wechat->url = "__URL__";
	$output =$Wechat->login();

	//var_dump($output);
	echo "<tr><td></td>";
	foreach ($output->data->rows[0] as $name => $value) {
			
		echo  "<td>" . $name . "</td>";

	}
	echo "</tr>";

	for ($i=0; $i < count($output->data->rows); $i++) { 
		$j = $i + 1;
		echo "<tr><td>" . $j . "</td>";

		foreach ($output->data->rows[$i] as $name => $value) {
			
			echo  "<td>" . $value . "</td>";
		}
		echo "</tr>";
	}
	

	/**
	* Wechat IndexMedia ranking class
	* auhor: zhendong
	*/

	class Wechat_Rank
	{

		var $cookie;
		var $url;

		public function login()
		{
			
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36');
			curl_setopt($ch, CURLOPT_URL, $this->url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie);
			//curl_setopt($ch, CURLOPT_POST, 1);
			//curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

			$output = curl_exec($ch);

			curl_close($ch);
			return json_decode($output);

		}
	}
	?>

</table>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
