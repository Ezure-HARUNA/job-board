<x-layout>
  <x-breadcrumbs class="mb-4" :links="['応募した求人一覧' => '#']" />
  <h2 class="text-lg font-medium mb-4">応募した求人一覧</h2>
  @forelse ($applications as $application)
    <x-job-card :job="$application->job"></x-job-card>
  @empty
  @endforelse
</x-layout>
