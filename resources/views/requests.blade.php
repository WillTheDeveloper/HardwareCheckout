<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Item</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Notes</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Quantity</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($data as $d)
                                    <tr>
                                        <td class="py-4 pl-4 pr-3 text-sm sm:pl-6">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 flex-shrink-0">
                                                    <img class="h-10 w-10 rounded-full" src="{{$d->Inventory->image_url}}" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{$d->Inventory->name}}</div>
                                                    <div class="text-gray-500">{{$d->Inventory->description}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <div class="text-gray-500">{{$d->note}}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            @switch($d->status)
                                                @case("ACTIVE")
                                                    <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Active</span>
                                                    @break("ACTIVE")
                                                @case("PENDING")
                                                    <span class="inline-flex rounded-full bg-orange-100 px-2 text-xs font-semibold leading-5 text-orange-800">Pending</span>
                                                    @break("PENDING")
                                                @case("DECLINED")
                                                    <span class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">Declined</span>
                                                    @break("DECLINED")
                                                @case("LATE")
                                                    <span class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">Late</span>
                                                    @break("LATE")
                                                @case("ACCEPTED")
                                                    <span class="inline-flex rounded-full bg-purple-100 px-2 text-xs font-semibold leading-5 text-purple-800">Accepted</span>
                                                @break("ACCEPTED")
                                                @case("RETURNED")
                                                    <span class="inline-flex rounded-full bg-blue-100 px-2 text-xs font-semibold leading-5 text-blue-800">Returned</span>
                                                @break("RETURNED")
                                            @endswitch
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$d->quantity}}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            @if($d->status != "ACCEPTED")
                                                <a href="{{route('requests.properties', $d->id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            @else
                                                <p class="text-red-600">Activated upon collection</p>
                                            @endif
                                        </td>
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