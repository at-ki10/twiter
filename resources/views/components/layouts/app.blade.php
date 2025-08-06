<x-layouts.default>
    <nav class="navbar bg-base-100 rounded-box shadow-base-300/20 shadow-sm sticky top-4 z-50 border-b-2">
        <div class="flex flex-1 items-center">
            <a class="link text-base-content link-neutral text-xl font-bold no-underline flex items-end" href="/">
                <span>عصفور</span>
                <span class="icon-[tabler--brand-twitter] size-8"></span>
            </a>
        </div>
        <div class="navbar-end flex items-center gap-4">
            @if(Auth::check())
                <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
                    <button id="dropdown-scrollable" type="button" class="dropdown-toggle flex items-center"
                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <div class="avatar">
                            <div class="size-9.5 rounded-box">
                                <img src="/storage/{{ Auth::user()->avatar }}" alt="avatar 1" />
                            </div>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu"
                        aria-orientation="vertical" aria-labelledby="dropdown-avatar">
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="icon-[tabler--user]"></span>
                                حسابي الشخصي
                            </a>
                        </li>
                        <li class="dropdown-footer gap-2">
                            <form method="post" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit" class="btn btn-error btn-soft btn-block">
                                    <span class="icon-[tabler--logout]"></span>
                                    تسجيل خروج
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}">
                    <button class="btn btn-text btn-square">
                        <span class="icon-[tabler--login] size-6"></span>
                    </button>
                </a>
            @endif
        </div>
    </nav>

    <div class="my-8 flex-1">
        {{ $slot }}
    </div>

    <form method="post" action="{{ route('tweet.create') }}"
        class="border border-base-200 border-t-2 border-t-primary rounded-field sticky bottom-4 drop-shadow-2xl bg-base-100">
        @csrf
        <input type="hidden" name="parent_tweet_id" value="{{ request()->tweet?->id }}"/>
        <div class="textarea-floating">
            <textarea required class="textarea border-0 resize-none" placeholder="شارك افكارك" id="content"
                name="content"></textarea>
            <label class="textarea-floating-label" for="content">اكتب تغريدة</label>
        </div>
        <div class="p-2 pt-0">
            @error('content')
                <div>
                    {{ $message }}
                </div>
            @enderror
            <button type="submit" class="btn btn-primary btn-square">
                <span class="icon-[tabler--send]"></span>
            </button>
        </div>
    </form>
</x-layouts.default>