document.addEventListener('DOMContentLoaded', () => {
    const plusSign1 = document.querySelector('.plus1');
    const plusSign2 = document.querySelector('.plus2');
    const plusSign3 = document.querySelector('.plus3');
    const optionsList1 = document.querySelector('.blk1');
    const optionsList2 = document.querySelector('.blk2');
    const optionsList3 = document.querySelector('.blk3');

    optionsList1.classList.add('blk');
    plusSign1.addEventListener('click', () => {
        optionsList1.classList.toggle('blk');
    });
    optionsList2.classList.add('blk');
    plusSign2.addEventListener('click', () => {
        optionsList2.classList.toggle('blk');
    });
    optionsList3.classList.add('blk');
    plusSign3.addEventListener('click', () => {
        optionsList3.classList.toggle('blk');
    });
});



