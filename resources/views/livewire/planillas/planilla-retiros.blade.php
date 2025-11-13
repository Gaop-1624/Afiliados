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
                  <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('Withdrawal Forms')}}</a>
                </div>
            </li>
        </ol>
   </nav>
   <x-titulo><i class="fab fa-r-project" style="color: rgb(166, 168, 166)"></i> &nbsp; {{__('List of outstanding payments')}}</x-titulo>
    <x-card2>
            <div class="grid grid-cols-1 gap-1 lg:grid-cols-3 lg:gap-2">
                <div class="justify-right px-10 py-4 mr-4">
                      <a href="{{ route('Reports.Afiliados.SinPago') }}" title="{{__('Export to Pdf')}}">
                          <i class="far fa-file-pdf fa-2x" style="color: red"></i>
                      </a>  
                      <a href="{{ route('Export.Pagos') }}" title="{{__('Export to Xls')}}">
                          <i class="far fa-file-excel fa-2x" style="color: green"></i>
                      </a> 
                      <a href="{{ route('Export.PagosCsv') }}" title="{{__('Export to Csv')}}">
                          <i class="fas fa-file-csv fa-2x" style="color: #615dec"></i>
                      </a> 
                </div> 
                <div><h4 class="text-sm text-center font-semibold font-serif py-4 px-4 shadow-2xl m-2 uppercase"> {{__('Unpaid members')}} ({{ now()->format('F, Y') }})</h4></div>
                <div class="flex justify-end px-1 py-4 mr-4"> 
                        <a href="#" wire:click='RetirarAfiliados' class="h-8 px-10 py-1 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 whitespace-nowrap" title="{{__('Generate Worksheets')}}" >

{{--                       <a href="{{ route('Planillas.Create.Retiro') }}" wire:navigate class="h-8 px-10 py-1 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 whitespace-nowrap" title="{{__('Generate Worksheets')}}" >
 --}}                          <i class="far fa-times-circle fa-lg"></i> &nbsp; {{__( 'Withdraw' )}}
                      </a>
                </div>
            </div>
    </x-card2>

    <x-card2>    
        <div class="m-2 p-2 bg-white rounded shadow">
            <div class="flex items-center justify-end mb-2">
                <button wire:click="loadAfiliadosSinPago" class="px-2 py-1 text-xs bg-blue-600 text-white rounded">{{__('Update')}}</button>
            </div>
            @if(!empty($afiliadosSinPago) && $afiliadosSinPago->count())
                <table class="w-full text-sm">
                    <thead class="text-white bg-blue-400 border-b dark:border-neutral-500 dark:bg-neutral-400 mr-2">
                        <tr>
                            <th class="px-2 py-1 font-serif text-xs text-left uppercase">id</th>
                            <th class="px-2 py-1 font-serif text-xs text-left uppercase">{{__('Document')}}</th>
                            <th class="px-2 py-1 font-serif text-xs text-left uppercase">{{__('name')}}</th>
                            <th class="px-2 py-1 font-serif text-xs text-left uppercase">{{__('Health (EPS)')}}</th>
                            <th class="px-2 py-1 font-serif text-xs text-left uppercase">{{__('Cell phone')}}</th>

                            <th class="px-2 py-1 font-serif text-xs text-left uppercase">{{__('Contract')}}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($afiliadosSinPago as $i => $af)
                            @php $contr = $af->contratos->last(); @endphp
                            <tr class="{{ $i % 2 ? 'bg-gray-50' : '' }}">
                                <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{ $i+1 }}</td>
                                <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{ $af->documento ?? '' }}</td>
                                <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{ trim("{$af->pnombre} {$af->snombre} {$af->papellido} {$af->sapellido}") }}</td>
                                <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap lowercase">{{ $contr->eps->nombre }}</td>
                                <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap lowercase">{{ $af->celular ?? '' }}</td>
                                <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{ $contr ? ($contr->id . ' / ' . (number_format($contr->salario) ?? '')) : 'Sin contrato' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-xs text-gray-500">{{__('All members have paid this month or there are no active contracts')}}.</div>
            @endif
        </div>
    </x-card2>
</div>
