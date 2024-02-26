
<x-patient-layout>

<div class=" bg-gray-50 flex items-center">
<section class="w-full bg-cover bg-center py-32" style="background-image: url('{{asset('imgs/bg-home.jpg')}}');">
		<div class="container mx-auto text-center text-white">
			<h1 class="text-5xl font-medium mb-6">Welcome to Our Cilinc</h1>
			<p class="text-xl mb-12 max-w-3xl mx-auto">Experience the highest quality healthcare services tailored to your needs, delivered by our team of experienced and compassionate doctors</p>
			<a href="{{route('urgent')}}" class="bg-indigo-500 text-white py-4 px-12 rounded-full hover:bg-red-600">Appointment Urgent</a>
		</div>
	</section>
</div>

<section class="py-10 relative bg-white sm:py-16 lg:py-24 lg:pt-36">
    <svg id="visual" viewBox="0 0 2000 600" class="w-full   absolute top-0 left-0 z-0 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
        <path d="M0 18L65 18L65 66L129 66L129 37L194 37L194 44L258 44L258 25L323 25L323 35L387 35L387 36L452 36L452 38L516 38L516 34L581 34L581 26L645 26L645 68L710 68L710 32L774 32L774 27L839 27L839 29L903 29L903 31L968 31L968 83L1032 83L1032 65L1097 65L1097 57L1161 57L1161 66L1226 66L1226 90L1290 90L1290 66L1355 66L1355 32L1419 32L1419 35L1484 35L1484 18L1548 18L1548 94L1613 94L1613 96L1677 96L1677 72L1742 72L1742 88L1806 88L1806 42L1871 42L1871 46L1935 46L1935 33L2000 33L2000 18L2000 0L2000 0L1935 0L1935 0L1871 0L1871 0L1806 0L1806 0L1742 0L1742 0L1677 0L1677 0L1613 0L1613 0L1548 0L1548 0L1484 0L1484 0L1419 0L1419 0L1355 0L1355 0L1290 0L1290 0L1226 0L1226 0L1161 0L1161 0L1097 0L1097 0L1032 0L1032 0L968 0L968 0L903 0L903 0L839 0L839 0L774 0L774 0L710 0L710 0L645 0L645 0L581 0L581 0L516 0L516 0L452 0L452 0L387 0L387 0L323 0L323 0L258 0L258 0L194 0L194 0L129 0L129 0L65 0L65 0L0 0Z" fill="#eaeaea" stroke-linecap="square" stroke-linejoin="miter"></path>
    </svg>
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 text-center  ">

        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-2xl font-light text-black sm:text-4xl sm:leading-tight">Discover Clinic's Available Specialties</h2>
        </div>
        <div class=" grid items-center max-w-4xl grid-cols-2 gap-4 mx-auto mt-12 md:mt-20 md:grid-cols-4  ">
        @foreach ($specialties as $specialty) 
    <a href="{{ route('doctor.sort', ['specialty' => $specialty->id]) }}" class="hover:bg-blue-600 cursor-pointer rounded-md hover:text-white bg-white text-blue-800 border border-blue-800 h-12 flex shadow-lg items-center justify-center transform transition duration-300 ease-in-out hover:scale-105">            
        <h3 class="text-lg font-semibold w-full h-6 mx-auto">{{ $specialty->name }}</h3>
    </a>
@endforeach   
        </div>
</section>
           
                
               
</x-patient-layout>
