<?
class Db{
	public function getConnect(
					$host='mysql75.1gb.ru',
					$username = 'gb_z_mytes763',
					$password = '9408a2e2e345'
				){
		// set REAL connect params:
		if(!$host) 		$host		='localhost';
		if(!$username) 	$username	='root';

        $db_name='gb_z_mytes763';
		$dsn = 'mysql:host='.$host.'.;dbname='.$db_name;
		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		);
		try {
			$dbh = new PDO($dsn, $username, $password);
			return $dbh;
		} catch (PDOException $e) {
			echo 'Подключиться не удалось. Причина: ' . $e->getMessage();
			return false;
		} 
	}
/**
 * Добавить, удалить, обновить:
 */	
	public function execute($query){
		$Db=$this->getConnect();
		if(!$rows=$Db->exec($query)){
			$this->showError($Db);	
			return false;
		}else
			return $rows;
	}
}?>