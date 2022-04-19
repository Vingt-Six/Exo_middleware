<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <!-- component -->
    <!-- Create by joker banny -->
    <div class="h-screen bg-indigo-100 flex justify-center items-center">
        <div class="lg:w-2/5 md:w-1/2 w-2/3">
            <form class="bg-white p-10 rounded-lg shadow-lg min-w-full" action="/user/{{ $edit->id }}/update" method="POST">
                @csrf
                @method('PUT')
                <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Edit user</h1>
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="username">Name</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="name"
                        id="username" value="{{ $edit->name }}" />
                </div>
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="email">Email</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="email"
                        id="email" value="{{$edit->email}}" />
                </div>
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="password">Password</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                        name="password" id="password" value="{{$edit->password}}" />
                </div>
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="password">Rôle</label>
                    <select name="role_id" class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if ($edit->role_id == $role->id) ? selected : null @endif>{{ $role->role }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Register</button>
            </form>
        </div>
    </div>
</x-app-layout>
