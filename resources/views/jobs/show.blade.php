<x-layout>
  <x-breadcrumbs class="mb-4" :links="['求人一覧' => route('jobs.index'), $job->title => '#']" />
  <x-job-card :$job>
    <p class="text-sm text-slate-500 mb-4">
      {!! nl2br(e($job->description)) !!}
    </p>
    @can('apply', $job)
      <x-button class="w-full">
        <a href="{{ route('job.application.create', ['job' => $job->id]) }}">応募する</a>
      </x-button>
    @else
      <div class="text-center text-sm font-medium text-slate-500">
        すでにこの求人には応募しています
      </div>
    @endcan
  </x-job-card>

  <x-card class="mb-4">
    <h2 class="mb-4 text-lg font-medium">
      {{ $job->employer->company_name }}の求人をもっと見る
    </h2>
    <div class="text-sm text-slate-500">
      @foreach ($job->employer->jobs as $otherJob)
        <div class="mb-4 flex justify-between">
          <div>
            <div class="text-slate-700">
              <a href="{{ route('jobs.show', $otherJob) }}">
                {{ $otherJob->title }}
              </a>
            </div>
            <div class="text-xs">
              {{ $otherJob->created_at->diffForHumans() }}
            </div>
          </div>
          <div class="text-xs">
            {{ number_format($otherJob->salary / 10000) }}万円
          </div>
        </div>
      @endforeach
    </div>
  </x-card>
</x-layout>
