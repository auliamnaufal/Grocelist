<x-app-layout>
  <x-slot name="styles">
    <style>
      input[type='number']::-webkit-inner-spin-button,
      input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      .custom-number-input input:focus {
        outline: none !important;
      }

      .custom-number-input button:focus {
        outline: none !important;
      }
    </style>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white overflow-hidden shadow-sm p-6">
          @if (auth()->user()->level == 'subscribed')
            <x-groceries-table :groceries="$groceries" position="deleted" />

            <div class="flex items-center justify-between mt-6">

              <button onclick="return confirm('are you sure want to delete all groceries item permanently?')"
                class="text-red-600 text-md"> <a href="/groceries/delete-all/permanent">Permanently Delete
                  All</a></button>
            </div>
          @else
            <div class="flex flex-col items-center">
              <h3 class="text-lg font-bold text-center mb-4">Subscribe to access this feature!</h3>

              <form method="POST" action="/{{ auth()->user()->id }}/subscribe">
                @csrf
                <a href="/{{ auth()->user()->id }}/subscribe"
									onclick="event.preventDefault();
																		this.closest('form').submit();"
                  class="border border-blue-400 py-2 px-4 bg-white text-sm text-blue-400 hover:bg-blue-400 hover:border-white hover:text-white transition duration-.5">Subscribe
                  Now!</a>
              </form>

            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <x-slot name="scripts"></x-slot>
</x-app-layout>
