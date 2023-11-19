const load = () => {

    let countryLookup = document.getElementById("country-lookup")
    let cityLookup = document.getElementById("city-lookup")
    let result = document.getElementById("result")
    let countryInput = document.getElementById("country")


    countryLookup.addEventListener("click", () => {
        getData(`country=${countryInput.value}`)
    })
    
    cityLookup.addEventListener("click", () => {
        getData(`country=${countryInput.value}&lookup=cities`)
    })

 






    const getData = (query) => {
        fetch(`world.php?${query}`)
        .then(response => response.text())
        .then(data => {
            result.innerHTML = data
        })
        .catch(error => alert(error))
    }
        

}
document.addEventListener("DOMContentLoaded", load)