<?php
namespace App\Controllers;

class DB_Backup extends BaseController
{

    function __construct(){
        helper('filesystem');
        date_default_timezone_set('Asia/Manila');
    }

    public function db_index(){
        $db = \Config\Database::connect();
        $dbname = $db->database;
        $path = WRITEPATH.'uploads/';   	         // change path here
        $filename = 'BackupDB_'.date('Ymd_Hi').'.sql';   // change file name here
        $prefs = ['filename' => $filename];		 // I only set the file name, for complete prefs see README

        $util = (new \CodeIgniter\Database\Database())->loadUtils($db);
        $backup = $util->backup($prefs,$db);
        write_file($path.$filename.'.gz', $backup);
        return $this->response->download($path.$filename.'.gz',null);
    }
}