<?php

class MembersView {
    public function render($data, $dataTeam) {
        $no = 1;
        $dataMembers = null;

        foreach ($data as $val) {
            list($id, $name, $position, $email, $phone, $join_date, $id_team) = $val;

            $team_name = '';
            $id_member = $id;

            foreach ($dataTeam as $team) {
                list($id, $nama) = $team;
                if ($id == $id_team) {
                    $team_name = $nama;
                    break;
                } else {
                    $team_name = 'ganemu';
                }
            }

            $dataMembers .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $position . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $team_name . "</td>
                <td>
                    <a href='index.php?id_hapus=" . $id_member . "' class='btn btn-danger''>Hapus</a>
                    <a href='index.php?editForm=" . $id_member . "' class='btn btn-success''>Edit</a>
                </td>
            </tr>";
        }

        $template = new Template("template/index.html");
        $template->replace("DATA_TABEL", $dataMembers);
        $template->write();
    }

    public function listTeam($dataTeam) {
        $listTeam = null;

        foreach ($dataTeam as $val) {
            list($id, $nama) = $val;
            $listTeam .= "<option value='" . $id . "'>" . $nama . "</option>";
        }

        $template = new Template("template/addMembers.html");
        $template->replace("OPTION", $listTeam);
        $template->write();
    }

    public function editMember($idMember, $data, $dataTeam) {
        $dataMember = null;
        $teamMember = 0;

        foreach ($data as $val) {
            list($id, $name, $position, $email, $phone, $join_date, $id_team) = $val;

            if ($idMember == $id) {
                $dataMember .= "<input type='hidden' name='id_edit' value='$id' class = 'form-control> <br>'
                <label> Name: </label>
                <input type='text' name='name' value='$name' class='form-control'> <br>
                <label> Position: </label>
                <input type='text' name='position' value='$position' class='form-control'> <br>
                <label> Email: </label>
                <input type='text' name='email' value='$email' class='form-control'> <br>
                <label> Phone: </label>
                <input type='text' name='phone' value='$phone' class='form-control'> <br>
                 <label> Join Date: </label>
                <input type='date' name='join_date' value='$join_date' class='form-control''> <br>
                <label> Team:</label>
                ";

                $teamMember = $id_team;
                break;
            }
        }

        $listTeam = null;

        foreach ($dataTeam as $val) {
            list($id, $nama) = $val;

            if ($id == $teamMember) {
                $listTeam .= "<option selected value='" . $id . "'>" . $nama . "</option>";
            } else {
                $listTeam .= "<option value='" . $id . "'>" . $nama . "</option>";
            }
        }

        $template = new Template("template/editMembers.php");

        $template->replace("FORM_MEMBER", $dataMember);
        $template->replace("TEAM_MEMBER", $listTeam);
        $template->write();
    }
}

?>