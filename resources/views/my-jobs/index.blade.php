<x-layout>
  <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />
  <div class="mb-8 text-right">
    <x-link-button href="{{ route('my-jobs.create') }}">求人の作成</x-link-button>
  </div>

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif

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
        <div class="flex space-x-2">
          @can('update', $job)
            <x-link-button href="{{ route('my-jobs.edit', $job->id) }}">求人を編集する</x-link-button>
          @else
            <button
              class="btn btn-disabled rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-slate-500 shadow-sm hover:bg-slate-100"
              disabled>現在、求人は編集できません</button>
          @endcan
          <form action="{{ route('my-jobs.destroy', $job->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button>削除</x-button>
          </form>
        </div>
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
