const meals = document.getElementById('meals');


getRandomMeal();

async function getRandomMeal(){
    const resp= await
    fetch("https://www.themealdb.com/api/json/v1/1/random.php");

    const respData = await resp.json();
    const randomMeal = respData.meals[0];
}

async function getMealById(id){
    const meal=await fetch(
        "https://www.themealdb.com/api/json/v1/1/random.php"+id);
}

async function getMealBySearch(term){
    const meal= await fetch(
        "https://www.themealdb.com/api/json/v1/1/random.php"+term);
}


