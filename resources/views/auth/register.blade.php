<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

       <!-- Role Selection -->
<div class="mt-4 flex space-x-8 items-center">
    <x-input-label for="role" :value="__('Role')" class="text-sm font-semibold text-gray-700 dark:text-gray-300"/>

    <!-- Doctor Role -->
    <label class="inline-flex space-x-3 items-center">             
        <span class="ml-2"><i class="fas fa-user-md text-3xl text-blue-500"></i></span>
        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Doctor</span>              
        <input type="radio" class="form-radio text-blue-500" value="doctor" name="role" onchange="toggleSpecialties()">
    </label>

    <!-- Patient Role -->
    <label class="inline-flex space-x-3 items-center">
        <span class="ml-2 text-3xl text-red-500"><i class="fas fa-user-injured "></i></span>                    
        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Patient</span>  
        <input type="radio" class="form-radio text-red-500" value="patient" name="role" onchange="toggleBirthday()">
    </label>
</div>
    <x-input-error :messages="$errors->get('role')" class="text-sm text-red-500 ml-2" />



                    <!-- Select Specialties (Hidden by Default) -->
            <div id="specialties" class="mt-4 hidden">
                <x-input-label for="specialy" :value="__('Specialty')" />
                <select id="specialties" name="specialty" class="block mt-1 w-full rounded-md" >
                    <option selected disabled >Choose your spetiality</option>
                    @foreach ($specialities as $speciality)
                        <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                    @endforeach
                </select>
                
            </div>
            <x-input-error :messages="$errors->get('specialty')" class="mt-2" />
            <div id="birthday" class="mt-4 hidden">
                <label for="birthday" :value="__('Birthday')"  class="block text-sm font-medium text-gray-700">Birthday</label>
                <input type="date" name="birthday" id="birthday" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                
              
            </div>
            <x-input-error :messages="$errors->get('birthday')" class="mt-2 text-sm text-red-600" />
            @error('birthDate')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror



        

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

