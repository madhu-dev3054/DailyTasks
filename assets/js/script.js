// searchbar js 
const searchInput = document.getElementById("searchInput");

if(searchInput){

    searchInput.addEventListener("keyup", function(){

        let filter = searchInput.value.toLowerCase();

        let rows = document.querySelectorAll("table tr");

        rows.forEach((row, index) => {

            if(index === 0) return;

            let text = row.innerText.toLowerCase();

            if(text.includes(filter)){
                row.style.display = "";
            }
            else{
                row.style.display = "none";
            }

        });

    });

}

// Dark Mode Toggle
const darkBtn = document.getElementById("darkModeBtn");

if(darkBtn){

    darkBtn.addEventListener("click", function(){

        document.body.classList.toggle("light-mode");

    });

}

//Toast JavaScript
function showToast(message){

    const toast = document.getElementById("toast");

    toast.innerText = message;

    toast.style.display = "block";

    setTimeout(() => {

        toast.style.display = "none";

    }, 3000);

}