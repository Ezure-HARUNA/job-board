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
        <div>
          <form id="cancel-form-{{ $application->id }}" action="{{ route('my-job-applications.destroy', $application) }}"
            method="POST">
            @csrf
            @method('DELETE')
            <button
              class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-slate-100"
              type="button" onclick="confirmCancellation({{ $application->id }})">キャンセルする</button>
          </form>
        </div>
      </div>
    </x-job-card>
  @empty
    <div class="rounded-md border border-dashed border-slate-300 p-8">
      <div class="text-center font-medium">
        応募している求人はありません
      </div>
      <div class="text-center">
        <a class="text-indigo-500 hover:underline" href="{{ route('jobs.index') }}">求人を探す</a>
      </div>
    </div>
  @endforelse
</x-layout>
<script>
  function confirmCancellation(applicationId) {
    if (confirm('本当にキャンセルしますか？')) {
      document.getElementById('cancel-form-' + applicationId).submit();
    }
  }
</script>
