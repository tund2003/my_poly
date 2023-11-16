<?php
    class FacilityModel extends BaseModel {
        const TABLE = 'facilities';

        public function getAll($select = ['*']) {
           return $this -> all(self::TABLE, $select);
        }

        public function getOne($id) {
            return $this -> one(self::TABLE, $id);
        }
    }
?>