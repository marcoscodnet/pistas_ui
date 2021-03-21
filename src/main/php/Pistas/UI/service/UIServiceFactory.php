<?php

namespace Pistas\UI\service;


/**
 * Factory de servicios de UI
 *  
 * @author Marcos
 * @since 16/03/2018
 *
 */
class UIServiceFactory {

	

	/**
	 * @return UIUserService
	 */
	public static function getUIUserService(){
	
		return UIUserService::getInstance();	
	}
	
	

	
	/**
	 * @return UIArtistaService
	 */
	public static function getUIArtistaService(){
	
		return UIArtistaService::getInstance();	
	}
	
	
	
	/**
	 * @return UIPistaService
	 */
	public static function getUIPistaService(){
	
		return UIPistaService::getInstance();	
	}
	
	
}