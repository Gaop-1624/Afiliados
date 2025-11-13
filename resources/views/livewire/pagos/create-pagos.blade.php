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
            <li class="inline-flex items-center">
                <a href="{{ route('Pagos.Pagos') }}" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    {{__('Payments')}}
                </a>
            </li>
                <li>
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__("New")}}</a>
                </div>
            </li>
        </ol>
   </nav>
        <x-card>
            <div class="grid grid-cols-2 gap-2 lg:grid-cols-6 lg:gap-2 m-2">
                <div class="col-span-3">
                        @if ($errors->first('search')) 
                            <div class="justify-center border bg-stone-100 shadow-lg col-span-3 px-4 py-2 h-12 m-2">
                                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                    </div>
                                    <input wire:model.live.debounce.250ms="search" type="search" id="default-search" class="h-8 block w-full p-4 ps-10 text-sm text-gray-900 border border-red-300 rounded bg-red-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" placeholder="{{__('Search by document')}}" required />
                                </div>
                            </div>
                            <p class="m-4 mt-2 text-xs text-red-600">{{$errors->first('search')}} </p>
                        @else
                            <div class="justify-center border bg-stone-100 shadow-lg col-span-3 px-4 py-2 h-12 m-2">
                                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                    </div>
                                    <input wire:model.live.debounce.250ms="search" type="search" id="default-search" class="h-8 block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" placeholder="{{__('Search by document')}}" required />
                                </div>
                            </div>
                        @endif
                </div>
                <div class="justify-center border bg-stone-100 shadow-lg  px-4 py-1 h-12 m-2 text-center">
                    <div class="border-2 bg-white p-1">
                        <a href="#" wire:click="ScanningId()" class="inline-flex border py-1 px-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('Look for')}}">
                            <i class="fas fa-binoculars fa-xl"></i>
                        </a>
                        <a href="#" wire:click="limpiarModal()" class="inline-flex border py-1 px-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('Undo')}}">
                            <i class="fas fa-undo-alt fa-xl"></i>
                        </a>
                        <a href="#" wire:click="closeModal()" class="inline-flex border py-1 px-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('Close')}}">
                            <i class="far fa-window-close fa-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="justify-center border bg-stone-100 shadow-lg col-span-3 px-4 py-2 h-12 m-2 text-center">
                        <span class="text-xl font-bold shadow-2xl font-mono">{{__('Totals')}}</span>
                    </div>
                </div> 
            </div> 
        </x-card>  
      <div class="grid grid-cols-4 gap-2 lg:grid-cols-3 lg:gap-2 m-2">
        <div class="col-span-2">
            <x-card>
                <div class="grid grid-cols-1 gap-2 lg:grid-cols-3 lg:gap-2 m-2 bg-slate-50 border-2 shadow-2xl">
                    <div class="px-1 py-2 col-span-2">
                        <label class="block  text-xs  font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('Name')}}</label>
                        <input type="text" wire:model="nombreCompleto" id="disabled-input" aria-label="disabled input" class=" bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled input" disabled>
                    </div>
                    <div class="px-1 py-2 grid grid-cols-4 gap-2">
                        <div class="col-span-2">
                            <label class="block text-xs  font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('Salary')}}</label>
                            <input type="text" wire:model="salario" id="disabled-input-2" aria-label="disabled input 2" class=" border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled readonly input">
                        </div>
                        <div>
                            <label class="block text-xs  font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('days')}}</label>
                            <input type="text" wire:model="dias" id="disabled-input-2" aria-label="disabled input 2" class=" border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled readonly input">
                        </div>
                        <div class="px-1 py-5">
                            <a href="#" wire:click="updateSalary()" class="inline-flex border px-1 py-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-blue-400 dark:focus:ring-blue-600" title="{{__('Update salary')}}">
                                <i class="far fa-edit fa-fw fa-lg" style="color: blue;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </x-card>                
            <x-card2>
                <div class="grid grid-cols-1 gap-2 lg:grid-cols-3 lg:gap-2 m-2 border-2">
                    <div class="px-1 py-2 col-span-2">
                        <label class="block  text-xs  font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('Health (EPS)')}}</label>
                        <input type="text" wire:model="eps_id" id="disabled-input" aria-label="disabled input" class=" bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled input" disabled>
                    </div>
                    <div class="px-1 py-2">
                        <label class="block text-xs  font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('Risks (ARL)')}}</label>
                        <input type="text" wire:model="riesgo" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled readonly input" disabled readonly>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 lg:gap-2 m-2 border-2">
                    <div class="px-1 py-2">
                        <label class="block text-xs font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('Pensions (AFP)')}}</label>
                        <input type="text" wire:model="afp_id" id="disabled-input" aria-label="disabled input" class=" bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled input" disabled>
                    </div>
                    <div class="px-1 py-2 ">
                        <label class="block text-xs font-medium text-gray-400 dark:text-white" for="user_avatar">{{__('Compensation (CAJA)')}}</label>
                        <input type="text" wire:model="caja_id" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled readonly input" disabled readonly>
                    </div>
                </div>
            </x-card2>
        </div>
        <div>
            <x-card>
                        <div class="bg-blue-400 text-white text-center py-1 m-2 font-bold font-serif"></div>
                        <div class="grid grid-cols-1 gap-1 lg:grid-cols-2 lg:gap-0 m-2 mb-1 border-2 shadow-2xl">
                            <div class="bg-white py-2">
                                <div class="mb-2 text-sm m-1 py-2">
                                    <span class="m-2 font-serif text-gray-400">Sub Total: $</span>
                                </div>
                                <div class="mb-2 text-sm m-1">
                                    <span class="m-2 font-serif text-gray-400">Administración: $</span>
                                </div>
                            </div>
                            <div class="bg-white py-2">
                                <div class="text-sm m-1 border text-center">
                                    <input type="text" wire:model="subTotal" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled readonly input" disabled readonly>
                                </div>
                                <div class="text-sm m-1 border text-center">
                                    <input type="text" wire:model="adm" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="Disabled readonly input" disabled readonly>
                                </div>
                            </div>
                        </div>
                        <div class="bg-blue-400 text-white text-center py-1 m-2 font-bold font-serif mb-3"></div>
                        <div class="text-xl font-bold text-center m-2 border-2 shadow-2xl mb-2">
                            <input type="text" wire:model="total" id="disabled-input-2" aria-label="disabled input 2" class="m-4 bg-gray-100 border-gray-300 text-gray-900 text-xl text-center rounded focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8" value="$" disabled readonly>
                            <button wire:click.prevent="Create()" class="px-22 py-1 m-2 mr-2 h-8 w-4/5 text-xs font-semibold text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300"><i class="far fa-money-bill-alt"></i> &nbsp; {{__('Pay')}} </button>
                        </div>
                    </div>
           </x-card>
        </div>
    </div> 


  
</div>
