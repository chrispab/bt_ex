<?php
namespace App\Model;

class BaseModel {
    
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
}
