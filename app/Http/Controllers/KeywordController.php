<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepositoryInterface;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class KeywordController extends Controller
{
    protected $repositoryInterface;

    public function __construct(RepositoryInterface $repositoryInterface) {
        $this->repositoryInterface = $repositoryInterface;
    }

    public function getCreate() {
        return view('create');
    }

    public function postCreate(Request $request) {
        $this->repositoryInterface->create($request->keyword, $request->source, $request->trust);
        return redirect('create')->with('message', 'Successfully added keyword to database');
    }

    public function getSearch() {
        return view('search');
    }

    public function postSearch(Request $request) {
        $result = $this->repositoryInterface->search($request->keyword, 1, 10);
        return view('list')->with('result', $result);
    }

    public function getImprove($id) {
        $result = $this->repositoryInterface->searchById($id);
        return view('improve')->with('result', $result);
    }

    public function postImprove($id, Request $request) {
        $result = $this->repositoryInterface->searchById($id);
        $this->repositoryInterface->improve($result['data']['keyword'], $request->keyword, $request->source, $request->trust);
        return redirect('improve/'.$result['data']['id'])->with('message', 'Successfully edited keyword from database');
    }

    public function getList() {
        $where = [
            ['trust', ">", 0],
            ['trust', "<", 100]
        ];
        $result = $this->repositoryInterface->list($where, 1, 10);
        return view('list')->with('result', $result);
    }

    public function postList(Request $request) {
        $min = $request->trustMin;
        $max = $request->trustMax;
        $where = [
            ['trust', ">", $min],
            ['trust', "<", $max]
        ];
        $result = $this->repositoryInterface->list($where, 1, 10);
        return view('list')->with('result', $result);
    }

    public function index() {
        return view('index');
    }


}
