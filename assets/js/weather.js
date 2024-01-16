const city = document.getElementById("city");

const cityName = document.getElementById("city-name");
const temp = document.getElementById("city-temp");
const weather = document.getElementById("city-weather");
const humidity = document.getElementById("city-humidity");
const wind = document.getElementById("city-wind");
const icon = document.getElementById("city-icon");



const btnPronostico = document.getElementById("btn-pronostico");
const btnPronosticoUbicacion = document.getElementById("btn-ubicacion");
const informacion = document.getElementById("mostrar-informacion");

const API_KEY = "c0244223e53f41ce80c9122a341d8493";
const BASE_URL = "https://api.openweathermap.org/data/2.5/weather?";
const UNITS = "metric";
const LANG = "es";
const IMG_URL = "http://openweathermap.org/img/wn/";
const IMG_EXT = "@2x.png";



const getWeather = async (lat, lon) => {
    const response = await fetch(`${BASE_URL}lat=${lat}&lon=${lon}&units=${UNITS}&lang=${LANG}&appid=${API_KEY}`);
    const data = await response.json();
    return data;
}

const getWeatherByCity = async (city) => {
    const response = await fetch(`${BASE_URL}q=${city}&units=${UNITS}&lang=${LANG}&appid=${API_KEY}`);
    const data = await response.json();
    return data;
}


btnPronostico.addEventListener("click", () => {
    event.preventDefault();
    const cityValue = city.value;
    if (validateInput(cityValue)) {
        getWeatherByCity(cityValue)
            .then(data => {
                console.log(data);
                cityName.innerHTML = `Información del Tiempo para ${data.name}, ${data.sys.country}`;
                temp.innerHTML = `Temperatura: ${data.main.temp}°C`;
                weather.innerHTML = `Descripción: ${data.weather[0].description}`;
                humidity.innerHTML = `Humedad: ${data.main.humidity}%`;
                wind.innerHTML = `Viento: ${data.wind.speed} km/h`;
                icon.src = `${IMG_URL}${data.weather[0].icon}${IMG_EXT}`;
            })
            .catch(error => console.log(error));
    } else {
        alert("Ingresa una ciudad válida");
    }
});

function validateInput(input) {
    return input.trim() !== "";
}


btnPronosticoUbicacion.addEventListener("click", () => {
    event.preventDefault();
    navigator.geolocation.getCurrentPosition(position => {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;
        getWeather(lat, lon)
            .then(data => {
                console.log(data);
                cityName.innerHTML = `Información del Tiempo para ${data.name}, ${data.sys.country}`;
                temp.innerHTML = `Temperatura: ${data.main.temp}°C`;
                weather.innerHTML = `Descripción: ${data.weather[0].description}`;
                humidity.innerHTML = `Humedad: ${data.main.humidity}%`;
                wind.innerHTML = `Viento: ${data.wind.speed} km/h`;
                icon.src = `${IMG_URL}${data.weather[0].icon}${IMG_EXT}`;
            })
            .catch(error => console.log(error));
    });
});





// https://api.openweathermap.org/data/2.5/weather?q={city name}&appid={API key}
// https://api.openweathermap.org/data/2.5/weather?lat={lat}&lon={lon}&appid={API key}



