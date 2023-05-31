<?php
class MembersView
{
    // public $kocak = 'okee';
    public function render($data)
    {
        
        $dataMembers = null;

        foreach ($data['members'] as $val) {
            // var_dump($val);
            // die;
            list($id, $name, $email, $phone, $join_date, $id_ukm) = $val;
            $dataMembers .= "<tr>
            <td>" . $id . "</td>
            <td>" . $name . "</td>
            <td>" . $email . "</td>
            <td>" . $phone . "</td>
            <td>" . $join_date . "</td>
            <td>" . $val['nama_ukm'] . "</td>
            <td>
                <a class='btn btn-success' href='index.php?id_edit=$id'>Edit</a>
                <a class='btn btn-danger' href='index.php?id_delete=$id'>Delete</a>
            </td>
            </tr>";
        }

        $tpl = new Template("templates/index.html");

        $tpl->replace("DATA_TABEL", $dataMembers);
        // $tpl->replace("DATA_TABEL", $kocak);

        $tpl->write();
    }
}
