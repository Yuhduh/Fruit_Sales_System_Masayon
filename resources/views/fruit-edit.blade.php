<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fruit Managements') }}
        </h2>
    </x-slot>

    <div class="p-6 m-6 gap-6 flex">
        <div class="flex-1 p-6 m-2 bg-white shadow-sm rounded-lg">
            <h1 class="text-2xl font-semibold mb-4 block">Edit Fruit</h1>

            <form method="POST" action="{{ route('fruit.update', $fruit->id)}}">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label>Fruit Name</x-input-label>
                    <x-text-input id="fruit_name" name="fruit_name" type="text" class="mt-1 block w-full mb-4" placeholder="e.g., Mango, Orange" value="{{$fruit->fruit_name}}" required autofocus />
                </div>

                <div>
                    <x-input-label>Category</x-input-label>
                    <x-text-input id="category" name="category" type="text" class="mt-1 block w-full mb-4" placeholder="e.g., Tropical, Citrus" value="{{$fruit->category}}" required autofocus />
                </div>

                <div>
                    <x-input-label>Price</x-input-label>
                    <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full mb-4" placeholder="e.g., 1.99" value="{{$fruit->price}}" required autofocus/>
                </div>

                <div>
                    <x-input-label>Stock Quantity</x-input-label>
                    <x-text-input id="stock_quantity" name="stock_quantity" type="number" step="1" class="mt-1 block w-full mb-4" placeholder="e.g., 10" value="{{$fruit->stock_quantity}}" required autofocus/>
                </div>

                <div>
                    <x-input-label>Description</x-input-label>
                    <textarea id="description" name="description" class="mt-1 block w-full mb-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="4" placeholder="e.g., Sweet and juicy..." value="{{$fruit->description}}" required autofocus></textarea>
                </div>

                <div>
                    <x-input-label>Is Available</x-input-label>
                    <select id="is_available" name="is_available" class="mt-1 block w-full mb-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus>
                        <option value="">Select an option</option>
                        <option value="Yes" {{$fruit->is_available == "Yes" ? 'selected' : ""}}>Yes</option>
                        <option value="No" {{$fruit->is_available == "No" ? 'selected' : ""}}>No</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('fruit') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 me-2">
                        Cancel
                    </a>
                    <x-primary-button>Update Fruit</x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
