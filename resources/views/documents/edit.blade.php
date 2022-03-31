@php $name = Auth::user()->name; @endphp


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit an Existing Document') }}
        </h2>
    </x-slot>

    <br />
    
    <div class="container">
        {!! Form::open(["method" => "PATCH", "action" => ["App\Http\Controllers\DocumentsController@update", $document->id], "class" => "p-form", "files" => true]) !!}
    
    
        <div class="form-group">
            {!! Form::label("title", "Title") !!}
            {!! Form::text("title", $document->title, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("description", "Description") !!}
            {!! Form::text("description", $document->description, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("category", "Category") !!}
            {!! Form::text("category", $document->category, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            <p><strong>Current File: </strong>{{$document->name}}</p>
        </div>

        
    
    
        <div class="form-group">
        
            {!! Form::submit("Submit Changes", ["class" => "btn btn-primary bg-dark"]) !!}

            {!! Form::button("Change File", ["id" => "show-upload", "class" => "btn btn-primary bg-dark"]) !!}

            {!! Form::file("file", ["class" => "hidden"]) !!}
        
            {!! Form::close() !!}
        
        </div>


        <script>
            document.getElementById("show-upload").addEventListener("click", function(){
                document.querySelectorAll("input[type=file]")[0].classList.toggle("hidden");
            });
        </script>
    
        @if(count($errors) > 0)
        <div class="alert-danger alert">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif
    </div>
</x-app-layout>