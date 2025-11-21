<div>
            @if ($pagos->count())
                <div class="grid grid-cols-1 gap-1 lg:grid-cols-2 lg:gap-2 m-2">
                    <div class="text-white font-bold font-serif text-sm shadow-2xl border-2 bg-stone-400 m-2">
                        <p class="m-1">DYG DISTRIBUIDORA S.A.S. Nit.: 901213214-2</p>
                    </div>
                    <div class="flex justify-end  py-2">
                         @can('admin.planillas.create')
                            <button wire:click.prevent="Create()" class="px-6 py-1 mr-2 h-7 text-xs font-semibold text-center inline-flex items-center text-white bg-blue-700 rounded-sm hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300" title="Pagar Planiulla"> &nbsp; {{__('Create Spreadsheet')}} </button>
                         @endcan
                    </div>
                 </div>
                <x-card2>
                    <table class="min-w-full font-light text-center m-0.5 ms-1 mb-4">
                            <thead class="text-white bg-blue-400 border-b dark:border-neutral-500 dark:bg-neutral-400 mr-2">
                                <tr>
                                    <th class="px-2 py-1 font-serif text-xs text-left uppercase" >{{__('Document')}}</th>
                                    <th class="px-2 py-1 font-serif text-xs text-left uppercase" >{{__('Name')}}</th>
                                    <th class="px-2 py-1 font-serif text-xs text-left uppercase" >{{__('Day')}}</th>
                                    <th class="px-2 py-1 font-serif text-xs text-left uppercase" >{{__('Eps')}}</th>
                                    <th class="px-2 py-1 font-serif text-xs text-left uppercase" >{{__('Arl')}}</th>
                                    <th class="px-2 py-1 font-serif text-xs text-left uppercase" >{{__('Afp')}}</th>
                                    <th class="px-2 py-1 font-serif text-xs text-left uppercase" >{{__('Caja')}}</th>
                                </tr>
                            </thead>
                            <tbody class="mb-4">
                                @foreach ($pagos as $pago)
                                        <tr>
                                            <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{$pago->contrato->afiliado->tdocumentos->alias}} {{$pago->contrato->afiliado->documento}}</td>
                                            <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{Str::lower($pago->contrato->afiliado->pnombre)}} {{Str::lower($pago->contrato->afiliado->snombre)}} {{Str::lower($pago->contrato->afiliado->papellido)}}</td>
                                            <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{Str::lower($pago->dias)}}</td>
                                            <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{Str::lower($pago->contrato->eps->nombre)}}</td>
                                            <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{$pago->contrato->claseArl}}</td>
                                            <td class="py-1 px-2 font-sans text-xs text-left whitespace-nowrap">{{Str::lower($pago->contrato->afp->nombre)}}</td>
                                             @if ($pago->contrato->caja_id == 3)
                                                <td class="py-1 px-1 font-sans text-xs text-left whitespace-nowrap">Sin caja</td>
                                             @else
                                                <td class="py-1 px-1 font-sans text-xs text-left whitespace-nowrap">Confenalco Valle</td>
                                             @endif

                                        </tr>
                                @endforeach
                            </tbody>
                    </table> 
                </x-card2>
                <x-card>
                    <span class="flex border-2 text-xl bg-stone-200 font-seric justify-end shadow-2xl m-1 mr-2">Total Planilla: $ {{number_format($totales)}}</span>
                </x-card>
            @else
                <div class="px-6 py-4 text-red-400 font-bold font-serif text-sm">
                    {{__('There are no forms')}} ..... DYG DISTRIBUIDORA S.A.S.
                </div>     
            @endif 
</div>
