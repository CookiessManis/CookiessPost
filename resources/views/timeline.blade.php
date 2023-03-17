<x-app-layout>
    @slot('header')
    Timeline
    @endslot

    <x-container>
         <div class="grid grid-cols-12 gap-5">
            <div class="col-span-7">
                <div class="border rounded-xl p-5 space-y-5">
                    {{-- <div class="flex"> --}}
                            <form action="{{ route('status.store') }}" method="post">
                                @csrf
                                <div class="flex">

                                    <div class="flex-shrink-0 mr-3">
                                        <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->gravatar() }}" alt="{{ Auth::user()->name }}">
                                    </div>
                                        <div class="w-full">
                                            <div class="font-semibold">{{ Auth::user()->name }}</div>
                                            <div class="w-full">

                                                    <div class="w-full">
                                                        <textarea
                                                        name="body"
                                                        id="body"
                                                        placeholder="What is your thinking?"
                                                        class="form-textarea w-full border-gray-300 rounded-xl resize-none focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"></textarea>
                                                    </div>
                                            </div>

                                                <div class="text-right"><x-button>Post</x-button></div>
                                        </div>
                                </div>

                            </form>
                    {{-- </div> --}}
                </div>


                <div class="space-y-6">
                    <div class="border rounded-xl p-5 space-y-5">
                        <x-statuses :statuses="$statuses"></x-statuses>
                    </div>
                </div>
            </div>
            @if (Auth::user()->followers()->count())
            <div class="col-span-5">
                <x-card>
                    <h1 class="font-semibold mb-5">Recently Followers</h1>
                    <div class="space-y-6">
                        <x-following :user="Auth::user()->followers()->limit(5)->get()"></x-following>
                    </div>
                </x-card>

            </div>
            @endif
        </div>

    </x-container>

</x-app-layout>
