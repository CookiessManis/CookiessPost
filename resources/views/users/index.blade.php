<x-app-layout>
    @slot('header')
    <x-container>
        <div class="grid grid-cols-4 gap-5">
            <x-following :user="$user"></x-following>
        </div>

        {{ $user->links() }}
    </x-container>
</x-app-layout>
