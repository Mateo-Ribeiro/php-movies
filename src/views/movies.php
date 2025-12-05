<?php ob_start() ?>

<h1>Ma collection</h1>

<form method="POST">
	<input type="text" name="title" placeholder="title">
	<p><?= isset($error["title"]) ? $error["title"] : "" ?></p>
	<select name="type">
		<option value="film">film</option>
		<option value="serie">serie</option>
	</select>
	<p><?= isset($error["type"]) ? $error["type"] : "" ?></p>
	<input type="text" name="genre" placeholder="genre">
	<p><?= isset($error["genre"]) ? $error["genre"] : "" ?></p>
	<select name="rating">
		<option value="null" desable selected>-</option>
		<option value="1">1 star</option>
		<option value="2">2 stars</option>
		<option value="3">3 stars</option>
		<option value="4">4 stars</option>
		<option value="5">5 stars</option>
	</select>
	<p><?= isset($error["rating"]) ? $error["rating"] : "" ?></p>
	<button name="new_movie">submit</button>
</form>

<?php
foreach ($movies as $movie) { ?>
	<p>title: <?= $movie["title"] ?> type: <?= $movie["type"] ?> genre: <?= is_null($movie["genre"]) or strlen($movie["genre"]) == 0 ? "none" : $movie["genre"] ?> rating: <?= is_null($movie["rating"]) ? "0" : $movie["rating"] ?><?= $movie["is_watched"] ? " vu</p>" : " à voir</p>";
																																																								} ?>

		<?php
		render('default', true, [
			'title' => 'Acceuil',
			'css' => 'index',
			'content' => ob_get_clean(),
		]);
		?>