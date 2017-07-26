<?php 
class Schedule extends BaseSql{

	protected $id;
	protected $day;
	protected $openning_time;
	protected $closing_time;
	protected $restaurant;

	public function __construct($id=-1, $day=-1, $openning_time=null, $closing_time=null, Restaurant $restaurant=null){

		$this->setId($id);
		$this->setDay($day);
		$this->setOpenningTime($openning_time);
		$this->setClosingTime($closing_time);
		$this->setRestaurant($restaurant);
				
		parent::__construct();
		
	}

	//----------------
	//----SETTERS-----
	//----------------

	public function setId($id){
		$this->id=$id;
	}
	public function setDay($day){
		$this->day=$day;
	}
	public function setOpenningTime($openning_time){
		$this->openning_time=trim($openning_time);
	}
	public function setClosingTime($closing_time){
		$this->closing_time=trim($closing_time);
	}
	public function setRestaurant($restaurant){
		$this->id_restaurant=$restaurant->id;
	}

	//----------------
	//----GETTERS-----
	//----------------

	public function getId(){
		return $this->id;
	}
	public function getDay(){
		return $this->day;
	}
	public function getOpenningTime(){
		return $this->openning_time;
	}
	public function getClosingTime(){
		return $this->closing_time;
	}
	public function getRestaurant(){
		return Restaurant::setId($this->id_restaurant);
	}
}