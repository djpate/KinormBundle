<?

	namespace Pate\KinormBundle\Dbal;
	/* this is nothing else but a PDO wrapper */
	class Db {
	 
		private static $instance;
		private static $driver;
		private static $user;
		private static $pass;
		private static $name;
		private static $host;
		private static $charset;
	 
		private function __construct() {
			$this->pdoInstance = new \PDO(self::$driver.":host=".self::$host.";dbname=".self::$name,self::$user,self::$pass);
			$this->pdoInstance->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION); 
			$this->pdoInstance->exec("set names '".self::$charset."'");
		}
		
		public static function config($driver, $user, $pass, $name, $host, $charset = "utf-8"){
			self::$driver 	= $driver;
			self::$user 	= $user;
			self::$pass 	= $pass;
			self::$name 	= $name;
			self::$host 	= $host;
			self::$charset 	= $charset;
		}
		
		public static function singleton(){
			
			if (!isset(self::$instance)) {
        		$c = __CLASS__;
        		self::$instance = new $c;
			}
		
			return self::$instance;
			
		}
		
		private function __clone() {}
		
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
