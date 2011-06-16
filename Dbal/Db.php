<?

	namespace Pate\KinormBundle\Dbal;
	/* this is nothing else but a PDO wrapper */
	class Db {
	 
		private function __construct($driver, $user, $pass, $name, $host, $charset = 'utf8') {
			$this->pdoInstance = new \PDO($driver.":host=".$host.";dbname=".$name,$user,$pass);
			$this->pdoInstance->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION); 
			$this->pdoInstance->exec("set names '".$charset."'");
		}
		
		public function quote($str){
			return $this->pdoInstance->quote($str);
		}
		
		public function lastInsertId(){
			return $this->pdoInstance->lastInsertId();
		}
		
		public function query($str){
			try {
				return $this->pdoInstance->query($str);
			} catch (\PDOException $e) {
				throw new Exception("Error : \n".$str."\n". $e->getMessage() . "\n".$e->getTraceAsString());
			}
		}
		
		public function exec($str){
			try {
				return $this->pdoInstance->exec($str);
			} catch (\PDOException $e) {
				throw new Exception("Error : \n".$str."\n". $e->getMessage() . "\n".$e->getTraceAsString());
			}
		}
	   
	}
?>
