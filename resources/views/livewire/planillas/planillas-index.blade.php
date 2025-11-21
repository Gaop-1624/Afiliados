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
                  <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('Worksheets')}}</a>
                </div>
            </li>
        </ol>
   </nav>
   <x-titulo><i class="fas fa-file-medical-alt" style="color: rgb(166, 168, 166)"></i> &nbsp; {{__('List of Forms')}}</x-titulo>
    <x-card2>
        <div class="grid grid-cols-1 gap-1 lg:grid-cols-5 lg:gap-2">
                @include('Tools.SearchBox')
                <div class="justify-right px-10 py-4 mr-4">
                      <a href="{{ route('Reports.Pagos') }}" title="{{__('Export to Pdf')}}">
                          <i class="far fa-file-pdf fa-2x" style="color: red"></i>
                      </a>  
                      <a href="{{ route('Export.Pagos') }}" title="{{__('Export to Xls')}}">
                          <i class="far fa-file-excel fa-2x" style="color: green"></i>
                      </a> 
                      <a href="{{ route('Export.PagosCsv') }}" title="{{__('Export to Csv')}}">
                          <i class="fas fa-file-csv fa-2x" style="color: #615dec"></i>
                      </a> 
                </div>
                <div class="flex justify-end px-1 py-4 mr-4">
                    @can('admin.planillas.create') 
                      <a href="{{ route('Planillas.Generar') }}" wire:navigate class="h-8 px-10 py-1 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 whitespace-nowrap" title="{{__('Generate Worksheets')}}" >
                             <i class="fas fa-plus-circle fa-lg fa-stack"></i> {{__( 'New' )}}
                      </a>
                    @endcan
                </div>
        </div>
    </x-card2>
    @if ($planillas->count())
        @foreach ($planillas as $planilla)  
            <div class="inline-block items-start gap-2.5 m-1 mb-4 ml-8">
                <div class="flex flex-col gap-1">
                        <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-2 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                        <div class="flex items-start bg-gray-50 dark:bg-gray-600 rounded-xl ">
                        <div class="me-2">
                            <span class="px-2 text-xs font-bold text-white dark:text-white  bg-cyan-400 shadow-2xs w-full"><i class="fas fa-file-medical-alt" style="color: white"></i> &nbsp; {{$planilla->empresa->nombre}} </span>
                            <span class="flex items-center gap-2 text-sm font-medium text-gray-900 dark:text-white pb-2">
                                <svg fill="none" aria-hidden="true" class="w-5 h-5 shrink-0" viewBox="0 0 20 21">
                                    <g clip-path="url(#clip0_3173_1381)">
                                        <path fill="#E2E5E7" d="M5.024.5c-.688 0-1.25.563-1.25 1.25v17.5c0 .688.562 1.25 1.25 1.25h12.5c.687 0 1.25-.563 1.25-1.25V5.5l-5-5h-8.75z"/>
                                        <path fill="#B0B7BD" d="M15.024 5.5h3.75l-5-5v3.75c0 .688.562 1.25 1.25 1.25z"/>
                                        <path fill="#CAD1D8" d="M18.774 9.25l-3.75-3.75h3.75v3.75z"/>
                                        <path fill="#F15642" d="M16.274 16.75a.627.627 0 01-.625.625H1.899a.627.627 0 01-.625-.625V10.5c0-.344.281-.625.625-.625h13.75c.344 0 .625.281.625.625v6.25z"/>
                                        <path fill="#fff" d="M3.998 12.342c0-.165.13-.345.34-.345h1.154c.65 0 1.235.435 1.235 1.269 0 .79-.585 1.23-1.235 1.23h-.834v.66c0 .22-.14.344-.32.344a.337.337 0 01-.34-.344v-2.814zm.66.284v1.245h.834c.335 0 .6-.295.6-.605 0-.35-.265-.64-.6-.64h-.834zM7.706 15.5c-.165 0-.345-.09-.345-.31v-2.838c0-.18.18-.31.345-.31H8.85c2.284 0 2.234 3.458.045 3.458h-1.19zm.315-2.848v2.239h.83c1.349 0 1.409-2.24 0-2.24h-.83zM11.894 13.486h1.274c.18 0 .36.18.36.355 0 .165-.18.3-.36.3h-1.274v1.049c0 .175-.124.31-.3.31-.22 0-.354-.135-.354-.31v-2.839c0-.18.135-.31.355-.31h1.754c.22 0 .35.13.35.31 0 .16-.13.34-.35.34h-1.455v.795z"/>
                                        <path fill="#CAD1D8" d="M15.649 17.375H3.774V18h11.875a.627.627 0 00.625-.625v-.625a.627.627 0 01-.625.625z"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_3173_1381">
                                        <path fill="#fff" d="M0 0h20v20H0z" transform="translate(0 .5)"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <p class="text-xs mb-4">{{__('Form Number')}}:</p><b>{{$planilla->nplanilla}}</b>
                                @if ($planilla->status == 0)
                                    <button  class="block text-white bg-blue-600 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-xs px-4 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" title="Pagar Planilla"
                                        wire:click="OpenModal({{ $planilla->id }})"> 
                                        <i class="fab fa-cc-amazon-pay fa-lg"></i>
                                    </button>
                                @else
                                    <button disabled data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-600 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-xs px-4 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" title="La Planilla ya fue Pagada">
                                        <i class="fas fa-hands-helping fa-lg"></i>
                                    </button>
                                @endif
                             {{--   ==================== --}} 
                            </span>
                       
                                @if ($planilla->status == 0)
                                    <button wire:click.prevent="ExpotPlanillasAportes({{$planilla->id}})" class="cursor-pointer inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-50 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:ring-gray-600" type="button" title="{{__('Download Contribution Form Online')}}">
                                        <svg class="w-4 h-4 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
                                            <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                        </svg>
                                    </button>
                                    <button wire:click.prevent="ExpotPlanillasSimple({{$planilla->id}})" class="cursor-pointer inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-50 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:ring-gray-600" type="button" title="{{__('Download Simple Payment Form')}}">
                                        <svg class="w-4 h-4 text-blue-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
                                            <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                        </svg> 
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
         <!-- Main modal -->
         @if ($modal)  
                                    <div class="relative z-20" aria-labelledby="dialog-title" role="dialog" aria-modal="true">
                                        <div class="fixed inset-0  transition-opacity" aria-hidden="true"></div>
                                            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                            <!-- Modal header -->
                                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded dark:border-gray-600 border-gray-200">
                                                                <h3 class="text-sm font-serif text-white dark:text-white bg-blue-400 px-6 py-1 text-shadow-2xs w-full">
                                                                    {{__('Pay Form')}}
                                                                </h3>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="grid grid-cols-2 gap-1 lg:grid-cols-2 lg:gap-2 m-4">
                                                                @if ($errors->first('Nplanilla')) 
                                                                    <div class="px-1 py-2 border bg-slate-100 h-12">
                                                                        <div class="relative">
                                                                            <input wire:model="Nplanilla" id="Nplanilla" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                                                                            <label for="Nplanilla" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Return Number')}}</label>
                                                                            <p class="mt-2 text-xs text-red-600">{{$errors->first('Nplanilla')}} </p>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="px-1 py-2 border bg-slate-100 h-12">
                                                                        <div class="relative">
                                                                            <input wire:model="Nplanilla" id="Nplanilla" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                                                            <label for="Nplanilla" class="absolute text-xs duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto ">{{__('Return Number')}}</label>
                                                                        </div> 
                                                                    </div>
                                                                @endif 
                                                                @if ($errors->first('Vpagado')) 
                                                                    <div class="px-1 py-2 border bg-slate-100 h-12">
                                                                        <div class="relative">
                                                                            <input wire:model="Vpagado" id="Vpagado" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                                                                            <label for="Vpagado" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Value Paid')}}</label>
                                                                            <p class="mt-2 text-xs text-red-600">{{$errors->first('Vpagado')}} </p>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="px-1 py-2 border bg-slate-100 h-12">
                                                                        <div class="relative">
                                                                            <input wire:model="Vpagado" id="Vpagado" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                                                            <label for="Vpagado" class="absolute text-xs duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto ">{{__('Value Paid')}}</label>
                                                                        </div> 
                                                                    </div>
                                                                @endif 
                                                            </div>
                                                        </div>
                                                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                            <button wire:click.prevent="PagarPlanilla" class="px-6 py-1 mr-2 h-7 text-xs font-semibold text-center inline-flex items-center text-white bg-blue-700 rounded-sm hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300" title="Pagar Planiulla"><i class="far fa-money-bill-alt fa-lg"></i> &nbsp; {{__('Pay')}} </button>
                                                            <button wire:click.prevent="CloseModal()" class="px-2 py-1 mr-2 h-7 text-xs font-semibold text-center inline-flex items-center text-white bg-slate-500 rounded-sm hover:bg-slate-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-slate-300" title="Salir"><i class="fas fa-window-close fa-stack fa-lg"></i>{{__('Cancel')}} </button>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                        </div>
                                    </div> 
         @endif  
    @else
        <div class="px-6 py-4 text-red-400 font-bold font-serif text-sm">
            {{__('There are no records')}} .....
        </div>     
    @endif
    <div class="px-4 py-2">
        {{$planillas->links()}}
    </div>
</div>
