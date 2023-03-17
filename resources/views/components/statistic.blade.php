<div class="border-b mb-3">
            <x-container>
                <div class="flex justify-between items-center">

                    <div class="flex ">
                        <a href="{{ route('profile',$user->username,'following') }}" class=" px-10 py-5 text-center border-r">
                            <div class="uppercase text-xs mb-2">Status</div>
                            <div class="text-2xl font-semibold">{{ $user->statuses()->count() }}</div>
                        </a>
                        <a href="{{ route('following',[$user->username,'following']) }}" class=" px-10 py-5 text-center border-r">
                            <div class="uppercase text-xs mb-2">Following</div>
                            <div class="text-2xl font-semibold">{{ $user->follows()->count() }}</div>
                        </a>
                        <a href="{{ route('following',[$user->username,'follower']) }}" class=" px-10 py-5 text-center border-r">
                            <div class="uppercase text-xs mb-2">Followers</div>
                            <div class="text-2xl font-semibold">{{ $user->followers()->count() }}</div>
                        </a>

                    </div>
                    <div>
                        {{-- @if(Auth::id() != $user->id) --}}
                        @if(Auth::user()->isNot($user))
                        <form action="{{ route('following.store',$user) }}" method="post">
                        @csrf
                            <x-button>
                                @if(Auth::user()->follows()->where('following_user_id',$user->id)->first())
                                unfollow
                                @else
                                Follow
                                @endif
                            </x-button>
                        </form>

                        @else
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-sky-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-700 active:bg-sky-900 focus:outline-none focus:border-sky-900 focus:ring ring-sky-300 disabled:opacity-25 transition ease-in-out duration-150">Edit Profile</a>
                        @endauth
                    </div>
                </div>

            </x-container>
    </div>
