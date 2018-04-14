<?php

namespace App\Repositories;

use App\Http\Transformers\KeywordTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;

use App\Keyword;

abstract class BaseRepository implements RepositoryInterface {

    protected $manager;

    public function __construct() {
        $this->manager = new Manager();
    }

    public function create($string, $source = 'manual', $trust = 1) {
        $keyword = Keyword::updateOrCreate(
            ['keyword' => $string],
            ['source' => $source, 'trust' => $trust]
        );
    }

    public function search($query, $page = 1, $limit = 10) {
        $result = Keyword::where('keyword', $query)->skip(($page-1)*$limit)->take($limit)->get();
        $resource = new Collection($result, new KeywordTransformer);
        return $this->manager->createData($resource)->toArray();
    }

    public function improve($old_keyword, $new_keyword, $source = 'manual', $trust = 1) {
        Keyword::where('keyword', $old_keyword)
                ->update(['keyword' => $new_keyword, 'source' => $source, 'trust' => $trust]);
    }

    public function list($where, $page = 1, $limit = 10) {
        $result = Keyword::where($where)
                        ->skip(($page-1)*$limit)
                        ->take($limit)
                        ->get();
        $resource = new Collection($result, new KeywordTransformer);
        return $this->manager->createData($resource)->toArray();
    }

    public function searchById($id) {
        $result = Keyword::find($id);
        $resource = new Item($result, new KeywordTransformer);
        return $this->manager->createData($resource)->toArray();
    }

}