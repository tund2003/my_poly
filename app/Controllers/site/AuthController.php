<?php
class AuthController extends BaseController
{

    private $authModel;

    public function __construct()
    {
        $this->model('AuthModel');
        $this->authModel = new AuthModel;
    }

    public function signIn()
    {
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $check = $this->authModel->checkAuth($phone_number, $password);

        if ($check) {
            $auth = $this->authModel->getAuth($phone_number);
            $_SESSION["auth"] = $auth;
            header("location: http://localhost/poly_tro/");
        } else {
            header("location: http://localhost/poly_tro/site/account?signIn&error");
        }
    }


    public function signUp()
    {
        $fullname = $_POST['fullname'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $facility_id = $_POST["facility_id"];

        $checkEmail = $this->authModel->checkExist('users', 'email', $email);
        $checkPhone = $this->authModel->checkExist('users', 'phone', $phone_number);

        if ($checkPhone != "" && $checkEmail != "") {
            header("location: http://localhost/poly_tro/site/account?signUp&phoneError&emailError");
            die;
        }

        if ($checkPhone != "") {
            header("location: http://localhost/poly_tro/site/account?signUp&phoneError");
            die;
        }

        if ($checkEmail != "") {
            header("location: http://localhost/poly_tro/site/account?signUp&emailError");
            die;
        }

        $data = [
            "fullname" => $fullname,
            "phone" => $phone_number,
            "password" => $password,
            "email" => $email,
            "status" => 1,
            "facility_id" => $facility_id,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ];
        $this->authModel->createUser($data);
        echo "Đăng ký thành công";
        header("Refresh: 2; URL=http://localhost/poly_tro/site/account?signIn");
    }

    public function logout()
    {
        if (isset($_SESSION["auth"])) {
            unset($_SESSION["auth"]);
            header("location: http://localhost/poly_tro");
        }
    }

    public function forgot()
    {
        $phone_number = $_POST["phone_number"];
        $check = $this->authModel->checkAuth($phone_number, "", true);
        if ($check) {
            $phone = $this->authModel->getAuth($phone_number)['password'];
            $this->view("site.layouts.forgot", [
                "phone" => $phone
            ]);
        } else {
            header("location: http://localhost/poly_tro/site/account?forgot&error");
        }
    }
}