<?php

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("controller/Team.controller.php");

$team = new TeamController();

if (isset($_POST['add'])) {
  $team->add($_POST);
}

else if (!empty($_GET['id_hapus'])) {
  $id = $_GET['id_hapus'];
  $team->delete($id);
} 

else if (isset($_POST['edit'])) {
  $team->edit($_POST);
} 

else {
  $team->index();
}

?>