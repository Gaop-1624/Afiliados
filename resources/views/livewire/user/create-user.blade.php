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
                <a href="{{ route('Admin.Users') }}" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    {{__('Users')}}
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
   <x-titulo><i class="fas fa-user-plus fa-fw"></i> &nbsp; {{__('New User')}}</x-titulo>
    <x-card>
           <div class="grid grid-cols-1 gap-1 lg:grid-cols-2 lg:gap-2 m-2 mb-4 py-2">
                @if ($errors->first('name')) 
                    <div class="px-4 py-2 border bg-slate-100">
                        <div class="relative mb-4">
                            <input wire:model="name" id="name" type="text" autocomplete="off" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                            <label for="name" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Username')}}</label>
                            <p class="mt-2 text-xs text-red-600">{{$errors->first('name')}} </p>
                        </div>
                    </div>
                @else
                     <div class="px-4 py-2 border bg-slate-100 h-12">
                        <div class="relative mb-4">
                            <input wire:model="name" id="name" type="text" autocomplete="off" class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="name" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Username')}}</label>
                        </div> 
                      </div>
                @endif
                @if ($errors->first('email')) 
                      <div class="px-4 py-2 border bg-slate-100">
                           <div class="relative mb-4">
                                <input wire:model="email" id="dev" type="email" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                                <label for="email" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Email')}}</label>
                                <p class="mt-2 text-xs text-red-600">{{$errors->first('email')}} </p>
                            </div>
                      </div>
                @else
                      <div class="px-4 py-2 border bg-slate-100 h-12">
                            <div class="relative mb-4">
                                <input wire:model="email" id="email" type="email" class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="email" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Email')}}</label>
                            </div> 
                     </div>
                @endif

                @if ($errors->first('password')) 
                    <div class="px-4 py-2 border bg-slate-100">
                        <div class="relative mb-4">
                            <input wire:model="password" id="password" type="password" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                            <label for="password" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('User Password')}}</label>
                            <p class="mt-2 text-xs text-red-600">{{$errors->first('password')}} </p>
                        </div>
                    </div>
                @else
                     <div class="px-4 py-2 border bg-slate-100 h-12">
                            <div class="relative mb-4">
                                <input wire:model="password" id="password" type="password" class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="password" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('User Password')}}</label>
                            </div> 
                      </div>
                @endif
                @if ($errors->first('password')) 
                      <div class="px-4 py-2 border bg-slate-100">
                           <div class="relative mb-4">
                                <input wire:model="password_confirmation" id="dev" type="password" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                                <label for="password" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Password confirmation')}}</label>
                                <p class="mt-2 text-xs text-red-600">{{$errors->first('password')}} </p>
                            </div>
                      </div>
                @else
                      <div class="px-4 py-2 border bg-slate-100 h-12">
                            <div class="relative mb-4">
                                <input wire:model="password_confirmation" id="email" type="password" class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="password_confirmation" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Password confirmation')}}</label>
                            </div> 
                     </div>
                @endif
                
            </div>
            <div class="flex justify-end border-x-0 mb-4">
                @can('admin.users.create')
                    <button wire:click.prevent="create()" class="px-6 py-1 mr-2 h-7 text-xs font-serif text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300"><i class="fas fa-save fa-stack fa-lg"></i>{{__('Save')}} </button>
                @endcan
                 <button wire:click.prevent="closeModal()" class="px-6 py-1 mr-2 h-7 text-xs font-serif text-center inline-flex items-center text-white bg-slate-500 rounded-lg hover:bg-slate-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-slate-300"><i class="fas fa-window-close fa-stack fa-lg"></i>{{__('Cancel')}} </button>
            </div> 
   </x-card>
</div>
