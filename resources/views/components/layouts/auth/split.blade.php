<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
            <div class="bg-muted relative hidden h-full text-white lg:block">
                <div class="absolute inset-0 dark:bg-neutral-900"></div>
                <div class="relative z-20 h-full flex flex-col p-6">
                    <a href="{{ route('home') }}" class="flex items-center text-lg font-medium mb-8" wire:navigate>
                        <img src="{{ asset('images/logo-blue.svg') }}" alt="Image" class="me-2 h-10 object-cover" />
                        {{ config('app.name', 'PlusX') }}
                    </a>
                    <div class="space-y-2 text-white mb-8">
                        <p class="text-4xl font-semibold">Simplify your business</p>
                        <p class="text-xl text-gray-300">Manage transactions, track inventory, and grow your business all from one powerful POS platform</p>
                    </div>
                    <div class="flex-1 flex items-center justify-center min-h-0">
                        <img src="{{ asset('images/signup.svg') }}" alt="Image" class="max-w-full max-h-full w-auto h-auto object-contain" />
                    </div>
                </div>
            </div>
            <div class="w-full lg:p-8">
                <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                    <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                        <span class="flex h-9 w-9 items-center justify-center rounded-md">
                            <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                        </span>

                        <span class="sr-only">{{ config('app.name', 'PlusX') }}</span>
                    </a>
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>