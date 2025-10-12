<x-layouts.app>

    <div class="max-w-7xl mx-auto px-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">フォーム</h2>
        <x-message :message="session('message')" />

        {{--  保存フォーム（post.store） --}}
        <form method="post" action="{{ route('post.store') }}" id="save-form">
            @csrf
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">件名</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <input type="text" name="title" class="w-atou p-2 border border-gray-300 rounded-md" id="title" value="{{ old('title') }}">

                    <p id="title-count" class="text-sm text-gray-500 mt-1 text-right">0文字(上限：20字)</p>
                </div>

                <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold mt-4">本文</label>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    <textarea name="body" class="w-auto p-2 border border-gray-300 rounded-md" id="body" cols="30" rows="8">{{ old('body') }}</textarea>

                    <p id="body-count" class="text-sm text-gray-500 mt-1 text-right">0文字(上限：400字)</p>
                </div>
            </div>
        </form>

        {{--  プレビュー用フォーム（完全に分離） --}}
        <form method="post" action="{{ route('post.preview') }}" id="preview-form" class="mt-4">
            @csrf
            <input type="hidden" name="title" id="preview-title">
            <input type="hidden" name="body" id="preview-body">
            <button type="button" id="preview-button" class="w-full bg-gray-500 text-white py-2 rounded cursor-pointer">
                プレビュー
            </button>
        </form>

        {{--  送信ボタンは保存フォームと紐付け --}}
        <button type="submit" form="save-form" class="w-full bg-blue-500 text-white py-2 rounded mt-4">
            送信する
        </button>
    </div>

    {{--  JS部分（変更なし） --}}
    <script>
        const titleInput = document.getElementById('title');
        const bodyInput = document.getElementById('body');
        const titleCount = document.getElementById('title-count');
        const bodyCount = document.getElementById('body-count');

        titleInput.addEventListener('input', () => {
            titleCount.textContent = titleInput.value.length + '文字(上限：20字)';
        });

        bodyInput.addEventListener('input', () => {
            bodyCount.textContent = bodyInput.value.length + '文字(上限：400字)';
        });

        //  プレビューボタン押下時の処理
        document.getElementById('preview-button').addEventListener('click', () => {
            document.getElementById('preview-title').value = titleInput.value;
            document.getElementById('preview-body').value = bodyInput.value;
            document.getElementById('preview-form').submit();
        });
    </script>

</x-layouts.app>
