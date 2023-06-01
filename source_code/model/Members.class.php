<?php

class Members extends DB {
    function getMembers() {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function addMembers($data) {
        $name = $data['name'];
        $position = $data['position'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_team = $data['id_team'];

        $query = " INSERT INTO members (name, position, email, phone, join_date, id_team) VALUES ('$name', '$position', '$email', '$phone', '$join_date', '$id_team')";

        return $this->execute($query);
    }
    
    function editMembers($data) {
        $name = $data['name'];
        $position = $data['position'];
        $email = $data['email'];
        $phone = $data['phone'];
        $id_team = $data['id_team'];
        $join_date = $data['join_date'];
        $id = $data['id_edit'];
        $query = "UPDATE members SET name='$name', position='$position', email='$email', phone='$phone', join_date='$join_date' ,id_team='$id_team' WHERE id='$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }
    
    function deleteMembers($id) {
        $query = "delete FROM members WHERE id = '$id'";
        return $this->execute($query);
    }
}

?>