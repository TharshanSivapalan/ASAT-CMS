<?php
class LivredorController{

	public function indexAction(){

		// Recuperation du template actif

		$theme = new Theme();
		$theme = $theme->populate(['statut' => 1]);

		$view = new View('livredor-form');
		$view->setTemplate('theme'.$theme->getId());
		$view->assign('theme_id', $theme->getId());
		
		// Recuperation des settings
		
		$setting = new Settings();
        $list_setting = $setting->getall();
        $view->assign('list_setting'  , $list_setting);
	}

}