<section class="space-y-6">
<header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>


    <div>
             @if(Auth::user()->picture)
            <div class="flex">
				<img src="{{Auth::user()->picture->url}}" alt="Profile Picture" class="h-56 rounded-full">
				<i class="fas fa-pencil-alt cursor-pointer text-2xl" onclick="OpenEditImage()"></i></div>
			@else
            <div class="flex">
				<img src="{{ asset('imgs/profile.jpg') }}" alt="Profile Picture" class="h-56 rounded-full">
				<i class="fas fa-pencil-alt cursor-pointer text-2xl" onclick="OpenEditImage()"></i></div>
            @endif   
</div>

    <div id="EditImage" class=" hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                <form method="post" action="{{ route('ImageProfile.update') }}" class="mt-6 space-y-6">
                @csrf
                 @method('put')
                        <x-input-label for="profile_picture" :value="__('Profile Picture')" />
                        <x-text-input id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full" :value="old('picture', $user->picture_id)" required autofocus autocomplete="picture" />
                        <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
                        <div class="flex justify-end space-x-8">                           
                            <button type="button" onclick="CloseEditImage()" class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</button>
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>        
            </div>
        </div>
    </div>
</section>