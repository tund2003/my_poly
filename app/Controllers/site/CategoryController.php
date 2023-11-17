<?php
class CategoryController extends BaseController
{
    private $newModel;
    private $facilityModel;

    public function __construct()
    {

        $this->model('NewModel');
        $this->newModel = new NewModel;

        $this->model('FacilityModel');
        $this->facilityModel = new FacilityModel;
    }
    public function index()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $newModel = $this->newModel->getAll($id);
        }

        if (isset($_GET["id"]) && isset($_GET["orderBy"])) {
            $id = $_GET["id"];
            $orderBy = $_GET["orderBy"];
            switch ($orderBy) {
                case 'latest':
                    $newModel = $this->newModel->orderBy("created_at", "n.category_id = $id");
                    break;
                case 'topView':
                    $newModel = $this->newModel->orderBy("view", "n.category_id = $id");
                    break;
                default:
                    # code...
                    break;
            }
        }


        $getNewPost = $this->newModel->getNewPost();
        $facilities = $this->facilityModel->getAll();
        return  $this->view('site.layouts.categories.index', [
            'facilities' => $facilities,
            'news' => $newModel,
            'getNewPost' => $getNewPost,
        ]);
    }
}