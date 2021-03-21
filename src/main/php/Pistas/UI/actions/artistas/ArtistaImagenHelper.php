<?php
namespace Pistas\UI\actions\artistas;

use Pistas\UI\utils\PistasUIUtils;

use Pistas\UI\components\form\artista\ArtistaForm;

use Pistas\UI\service\UIServiceFactory;
use Pistas\Core\model\Artista;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;

use Rasty\utils\Logger;

/**
 * colabora para el upload de la imagen del artista
 * 
 * @author Marcos
 * @since 08/08/2019
 */
class ArtistaImagenHelper{

	
	public static function process(Artista $artista){

		$artistaImage = $artista->getImagen();
		
		if(empty($artistaImage)) 
			return;
			
		//una vez que está todo ok, movemos la imagen y el thumbnail desde
		//el directorio de uploads al directorio de imágenes
		$uploadPath = PistasUIUtils::getUploadPathImagenArtistas();
		$imagePath = PistasUIUtils::getPathImagenArtistas();
		
		
		
			
		//chequeamos si hay que crear el directorio de las imágenes
		if(!file_exists($imagePath)){
			mkdir ($imagePath);
			
		}
			
		//movemos las imágenes.
		$imageName = $artista->getImagen();
		$thumbnailName = "thumbnail_" .$artista->getImagen();
			
		$tmpImageUri = $uploadPath.$imageName;
		$tmpThumbnailUri = $uploadPath.$thumbnailName;
		
		$imageUri = $imagePath.$imageName;
		$thumbnailUri = $imagePath.$thumbnailName;

		
		if(file_exists($tmpImageUri)){
			if(!rename($tmpImageUri, $imageUri))
				throw new RastyException("upload.image.error");		
				
		}
			
		if(file_exists($tmpThumbnailUri)){
			if(!rename($tmpThumbnailUri, $thumbnailUri))
				throw new RastyException("upload.image.thumbnail.error");					
		}
	}

}
?>