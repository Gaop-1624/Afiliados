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
                  <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('affiliates')}}</a>
                </div>
            </li>
        </ol>
   </nav>
   <x-titulo><i class="fab fa-affiliatetheme" style="color: rgb(166, 168, 166)"></i> &nbsp; {{__('List Affiliates')}}</x-titulo>
    <x-card2>
            <form method="GET">
                <div class="grid grid-cols-1 gap-1 lg:grid-cols-5 lg:gap-2">
                      @include('Tools.SearchBox')
                      <div class="justify-right px-1 py-4 mr-4">
                            <a href="{{ route('Reports.Afiliados') }}" title="{{__('Export to Pdf')}}">
                                <i class="far fa-file-pdf fa-2x" style="color: red"></i>
                            </a>  
                            <a href="{{ route('Export.Afiliados') }}" title="{{__('Export to Xls')}}">
                                <i class="far fa-file-excel fa-2x" style="color: green"></i>
                            </a> 
                            <a href="{{ route('Export.AfiliadosCsv') }}" title="{{__('Export to Csv')}}">
                                <i class="fas fa-file-csv fa-2x" style="color: #615dec"></i>
                            </a> 
                            <a href="#" wire:click="OpenModal()" title="{{__('Import Affiliates from Excel')}}">
                                <i class="fas fa-file-upload fa-2x"></i>
                            </a> 
                        </div>
                        <div class="flex justify-end px-1 py-4 mr-4">
                            @can('admin.afiliados.create')  
                                <a href="{{ route('Afiliados.Create') }}" wire.navigate class="h-8 px-10 py-1 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 whitespace-nowrap" title="{{__('New Affiliates')}}" >
                                    <i class="fas fa-plus-circle fa-lg fa-stack"></i> {{__( 'New' )}}
                                </a>
                            @endcan
                        </div>
                </div>
            </form> 
            <!-- Main modal -->
            @if ($modal)
                <div class="relative z-20" aria-labelledby="dialog-title" role="dialog" aria-modal="true" >
                        <div class="fixed inset-0  transition-opacity" aria-hidden="true"></div>
                            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded dark:border-gray-600 border-gray-200">
                                                <h3 class="text-xl font-serif text-white dark:text-white bg-blue-400 px-2 py-1 text-shadow-2xs w-full">
                                                    {{ __('Import Affiliates from Excel') }}
                                                </h3>
                                            </div>
                                            <!-- Modal header -->
                                                <div class="space-y-2 md:space-y-6 py-4 md:py-2">
                                                    <div class="px-4 py-4 border bg-slate-100  m-2">
                                                         <input wire:model="importfile" class="block w-full text-sm text-green-600 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file" accept=".xlsx,.csv,.xls">
                                                     </div>
                                                    <p class="mt-2 text-xs text-red-600">{{$errors->first('importfile')}} </p> 
                                                </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                            <button wire:click.prevent="Import()" class="px-6 py-1 mr-2 h-7 text-xs font-semibold text-center inline-flex items-center text-white bg-blue-700 rounded-sm hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300" title="Pagar Planiulla"><i class="fas fa-file-import"></i> &nbsp; {{__('Import')}} </button>
                                            <button wire:click.prevent="CloseModal()" class="px-2 py-1 mr-2 h-7 text-xs font-semibold text-center inline-flex items-center text-white bg-slate-500 rounded-sm hover:bg-slate-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-slate-300" title="Salir"><i class="fas fa-window-close fa-stack fa-lg"></i>{{__('Cancel')}} </button>
                                        </div>
                                </div>
                            </div>
                        </div>
                </div>  
            @endif
    </x-card2>
        @if ($afiliados->count())
                @foreach ($afiliados as $afiliado)            
                    <div class="items-start gap-1 inline-block  ml-12 mt-2">
                        <div class="flex flex-col gap-1 border-1 border-gray-200 rounded-lg p-2 bg-white dark:bg-gray-800 dark:border-gray-700">
                            <div class="leading-1.5 flex w-full max-w-[320px] flex-col bg-stone-50 shadow rounded-lg p-1">
                                <div class="flex items-start bg-neutral-secondary-soft rounded-xl p-1">
                                    <div class="me-1.5">
                                        <span class="flex items-center gap-2 text-sm font-medium text-heading pb-2">
                                            <span class="mb-1 px-4 text-xs font-bold text-white dark:text-white  bg-cyan-400 w-full"><i class="fab fa-affiliatetheme"></i> &nbsp; {{$afiliado->pnombre}} {{$afiliado->snombre}} {{$afiliado->papellido}}</span>
                                        </span>
                                            <div class="text-xs font-italic text-blue-400 border-b-2 mb-1">Cc: {{$afiliado->documento}} &nbsp; Celular: {{$afiliado->celular}}</div> 
                                            <span class="flex text-xs font-normal text-heading gap-2 justify-end pb-1">
                                            
                                             @php
                                                $ultimoContrato = $afiliado->contratos->last();
                                            @endphp
                                            @if($ultimoContrato)
                                                @if ($ultimoContrato->status == 1)
                                                    <button type="button" class="cursor-pointer text-white bg-blue-600 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold rounded-sm text-xs px-5  text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 py-1">
                                                        <i class="fas fa-check-circle fa-fw"></i> &nbsp; {{__('Asset')}}
                                                    </button>
                                                @elseif ($ultimoContrato->status == 3)
                                                    <button type="button" class="cursor-pointer text-white bg-violet-600 hover:bg-violet-800 focus:outline-none focus:ring-4 focus:ring-violet-300 font-semibold rounded-sm text-xs px-5  text-center me-2 dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800 py-1">
                                                        <i class="fas fa-info"></i> &nbsp; {{__('Income')}}
                                                    </button>
                                                @elseif ($ultimoContrato->status == 2)
                                                    <button type="button" class="cursor-pointer text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-semibold rounded-sm text-xs px-4  text-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 py-1">
                                                        <i class="fas fa-times-circle"></i> &nbsp; {{__('Retired')}}
                                                    </button>
                                                @endif
                                            @endif 
                                            <a href="#" wire:click="view({{$afiliado->id}})" class="inline-flex border px-1 py-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-green-400 dark:focus:ring-green-600" title="{{__('View')}}">
                                                <i class="fas fa-eye" style="color: rgb(93, 231, 208);"></i>
                                            </a>
                                            @can('admin.afiliados.edict') 
                                                <a href="#" wire:click="update({{$afiliado->id}})" class="inline-flex border px-1 py-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-blue-400 dark:focus:ring-blue-600" title="{{__('Edit')}}">
                                                    <i class="far fa-edit fa-fw fa-xl" style="color: blue;"></i>
                                                </a>
                                            @endcan
                                            @can('admin.afiliados.delete')  
                                                <a href="#" wire:click="delete({{$afiliado->id}})" class="inline-flex border px-1 py-1 hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-100 dark:bg-red-200 dark:hover:bg-red-400 dark:focus:ring-red-600" title="{{__('Delete')}}">
                                                    <i class="far fa-trash-alt fa-fw fa-xl" style="color: red;"></i>
                                                </a>
                                            @endcan    
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        @else
            <div class="px-6 py-4 text-red-400 font-bold font-serif text-sm">
                {{__('There are no records')}} .....
            </div>     
        @endif
        <div class="px-4 py-2">
            {{$afiliados->links()}}
        </div>    
</div>
