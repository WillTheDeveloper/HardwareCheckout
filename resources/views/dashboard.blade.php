<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                    <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Total requests</dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900">{{auth()->user()->Request()->count()}}</dd>
                    </div>

                    <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Active inventory</dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900">{{auth()->user()->Request()->where('status', 'ACTIVE')->count()}}</dd>
                    </div>

                    <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Late return rate (May affect future requests)</dt>
                        @if(auth()->user()->Request()->exists())
                            <dd class="mt-1 text-3xl font-semibold text-gray-900">{{auth()->user()->Request()->where('status', 'LATE')->count() / auth()->user()->Request()->count()  * 100}}%</dd>
                        @else
                            <dd class="mt-1 text-3xl font-semibold text-gray-900">N/A</dd>
                        @endif
                    </div>
                </dl>
            </div>

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center pt-6">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Currently borrowing</h1>
                    </div>
                </div>
                <div class="mt-2 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">Item</th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Quantity</th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Requested</th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Status</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                @foreach($requests as $r)
                                <tr>
                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">{{$r->Inventory->name}}</td>
                                    <td class="py-4 px-3 text-sm text-gray-500">{{$r->quantity}}</td>
                                    <td class="py-4 px-3 text-sm text-gray-500">{{$r->created_at->diffForHumans()}}</td>
                                    <td class="py-4 px-3 text-sm text-gray-500">{{$r->status}}</td>
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
</x-app-layout>
