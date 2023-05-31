<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Ukm.controller.php");

$ukm = new UkmController();


if (isset($_POST['submit'])) {
    $ukm->add($_POST);

} 
else if (!empty($_GET['id_delete'])) {
    $id = $_GET['id_delete'];
    $ukm->delete($id);

} 
else if (isset($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $ukm->index($id);

}
else if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $ukm->edit($_POST, $id);
}
else {
    $id = null;
    $ukm->index($id);
}


