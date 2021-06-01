<div class="p-6 bg-white sm:px-20 justify-center border-b border-gray-200">
    <div class="mt-6">
        <div class="flex justify-between">
            <div class="py-2">
                <input wire:model.debounce.500ms="q" type="search" class="text-gray-500 rounded focus:outline-none focus:ring-1 focus:ring-pink-600 focus:border-transparent" placeholder="Search">
            </div>
            <div class="mr-2 mb-2">
                 <input type="checkbox" class="form-checkbox h-5 w-5 text-pink-500 border-2 border-pink-500 focus:outline-none focus:ring-1 focus:ring-pink-600 focus:border-transparent" checked  wire:model="active"><span class="ml-2 text-gray-700" >Active Only?</span>
            </div>
        </div>
        <table class="table-auto w-full">
          <thead class="">
            <tr>
                <th class="px-4 py-2 rounded border bg-pink-400">
                    <div class="flex items-center"><button wire:click="sortBy('id')">ID</button>
                        <x-sort-icon sortField="id" :sort-by="$sortBy" :sort-asc="$sortAsc"/>
                    </div>
                </th>
                <th class="px-4 py-2 rounded border bg-pink-400">
                    <div class="flex items-center"><button wire:click="sortBy('name')">Name</button>
                    <x-sort-icon sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc"/>
                </div>
                </th>
                <th class="px-4 py-2 rounded border bg-pink-400">
                    <div class="flex items-center"><button wire:click="sortBy('price')">Price</button>
                    <x-sort-icon sortField="price" :sort-by="$sortBy" :sort-asc="$sortAsc"/>
                </div>
                </th>
                <th class="px-4 py-2 rounded border bg-pink-400">Status</th>
                <th class="px-4 py-2 rounded border bg-pink-400">
                    Action
                </th>
            </tr>
          </thead>
          <tbody>
            @foreach( $items as $item )
                <tr>
                  <td class="border px-4 py-2"><div class="flex items-center">{{$item->id}}</div></td>
                  <td class="border px-4 py-2"><div class="flex items-center">{{$item->name}}</div></td>
                  <td class="border px-4 py-2"><div class="flex items-center">{{$item->price}}</div></td>
                  <td class="border px-4 py-2"><div class="flex items-center">{{$item->status ? 'Active' : 'Not-Active'}}</div></td>
                  <td class="border px-4 py-2">
                    <div class="flex items-center">
                        Edit
                            <x-jet-danger-button wire:click="confirmingItemDeletion({{$item->id}})" wire:loading.attr="disabled">
                                {{ __('Delete') }}
                            </x-jet-danger-button>
                      </div>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $items->links() }}
    </div>

    <x-jet-dialog-modal wire:model="confirmingItemDeletion">
        <x-slot name="title">
            {{ __('Delete Item') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete item?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingItemDeletion',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteItem({{$confirmingItemDeletion}})" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
