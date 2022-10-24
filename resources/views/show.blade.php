<x-guest-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-gray-50 overflow-hidden shadow-md p-6">
          <x-groceries-table :groceries="$groceries->groceries" />
        </div>
      </div>
			<div class="flex items-center justify-between mt-4">
				<p class="text-right text-md">You're viewing <span class="text-red-400">{{ $groceries->name }}'s</span> groceries list</p>
				<a href="/dashboard" class="text-red-400 text-md">Go to Dashboard</a>
			</div>
    </div>
  </div>
</x-guest-layout>
