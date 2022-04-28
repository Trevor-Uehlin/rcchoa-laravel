<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Documents') }}&nbsp;&bull;&nbsp;{{$message}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    

                    <form action="/documents/filtered" class="">
                        <div class="">
                            Category:
                            <select name="category" id="category" class="mt-1 w-15">
                                <option value="">show all</option>

                                @foreach($categories as $cat)
                                    <option value="{{$cat->category}}" @selected($cat->category == $selected)>
                                        {{$cat->category}}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </form>

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

                            <p>Uploaded - {{Carbon\Carbon::parse($doc->created_at)->format("l, F, Y")}}</p>
                            <p class="h4"><strong>{{$doc->title}}</strong></p>
                            <p>{{$doc->description}}</p>
                            <br /><br />
                            <a href="/download/{{$doc->id}}">{{$doc->name}}&nbsp;<i class="fa fa-download" style="font-size:20px;color:blue;"></i></a>
                            <p><strong>Category:</strong> {{$doc->category}}</p>


                            @if($user->isAdministrator())
                                <div class="row">
                                    <form action="{{route("documents.show", $doc->id)}}">
                                        @csrf
                                        <div class="flex items-center justify-end mt-4">
                                            <x-button class="ml-4">
                                                {{ __('Edit Document') }}
                                            </x-button>
                                        </div>
                                    </form>

                                    <form method="POST" class="delete-form" action="{{route("documents.destroy", $doc->id)}}">
                                        @csrf
                                        @method("DELETE")
                                        <div class="flex items-center justify-end mt-4">
                                            <x-button class="ml-4">
                                                {{ __('Delete Document') }}
                                            </x-button>
                                        </div>
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>