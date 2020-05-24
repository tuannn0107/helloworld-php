<?php

namespace App\Http\Controllers\converter\req;

use App\Models\Post;
use Illuminate\Http\Request;

class RequestToPostReqConverter
{
    /**
     * @param Request $request
     * @return Post
     */
    public function convert(Request $request) {
        $to = new Post();
        // TODO convert properties here
        $to->denotation =  $request->get('denotation');
        $to->description = $request->get('description');
        return $to;
    }
}
