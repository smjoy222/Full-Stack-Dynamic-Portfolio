// navbar= document.getElementsByClassName("navbar");

// for(i=0; i<navbar[0].children.length; i++) {
//     navbar[0].children[i].addEventListener("click", function(event) {
//         console.log(event.target.innerText);
//     });
// }

// document.querySelectorAll("h3").forEach((varname) => {
//     varname.onclick = function() {
//         alert(this.innerHTML);
//     }});
// document.querySelectorAll("button").forEach((varname) => {
//     varname.onclick = function() {
//         document.querySelector(".change").innerHTML = 
//         <p>hello this an inner html</p>;
//         img = document.querySelector("img");
//         img.src = "https://picsum.photos/200/300";
//         this.classList.add("btn");
//         img.classList.add("rounded");
//     }});




// let currentIndex = 0;
// let maxwordIndex = words.length - 1;
// words[currentWordIndex].style.opacity = "1";
// let changeText = () => {
//     let currentWord = words[currentIndex];
//     let nextWord = currentWordIndex === maxwordIndex ? words[0] : words[currentIndex + 1];
//     Array.from(currentWord.children).forEach((letter, i) => {
//         setTimeout(() => {
//             letter.className = "letter out";
//         }, i * 80);
//     });
//     nextWord.style.opacity = "1";
//         Array.from(nextWord.children).forEach((letter, i) => {
//             letter.className = "letter behind";
//             setTimeout(() => {
//                 letter.className = "letter in";
//             }, 340 + i * 80);
//         });
//     };

//     changeText();
//     setInterval(changeText, 3000);





let words = document.querySelectorAll(".word");
words.forEach((word) => {
    let letters = word.innerText.split("");
    word.textContent = "";
    latters.forEach((letter) => {
        let span = document.createElement("span");
        span.textContent = letter;
        span.className = "letter"; 
        word.append(span);
    });
});

