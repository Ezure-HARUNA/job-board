<x-layout>
  <x-breadcrumbs class="mb-4" :links="['求人一覧' => route('jobs.index')]" />
  <x-card class="mb-4 text-sm">
    <form action="{{ route('jobs.index') }}" method="GET">
      <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
          <div class="mb-1 font-semibold">検索</div>
          <x-text-input name="search" value="" placeholder="文字を入力してください" />
        </div>
        <div>
          <div class="mb-1 font-semibold">給与</div>
          <div class="flex space-x-2">
            <x-text-input name="min_salary" value="" placeholder="下限" />
            <x-text-input name="max_salary" value="" placeholder="上限" />
          </div>

        </div>
      </div>
      <div>3</div>
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
