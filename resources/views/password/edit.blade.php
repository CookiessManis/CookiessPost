<x-app-layout>

    <x-slot name="header">
       <h1 class="font-semibold text-xl">
            Update Password
        </h1>
    </x-slot>


     <x-container>
        <div class="flex">
            <div class="w-full lg:w-1/2">
                @if(session()->has('message'))
                    <div class="text-green-500 mb-4">{{ session('message') }}</div>
                @endif
                <x-card>
                    <form action="{{ route('password.edit') }}" method="POST">
                        @method("PUT")
                        @csrf

                        <div class="mb-4">
                            <x-label>Current Password</x-label>
                            <x-input  name="current_password" id='current_password' placeholder="Current Password" type="password" class="mt-1 w-full" />
                                @error('current_password')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-4">
                            <x-label>New Password</x-label>
                            <x-input name="password" id="password" placeholder="enter new password" class="mt-1 w-full" type="password"></x-input>
                            @error('password')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-4">
                            <x-label>Password Confirmation</x-label>
                            <x-input name="password_confirmation" id="password_confirmation" placeholder="enter password confirmation" class="mt-1 w-full" type="password"></x-input>
                            @error('password_confirmation')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                        </div>


                        <x-button>Update</x-button>
                    </form>
                </x-card>
            </div>
        </div>
    </x-container>

</x-app-layout>
