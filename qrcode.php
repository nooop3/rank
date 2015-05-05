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
	$output =$Wechat->get_rank();

	//var_dump($output);
	echo "<tr><td></td><td>账号名称</td><td>账号ID</td><td>二维码</td></tr>";

	for ($i=0; $i < count($output->data->rows); $i++) { 
		$j = $i + 1;
		$array = $output->data->rows[$i];
		echo "<tr><td>" . $j . "</td><td>" . $array->wx_nickname . "</td><td>" . $array->wx_name . "</td><td><img src=http://open.weixin.qq.com/qr/code/?username=" . $array->wx_name . "></td></tr>";
	}
	
	/**
	* Wechat IndexMedia ranking class
	* auhor: zhendong
	*/

	class Wechat_Rank
	{

		var $url;

		public function get_rank()
		{
			
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36');
			curl_setopt($ch, CURLOPT_URL, $this->url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
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
