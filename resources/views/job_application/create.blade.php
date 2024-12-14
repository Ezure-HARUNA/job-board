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
    <form action="{{ route('job.application.store', $job) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
        <x-label for="expected_salary" :required="true">希望年収</x-label>
        <div class="flex items-center mb-4">
          <x-text-input type="number" name="expected_salary" class="w-full" />
          <span class="ml-2 text-slate-700">万円</span>
        </div>
        <div class="mb-4">
          <x-label for="cv" :required="true">履歴書のアップロード</x-label>
          <x-text-input type="file" name="cv" />
        </div>
      </div>
      <x-button class="w-full">応募を確定する</x-button>
    </form>
  </x-card>
</x-layout>
