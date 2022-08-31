<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage request for '. $request->Inventory->name). " (x" . $request->quantity . ")" }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div>



                <div class="mt-10 sm:mt-0">


                    @if($request->status == ['PENDING', 'ACCEPTED'])
                        <div class="pb-5">
                            <div class="rounded-md bg-blue-50 p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: mini/information-circle -->
                                        <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M19 10.5a8.5 8.5 0 11-17 0 8.5 8.5 0 0117 0zM8.25 9.75A.75.75 0 019 9h.253a1.75 1.75 0 011.709 2.13l-.46 2.066a.25.25 0 00.245.304H11a.75.75 0 010 1.5h-.253a1.75 1.75 0 01-1.709-2.13l.46-2.066a.25.25 0 00-.245-.304H9a.75.75 0 01-.75-.75zM10 7a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3 flex-1 md:flex md:justify-between">
                                        <p class="text-sm text-blue-700">An email will be sent to "{{$request->User->email}}" when the status is changed.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($request->status == 'LATE')
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
                                            <p>Please can you return this item back to "{{$request->Inventory->collect_location}}" as soon as possible.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif


                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Request information</h3>
                                <p class="mt-1 text-sm text-gray-600">Manage request information and adjust things.</p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <form action="{{route('requests.update', $request->id)}}" method="POST">
                                @csrf
                                <div class="overflow-hidden shadow sm:rounded-md">
                                    <div class="bg-white px-4 py-5 sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="name" class="block text-sm font-medium text-gray-700">Item name</label>
                                                <input type="text" name="name" id="name" autocomplete="name" disabled value="{{$request->Inventory->name}}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                                <input type="number" name="quantity" id="quantity" min="1" max="{{$request->Inventory->quantity}}" autocomplete="quantity" value="{{$request->quantity}}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>

                                            <div class="col-span-6">
                                                <label for="note" class="block text-sm font-medium text-gray-700">Notes</label>
                                                <input type="text" name="note" id="note" autocomplete="note" value="{{$request->note}}" placeholder="Enter any additional information" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                                <input type="text" name="category" id="category" autocomplete="category" value="{{$request->Inventory->Category->category}}" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                                <input type="text" name="status" id="status" autocomplete="status" value="{{$request->status}}" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="requested" class="block text-sm font-medium text-gray-700">Requested</label>
                                                <input type="text" name="requested" id="requested" autocomplete="requested" disabled value="{{$request->created_at->diffForHumans()}}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                        </div>
                                    </div>
                                    @if($request->status == 'PENDING' or 'ACTIVE')
                                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>