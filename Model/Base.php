<?php

	use Pate\KinormBundle\Dbal\Db;
	namespace Pate\KinormBundle\Model;
	
	class Base{
	
		protected $id;
		protected $table;
		protected $db;
	
		public function __construct($id = 0){
			
			$this->db = Db::singleton();
			
			if(!is_numeric($id)){
				throw new \Exception("ID should be an integer");
			}
			
		}
		
		private function hydrate(){
			
		}
	
	}

?>
