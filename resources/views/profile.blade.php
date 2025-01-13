<x-layout heading="Profile">
    <div class="block text-lg font-medium text-gray-900 mb-2">Name: {{ $user->first_name ." ". $user->last_name }}</div>
    <div class="block text-lg font-medium text-gray-900 mb-2">Account Type: {{ $user->type }}</div>
    <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="block text-lg font-medium text-gray-900 mb-2">Edit Your Profile</h2>
        <form class="space-y-6" method="POST" action="/profile">
          @csrf
          @method('patch')
          <div class="flex items-center justify-between ">
              <div class="mt-2">
                <label for="first_name" class="block text-sm/6 font-medium text-gray-900 mb-2">First Name</label>
              <input type="first_name" name="first_name" value="{{ $user->first_name }}" id="first_name" autocomplete="first_name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <div class="mt-2">
                <label for="last_name" class="block text-sm/6 font-medium text-gray-900 mb-2">Last Name</label>
              <input type="last_name" name="last_name" value="{{ $user->last_name }}" id="last_name" autocomplete="last_name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>
    
          <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div class="mt-2">
              <input type="email" name="email" id="email" value="{{ $user->email }}" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>
          <div class="flex items-center mb-4">
              <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Account Type:</label>
              <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block ml-2 p-2.5">
                <option @if ($user->type == 'admin') selected @endif value="admin">Admin</option>
                <option @if ($user->type == 'guest') selected @endif value="guest">Guest</option>
              </select>
          </div>
    
          <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
          </div>
        </form>
        <div class="text-sm flex justify-center mt-2">
            <a href="/change_password" class="font-semibold text-indigo-600 hover:text-indigo-500">Change Password</a>
          </div>
    
        
      </div>
</x-layout>