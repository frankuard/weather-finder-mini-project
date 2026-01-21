
const API_KEY = "ea3af175a54d9a343657b1de3aab08b4"
const searchbtn = document.getElementById("search")
const inputbox = document.getElementById("input")
const weatherinfo = document.querySelector(".weatherinfo")


async function mainFunction(city_name) {

  const Url = `http://localhost/Prototype2/connection.php?q=${city_name}`
  const res = await fetch(Url);
  const data = await res.json();


  if (data.error) {
    weatherinfo.innerHTML = `<div class="header"> <h1 class="city" id="error">No City Found</h1> </div> `;
    return;
  }

  weatherinfo.innerHTML = `<div class="header">
<h1 class="city">${data.City}</h1>
<h3 id="date"> ${data.Dates}</h3>
<p class="weathercondition">${data.Small_Weather_Condition}</p>
</div>


<div class="mainweatherinfo">

 <img src="https://openweathermap.org/img/wn/${data.Icon}@2x.png" class="img" alt="pic">
    <h1 class="temperature">${data.Temperature}&deg;C</h1>
</div>


 <div class="maincontainer" id="firstcontainer">
       <div class="container1"> <h1 class="title">Weather Condition</h1>
        <h2 class="body"><img src="https://openweathermap.org/img/wn/02d@2x.png" class="smallicons"> <span class="imgtext">${data.Weather_Condition} </span> </h2> 
        </div>
        

         <div class="container1"><h1 class="title">Pressure</h1> 
        <h2 class="body"> <img src="https://openweathermap.org/img/wn/13d@2x.png" class="smallicons"><span class="imgtext">${data.Pressure} hPa</span> </h2>
        </div>

 </div>


<div class="maincontainer">

       <div class="container1"> <h1 class="title">Wind Speed</h1>
        <h2 class="body"> <img src="https://openweathermap.org/img/wn/50d@2x.png" class="smallicons"><span class="imgtext">${(data.Wind_Speed * 2.237).toFixed(1)} mph</span> </h2>
        </div>

         <div class="container1"><h1 class="title"> Humidity</h1> 
        <h2 class="body"> <img src="https://openweathermap.org/img/wn/09d@2x.png" class="smallicons"><span class="imgtext">${data.Humidity}%</span> </h2>
        </div>

</div>`;
}


window.addEventListener("DOMContentLoaded", () => {

  mainFunction("Biratnagar");

});

searchbtn.addEventListener("click", () => {
  const text = inputbox.value
  if (!text) {
    weatherinfo.innerHTML = `<div class="header"> <h1 class="city" id="error">No City Found</h1> </div>`;
    return;
  }
  mainFunction(text);
});
