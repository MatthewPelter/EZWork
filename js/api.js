const data = null;

const xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === this.DONE) {
    console.log(this.responseText);
  }
});

xhr.open(
  "GET",
  "https://job-search4.p.rapidapi.com/simplyhired/search?query=Software%20Engineer&page=1"
);
xhr.setRequestHeader("x-rapidapi-host", "job-search4.p.rapidapi.com");
xhr.setRequestHeader(
  "x-rapidapi-key",
  "944eebcefemshb5e6f9ed931ad35p11fa93jsnce2382f2a475"
);

xhr.send(data);
