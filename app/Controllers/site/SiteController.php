<?php
class SiteController extends BaseController
{

    private $categoryModel;
    private $newModel;
    private $facilityModel;
    private $orderModel;

    public function __construct()
    {
        $this->model('CategoryModel');
        $this->model('NewModel');
        $this->model('FacilityModel');
        $this->categoryModel = new CategoryModel;
        $this->newModel = new NewModel;
        $this->facilityModel = new FacilityModel;
    }
    public function index()
    {
        if (isset($_GET['gia_tu']) && isset($_GET['gia_den'])) {
            $gia_tu = $_GET['gia_tu'];
            $gia_den = $_GET['gia_den'];
            $news = $this->newModel->getPrice($gia_tu, $gia_den);
        } else if (isset($_GET['gia_tu']) && !isset($_GET['gia_den'])) {
            $gia_tu = $_GET['gia_tu'];
            $gia_den = '1000000000';
            $news = $this->newModel->getPrice($gia_tu, $gia_den);
        } else if (isset($_GET['gia_den']) && !isset($_GET['gia_tu'])) {
            $gia_tu = "0";
            $gia_den = $_GET['gia_den'];
            $news = $this->newModel->getPrice($gia_tu, $gia_den);
        } else {
            $news = $this->newModel->getAll();
        }

        //diện tích
        if (isset($_GET['dien_tich_tu']) && isset($_GET['dien_tich_den'])) {
            $dien_tich_tu = $_GET['dien_tich_tu'];
            $dien_tich_den = $_GET['dien_tich_den'];
            $news = $this->newModel->getArea($dien_tich_tu, $dien_tich_den);
        } else if (isset($_GET['dien_tich_tu']) && !isset($_GET['dien_tich_den'])) {
            $dien_tich_tu = $_GET['dien_tich_tu'];
            $dien_tich_den = '1000';
            $news = $this->newModel->getArea($dien_tich_tu, $dien_tich_den);
        } else if (isset($_GET['dien_tich_den']) && !isset($_GET['dien_tich_tu'])) {
            $dien_tich_tu = '0';
            $dien_tich_den = $_GET['dien_tich_den'];
            $news = $this->newModel->getArea($dien_tich_tu, $dien_tich_den);
        }

        // Cơ sở
        if (isset($_GET["facility_id"])) {
            $id = $_GET["facility_id"];
            $news = $this->newModel->getFacilities($id);
        }

        if (isset($_GET["orderBy"])) {
            $orderBy = $_GET["orderBy"];
            switch ($orderBy) {
                case 'latest':
                    $news = $this->newModel->orderBy("created_at");
                    break;
                case 'topView':
                    $news = $this->newModel->orderBy("view");
                    break;
                default:
                    # code...
                    break;
            }
        }
        $categories = $this->categoryModel->getAll();
        $facilities = $this->facilityModel->getAll();
        $getNewPost = $this->newModel->getNewPost();

        $data = $this->newModel->pagination("news", $news, 7);
        $newsPagination = $data[0];
        $numOfPage = $data[1];

        $this->view('site.index', [
            'categories' => $categories,
            'facilities' => $facilities,
            // 'newsPagination' => $newsPagination,
            'news' => $news,
            'numOfPage' => $numOfPage,
            'getNewPost' => $getNewPost,
        ]);
    }

}