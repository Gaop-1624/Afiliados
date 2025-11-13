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
   <x-titulo><i class="fas fa-file-invoice-dollar"></i> &nbsp; {{__('Income and Expenses')}}</x-titulo>
    <x-card2>
        <form method="GET">
                <div class="grid grid-cols-1 gap-1 lg:grid-cols-5 lg:gap-4 border-2 rounded">
                       @include('Tools.SearchBox') 
                        <div class="flex justify-end px-1 py-4 mr-8">
                            <a href="{{ route('Reports.Afiliados') }}" title="{{__('Export to Pdf')}}" class="m-0.5">
                                <i class="far fa-file-pdf fa-2x" style="color: red"></i>
                            </a>  
                            <a href="{{ route('Export.Afiliados') }}" title="{{__('Export to Xls')}}" class="m-0.5">
                                <i class="far fa-file-excel fa-2x" style="color: green"></i>
                            </a> 
                            <a href="{{ route('Export.AfiliadosCsv') }}" title="{{__('Export to Csv')}}" class="m-0.5">
                                <i class="fas fa-file-csv fa-2x" style="color: #615dec"></i>
                            </a> 
                        </div>

                        <div class="flex justify-end px-1 py-4 mr-4"> 
                            <a href="{{ route('Movimiento.CreateIngresosEgresos') }}" wire:navigate class="h-8 px-10 py-1 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 whitespace-nowrap" title="{{__('New Movement')}}" >
                                <i class="fas fa-plus-circle fa-lg fa-stack"></i> {{__( 'New' )}}
                            </a>
                        </div>
                </div>
        </form> 
    </x-card2>
    <div class="grid grid-cols-1 gap-1 lg:grid-cols-8 lg:gap-2">
                    <div class="col-span-6">
                            @if ($ingresosEgresos->count()) 
                                <x-card>
                                    <h1 class="px-2 shadow-2xl font-bold text-stone-400 text-xs uppercase">{{__('List of Income and Expenses')}}</h1>
                                    <table class="min-w-full text-sm font-light text-center m-2">
                                            <thead class="text-white bg-blue-400">
                                                <tr>
                                                    <th scope="col" class="px-2 py-1 font-serif text-xs">{{__('date')}}</th>
                                                    <th scope="col" class="px-2 py-1 font-serif text-xs">{{__('type')}}</th>
                                                    <th scope="col" class="px-2 py-1 font-serif text-xs">{{__('Detail')}}</th>
                                                    <th scope="col" class="px-2 py-1 font-serif text-xs">{{__('Income')}}</th>
                                                    <th scope="col" class="px-2 py-1 font-serif text-xs">{{__('Bills')}}</th>
                                                    <th scope="col" class="px-2 py-1 font-serif text-xs">{{__('Total')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($ingresosEgresos as $ingresosEgreso)
                                                    <tr class="border-b dark:border-neutral-600">
                                                        <td class="px-2 py-1 text-xs whitespace-nowrap">{{ $ingresosEgreso->fecha_ingreso }}</td>
                                                        @if ($ingresosEgreso->tipo == 0)
                                                            <td class="px-2 py-1 text-xs text-center whitespace-nowrap">{{__('Income')}}</td>
                                                        @else
                                                            <td class="px-2 py-1 text-xs text-center whitespace-nowrap">{{__('Expenses')}}</td>
                                                        @endif
                                                        
                                                        <td class="px-2 py-1 text-xs text-center whitespace-nowrap">{{ $ingresosEgreso->detalle }}</td>
                                                        <td class="px-2 py-1 text-xs text-center whitespace-nowrap">${{ number_format($ingresosEgreso->entrada) }}</td>
                                                        <td class="px-2 py-1 text-xs text-center whitespace-nowrap">${{ number_format($ingresosEgreso->salida)}}</td>
                                                        <td class="px-2 py-1 text-xs text-center whitespace-nowrap">${{ number_format($ingresosEgreso->total) }}</td>
                                                    </tr>   
                                                @endforeach 
                                            </tbody>       
                                    </table>
                                </x-card>
                            @else
                                <div class="px-6 py-4 text-red-400 font-bold font-serif text-sm">
                                    {{__('There are no records')}} .....
                                </div>     
                            @endif
                            <div class="px-4 py-2">
                                {{$ingresosEgresos->links()}}
                            </div>    
                    </div>
                
                <div class="col-span-2 bg-stone-100">
                    <x-card>
                        <h1 class="px-2 shadow-2xl font-bold text-stone-400 text-xs text-center">{{__('Totals')}}</h1>
                        <div class="col-span-2">
                            <div class="bg-blue-400 text-white text-center py-1 m-2 font-bold font-serif"></div>
                                <div class="grid grid-cols-1 gap-1 lg:grid-cols-2 lg:gap-0 m-2 mb-1 border-2 shadow-2xl">
                                    <div class="bg-white py-2">
                                        <div class="mb-2 text-sm m-1 py-2">
                                            <span class="m-1 font-serif text-gray-800 text-xs">{{__('Income')}}:</span>
                                        </div>
                                        <div class="mb-2 text-sm m-1">
                                            <span class="m-1 font-serif text-gray-800 text-xs">{{__('Expenses')}}:</span>
                                        </div>
                                    </div>
                                    <div class="bg-white py-4">
                                        <div class="m-1 border text-center">
                                            <input type="text" wire:model="TotalIngresos" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-xs rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-6 font-bold" value=" ${{number_format($TotalIngresos)}}" disabled readonly>
                                        </div>
                                        <div class="m-1 border text-center">
                                            <input type="text" wire:model="TotalGastos" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-xs rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-6 font-bold" value=" ${{number_format($TotalGastos)}}" disabled readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-blue-400 text-white text-center py-1 m-2 font-bold font-serif"></div>
                                <div class="grid grid-cols-1 gap-1 lg:grid-cols-2 lg:gap-0 m-2 mb-1 border-2 shadow-2xl bg-stone-100">
                                    <div class="bg-white py-2">
                                        <div class="mb-2 text-sm m-1 py-2">
                                            <span class="m-1 font-serif text-gray-800 text-xs">{{__('Revenue')}}:</span>
                                        </div>
                                    </div>
                                    <div class="bg-white py-4">
                                        <div class="text-sm m-1 border text-center">
                                            <input type="text" wire:model="subTotal" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-6 font-bold" value="${{number_format($Total)}}" disabled readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </x-card>
                </div>
    </div>
</div>
