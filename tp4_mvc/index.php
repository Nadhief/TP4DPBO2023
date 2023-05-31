<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$member = new MembersController();

// kondisi buat masuk ke form setelah klik addnew
if (!empty($_GET['AddData'])) {
    $id = $_GET['AddData'];
    $member->create();

}
// kondisi buat masuk ek form update setelah klik update
else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $member->createId($id);

} 
else if (isset($_POST['submit'])) {
    $member->add($_POST);

} 
else if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $member->edit($_POST, $id);
}
else if (!empty($_GET['id_delete'])) {
    $id = $_GET['id_delete'];
    $member->delete($id);

} 
else{
    $member->index();

}

// if (isset($_POST['add'])) {
//     $member->add($_POST);
// } else 
