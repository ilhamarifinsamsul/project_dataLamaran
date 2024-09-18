<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Users extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */

    private $modeluser;
    private $title = 'Kelola Users';

    public function __construct()
    {
        $this->modeluser = new \App\Models\UserModel();
    }
    
    public function index()
    {
        $data = [
            'title' => $this->title,
            'user' => $this->modeluser->select('tb_users.*')->select('nama_role')->join('tb_role', 'tb_role.id = tb_users.role_id')->findAll()
        ];

        return view('users/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {

        $result = $this->modeluser->find($id);
        if (!$result) {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'NOT VALID');
            session()->setFlashdata('icon', 'warning');
        }
        

        $data = [
            'title' => $this->title,
            'role' => $this->modeluser->getRole(),
            'user' => $result
        ];

        return view('users/show', $data);
    }

    

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $data = [
            'user' => $this->modeluser->findAll(),
            'role' => $this->modeluser->getRole(),
            'title' => $this->title,
            'validation' => \Config\Services::validation()
        ];

        return view('users/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        
        $rules = [
            'username' => 'required',
            'nama_lengkap' => 'required',
            'password' => 'required|min_length[5]',
            'email' => 'required|is_unique[tb_users.email]',
            'alamat' => 'required',
            'no_hp' => 'required'
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => htmlspecialchars($this->request->getVar('username')),
            'nama_lengkap' => htmlspecialchars($this->request->getVar('nama_lengkap')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'alamat' => htmlspecialchars($this->request->getVar('alamat')),
            'no_hp' => htmlspecialchars($this->request->getVar('no_hp')),
            'role_id' => htmlspecialchars($this->request->getVar('role_id'))
        ];

        $result = $this->modeluser->save($data);

        if ($result) {
            session()->setFlashdata('message', 'Berhasil');
            session()->setFlashdata('text', 'Data Berhasil ditambahkan');
            session()->setFlashdata('icon', 'success');
        } else {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'Data Gagal ditambahkan');
            session()->setFlashdata('icon', 'warning');
        }

        return redirect()->to('users');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        $result = $this->modeluser->find($id);
        if (!$result) {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'NOT VALID');
            session()->setFlashdata('icon', 'warning');
        }

        $data = [
            'title' => $this->title,
            'role' => $this->modeluser->getRole(),
            'user' => $result
        ];

        return view('users/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $result = $this->modeluser->find($id);
        if (!$result) {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'NOT VALID');
            session()->setFlashdata('icon', 'warning');

            return redirect()->to('users');
        }

        $rules = [
            'nama_lengkap' => 'required',
        ];

        $input = $this->request->getVar();

        if ($input['email'] != $result['email']) {
            $rules['email'] = 'required|valid_email|is_unique[tb_users.email]';
        }

        if ($input['username'] != $result['username']) {
            $rules['username'] = 'required|is_unique[tb_users.username]';
        }

        if ($input['password'] != $result['password']) {
            $rules['password'] = 'required|min_length[5]';
        }

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => htmlspecialchars($this->request->getVar('username')),
            'nama_lengkap' => htmlspecialchars($this->request->getVar('nama_lengkap')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'alamat' => htmlspecialchars($this->request->getVar('alamat')),
            'no_hp' => htmlspecialchars($this->request->getVar('no_hp')),
        ];

        $res = $this->modeluser->update($id, $data);
        if ($res) {
            session()->setFlashdata('message', 'Berhasil');
            session()->setFlashdata('text', 'Data Berhasil diupdate');
            session()->setFlashdata('icon', 'success');
        } else {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'Data Gagal diupdate');
            session()->setFlashdata('icon', 'warning');
        }
        return redirect()-> to('users');

    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $result = $this->modeluser->find($id);
        if (!$result) {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'NOT VALID');
            session()->setFlashdata('icon', 'warning');

            return redirect()->to('users');
        }

        $res = $this->modeluser->delete($id);
        if ($res) {
            # code...
            session()->setFlashdata('message', 'Berhasil');
            session()->setFlashdata('text', 'Data Berhasil dihapus');
            session()->setFlashdata('icon', 'success');
        } else {
            session()->setFlashdata('message', 'Warning');
            session()->setFlashdata('text', 'Data Gagal dihapus');
            session()->setFlashdata('icon', 'warning');
        }

        return redirect()->to('users');
    }
}
