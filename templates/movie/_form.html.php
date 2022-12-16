<?php
    /** @var $movie ?\App\Model\Movie */
?>

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="movie[title]" value="<?= $movie ? $movie->getTitle() : '' ?>">
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" name="movie[description]"><?= $movie? $movie->getDescription() : '' ?></textarea>
</div>

<div class="form-group">
    <label for="Year">Year</label>
    <input type="text" id="year" name="movie[year]" value="<?= $movie ? $movie->getYear() : '' ?>">
</div>

<div class="form-group">
    <label></label>
    <input type="submit" value="Submit">
</div>
