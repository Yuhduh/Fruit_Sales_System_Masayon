<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fruit Managements') }}
        </h2>
    </x-slot>

    <div class="p-6 m-6 gap-6 flex">
        <div class="flex-1 p-6 m-2 bg-white shadow-sm rounded-lg">
            <h1 class="text-2xl font-semibold mb-4 block">Add Fruits</h1>

            <form method="POST" action="{{ route('fruit.store')}}">
                @csrf
                <div>
                    <x-input-label>Fruit Name</x-input-label>
                    <x-text-input id="fruit_name" name="fruit_name" type="text" class="mt-1 block w-full mb-4" placeholder="e.g., Mango, Orange" required autofocus />
                </div>

                <div>
                    <x-input-label>Category</x-input-label>
                    <x-text-input id="category" name="category" type="text" class="mt-1 block w-full mb-4" placeholder="e.g., Tropical, Citrus" required autofocus />
                </div>

                <div>
                    <x-input-label>Price</x-input-label>
                    <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full mb-4" placeholder="e.g., 1.99" required autofocus/>
                </div>

                <div>
                    <x-input-label>Stock Quantity</x-input-label>
                    <x-text-input id="stock_quantity" name="stock_quantity" type="number" step="1" class="mt-1 block w-full mb-4" placeholder="e.g., 10" required autofocus/>
                </div>

                <div>
                    <x-input-label>Description</x-input-label>
                    <textarea id="description" name="description" class="mt-1 block w-full mb-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="4" placeholder="e.g., Sweet and juicy..." required autofocus></textarea>
                </div>

                <div>
                    <x-input-label>Is Available</x-input-label>
                    <select id="is_available" name="is_available" class="mt-1 block w-full mb-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus>
                        <option value="">Select an option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <x-primary-button>Add Fruit</x-primary-button>
                </div>

            </form>


        </div>

        <div class="flex-1 p-6 m-2 bg-white shadow-sm rounded-lg">
            <h1 class="text-2xl font-semibold mb-4 block">Fruit List</h1>
            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Category</th>
                        <th class="border px-4 py-2">Price</th>
                        <th class="border px-4 py-2">Stock Quantity</th>
                        <th class="border px-4 py-2">Description</th>
                        <th class="border px-4 py-2">Is Available</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($fruit as $f)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{$f->id}}</td>
                        <td class="border px-4 py-2 text-center">{{$f->fruit_name}}</td>
                        <td class="border px-4 py-2 text-center">{{$f->category}}</td>
                        <td class="border px-4 py-2 text-center">{{$f->price}}</td>
                        <td class="border px-4 py-2 text-center">{{$f->stock_quantity}}</td>
                        <td class="border px-4 py-2 text-center">{{$f->description}}</td>
                        <td class="border px-4 py-2 text-center">{{$f->is_available}}</td>
                        <td class="border px-4 py-2">
                            <div class="flex gap-2">
                            <a href="{{route('fruit.edit', $f->id)}}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Edit</a>
                            <form action="{{route('fruit.destroy', $f->id)}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Delete</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
