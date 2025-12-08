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
                <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('User')}}</a>
                </div>
            </li>
        </ol>
   </nav>
   <x-titulo><i class="fas fa-users fa-fw"></i> &nbsp; {{__('User List')}}</x-titulo>
    <x-card2>
            <form method="GET">
                <div class="grid grid-cols-1 gap-1 lg:grid-cols-5 lg:gap-2">
                      @include('Tools.SearchBox')
                      <div class="justify-right px-10 py-4 mr-4">
                            <a href="{{ route('Reports.Users') }}" title="{{__('Export to Pdf')}}">
                                <i class="far fa-file-pdf fa-2x" style="color: red"></i>
                            </a>  
                            <a href="{{ route('Export.Users') }}" title="{{__('Export to Xls')}}">
                                <i class="far fa-file-excel fa-2x" style="color: green"></i>
                            </a> 
                            <a href="{{ route('Export.UsersCsv') }}" title="{{__('Export to Csv')}}">
                                <i class="fas fa-file-csv fa-2x" style="color: #615dec"></i>
                            </a> 
                        </div>
                        <div class="flex justify-end px-1 py-4 mr-4"> 
                            @can('admin.users.create')
                                <a href="{{ route('Admin.Users.Create') }}" class="h-8 px-10 py-1 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 whitespace-nowrap" title="{{__('New User')}}" >
                                    <i class="fas fa-plus-circle fa-lg fa-stack"></i> {{__( 'New' )}}
                                </a>
                            @endcan    
                        </div>
                </div>
            </form> 
    </x-card2>
        @if ($users->count())
                @foreach ($users as $user)            
                    <div class="items-start gap-1 inline-block  ml-14 mt-2">
                        <div class="flex flex-col gap-1 border-1 border-gray-200 rounded-lg p-2 bg-white dark:bg-gray-800 dark:border-gray-700">
                            <div class="leading-1.5 flex w-full max-w-[320px] flex-col bg-stone-50 shadow rounded-lg p-1">
                                <div class="flex items-start bg-neutral-secondary-soft rounded-xl p-1">
                                    <div class="me-1.5">
                                    <span class="flex items-center gap-2 text-sm font-medium text-heading pb-2">
                                        <span class="mb-1 px-4 text-sm font-bold text-white dark:text-white  bg-cyan-400"><i class="fas fa-user-tie" style="color: white"></i> &nbsp; {{$user->name}}</span>
                                    </span>
                                    <div class="mb-2">
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolName)
                                                <h5 class="text-left text-xs text-stone-400 font-semibold border-b-2 rounded-sm shadow-2xl">{{$rolName}}</h5>
                                            @endforeach
                                        @endif  
                                    </div> 
                                       @if ($user->isSuspended())
                                           <button wire:click="suspend({{ $user->id}})" type="button" class="cursor-pointer text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-semibold rounded-xs text-xs px-4  text-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 py-1"><i class="fas fa-times-circle"></i> &nbsp; {{__('Idle')}}</button>
                                       @else
                                           <button wire:click="suspend({{ $user->id}})" type="button" class="cursor-pointer text-white bg-blue-600 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold rounded-xs text-xs px-5  text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 py-1"><i class="fas fa-check-circle fa-fw"></i> &nbsp; {{__('Asset')}}</button>
                                        @endif 
                                         @can('admin.users.edict')
                                            <a href="#" wire:click="update({{$user->id}})" class="inline-flex border px-1 py-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-blue-400 dark:focus:ring-blue-600" title="{{__('Edit')}}">
                                                <i class="far fa-edit fa-fw fa-xl" style="color: blue;"></i>
                                            </a> 
                                         @endcan
                                         @can('admin.users.delete') 
                                            <a href="#" wire:click="delete({{$user->id}})" class="inline-flex border px-1 py-1 hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-100 dark:bg-red-200 dark:hover:bg-red-400 dark:focus:ring-red-600" title="{{__('Delete')}}">
                                                <i class="far fa-trash-alt fa-fw fa-xl" style="color: red;"></i>
                                            </a>
                                         @endcan
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
            {{$users->links()}}
        </div>     
</div>
