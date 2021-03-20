<?php
/** @noinspection PhpUndefinedFunctionInspection */
/*
Title: Textes
Setting: lpt_homepage
*/

/*
 | ------------------------------------
 | Title
 | ------------------------------------
*/

piklist('field', [
	'type' => 'text',
	'field' => "title",
	'label' => "Titre",
	'columns' => 12,
]);

piklist('field', [
	'type' => 'text',
	'field' => "title_fr",
	'label' => "Titre (fr)",
	'columns' => 12,
]);

/*
 | ------------------------------------
 | Schools
 | ------------------------------------
*/

piklist('field', [
	'type' => 'text',
	'field' => "schools",
	'label' => "Écoles",
	'columns' => 12,
	'add_more' => true
]);

piklist('field', [
	'type' => 'text',
	'field' => "schools_fr",
	'label' => "Écoles (fr)",
	'columns' => 12,
	'add_more' => true
]);

/*
 | ------------------------------------
 | Description
 | ------------------------------------
*/

piklist('field', [
	'type' => 'text',
	'field' => "description",
	'label' => "Description",
	'columns' => 12,
]);

piklist('field', [
	'type' => 'text',
	'field' => "description_fr",
	'label' => "Description (fr)",
	'columns' => 12,
]);

/*
 | ------------------------------------
 | Valeurs ajoutées
 | ------------------------------------
*/

piklist('field', [
	'type' => 'text',
	'field' => "bestValues",
	'label' => "Valeurs ajoutées",
	'columns' => 12,
	'add_more' => true
]);

piklist('field', [
	'type' => 'text',
	'field' => "bestValues_fr",
	'label' => "Valeurs ajoutées (fr)",
	'columns' => 12,
	'add_more' => true
]);


/*
 | ------------------------------------
 | Button d'inscription
 | ------------------------------------
*/

piklist('field', [
	'type' => 'text',
	'field' => "registrationButton",
	'label' => "Button d'inscription",
	'columns' => 12,
]);

piklist('field', [
	'type' => 'text',
	'field' => "registrationButton_fr",
	'label' => "Button d'inscription (fr)",
	'columns' => 12,
]);


/*
 | ------------------------------------
 | Image caption
 | ------------------------------------
*/

piklist('field', [
	'type' => 'text',
	'field' => "imageCaption",
	'label' => "Description de l'image",
	'columns' => 12,
]);

piklist('field', [
	'type' => 'text',
	'field' => "imageCaption_fr",
	'label' => "Description de l'image (fr)",
	'columns' => 12,
]);


/*
 | ------------------------------------
 | Course title
 | ------------------------------------
*/

piklist('field', [
	'type' => 'text',
	'field' => "coursesTitle",
	'label' => "Titre de la liste des cours",
	'columns' => 12,
]);

piklist('field', [
	'type' => 'text',
	'field' => "coursesTitle_fr",
	'label' => "Titre de la liste des cours (fr)",
	'columns' => 12,
]);