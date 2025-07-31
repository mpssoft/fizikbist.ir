<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">
            <form action="{{route('auth.verifyToken')}}" method="post">
                @csrf

                <div class="form-group">
                   <p> PLease enter the code to verify phone number:</p>
                    <x-text-input class="form-control @error('token') is-invalid @enderror " name="token" id="token" />
                    @error('token')
                        <span class="invalid-feedback text-right" dir="rtl" >
                            <strong>{!! $message !!} </strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <x-primary-button class="mr-3 mt-3">
                        {{ __('Register code') }}
                    </x-primary-button>

                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
