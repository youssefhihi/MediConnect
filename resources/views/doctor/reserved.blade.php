<x-doctor-layout>
      <!-- CONTENT -->
<div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">

<div class="flex flex-col gap-6 ">
@foreach ($appointmentReserved as $appointment)
        <a href="{{route('consultation'.['$patient' = $appointment->patient_id ])}}" class="w-11/12 ">
                    <input type="radio" id="appointment_{{ $loop->index }}" name="booking_time" value="{{ $appointment }}" class="hidden peer" required>
                    <label for="appointment_{{ $loop->index }}" class="inline-flex py-2 px-8 rounded-2xl items-center flex justify-between w-full text-gray-500  border cursor-pointer peer-checked:border-blue-600 peer-checked:text-green-600 hover:text-gray-600 border-green-600 hover:bg-green-100 dark:text-gray-400 bg-white dark:bg-gray-800 dark:hover:bg-gray-700">               
                        <div class=" text-lg font-semibold" >{{$appointment->booking_time}}</div>
                        <p class=" text-green-600 font-bold">reseved by {{$appointment->patient->user->name}}</p>                     
                            <i class="fas fa-check-circle text-green-600"></i> 
        </label></div>
              @endforeach 
        
</div>
</div>

</x-doctor-layout>