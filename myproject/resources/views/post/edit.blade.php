<x-layouts.app>

       <div class="max-w-7xl mx-auto px-6">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                フォーム
            </h2>
            @if (session('message'))
                <div class="text-red-600 font-bold">
                     {{ session('message') }}
                </div>
            @endif
        <form method="post" action="{{ route('post.update', $post) }}">
            @csrf
            @method('patch')
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">件名</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <input type="text" name="title" class="w-atou p-2 border border-gray-300 rounded-md" id="title" value="{{ old('title', $post->title) }}">

                      <!-- 件名文字数 -->
                    <p id="title-count" class="text-sm text-gray-500 mt-1 text-right"></p>
                </div>
                <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold mt-4">本文</label>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    <textarea name="body" class="w-auto p-2 border border-gray-300 rounded-md" id="body" cols="30" rows="8" >{{ old('body', $post->body) }}</textarea>

                     <!-- 本文文字数 -->
                    <p id="body-count" class="text-sm text-gray-500 mt-1 text-right"></p>
                </div>
                <flux:button variant="primary" type="submit" class="w-full mt-4 cursor-pointer">送信する</flux:button>
            </div>
        </form>
       </div>

<script>
    const titleInput = document.getElementById('title');
    const bodyInput = document.getElementById('body');
    const titleCount = document.getElementById('title-count');
    const bodyCount = document.getElementById('body-count');

    // 🔹 初期文字数を表示
    titleCount.textContent = titleInput.value.length + '文字(上限：20字)';
    bodyCount.textContent = bodyInput.value.length + '文字(上限：400字)';

    // 件名文字数
    titleInput.addEventListener('input', () => {
        titleCount.textContent = titleInput.value.length + '文字(上限：20字)';
    });

    // 本文文字数
    bodyInput.addEventListener('input', () => {
        bodyCount.textContent = bodyInput.value.length + '文字(上限：400字)';
    });
</script>

</x-layouts.app>
