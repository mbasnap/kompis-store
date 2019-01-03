<?php

class PostDB extends ObjectDB {
	
	protected static $table = "post";
	
	public function __construct($data = false) {
        parent::__construct(self::$table);
        if($data) $this->init($data);		
	}
	
    private function init($data) {
        // $this->id = $data['id'];
        $this->content = $data['content'];
    }
	
	 public  function serialize() {
		$arr = array();
		$arr['content'] = $this->content;
		return $arr;
	 }

	 public static function update($id, $row) {
		$class = get_called_class();
		// $row = new $class($post);
		$update = self::$db->update(self::$table, $row, "`id` = ".self::$db->getSQ(), array($id));
		return $update;
	}

	 public static function get($params) {
		$id = $params['id'];
		$select = new Select(self::$db);
		$select->from(self::$table);
		$select->where("`id` = ", array($id));
		return self::$db->select($select, __CLASS__);
	}

	 public static function getLast($params) {
		$select = self::getBaseSelect();
		$select->limit($params['count']);
		$data = self::$db->select($select);
		$posts = ObjectDB::buildMultiple(__CLASS__, $data);
	 	return $posts;
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