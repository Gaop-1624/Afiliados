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
                <a href="{{ route('Arls.Arls') }}" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    {{__('Risks (ARL)')}}
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
   <x-titulo><i class="fab fa-asymmetrik"></i> &nbsp; {{__('New Risks')}}</x-titulo>
    <x-card>
          <div class="grid grid-cols-2 gap-1 lg:grid-cols-8 lg:gap-2 mb-4  m-2">
                @if ($errors->first('t_documento_id')) 
                    <div class="px-1 py-2 border bg-slate-100 col-span-2">
                        <select wire:model="t_documento_id" id="small" class="font-semibold block w-full p-2 text-xs text-red-900 border border-red-300 rounded bg-red-50 focus:ring-red-500 focus:border-red-500">
                            <option selected>{{__('Document type')}}</option>
                            @foreach ( $TDocumentos as $td )
                                <option value="{{$td->id}}">{{$td->nombre}}</option>
                            @endforeach 
                        </select>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('t_documento_id')}} </p>
                    </div>
                @else
                    <div class="px-1 py-2 h-12 border bg-slate-100 col-span-2">
                        <select wire:model="t_documento_id" id="small" class="font-semibold block w-full p-2 mb-6 text-xs text-gray-500 border border-gray-300 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 h-8">
                                <option selected>{{__('Document type')}}</option>
                                @foreach ( $TDocumentos as $td )
                                    <option value="{{$td->id}}">{{$td->nombre}}</option>
                                @endforeach 
                        </select>
                    </div>
                @endif
           
                   @if ($errors->first('nit')) 
                        <div class="px-2 py-2 border bg-slate-100 col-span-2">
                            <div class="relative mb-4">
                                <input wire:model="nit" id="nit" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                                <label for="nit" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Document number')}}</label>
                                <p class="mt-2 text-xs text-red-600">{{$errors->first('nit')}} </p>
                            </div>
                        </div>
                    @else
                        <div class="px-2 py-2 border bg-slate-100 h-12 col-span-2">
                            <div class="relative mb-4">
                                <input wire:model="nit" id="nit" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="nit" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Document number')}}</label>
                            </div> 
                        </div>
                    @endif
                    @if ($errors->first('codigo')) 
                        <div class="px-1 py-2 border bg-slate-100">
                            <div class="relative mb-4">
                                <input wire:model="codigo" id="codigo" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                                <label for="codigo" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Codigo')}}</label>
                                <p class="mt-2 text-xs text-red-600">{{$errors->first('codigo')}} </p>
                            </div>
                        </div>
                    @else
                        <div class="px-1 py-2 border bg-slate-100 h-12">
                            <div class="relative mb-4">
                                <input wire:model="codigo" id="dv" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="codigo" class="absolute text-xs text-gray-500 font-bold duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Codigo')}}</label>
                            </div> 
                        </div>
                    @endif

                @if ($errors->first('nombre')) 
                    <div class="px-4 py-2 border bg-slate-100 col-span-3">
                        <div class="relative mb-4">
                            <input wire:model="nombre" id="nombre" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                            <label for="nombre" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Company name')}}</label>
                            <p class="mt-2 text-xs text-red-600">{{$errors->first('nombre')}} </p>
                        </div>
                    </div>
                @else
                    <div class="px-4 py-2 border bg-slate-100 h-12 col-span-3">
                        <div class="relative mb-4">
                            <input wire:model="nombre" id="nombre" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="nombre" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Company name')}}</label>
                        </div> 
                    </div>
                @endif 
          </div>
            <div class="flex justify-end border-x-0 mb-4">
                 <button wire:click.prevent="create()" class="px-6 py-1 mr-2 h-7 text-xs font-serif text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300"><i class="fas fa-save fa-stack fa-lg"></i>{{__('Save')}} </button>
                <button wire:click.prevent="closeModal()" class="px-6 py-1 mr-2 h-7 text-xs font-serif text-center inline-flex items-center text-white bg-slate-500 rounded-lg hover:bg-slate-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-slate-300"><i class="fas fa-window-close fa-stack fa-lg"></i>{{__('Cancel')}} </button>
            </div> 
   </x-card>
</div>
