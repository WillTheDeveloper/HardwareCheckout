<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User details: ' . $data->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mt-5 border-t border-gray-200">
                <dl class="divide-y divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Full name</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <span class="flex-grow">{{$data->name}}</span>
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Is an admin?</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            @switch($data->is_admin)
                                @case(1)
                                    <span class="flex-grow">Yes</span>
                                    <form method="post" action="{{route('users.admin.disable', $data->id)}}">
                                        @csrf
                                        <span class="ml-4 flex-shrink-0">
                                          <button type="submit" class=" rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Deactivate</button>
                                        </span>
                                    </form>
                                    @break(1)
                                @case(0)
                                    <span class="flex-grow">No</span>
                                    <form method="post" action="{{route('users.admin.enable', $data->id)}}">
                                        @csrf
                                        <span class="ml-4 flex-shrink-0">
                                          <button type="submit" class=" rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Activate</button>
                                        </span>
                                    </form>
                                @break(0)
                            @endswitch

                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Email address</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <span class="flex-grow">{{$data->email}}</span>
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Currently borrowing</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                @foreach($data->Request()->where('status', 'ACTIVE')->get('*') as $r)
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <!-- Heroicon name: solid/paper-clip -->
                                        <span class="ml-2 flex-1 w-0 truncate"> {{$r->Inventory->name}} </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0 flex space-x-4">
                                        <a href="{{route('requests.properties', $r->id)}}" class=" rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Manage</a>
                                    </div>
                                </li>
                                @endforeach()
                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>

        </div>
    </div>
</x-app-layout>