<x-doctor-layout>
<div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">

    <form method="POST" action="{{route('consultation.store')}}" class="p-10">
        @csrf
        @method('POST')
        <div class="text-center text-black font-semibold text-2xl">
            Patient Name :<span class="underline text-blue-600">{{$appointment->patient->user->name}}</span>
        </div>
        <input type="hidden" name="patient_id" value="{{$appointment->patient->id}}">
        <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
        <!-- symptoms -->
        <div>
            <x-input-label for="symptoms" :value="__('symptoms')" />
            <x-text-input id="symptoms" class="block mt-1 w-full" type="text" name="symptoms" :value="old('symptoms')" required autofocus autocomplete="symptoms" />
            <x-input-error :messages="$errors->get('symptoms')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="NumOfDays" :value="__('Days OFF')" />
            <x-text-input id="NumOfDays" class="block mt-1 w-full" type="NumOfDays" name="NumOfDays" :value="old('NumOfDays')" required autocomplete="NumOfDays" />
            <x-input-error :messages="$errors->get('NumOfDays')" class="mt-2" />
        </div>
              <!-- medication -->
              <div class="mt-4">
                <x-input-label for="medication" :value="__('medication')" />
                <select id="medications" name="medications[]" class="block mt-1 w-full rounded-md" multiple >
                    <option selected disabled >Medication</option>
                    @foreach ($medications as $medication)
                        <option  value="{{ $medication->id }}">{{ $medication->name }}</option>
                    @endforeach
                </select>
                
            </div>
            <x-input-error :messages="$errors->get('medication')" class="mt-2" />
           
       
       
        <div class="flex items-center justify-end mt-4">
            <button>
                <a href="" class="bg-blue-600 tex">Return</a>
            </button>

            <x-primary-button class="ms-4">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>



</div>
</x-doctor-layout>