<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends BaseController
{
    public function index(Request $request)
    {
        $per_page = $request->get('perPage');
        if (!empty($per_page)) {
            $authors = Author::paginate($per_page);
        } else {
            $authors = Author::all();
        }

        return $this->sendResponse($authors->toArray(), 'Authors retrieved successfully.');
    }

    public function show($id)
    {
        $author = Author::find($id);
        if (is_null($author)) {
            return $this->sendError('Author not found.');
        }
        return $this->sendResponse($author->toArray(), 'Author retrieved successfully.');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return $this->sendResponse($author->toArray(), 'Author deleted successfully.');
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $author->edit($request->all());
        return $this->sendResponse($author->toArray(), 'Author updated successfully.');

    }

    public function store(AuthorRequest $request)
    {
        $author = Author::add($request->all());
        return $this->sendResponse($author->toArray(), 'Author added successfully.');

    }
}
