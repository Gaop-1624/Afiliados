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
                    <a href="{{ route('Planillas.Planillas') }}" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        {{__('Worksheets')}}
                    </a>
                </li>
               <li>
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('Trigger')}}</a>
                </div>
            </li>
        </ol>
   </nav>
   <x-titulo><i class="fas fa-file-medical-alt" style="color: rgb(166, 168, 166)"></i> &nbsp; {{__('Generate Worksheets')}}</x-titulo>
        <x-card2>
            <ul class="flex flex-wrap text-xs m-4 font-semibold text-center text-gray-500 border-b-2 border-gray-200 dark:border-gray-700 dark:text-gray-400">
                <li class="me-2">
                    <a href="#" wire:click.prevent="setActiveTab('Integrales')" class="{{ $activeTab === 'Integrales' ? 'inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500' : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300' }}">INTEGRALES</a>
                </li>
                <li class="me-2">
                    <a href="#" wire:click.prevent="setActiveTab('IngenieriaGada')" class="{{ $activeTab === 'IngenieriaGada' ? 'inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500' : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300' }}">INGENIERIA GA&DA</a>
                </li>
                <li class="me-2">
                    <a href="#" wire:click.prevent="setActiveTab('DygDistribuidora')" class="{{ $activeTab === 'DygDistribuidora' ? 'inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500' : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300' }}">DYG DISTRIBUIDORA</a>
                </li>
                <li class="me-2">
                    <a href="#" wire:click.prevent="setActiveTab('DisenoPlaneacion')" class="{{ $activeTab === 'DisenoPlaneacion' ? 'inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500' : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300' }}">DISEÑO Y PLANEACION</a>
                </li>
                <li>
                    <a href="#" wire:click.prevent="setActiveTab('DisenoArquitectura')" class="{{ $activeTab === 'DisenoArquitectura' ? 'inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500' : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300' }}">DISEÑO Y ARQUITECTURA</a>
                </li>
            </ul>
        </x-card2>
            <div>
                <x-card>
                    @if ($activeTab === 'Integrales')
                        <div id="Integrales">
                            <livewire:planillas.create-planillas />
                        </div>
                    @endif
                </x-card>
                <x-card>
                    @if ($activeTab === 'IngenieriaGada')
                        <div id="IngenieriaGada">
                            <livewire:planillas.create-planillas-ing />
                        </div>
                    @endif
                </x-card>
                <x-card>
                    @if ($activeTab === 'DygDistribuidora')
                        <div id="DygDistribuidora">
                            <livewire:planillas.create-planillas-distri />
                        </div>
                    @endif
                </x-card>
                <x-card>
                    @if ($activeTab === 'DisenoPlaneacion')
                        <div id="DisenoPlaneacion">
                            <livewire:planillas.create-planillas-dp />
                        </div>
                    @endif
                </x-card>
                <x-card>
                    @if ($activeTab === 'DisenoArquitectura')
                        <div id="DisenoArquitectura">
                            <livewire:planillas.create-planillas-da />
                        </div>
                    @endif
                </x-card>
            </div>
</div>
