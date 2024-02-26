<x-patient-layout>
<section class="bg-white shdow-xl">
<div class="py-8 px-4 mx-auto text-center lg:py-16 lg:px-6">
      <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our team</h2>
          <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p>
</div> 
      <div class="flex flex-wrap justify-center gap-16 ">
      @foreach ($doctors as $doctor)
    <a href="{{ route('doctor.profile', ['doctorId' => $doctor->id]) }}" class="p-7 rounded-2xl border border-blue-600 text-center text-gray-500 dark:text-gray-400 transform transition duration-300 ease-in-out hover:scale-105">
        <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="{{asset('imgs/doctor.png')}}" alt="Bonnie Avatar">
        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $doctor->user->name }}
        </h3>
        <p>{{ $doctor->specialty->name }}</p>
    </a>
@endforeach
      </div>  
  
</div>
</section> 
</x-patient-layout>