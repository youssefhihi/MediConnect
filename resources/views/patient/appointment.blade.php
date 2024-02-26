<x-patient-layout>
  @if(session('success'))
    <script>
        setTimeout(function() {
            alert('{{ session('success') }}');
        }, 100);
    </script>
@endif
    <h4 class="text-2xl text-blue-700 font-mono text-center font-semibold mt-10">Appointements log</h4>
<form action="{{ route('appointment') }}" method="post" class="flex flex-col gap-6 rounded-lg shadow-xl mt-4 p-8 mb-10 ">
      @csrf
      @method('POST')

      <input type="hidden" value="{{$doctorID}}" name="doctor_id">
      <input type="hidden" value="{{ Auth::user()->patient->id }}" name="patient_id"> 
        @foreach ($appointments as $appointment)
    <div class="flex items-center w-full justify-center  ">        
        @if (in_array($appointment, $appointments_not_Allow->toArray()))
          <div class="w-11/12 ">
            <input type="radio" id="appointment_{{ $loop->index }}" name="booking_time" value="{{ $appointment }}" class="hidden peer" disabled>
            <label for="appointment_{{ $loop->index }}" class="inline-flex py-2 px-8 rounded-2xl items-center flex justify-between w-full text-gray-500  border cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 border-red-600 hover:bg-gray-100 dark:text-gray-400 bg-white dark:bg-gray-800 dark:hover:bg-gray-700">               
             <div class=" text-lg font-semibold" >{{ $appointment }}</div>
               <p class="text-red-600  font-bold">Already reseved</p>                   
                <i class="fas fa-times-circle text-red-600"></i>
            </label>
                </div>
                    @else
                    <div class="w-11/12">
                    <input type="radio" id="appointment_{{ $loop->index }}" name="booking_time" value="{{ $appointment }}" class="hidden peer" required>
                    <label for="appointment_{{ $loop->index }}" class="inline-flex py-2 px-8 rounded-full items-center justify-between w-full text-gray-500 bg-white border border-gray-200 cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-green-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class=" text-lg font-semibold">{{ $appointment }}</div>
                        <i class="fas fa-check-circle text-green-600"></i>                
                    </label>
                </div>
            @endif
        
    </div>
@endforeach
<x-input-error :messages="$errors->all()" class="text-sm text-red-500 ml-2" />




   <div class="flex flex-start">
      <button type="submit" class="p-2 border border-blue-800 rounded-md inline-flex space-x-1 items-center text-blue-800 hover:text-white bg-indigo-600 hover:bg-indigo-500">
        <i class="fa-regular fa-bookmark"></i>
        <span class="text-sm font-medium block">Book An Appointement</span>
      </button>
    </div>
    </form> 




   
</x-patient-layout>
