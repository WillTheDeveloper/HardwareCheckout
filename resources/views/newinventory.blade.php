<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="mt-4 flex flex-col">

                    <!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
                    <form class="space-y-6" action="{{route('inventory.create')}}" method="post">
                        @csrf
                        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Item Information</h3>
                                    <p class="mt-1 text-sm text-gray-500">Enter the information for the new item being added.</p>
                                </div>
                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="item-name" class="block text-sm font-medium text-gray-700">Item name</label>
                                            <input type="text" name="item-name" id="item-name" autocomplete="item-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                            <input type="text" name="description" id="description" autocomplete="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="quantity" class="block text-sm font-medium text-gray-700">Total quantity available</label>
                                            <input type="text" name="quantity" id="quantity" autocomplete="quantity" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="image" class="block text-sm font-medium text-gray-700">Image URL</label>
                                            <input type="text" name="image" id="image" autocomplete="image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                            <select id="category" name="category" autocomplete="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach($categories as $c)
                                                    <option value="{{$c->id}}">{{$c->category}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6">
                                            <label for="collection" class="block text-sm font-medium text-gray-700">Collection location</label>
                                            <input type="text" name="collection" id="collection" autocomplete="collection" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>