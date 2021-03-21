<?php
namespace Pistas\UI\components\form\uploadFile\actions;

use Rasty\actions\JsonAction;
use Rasty\utils\RastyUtils;
use Rasty\utils\ReflectionUtils;
use Rasty\exception\RastyException;

use Rasty\i18n\Locale;

/**
 * se hace el upload de un archivo por ajax.
 * 
 * 
 * @author Marcos
 * @since 10/11/2015
 */
class UploadFileJson extends JsonAction{

	
	public function execute(){

		$result = array();
		
		try {

			$uploadPath =  RastyUtils::getParamGET("uploadPath");
			
			
			$valid_all_formats = array("mp3");
			
			
			
			$name = $_FILES['imgFile']['name'];
			$size = $_FILES['imgFile']['size'];
					
			if(strlen($name)){
				list($txt, $ext) = explode(".", $name);
				$ext = strtolower($ext);
				
				$tmp = $_FILES['imgFile']['tmp_name'];
				
				if(!$tmp){
					$result["error"] = Locale::localize("file.upload.fail");
					return $result;						
				}	
					
				
				
				if(in_array($ext,$valid_all_formats) ){	

					//chequeamos si hay que crear el directorio de las imágenes
					if(!file_exists($uploadPath))
						mkdir ($uploadPath);
					
					$currentFileName = time().substr($txt, 5).".".$ext;
					
					if(move_uploaded_file($tmp, "$uploadPath/$currentFileName")){
						
						
							$result["fileName"] = $currentFileName;
							
					}else
						$result["error"] = Locale::localize("file.upload.fail");
				}
				else
					$result["error"] = Locale::localize("file.invalid.format");					
			}else
					$result["error"] = Locale::localize("file.empty");
			
			$result["info"] = Locale::localize("file.upload.success");
			
		} catch (RastyException $e) {
		
			$result["error"] = Locale::localize($e->getMessage())  ;
			
		}
		
		return $result;
		
	}
	
	
	
}
?>