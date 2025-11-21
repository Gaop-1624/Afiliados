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
                <a href="{{ route('Admin.Roles') }}" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    {{__('Roles')}}
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('New')}}</a>
                </div>
            </li>
        </ol>
   </nav>
   <x-titulo><i class="fab fa-critical-role"></i> &nbsp; {{__('New Role')}}</x-titulo>
    <x-card2>
             <div class="grid grid-cols-1 gap-1 lg:grid-cols-2 lg:gap-2 m-2">
                @if ($errors->first('name')) 
                    <div class="px-4 py-2 border bg-slate-100">
                        <div class="relative">
                            <input wire:model="name" id="name" type="text" autocomplete="off" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                            <label for="name" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Name role')}}</label>
                            <p class="mt-2 text-xs text-red-600">{{$errors->first('name')}} </p>
                        </div>
                    </div>
                @else
                     <div class="px-4 py-2 border bg-slate-100 h-12">
                        <div class="relative">
                            <input wire:model="name" id="name" type="text" autocomplete="off" class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="name" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Name role')}}</label>
                        </div> 
                      </div>
                @endif
                @if ($errors->first('description')) 
                      <div class="px-4 py-2 border bg-slate-100">
                           <div class="relative">
                                <input wire:model="description" id="dev" type="text" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                                <label for="description" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Role description')}}</label>
                                <p class="mt-2 text-xs text-red-600">{{$errors->first('description')}} </p>
                            </div>
                      </div>
                @else
                      <div class="px-4 py-2 border bg-slate-100 h-12">
                            <div class="relative">
                                <input wire:model="description" id="email" type="email" class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="description" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Role description')}}</label>
                            </div> 
                     </div>
                @endif
             </div>
    </x-card2>
    <x-card2>
             <label class="m-6 px-4 mb-0 bg-blue-400 block text-sm font-serif text-white dark:text-white">{{__('List of Permits')}}</label>
             <div class="grid grid-cols-2 gap-1 lg:grid-cols-4 lg:gap-2 mb-0">
                    <div>
                        <h2 class="m-8 border-b-4 text-xs font-serif font-semibold text-gray-900 dark:text-white mb-0">{{ __('Company') }}</h2>
                        <ul class="m-4 w-48 text-xs font-serif text-gray-900 bg-white border border-s-4 border-gray-200 rounded-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white shadow-lg">
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{1}}" id="vue-checkbox" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ms-2 text-xs font-medium text-gray-900 dark:text-gray-300">{{__('Update Company Data')}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="m-8 border-b-4 text-xs font-serif font-semibold text-gray-900 dark:text-white mb-0">{{ __('Users') }}</h2>
                        <ul class="m-4 w-48 text-xs font-serif text-gray-900 bg-white border border-s-4 border-gray-200 rounded-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white shadow-lg">
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{3}}" id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('User List')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{7}}" id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ms-2 text-xs font-medium text-gray-900 dark:text-gray-300">{{__('Create Users')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{12}}" id="react-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="react-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Edit Users')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{17}}" id="angular-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="angular-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Delete Users')}}</label>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                    <div>
                        <h2 class="m-8 border-b-4 text-xs font-serif font-semibold text-gray-900 dark:text-white mb-0">{{ __('Roles') }}</h2>
                        <ul class="m-4 w-48 text-xs font-serif text-gray-900 bg-white border border-s-4 border-gray-200 rounded-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white shadow-lg">
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{2}}" id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ms-2 text-xs font-medium text-gray-900 dark:text-gray-300">{{__('Role list')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{8}}" id="react-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="react-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Create Roles')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{13}}" id="angular-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="angular-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Edit Rol')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{18}}" id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Delete Roles')}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="m-8 border-b-4 text-xs font-serif font-semibold text-gray-900 dark:text-white mb-0">{{ __('Affiliates') }}</h2>
                        <ul class="m-4 w-48 text-xs font-serif text-gray-900 bg-white border border-s-4 border-gray-200 rounded-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white shadow-lg">
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{4}}" id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ms-2 text-xs font-medium text-gray-900 dark:text-gray-300">{{ __('List of Affiliations') }}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{9}}" id="react-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="react-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{ __('Create Affiliations') }}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{14}}" id="angular-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="angular-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{ __('Edit Affiliations') }}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{19}}" id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{ __('Delete Affiliations') }}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
             </div>
             </x-card2>
             <x-card>
             <div class="grid grid-cols-2 gap-1 lg:grid-cols-3 lg:gap-2">
                    <div>
                        <h2 class="m-8 border-b-4 text-xs font-serif font-semibold text-gray-900 dark:text-white mb-0">{{ __('Worksheets') }}</h2>
                        <ul class="m-4 w-48 text-xs font-serif text-gray-900 bg-white border border-s-4 border-gray-200 rounded-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white shadow-lg">
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{5}}" id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Worksheets list')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{10}}" id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ms-2 text-xs font-medium text-gray-900 dark:text-gray-300">{{__('Create Worksheets')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{15}}" id="react-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="react-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Edit Worksheets')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{20}}" id="angular-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="angular-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Delete Worksheets')}}</label>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                    <div>
                        <h2 class="m-8 border-b-4 text-xs font-serif font-semibold text-gray-900 dark:text-white mb-0">{{ __('Payments') }}</h2>
                        <ul class="m-4 w-48 text-xs font-serif text-gray-900 bg-white border border-s-4 border-gray-200 rounded-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white shadow-lg">
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{6}}" id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ms-2 text-xs font-medium text-gray-900 dark:text-gray-300">{{__('Payments list')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{11}}" id="react-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="react-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Create Payments')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{16}}" id="angular-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="angular-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Edit Payments')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{21}}" id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Delete Payments')}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                         <h2 class="m-8 border-b-4 text-xs font-serif font-semibold text-gray-900 dark:text-white mb-0">{{ __('Reports') }}</h2>
                        <ul class="m-4 w-48 text-xs font-serif text-gray-900 bg-white border border-s-4 border-gray-200 rounded-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white shadow-lg">
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{6}}" id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ms-2 text-xs font-medium text-gray-900 dark:text-gray-300">{{__('Reports list')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{11}}" id="react-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="react-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Create Reports')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{16}}" id="angular-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="angular-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Edit Reports')}}</label>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="ps-3">
                                    <input wire:model="seletedpermiso" value="{{21}}" id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-xs text-gray-900 dark:text-gray-300">{{__('Delete Reports')}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
              </div>
    </x-card>
    <x-card2>
        <div class="flex justify-end border-x-0 mb-0 py-2">
            @can('admin.roles.create')
                <button wire:click.prevent="create()" class="px-6 py-1 mr-2 h-8 text-xs font-semibold text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300"><i class="fas fa-save fa-stack fa-lg"></i>{{__('Save')}} </button>
            @endcan
            <button wire:click.prevent="closeModal()" class="px-6 py-1 mr-2 h-8 text-xs font-semibold text-center inline-flex items-center text-white bg-slate-500 rounded-lg hover:bg-slate-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-slate-300"><i class="fas fa-window-close fa-stack fa-lg"></i>{{__('Cancel')}} </button>
        </div>
    </x-card2>
</div>
