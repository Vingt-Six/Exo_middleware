<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <!-- component -->
<section id="contact" class="relative w-full mt-20 text-red-500">
    
    <!-- wrapper -->
    <div class="relative p-5 lg:px-20 flex flex-col md:flex-row items-center justify-center">
    
        <!-- Contact Me -->
        <form action="/contact" class="w-full md:w-1/2 border border-red-500 p-6 bg-gray-900 rounded-xl" method="POST">
            @csrf
        <h2 class="text-2xl pb-3 font-semibold">
            Send Message
        </h2>
        <div>
            <div class="flex flex-col mb-3">
            <label for="email">Email</label>
            <input 
                type="text" id="email" name="email"
                class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-red-500 focus:outline-none focus:bg-gray-800 focus:text-red-500"
                autocomplete="off"
            >
            </div>

            <div class="flex flex-col mb-3">
            <label for="subject">Subject</label>
            <select name="subject_id" class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-red-500 focus:outline-none focus:bg-gray-800 focus:text-red-500">
                <option selected>Select a subject</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject -> id }}">{{ $subject -> subject }}</option>
                @endforeach
            </select>
            </div>

            <div class="flex flex-col mb-3">
            <label for="message">Message</label>
            <textarea 
                rows="4" id="message" name="text"
                class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-red-500 focus:outline-none focus:bg-gray-800 focus:text-red-500"
            ></textarea>
            </div>
        </div>

        <div class="w-full pt-3">
            <button type="submit" class="w-full bg-gray-900 border border-red-500 px-4 py-2 transition duration-50 focus:outline-none font-semibold hover:bg-red-500 hover:text-white text-xl cursor-pointer">
            Send
            </button>
        </div>
        </form>
    </div>
    </section>
</x-app-layout>