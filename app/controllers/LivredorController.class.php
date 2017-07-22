<?php
class LivredorController{

	public function indexAction(){
		$view = new View('livredor-form');
		$view->setTemplate('theme2');
		$setting = new Settings();
        $list_setting = $setting->getall();
        $view->assign('list_setting'  , $list_setting);
	}

}