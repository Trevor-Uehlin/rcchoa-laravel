<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Red Cedar Court Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    There are currently {{count($users)}} users.
                </div>
            </div>
        </div>
    </div>




    <div class="container" style="background-color:darkcyan">
        @foreach($users as $user)
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            @if($currentUser->isAdministrator())
                                <div class="float-right">
                                    <a href="{{route("users.show", $user->id)}}"><i class="fa fa-edit" style="font-size:40px;color:blue;"></i></a>
                                    <br />
                                    <a id="delete-button" href="users/delete/{{$user->id}}"><i class="fa fa-trash-o" style="font-size:40px;color:red;"></i></a>
                                </div>
                            @endif
                            <p>Created on {{Carbon\Carbon::parse($user->created_at)->format("l, F, Y")}}</p>
                            <p class="h4"><strong>{{$user->name}}</strong></p>
                            <p><strong>Email: </strong>{{$user->email}}</p>
                            <p><strong>User Type: </strong>{{$user->user_type}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    
    {{-- MOVE THIS!!!! --}}
    <script>

        document.getElementById("delete-button").addEventListener("click", function(e){
            console.log("fuck");
            if(!confirm("Are you sure you want to delete this user?")) {e.preventDefault()}
            else if(!confirm("Are you really sure you want to delete this user?")) {e.preventDefault()}
        });

    </script>

</x-app-layout>