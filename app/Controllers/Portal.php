<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Portal extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */

    private $modelportal;
    private $modellamaran;
    private $title = 'Portal Lamaran';

    function __construct()
    {
        $this->modelportal = new \App\Models\PortalModel();
        $this->modellamaran = new \App\Models\LamaranModel();
    }
    
    public function index()
    {
        $data = [
            'title' => $this->title,
            'portal' => $this->modelportal->findAll()
        ];

        return view('master/portal/index', $data);
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
        return redirect()->to('master/portal');
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $data = [
            'title' => $this->title
        ];
        return view('master/portal/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data = [
            'nama_portal' => $this->request->getVar('nama_portal')
        ];

        $result = $this->modelportal->save($data);

        if ($result) {
            session()->setFlashdata('message', 'Berhasil');
            session()->setFlashdata('text', 'Data Berhasil ditambahkan');
            session()->setFlashdata('icon', 'success');
        } else {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'Data Gagal ditambahkan');
            session()->setFlashdata('icon', 'warning');
        }

        return redirect()->to('master/portal');
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
        $result = $this->modelportal->find($id);
        if (!$result) {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'Data Tidak Valid');
            session()->setFlashdata('icon', 'warning');

            return redirect()->to('master/portal');
        }

        $data = [
            'title' => $this->title,
            'portal' => $result
        ];

        return view('master/portal/edit', $data);
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
        $data = [
            'nama_portal' => $this->request->getVar('nama_portal')
        ];

        $result = $this->modelportal->update($id, $data);
        if ($result) {
            session()->setFlashdata('message', 'Berhasil');
            session()->setFlashdata('text', 'Data Berhasil diedit');
            session()->setFlashdata('icon', 'success');
        }
        return redirect()->to('master/portal');
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
        $result = $this->modelportal->find($id);
        if (!$result) {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'NOT VALID');
            session()->setFlashdata('icon', 'warning');

            return redirect()->to('master/portal');
        }

        $res = $this->modelportal->delete($id);
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

        return redirect()->to('master/portal');
    }
}
