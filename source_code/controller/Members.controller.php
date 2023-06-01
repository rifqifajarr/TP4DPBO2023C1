<?php

include_once("connection.php");
include_once("model/Members.class.php");
include_once("view/Members.view.php");
include_once("model/Team.class.php");

class MembersController {
    private $members;
    private $team;

    function __construct() {
        $this->members = new Members(Conn::$servername, Conn::$username, Conn::$password, Conn::$db_name);
        $this->team = new Team(Conn::$servername, Conn::$username, Conn::$password, Conn::$db_name);
    }

    public function index() {
        $this->members->open();
        $this->members->getMembers();

        $this->team->open();
        $this->team->getTeam();

        $data = array();
        while($row = $this->members->getResult()) array_push($data, $row);
        
        $dataTeam = array();
        while($row = $this->team->getResult()) array_push($dataTeam, $row);

        $this->members->close();
        $this->team->close();

        $view = new MembersView();
        $view->render($data, $dataTeam);
    }

    function add($data) {
        $this->members->open();
        $this->members->addMembers($data);
        $this->members->close();

        header("location:index.php");
    }

    function edit($id) {
        $this->members->open();
        $this->members->editMembers($id);
        $this->members->close();

        header("location:index.php");
    }

    function delete($id) {
        $this->members->open();
        $this->members->deleteMembers($id);
        $this->members->close();

        header("location:index.php");
    }

    public function addForm() {
        $this->team->open();
        $this->team->getTeam();

        $dataTeam = array();
        while ($row = $this->team->getResult()) array_push($dataTeam, $row);

        $this->team->close();

        $view = new MembersView();
        $view->listTeam($dataTeam);
    }

    public function editForm($id) {
        $this->members->open();
        $this->members->getMembers();

        $this->team->open();
        $this->team->getTeam();

        $data = array();
        while ($row = $this->members->getResult()) array_push($data, $row);

        $dataTeam = array();
        while ($row = $this->team->getResult()) array_push($dataTeam, $row);

        $this->members->close();
        $this->team->close();

        $view = new MembersView();
        $view->editMember($id, $data, $dataTeam);
    }
}

?>