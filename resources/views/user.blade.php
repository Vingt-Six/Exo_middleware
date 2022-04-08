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
                </tr>
            </thead>
            <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
            <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full"
                style="height: 50vh;">
                @foreach ($users as $user)
                    <tr class="flex w-full mb-4">
                        <td class="p-4 w-1/4">{{ $user->name }}</td>
                        <td class="p-4 w-1/4">{{ $user->role->role }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
