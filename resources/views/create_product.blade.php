<x-layout heading="Create Product">
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" method="POST" action="/create_product">
          @csrf
          <div>
            <label for="product" class="block text-sm/6 font-medium text-gray-900">Product Name</label>
            <div class="mt-2">
              <input type="text" name="product" id="product" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>
    
          <div>
            <div class="flex items-center justify-between">
              <label for="price" class="block text-sm/6 font-medium text-gray-900">Price</label>
            </div>
            <div class="mt-2">
              <input type="text" name="price" id="price" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>
    
          <div class="flex justify-end">
            <button type="submit" class="flex w-auto justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Product</button>
          </div>
        </form>
      </div>
</x-layout>