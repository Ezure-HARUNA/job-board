<x-layout>
  @if (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <x-card>
    <form action="{{ route('employer.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <x-label for="company_name" :required="true">会社名</x-label>
        <x-text-input name="company_name" />
      </div>
      <x-button class="w-full">作成する</x-button>
    </form>
  </x-card>
</x-layout>
