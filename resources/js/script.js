

// navbar= document.getElementsByClassName("navbar");

// for(i=0; i<navbar[0].children.length; i++) {
//     navbar[0].children[i].addEventListener("click", function(event) {
//         console.log(event.target.innerText);
//     });
// }

document.querySelectorAll("h3").forEach((varname) => {
    varname.onclick = function() {
        alert(this.innerHTML);
    }});
document.querySelectorAll("button").forEach((varname) => {
    varname.onclick = function() {
        document.querySelector(".change").innerHTML = 
        <p>hello this an inner html</p>;
        img = document.querySelector("img");
        img.src = "https://picsum.photos/200/300";
        this.classList.add("btn");
        img.classList.add("rounded");
    }});