<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDocumentRequest;
use App\Models\Document;

class DocumentsController extends Controller {

    public function index($docs = null) {

        $selected = !empty($docs) ? $docs[0]->category : "";

        $categories = DB::table("documents")->select("category")->whereNull("deleted_at")->distinct()->get()->all();

        sort($categories);

        $user = Auth::user();
        $documents = empty($docs) ? Document::latest()->get() : $docs;

        $message = empty($documents->toArray()) ? "No documents available." : "Showing " . count($documents) . " documents";
        
        return view("documents.index", compact("documents", "message", "user", "categories", "selected"));
    }

    public function showFiltered(Request $request){

        if($request["category"] == "") return $this->index();

        $filtered = Document::latest()->where("category", "=", $request["category"])->get();

        return $this->index($filtered);
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

        return redirect(route("documents"));
    }

    public function show($id) {

        $document = Document::findOrFail($id);

        return view("documents.edit", compact("document"));
    }

    public function edit($id) {
        
    }

    public function update(Request $request, $id) {

        $doc = Document::findOrFail($id);

        $params = $request->all();

        $file = $request->file("file");

        if(!empty($file)) {
            Storage::delete($doc->filepath);
            $path = $file->store("documents");
            $doc->name = $file->getClientOriginalName();
            $doc->filepath = $path;
        }

        $doc->title = $params["title"];
        $doc->description = $params["description"];
        $doc->category = $params["category"];
        $doc->user_id = Auth::user()->id;
        $doc->update();

        return $this->index();
    }

    public function destroy($id) {

        $doc = Document::findOrFail($id);

        $path = $doc->filepath;

        Storage::delete($doc->filepath);

        $doc->delete();

        return redirect(route("documents"));
    }
}
