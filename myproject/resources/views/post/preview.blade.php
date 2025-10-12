<x-layouts.app>
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">プレビュー</h2>

        <div class="mt-6 p-4 border bg-gray-50 rounded">
            <h3 class="font-bold text-lg mb-2">{{ $title }}</h3>
            <p class="whitespace-pre-line">{{ $body }}</p>
        </div>

        <div class="flex gap-2 mt-4">
            <!-- 戻る -->
            <a href="{{ route('post.create') }}" class="bg-gray-300 px-4 py-2 rounded">戻る</a>


            <!-- 本送信 -->
            <form method="post" action="{{ route('post.store') }}">
                @csrf
                <input type="hidden" name="title" value="{{ $title }}">
                <input type="hidden" name="body" value="{{ $body }}">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">送信</button>
            </form>
        </div>
    </div>
</x-layouts.app>
