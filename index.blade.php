<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New Post</a>
                </div>
                <div class="p-6">
                    @if ($posts->isEmpty())
                        <p>No posts found.</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($posts as $post)
                                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                    <div class="p-6">
                                        <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
                                        <p class="mt-2 text-gray-600">{{ $post->content }}</p>
                                    </div>
                                    <div class="p-6 bg-gray-100 border-t border-gray-200">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
