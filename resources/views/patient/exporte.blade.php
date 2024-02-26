
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>certificate</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="min-h-screen bg-gray-100 flex items-center justify-center w-full">
  <div class="px-10 w-full">
    <div class="bg-white max-w-2xl mx-auto rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
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
       
      </div>
    </div>
  </div>
</div>
</body>
</html>
