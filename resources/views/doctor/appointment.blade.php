<x-doctor-layout>
   <!-- CONTENT -->
   <div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
       
   <nav class = "flex justify-center px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
            <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                <li class = "inline-flex items-center">
                    <a href="{{route('DoctorAppointment',[ 'doctorID' => Auth::user()->doctor->id ])}}" class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">                    
                        Today's calendrier
                    </a>
                </li>
                <li>
                    <div class = "flex items-center">
                        <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>
                        <a href="{{route('appointment.show',[ 'doctorId' => Auth::user()->doctor->id ])}}" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">appointement</a>
                    </div>
                </li>
            </ol>
        </nav>

        
                <div class="max-w-3xl mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
                  <div class="flex flex-row justify-between items-center">
                    <div>
                      <h1 class="text-3xl font-medium">Appointements list</h1>
                    </div>
                   
                  </div>
                  
                  <p class="text-slate-500 my-4">Hello, here are your latest appointements</p>
                  <p class="font-bold mb-3 text-gray-700"><span><i class="fas fa-sun text-yellow-600 "></i></span> Morning</p>      
        <div class="flex flex-col gap-6 rounded-lg  mt-4 p-8 mb-10 ">
        @foreach ($appointments as $appointment)
         @if($loop->iteration == 5)
       <p class="font-bold mb-3 mt-6 text-gray-700"><span><i class="fas fa-moon"></i> </span>Evening</p>
      @endif
    <div class="flex items-center w-full justify-center  "> 
 
        @if (in_array($appointment, $appointments_not_Allow->toArray()))
          <div class="w-11/12 ">
            <input type="radio" id="appointment_{{ $loop->index }}" name="booking_time" value="{{ $appointment }}" class="hidden peer" required>
            <label for="appointment_{{ $loop->index }}" class="inline-flex py-2 px-8 rounded-2xl items-center flex justify-between w-full text-gray-500  border cursor-pointer peer-checked:border-blue-600 peer-checked:text-green-600 hover:text-gray-600 border-green-600 hover:bg-green-100 dark:text-gray-400 bg-white dark:bg-gray-800 dark:hover:bg-gray-700">               
             <div class=" text-lg font-semibold" >{{ $appointment }}</div>
               <p class=" text-green-600 font-bold">reseved</p>                     
                <i class="fas fa-check-circle text-green-600"></i> 
            </label>
</div>
                    @else
                    <div class="w-11/12">
                    <input type="radio" id="appointment_{{ $loop->index }}" name="booking_time" value="{{ $appointment }}" class="hidden peer"disabled >
                    <label for="appointment_{{ $loop->index }}" class="inline-flex py-2 px-8 rounded-full items-center justify-between w-full text-gray-500 bg-white border border-gray-200 cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-red-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class=" text-lg font-semibold">{{ $appointment }}</div>
                        <i class="fas fa-times-circle text-red-600"></i>
                    </label>
                </div>
            @endif
        
    </div>
@endforeach</div>
                  </div>
        </div>
      </div>
    </div>
  </div>




</x-doctor-layout>