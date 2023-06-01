<?php

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("controller/Members.controller.php");

$members = new MembersController();

if (isset($_POST['add'])) {
  $members->add($_POST);
}

else if (!empty($_GET['addForm'])) {
  $members->addForm();
} 

else if (!empty($_GET['editForm'])) {
  $members->editForm($_GET['editForm']);
} 

else if (!empty($_GET['id_hapus'])) {
  $id = $_GET['id_hapus'];
  $members->delete($id);
} 

else if (isset($_POST['edit'])) {
  $members->edit($_POST);
} 

else {
  $members->index();
}

?>