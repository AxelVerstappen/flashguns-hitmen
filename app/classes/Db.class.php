<?php
	class Db
	{
		private $m_sHost = "localhost";
		private $m_sUser = "flashguns_hitmen";
		private $m_sPassword = "X1c5k9l7h3";
		private $m_sDatabase = "flashguns_hitmen";
		public $conn;


		public function __construct()
		{
            $this->conn = new PDO("mysql:host=$this->m_sHost;dbname=$this->m_sDatabase", $this->m_sUser, $this->m_sPassword);
		}
	}
?>