<x-layout>
  <x-breadcrumbs class="mb-4" :links="['求人一覧' => route('jobs.index'), $job->title => '#']" />
  <x-job-card :$job>
    <p class="text-sm text-slate-500 mb-4">
      {!! nl2br(e($job->description)) !!}
    </p>
  </x-job-card>
</x-layout>
