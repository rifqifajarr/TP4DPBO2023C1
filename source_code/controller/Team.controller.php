<?php

include_once("connection.php");
include_once("model/Team.class.php");
include_once("view/Team.view.php");

class TeamController {
    private $team;

    function __construct() {
        $this->team = new Team(Conn::$servername, Conn::$username, Conn::$password, Conn::$db_name);
    }

    public function index() {
        $this->team->open();
        $this->team->getTeam();

        $data = array();
        while ($row = $this->team->getResult()) array_push($data, $row);

        $this->team->close();

        $view = new TeamView();
        $view->render($data);
    }

    function add($data)
    {
        $this->team->open();
        $this->team->addTeam($data);
        $this->team->close();

        header("location:team.php");
    }

    function edit($id)
    {
        $this->team->open();
        $this->team->editTeam($id);
        $this->team->close();

        header("location:team.php");
    }

    function delete($id)
    {
        $this->team->open();
        $this->team->deleteTeam($id);
        $this->team->close();

        header("location:team.php");
    }
}

?>