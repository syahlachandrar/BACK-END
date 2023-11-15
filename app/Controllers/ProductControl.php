<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductModels;
use CodeIgniter\API\ResponseTrait;


class ProductControl extends BaseController {
    use ResponseTrait;
    public function __construct() {
        
        $this->product = new ProductModels();
    }

    // view
    public function viewProduct(){

        $product = $this ->product->findAll();
        $data = [
            'product' => $product
        ];
        return view('create', $data);
    }

    // create
    public function insertProduct() {
        $data = [
            'nama_product' => $this->request->getVar('nama_product'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            
        ];
        $this->product->insertProductORM($data);
        return redirect()->to(base_url("readproduct"));
    }

    public function insertProductApi() {
        $requestData = $this->request->getJSON();
        $validation = $this->validate([
            'nama_product' => 'required',
            'deskripsi' => 'required',
        ]);
        if(!$validation) {
            $this->response->setStatusCode(404);
            return $this->response->setJSON( [
                'code' => 404,
                'status' => 'BAD REQUEST',
                'data' => 'Semua Harus Terisi'
            ]);
        }

        $data = [
            'nama_product' => $requestData->nama_product,
            'deskripsi' =>  $requestData->deskripsi,
            
        ];

        $insert = $this->product->insertProductORM($data);
        if ($insert) {
            return $this->respond([
                'code' => 200,
                'status' => 'OK',
                'data' => $data
            ]);
        } else {
            return $this->response->setJSON( [
                'code' => 500,
                'status' => 'Internal Server Eror!',
                'data' => null
            ]);
        }

    }

    // read
    public function readProduct(){
        $product = $this ->product->findAll();
        $data = [
            'product' => $product
        ];
        return view('product', $data);
    }

    // apiread
    public function readProductApi(){
        $product = $this ->product->findAll();
        
        return $this->respond([
            'code' => 200,
            'status' => 'OK',
            'data' => $product
        ]);
    }

    // get
    public function getProduct($id) {
        $product = $this->product->where('id', $id)->first();
        $data = [
            'product'=> $product
        ];
        return view('editproduct', $data);
    }

    // apiget
    public function getProductApi($id) {
        $product = $this->product->where('id', $id)->first();
        
        if (!$product) {
            $this->response->setStatusCode(404);
            return $this->response->setJSON( [
                'code' => 404,
                'status' => 'NOT FOUND',
                'data' => 'data tidak ditemukan'
            ]);
        }
        return $this->respond([
            'code' => 200,
            'status' => 'OK',
            'data' => $product
        ]);
        
    }

    // edit
    public function updateProduct($id){
        $nama_product = $this->request->getVar('nama_product');
        $deskripsi = $this->request->getVar('deskripsi');

        $data = [
            'nama_product' => $nama_product,
            'deskripsi' => $deskripsi
        ];
        $this->product->update($id, $data);
        return redirect()->to(base_url("readproduct"));
    }

    public function updateProductApi($id) {
        $requestData = $this->request->getJSON();
        $validation = $this->validate ([
            'nama_product' => 'required',
            'deskripsi' => 'required'
        ]);

        if (!$validation) {
            $this->response->setStatusCode(400);
            return $this->response->setJSON([
                'code' => 400,
                'status' => 'BAD REQUEST',
                'data' => 'Invalid input data'
            ]);
        }

        $data = [
            'nama_product' => $nama_product,
            'deskripsi' => $deskripsi
        ];

        $existingProduct = $this->product->find($id);

        if (!$existingProduct) {
            $this->response->setStatusCode(404);
            return $this->response->setJSON([
                'code' => 404,
                'status' => 'NOT FOUND',
                'data' => 'data tidak ditemukan'
            ]);
        }

        $update = $this->product->update($id, $data);
        
        if ($update) {
            return $this->respond([
                'code' => 200,
                'status' => 'OK',
                'data' => $data
            ]);
        } else {
            $this->response->setStatusCode(500);
            return $this->response->setJSON([
                'code'=> 500,
                'status'=>'INTERNAL SERVER ERROR',
                'data'=>'null'
                ]);
        }

        $this->response->setStatusCode(500);
            return $this->response->setJSON([
                'code' => 500,
                'status' => 'INTERNAL SERVER ERROR',
                'data' => $e->getMessage()
            ]);
    }

    // delete
    public function deleteProduct($id){
        $this->product->delete($id);
        return redirect()->to(base_url('readproduct'));
    }

    public function deleteProductApi($id) {
        $existingProduct = $this->product->find($id);
    
        if (!$existingProduct) {
            $this->response->setStatusCode(404);
            return $this->response->setJSON([
                'code' => 404,
                'status' => 'NOT FOUND',
                'data' => 'Product tidak ditemukan'
            ]);
        }
    
        try {
            $this->product->delete($id);
    
            return $this->respond([
                'code' => 200,
                'status' => 'OK',
                'data' => 'Product telah dihapus'
            ]);
        } catch (\Exception $e) {
            $this->response->setStatusCode(500);
            return $this->response->setJSON([
                'code' => 500,
                'status' => 'INTERNAL SERVER ERROR',
                'data' => $e->getMessage()
            ]);
        }
    }
}