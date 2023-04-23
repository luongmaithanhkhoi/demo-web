const toggle = document.querySelector(".toggle")
const toggle1 = document.querySelector(".toggle1")
const input = document.querySelector(".btn1")
const confir_input = document.querySelector(".btn2")
toggle.addEventListener("click", () =>{
    if(input.type === "password"){
        input.type = "text";
        toggle.classList.replace("uil-eye-slash", "uil-eye");
    
    }else{
        input.type = "password";
        toggle.classList.replace("uil-eye", "uil-eye-slash");
    }
})
toggle1.addEventListener("click", () =>{
    if(confir_input.type === "password"){
        confir_input.type = "text";
        toggle1.classList.replace("uil-eye-slash", "uil-eye");
    }else{
        confir_input.type = "password";
        toggle1.classList.replace("uil-eye", "uil-eye-slash");
    }
})

function tai_lai_trang(){
    location.reload();
}
