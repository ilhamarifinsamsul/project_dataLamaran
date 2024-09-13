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
    private $title = 'List Lamaran';

    public function __construct()
    {
        $this->modellamaran = new \App\Models\LamaranModel();
        $this->modelportal = new \App\Models\PortalModel();
    }
    
    public function index()
    {

        $lamaran = $this->modellamaran->select('tb_lamaran.*')->select('perusahaan')->select('nama_portal')->select('nama_status')->join('tb_portal', 'tb_lamaran.portal_id = tb_portal.id')->join('tb_status', 'tb_lamaran.status_id = tb_status.id')->orderBy('id', 'DESC')->findAll();

        

        $data = [
            'title' => $this->title,
            'lamaran' => $lamaran,
            
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
            'portal' => $this->modelportal->findAll(),
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
        if (!$this->validate(
            [
                'perusahaan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} perusahaan harus diisi.'
                    ]
                ],
                'posisi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} posisi harus diisi.'
                    ]
                ],
                'alamat_perusahaan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} alamat perusahaan harus diisi.'
                    ]
                ]
            ]
        )) {
            $validation = \Config\Services::validation();
            if ($validation) {
                session()->setFlashdata('message', 'Gagal');
                session()->setFlashdata('text', 'Form harus diisi');
                session()->setFlashdata('icon', 'error');
            }
            return redirect()->to('master/lamaran/new')->withInput();
            
        }

        $data = [
            'perusahaan' => $this->request->getVar('perusahaan'),
            'posisi' => $this->request->getVar('posisi'),
            'alamat_perusahaan' => $this->request->getVar('alamat_perusahaan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'portal_id' => htmlspecialchars($this->request->getVar('portal_id'), true),
            'status_id' => 1
        ];

        $res = $this->modellamaran->save($data);
        if ($res) {
            session()->setFlashdata('message', 'Berhasil');
            session()->setFlashdata('text', 'Data Berhasil ditambahkan');
            session()->setFlashdata('icon', 'success');
        } else {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'Data Gagal ditambahkan');
            session()->setFlashdata('icon', 'warning');
        }

        return redirect()->to('master/lamaran');

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
        $result = $this->modellamaran->find($id);
        if (!$result) {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'NOT VALID');
            session()->setFlashdata('icon', 'warning');
        }

        $data = [
            'title' => $this->title,
            'portal' => $this->modelportal->findAll(),
            'lamaran' => $result
        ];

        return view('master/lamaran/edit', $data);
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
            'perusahaan' => $this->request->getVar('perusahaan'),
            'posisi' => $this->request->getVar('posisi'),
            'alamat_perusahaan' => $this->request->getVar('alamat_perusahaan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'portal_id' => $this->request->getVar('portal_id')
        ];
        
        if (session()->get('role_id') == 1) {
            $data = [
                'status_id' => htmlspecialchars($this->request->getVar('status_id'))
            ];
        }

        

        $result = $this->modellamaran->update($id, $data);


        if ($result) {
            session()->setFlashdata('message', 'Berhasil');
            session()->setFlashdata('text', 'Data Berhasil diupdate');
            session()->setFlashdata('icon', 'success');
        } else {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'Data Gagal diupdate');
            session()->setFlashdata('icon', 'warning');
        }

        return redirect()->to('master/lamaran');
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
        $result = $this->modellamaran->find($id);
        if (!$result) {
            session()->setFlashdata('message', 'Gagal');
            session()->setFlashdata('text', 'NOT VALID');
            session()->setFlashdata('icon', 'warning');

            return redirect()->to('master/portal');
        }

        $res = $this->modellamaran->delete($id);
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

        return redirect()->to('master/lamaran');
    }
}
