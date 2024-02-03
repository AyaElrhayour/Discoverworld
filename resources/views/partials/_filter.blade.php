<div class="flex justify-around relative top-60">
  <form action="/" method="GET">
      <select class="border border-gray-200 rounded p-2 w-26 mb-6" name="destinations">
          <option value="">Select Destination</option>
          @foreach ($countries as $country)
              <option value="{{ $country['common'] }}">{{ $country['common'] }}</option>
          @endforeach
      </select>
      <button type="submit"
          class="font-bold relative -left-1 py-[.5rem] px-4  text-white bg-orange-500 hover:text-orange-500 hover:bg-white hover:border-2 :border-orange-500 ">
          Filter
      </button>

  </form>
  <div class="flex gap-2">
  <form action="/" method="GET">
      <button type="submit"
          class="font-bold py-2 px-4 rounded-[18.5rem] text-white bg-orange-500 hover:text-orange-500 hover:bg-white hover:border-2 hover:rounded-[16.5rem] hover:border-orange-500 ">
          All
      </button>
  </form>
  <form action="/" method="GET">
      <input type="hidden" name="order_by" value="latest">
      <button type="submit"
          class="font-bold py-2 px-4 rounded-[18.5rem] text-white bg-orange-500 hover:text-orange-500 hover:bg-white hover:border-2 hover:rounded-[16.5rem] hover:border-orange-500 ">
          Latest</button>
  </form>
  <form action="/" method="GET">
      <input type="hidden" name="order_by" value="earliest">
      <button type="submit"
          class="font-bold py-2 px-4 rounded-[18.5rem] text-white bg-orange-500 hover:text-orange-500 hover:bg-white hover:border-2 hover:rounded-[16.5rem] hover:border-orange-500 ">
          Earliest</button>
  </form>
</div>
</div>