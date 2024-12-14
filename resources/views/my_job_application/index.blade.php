<x-layout>
  <x-breadcrumbs class="mb-4" :links="['応募した求人一覧' => '#']" />
  <h2 class="text-lg font-medium mb-4">応募した求人一覧</h2>
  @forelse ($applications as $application)
    <x-job-card :job="$application->job">
      <div class="flex items-center justify-between text-xs text-slate-500">
        <div class="flex flex-col gap-1">
          <div>
            {{ $application->created_at->diffForHumans() }}に応募済み
          </div>
          <div>
            {{ Str::plural('他の応募者数:', $application->job->job_applications_count - 1) }}
            {{ $application->job->job_applications_count - 1 }}
          </div>
          <div>
            希望年収: {{ number_format($application->expected_salary / 10000) }}万円
          </div>
          <div>
            平均希望年収:
            {{ number_format($application->job->job_applications_avg_expected_salary / 10000) }}万円
          </div>
        </div>
        <div>右側コンポーネント</div>
      </div>
    </x-job-card>
  @empty
  @endforelse
</x-layout>
