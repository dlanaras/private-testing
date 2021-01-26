<?php

$connection = new mysqli('localhost', 'root', '', 'happyplace');

if ($connection->connect_errno) {
  die($connection->connect_error);
}
