<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->isAdministrator())
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Administrative Dashboard
                        <br />
                        <br />
                        &#10133;&nbsp;<a href="{{route("documents.create")}}">Upload a New Document</a>
                        <br />
                        <br />
                        &#10133;&nbsp;<a href="{{route("users.create")}}">Create a New User</a>
                        <br />
                        <br />
                        <i class="fa fa-user" style="font-size:20px;color:blue;"></i></i>&nbsp;&nbsp;<a href="{{route("users.index")}}">Manage Users</a>
                        <br />
                        <br />
                    </div>
                </div>
            </div>
        </div>
    @endif

</x-app-layout>
