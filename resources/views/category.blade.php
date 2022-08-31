<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage ' . $data->category . ' category') }}
        </h2>
    </x-slot>

    @if(session()->has('success'))
        <div x-data="{flash: true}">
            <div aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6" x-show="flash">
                <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
                    <!--
                      Notification panel, dynamically insert this into the live region when it needs to be displayed

                      Entering: "transform ease-out duration-300 transition"
                        From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                        To: "translate-y-0 opacity-100 sm:translate-x-0"
                      Leaving: "transition ease-in duration-100"
                        From: "opacity-100"
                        To: "opacity-0"
                    -->
                    <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: outline/check-circle -->
                                    <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-sm font-medium text-gray-900">Successfully saved!</p>
                                    <p class="mt-1 text-sm text-gray-500">Operation was successful.</p>
                                </div>
                                <div class="ml-4 flex flex-shrink-0">
                                    <button x-on:click="flash = false" type="button" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        <span class="sr-only">Close</span>
                                        <!-- Heroicon name: mini/x-mark -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div>
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Basic information</h3>
                                <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <form action="#" method="POST">
                                <div class="shadow sm:overflow-hidden sm:rounded-md">
                                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="name" id="name" class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="{{$data->category}}" value="{{$data->category}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                                            <div class="mt-1">
                                                <textarea id="about" name="about" rows="3" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="you@example.com"></textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
                                        </div>
                                    <div class="px-4 text-right sm:px-3">
                                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Associated items</h3>
                                <p class="mt-1 text-sm text-gray-600">All the items that fall under this category</p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                                <div class="overflow-hidden shadow sm:rounded-md">
                                    <div class="bg-white">

                                        <!-- This example requires Tailwind CSS v2.0+ -->
                                        <div>
                                            <div class="flex flex-col">
                                                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                                            <table class="min-w-full divide-y divide-gray-300">
                                                                <thead class="bg-gray-50">
                                                                <tr>
                                                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Quantity</th>
                                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Collection point</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody class="divide-y divide-gray-200 bg-white">
                                                                @foreach($data->Inventory as $i)
                                                                <tr>
                                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><a href="{{route('inventory.manage-id', $i->id)}}">{{$i->name}}</a></td>
                                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$i->quantity}}</td>
                                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$i->description}}</td>
                                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$i->collect_location}}</td>
                                                                </tr>
                                                                @endforeach

                                                                <!-- More people... -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>

                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Manage category</h3>
                                <p class="mt-1 text-sm text-gray-600">Decide which communications you'd like to receive and how.</p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                                <div class="overflow-hidden shadow sm:rounded-md">
                                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                        <fieldset>
                                            <legend class="sr-only">Associated item actions</legend>
                                            <div class="text-base font-medium text-gray-900" aria-hidden="true">Associated item actions</div>
                                            <p class="text-sm text-gray-500">These actions only affect the items listed above and <b>not</b> this category.</p>
                                            <div class="mt-4 space-y-4">
                                                <!-- This example requires Tailwind CSS v2.0+ -->
                                                <span class="relative z-0 inline-flex rounded-md shadow-sm">
                                                    <a href="{{route('categories-id.reassign', $data->id)}}" class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">Reassign</a>
                                                    <form action="{{route('categories.delete.all', $data->id)}}" method="post">
                                                        @csrf
                                                        <button type="submit" class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">Delete all</button>
                                                    </form>
                                                </span>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend class="contents text-base font-medium text-gray-900">Delete Category</legend>
                                            <p class="text-sm text-gray-500">This action can not be undone.</p>

                                            <div class="p-4">
                                                <div class="rounded-md bg-yellow-50 p-4">
                                                    <div class="flex">
                                                        <div class="flex-shrink-0">
                                                            <!-- Heroicon name: mini/exclamation-triangle -->
                                                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M8.485 3.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 3.495zM10 6a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 6zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        <div class="ml-3">
                                                            <h3 class="text-sm font-medium text-yellow-800">Action required</h3>
                                                            <div class="mt-2 text-sm text-yellow-700">
                                                                <p>In order to delete the category, you are required to either reallocate the items to another category or truncate/delete all the associated data of the category along with the category itself.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4 space-y-4">
                                                <span class="relative z-0 inline-flex rounded-md shadow-sm">
                                                  <button type="button" class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">Delete Category</button>
                                                  <button type="button" class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">Delete Category and Items</button>
                                                </span>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>