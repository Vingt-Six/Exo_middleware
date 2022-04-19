<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <!-- component -->
    <div class="container mx-auto">

        <table class="text-left w-full">
            <thead class="bg-teal-500 flex text-white w-full">
                <tr class="flex w-full mb-4">
                    <th class="p-4 w-1/4">Name</th>
                    <th class="p-4 w-1/4">Role</th>
                    <th class="p-4 w-1/4"></th>
                    <th class="p-4 w-1/4"></th>
                </tr>
            </thead>
            <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
            <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full"
                style="height: 50vh;">
                @foreach ($users as $item)
                    <tr class="flex w-full mb-4">
                        <td class="p-4 w-1/4">{{ $item->name }}</td>
                        <td class="p-4 w-1/4">{{ $item->role->role }}</td>
                        @can('user-admin', $item)
                            <td class="p-4 w-1/4">
                                <a href="/user/{{ $item->id }}/edit"
                                    class="text-emerald-400 hover:text-emerald-700">Edit</a>
                            </td>
                            <td class="p-4 w-1/4">
                                <form action="/user/delete/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
