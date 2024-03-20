const dropDown = document.getElementById('dropDown')
const dropDownBtn = document.getElementById('dropDownBtn')

dropDownBtn.addEventListener('click', () => {
    dropDownBtn.style.background = 'crimson';
})
const handleDropDown = () => {
    dropDown.classList.toggle('hiddem')
}