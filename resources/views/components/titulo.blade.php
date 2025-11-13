<div class="px-1 mb-4">
    <div class="flex items-center justify-between p-3 font-semibold text-white  shadow-lg group mb-0 bg-white rounded">  
        <div class="hidden space-x-2 sm:-my-px sm:ml-3 sm:flex">
            <label class="text-xs text-slate-500 font-semibold border-b-2 shadow-xs">{{$slot}}</label>
        </div>
        @php
            use App\Models\User;
            $users = User::find(auth()->id());
        @endphp
        <div class="border-b-2 shadow-xs">
            <label class="font-semibold text-slate-800 text-xs border-x-0">
                {{$users->empresa->nombre}} Nit: 
                {{$users->empresa->nit}} -   
                {{$users->empresa->dev}}
            </label>
        </div>
    </div>
</div>
