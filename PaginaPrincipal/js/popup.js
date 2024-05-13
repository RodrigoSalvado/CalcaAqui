document.querySelector("#show-popup").addEventListener("click", function (){
    console.log("clicou");
   document.querySelector(".popup").classList.add("active");
});

document.querySelector(".popup .close-btn").addEventListener("click", function (){
    document.querySelector(".popup").classList.remove("active");
});