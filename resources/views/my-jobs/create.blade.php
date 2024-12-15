<x-layout>
  <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Create' => '#']" class="mb-4" />
  <h2 class="text-lg font-medium mb-4">求人の作成</h2>
  <x-card class="mb-8">
    <form action="{{ route('my-jobs.store') }}" method="POST">
      @csrf
      <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
          <x-label for="title" :required="true">求人名</x-label>
          <x-text-input name="title" />
        </div>
        <div>
          <x-label for="location" :required="true">勤務地</x-label>
          <x-text-input name="location" />
        </div>
        <div class="col-span-2">
          <x-label for="salary" :required="true">年収</x-label>
          <div class="flex items-center mb-4">
            <x-text-input name="salary" type="number" />
            <span class="ml-2 text-slate-700">万円</span>
          </div>
        </div>
        <div class="col-span-2">
          <x-label for="description" :required="true">詳細</x-label>
          <x-text-input name="description" type="textarea" />
        </div>
        <div>
          <x-label for="experience" :required="true">キャリアレベル</x-label>
          <x-radio-group name="experience" :value="old('experience')" :all-option="false" :options="array_combine(array_map('ucfirst', \App\Models\Job::$experience), \App\Models\Job::$experience)" />
        </div>
        <div>
          <x-label for="category" :required="true">職種</x-label>
          <x-radio-group name="category" :all-option="false" :value="old('category')" :options="\App\Models\Job::$category" />
        </div>
        <div class="col-span-2">
          <x-button class="w-full">求人を作成する</x-button>
        </div>
      </div>
    </form>
  </x-card>
</x-layout>
