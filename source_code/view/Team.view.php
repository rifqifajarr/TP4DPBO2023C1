<?php

class TeamView {
    public function render($data) {
        $no = 1;
        $dataTeam = null;
        
        foreach ($data as $val) {
            list($id_team, $team_name, $team_base) = $val;

            $dataTeam .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $team_name . "</td>
                <td>" . $team_base . "</td>
                <td>
                <a href='team.php?id_hapus=" . $id_team . "' class='btn btn-danger''>Hapus</a>
                <a href='./template/editTeam.php?id_team=" . $id_team . "&team_name=" . $team_name . "&team_base=" . $team_base . "' class='btn btn-success''>Edit</a>
                </td>
            </tr>";
        }

        $template = new Template("template/team.html");
        $template->replace("DATA_TABEL", $dataTeam);
        $template->write();
    }
}

?>