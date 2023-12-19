<?php
class KieuLoai extends Db {
    public function getAll() {
        $sql = 'select * from xuatxu';
        return $this->exeQuery( $sql);
    }
}