<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All requests') }}
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
                                <table class="min-w-full">
                                    <thead class="bg-white">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Item</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">User</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Note</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Quantity</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                    <tr class="border-t border-gray-200">
                                        <th colspan="5" scope="colgroup" class="bg-purple-50 px-4 py-2 text-left text-sm font-semibold text-purple-900 sm:px-6">Accepted (Awaiting collection)</th>
                                    </tr>

                                    @foreach($accepted as $q)
                                        <tr class="border-t border-gray-300">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$q->Inventory->name}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$q->User->name}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$q->note}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$q->quantity}}</td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                                                <form method="post" action="{{route('requests.activate', $q->id)}}">
                                                    @csrf
                                                    <button type="submit" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Collected</button>
                                                </form>
                                                <form method="post" action="{{route('requests.cancel', $q->id)}}">
                                                    @csrf
                                                    <button type="submit" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Cancelled</button>
                                                </form>
                                                <a href="{{route('requests.overview', $q->id)}}" class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Edit</a>
                                            </span>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr class="border-t border-gray-200">
                                        <th colspan="5" scope="colgroup" class="bg-red-50 px-4 py-2 text-left text-sm font-semibold text-red-900 sm:px-6">Late</th>
                                    </tr>

                                    @foreach($late as $l)
                                        <tr class="border-t border-gray-300">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$l->Inventory->name}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$l->User->name}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$l->note}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$l->quantity}}</td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                                                <form method="post" action="{{route('requests.returned', $l->id)}}">
                                                    @csrf
                                                    <button type="submit" class="relative inline-flex items-center px-4 py-2 rounded-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Returned</button>
                                                </form>
                                            </span>
                                            </td>
                                        </tr>
                                    @endforeach


                                    <tr class="border-t border-gray-200">
                                        <th colspan="5" scope="colgroup" class="bg-green-50 px-4 py-2 text-left text-sm font-semibold text-green-900 sm:px-6">Active</th>
                                    </tr>

                                    @foreach($active as $a)
                                    <tr class="border-t border-gray-300">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$a->Inventory->name}}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$a->User->name}}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$a->note}}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$a->quantity}}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <span class="relative z-0 inline-flex shadow-sm rounded-md">
                                                <form method="post" action="{{route('requests.returned', $a->id)}}">
                                                    @csrf
                                                    <button type="submit" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Returned</button>
                                                </form>
                                                <form method="post" action="{{route('requests.late', $a->id)}}">
                                                    @csrf
                                                    <button type="submit" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Late</button>
                                                </form>
                                                <a href="{{route('requests.overview', $a->id)}}" class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Edit</a>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach


                                    <tr class="border-t border-gray-200">
                                        <th colspan="5" scope="colgroup" class="bg-amber-50 px-4 py-2 text-left text-sm font-semibold text-amber-900 sm:px-6">Pending</th>
                                    </tr>

                                    @foreach($pending as $p)
                                    <tr class="border-t border-gray-200">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$p->Inventory->name}}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$p->User->name}}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$p->note}}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$p->quantity}}</td>
                                        <td class="relative whitespace-nowrap text-sm font-medium">
{{--                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
                                            <span class="relative z-0 inline-flex shadow-sm rounded-md">
                                                <form method="post" action="{{route('requests.approve', $p->id)}}">
                                                    @csrf
                                                    <button type="submit" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Approve</button>
                                                </form>
                                                <form method="post" action="{{route('requests.reject', $p->id)}}">
                                                    @csrf
                                                    <button type="submit" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Deny</button>
                                                </form>
                                                <a href="{{route('requests.overview', $p->id)}}" class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Edit</a>
                                            </span>
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