<?php
	
	$con = mysql_connect('localhost', 'root', 'asdf');
	if(!$con){

		die('link db failed!');
	}	

	/**
	* create database
	* @author Edward
	*/

	class Database
	{

		var $db_name;
		var $table_name;
		var $create;
		var $insert;
		
		function __construct()
		{
			# code...
		}

		function create_db()
		{
			global $con;
			mysql_query('SET NAMES UTF8');
			$select = mysql_select_db($this->db_name, $con);

			if (!$select) {
				
				if (mysql_query("CREATE DATABASE $this->db_name", $con)) {

					die('create db successfully!');
				} else {

					die('create db failed!');
				}
				
			}

		}

		function if_table_exists()
		{
			global $con;
			mysql_query('SET NAMES UTF8');
			$select = mysql_select_db($this->db_name, $con);
			if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '". $this->table_name ."'"))) 
			{
			   	return 1;
			   	mysql_close();
			} else {
			    return 0;
			}
		}
		function create_table()
		{
			global $con;
			mysql_query('SET NAMES UTF8');
			$select = mysql_select_db($this->db_name, $con);

			$this->create = "CREATE TABLE IF NOT EXISTS `$this->table_name`(
				id int AUTO_INCREMENT,
				PRIMARY KEY(id),
				nickname_id int(10),
				wx_nickname text,
				wx_name varchar(20),
				url_times int(10),
				url_times_up int(10),
				url_times_readnum int(10),
				url_times_readnum_up int(10),
				url_num int(4),
				url_num_up int(4),
				url_num_10w int(4),
				url_num_10w_up int(4),
				readnum_all int(10),
				readnum_all_up int(10),
				readnum_av int(10),
				readnum_av_up int(10),
				likenum_all int(10),
				likenum_all_up int(10),
				likenum_av int(10),
				likenum_av_up int(10),
				readnum_max int(10),
				likenum_max int(10),
				likenum_readnum_rate float(24),
				wcir float(24),
				wciz float(24),
				wci float(24),
				wci_up float(24),
				rowno int(10),
				rowno_up int(10)
				) character set = utf8";

			if (mysql_query($this->create, $con)) {
				
				echo ('create table successfully!');
			} else {
				
				echo 'create table failed! ' . mysql_error();
			}
	
		}

		function insert_table()
		{
			global $con;

			$results = mysql_query($this->insert, $con);
			if ($results) {
				
				echo 'insert table successfully!';
			} else {
				
				echo 'insert table failed! ' . mysql_error();
			}
		}
	}
?>