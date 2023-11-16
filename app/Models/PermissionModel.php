<?php
class PermissionModel extends BaseModel
{
    const TABLE = 'permissions';

    public function getAll($facility_id)
    {
        $sql = "SELECT * from permissions p inner join users u on p.user_id = u.id where u.facility_id = $facility_id";
        return $this->query_all($sql);
    }

    public function getOne($id)
    {
        return $this->one(self::TABLE, $id);
    }

    public function createPermission($data)
    {
        return $this->create(self::TABLE, $data);
    }

    public function updatePermission($data, $id)
    {
        return $this->update(self::TABLE, $data, $id);
    }
    public function deletePermission($id)
    {
        return $this->delete(self::TABLE, $id);
    }
}