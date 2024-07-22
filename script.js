const costumeCarousel = document.querySelector(".costume-carousel"),
firstImg = costumeCarousel.querySelectorAll("img")[0];
arrowIcons = document.querySelectorAll(".wrapper i");


let isDragStart = false, prevPageX, prevScrollLeft, positionDiff;


//if the carousel scroll left values is 0 then hide the prev icon else show it
const showHideIcons = () => {
    let scrollWidth = costumeCarousel.scrollWidth - costumeCarousel.clientWidth;
    arrowIcons[0].style.display = costumeCarousel.scrollLeft == 0 ? "none" : "block";
    arrowIcons[1].style.display = costumeCarousel.scrollLeft == scrollWidth ? "none" : "block";
}

arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        let firstImgWidth = firstImg.clientWidth + 14; //getting first img width $adding 16 margin value
        //if clicked icon is left, reduce width value from the carousel scroll left else add to it
        costumeCarousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
        setTimeout(() => showHideIcons(), 60); // panggil showhideicon setelah 60 detik
    });
});

// const autoSlide = () => {
//     if(costumeCarousel.scrollLeft == (costumeCarousel.scrollWidth - costumeCarousel.clientWidth)) return;
//     positionDiff = Math.abs(positionDiff); //making positiondiff value to positive
//     let firstImgWidth = firstImg.clientWidth + 14;
//     let valDifference = firstImgWidth - positionDiff;

//     if(costumeCarousel.scrollLeft > prevScrollLeft) { // kalo geser ke kanan
//         return costumeCarousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
//     }
//     //geser ke kiri
//     costumeCarousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
// }

const dragStart = (e) => {
    if (e.target.tagName === 'IMG') return;
    //updating global variables value on mouse down event
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = costumeCarousel.scrollLeft;
}

const dragging = (e) => {
    if(!isDragStart) return;
    e.preventDefault();
    costumeCarousel.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX)- prevPageX;
    costumeCarousel.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons();
}

const dragStop = () => {
    isDragStart = false;
    costumeCarousel.classList.remove("dragging");
    autoSlide();
}
costumeCarousel.addEventListener("mousedown", dragStart);
costumeCarousel.addEventListener("touchstart", dragStart);

costumeCarousel.addEventListener("mousemove", dragging);
costumeCarousel.addEventListener("touchmove", dragging);

costumeCarousel.addEventListener("mouseup", dragStop);
costumeCarousel.addEventListener("touchend", dragStop);


