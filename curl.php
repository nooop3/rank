<?php 

	/**
	* Wechat IndexMedia ranking class
	* @auhor: Edward
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