// document.addEventListener("DOMContentLoaded",()=>{
//     const signInEl= document.querySelector(".sign-In-btn");
//     const patternAtEl= document.querySelector(".pattern-at");
//     const peopleEl= document.querySelector(".pattern-people");
//     const diamondEl= document.querySelector(".pattern-diamond");
//     const globalEl= document.querySelector(".pattern-global");
 
 
//     signInEl.addEventListener('click',()=>{
//         patternAtEl.style.top="0";
//         patternAtEl.style.position="relative";
//         patternAtEl.style.left="0";
//         globalEl.style.position="relative";
//         globalEl.style.top="0";
//         globalEl.style.left="0";
//         peopleEl.style.position="relative";
//         peopleEl.style.top="0";
//         peopleEl.style.right="0";
//         diamondEl.style.position="relative";
//         diamondEl.style.top="0";
//         diamondEl.style.right="0";


//     })




    
// })

// script.js



// Optionally set initial position with JavaScript if needed
 document.addEventListener('DOMContentLoaded', () => {


    // function movePatterns() {
    //     const patterns = document.querySelectorAll('.pattern');
    //     patterns.forEach(pattern => {
    //         const currentTop = window.getComputedStyle(pattern).top;
    //         const newTop = parseFloat(currentTop) - 20 + 'px'; // Move up by 20px
    //         pattern.style.top = newTop;
    //     });
    // }



    const patterns = document.querySelectorAll('.pattern');

    const signInEl= document.querySelector("#sign-In-btn");

    signInEl.addEventListener("click",() =>{
        console.log("Function triggered");
        patterns.forEach(pattern => {
            pattern.style.position = 'relative'; // Ensure relative positioning
            pattern.style.top = '0px';
            pattern.style.left = '0px';
            pattern.style.bottom = '0px';
            pattern.style.right = '0px';
            console.log("Function triggered");
            
        });
    })
        
 
     });
