<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Lamaran extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */

    private $modellamaran;
    private $modelportal;
    private $title = 'Lamaran';

    public function __construct()
    {
        $this->modellamaran = new \App\Models\LamaranModel();
        $this->modelportal = new \App\Models\PortalModel();
    }
    
    public function index()
    {
        $lamaran = $this->modellamaran->select('tb_lamaran.*')->select('perusahaan')->select('nama_portal')->join('tb_portal', 'tb_lamaran.portal_id = tb_portal.id')->orderBy('id', 'DESC')->findAll();

        $data = [
            'title' => $this->title,
            'lamaran' => $lamaran
        ];

        return view('master/lamaran/index', $data);
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
        return redirect()->to('master/lamaran');
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        session();
        $data = [
            'title' => $this->title,
            'lamaran' => $this->modellamaran->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('master/lamaran/new', $data);
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
        //
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
