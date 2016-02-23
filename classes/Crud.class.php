<?php
    include_once("Db.class.php");

	class Operations {
		private $m_sUsername;

		public function __set($p_sProperty, $p_vValue){
			switch ($p_sProperty) {
				case 'Username':
					if(!empty($p_vValue)){
						$this->m_sUsername = $p_vValue;
					}else{
						throw new Exception("The name field is empty.");
					}
					if(strlen($p_vValue)>2){
						$this->m_sUsername = $p_vValue;
					}else{
						throw new Exception("The submitted name is not long enough.");
					}
					break;
			}
		}

		public function __get($p_sProperty){
			switch ($p_sProperty) {
				case 'Username':
					return $this->m_sUsername;
					break;
			}
		}

		public function select($table, $where = '', $fields = '*', $order = '', $limit = null, $offset = null)
        {
            $dbh = new Db();
            
            $query = 'SELECT ' . $fields . ' FROM ' . $table
                   . (($where) ? ' WHERE ' . $where : '')
                   . (($limit) ? ' LIMIT ' . $limit : '')
                   . (($offset && $limit) ? ' OFFSET ' . $offset : '')
                   . (($order) ? ' ORDER BY ' . $order : '');
            $this->query($query);
            return $this->countRows();
            
            /*$sth = $dbh->prepare('SELECT name, colour, calories
                      FROM fruit
                      WHERE calories < ? AND colour = ?');

            $sth->execute(array(150, 'red'));

            $red = $sth->fetchAll();*/
        }
	}
?>