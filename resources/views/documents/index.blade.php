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
                            @if($user->isAdministrator())
                                <div class="float-right">
                                    <a href="{{route("documents.show", $doc->id)}}"><i class="fa fa-edit" style="font-size:40px;color:blue;"></i></a>
                                    <br />
                                    <a id="delete-button" href="/document/delete/{{$doc->id}}"><i class="fa fa-trash-o" style="font-size:40px;color:red;"></i></a>
                                </div>
                            @endif
                            <p>Uploaded - {{Carbon\Carbon::parse($doc->created_at)->format("l, F, Y")}}</p>
                            <p class="h4"><strong>{{$doc->title}}</strong></p>
                            <p>{{$doc->description}}</p>
                            <br /><br />
                            <a href="/download/{{$doc->id}}">{{$doc->name}}&nbsp;<i class="fa fa-download" style="font-size:20px;color:blue;"></i></a>
                            <p><strong>Category:</strong> {{$doc->category}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    
    {{-- MOVE THIS!!!! --}}
    <script>
        
        document.getElementById("category").addEventListener("change", function(){this.form.submit();});

        document.getElementById("delete-button").addEventListener("click", function(e){
            if(confirm("Are you sure you want to delete this document?")) {}
            if(confirm("Are you really sure you want to delete this document?")) {}
        });

    </script>

</x-app-layout>