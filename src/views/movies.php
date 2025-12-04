<?php ob_start() ?>

<h1>Ma collection</h1>

<form method="POST">
	<input type="text" name="title" placeholder="title">
	<select name="type">
		<option value="film">film</option>
		<option value="serie">serie</option>
	</select>
	<input type="text" name="genre" placeholder="genre">
	<select name="rating">
		<option value="null" desable selected>-</option>
		<option value="1">1 star</option>
		<option value="2">2 stars</option>
		<option value="3">3 stars</option>
		<option value="4">4 stars</option>
		<option value="5">5 stars</option>
	</select>
	<button name="new_movie">submit</button>
</form>

<?php
foreach ($movies as $movie) { ?>
	<p>title: <?= $movie["title"] ?> type: <?= $movie["type"] ?> genre: <?= is_null($movie["genre"]) ? "none" : $movie["genre"] ?> rating: <?= is_null($movie["rating"]) ? "0" : $movie["rating"] ?><?= "</p>";
																																																} ?>

		<?php
		render('default', true, [
			'title' => 'Acceuil',
			'css' => 'index',
			'content' => ob_get_clean(),
		]);
		?>