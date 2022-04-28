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

                            <p>Created on {{Carbon\Carbon::parse($user->created_at)->format("l, F, Y")}}</p>
                            <p class="h4"><strong>{{$user->name}}</strong></p>
                            <p><strong>Email: </strong>{{$user->email}}</p>
                            <p><strong>User Type: </strong>{{$user->user_type}}</p>


                            @if($currentUser->isAdministrator())
                                <div class="row">
                                    <form action="{{route("users.show", $user->id)}}">
                                        @csrf
                                        <div class="flex items-center justify-end mt-4">
                                            <x-button class="ml-4">
                                                {{ __('Edit User') }}
                                            </x-button>
                                        </div>
                                    </form>

                                    <form method="POST" class="delete-form" action="{{route("users.destroy", $user->id)}}">
                                        @csrf
                                        @method("DELETE")
                                        <div class="flex items-center justify-end mt-4">
                                            <x-button class="ml-4">
                                                {{ __('Delete User') }}
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