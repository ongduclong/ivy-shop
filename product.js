// click vào ảnh nhỏ chạy ảnh to
const bigImg = document.querySelector(".product-content-left-big-img img");
const smallImg = document.querySelectorAll(".product-content-left-small-img img");
smallImg.forEach(function(imgItem,x){
    imgItem.addEventListener("click",function(){
        bigImg.src = imgItem.src
    })
})

// click hiện chi tiết vs bảo quản
const baoquan = document.querySelector('.baoquan');
const chitiet = document.querySelector('.chitiet');
if(baoquan){
    baoquan.addEventListener("click", function(){
        document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "none";
        document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "block";
    })
}
if(chitiet){
    chitiet.addEventListener("click", function(){
        document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "block";
        document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "none";
    })
}
// click button down hiện phần dưới
const buttonDown = document.querySelector(".product-content-right-bottom-top");
if(buttonDown) {
    buttonDown.addEventListener("click", function(){
        document.querySelector(".product-content-right-bottom-content-big").classList.toggle("active-2")
    })
}
