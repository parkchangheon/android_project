const APIKEY = "04c35731a5ee918f014970082a0088b1";
const APIURL = 'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=04c35731a5ee918f014970082a0088b1&page=1'

const IMGPATH = 'https://image.tmdb.org/t/p/w1280';

async function getMovies(){

    const resp= await fetch(APIURL);
    const respData = await resp.json();
    
    console.log(respData);

    respData.results.forEach(movie =>{

        movieEl.classList.add('movie');
        movieEl.innerHTML=
        <div>
            <img 
            src="IMGPATH+poster_path" 
            alt=""/>
            
            <div class="movie-info">
                <h3>${}</h3>
                <span>${}</span>

            </div>
        </div>
        ;
    });
    
    
    return respData;
}

getMovies();