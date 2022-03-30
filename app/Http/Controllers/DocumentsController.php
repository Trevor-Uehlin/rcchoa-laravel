<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Document;

class DocumentsController extends Controller {

    public function index() {

        $user = Auth::user();
        $documents = Document::latest()->get();

        $message = empty($documents->toArray()) ? "No documents available." : "This is the list of HOA documents.";
        
        return view("documents.index", compact("documents", "message", "user"));
    }

    public function create() {

        return view("documents.create");
    }

    public function store(Request $request){
        
        $params = $request->all();

        $file = $request->file("file");
        
        $path = $file->store("documents");

        $doc = new Document();
        $doc->name = $file->getClientOriginalName();
        $doc->title = $params["title"];
        $doc->description = $params["description"];
        $doc->category = $params["category"];
        $doc->filepath = $path;
        $doc->user_id = Auth::user()->id;
        $doc->save();

        return $this->index();
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id) {

        $doc = Document::findOrFail($id);

        $path = $doc->filepath;

        Storage::delete($doc->filepath);

        $doc->delete();

        return $this->index();
    }
}
