<?php

class BrandsController extends BaseController
{
    private $tableBrand = 'brands';
    private $tableProduct = 'products';
    public function __construct()
    {
        parent::__construct();
    }
    public function index($id)
    {
        //show product type 
        $data = $this->headerData;
        $this->loadView('header', $data);
        $idBrand   = $id[0];
        $getBrandModel = $this->loadModel('brandModel');
        $i = $getBrandModel->countRecord($this->tableBrand, $this->tableProduct, $idBrand);
        $number_row = $i;
        if (isset($id[1]) && isset($id[2])) {
            $numberProductOnPage = $id[1];
            $currentPage  = $id[2];
        }
        if (!isset($id[2]) && !isset($id[1]) || isset($id[2]) && !isset($id[1]) || !isset($id[2]) && isset($id[1])) {
            $currentPage = 1;
            $numberProductOnPage = 8;
        }
        $number_page = ceil($number_row / $numberProductOnPage);
        $data['number_page']  = [];
        array_push($data['number_page'], $number_page, $numberProductOnPage, $currentPage);
        $offset = ($currentPage - 1) * $numberProductOnPage;
        $data['getData_byProduct_type'] = $getBrandModel->GetProductByIdPagination($this->tableBrand, $this->tableProduct, $idBrand, $numberProductOnPage, $offset);
        $this->loadView('productViewbyBrand', $data);
        $this->loadView('footer', $data);
    }

   
}
