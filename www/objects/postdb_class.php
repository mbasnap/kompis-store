<?php

class PostDB extends ObjectDB {
	
	protected static $table = "post";
	
	public function __construct($data = false) {
		parent::__construct(self::$table);
        if($data) $this->init($data);		
	}
	
    protected function init($data) {
		$this->id = isset($data['id']) ? $data['id'] : null;
        $this->content = $data['content'];
		// echo $this->id ;
    }
	
	 public  function serialize() {
		$arr = array();
		$arr['content'] = $this->content;
		return $arr;
	 }



	 public static function get($params) {
		$id = $params['id'];
		$select = new Select(self::$db);
		$select->from(self::$table);
		$select->where("`id` = ", array($id));
		return self::$db->select($select);
	}
	
}

?>