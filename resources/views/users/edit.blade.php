<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl">
            Update Your Profile Information
        </h1>
    </x-slot>
    <x-container>
        <div class="flex">
            <div class="w-full lg:w-1/2">
                @if(session()->has('message'))
                    <div class="text-green-500 mb-4">{{ session('message') }}</div>
                @endif
                <x-card>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @method("PUT")
                        @csrf

                        <div class="mb-4">
                            <x-label>Username</x-label>
                            <x-input value="{{ old('username',Auth::user()->username) }}" name="username" id="username" placeholder="Username"  type="text" class="mt-1 w-full" />
                                @error('username')
                                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-4">
                            <x-label>Email</x-label>
                            <x-input value="{{ old('email',Auth::user()->email) }}" name="email" id='email' placeholder="Email" type="email" class="mt-1 w-full" />
                                @error('email')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-4">
                            <x-label>Name</x-label>
                            <x-input value="{{ old('name',Auth::user()->name) }}" name="name" id="name" placeholder="Input Name" type="text" class="mt-1 w-full" />
                                @error('name')
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
