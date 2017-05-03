<?php 
class Theme extends BaseSql{

	protected $id;
	protected $name;
	protected $status;
	protected $thumbnail;
	protected $link;
	
	public function __construct($id=-1, $name=null, $status=0, $thumbnail=null, $link=null){

		$this->setId($id);
		$this->setName($name);
		$this->setStatus($status);
		$this->setThumbnail($thumbnail);
		$this->setLink($link);

		
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
	public function setStatus($status){
		$this->status=$status;
	}
	public function setThumbnail($thumbnail){
		$this->thumbnail=$thumbnail;
	}
	public function setLink($link){
		$this->link = $link;
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
	public function getStatus(){
		return $this->status;
	}
	public function getThumbnail(){
		return $this->thumbnail;
	}
	public function getLink(){
		return $this->link;
	}
}