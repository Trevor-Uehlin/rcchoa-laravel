<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Documents') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    This is the list of HOA documents.
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding:10px;">

        @if(!empty($documents))
            @foreach($documents as $doc)
            <div>

                <h1>{{$doc->subject}}</h1>

                {!! Form::open(["method" => "POST", "action" => ["App\Http\Controllers\DocumentsController@show", $doc->id]]) !!}
                {!! Form::submit("Download", ["class" => "btn btn-primary"]) !!}
                {!! Form::close() !!}

            </div>

            <br />
            @endforeach
        @else
            <h2>No documents available</h2>
        @endif
    </div>

</x-app-layout>