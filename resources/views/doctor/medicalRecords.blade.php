<x-doctor-layout>
<div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
<h1 class=" text-4xl font-semibold text-center ">Certificate Medical</h1>
<div class=" mt-10 flex flex-col gap-10">
 @foreach ($consultations as $consultation )
<!-- component -->
<div class="min-h-screen  ">
  <div class="px-10 ">
    <div class="bg-white max-w-3xl  mx-auto rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
        <div class="flex justify-between">
        <div class="w-16 h-16  rounded-full flex items-center justify-center "><img src="{{asset('imgs/logo.png')}}" alt=""></div>
        <p class="mt-4 text-gray-600"><span class=" underline font-bold">Date:</span> {{$consultation->created_at}}</p>

    </div>
    <div class="flex justify-between space-x-4 py-6">
        <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">Dr.{{$consultation->doctor->user->name}}</h1>
        <div class="text-sm font-semibold"> <span class="  underline font-bold">patient :</span> {{$consultation->patient->user->name}}</div>

    </div>
     
      <div class="mt-2 flex flex-col gap-3">
       
        <p class="mt-2 text-md text-gray-600"><span class="  underline    font-bold">symptoms:</span> {{$consultation->symptoms}}</p>
        <p class="mt-2 text-md text-gray-600"><span class=" underline font-bold">Days Off :</span> {{$consultation->NumOfDays}} Days </p>
        <p class="underline font-bold mt-2 text-md text-gray-600">medecine :</p>
        <div class="flex flex-wrap gap-2 ">
        @foreach ($consultation->medications  as $medication)
        <p class="ml-2"><i class="fas fa-pills"></i> {{$medication->name}}</p>  
        @endforeach
        </div>
        <div class="flex justify-end     items-center">
         
          <div class="p-2 bg-blue-600 rounded-xl text-white hover:bg-white hover:text-blue-600 border  border-blue-600 cursor-pointer"><p>Exporte</p></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>
</div>

</x-doctor-layout>