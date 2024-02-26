<x-patient-layout>
   
@if(session('success'))
    <script>
        setTimeout(function() {
            alert('{{ session('success') }}');
        }, 100);
    </script>
@endif

<div
    class=" mx-4  sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto  bg-white shadow-xl rounded-lg text-gray-900">
    <div class="rounded-t-lg h-32 md:h-48 overflow-hidden">
        <img class="object-cover object-top w-full" src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt='Mountain'>
    </div>
    <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
        <img class="object-cover object-center h-32" src="{{asset('imgs/doctor.png')}}"  alt='Woman looking front'>
    </div>
    <div class="text-center mt-2">
        <h2 class="font-semibold">{{$doctor->user->name}}</h2>
        <p class="text-gray-500">{{$doctor->specialty->name}}</p>
    </div>
    <ul class="py-4 mt-2 text-gray-700 flex items-center justify-around">
        <li class="flex flex-col items-center justify-around">
        <i class="far fa-comment text-blue-600 text-2xl"></i>
            <div>{{$commentCount}}</div>
        </li>
        <li class="flex flex-col items-center justify-between">
        @if ($doctorIsFavorite)
        <form action="{{ route('favorite.delete') }}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" value="{{ $doctorID }}" name="doctorID">
            <input type="hidden" value="{{ Auth::user()->patient->id }}" name="patientID">
        
            <button type="submit"> <i class="fas fa-heart text-red-600 text-2xl"></i></button>
        </form>
            @else
            <form action="{{ route('favorite.store') }}" method="post">
            @csrf
            @method('POST')
            <input type="hidden" value="{{ $doctorID }}" name="doctorID">
            <input type="hidden" value="{{ Auth::user()->patient->id }}" name="patientID">
             <button type="submit"><i class="far fa-heart text-2xl"></i></button>
            </form>        
            @endif
        
            <div>{{$favoritesCount}}</div>
        </li>
        <li class="flex flex-col items-center justify-around">
            <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
            </svg>
            <div>15</div>
        </li>
    </ul>
    <div class="p-4 border-t mx-8 mt-2">
        <a href="{{ route('PatientAppointment',['doctorID'=>$doctor->id])}}" class="w-1/2 block mx-auto rounded-full bg-blue-600 hover:shadow-lg font-semibold text-center text-white px-6 py-2">Take An Appointment</a>
    </div>

<!-- component -->
<div class="   flex justify-center items-center  p-10">
    <div class=" w-full  px-10 flex flex-col gap-2 p-5  text-white">
        <h1 class="py-5 text-lg">Reviews</h1>
        <form action="{{route('comments.store')}}" method="post" class="flex bg-gray-600 bg-opacity-20 border border-gray-200 rounded-md">
            @csrf
            @method('POST')
            <input type="hidden" value="{{$doctorID}}" name="doctorID">
            <input type="hidden" value="{{Auth::user()->patient->id}}" name="patientID">
            <button type="submit"><i class=" fas fa-paper-plane py-4 p-3"></i></button>
            <input type="comment" name="comment" id="comment" placeholder="Write a comment" class="p-2 w-full text-black bg-transparent focus:outline-none">                
        </form>

        
        
        <!-- Item Container -->
        <div class="w-full  flex flex-col gap-3 mt-14">
            
                <!-- Profile and Rating -->
                
                    @foreach ($comments as $comment)
                    <div class="flex w-full flex-col gap-4 bg-gray-700 p-4">
                  <div class="flex justify justify-between">      
                    
                    <div class="flex gap-2">
                        <div class="w-7 h-7 text-center rounded-full bg-red-500">J</div>
                        <span>{{$comment->patient->user->name}}</span>
                    </div>
                    <div class="flex p-1 gap-1 text-orange-300">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star-half"></ion-icon>
                    </div>
                </div>

                <div>
                   {{ $comment->comment}}
                </div>

                <div class="flex justify-between">
                    <span>{{$comment->created_at}}</span>
                   </div>
                </div>
            @endforeach
        
        </div>
    </div>
</div>

</div>
</x-patient-layout>