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
                <a href="{{ route('Afiliados') }}" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    {{__('affiliates')}}
                </a>
            </li>
            <li>
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__("view")}}</a>
                </div>
            </li>
        </ol>
   </nav>
  
   <x-titulo><i class="fab fa-affiliatetheme" style="color: rgb(166, 168, 166)"></i> &nbsp; {{__('view affiliates')}}</x-titulo>
    <x-card>
        <div class="grid grid-cols-2 gap-1 lg:grid-cols-3 lg:gap-2 m-2 mb-4">
            <x-card>
                <div class="relative m-2">
                    <input type="text" id="small_outlined" class="block px-2.5 pb-1.5 pt-3 w-full text-xs font-bold text-gray-900 bg-stone-100 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $afiliados->pnombre }} {{ $afiliados->snombre }} {{ $afiliados->papellido }} {{ $afiliados->sapellido }}" disabled/>
                    <label for="small_outlined" class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Names')}}</label>
                </div>
                 <div class="relative m-2">
                    <input type="text" id="small_outlined" class="block px-2.5 pb-1.5 pt-3 w-full text-xs font-bold text-gray-900 bg-stone-100 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $afiliados->documento }}" disabled/>
                    <label for="small_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{ $afiliados->tdocumentos->alias }}</label>
                </div>
                <div class="relative m-2">
                    <input type="text" id="small_outlined" class="block px-2.5 pb-1.5 pt-3 w-full text-xs font-bold text-gray-900 bg-stone-100 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $afiliados->direccion }} {{ $afiliados->ciudad->nombre }}" disabled/>
                    <label for="small_outlined" class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Address')}}</label>
                </div>
                 <div class="relative m-2">
                    <input type="text" id="small_outlined" class="block px-2.5 pb-1.5 pt-3 w-full text-xs font-bold text-gray-900 bg-stone-100 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $afiliados->telefono }} - {{ $afiliados->celular }}" disabled/>
                    <label for="small_outlined" class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Telephones')}}</label>
                </div>
           </x-card>
            <x-card>
                <div class="relative m-2">
                    <input type="text" id="small_outlined" class="block px-2.5 pb-1.5 pt-3 w-full text-xs font-bold text-gray-900 bg-stone-100 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $afiliados->email }}" disabled/>
                    <label for="small_outlined" class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Email')}}</label>
                </div>
                <div class="relative m-2">
                    @php
                        $ultimoContrato = $afiliados->contratos->last();
                    @endphp
                    <input type="text" id="small_outlined" class="block px-2.5 pb-1.5 pt-3 w-full text-xs font-bold text-gray-900 bg-stone-100 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $ultimoContrato->eps->nombre }}" disabled/>
                    <label for="small_outlined" class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Health (EPS)')}}</label>
                </div>            
                <div class="relative m-2">
                    <input type="text" id="small_outlined" class="block px-2.5 pb-1.5 pt-3 w-full text-xs font-bold text-gray-900 bg-stone-100 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="Riesgo:  {{ $ultimoContrato->claseArl }}  -  {{ $ultimoContrato->caja_id == "1" ? $ultimoContrato->cajas->nombre : "SIN CAJA"}}" disabled/>
                    <label for="small_outlined" class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Risks (ARL) and Cash')}}</label>
                </div>              
                 <div class="relative m-2">
                    <input type="text" id="small_outlined" class="block px-2.5 pb-1.5 pt-3 w-full text-xs font-bold text-gray-900 bg-stone-100 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value=" {{ $ultimoContrato->afp->nombre }}" disabled/>
                    <label for="small_outlined" class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Pensions (AFP)')}}</label>
                </div>
            </x-card>
            <x-card>
                <div class="bg-stone-400 text-white text-center py-1 m-2 font-bold font-serif mb-1">{{__('Contracts')}}</div>
                <div class="flex justify-center">
                    @foreach ($afiliados->contratos as $afiliado)
                        @if ($afiliado->fecha_retiro)
                            <button type="button" wire:click.prevent="ContratosRetirados()" class="mb-2 m-2 cursor-pointer text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-semibold rounded-sm text-xs px-6  text-center me-4 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 py-1" title="Aportes del Contrato">
                                <i class="fas fa-times-circle"></i> &nbsp; {{__('Retired')}}
                            </button>                       
                        @else
                            <button type="button" wire:click.prevent="ContratosActivos()" class="cursor-pointer mb-2 m-2 text-white bg-blue-600 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold rounded-sm text-xs px-6  text-center me-4 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 py-1" title="Aportes del Contrato">
                                <i class="fas fa-check-circle fa-fw"></i> &nbsp; {{__('Asset')}}
                            </button>
                        @endif
                    @endforeach
                </div>
            </x-card>
        </div>
    </x-card>
    <br> 
    <x-card>
        @if ($pagos->count())
            <h1 class="px-2 shadow-2xl font-bold text-blue-400 text-xl">{{__('Payment List')}}</h1>
            <table class="min-w-full text-sm font-light text-center m-2">
                    <thead class="text-white bg-blue-400">
                        <tr>
                            <th scope="col" class="px-2 py-1 font-serif text-xs">Id</th>
                            <th scope="col" class="px-2 py-1 font-serif text-xs">{{__('Receipt')}}</th>
                            <th scope="col" class="px-2 py-1 font-serif text-xs">{{__('Period')}}</th>
                            <th scope="col" class="px-2 py-1 font-serif text-xs">{{__('Payroll Number')}}</th>
                            <th scope="col" class="px-2 py-1 font-serif text-xs">{{__('Payment Date')}}</th>
                            <th scope="col" class="px-2 py-1 font-serif text-xs">{{__('Total Paid')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagos as $item)
                            <tr class="border-b dark:border-neutral-600">
                                <td class="px-2 py-1 text-xs whitespace-nowrap">{{ $item->id }}</td>
                                <td class="px-2 py-1 text-xs text-center whitespace-nowrap">{{ $item->codigo }}</td>
                                <td class="px-2 py-1 text-xs text-center whitespace-nowrap">{{ $item->periodo }}</td>
                                <td class="px-2 py-1 text-xs text-center whitespace-nowrap">{{ $item->nplanilla }}</td>
                                <td class="px-2 py-1 text-xs text-center whitespace-nowrap">{{ $item->fecha_pago}}</td>
                                <td class="px-2 py-1 text-xs text-center whitespace-nowrap">${{ number_format($item->total_pagado) }}</td>
                            </tr>   
                        @endforeach
                    </tbody>       
            </table>
        @else
                 <div class="m-4 py-2 text-blue-600 font-semibold border-b-4  text-sm">
                    {{__('There are no contributions')}} .....
                </div>      
        @endif
        <div class="px-4 py-2">
           {{$pagos->links()}}
        </div>   
    </x-card> 
       {{--  <br>  
        <div class="flex justify-end border-x-0 mb-4">
            <button wire:click.prevent="closeModal()" class="px-6 py-1 mr-2 h-7 text-xs font-serif text-center inline-flex items-center text-white bg-slate-500 rounded-sm hover:bg-slate-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-slate-300"><i class="fas fa-reply-all"></i> &nbsp; {{__('Go out')}} </button>
        </div>  --}}
   
</div>
