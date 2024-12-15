<x-layout>
  <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />
  <div class="mb-8 text-right">
    <x-link-button href="{{ route('my-jobs.create') }}">求人の作成</x-link-button>
  </div>
  @forelse ($jobs as $job)
    <x-job-card :$job>
      <div class="text-xs text-slate-500">
        @forelse ($job->jobApplications as $application)
          <div class="mb-4 flex items-center justify-between">
            <div>
              <div>{{ $application->user->name }}</div>
              <div>
                {{ $application->created_at->diffForHumans() }}さんからの応募
              </div>
              <div>
                履歴書のダウンロード
              </div>
            </div>
            <div>${{ number_format($application->expected_salary) }}</div>
          </div>
        @empty
          <div>まだ応募者はいません</div>
        @endforelse
      </div>
    </x-job-card>
  @empty
    <div class="rounded-md border border-dashed border-slate-300 p-8">
      <div class="text-center font-medium">
        まだあなたが掲載中の求人はありません
      </div>
      <div class="text-center">
        <a class="text-indigo-500 hover:underline" href="{{ route('my-jobs.create') }}">求人の作成</a>
      </div>
    </div>
  @endforelse
</x-layout>
