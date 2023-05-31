<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("views/Members.view.php");
include_once("views/Form.view.php");
include_once("models/Ukm.class.php");
class MembersController {
  private $members;
  private $ukm;

  function __construct(){
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->ukm = new Ukm(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->members->getMembersJoin();
    
    $data = array(
      'members' => array(),
    );

    while($row = $this->members->getResult()){
      array_push($data['members'], $row);
    }

    $this->members->close();
    $view = new MembersView();
    $view->render($data);

  }

  public function create() {

    $this->ukm->open();
    $this->ukm->getUkm();

    $this->members->open();
    $this->members->getMembersJoin();

    $data = array(
        'members' => array(),
        'ukm' => array()

    );

    while ($row = $this->members->getResult()) {
        array_push($data['members'], $row);
    }

    while ($row = $this->ukm->getResult()) {
      array_push($data['ukm'], $row);
    }

    $this->members->close();
    $this->ukm->close();

    $view = new FormView();
    $view->render($data);
  }

  public function createId($id) {

    $this->ukm->open();
    $this->ukm->getUkm();

    $this->members->open();
    $this->members->getMembersById($id);

    $data = array(
        'members' => array(),
        'ukm' => array()
    );

    while ($row = $this->members->getResult()) {
        array_push($data['members'], $row);
    }
    while ($row = $this->ukm->getResult()) {
      array_push($data['ukm'], $row);
    }

    $this->members->close();
    $this->ukm->close();

    $view = new FormView();
    $view->renderId($data);
  }
  
  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function edit($data, $id){
    $this->members->open();
    $this->members->update($data, $id);
    $this->members->close();
    header("location:index.php");
    // $this->members->statusBuku($id);

  }

  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();

    header("location:index.php");
  }

}