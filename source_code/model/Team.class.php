<?php

class Team extends DB {
    function getTeam() {
        $query = "SELECT * FROM teams";
        return $this->execute($query);
    }

    function addTeam($data) {
        $team_name = $data['team_name'];
        $team_base = $data['team_base'];

        $query = "INSERT INTO teams (`team_name`, `team_base`) VALUES ('$team_name', '$team_base')";
        return $this->execute($query);
    }

    function editTeam($data) {
        $team_name = $data["team_name"];
        $team_base = $data["team_base"];
        $id = $data["id_edit"];
        
        $query = "UPDATE teams SET team_name='$team_name', team_base='$team_base' WHERE id_team='$id'";
        return $this->execute($query);
    }

    function deleteTeam($id) {

        $query = "DELETE FROM teams WHERE id_team = '$id'";
        return $this->execute($query);
    }
}