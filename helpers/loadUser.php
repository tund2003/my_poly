<?php
    class loadUser extends BaseModel {
        public function loadUser($id) {
                return $this -> one("users", $id);
        }
        public function loadAdmin($id) {
            return $this -> one("admin", $id);
    }
    }
?>