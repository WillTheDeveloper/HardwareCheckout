<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-white">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Quantity</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Request</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">

                                @foreach($cat as $c)
                                <tr class="border-t border-gray-200">
                                    <th colspan="5" scope="colgroup" class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">{{$c->category}}</th>
                                </tr>

                                @foreach($c->Inventory as $i)
                                <tr class="border-t border-gray-300">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$i->name}}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$i->description}}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$i->quantity}}</td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <form method="post" action="{{route('inventory.request', $i->id)}}">
                                            @csrf
                                            <button type="submit" class="text-indigo-600 hover:text-indigo-900">Request</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach



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