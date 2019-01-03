<?php

class MenuDB extends ObjectDB {
	
	protected static $table = "menu";
	
	public function __construct($data = false) {
        parent::__construct(self::$table);
        if($data) $this->init($data);		
	}
	
    private function init($data) {
        $this->id = $data['id'];
        $this->date = $data['name'];
        $this->title = $data['title'];
        $this->post_id = $data['post_id'];
        $this->position = $data['position'];
    }
	
	public  function serialize() {
		$arr = array();
		$arr['name'] = $this->date;
		$arr['title'] = $this->title;
		$arr['post_id'] = $this->post_id;
		$arr['position'] = $this->position;
		return $arr;
	 }

	 public static function get($params) {
		$select = new Select(self::$db);
		$select->from(self::$table);
		// $select->where("`category` = ", array('1'));
		return self::$db->select($select, __CLASS__);
	 }


	
}

?>