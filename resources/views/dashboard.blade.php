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
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="/groceries" method="POST" class="space-y-4" id="add-grocery">
            @csrf
            <div class="flex items-center justify-between">
              <div class="form-control w-3/4">
                <label for="default-input" class="block mb-2 text-sm font-medium text-black">Grocery Item</label>
                <input type="text" id="default-input" name="name"
                  class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              </div>
              <div class="custom-number-input w-32 mr-4 flex items-center flex-col">
                <label for="default-input" class="w-full text-sm font-medium text-black">Nominal</label>
                <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                  <button data-action="decrement"
                    class=" bg-gray-50 border border-gray-200 text-gray-900 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                    <span class="m-auto text-2xl font-thin">−</span>
                  </button>
                  <input type="number"
                    class="outline-none focus:outline-none text-center w-full bg-gray-50 border border-gray-200 text-gray-900 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                    name="nominal" value="0" min="0"></input>
                  <button data-action="increment"
                    class="bg-gray-50 border border-gray-200 text-gray-900 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                    <span class="m-auto text-2xl font-thin">+</span>
                  </button>
                </div>
              </div>
            </div>
            <button type="submit"
              class="w-24 rounded bg-blue-400 py-2 px-1 font-semibold text-white hover:bg-blue-500 transition duration-1">Add</button>
          </form>
        </div>
        <div class="bg-white overflow-hidden shadow-sm p-6">
          <x-groceries-table :groceries="$groceries" />

          <input type="hidden" value="http://127.0.0.1:8000/{{ auth()->user()->id }}/groceries" id="shareList">
          <div class="flex items-center justify-between mt-6">
            <button onclick="copyToClipboard()" class="bg-transparent border-none text-blue-600">Share Groceries
              list</button>
            <button onclick="return confirm('are you sure want to delete all groceries item?')" class="text-red-600 text-md">
              <a href="/groceries/delete-all">Delete All</a></button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <x-toast />

  <x-slot name="scripts">
    <script>
      function copyToClipboard() {
        var copyText = document.getElementById("shareList");

        copyText.select();

        navigator.clipboard.writeText(copyText.value);

        document.getElementById('toast-simple').style.display = 'flex'

        setTimeout(() => {
          document.getElementById('toast-simple').style.display = 'none'
        }, 3000);
      }

      function decrement(e) {
        e.preventDefault()

        const btn = e.target.parentNode.parentElement.querySelector(
          'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value--;
        target.value = target.value == 0 ? 0 : value;
      }

      function increment(e) {
        e.preventDefault()
        const btn = e.target.parentNode.parentElement.querySelector(
          'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value++;
        target.value = value;
      }

      const decrementButtons = document.querySelectorAll(
        `button[data-action="decrement"]`
      );

      const incrementButtons = document.querySelectorAll(
        `button[data-action="increment"]`
      );

      decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
      });

      incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
      });

      document.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
          event.preventDefault();
          document.getElementById("add-grocery").submit();
        }
      });
    </script>
  </x-slot>
</x-app-layout>
