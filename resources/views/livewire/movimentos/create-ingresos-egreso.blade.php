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
                  <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('Income and Expenses')}}</a>
                </div>
            </li>
        </ol>
   </nav>
   <x-titulo><i class="fas fa-file-invoice-dollar"></i> &nbsp; {{__('Create Income or Expenses')}}</x-titulo>
    <x-card> 
        <div class="grid grid-cols-2 gap-2 lg:grid-cols-4 lg:gap-2">     
                <div class="col-span-3 bg-stone-100 border-2 shadow-xl h-12 p-2 m-2"></div>
                <div class="col-span-1">
                    <div class="justify-center bg-stone-100 shadow-lg  px-4 py-1 h-12 m-2 text-center border">
                        <div class="border-2 bg-white rounded p-1">      
                            <a href="#" wire:click="CrearIngresoEgreso()" class="inline-flex border py-1 px-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('Save')}}">
                                <i class="far fa-save fa-xl"></i>
                            </a>
                            <a href="#" wire:click="limpiarModal()" class="inline-flex border py-1 px-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('Undo')}}">
                                <i class="fas fa-undo-alt fa-xl"></i>
                            </a>
                            <a href="#" wire:click="closeModal()" class="inline-flex border py-1 px-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('Close')}}">
                                <i class="far fa-window-close fa-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    </x-card>
    <x-card2>
        <div class="grid grid-cols-1 gap-2 lg:grid-cols-3 lg:gap-2 m-2 shadow-2xl border-2">
                <div class="mb-5 m-4 col-span-2">
                     @if ($errors->first('detalle'))
                        <label  for="message" class="block mb-2 text-sm font-medium text-red-900 dark:text-white bg-red-50">{{__('Description')}}</label>
                        <textarea wire:model="detalle" id="message" rows="4" class="block p-2.5 w-full text-sm text-red-900 bg-red-50 rounded-lg border border-red-300 focus:ring-red-500 focus:border-red-500 dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="{{__('Enter the details of the Income or Expense here')}}..."></textarea>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('detalle')}} </p>
                    @else
                        <label  for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white bg-blue-50">{{__('Description')}}</label>
                        <textarea wire:model="detalle" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('Enter the details of the Income or Expense here')}}..."></textarea>
                    @endif
                </div>
                <div class="mb-2 m-4 py-8">
                     @if ($errors->first('tipo')) 
                        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white mb-2">
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input wire:model="tipo" id="horizontal-list-radio-license" type="radio" value="0" name="list-radio" class="w-4 h-4 text-red-600 bg-red-100 border-red-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-red-700 dark:focus:ring-offset-red-700 focus:ring-2 dark:bg-red-600 dark:border-red-500">
                                    <label for="horizontal-list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-red-900 dark:text-red-300">{{__('Income')}}</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input wire:model="tipo" id="horizontal-list-radio-id" type="radio" value="1" name="list-radio" class="w-4 h-4 text-red-600 bg-red-100 border-red-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-red-700 dark:focus:ring-offset-red-700 focus:ring-2 dark:bg-red-600 dark:border-red-500">
                                    <label for="horizontal-list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-red-900 dark:text-red-300">{{__('Egress')}}</label>
                                </div>
                            </li>
                        </ul>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('tipo')}} </p>
                    @else
                        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white mb-2">                            
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input wire:model="tipo" id="horizontal-list-radio-license" type="radio" value="0" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="horizontal-list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__('Income')}}</label>
                                    <p class="mt-2 text-xs text-red-600">{{$errors->first('tipo')}} </p>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input wire:model="tipo" id="horizontal-list-radio-id" type="radio" value="1" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="horizontal-list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__('Egress')}}</label>
                                </div>
                            </li>
                        </ul>
                    @endif
                    @if ($errors->first('total')) 
                        <div class="px-1 py-2 border bg-slate-100">
                            <div class="relative mb-4">
                                <input wire:model="total" id="total" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                                <label for="total" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Value Paid or Received')}}</label>
                                <p class="mt-2 text-xs text-red-600">{{$errors->first('total')}} </p>
                            </div>
                        </div>
                    @else
                        <div class="px-1 py-2 border bg-slate-100 h-12">
                            <div class="relative mb-4">
                                <input wire:model="total" id="total" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="total" class="absolute text-xs duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Value Paid or Received')}}</label>
                            </div> 
                        </div>
                    @endif 
                </div>
        </div>   
    </x-card2>
</div>
