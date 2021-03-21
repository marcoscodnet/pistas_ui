<?php

namespace Pistas\UI\components\form\uploadFile;

use Rasty\components\RastyComponent;
use Rasty\utils\RastyUtils;
use Rasty\utils\XTemplate;
use Rasty\utils\LinkBuilder;

/**
 * Componente para realizar el upload de un archivo.
 * 
 * 
 * @author Marcos
 * @since 10/11/2015
 * 
 */
class UploadFile extends RastyComponent{

	
	
	/**
	 * path donde se realizará el upload.
	 * @var string
	 */
	private $uploadPath;

	
	/**
	 * nombre del archivo subido.
	 * @var string
	 */
	private $fileName;
	
	
	
	
	
	
	
	private $legend;
	
	private $label;
	
	
		
	public function __construct(){
	
	}
	
	public function getType(){
		
		return "UploadFile";
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		$label = $this->getLabel();
		if(empty($label))
			$label = $this->localize("uploadFile.file");
			
		$legend = $this->getLegend();
		if(empty($legend))
			$legend = $this->localize("uploadFile.legend");
		
		$xtpl->assign( "id", $this->getId() );
		
		
		
		$xtpl->assign( "loading", $this->localize("uploadFile.loading"));
		$xtpl->assign( "legend", $legend );
		$xtpl->assign( "lbl_file", $label );
		$xtpl->assign( "lbl_upload", $this->localize("uploadFile.upload") );
		
		
		$xtpl->assign( "uploadPath", $this->getUploadPath());
		$xtpl->assign( "uploadSuccessCallback", $this->getUploadSuccessCallback());
		
		
		$params = array("uploadPath" => $this->getUploadPath());

		$xtpl->assign( "linkUploadFile", LinkBuilder::getActionAjaxUrl( "UploadFile", $params) );

		
	}
	

	public function getUploadWebPath()
	{
	    return $this->uploadWebPath;
	}

	public function setUploadWebPath($uploadWebPath)
	{
	    $this->uploadWebPath = $uploadWebPath;
	}

	public function getUploadSuccessCallback()
	{
	    return $this->uploadSuccessCallback;
	}

	public function setUploadSuccessCallback($uploadSuccessCallback)
	{
	    $this->uploadSuccessCallback = $uploadSuccessCallback;
	}

	public function getUploadPath()
	{
	    return $this->uploadPath;
	}

	public function setUploadPath($uploadPath)
	{
	    $this->uploadPath = $uploadPath;
	}

	public function getFileName()
	{
	    return $this->fileName;
	}

	public function setFileName($fileName)
	{
	    $this->fileName = $fileName;
	}

	

	public function getLegend()
	{
	    return $this->legend;
	}

	public function setLegend($legend)
	{
	    $this->legend = $legend;
	}

	public function getLabel()
	{
	    return $this->label;
	}

	public function setLabel($label)
	{
	    $this->label = $label;
	}
}
?>