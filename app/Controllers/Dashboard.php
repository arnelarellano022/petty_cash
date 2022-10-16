<?php
namespace App\Controllers;
class Dashboard extends BaseController
{
    public function index()
    {
        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('dashboard/dashboard');
        echo view('partial/footer');
    }
}