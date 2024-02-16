<x-doctor-layout>
      <!-- CONTENT -->
<div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
@if (count($appointmentReserved) > 0)
      

<div class="flex flex-col gap-6 max-w-3xl mx-auto ">
@foreach ($appointmentReserved as $appointment)
        <a href="{{route('consultation',['appointment' => $appointment ])}}" class="w-11/12 ">
                    
                    <div for="appointment_{{ $loop->index }}" class="inline-flex py-2 px-8 rounded-2xl items-center flex justify-between w-full text-gray-500  border cursor-pointer peer-checked:border-blue-600 peer-checked:text-green-600 hover:text-gray-600 border-green-600 hover:bg-green-100 dark:text-gray-400 bg-white dark:bg-gray-800 dark:hover:bg-gray-700">               
                        <div class=" text-lg font-semibold" >{{$appointment->booking_time}} </div>
                        <p class=" text-green-600 font-bold">Reseved by {{$appointment->patient->user->name}}</p>                     
                            <i class="fas fa-check-circle text-green-600"></i> 
        </div></a>
              @endforeach       
</div>
@else
<h1 class="font_semibold text-3xl text-center mt-20">Any Appointment you have now</h1>
@endif
</div>

</x-doctor-layout>