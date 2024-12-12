<x-layout>
  <x-breadcrumbs class="mb-4" :links="['求人一覧' => route('jobs.index')]" />
  <x-card class="mb-4 text-sm">
    <form id="filtering-form" action="{{ route('jobs.index') }}" method="GET">
      <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
          <div class="mb-1 font-semibold">検索</div>
          <x-text-input name="search" value="{{ request('search') }}" placeholder="文字を入力してください"
            form-id="filtering-form" />
        </div>
        <div>
          <div class="mb-1 font-semibold">給与</div>
          <div class="flex space-x-2">
            <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="下限"
              form-id="filtering-form" />
            <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="上限"
              form-id="filtering-form" />
          </div>
        </div>
      </div>
      <div class="mb-4 grid grid-cols-2 gap-4"> <!-- ここを修正 -->
        <div>
          <div class="mb-1 font-semibold">キャリアレベル</div>
          <x-radio-group name="experience" :options="App\Models\Job::$experience" />
        </div>
        <div>
          <div class="mb-1 font-semibold">職種</div>
          <x-radio-group name="category" :options="App\Models\Job::$category" />
        </div>
      </div>
      <button
        class="w-full border border-slate-500 text-slate-500 hover:bg-slate-500 hover:text-white font-bold py-2 px-4 rounded transition duration-300">
        <i class="fas fa-search mr-2"></i>絞り込み
      </button>

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
