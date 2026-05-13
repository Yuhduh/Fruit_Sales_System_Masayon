<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fruit Reports') }}
        </h2>
    </x-slot>

    <div class="p-6 space-y-6">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <form method="GET" action="{{ route('fruit.report') }}" class="grid gap-4 md:grid-cols-3">
                <div>
                    <x-input-label>Category</x-input-label>
                    <select name="category" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" @selected(request('category') === $category)>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-input-label>Availability</x-input-label>
                    <select name="availability" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="">All</option>
                        <option value="Yes" @selected(request('availability') === 'Yes')>Yes</option>
                        <option value="No" @selected(request('availability') === 'No')>No</option>
                    </select>
                </div>

                <div class="flex items-end gap-2">
                    <x-primary-button>Filter</x-primary-button>
                    <a href="{{ route('fruit.report') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 transition ease-in-out duration-150">Reset</a>
                </div>
            </form>

            <div class="mt-4 flex gap-2">
                <a href="{{ route('fruit.report.pdf', request()->query()) }}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 transition ease-in-out duration-150">Export PDF</a>
                <a href="{{ route('fruit.report.excel', request()->query()) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 transition ease-in-out duration-150">Export Excel</a>
            </div>
        </div>

        <div class="bg-white shadow-sm rounded-lg p-6 overflow-x-auto">
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Category</th>
                        <th class="border px-4 py-2">Price</th>
                        <th class="border px-4 py-2">Stock Quantity</th>
                        <th class="border px-4 py-2">Availability</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fruits as $fruit)
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $fruit->id }}</td>
                            <td class="border px-4 py-2 text-center">{{ $fruit->fruit_name }}</td>
                            <td class="border px-4 py-2 text-center">{{ $fruit->category }}</td>
                            <td class="border px-4 py-2 text-center">{{ $fruit->price }}</td>
                            <td class="border px-4 py-2 text-center">{{ $fruit->stock_quantity }}</td>
                            <td class="border px-4 py-2 text-center">{{ $fruit->is_available }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="6">No fruit records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>