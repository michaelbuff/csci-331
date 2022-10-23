const body = document.querySelector("body")

function getArticle() {
  var url = 'https://newsapi.org/v2/top-headlines?country=us&category=business&pageSize=1&apiKey=cf7890db28ef4d7bbb142db8bd4e78cf';
    //this api has some weird issues - throws error code 426
  var alturl = "https://randomuser.me/api";
fetch(alturl)      
  .then((response) => {
    console.log(response);
    if (response.status === 200) { 
      return (response.json()) 
    }
    else
      throw response.status
    }) 
  .then((data) => {                 
            console.log("got the data!")
            console.log(data);
            const imageUrl = data.results[0].picture.large;
            const name = data.results[0].name.first;
            const country = data.results[0].location.country;

            const htmlData = `
            <h2 class="article">${name} from ${country}</h2>
            <img  class="article" src=${imageUrl} alt="article image" width=100>
            <input type="hidden" name="name" value="${name}"/>
            <input type="hidden" name="country" value="${country}"/>
            <input type="hidden" name="imageUrl" value="${imageUrl}"/>
            `
            apiData = document.getElementById("apiData")
            apiData.innerHTML = htmlData
  })
  .catch(error => {
    mdnCodes = "https://developer.mozilla.org/en-US/docs/Web/HTTP/Status";  
    apiData = document.getElementById("apiData");
    apiData.innerHTML = `<h2>Problem: <a href=${mdnCodes}>${error} Error</a></h2>`;
  })
} // close getUser

getArticle();
