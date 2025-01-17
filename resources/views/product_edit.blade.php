<x-layout heading="Product Edit">

    <div class="block text-lg font-medium text-gray-900 mb-2">Name: {{ $product->product }}</div>
    <div class="block text-lg font-medium text-gray-900 mb-2">Price: ${{ $product->price }}</div>
    <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="block text-lg font-medium text-gray-900 mb-2">Edit Product:</h2>
        <div>
          <img class="p-8 rounded-t-lg" src={{ asset($product->image) }} alt="product image">
        </div>
        <form class="space-y-6" method="POST" action="/products/{{ $product->id }}/edit" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="flex items-center justify-between">
              <div class="mt-2">
                <label for="product" class="block text-sm/6 font-medium text-gray-900 mb-2">Product Name</label>
              <input type="text" name="product" value="{{ $product->product }}" id="product" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <div class="mt-2">
                <label for="price" class="block text-sm/6 font-medium text-gray-900 mb-2">Product Price</label>
              <input type="text" name="price" value="{{ $product->price }}" id="price" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900" for="image_input">Upload Image</label>
            <input name="image" class="p-2 block w-auto text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image_input" type="file" accept="image/png, image/jpeg">
          </div>
          <div class="flex justify-between items-baseline">
            <button form="delete-form" class="flex w-auto justify-center rounded-md px-3 py-1.5 text-sm/6 font-semibold text-red-600 shadow-sm">Delete</button>    

            <button type="submit" class="flex w-auto justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>
          </div>
        </form>
        
            <form method="POST" action="/products/{{ $product->id }}/edit" id="delete-form" class="hidden">
                @csrf
                @method('delete')
            </form>
      </div>

</x-layout>