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
                  <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('Income and Expenses per year')}}</a>
                </div>
            </li>
        </ol>
   </nav>
   <x-titulo><i class="fas fa-vote-yea" style="color: rgb(166, 168, 166)"></i> &nbsp; {{__('Annual Closing')}}</x-titulo>
    <x-card2>
        <div class="grid grid-cols-2 gap-1 lg:grid-cols-3 lg:gap-2 bg-stone-50">
            <div class="flex gap-2 items-center mb-4 m-4">
                <input type="date" wire:model="fecha" class="border rounded px-2 py-1 text-sm" />
                <button type="button" wire:click="$refresh" class="px-3 py-1 bg-blue-600 text-white rounded text-xs">Filtrar</button>
            </div>
            <div class="flex items-center justify-Left m-4">
                <label class="text-xs me-2">{{__('Years')}}:</label>
                <select wire:model="year" class="border rounded px-8 py-1 text-sm">
                    @php
                        $start = now()->year - 5;
                        $end = now()->year + 1;
                    @endphp
                    @for($y = $start; $y <= $end; $y++)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endfor
                </select>
            </div>

            <div>
                <div class="justify-center px-4 py-4 text-center">
                    <div class="border-2 bg-white rounded p-1">  
                        <a href="{{ route('Reports.IngresosEgresos.Año', ['id' => $year]) }}" clas    s="inline-flex border py-1 px-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('Print')}}">
                            <i class="fas fa-print"></i>
                        </a>  
                        <a href="#" wire:click="limpiar()" class="inline-flex border py-1 px-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('Undo')}}">
                            <i class="fas fa-undo-alt fa-xl"></i>
                        </a>  
                        <a href="#" wire:click="closeModal()" class="inline-flex border py-1 px-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('Close')}}">
                            <i class="far fa-window-close fa-xl"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </x-card2>

{{-- Tabla de totales por mes --}}
    <x-card class="mt-3">
        <h2 class="px-2 py-2 font-bold text-sm">{{ __('Totals by Month of the Year : ') }} {{ $year }} </h2>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-blue-400 text-white">
                    <tr>
                        <th class="px-2 py-1 text-xs">{{__('Mes')}}</th>
                        <th class="px-2 py-1 text-xs">{{__('Income')}}</th>
                        <th class="px-2 py-1 text-xs">{{__('Bills')}}</th>
                        <th class="px-2 py-1 text-xs">{{__('Neto')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalEntradas = 0;
                        $totalSalidas = 0;
                    @endphp

                    @foreach($monthlyTotals as $m)
                        @php
                            $totalEntradas += $m['entradas'];
                            $totalSalidas  += $m['salidas'];
                        @endphp
                        <tr class="border-b">
                            <td class="px-2 py-1 text-xs">{{ $m['label'] }}</td>
                            <td class="px-2 py-1 text-xs">${{ number_format($m['entradas'], 0) }}</td>
                            <td class="px-2 py-1 text-xs">${{ number_format($m['salidas'], 0) }}</td>
                            <td class="px-2 py-1 text-xs">${{ number_format($m['neto'], 0) }}</td>
                        </tr>
                    @endforeach

                    <tr class="font-bold bg-gray-200">
                        <td class="px-2 py-1 text-xs">{{__('Total Año')}}</td>
                        <td class="px-2 py-1 text-xs">${{ number_format($totalEntradas, 0) }}</td>
                        <td class="px-2 py-1 text-xs">${{ number_format($totalSalidas, 0) }}</td>
                        <td class="px-2 py-1 text-xs">${{ number_format($totalEntradas - $totalSalidas, 0) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-card>
</div>
