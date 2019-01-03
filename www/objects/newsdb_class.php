<?php

class NewsDB extends ObjectDB {
	
	protected static $table = "news";
	
	public function __construct($data = false) {
        parent::__construct(self::$table);
        if($data) $this->init($data);		
	}
	
    private function init($data) {
        $this->id = $data['id'];
        $this->date = $data['date'];
        $this->title = $data['title'];
        $this->post_id = $data['post_id'];
    }
	
	public  function serialize() {
		$arr = array();
		$arr['date'] = $this->date;
		$arr['title'] = $this->title;
		$arr['post_id'] = $this->post_id;
		return $arr;
	 }

	 public static function getLast($params) {
		$select = new Select(self::$db);
		$select->from(self::$table);
		// $select->limit($params['count']);
		return self::$db->select($select, __CLASS__);
	 }

	
	private static function getAllOnSectionOrCategory($field, $value, $order, $offset) {
		$select = self::getBaseSelect();
		$select->where("`$field` = ".self::$db->getSQ(), array($value))
			->order("date", $order);
		$data = self::$db->select($select);
		$articles = ObjectDB::buildMultiple(__CLASS__, $data);
		return $articles;
	}
	

		
	private static function getBaseSelect() {
		$select = new Select(self::$db);
		$select->from(self::$table, "*");
		return $select;
	}

	
}

?>