@foreach ($user as $users)
<x-card>

                            <div class="flex">
                                <div class="flex-shrink-0 mr-3">
                                    <img class="w-10 h-10 rounded-full" src="{{ $users->gravatar() }}" alt="{{ $users->name }}">
                                </div>
                                <div>
                                    <a href="{{ route('profile',$users->username) }}" class="font-semibold">{{ $users->name }}</a>
                                            @if(request()->routeIs('explore'))
                                                <div class="mt-2">
                                                    <form action="{{ route('following.store',$users) }}" method="post">
                                                        @csrf
                                                            <x-button>
                                                                @if(Auth::user()->follows()->where('following_user_id',$users->id)->first())
                                                                unfollow
                                                                @else
                                                                Follow
                                                                @endif
                                                            </x-button>
                                                    </form>
                                                </div>
                                            @endif
                                        @if($users->pivot)
                                            <div class="text-sm text-gray-600">{{ $users->pivot->created_at->diffForHumans() }}</div>
                                        @endif
                                </div>
                            </div>
</x-card>

                        @endforeach
