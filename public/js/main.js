   // Function to open the modal
   function OpenAddSpeciality() {
    document.getElementById('AddSpeciality').classList.remove('hidden');
}

// Function to close the modal
function CloseAddSpeciality() {
    document.getElementById('AddSpeciality').classList.add('hidden');
}
function OpenDeleteSpeciality(id) {
document.getElementById(`DeleteSpeciality${id}`).classList.remove('hidden');
}

function closeDeleteSpeciality(id){
document.getElementById(`DeleteSpeciality${id}`).classList.add('hidden');
}
function OpenEditSpciality(id) {
document.getElementById(`EditSpeciality${id}`).classList.remove('hidden');
}

function CloseEditSpeciality(id) {
document.getElementById(`EditSpeciality${id}`).classList.add('hidden');
}

function OpenAddMedication() {
    document.getElementById(`AddMedication`).classList.remove('hidden');
}
    
    function CloseAddMedication() {
    document.getElementById(`AddMedication`).classList.add('hidden');
}
function OpenDeleteMedication(id) {
    document.getElementById(`DeleteMedication${id}`).classList.remove('hidden');
    }
    
    function closeDeleteMedication(id){
    document.getElementById(`DeleteMedication${id}`).classList.add('hidden');
    }
    function OpenEditMedication(id) {
    document.getElementById(`EditMedication${id}`).classList.remove('hidden');
    }
    
    function CloseEditMedication(id) {
    document.getElementById(`EditMedication${id}`).classList.add('hidden');
    }



     function updateCurrentTime() {
        var now = new Date();
        
        var formattedDate = ('0' + now.getDate()).slice(-2) + '/' + ('0' + (now.getMonth() + 1)).slice(-2) + '/' + now.getFullYear();
        var formattedTime = ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2) + ':' + ('0' + now.getSeconds()).slice(-2);
        
        document.getElementById('current-time').textContent = formattedDate + ' ' + formattedTime;
    }
    setInterval(updateCurrentTime, 1000);
    updateCurrentTime();



    const sidebar = document.querySelector("aside");
    const maxSidebar = document.querySelector(".max")
    const miniSidebar = document.querySelector(".mini")
    const roundout = document.querySelector(".roundout")
    const maxToolbar = document.querySelector(".max-toolbar")
    const logo = document.querySelector('.logo')
    const content = document.querySelector('.content')
    const moon = document.querySelector(".moon")
    const sun = document.querySelector(".sun")

    function setDark(val){
        if(val === "dark"){
            document.documentElement.classList.add('dark')
            moon.classList.add("hidden")
            sun.classList.remove("hidden")
        }else{
            document.documentElement.classList.remove('dark')
            sun.classList.add("hidden")
            moon.classList.remove("hidden")
        }
    }

    function openNav() {
        if(sidebar.classList.contains('-translate-x-48')){
            // max sidebar 
            sidebar.classList.remove("-translate-x-48")
            sidebar.classList.add("translate-x-none")
            maxSidebar.classList.remove("hidden")
            maxSidebar.classList.add("flex")
            miniSidebar.classList.remove("flex")
            miniSidebar.classList.add("hidden")
            maxToolbar.classList.add("translate-x-0")
            maxToolbar.classList.remove("translate-x-24","scale-x-0")
            logo.classList.remove("ml-12")
            content.classList.remove("ml-12")
            content.classList.add("ml-12","md:ml-60")
        }else{
            // mini sidebar
            sidebar.classList.add("-translate-x-48")
            sidebar.classList.remove("translate-x-none")
            maxSidebar.classList.add("hidden")
            maxSidebar.classList.remove("flex")
            miniSidebar.classList.add("flex")
            miniSidebar.classList.remove("hidden")
            maxToolbar.classList.add("translate-x-24","scale-x-0")
            maxToolbar.classList.remove("translate-x-0")
            logo.classList.add('ml-12')
            content.classList.remove("ml-12","md:ml-60")
            content.classList.add("ml-12")

        }

    }
