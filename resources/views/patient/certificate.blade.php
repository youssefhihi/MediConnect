<x-patient-layout>
 <h1>
    certaficate medecal 
 </h1>
 <p>patient name: {{$consultation->patient->user->name}}</p>
 <p>doctor name: {{$consultation->doctor->user->name}}</p>
 <p>appointment : {{$consultation->appointment->booking_time}}</p>
 <p>medication: </p>
 <p>patient name: {{$consultation->patient->user->name}}</p>
 <p>days OFF: {{$consultation->NumOfDays}}</p>
 <p> symptoms: {{$consultation->symptoms}}</p>
 

</x-patient-layout>
