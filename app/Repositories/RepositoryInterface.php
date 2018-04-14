<?php

namespace App\Repositories;

interface RepositoryInterface {

    public function create($string, $source = 'manual', $trust = 1);
    public function search($query, $page = 1, $limit = 10);
    public function improve($old_keyword, $new_keyword, $source = 'manual', $trust = 1);
    public function list($where, $page = 1, $limit = 10);

}