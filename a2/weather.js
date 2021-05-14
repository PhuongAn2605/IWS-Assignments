let api_key = 'AfQDsAklfRngIO14X2eWnV9jP9teK7dA';

const getWeather = async(ip) => {
    const url = 'http://dataservice.accuweather.com/currentconditions/v1/';
    const param = `${ip}?apikey=${api_key}`;

    const response = await fetch(url + param);
    const data = await response.json();

    console.log(data);
}
getWeather();