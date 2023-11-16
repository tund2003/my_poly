<?php
    class CategoryModel extends BaseModel {
        const TABLE = 'categories';

        public function getAll($select = ['*']) {
           return $this -> all(self::TABLE, $select);
        }

        public function getOne($id) {
            return $this -> one(self::TABLE, $id);
        }
    }
?>