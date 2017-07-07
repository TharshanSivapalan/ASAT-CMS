<?php 
class GroupUser extends BaseSql{

	protected $id;
	protected $name;
	protected $permission;
	protected $date_updated;

	public function __construct($id=-1, $name=null, $permission=0){

		$this->date_updated = date("Y-m-d H:i:s");

		$this->setId($id);
		$this->setName($name);
		$this->setPermission($permission);
				
		parent::__construct();
		
	}

	//----------------
	//----SETTERS-----
	//----------------

	public function setId($id){
		$this->id=$id;
	}
	public function setName($name){
		$this->name=trim($name);
	}
	public function setPermission($permission){
		$this->permission=trim($permission);
	}

	//----------------
	//----GETTERS-----
	//----------------

	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	public function getPermission(){
		return $this->permission;
	}
	public function getDateCreated(){
		return $this->date_created;
	}
	public function getDateUpdated(){
		return $this->date_updated;
	}
}