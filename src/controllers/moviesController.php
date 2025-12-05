<?php

use Models\Movies;

$error = [];
$movies = new Movies;

if (isset($_POST["new_movie"])) {
	$new_movie = new Movies;
	try {
		$new_movie->set_title($_POST["title"]);
	} catch (\Exception $e) {
		$error["title"] = $e;
	}

	try {
		$new_movie->set_genre($_POST["genre"]);
	} catch (\Exception $e) {
		$error["genre"] = $e;
	}

	try {
		$new_movie->set_type($_POST["type"]);
	} catch (\Exception $e) {
		$error["type"] = $e;
	}

	try {
		if ($_POST["rating"] == "null") {
			$new_movie->set_rating(null);
		} else {
			$new_movie->set_rating($_POST["rating"]);
		}
	} catch (\Exception $e) {
		$error["rating"] = $e;
	}

	if (!$error) {
		$new_movie->register();
	}
}


render("movies", false, ["movies" => $movies->get_all(), "error" => $error]);
