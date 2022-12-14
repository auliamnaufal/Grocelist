@props(['groceries', 'position' => 'dashboard'])
<div class="overflow-x-auto relative shadow-sm sm:rounded-lg mt-4">
  <table class="w-full text-sm text-left text-gray-500 ">
    <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
      <tr>
        @if ($position != 'deleted')
          <th scope="col" class="p-4">
            Check
          </th>
        @endif
        <th scope="col" class="py-3 px-6">
          Item
        </th>
        <th scope="col" class="py-3 px-6">
          Nominal
        </th>
        <th scope="col" class="py-3 px-6">
          Action
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($groceries as $grocery)
        <tr class="bg-white border-b hover:bg-gray-50">
          @if ($position != 'deleted')
            <td class="p-4 w-4">
              <div class="flex items-center">
                <input id="checkbox-table-search-1" type="checkbox" {{ $grocery->checked == 1 ? 'checked' : '' }}
                  onclick="document.getElementById('toggle-check-{{ $grocery->id }}').submit()"
                  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
              </div>
            </td>
          @endif
          <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
            {{ $grocery->name }}
          </th>
          <td class="py-4 px-6">
            {{ $grocery->nominal }}
          </td>
          <td class="py-4 px-6 text-red-400">
            @if ($position == 'dashboard')
              <form action="/groceries/{{ $grocery->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="border-none bg-transparent text-red-400 hover:text-red-500 transition duration-.5">Delete</button>
              </form>
            @else
              <form action="/groceries/{{ $grocery->id }}/restore" method="POST">
                @csrf
                <button type="submit"
                  class="border-none bg-transparent text-blue-400 hover:text-blue-500 transition duration-.5">Put
                  Back</button>
              </form>
            @endif
          </td>
        </tr>
        <form action="/groceries/toggle-check/{{ $grocery->id }}" method="POST" id="toggle-check-{{ $grocery->id }}">
          @csrf
        </form>
      @endforeach
    </tbody>
  </table>
</div>
