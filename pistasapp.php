<?php
session_start ();


use Pistas\UI\conf\PistasUISetup;
use Rasty\utils\RastyUtils;
use Rasty\factory\ApplicationFactory;
use Rasty\utils\Logger;


include_once   'vendor/autoload.php';

PistasUISetup::initialize("pistas_ui", false);

$type = RastyUtils::getParamGET('type') ;

ApplicationFactory::build( $type )->execute();
?>