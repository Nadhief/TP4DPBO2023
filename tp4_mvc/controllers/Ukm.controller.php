<?php
include_once("conf.php");
include_once("models/Ukm.class.php");
include_once("views/Ukm.view.php");
class UkmController {
  private $ukm;

  function __construct(){
    $this->ukm = new ukm(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index($id) {
    $this->ukm->open();
        $this->ukm->getUkm();

        $data = array(
            'ukm' => array(),
            'specific' => array()
        );

        while ($row = $this->ukm->getResult()) {
            array_push($data['ukm'], $row);
        }

        if (!empty($id)) {
            $this->ukm->getUkmById($id);

            while ($row = $this->ukm->getResult()) {
                array_push($data['specific'], $row);
            }
        }

        $this->ukm->close();

        $view = new UkmView();
        $view->render($data, $id);

  }

  public function create() {

    $this->ukm->open();

    $this->ukm->getUkm();

    $data = array(
        'Ukm' => array()
    );

    while ($row = $this->ukm->getResult()) {
        array_push($data['Ukm'], $row);
    }

    $this->ukm->close();

    $view = new FormView();
    $view->render($data);
  }

  public function createId($id) {

    $this->ukm->open();

    $this->ukm->getUkmById($id);

    $data = array(
        'Ukm' => array()
    );

    while ($row = $this->ukm->getResult()) {
        array_push($data['Ukm'], $row);
    }

    $this->ukm->close();

    $view = new FormView();
    $view->renderId($id, $data);
  }
  
  function add($data){
    $this->ukm->open();
    $this->ukm->add($data);
    $this->ukm->close();
    
    header("location:ukm.php");
  }

  function edit($data, $id){
    $this->ukm->open();
    $this->ukm->update($data, $id);
    $this->ukm->close();
    header("location:ukm.php");
    // $this->ukm->statusBuku($id);

  }

  function delete($id){
    $this->ukm->open();
    $this->ukm->delete($id);
    $this->ukm->close();

    header("location:ukm.php");
  }

}