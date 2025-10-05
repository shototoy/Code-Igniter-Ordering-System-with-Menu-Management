<?php
namespace App\Controllers;
use App\Models\LoginModel;
use App\Models\MenuModel;
class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }
public function menu(): string
{
    $menuModel = new MenuModel();
    $data['menus'] = $menuModel->findAll();

    return view('menu', $data);
}

public function login()
{
    try {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $loginModel = new LoginModel();
        $user = $loginModel->where('username', $username)->first();

        if ($user && $user['password'] === $password) {
            session()->set([
                'isLoggedIn' => true,
                'username' => $user['username']
            ]);
            return redirect()->to('dashboard');
        } else {
            return redirect()->to('/')->with('error', 'Invalid credentials');
        }
    } catch (\Throwable $e) {
        echo '<pre>';
        echo 'Exception: ' . $e->getMessage() . "\n";
        echo 'File: ' . $e->getFile() . "\n";
        echo 'Line: ' . $e->getLine() . "\n";
        echo '</pre>';
        exit;
    }
}

public function logout()
{
    session()->destroy();
    return redirect()->to('/');
}


}
