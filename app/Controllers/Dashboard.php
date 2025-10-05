<?php
namespace App\Controllers;
class Dashboard extends BaseController
{
public function index()
{
    $db = \Config\Database::connect();
    $menus = $db->table('menu')->get()->getResultArray();
    return view('dashboard', ['menus' => $menus]);
}

}