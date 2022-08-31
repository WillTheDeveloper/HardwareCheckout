<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage ' . $item->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div>


                <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
                    <aside class="py-6 px-2 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3">
                        <nav class="space-y-1">
                            <!-- Current: "bg-gray-50 text-indigo-700 hover:text-indigo-700 hover:bg-white", Default: "text-gray-900 hover:text-gray-900 hover:bg-gray-50" -->
                            <a href="{{route('inventory.manage-id', $item->id)}}" class="bg-gray-50 text-indigo-700 hover:text-indigo-700 hover:bg-white group rounded-md px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
                                <!--
                                  Heroicon name: outline/user-circle

                                  Current: "text-indigo-500 group-hover:text-indigo-500", Default: "text-gray-400 group-hover:text-gray-500"
                                -->
                                <svg class="text-indigo-500 group-hover:text-indigo-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="truncate"> Item </span>
                            </a>

                            <a href="{{route('inventory.users-id', $item->id)}}" class="text-gray-900 hover:text-gray-900 hover:bg-gray-50 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                                <!-- Heroicon name: outline/user-group -->
                                <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="truncate"> Users </span>
                            </a>

                            <a href="{{route('inventory.history-id', $item->id)}}" class="text-gray-900 hover:text-gray-900 hover:bg-gray-50 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                                <!-- Heroicon name: outline/view-grid-add -->
                                <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                                </svg>
                                <span class="truncate"> History </span>
                            </a>
                        </nav>
                    </aside>

                    <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                        <form action="{{route('inventory.update', $item->id)}}" method="POST">
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                                    <div>
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">{{$item->name}}</h3>
                                        <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                                    </div>

                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="name" class="block text-sm font-medium text-gray-700"> Item </label>
                                            <div class="mt-1 rounded-md shadow-sm flex">
{{--                                                <span class="bg-gray-50 border border-r-0 border-gray-300 rounded-l-md px-3 inline-flex items-center text-gray-500 sm:text-sm"> workcation.com/ </span>--}}
                                                <input value="{{$item->name}}" type="text" name="name" id="name" autocomplete="name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                            </div>
                                        </div>

                                        <div class="col-span-3">
                                            <label for="description" class="block text-sm font-medium text-gray-700"> Description </label>
                                            <div class="mt-1">
                                                <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{$item->description}}</textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
                                        </div>

                                        <div>
                                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                            <select id="category" name="category" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                @foreach($categories as $c)
                                                    <option @selected(old('category', $c->id) == $c->id) value="{{$c->id}}">{{$c->category}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="image" class="block text-sm font-medium text-gray-700"> Image URL </label>
                                            <div class="mt-1 rounded-md shadow-sm flex">
                                                {{--                                                <span class="bg-gray-50 border border-r-0 border-gray-300 rounded-l-md px-3 inline-flex items-center text-gray-500 sm:text-sm"> workcation.com/ </span>--}}
                                                <input value="{{$item->image_url}}" type="text" name="image" id="image" autocomplete="image" placeholder="Nullable" class="focus:ring-indigo-500 focus:border-indigo-500 flex-grow block w-full min-w-0 rounded-md sm:text-sm border-gray-300">
                                            </div>
                                        </div>

                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="quantity" class="block text-sm font-medium text-gray-700"> Quantity </label>
                                            <div class="mt-1 rounded-md shadow-sm flex">
                                                {{--                                                <span class="bg-gray-50 border border-r-0 border-gray-300 rounded-l-md px-3 inline-flex items-center text-gray-500 sm:text-sm"> workcation.com/ </span>--}}
                                                <input value="{{$item->quantity}}" type="number" min="1" name="quantity" id="quantity" autocomplete="quantity" placeholder="xxx" class="focus:ring-indigo-500 focus:border-indigo-500 flex-grow block w-full min-w-0 rounded-md sm:text-sm border-gray-300">
                                            </div>
                                        </div>

                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="collection" class="block text-sm font-medium text-gray-700"> Collection location </label>
                                            <div class="mt-1 rounded-md shadow-sm flex">
                                                {{--                                                <span class="bg-gray-50 border border-r-0 border-gray-300 rounded-l-md px-3 inline-flex items-center text-gray-500 sm:text-sm"> workcation.com/ </span>--}}
                                                <input value="{{$item->collect_location}}" type="text" name="collection" id="collection" autocomplete="collection" class="focus:ring-indigo-500 focus:border-indigo-500 flex-grow block w-full min-w-0 rounded-md sm:text-sm border-gray-300">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>