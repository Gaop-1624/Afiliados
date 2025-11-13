<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse">
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.item  icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"> Dashboard </flux:navlist.item>
                <flux:navlist.group heading="{{__('Configuration')}}" expandable :expanded="false">
                    <flux:navlist.item href="{{route('Empresa.Index')}}" :current="request()->routeIs('Empresa.Index')" wire:navigate><i class="far fa-building"></i> &nbsp; {{__('Company')}}</flux:navlist.item>
                    <flux:navlist.item href="{{route('Admin.Users')}}" :current="request()->routeIs('Admin.Users')" wire:navigate><i class="fas fa-users"></i> &nbsp; {{__('Users')}}</flux:navlist.item>
                    <flux:navlist.item href="{{route('Admin.Roles')}}" :current="request()->routeIs('Admin.Roles')" wire:navigate><i class="fab fa-critical-role"></i> &nbsp; {{__('Roles and Permissions')}}</flux:navlist.item>
                </flux:navlist.group>

                 <flux:navlist.group  heading="{{__('Affiliations')}}" expandable :expanded="false">
                    <flux:navlist.item href="{{route('Afiliados')}}" :current="request()->routeIs('Afiliados')" wire:navigate><i class="fab fa-affiliatetheme" style="color: rgb(166, 168, 166)"></i> &nbsp; {{__('affiliates')}}</flux:navlist.item>
                    <flux:navlist.item href="{{route('Eps.Eps')}}" :current="request()->routeIs('Eps.Eps')" wire:navigate><i class="fas fa-procedures"></i> &nbsp; {{__('Salud (EPS)')}}</flux:navlist.item>
                    <flux:navlist.item href="{{route('Arls.Arls')}}" :current="request()->routeIs('Arls.Arls')" wire:navigate><i class="fab fa-asymmetrik"></i> &nbsp; {{__('Riesgos (ARL)')}}</flux:navlist.item>
                    <flux:navlist.item href="{{route('Afps.Afps')}}" :current="request()->routeIs('Afps.Afps')" wire:navigate><i class="fas fa-poll"></i> &nbsp; {{__('Pensiones (AFP)')}}</flux:navlist.item>
                    <flux:navlist.item href="{{route('Cajas.Cajas')}}" :current="request()->routeIs('Cajas.Cajas')" wire:navigate><i class="fas fa-archive"></i> &nbsp; {{__('Compensación (CAJA)')}}</flux:navlist.item>
                </flux:navlist.group>

                 <flux:navlist.group  heading="{{__('Payments')}}" expandable :expanded="false">
                    <flux:navlist.item href="{{route('Pagos.Pagos')}}" :current="request()->routeIs('Pagos.Pagos')" wire:navigate><i class="far fa-money-bill-alt" style="color: rgb(166, 168, 166)"></i> &nbsp; {{__('Pay')}}</flux:navlist.item>
                    <flux:navlist.item href="{{route('Retiros.Retiros')}}" :current="request()->routeIs('Retiros.Retiros')" wire:navigate><i class="far fa-times-circle"></i> &nbsp; {{__('Activate Withdrawal')}}</flux:navlist.item>
                    <flux:navlist.item href="{{route('Actualizar.Salario')}}" :current="request()->routeIs('Actualizar.Salario')" wire:navigate><i class="fas fa-hand-holding-usd"></i> &nbsp; {{__('Update salary')}}</flux:navlist.item>
                </flux:navlist.group>

                 <flux:navlist.group  heading="{{__('Worksheets')}}" expandable :expanded="false">
                    <flux:navlist.item href="{{route('Planillas.Planillas')}}" :current="request()->routeIs('Planillas.Planillas')" wire:navigate><i class="fas fa-file-medical-alt" style="color: rgb(166, 168, 166)"></i> &nbsp; {{__('trigger')}}</flux:navlist.item>
                    <flux:navlist.item href="{{route('Planillas.Create.Index')}}" :current="request()->routeIs('Planillas.Create.Index')" wire:navigate><i class="fab fa-r-project"></i> &nbsp; {{__('Generate Withdrawals')}}</flux:navlist.item>
                   {{--  <flux:navlist.item href="{{route('Arls.Arls')}}" :current="request()->routeIs('Arls.Arls')" wire:navigate><i class="fas fa-hand-holding-usd"></i> &nbsp; {{__('Update salary')}}</flux:navlist.item>
 --}}                </flux:navlist.group>

                <flux:navlist.group  heading="{{__('Movements')}}" expandable :expanded="false">
                    <flux:navlist.item href="{{route('Movimiento.IngresosEgresos')}}" :current="request()->routeIs('Movimiento.IngresosEgresos')" wire:navigate><i class="fas fa-file-invoice-dollar"></i> &nbsp; {{__('Income and Expenses')}}</flux:navlist.item>
                    <flux:navlist.item href="{{route('Movimiento.CirerreDiario')}}" :current="request()->routeIs('Movimiento.CirerreDiario')" wire:navigate><i class="fas fa-cloud-sun" style="color: rgb(166, 168, 166)"></i> &nbsp; {{__('Daily Closing')}}</flux:navlist.item>
                    <flux:navlist.item href="{{route('Movimiento.IngresosEgresosIndex')}}" :current="request()->routeIs('Movimiento.IngresosEgresosIndex')" wire:navigate><i class="fas fa-language"></i> &nbsp; {{__('Closing month')}}</flux:navlist.item>
{{--                     <flux:navlist.item href="{{route('Movimiento.CirerreAño')}}" :current="request()->routeIs('Movimiento.CirerreAño')" wire:navigate><i class="fas fa-vote-yea" style="color: rgb(166, 168, 166)"></i> &nbsp; {{__('Annual Closing')}}</flux:navlist.item>
 --}}                
                    <flux:navlist.item href="{{route('Movimiento.CirerreAño')}}" :current="request()->routeIs('Movimiento.CirerreAño')" wire:navigate><i class="fas fa-vote-yea" style="color: rgb(166, 168, 166)"></i> &nbsp; {{__('Annual Closing')}}</flux:navlist.item>
                </flux:navlist.group>
  



            </flux:navlist>
        
            <flux:spacer />

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
