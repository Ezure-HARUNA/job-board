<x-layout>
  <x-breadcrumbs class="mb-4" :links="['求人一覧' => route('jobs.index')]" />
  <x-card class="mb-4 text-sm">
    <form action="{{ route('jobs.index') }}" method="GET">
      <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
          <div class="mb-1 font-semibold">検索</div>
          <x-text-input name="search" value="{{ request('search') }}" placeholder="文字を入力してください" />
        </div>
        <div>
          <div class="mb-1 font-semibold">給与</div>
          <div class="flex space-x-2">
            <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="下限" />
            <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="上限" />
          </div>

        </div>
      </div>
      <div>
        <div class="mb-1 font-semibold">キャリアレベル</div>
        <label class="mb-1 flex items-center">
          <input type="radio" id="experience-all" name="experience" value=""
            {{ !request('experience') ? 'checked' : '' }}>
          <span class="ml-2">すべて</span>
        </label>
        <label class="mb-1 flex items-center">
          <input type="radio" id="experience-entry" name="experience" value="エントリー" @checked('エントリー' === request('experience'))>
          <span class="ml-2">エントリー</span>
        </label>
        <label class="mb-1 flex items-center">
          <input type="radio" id="experience-mid" name="experience" value="中堅" @checked('中堅' === request('experience'))>
          <span class="ml-2">中堅</span>
        </label>
        <label class="mb-1 flex items-center">
          <input type="radio" id="experience-senior" name="experience" value="シニア" @checked('シニア' === request('experience'))>
          <span class="ml-2">シニア</span>
        </label>
      </div>

      <div>4</div>
      </div>
      <button class="w-full">絞り込み</button>
    </form>
  </x-card>
  @foreach ($jobs as $job)
    <x-job-card class="mb-4" :$job>
      <div>
        <x-link-button :href="route('jobs.show', $job)">
          詳細を見る
        </x-link-button>
      </div>
    </x-job-card>
  @endforeach
</x-layout>
