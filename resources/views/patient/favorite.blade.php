<x-patient-layout>
<section class="bg-white shdow-xl">
<div class="py-8 px-4 mx-auto text-center lg:py-16 lg:px-6">
      <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Your Favorite Doctor List</h2>
</div>
      <div class="flex flex-wrap justify-center gap-16 ">
      @foreach ($favorites as $favorite)
      
    <a href="{{ route('doctor.profile', ['doctorId' =>  $favorite->doctor->id]) }}" class="p-7 rounded-2xl border border-blue-600 text-center text-gray-500 dark:text-gray-400 transform transition duration-300 ease-in-out hover:scale-105">
        <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="{{asset('imgs/doctor.png')}}" alt="Bonnie Avatar">
        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $favorite->doctor->user->name }}
        </h3>
        <p>{{ $favorite->doctor->specialty->name }}</p>
    </a>
@endforeach
      </div>  
  
</div>
</section>
</x-patient-layout>