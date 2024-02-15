<x-doctor-layout>
     <!-- CONTENT -->
    <div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
        <nav class = "flex px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
            <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                <li class = "inline-flex items-center">
                    <a href="#" class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class = "w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class = "flex items-center">
                        <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>
                        <a href="#" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Templates</a>
                    </div>
                </li>
            </ol>
         </nav>
        <div class = "flex flex-wrap my-5 -mx-2">
            <div class = "w-full lg:w-1/3 p-2">
                <div class = "flex justify-between items-center flex-row w-full bg-gradient-to-r dark:from-black dark:to-gray-500 from-blue-900 via-blue-500 to-blue-300 rounded-md p-3">                   
                    <form action="" class="">
                        <select class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400  rounded-md shadow leading-tight focus:outline-none focus:ring">
                                <option selected disabled>Filter by Specialty</option> 
                                @foreach($specialities as $specialty)
                                <option value="{{$specialty->id}}">{{$specialty->name}}</option> 
                                @endforeach
                        </select>
                    </form>
                    <div class="mr-3">
                        <i class="fas fa-plus text-white text-3xl cursor-pointer" onclick="OpenAddMedication()"></i>
                    </div>
                </div>
            </div>
           
            <div class = "w-full md:w-1/2 lg:w-1/3 p-2">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">
                        <table class="min-w-full divide-y divide-gray-200 ">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class=" md:px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class=" md:px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Medication
                                    </th>
                                    <th scope="col"
                                        class=" md:px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Specialty
                                    </th>
                                    <th scope="col"
                                        class=" md:px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Operation
                                    </th>
                                </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($Medications as $Medication)
                            <tr>
                                <td class="md:px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900">{{ $Medication->id }}</div>
                                </td>
                                <td class="md:px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm font-medium text-gray-900">{{$Medication->name}}</div>
                                </td>
                                <td class="md:px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm font-medium text-gray-900">{{ $Medication->specialty->name }}</div>
                                </td>
                                <td class="md:px-6 py-4 flex justify-center space-x-10">
                                    <i class="fas fa-trash-alt cursor-pointer" onclick="OpenDeleteMedication({{ $Medication->id }})"></i>
                                    <i class="fas fa-edit cursor-pointer" onclick="OpenEditMedication({{ $Medication->id }})"></i>
                                </td>
                            </tr>
                                                            <!-- Popup Delete Specialty -->
                        <!-- ______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________                                                        -->
                                                    
                        <div id="DeleteMedication{{ $Medication->id }}" class=" hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover" >
                                                        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
                                                            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                                                <div class="text-center p-5 flex-auto justify-center">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                    </svg>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                                    </svg>
                                                                    <h2 class="text-xl font-bold py-4 ">Are you sure?</h3>
                                                                    <p class="text-sm text-gray-500 px-8">Do you really want to delete this Speciality?
                                                                                    maybi this Medication was in accounts for doctors </p>    
                                                            </div>                                      
                                                            <form action="{{ route('deleteMedicationD', $Medication->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="p-3  mt-2 text-center space-x-4 md:block">
                                                                    <button type="button" onclick="closeDeleteMedication({{ $Medication->id }})" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                                                        Cancel
                                                                    </button>
                                                                    <button class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600"
                                                                        type="submit">Delete</button>
                                                                </div>        
                                                            </form>                                          
                                                        </div>
                                                    </div>
                                                                                                                <!-- Popup Update Specialty -->
                        <!-- ______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________                                                        -->

                                                    <div id="EditMedication{{ $Medication->id }}" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
                                                            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
                                                        <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                                                <!-- Form to Edit specialty -->
                                                                <form method="POST" action="{{ route('editMedicationD', $Medication->id) }}" class="space-y-4">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="flex flex-col">
                                                                        <x-input-label for="name" :value="__('New name')" />
                                                                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$Medication->name" />
                                                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                                    </div>
                                                                    <div class="flex space-x-14 justify-end mt-5">
                                                                        <button type="button" onclick="CloseEditMedication({{ $Medication->id }})" class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</button>
                                                                        <x-primary-button class="ms-4">
                                                                            {{ __('Update') }}
                                                                        </x-primary-button>
                                                                    </div>
                                                                </form>
                                                        </div>
                                                    </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>                            
        </div>
    </div>





    <div id="AddMedication" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                    <!-- Form to add Medication -->
                    <form method="post" action="{{ route('AddMedicationD') }}" class="space-y-4" enctype="multipart/form-data">
                     @csrf
                        <div class="flex flex-col">
                            <div class="mt-4">
                                <x-input-label for="name" :value="__('name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div> 
                            <div id="specialties" class="mt-4 ">                               
                                <x-input-label for="specialy" :value="__('Specialty')" />
                                <select id="specialties" name="specialty" class="block mt-1 w-full rounded-md" >
                                    <option selected disabled >Choose your spetiality</option>
                                    @foreach ($specialities as $speciality)
                                        <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                    @endforeach
                                </select>
                               
                            </div>         
                    <div class="flex space-x-14 justify-end mt-5">
                        <button type="button"  onclick="CloseAddMedication()" class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5  text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</button>
                        <x-primary-button class="ms-4" >
                            {{ __('Save') }}
                        </x-primary-button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
</x-doctor-layout>
