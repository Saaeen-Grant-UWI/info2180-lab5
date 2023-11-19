const load = () => {

    let lookupButton = document.getElementById("lookup")
    let result = document.getElementById("result")
    let countryInput = document.getElementById("country")
    
    lookupButton.addEventListener("click", () => {
    
        fetch(`world.php?input=${countryInput.value}`)
        .then(response => response.text())
        .then(data => {
            result.innerHTML = data
        })
        .catch(error => alert(error))
    })
        

}
document.addEventListener("DOMContentLoaded", load)