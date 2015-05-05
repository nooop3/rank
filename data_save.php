<?php 

	include_once("db.class.php");
	include_once("curl.php");

	$Database = new Database();
	$Database->db_name = 'nova';
	$Database->create_db();

	$Rank_data = new Wechat_Rank();
	//日排行榜网址
	//$Rank_data->url = "__URL__";
	//周排行榜网址
	$Rank_data->url = "__URL__";
	$result = $Rank_data->get_rank();

	$data_time = $result->data->date;
	$data_time = str_replace('-', '', $data_time) . "_week_rank";
	$Database->table_name = $data_time;
	if ($Database->if_table_exists()) {
		echo "table exists!";
	} else {
		$Database->create_table();
	
		for ($i=0; $i < count($result->data->rows); $i++) 
		{ 
			
			$array = $result->data->rows[$i];
			$Database->insert = "INSERT INTO `$Database->db_name`.`$Database->table_name` (nickname_id,  wx_nickname,	wx_name,	url_times,	url_times_up,	url_times_readnum,	url_times_readnum_up,	url_num,	url_num_up,	url_num_10w,	url_num_10w_up,	readnum_all,	readnum_all_up,	readnum_av,	readnum_av_up,	likenum_all,	likenum_all_up,	likenum_av,	likenum_av_up,	readnum_max,likenum_max,	likenum_readnum_rate,	wcir,	wciz,	wci,	wci_up,	rowno,	rowno_up) VALUES ('$array->nickname_id',  '$array->wx_nickname',	'$array->wx_name',	'$array->url_times',	'$array->url_times_up',	'$array->url_times_readnum',	'$array->url_times_readnum_up',	'$array->url_num',	'$array->url_num_up',	'$array->url_num_10w',	'$array->url_num_10w_up',	'$array->readnum_all',	'$array->readnum_all_up',	'$array->readnum_av',	'$array->readnum_av_up',	'$array->likenum_all',	'$array->likenum_all_up',  '$array->likenum_av',	'$array->likenum_av_up',	'$array->readnum_max', '$array->likenum_max',	'$array->likenum_readnum_rate',	 '$array->wcir',	'$array->wciz',	 '$array->wci',	 '$array->wci_up',	 '$array->rowno',	'$array->rowno_up')";
			$Database->insert_table();
		}
	}

?>
