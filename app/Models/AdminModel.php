<?php
class AdminModel extends BaseModel
{
    const TABLE = 'admin';

    public function checkAdmin($username, $password, $facility_id)
    {
        $data = $this->all(self::TABLE);
        $check = false;
        foreach ($data as $key => $value) {
            if ($value['username'] == $username && $value['password'] == $password && $value['facility_id'] == $facility_id) {
                $check = true;
                break;
            }
        }
        return $check;
    }
    public function getAdmin($username)
    {
        $sql = "SELECT * from `admin` where username = '{$username}'";
        return $data = $this->query_one($sql);
    }
}