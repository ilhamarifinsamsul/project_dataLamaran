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
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
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
        //
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
        //
    }
}
