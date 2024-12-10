<x-layout>
  <x-breadcrumbs class="mb-4" :links="['求人一覧' => route('jobs.index'), $job->title => '#']" />
  <x-job-card :$job />
</x-layout>
