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
		$new_movie->set_type($_POST["type"]);
	} catch (\Exception $e) {
		$error["type"] = $e;
	}

	try {
		$new_movie->set_rating($_POST["rating"]);
	} catch (\Exception $e) {
		$error["rating"] = $e;
	}
}


render("movies", false, ["movies" => $movies->get_all(), "error" => $error]);
