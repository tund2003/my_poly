<?php
class BaseModel extends Database
{
    private $connect;

    public function __construct()
    {
        $this->connect = $this->connect();
    }

    public function all($table, $select = ['*'])
    {
        $cols = implode(',', $select);
        $sql = "Select {$cols} from {$table}";
        return $data = $this->query_all($sql);
    }

    public function one($table, $id)
    {
        $sql = "select * from {$table} where id = {$id}";
        return $data = $this->query_one($sql);
    }

    public function create($table, $data = [])
    {
        $cols = implode(',', array_keys($data));

        $values = implode(',', array_map(function ($value) {
            return "'$value'";
        }, array_values($data)));

        $sql = "insert into {$table} ({$cols}) values({$values})";

        return $this->execute($sql);
    }

    public function update($table, $data, $id)
    {
        $newData = [];

        foreach ($data as $key => $value) {
            array_push($newData, "{$key} = '{$value}'");
        }

        $newDataString = implode(',', $newData);

        $sql = "update {$table} set {$newDataString} where id = {$id}";
        return $this->execute($sql);
    }

    public function delete($table, $id)
    {
        if (gettype($id) == "array") {
            $ids = implode(',', $id);
            $sql = "DELETE from {$table} where id in ({$id})";
        } else {
            $sql = "DELETE from {$table} where id = {$id}";
        }
        return $this->execute($sql);
    }

    public function resetId($table)
    {
        $sql = "SET  @num := 0;
            UPDATE $table SET id = @num := (@num+1);
            ALTER TABLE $table AUTO_INCREMENT =1;";
        return $this->execute($sql);
    }

    public function orderBy($column, $condition = "", $order = "desc")
    {
        if ($condition == "") {
            $sql = "SELECT n.*, u.fullname, u.image as avatar, f.name as facility_name from news n inner join users u on n.user_id = u.id inner join facilities f on n.facility_id = f.id where n.status != 0 order by n.$column $order";
        } else {
            $sql = "SELECT n.*, u.fullname, u.image as avatar, f.name as facility_name from news n inner join users u on n.user_id = u.id inner join facilities f on n.facility_id = f.id where n.status != 0 and $condition order by n.`$column` $order";
        }
        return $data = $this->query_all($sql);
    }

    public function pagination($table, $data, $limit, $id = "")
    {
        $result_per_page = $limit;
        $number_of_pages = ceil(count(array_values($data)) / $limit);

        if (!isset($_GET["page"])) {
            $page = 1;
        } else {
            $page = $_GET["page"];
        }

        $result_on_page = ($page - 1) * $result_per_page;
        $handleData = array_slice($data, $result_on_page, $result_on_page + $limit);
        // if ($id == "") {
        //     $sql = "SELECT * from $table LIMIT ${result_on_page}, ${result_per_page}";
        // } else {
        //     $sql = "SELECT * from $table where category_id = ${id} LIMIT ${result_on_page}, ${result_per_page}";
        // }
        return $result = [$handleData, $number_of_pages];
    }
    public function checkExist($tableName, $column, $dataCheck, $id = "")
    {
        $check = false;
        if ($id != "") {
            $sql = "SELECT * FROM $tableName where id != $id";
            $dataSheet = $this->query_all($sql);
        } else {
            $sql = "SELECT * FROM $tableName";
            $dataSheet = $this->query_all($sql);
        }
        foreach ($dataSheet as $data) {
            if ($data["$column"] == $dataCheck) {
                $check = true;
                break;
            }
        }
        if ($check) {
            return $err = "$tableName" . "Error";
        } else {
            return $err = "";
        }
    }

    public function validatePhoneNumber($phoneNumber)
    {
        return preg_match('/^(84|0[3|5|7|8|9])+([0-9]{8})$/', $phoneNumber);
    }

    public function filterOnlyStatus($data, $statusCondition = "")
    {
        $arr = [];
        $statusCondition = $statusCondition == "active" ? 1 : 0;
        foreach ($data as $key => $value) {
            if ($value['status'] == $statusCondition) {
                $arr[] = $value;
            }
        }
        return $arr;
    }

    public function filterOnlyRole($data, $roleCondition = "")
    {
        $arr = [];
        $roleCondition = $roleCondition == "active" ? 1 : 0;
        foreach ($data as $key => $value) {
            if ($value['role'] == $roleCondition) {
                $arr[] = $value;
            }
        }
        return $arr;
    }

    public function filterStatusAndCategory($data, $statusCondition = "", $categoryCondition = "")
    {
        $arr = [];
        if ($categoryCondition == "") {
            $statusCondition = $statusCondition == "active" ? 1 : 0;
            foreach ($data as $key => $value) {
                if ($value['status'] == $statusCondition) {
                    $arr[] = $value;
                }
            }
            return $arr;
        } else if ($statusCondition == "") {
            foreach ($data as $key => $value) {
                if ($value['category_id'] == $categoryCondition) {
                    $arr[] = $value;
                }
            }
            return $arr;
        } else {
            $statusCondition = $statusCondition == "active" ? 1 : 0;
            foreach ($data as $key => $value) {
                if ($value['status'] == $statusCondition && $value['category_id'] == $categoryCondition) {
                    $arr[] = $value;
                }
            }
            return $arr;
        }
    }
}