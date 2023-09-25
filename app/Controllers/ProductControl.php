<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductModels;


class ProductControl extends BaseController {
    public function __construct() {
        $this->product = new ProductModels();
    }
    public function insertProduct() {
        $data = [
            'nama_product' => 'pc',
            'deskripsi' => 'pc baru di lab',
        ];
        $this->product->insertProductORM($data);
    }

    public function readProduct(){
        $product = $this ->product->findAll();
        $data = [
            'product' => $product
        ];
        return view('product', $data);
    }
}