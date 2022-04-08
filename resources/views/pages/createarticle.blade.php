<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Article') }}
        </h2>
    </x-slot>

    <!-- component -->
    <div class="grid min-h-screen place-items-center">
        <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12">
            <h1 class="text-xl font-semibold">Create a article</h1>
            <form class="mt-6" action="/article" method="POST">
                @csrf
                <div class="flex justify-between gap-3">
                    <span class="w-1/2">
                        <label for="firstname"
                            class="block text-xs font-semibold text-gray-600 uppercase">Author</label>
                        <input id="firstname" type="text" name="author" placeholder="John-Bertrand" autocomplete="given-name"
                            class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                            required />
                    </span>
                </div>
                <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Article</label>
                <textarea name="article" id="" cols="30" rows="5" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"></textarea>
                <button type="submit"
                    class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                    Add
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
