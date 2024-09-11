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
            // $this->set('warning', 'Warning', 'User Tidak Ada');
        }

        return redirect()->to('authcontroller');
    }

    public function register() 
    {
        $data = [
            'title' => 'Register',
            
        ];
        return view('Login/register', $data);
    }

    public function registered() 
    {
        $rules = [
            'username' => 'required',
            'nama_lengkap' => 'required',
            'password' => 'required|min_length[5]',
            'confirm_password' => 'required|min_length[5]|matches[password]',
            'email' => 'required|is_unique[tb_users.email]',
            'alamat' => 'required',
            'no_hp' => 'required'
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => htmlspecialchars($this->request->getVar('username'), true),
            'nama_lengkap' => htmlspecialchars($this->request->getVar('nama_lengkap'), true),
            'email' => htmlspecialchars($this->request->getVar('email'), true),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'alamat' => htmlspecialchars($this->request->getVar('alamat'), true),
            'no_hp' => htmlspecialchars($this->request->getVar('no_hp'), true),
            'role_id' => 2
        ];

        $result = $this->modeluser->save($data);

        if ($result) {
            # code...
            session()->setFlashdata('message','Register');
            session()->setFlashdata('text', 'Berhasil Registrasi');
            session()->setFlashdata('icon','success');
        } 
        return redirect()->to('authcontroller/index');

        
    }

    public function logout(){
        session()->remove('id');
        session()->remove('role_id');
        session()->remove('username');
        session()->destroy();

        return redirect()->to('authcontroller');
    }
}
