<?php

namespace Models;

use Exception;
use PDO;

class Movies extends Database
{
	private $id;
	private $title;
	private $type;
	private $genre;
	private $rating;
	private $is_watched;

	public function get_title()
	{
		return $this->title;
	}

	public function set_title($new_title)
	{
		if ($new_title == "" or $new_title == null) throw (new Exception("the title should not be empty"));
		if (strlen($new_title) > 255) throw (new Exception("the title is too long (255 character max)"));
		$this->title = htmlspecialchars($new_title);
	}

	public function get_type()
	{
		return $this->type;
	}

	public function set_type($new_type)
	{
		if ($new_type != "film" and $new_type != "serie") throw (new Exception("invalid type"));
		$this->type = $new_type;
	}

	public function get_rating()
	{
		return $this->rating;
	}

	public function set_rating($new_rating)
	{
		if ($new_rating != null and ($new_rating < 1 or $new_rating > 5)) throw (new Exception("invalid rating"));
		$this->rating = $new_rating;
	}

	public function get_all()
	{
		$query = $this->db->prepare("SELECT * FROM `movies` ORDER BY `created_at`;");
		$query->execute();
		return $query->fetchAll();
	}
}
