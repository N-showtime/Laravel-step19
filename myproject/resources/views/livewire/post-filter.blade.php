<div>
    <x-message :message="session('message')" />
    @foreach ($posts as $post)
        <div wire:key="post-{{ $post->id }}" class="mt-6 p-6 bg-white rounded-2xl shadow-md border border-gray-200">
            <p class="p-4 text-lg font-semibold">
                件名：
                <a href="{{ route('post.show', $post )}}" class="text-blue-600">
                    {{ $post->title }}
                </a>
            </p>
            <hr class="w-full">
            <p class="mt-4 p-4">
                {{ $post->body }}
            </p>
            <div class="flex justify-end p-4 text-sm font-semibold">
                <p>
                    {{ $post->created_at }} / {{ $post->user->name??'匿名' }}
                </p>
            </div>
        </div>
    @endforeach
</div>
