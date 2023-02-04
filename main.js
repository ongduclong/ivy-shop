// click hiện submenu
const itemCategory = document.querySelectorAll('.category-left-li');
itemCategory.forEach(function(menu,index){
    menu.addEventListener("click",function(){
        menu.classList.toggle("block")
    })
})

// scroll header
const header = document.querySelector("header");
window.addEventListener("scroll",function(){
x = window.pageYOffset;
if(x > 0) {
    header.classList.add("sticky")
}
else {
    header.classList.remove("sticky")
}
})
