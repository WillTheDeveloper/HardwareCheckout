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
        </div>
    </div>
</x-app-layout>
