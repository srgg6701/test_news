<?
class Db{
	public function getConnect(){
        if(SERVER_LOCATION=='local_denwer'){
            $host		='localhost';
            $username	='root';
            $password   ='';
        }elseif(SERVER_LOCATION=='remote_1gb'){
            $host='mysql75.1gb.ru';
            $username = 'gb_z_mytes763';
            $password = '9408a2e2e345';
        }
        $db_name='gb_z_mytes763';
        //$db_name='test';
		$dsn = 'mysql:host='.$host.'.;dbname='.$db_name;
		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		);
		try {
			$connect = new PDO($dsn, $username, $password, $options);
			return $connect;
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