<?php
namespace App\Http\Repositories;

interface ProductRepositorieInterface {
    public function  getById($id);
    public function getInfoProduct($id,$user_id);

    public function  getAll();

    public function  popular($userid);
    public function  getProfitMonth();
    public function getSales();
    public function getCostumers();
    public function getProducts();
    public function gitRevenue();
    public function transactions();


    public function getProducts_SubCategory($subCategory,$userId);

    public function getRelated_Products($subCategory,$product,$userid);
    public function getProducts_filter($subCategory,$option,$userid);

    public function create(array $data);
    public function update($id,array $data);
    public function delete($id);
}