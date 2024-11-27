<div class="m-5">
    <div class="flex flex-wrap justify-between">
        {{-- Page manage --}}
        <div class="my-5">
            {{-- Custom per page selection --}}
            <form wire:submit.prevent="checkCustomOption" action="" class="space-y-2 mb-5">
                <label for="customOption">Custom items per page</label>
                <input wire:model="customOption" id="customOption" type="text" placeholder="Items per Page" />
                <button class="btn-primary">Change Custom Page</button>
                @error('customOption')<p class="error">{{ $message }}</p>@enderror   
            </form>
            {{-- Items per page selection --}}
            <div class="mb-5">
                <label for="perPage">Items per page:</label>
                <select wire:model.live="perPage" id="perPage">
                    @if ( is_numeric($customOption) )
                        <option value="{{ $customOption }}" selected>{{ $customOption }}</option>
                    @endif
                    @foreach ($options as $option)
                        <option value="{{ $option }}" >{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Search & Order --}}
        <div class="my-5">
            {{-- Search --}}
            <div class="space-y-2 mb-5">
                <label for="searchKey">Search Item</label>
                <input wire:model.live="searchKey" id="searchKey" type="text" placeholder="Type to search item">
                @if($searchKey)
                    <p>Search for: <b>{{ $searchKey }}</b></p>
                @endif
            </div>
            {{-- Sorting --}}
            <div class="mb-5">
                <p class="flex">
                    <label>Sort by : </label>
                    <select wire:model.live="sortName">
                        <option value="asc" >Name ASC</option>
                        <option value="desc" >Name DESC</option>
                    </select>
                </p>                
            </div>
            {{-- Reset --}}
            <button wire:click="clearAll" class="btn-primary">
                Reset Default
            </button>
        </div>
    </div>

    {{-- Items List --}}
    <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 my-10">
        @foreach ($items as $item)
            <div class="text-center">
                {{ $item->name }}
            </div>
        @endforeach
    </div>

    {{-- Pagination Links --}}
    <div>
        {{ $items->links() }}
    </div>

</div>
