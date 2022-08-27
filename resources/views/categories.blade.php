<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="mt-4">
                        <a href="{{route('category.new')}}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">New category</a>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Category</th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Inventory items</th>
{{--                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Total requests</th>--}}
                                        <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Added</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($data as $d)
                                        <tr class="divide-x divide-gray-200">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6"><a href="{{route('category.view', $d->id)}}">{{$d->category}}</a></td>
                                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{$d->Inventory->count()}}</td>
{{--                                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">lol</td>--}}
                                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">{{$d->created_at->diffForHumans()}}</td>
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
</x-app-layout>