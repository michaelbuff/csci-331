const body = document.querySelector("body")

/*
    Note:
    Use fetch() to simplify handling of Promise object

    Next... mySQL Database
*/

function getArticle() {
// fetch() sends a GET request (by default) to the given URL; returns a Promise...
fetch('https://newsapi.org/v2/top-headlines?country=us&category=business&pageSize=1&apiKey=cf7890db28ef4d7bbb142db8bd4e78cf')      
// ...1st Promise obj resolves to Response obj
  .then((response) => {
    if (response.status === 200) { //  (response.ok)
      return (response.json()) // Response method .json() returns Promise...
    }
    else
      console.log(response);
      throw response.status
      // return Promise.reject('Error: ' + response.status)
    }) 
  .then((data) => {                 //...2nd Promise obj resolves to JSON
            console.log("got the data!")
            console.log(data);
            const imageUrl = data.articles[0].urlToImage;
            const headline = data.articles[0].title;
            const source = data.articles[0].source.name;

            const htmlData = `
            <h2 class="article">${headline}</h2>
            <p class="article">From ${source} </p>
            <img  class="article" src=${imageUrl} alt="article image" width=100>
            <input type="hidden" name="headline" value="${headline}"/>
            `
            apiData = document.getElementById("apiData")
            apiData.innerHTML = htmlData
  })
  .catch(error => {
    mdnCodes = "https://developer.mozilla.org/en-US/docs/Web/HTTP/Status"
    apiData.innerHTML = `<h2>Problem: <a href=${mdnCodes}>${error} Error</a></h2>`
  })
} // close getUser

getArticle();
