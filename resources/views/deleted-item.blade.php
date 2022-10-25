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
          <x-groceries-table :groceries="$groceries" position="deleted" />

          <div class="flex items-center justify-between mt-6">

            <button onclick="return confirm('are you sure want to delete all groceries item permanently?')"
              class="text-red-600 text-md"> <a href="/groceries/delete-all/permanent">Permanently Delete All</a></button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <x-slot name="scripts"></x-slot>
</x-app-layout>
