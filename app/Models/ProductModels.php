<?php


namespace App\Models;
use CodeIgniter\Model; 

class ProductModels extends Model{
    protected $table = 'product';
    protected $returnType = 'object';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','nama_product','deskripsi'];

    

    public function insertProductORM($data){
        return $this->insert($data);
    }

    

}