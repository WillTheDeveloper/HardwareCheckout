<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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
                                        <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">User ID</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Verified</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Requests</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Active</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Late</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Created</th>
                                        <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($data as $d)
                                        <tr>
                                            <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{$d->id}}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{$d->name}}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{$d->hasVerifiedEmail()}}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{$d->Request->count()}}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{$d->Request->where('status', 'ACTIVE')->count()}}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{$d->Request->where('status', 'LATE')->count()}}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{$d->created_at->diffForHumans()}}</td>
                                            <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="{{route('users.details', $d->id)}}" class="text-indigo-600 hover:text-indigo-900">Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- More transactions... -->
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