<x-layout>
  <x-breadcrumbs class="mb-4" :links="[
      'Jobs' => route('jobs.index'),
      $job->title => route('jobs.show', $job),
      'Apply' => '#',
  ]" />
  <x-job-card :$job />
  <x-card>
    <h2 class="mb-4 text-lg font-medium">
      求人に応募する
    </h2>
    <form action="{{ route('job.application.store', $job) }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="expected_salary" class="mb-2 block text-sm font-medium text-slate-900">希望年収（万円単位）</label>
        <div class="flex items-center">
          <x-text-input type="number" name="expected_salary" class="w-full" />
          <span class="ml-2 text-slate-700">万円</span>
        </div>
      </div>
      <x-button class="w-full">応募を確定する</x-button>
    </form>
  </x-card>
</x-layout>
