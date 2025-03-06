
// const form = document.querySelector('form');
// const allInput = form.querySelectorAll(".first input");
// const allSelect = form.querySelectorAll(".first select");
// const allTextArea = form.querySelectorAll(".first textarea");
// const nextBtn = document.querySelector('.nextBtn');


// nextBtn.addEventListener("click", () => {
//     let hasValue = true;


//     allInput.forEach(input => {
//         if (input.value.trim() === "") {
//             hasValue = false;
//         }
//     });

//     allSelect.forEach(select => {
//         if (select.value.trim() === "") {
//             hasValue = false;
//         }
//     });

//     allTextArea.forEach(textarea => {
//         if (textarea.value.trim() === "") {
//             hasValue = false;
//         }
//     });

//     if (hasValue) {
//         // document.querySelector('.first').classList.add('hide');
//         // document.querySelector('.second').classList.remove('hide');
//         // document.querySelector('.second').classList.add('show');
//         //document.querySelector('.second').classList.remove('hide');
//         document.querySelector('.first').classList.add('hide');
//         document.querySelector('.second').classList.add('show');
//     } else {
//         // document.querySelector('.first').classList.remove('hide');
//         // document.querySelector('.second').classList.add('hide');
//     }
// });


// //backBtn.addEventListener("click", () => form.classList.remove('secActive'));



const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input"),
        heads = document.querySelector(".head h2");
        
//form.classList.add('secActive')
nextBtn.addEventListener("click", (event)=> {
    event.preventDefault()
    const allFilled = Array.from(allInput).every(input => input.value.trim() !== "");
    if (allFilled) {
        console.log(1)
        form.classList.add('secActive');
        heads.innerText = 'Company Address';
    } else {
        form.classList.remove('secActive');
        heads.innerText = 'General Information';
    }
});

backBtn.addEventListener("click", () => {
    form.classList.remove('secActive')
    heads.innerText = 'General Information';
});


