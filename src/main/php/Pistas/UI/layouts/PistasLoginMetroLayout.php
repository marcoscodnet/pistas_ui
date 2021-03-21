<?php

namespace Pistas\UI\layouts;

use Rasty\Layout\layout\Rasty\Layout;

use Rasty\utils\XTemplate;


class PistasLoginMetroLayout extends PistasMetroLayout{

	public function getXTemplate($file_template=null){
		return parent::getXTemplate( dirname(__DIR__) . "/layouts/PistasLoginMetroLayout.htm" );
	}

	public function getType(){
		
		return "PistasLoginMetroLayout";
		
	}	

}
?>