<?php 
class Restaurant extends BaseSql{

	protected $id;
	protected $name;
	protected $address1;
	protected $address2;
	protected $postal_code;
	protected $city;
	protected $country;
	protected $status;

	public function __construct($id=-1, $name=null, $address1=null, $address2=null, $postal_code=0, $city=null, $country=null, $status=0){


		$this->setId($id);
		$this->setName($name);
		$this->setAddress1($address1);
		$this->setAddress2($address2);
		$this->setPostal_code($postal_code);
		$this->setCity($city);
		$this->setCountry($country);
		$this->setStatus($status);
		
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
	public function setAddress1($address1){
		$this->address1=trim($address1);
	}
	public function setAddress2($address2){
		$this->address2=trim($address2);
	}
	public function setPostal_code($postal_code){
		$this->postal_code=$postal_code;
	}
	public function setCity($city){
		$this->city=trim($city);
	}
	public function setCountry($country){
		$this->country=($country);
	}
	public function setStatus($status){
		$this->status = $status;
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
	public function getAddress1(){
		return $this->address1;
	}
	public function getAddress2(){
		return $this->address2;
	}
	public function getPostal_Code(){
		return $this->postal_code;
	}
	public function getCity(){
		return $this->city;
	}
	public function getCountry(){
		return $this->country;
	}
	public function getStatus(){
		return $this->status;
	}
	public function getDateCreated(){
		return $this->date_created;
	}
}