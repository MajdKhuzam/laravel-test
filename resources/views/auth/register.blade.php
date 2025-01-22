<x-layout heading="Register">
    <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <h2 class="mt-4 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Register your account</h2>
        </div>
        @if ($errors->any())
            <ul class="mt-4">
              @foreach ($errors->all() as $error)
                  <li class="mt-1 ml-2 text-xs text-red-500 flex justify-center items-center italic">{{ $error }}</li>
              @endforeach
            </ul>
        @endif
      
        <div class="mt-1 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" method="POST" action="/register">
            @csrf
            <div class="flex items-center justify-between ">
                <div class="mt-2">
                  <label for="first_name" class="block text-sm/6 font-medium text-gray-900 mb-2">First Name</label>
                <input type="first_name" name="first_name" id="first_name" autocomplete="first_name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
              <div class="mt-2">
                  <label for="last_name" class="block text-sm/6 font-medium text-gray-900 mb-2">Last Name</label>
                <input type="last_name" name="last_name" id="last_name" autocomplete="last_name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>
            <div>
              <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
              <div class="mt-2">
                <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
              </div>
              <div class="mt-2">
                <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>
            <div>
              <div class="flex items-center justify-between">
                <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">Repeat Password</label>
              </div>
              <div class="mt-2">
                <input type="password" name="password_confirmation" id="password_confirmation" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>
            <div class="flex items-center mb-4">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Account Type:</label>
                <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block ml-2 p-2.5">
                  <option value="admin">Admin</option>
                  <option selected value="guest">Guest</option>
                </select>
            </div>
      
            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
            </div>
          </form>
      
          
        </div>
      </div>
</x-layout>