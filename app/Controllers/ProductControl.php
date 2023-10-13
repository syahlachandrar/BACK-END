<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductModels;


class ProductControl extends BaseController {
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

    // read
    public function readProduct(){
        $product = $this ->product->findAll();
        $data = [
            'product' => $product
        ];
        return view('product', $data);
    }

    // get
    public function getProduct($id) {
        $product = $this->product->where('id', $id)->first();
        $data = [
            'product'=> $product
        ];
        return view('editproduct', $data);
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

    // delete
    public function deleteProduct($id){
        $this->product->delete($id);
        return redirect()->to(base_url('readproduct'));
    }
}