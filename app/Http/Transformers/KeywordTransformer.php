<?php

namespace App\Http\Transformers;

use App\Keyword;
use League\Fractal\TransformerAbstract;

class KeywordTransformer extends TransformerAbstract {

    public function transform(Keyword $keyword) {
        return [
            'id' => $keyword->id,
            'keyword' => $keyword->keyword,
            'source' => $keyword->source,
            'trust' => $keyword->trust
        ];
    }

}