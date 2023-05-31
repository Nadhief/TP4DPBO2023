<?php
include_once("conf.php");
include_once("models/Members.class.php");

class FormView
{
    public function render($data)
    {
        $tittle = 'Add';
        $option = null;
        foreach ($data['ukm'] as $val) {
                $option .= "<option value='" . $val['id'] . "'>" . $val['nama_ukm'] . "</option>";
            }
                $data = '
                <form method="POST" action="index.php">

                <br><br>
                <div class="card mb-5">

                    <div class="card-header bg-primary">
                        <h1 class="text-white text-center">' . $tittle . ' Member</h1>
                    </div><br>
                        <label> NAME: </label>
                        <input type="text" name="name" class="form-control" required> <br>

                        <label> EMAIL: </label>
                        <input type="text" name="email" class="form-control" required> <br>

                        <label> PHONE: </label>
                        <input type="text" name="phone" class="form-control" required> <br>
                        
                        <label> JOIN DATE: </label>
                        <input type="date" name="join_date" class="form-control" required> <br>

                        <label for="ukm">UKM: </label>
                        <select class="custom-select form-control" name="id_ukm">
                            <option value="" disabled selected hidden>Pilih Ukm</option>
                            "' . $option . '"
                        </select>

                        
                    <button class="btn btn-success mt-4" type="submit" name="submit"> Submit </button><br>
                        <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

                    </div>
                </form>';

            $tpl = new Template("templates/form.html");
            $tpl->replace("FORM", $data);
            $tpl->write();
        
    }

    public function renderId($data)
    {
        $tittle = 'Update';
        $option = null;
            $ukm = 0;
            $datas = null;

            foreach ($data['members'] as $val) {
                list($id, $name, $email, $phone, $join_date, $id_ukm) = $val;
                $ukm = $id_ukm;
            }

            foreach ($data['ukm'] as $val) {
                list($id, $nama_ukm) = $val;
                if ($ukm == $id) {

                    $option .= "<option value='" . $id . "' selected>" . $nama_ukm . "</option>";
                } else {

                    $option .= "<option value='" . $id . "'>" . $nama_ukm . "</option>";
                }
            }
        foreach ($data['members'] as $val) {
            list($id,$name, $email, $phone, $join_date, $id_ukm) = $val;
            $data = '
                <form method="POST" action="index.php">

                <br><br>
                <div class="card mb-5">
                
                    <div class="card-header bg-primary">
                        <h1 class="text-white text-center">' . $tittle . ' Member</h1>
                    </div><br>
                        <input type="hidden" name="id" class="form-control" value="' . $id . '"> <br>
                        <label> NAME: </label>
                        <input type="text" name="name" class="form-control" value="' . $name . '"> <br>

                        <label> EMAIL: </label>
                        <input type="text" name="email" class="form-control" value="' . $email . '"> <br>

                        <label> PHONE: </label>
                        <input type="text" name="phone" class="form-control" value="' . $phone . '"> <br>
                        
                        <label> JOIN DATE: </label>
                        <input type="date" name="join_date" class="form-control" value="' . $join_date . '"> <br>

                        <label for="ukm">UKM: </label>
                        <select class="custom-select form-control" name="id_ukm">
                            "' . $option . '"
                        </select>
                
                        <button class="btn btn-success mt-4" type="submit" name="update">Update</button><br>
                        <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

                    </div>
                </form>';
        }

        // $title = 'Update Member';
        $tpl = new Template("templates/form.html");
        $tpl->replace("FORM", $data);
        $tpl->write();
        
    }
}
