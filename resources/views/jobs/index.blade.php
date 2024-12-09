<x-layout>
  @foreach ($jobs as $job)
    <x-card>
      <x-job-card class="mb-4" :$job>
        <div>
          <x-link-button :href="route('jobs.show', $job)">詳細を見る</x-link-button>
        </div>
      </x-job-card>
    </x-card>
  @endforeach
</x-layout>
