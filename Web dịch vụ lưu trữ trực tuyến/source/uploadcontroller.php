<?php
require_once("db.php");
class UploadController {
    public function check($us)
    {
        global $conn;
        $stm = $conn->prepare("select * from uploads where id=?");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new UploadInfo();
        $stm->bind_result($us->id, $us->user_id, $us->main_filename, $us->file_type, $us->file_size, $us->create_at,  $us->update_at);
        $stm->fetch();
        return $us; 
    }
}
class UploadInfo {
    public $id;
    public $user_id;
    public $main_filename;
    public $file_type;
    public $file_size;  
    public $create_at;
    public $update_at;
}


?>