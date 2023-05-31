<?php

class Ukm extends DB
{
    function getUkm()
    {
        $query = "SELECT * FROM ukm";
        return $this->execute($query);
    }

    function getUkmById($id)
    {
        $query = "SELECT * FROM ukm WHERE id=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama_ukm = $data['nama_ukm'];

        $query = "INSERT INTO ukm VALUES ('', '$nama_ukm')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM ukm where id=$id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data, $id){
        // var_dump($id);
        // die;

        $nama_ukm = $data['nama_ukm'];

        $query = "UPDATE ukm SET nama_ukm='$nama_ukm' WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

}
