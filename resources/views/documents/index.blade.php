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
                    {{$message}}
                </div>
            </div>
        </div>
    </div>
    
    <div class="container" style="background-color:darkcyan">
        @foreach($documents as $doc)
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <p><strong>Published:</strong> {{Carbon\Carbon::parse($doc->created_at)->format("l, F, Y")}}</p>
                            <p><strong>{{$doc->title}}</strong></p>
                            <p>{{$doc->description}}</p>
                            <a href="/download/{{$doc->id}}">{{$doc->name}}&nbsp;<i class="fa fa-download" style="font-size:20px;color:blue;"></i></a>
                            @if($user->isAdministrator())<a href="/document/delete/{{$doc->id}}"><i class="fa fa-trash-o" style="font-size:48px;color:red;float:right;"></i></a>@endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>