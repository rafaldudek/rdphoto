<?php
	class test{
		public $m;
		public function equal($a,$b){
			echo $this->m.' - ';	
			if($a === $b){
				echo "Test passes</br>";
			}else{
				echo "Test failed !!!</br>";
				echo htmlspecialchars($a).'</br>';
				echo htmlspecialchars($b).'</br>';
				
			}
		}
	};
?>