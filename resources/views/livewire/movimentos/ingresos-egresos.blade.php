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
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-4">
        @php
            // Normalizar colección (soporta paginación y colección simple)
            $collection = $ingresosEgresos instanceof \Illuminate\Pagination\Paginator || $ingresosEgresos instanceof \Illuminate\Pagination\LengthAwarePaginator
                ? $ingresosEgresos->getCollection()
                : $ingresosEgresos;

            $ingresos = $collection->where('tipo', 0);
            $gastos   = $collection->where('tipo', 1);

            $sumIngresos = $ingresos->sum('entrada');
            $sumGastos   = $gastos->sum('salida');
            $neto        = $sumIngresos - $sumGastos;
        @endphp
        <!-- Ingresos -->
        <div>
            <x-card>
                <h2 class="font-bold text-xs text-stone-400 px-2">{{ __('Ingresos') }}</h2>
                @if($ingresos->count())
                    <table class="min-w-full text-sm mt-2">
                        <thead class="bg-blue-400 text-white text-xs">
                            <tr>
                                <th class="px-2 py-1">{{ __('Fecha') }}</th>
                                <th class="px-2 py-1">{{ __('Detalle') }}</th>
                                <th class="px-2 py-1 text-right">{{ __('Ingreso') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ingresos as $item)
                                <tr class="border-b text-xs">
                                    <td class="px-2 py-1">{{ $item->fecha_ingreso }}</td>
                                    <td class="px-2 py-1">{{ $item->detalle }}</td>
                                    <td class="px-2 py-1 text-right">${{ number_format($item->entrada) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="font-bold bg-gray-100">
                                <td colspan="2" class="px-2 py-1 text-xs">{{ __('Total Ingresos') }}</td>
                                <td class="px-2 py-1 text-right">${{ number_format($sumIngresos) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                @else
                    <div class="px-4 py-3 text-xs text-gray-500">{{ __('No hay ingresos en el conjunto actual.') }}</div>
                @endif
            </x-card>
        </div>

        <!-- Gastos -->
        <div>
            <x-card>
                <h2 class="font-bold text-xs text-stone-400 px-2">{{ __('Gastos') }}</h2>
                @if($gastos->count())
                    <table class="min-w-full text-sm mt-2">
                        <thead class="bg-red-400 text-white text-xs">
                            <tr>
                                <th class="px-2 py-1">{{ __('Fecha') }}</th>
                                <th class="px-2 py-1">{{ __('Detalle') }}</th>
                                <th class="px-2 py-1 text-right">{{ __('Gasto') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gastos as $item)
                                <tr class="border-b text-xs">
                                    <td class="px-2 py-1">{{ $item->fecha_ingreso }}</td>
                                    <td class="px-2 py-1">{{ $item->detalle }}</td>
                                    <td class="px-2 py-1 text-right">${{ number_format($item->salida) }}</td>
                                </tr>
                                @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="font-bold bg-gray-100">
                                <td colspan="2" class="px-2 py-1 text-xs">{{ __('Total Gastos') }}</td>
                                <td class="px-2 py-1 text-right">${{ number_format($sumGastos) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                @else
                    <div class="px-4 py-3 text-xs text-gray-500">{{ __('No hay gastos en el conjunto actual.') }}</div>
                @endif
            </x-card>
        </div>
    </div>

    <!-- Totales generales -->
    <div class="mt-4">
        <x-card>
            <div class="flex items-center justify-between text-sm font-bold">
                <div>{{ __('Total Ingresos:') }} ${{ number_format($sumIngresos) }}</div>
                <div>{{ __('Total Gastos:') }} ${{ number_format($sumGastos) }}</div>
                <div>{{ __('Neto:') }} ${{ number_format($neto) }}</div>
            </div>
        </x-card>
    </div>

    {{-- mantener paginación original si aplicaba --}}
    @if(method_exists($ingresosEgresos, 'links'))
        <div class="mt-3">
            {{ $ingresosEgresos->links() }}
        </div>
    @endif
</div>
