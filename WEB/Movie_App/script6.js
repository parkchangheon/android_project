const APIKEY = "04c35731a5ee918f014970082a0088b1";
const APIURL = 'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=04c35731a5ee918f014970082a0088b1&page=1'

const IMGPATH = 'https://image.tmdb.org/t/p/w1280';


async function getMovies(){

    const resp= await fetch(APIURL);
    const respData = await resp.json();
    
    let target = document.querySelector('main');

    console.log(respData);
    
    respData.results.forEach(movie =>{
        const {poster_path,title,vote_average}=movie;

        const block = document.createElement('div');
        const img = document.createElement('img');
        const sub=document.createElement('div');
        block.className="sub_div";
        
        img.src = IMGPATH+poster_path
        sub.className = "movie-info";
        sub.innerHTML=[
            "<h3>"+title+"</h3>",
            "<span>"+vote_average+"</span>"
        ].join("");

        block.appendChild(img);
        block.appendChild(sub);

        target.appendChild(block);

    });
    
    
    return respData;
}

getMovies();