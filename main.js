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
    console.log(2)
})

countryBtn.addEventListener('click', function () {
    countryTable.classList.remove('hidden');
    continentTable.classList.add('hidden');
    cityTable.classList.add('hidden')
    console.log(3)
})

cityBtn.addEventListener('click', function () {
    cityTable.classList.remove('hidden')
    countryTable.classList.add('hidden');
    continentTable.classList.add('hidden');
    console.log(4)
})

// modal
const addCountry = document.querySelector('.addCountryBtn');
const showModal = document.getElementById('countryModal');

addCountry.addEventListener('click', function () {
    showModal.classList.remove('hidden');
    countryTable.classList.add('hidden');
    console.log(1)
})