// buttons
const continentBtn = document.querySelector('.continent');
const countryBtn = document.querySelector('.country');
const cityBtn = document.querySelector('.city');
// tables
const countryTable = document.querySelector('.country-table');
const continentTable = document.querySelector('.continent-table');
const cityTable = document.querySelector('.city-table');

continentBtn.addEventListener('click', function () {
    continentTable.classList.remove('hidden')
    countryTable.classList.add('hidden');
    cityTable.classList.add('hidden')
})

countryBtn.addEventListener('click', function () {
    countryTable.classList.remove('hidden');
    continentTable.classList.add('hidden');
    cityTable.classList.add('hidden')
})

cityBtn.addEventListener('click', function () {
    cityTable.classList.remove('hidden')
    countryTable.classList.add('hidden');
    continentTable.classList.add('hidden');
})