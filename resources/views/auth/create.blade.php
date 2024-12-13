<x-layout>
  <h1 class="my-16 text-center text-2xl font-medium text-slate-600 mb-12">サインイン</h1>

  <x-card class="py-8 px-16">
    <form action="{{ route('auth.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="email" class="mb-2 block text-sm font-medium text-slate-900">メールアドレス</label>
        <x-text-input name="email" />
      </div>
      <div class="mb-4">
        <label for="password" class="mb-2 block text-sm font-medium text-slate-900">
          パスワード
        </label>
        <x-text-input name="password" type="password" />
      </div>
      <div class="mb-4 flex justify-between text-sm font-medium">
        <div>
          <div class="flex items-center space-x-2">
            <input type="checkbox" name="remember" class="rounded-sm border border-slate-400">
            <label for="remember">パスワードを記憶する</label>
          </div>
        </div>
        <div>
          <a href="#" class="text-indigo-600 hover:underline">
            パスワードを忘れた場合
          </a>
        </div>
      </div>
      <x-button class="w-full mb-4 bg-green-50">ログイン</x-button>
    </form>
  </x-card>
</x-layout>
