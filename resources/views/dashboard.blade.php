<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl bg-white text-gray-800 leading-tight">
        
            <a href="{{ route('users.index') }}">Users management</a> <br>
            <a href="{{ route('roles.index') }}">Roles management</a> <br>
            <a href="{{ route('products.index') }}">Jobs management</a>
                
    </h2>
</x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in! now congratulations for implementing auto deployment  ") }}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
