<?php
class UkmView
{
    // public $kocak = 'okee';
    public function render($data, $id_edit)
    {
        $dataUkm = null;
        $no = 1;

        foreach ($data['ukm'] as $val) {
            list($id, $ukm_nama) = $val;
            $dataUkm .= "<tr>
            <td>" . $no . "</td>
            <td>" . $ukm_nama . "</td>
            <td>
                <a class='btn btn-success' href='ukm.php?id_edit=$id'>Edit</a>
                <a class='btn btn-danger' href='ukm.php?id_delete=$id'>Delete</a>
            </td>
            </tr>";
            $no++;
        }

        if (empty($id_edit)) {
            $form = '<div class="card-body">
            <form method="post" id="data" action="ukm.php">
                <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label">Nama UKM</label>
                    <div class="col-sm-8">
                        <input required type="text" class="form-control" name="nama_ukm">
                    </div>
                </div>
            </form>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-success" name="submit" form="data">Add</button>
                <a class="btn btn-info" type="submit" name="cancel" href="ukm.php"> Cancel </a><br>
            </div>';
            
            $title = 'Add';
        } else
        {
            $form = null;
            
            foreach ($data['specific'] as $val) {
                // var_dump($val);
                // die;
                list($id, $ukm_nama) = $val;
                $form = '<div class="card-body">
                <form method="post" id="data" action="ukm.php">
                <div class="mb-3 row">
                    <input type="hidden" name="id" value="' . $id_edit . '">
                    <label for="name" class="col-sm-4 col-form-label">Nama UKM</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_ukm" value="' . $ukm_nama . '">
                    </div>
                </div>
                </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-success" name="update" form="data">Simpan</button>
                    <a class="btn btn-info" type="submit" name="cancel" href="ukm.php"> Cancel </a><br>
                </div>';
            }
        }
        $tpl = new Template("templates/ukm.html");

        $tpl->replace("DATA_TABEL", $dataUkm);
        $tpl->replace("FORM", $form);

        $tpl->write();
    }
}
