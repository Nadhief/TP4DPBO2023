<?php

class Members extends DB
{
    function getMembersJoin()
    {
        $query = "SELECT * FROM members JOIN ukm ON members.id_ukm=ukm.id ORDER BY members.id";

        return $this->execute($query);
    }
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMembersById($id)
    {
        $query = "SELECT * FROM members WHERE id=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $ukm = $data['id_ukm'];

        $query = "INSERT INTO members VALUES ('', '$name', '$email', '$phone', '$join_date', '$ukm')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM members where id=$id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data, $id){
        // var_dump($id);
        // die;

        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $ukm = $data['id_ukm'];

        $query = "UPDATE members SET name='$name', email='$email', phone='$phone', join_date='$join_date', id_ukm='$ukm' WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

}
