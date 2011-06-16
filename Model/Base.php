<?php

	use Pate\KinormBundle\Dbal\Db;
	namespace Pate\KinormBundle\Model;
	
	class Base{
	
		protected $id;
		protected $table;
	
		public function __construct($id = 0){
			
			$this->orm = new orm(get_called_class());
			
			if(!is_numeric($id)){
				throw new \Exception("ID should be an integer");
			}
			
		}
		
		private function hydrate(){
			
		}
	
	}

?>
