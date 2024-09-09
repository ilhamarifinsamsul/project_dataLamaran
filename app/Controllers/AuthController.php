<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Alert;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;


class AuthController extends BaseController
{
    private $modeluser;
    public function __construct()
    {
        $this->modeluser = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('login/index', $data);
    }

    public function proses_login()
    {
        $username = htmlspecialchars($this->request->getVar('username'), true);
        $password = htmlspecialchars($this->request->getVar('password'), true);

        $res = $this->modeluser->cekLogin($username);

        if (count($res) > 0) {
            $userData = $res[0];
            if(password_verify($password, $userData['password'])) {
                if ($userData) {
                    session()->setFlashdata('message','Login');
                    session()->setFlashdata('text', 'User Berhasil Login');
                    session()->setFlashdata('icon','success');
                    // $this->alert->set('success', 'Success', 'User Berhasil Login');
                    session()->set('id', $userData['id']);
                    session()->set('username', $userData['username']);
                    session()->set('role_id', $userData['role_id']);
                    session()->setFlashdata('message','Login');
                    // session()->get('message');
                    return redirect()->to('dashboard');
                }
            } else {
                session()->setFlashdata('message', 'Gagal');
                session()->setFlashdata('text', 'Password Salah');
                session()->setFlashdata('icon', 'warning');
                // $this->alert->set('warning', 'Warning', 'Password Salah');
            }
        } else {
                session()->setFlashdata('message', 'Gagal');
                session()->setFlashdata('text', 'User Tidak Ada');
                session()->setFlashdata('icon', 'warning');
            // $this->alert->set('warning', 'Warning', 'User Tidak Ada');
        }

        return redirect()->to('authcontroller');
    }

    public function logout(){
        session()->remove('id');
        session()->remove('role_id');
        session()->remove('username');
        session()->destroy();

        return redirect()->to('authcontroller');
    }
}
