<div>
    <nav class="flex justify-end px-5 py-3 text-gray-700  dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                {{__('Home')}}
                </a>
            </li>
            <li>
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('Withdraw')}}</a>
                </div>
            </li>
        </ol>
   </nav>
   <x-titulo><i class="far fa-times-circle" style="color: rgb(166, 168, 166)"></i> {{__('Activate or Withdraw Affiliate')}}</x-titulo>
    <x-card2>
        <div class="grid grid-cols-2 gap-2 lg:grid-cols-4 lg:gap-2 m-2">
        <div class="col-span-3">
            @if ($errors->first('documento')) 
                    <div class="justify-center border bg-stone-100 shadow-lg col-span-3 px-4 py-2 h-12 m-2">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input wire:model.live.debounce.250ms="documento" type="documento" id="default-search" class="h-8 block w-full p-4 ps-10 text-sm text-gray-900 border border-red-300 rounded bg-red-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" placeholder="{{__('Search by document')}}" required />
                        </div>
                    </div>
                    <p class="m-4 mt-2 text-xs text-red-600">{{$errors->first('documento')}} </p>
            @else
                    <div class="justify-center border bg-stone-100 shadow-lg col-span-3 px-4 py-2 h-12 m-2">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input wire:model.live.debounce.250ms="documento" type="documento" id="default-search" class="h-8 block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" placeholder="{{__('Search by document')}}" required />
                        </div>
                    </div>
            @endif
        </div>
        <div class="col-span-1">
                <div class="justify-center bg-stone-100 shadow-lg  px-4 py-1 h-12 m-2 text-center border">
                    <div class="border-2 bg-white rounded p-1">      
                        <a href="#" wire:click="ScanningId()" class="inline-flex border py-1 px-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('Look for')}}">
                            <i class="fas fa-binoculars fa-xl"></i>
                        </a>
                        <a href="#" wire:click="limpiarModal()" class="inline-flex border py-1 px-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('Undo')}}">
                            <i class="fas fa-undo-alt fa-xl"></i>
                        </a>
                        <a href="#" wire:click="RetirarAfiliado()" class="inline-flex border py-1 px-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('Withdraw affiliate')}}">
                            <i class="far fa-registered"></i>
                        </a>
                    </div>
                </div>
        </div>
    </x-card2>
    @if ($activated == 2)
        <x-card2>

            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">¡{{__('The member is retired')}}!</span> 
                </div>
            </div>

            <div class="grid grid-cols-1 gap-2 lg:grid-cols-5 lg:gap-2 m-2">
                <div class="px-1 py-2 col-span-1">
                    <label class="block  text-xs  font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('Document')}}</label>
                    <input type="text" wire:model="documentocc" id="disabled-input" aria-label="disabled input" class=" bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled input" disabled>
                </div>
                <div class="px-1 py-2 col-span-3">
                    <label class="block  text-xs  font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('Name')}}</label>
                    <input type="text" wire:model="nombreCompleto" id="disabled-input" aria-label="disabled input" class=" bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled input" disabled>
                </div>
         
                <div class="px-1 py-6">
                    <button wire:click.prevent="ActivarAfiliado()" class="px-6 py-4 mr-2 h-7 text-xs font-serif text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300" title="{{__('Activate affiliate')}}"><i class="far fa-registered fa-lg"></i> &nbsp; {{__('Activate')}} </button>
                </div> 
            </div>
        </x-card2>
    @elseif ($activated == 1)
        <x-card2>
               <div class="grid grid-cols-1 gap-2 lg:grid-cols-5 lg:gap-2 m-2">
                    <div class="px-1 py-2 col-span-1">
                        <label class="block  text-xs  font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('Document')}}</label>
                        <input type="text" wire:model="documentocc" id="disabled-input" aria-label="disabled input" class=" bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled input" disabled>
                    </div>
                    <div class="px-1 py-2 col-span-2">
                        <label class="block  text-xs  font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('Name')}}</label>
                        <input type="text" wire:model="nombreCompleto" id="disabled-input" aria-label="disabled input" class=" bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled input" disabled>
                    </div>
                    <div class="px-1 py-2">
                        @if ($errors->first('diasretiro'))
                            <label class="block  text-xs  font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('Days to Withdraw')}}</label>
                            <input type="text" wire:model="diasretiro" id="disabled-input" aria-label="disabled input" class=" bg-red-100 border border-red-300 text-red-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="" >
                            <p class="mt-2 text-xs text-red-600">{{$errors->first('diasretiro')}} </p>
                        @else
                            <label class="block  text-xs  font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('Days to Withdraw')}}</label>
                            <input type="text" wire:model="diasretiro" id="disabled-input" aria-label="disabled input" class=" bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="" >
                        @endif
                    </div>
                    <div class="px-1 py-6">
                        <button wire:click.prevent="RetirarAfiliado()" class="px-6 py-4 mr-2 h-7 text-xs font-serif text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300" title="{{__('Withdraw affiliate')}}"><i class="far fa-registered fa-lg"></i> &nbsp; {{__('Withdraw')}} </button>
                    </div> 
                </div>
           
        </x-card2>
    @endif
</div>
