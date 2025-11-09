<?php

function show($stuff)
{
  echo "<pre>";
  print_r($stuff);
  echo "</pre>";
}

function esc($str)
{
  return htmlspecialchars($str);
}

function redirect($path)
{
  header('Location: ' . ROOT . '/' . $path);
  die;
}

function getGenres()
{
  $genreData = new BkrGenre;
  $genres = $genreData->findAll();

  $menu = "";

  if ($genres) {
    foreach($genres as $genre) {
    $menu .= '<li><a class="dropdown-item" href="' . ROOT . '/review/reviews/' . $genre['Id'] . '">' . $genre['Name'] . '</a></li>';
  }}
  return $menu;
}
