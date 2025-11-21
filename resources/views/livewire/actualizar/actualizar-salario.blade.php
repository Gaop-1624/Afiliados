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
                  <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('Update salary')}}</a>
                </div>
            </li>
        </ol>
   </nav>
   <x-titulo><i class="fas fa-hand-holding-usd"></i> &nbsp; {{__('Update salary')}}</x-titulo>
    <div class="grid grid-cols-2 gap-2 lg:grid-cols-3 lg:gap-4">
            <div class="col-span-2">
                <x-card>
                     @if ($salarios->count()) 
                            <table class="min-w-full font-light text-center m-0.5 ms-1 mb-4 border-2">
                                    <thead class="text-white bg-blue-400 border-b dark:border-neutral-500 dark:bg-neutral-400 mr-2">
                                        <tr>
                                            <th class="px-2 py-1 font-serif text-xs text-left uppercase" >{{__('Id')}}</th>
                                            <th class="px-2 py-1 font-serif text-xs text-left uppercase" >{{__('Salary')}}</th>
                                            <th class="px-2 py-1 font-serif text-xs text-left uppercase" >{{__('Administration')}}</th>
                                            <th class="px-2 py-1 font-serif text-xs text-left uppercase" >{{__('Year')}}</th>
                                            <th class="px-2 py-1 font-serif text-xs text-center uppercase" >{{__('Actions')}}</th>

                                        </tr>
                                    </thead>
                                    <tbody class="mb-4">
                                         @foreach ($salarios as $salario)
                                                <tr>
                                                    <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{$salario->id}}</td>
                                                    <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">${{number_format($salario->salario)}}</td>
                                                    <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">${{number_format($salario->administracion)}}</td>
                                                    <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{$salario->ano}}</td>
                                                    <td class="justify-center px-2 py-1 space-x-2 whitespace-nowrap">
                                                        <a href="#" wire:click="update({{$salario->id}})" class="inline-flex border px-1 py-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-blue-400 dark:focus:ring-blue-600" title="{{__('Edit')}}">
                                                            <i class="far fa-edit fa-fw fa-xl" style="color: blue;"></i>
                                                        </a>                                    
                                                    </td>
                                                </tr>
                                        @endforeach 
                                    </tbody>
                            </table> 
                        
                        
                     @else
                        <div class="px-6 py-4 text-red-400 font-bold font-serif text-sm">
                            {{__('There are no forms')}} .....
                        </div>     
                    @endif  
                </x-card>
            </div>
              <x-card>  
                <div class="bg-blue-400 text-white text-center py-1 m-2 font-bold font-serif"></div>  
                <div class="col-span-1">
                    <div class="justify-center border bg-stone-100 shadow-lg col-span-3 px-4 py-2 h-10 m-2 text-center">
                        <span class="text-lg font-bold shadow-2xl font-mono">{{$updating ? __('Update Salary') : __('New Salary')}}</span>
                    </div>
                    @if ($errors->first('salario')) 
                        <div class="px-1 py-2 border bg-slate-100 m-4 h-12">
                            <div class="relative ">
                                <input wire:model="salario" id="salario" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                                <label for="salario" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Salary')}}</label>
                                <p class="mt-2 text-xs text-red-600">{{$errors->first('salario')}} </p>
                            </div>
                        </div>
                    @else
                        <div class="px-1 py-2 border bg-slate-100 h-12 m-4">
                            <div class="relative">
                                <input wire:model="salario" id="celular" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="salario" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Salary')}}</label>
                            </div> 
                        </div>
                    @endif 
                </div>   
                <div class="col-span-1">
                    @if ($errors->first('adm')) 
                        <div class="px-1 py-2 border bg-slate-100 m-4 h-12">
                            <div class="relative ">
                                <input wire:model="adm" id="adm" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                                <label for="salrio" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Administration')}}</label>
                                <p class="mt-2 text-xs text-red-600">{{$errors->first('adm')}} </p>
                            </div>
                        </div>
                    @else
                        <div class="px-1 py-2 border bg-slate-100 h-12 m-4">
                            <div class="relative">
                                <input wire:model="adm" id="adm" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="celular" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Administration')}}</label>
                            </div> 
                        </div>
                    @endif 
                </div> 
                <div class="bg-blue-400 text-white text-center py-1 m-2 font-bold font-serif"></div>  
                <div class="flex justify-end border-x-0 mb-4">
                    @can('admin.salario.create')
                        <button wire:click.prevent="create()" class="px-6 py-1 mr-2 h-8 text-xs font-semibold text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300"><i class="fas fa-save fa-stack fa-lg"></i>{{ $updating ? __('Update') : __('Save') }} </button>
                    @endcan   
                    <button wire:click.prevent="closeModal()" class="px-6 py-1 mr-2 h-8 text-xs font-semibold text-center inline-flex items-center text-white bg-slate-500 rounded-lg hover:bg-slate-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-slate-300"><i class="fas fa-window-close fa-stack fa-lg"></i>{{__('Cancel')}} </button>
                </div>
            </x-card>
        </div>
</div>
