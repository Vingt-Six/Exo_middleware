<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Article') }}
            </h2>
            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 4)
                <a href="/article/create">Create</a>
            @endif
        </div>
    </x-slot>

    <!-- component -->
    <div class="flex justify-between flex-wrap mt-10 mx-20">
        @foreach ($articles as $article)
            <div class="flex flex-col bg-white px-8 py-6 w-96 rounded-lg shadow-lg">
                <div class="flex justify-center items-center">
                    <a class="px-2 py-1 bg-gray-600 text-sm text-green-100 rounded"
                        href="/article/{{ $article->id }}">Show</a>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <div class="flex items-center">
                        <img src="https://images.unsplash.com/photo-1502791451862-7bd8c1df43a7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                            class="w-8 h-8 object-cover rounded-full" alt="avatar">
                        <a class="text-gray-700 text-sm mx-3" href="#">{{ $article->author }}</a>
                    </div>
                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 4)
                        <a href="/article/{{ $article->id }}/edit" class="font-light text-sm text-green-600">Edit</a>
                        <form action="/article/{{ $article->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-light text-sm text-red-600">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
