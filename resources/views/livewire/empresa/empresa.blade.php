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
                <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('Companys')}}</a>
                </div>
            </li>
        </ol>
   </nav>
   <x-titulo><i class="fas fa-building"></i> &nbsp; {{__('Update Company')}}</x-titulo>
    <x-card>
        <div class="grid grid-cols-2 gap-1 lg:grid-cols-4 lg:gap-2 mb-1  m-2">
               @if ($errors->first('t_documento_id')) 
                  <div class="px-1 py-2 border bg-slate-100">
                     <select wire:model="t_documento_id" id="small" class="font-semibold block w-full p-2 text-xs text-red-900 border border-red-300 rounded bg-red-50 focus:ring-red-500 focus:border-red-500">
                           <option selected>{{__('Document type')}}</option>
                           @foreach ( $TDocumentos as $td )
                              <option value="{{$td->id}}">{{$td->nombre}}</option>
                           @endforeach 
                     </select>
                     <p class="mt-2 text-xs text-red-600">{{$errors->first('t_documento_id')}} </p>
                  </div>
               @else
                  <div class="px-1 py-2 h-12 border bg-slate-100">
                     <select wire:model="t_documento_id" id="small" class="font-semibold block w-full p-2 mb-6 text-xs text-gray-500 border border-gray-300 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 h-8">
                              <option selected>{{__('Document type')}}</option>
                              @foreach ( $TDocumentos as $td )
                                 <option value="{{$td->id}}">{{$td->nombre}}</option>
                              @endforeach 
                     </select>
                  </div>
               @endif
                <div class="grid grid-cols-4 gap-2 lg:grid-cols-4 lg:gap-2 mb-1">
                @if ($errors->first('nit')) 
                    <div class="px-2 py-2 border bg-slate-100 col-span-3">
                        <div class="relative mb-4">
                            <input wire:model="nit" id="nit" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                            <label for="nit" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Document number')}}</label>
                            <p class="mt-2 text-xs text-red-600">{{$errors->first('nit')}} </p>
                        </div>
                    </div>
                @else
                    <div class="px-2 py-2 border bg-slate-100 h-12 col-span-3">
                        <div class="relative mb-4">
                            <input wire:model="nit" id="nit" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="nit" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Document number')}}</label>
                        </div> 
                    </div>
                @endif
                @if ($errors->first('dev')) 
                    <div class="px-1 py-2 border bg-slate-100 h-12">
                        <div class="relative mb-4">
                            <input wire:model="dev" id="dev" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                            <label for="dev" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Document number')}}</label>
                            <p class="mt-2 text-xs text-red-600">{{$errors->first('dev')}} </p>
                        </div>
                    </div>
                @else
                    <div class="px-1 py-2 border bg-slate-100 h-12">
                        <div class="relative mb-4">
                            <input wire:model="dev" id="dev" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="dev" class="absolute text-xs text-gray-500 font-bold duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Dv')}}</label>
                        </div> 
                    </div>
                @endif

                
            </div>
            @if ($errors->first('nombre')) 
                <div class="px-4 py-2 border bg-slate-100 col-span-2">
                    <div class="relative mb-4">
                        <input wire:model="nombre" id="nombre" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                        <label for="nombre" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Company name')}}</label>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('nombre')}} </p>
                    </div>
                </div>
            @else
                <div class="px-4 py-2 border bg-slate-100 col-span-2 h-12">
                    <div class="relative mb-4">
                        <input wire:model="nombre" id="nombre" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="nombre" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Company name')}}</label>
                    </div> 
                </div>
            @endif 
        </div>
        <div class="grid grid-cols-1 gap-2 lg:grid-cols-4 lg:gap-2 mb-2  m-2">
            @if ($errors->first('direccion')) 
                <div class="px-1 py-2 border bg-slate-100">
                    <div class="relative mb-4">
                        <input wire:model="direccion" id="direccion" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                        <label for="direccion" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Address')}}</label>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('direccion')}} </p>
                    </div>
                </div>
            @else
                <div class="px-1 py-2 border bg-slate-100 h-12">
                    <div class="relative mb-4">
                        <input wire:model="direccion" id="direccion" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="direccion" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Address')}}</label>
                    </div> 
                </div>
            @endif 
            @if ($errors->first('telefono')) 
                <div class="px-2 py-2 border bg-slate-100">
                    <div class="relative mb-4">
                        <input wire:model="telefono" id="telefono" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                        <label for="telefono" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Phone')}}</label>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('telefono')}} </p>
                    </div>
                </div>
            @else
                <div class="px-2 py-2 border bg-slate-100 h-12">
                    <div class="relative mb-4">
                        <input wire:model="telefono" id="documento" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="telefono" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Phone')}}</label>
                    </div> 
                </div>
            @endif 
            @if ($errors->first('celular')) 
                <div class="px-1 py-2 border bg-slate-100">
                    <div class="relative mb-4">
                        <input wire:model="celular" id="celular" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                        <label for="celular" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Cell phone')}}</label>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('celular')}} </p>
                    </div>
                </div>
            @else
                <div class="px-1 py-2 border bg-slate-100 h-12">
                    <div class="relative mb-4">
                        <input wire:model="celular" id="celular" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="celular" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Cell phone')}}</label>
                    </div> 
                </div>
            @endif 
            @if ($errors->first('ciudad_id')) 
                <div class="px-4 py-2 border bg-slate-100" wire:ignore>
                    <select wire:model.defer="ciudad_id" id="select2-ciudad"  class="select2-ciudad block w-full p-2 text-xs text-red-900 border border-red-300 rounded bg-red-50 focus:ring-red-500 focus:border-red-500">
                        <option selected>{{__('City')}}</option>
                        @foreach ( $Ciudades as $Ciudade )
                            <option value="{{$Ciudade->id}}">{{$Ciudade->nombre}}</option>
                        @endforeach 
                    </select>
                    <p class="mt-2 text-xs text-red-600">{{$errors->first('ciudad_id')}} </p>
                </div>
            @else
                <div  class="px-4 py-2 border bg-slate-100 h-12"  wire:ignore>
                    <select wire:model.defer="ciudad_id"  id="select2-ciudad" class="select2-ciudad block w-full p-2 mb-6 text-xs text-gray-900 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 h-8">
                           <option value="">{{__('City')}}</option>
                           @foreach ( $Ciudades as $Ciudade )
                               <option value="{{$Ciudade->id}}">{{$Ciudade->nombre}}</option>
                           @endforeach 
                    </select>
                </div>
            @endif 
        </div>
        <div class="grid grid-cols-1 gap-2 lg:grid-cols-4 lg:gap-2 mb-2  m-2">
                @if ($errors->first('email')) 
                    <div class="px-1 py-2 border bg-slate-100 ">
                        <div class="relative mb-4">
                            <input wire:model="email" id="email" type="email" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                            <label for="email" class="font-bold absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Email')}}</label>
                            <p class="mt-2 text-xs text-red-600">{{$errors->first('email')}} </p>
                        </div>
                    </div>
                @else
                    <div class="px-1 py-2 border bg-slate-100 h-12">
                        <div class="relative mb-4">
                            <input wire:model="email" id="email" type="email" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="email" class="font-bold absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Email')}}</label>
                        </div> 
                    </div>
                @endif
                @if ($errors->first('Pagina_web')) 
                    <div class="px-2 py-2 border bg-slate-100 ">
                        <div class="relative mb-4">
                            <input wire:model="Pagina_web" id="Pagina_web" type="web" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                            <label for="Pagina_web" class="font-bold absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Web page')}}</label>
                            <p class="mt-2 text-xs text-red-600">{{$errors->first('Pagina_web')}} </p>
                        </div>
                    </div>
                @else
                    <div class="px-2 py-2 border bg-slate-100  h-12">
                        <div class="relative mb-4">
                            <input wire:model="Pagina_web" id="Pagina_web" type="web" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="email" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Web page')}}</label>
                        </div> 
                    </div>
                @endif
                @if ($errors->first('arl_id')) 
                    <div class="px-1 py-2 border bg-slate-100">
                        <select wire:model="arl_id" class="font-semibold block w-full p-2 text-xs text-red-900 border border-red-300 rounded bg-red-50 focus:ring-red-500 focus:border-red-500">
                            <option selected>{{__('Arl')}}</option>
                            @foreach ( $Arls as $Arl )
                                <option value="{{$Arl->id}}">{{$Arl->nombre}}</option>
                            @endforeach 
                        </select>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('arl_id')}} </p>
                    </div>
                @else
                    <div class="px-1 py-2 border bg-slate-100 h-12">
                        <select wire:model="arl_id" id="arl" class="font-semibold block w-full p-2 mb-6 text-xs text-gray-500 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 h-8" >
                            <option selected>{{__('Arl')}}</option>
                            @foreach ( $Arls as $Arl )
                                <option value="{{$Arl->id}}">{{$Arl->nombre}}</option>
                            @endforeach 
                        </select>
                    </div>
                @endif
                @if ($errors->first('caja_id')) 
                    <div class="px-4 py-2 border bg-slate-100">
                        <select wire:model="caja_id" class="font-semibold block w-full p-2 text-xs text-red-900 border border-red-300 rounded bg-red-50 focus:ring-red-500 focus:border-red-500"  wire:model="ciudad_id">
                            <option selected>{{__('Caja Compensación')}}</option>
                            @foreach ( $Cajas as $Caja )
                                <option value="{{$Caja->id}}">{{$Caja->nombre}}</option>
                            @endforeach 
                        </select>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('arl_id')}} </p>
                    </div>
                @else
                    <div class="px-4 py-2 border bg-slate-100 h-12">
                        <select wire:model="caja_id" id="arl" class="font-semibold block w-full p-2 mb-6 text-xs text-gray-500 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 h-8" >
                            <option selected>{{__('Caja Compensación')}}</option>
                            @foreach ( $Cajas as $Caja )
                                <option value="{{$Caja->id}}">{{$Caja->nombre}}</option>
                            @endforeach 
                        </select>
                    </div>
                @endif 
        </div>
            <div class="mb-4 px-4 py-4 border bg-slate-100  m-2">
                <label class="block mb-2 text-sm font-bold text-blue-900" for="multiple_files">Logo Tipo</label>
                <input wire:model="file" class="block w-full text-sm text-green-600 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="multiple_files" type="file" multiple>
            </div> 
            <div class="flex justify-end border-x-0 mb-4">
                @can('admin.empresa.edit')
                    <button wire:click.prevent="update({{$Empresa}})" class="px-6 py-1 mr-2 h-7 text-xs font-semibold text-center inline-flex items-center text-white bg-blue-700 rounded-sm hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300"><i class="fas fa-save fa-stack fa-lg"></i>{{__('Update')}} </button>
                @endcan
                <button wire:click.prevent="closeModal()" class="px-6 py-1 mr-2 h-7 text-xs font-semibold text-center inline-flex items-center text-white bg-slate-500 rounded-sm hover:bg-slate-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-slate-300"><i class="fas fa-window-close fa-stack fa-lg"></i>{{__('Cancel')}} </button>
            </div>
    </x-card>
     <script> 
            $(document).ready(function() {
                $('.select2-ciudad').select2();
                
                $('.select2-ciudad').on('change', function (e) {
                    var data = $(this).val();
                    @this.set('ciudad_id', data);
                });
            });   
         
    </script>    
</div>
