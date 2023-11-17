<?php
class NewController extends BaseController
{

    private $newModel;

    public function __construct()
    {
        $this->model('NewModel');
        $this->newModel = new NewModel;
    }

    public function index()
    {
        if (isset($_GET["detail"])) {
            $id = $_GET["detail"];
            $new = $this->newModel->getOne($id);
            $topViews = $this->newModel->getTopView("", "0,5");
            $facilities = $this->newModel->getAll("", "", [$new['facility_id'], $new['id']]);
            $data = [
                "view" => $new['view'] + 1
            ];
            $this->newModel->updateNew($data, $id);
            $getNewPost = $this->newModel->getNewPost();
            $this->view('site.layouts.newDetail', [
                "new" => $new,
                "topViews" => $topViews,
                "facilities" => $facilities,
                "getNewPost" => $getNewPost,
            ]);
        }
    }

    public function savePostNew()
    {
        $title = $_POST["title"];
        $address = $_POST["address"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $area = $_POST["area"];
        $number_people = $_POST["number_people"];
        $images = $_FILES["images"];
        $facility_id = $_POST["facility"];
        $category_id = $_POST["category"];
        $image = $this->upload_image($images);
        $data = [
            "title" => $title,
            "address" => $address,
            "description" => $description,
            "image" => $image,
            "price" => $price,
            "area" => $area,
            "number_people" => $number_people,
            "category_id" => $category_id,
            "user_id" => $_SESSION["auth"]['id'],
            "facility_id" => $facility_id,
            "status" => 0,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ];
        $this->newModel->createNew($data);
        header('location: http://localhost/poly_tro/site/account');
    }
}