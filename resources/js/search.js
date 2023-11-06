const searchBtn = document.getElementById('search-btn')
const searchForm = document.getElementById('search-form')

searchBtn.onclick = () => {
    searchBtn.classList.toggle('none')
    searchForm.classList.toggle('none') 
}
