<?php
require_once('../config.php');

class Users extends DBConnection
{
    private $settings;

    public function __construct()
    {
        global $_settings;
        $this->settings = $_settings;
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    public function save_users()
    {
        extract($_POST);
        $data = '';
        foreach ($_POST as $k => $v) {
            if (!in_array($k, ['ID', 'PASSWORD'])) {
                if (!empty($data)) {
                    $data .= " , ";
                }
                $data .= "`{$k}` = '{$v}'";
            }
        }

        if (!empty($password)) {
            $password = md5($password);
            if (!empty($data)) {
                $data .= " , ";
            }
            $data .= "`PASSWORD` = '{$password}'";
        }

        $check = $this->conn->query("SELECT * FROM `users` WHERE `USERNAME` = '{$username}'" . (!empty($id) ? " AND `ID` != '{$id}'" : ''))->num_rows;
        if ($check > 0) {
            return 2;
        }

        if (empty($id)) {
            $qry = $this->conn->query("INSERT INTO `users` SET {$data}");
            if ($qry) {
                $id = $this->conn->insert_id;
                $this->settings->set_flashdata('success', 'User details successfully saved.');

                if (!empty($_FILES['img']['tmp_name'])) {
                    if (!is_dir(base_app . "admin/uploads")) {
                        mkdir(base_app . "admin/uploads", 0777, true);
                    }

                    $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                    $fname = "admin/uploads/{$id}.{$ext}";

                    $accept = ['image/jpeg', 'image/png'];
                    if (!in_array($_FILES['img']['type'], $accept)) {
                        $err = "Image file type is invalid";
                    }

                    if ($_FILES['img']['type'] === 'image/jpeg') {
                        $uploadfile = imagecreatefromjpeg($_FILES['img']['tmp_name']);
                    } elseif ($_FILES['img']['type'] === 'image/png') {
                        $uploadfile = imagecreatefrompng($_FILES['img']['tmp_name']);
                    }

                    if (!$uploadfile) {
                        $err = "Image is invalid";
                    }

                    $temp = imagescale($uploadfile, 200, 200);
                    if (is_file(base_app . $fname)) {
                        unlink(base_app . $fname);
                    }

                    if ($_FILES['img']['type'] === 'image/jpeg') {
                        $upload = imagejpeg($temp, base_app . $fname);
                    } elseif ($_FILES['img']['type'] === 'image/png') {
                        $upload = imagepng($temp, base_app . $fname);
                    } else {
                        $upload = false;
                    }

                    if ($upload) {
                        $this->conn->query("UPDATE `users` SET `PHOTO` = CONCAT('{$fname}', '?v=', UNIX_TIMESTAMP(CURRENT_TIMESTAMP)) WHERE `ID` = '{$id}'");
                    }

                    imagedestroy($temp);
                }

                return 1;
            } else {
                return 2;
            }
        } else {
            $qry = $this->conn->query("UPDATE `users` SET {$data} WHERE `ID` = {$id}");
            if ($qry) {
                $this->settings->set_flashdata('success', 'User details successfully updated.');

                if (!empty($_FILES['img']['tmp_name'])) {
                    if (!is_dir(base_app . "admin/uploads")) {
                        mkdir(base_app . "admin/uploads", 0777, true);
                    }

                    $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                    $fname = "admin/uploads/{$id}.{$ext}";

                    $accept = ['image/jpeg', 'image/png'];
                    if (!in_array($_FILES['img']['type'], $accept)) {
                        $err = "Image file type is invalid";
                    }

                    if ($_FILES['img']['type'] === 'image/jpeg') {
                        $uploadfile = imagecreatefromjpeg($_FILES['img']['tmp_name']);
                    } elseif ($_FILES['img']['type'] === 'image/png') {
                        $uploadfile = imagecreatefrompng($_FILES['img']['tmp_name']);
                    }

                    if (!$uploadfile) {
                        $err = "Image is invalid";
                    }

                    $temp = imagescale($uploadfile, 200, 200);
                    if (is_file(base_app . $fname)) {
                        unlink(base_app . $fname);
                    }

                    if ($_FILES['img']['type'] === 'image/jpeg') {
                        $upload = imagejpeg($temp, base_app . $fname);
                    } elseif ($_FILES['img']['type'] === 'image/png') {
                        $upload = imagepng($temp, base_app . $fname);
                    } else {
                        $upload = false;
                    }

                    if ($upload) {
                        $this->conn->query("UPDATE `users` SET `PHOTO` = CONCAT('{$fname}', '?v=', UNIX_TIMESTAMP(CURRENT_TIMESTAMP)) WHERE `ID` = '{$id}'");
                    }

                    imagedestroy($temp);
                }

                return 1;
            } else {
                return 2;
            }
        }
    }
}
