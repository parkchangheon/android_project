const newYears='1 Jan 2022';

const daysElement=document.getElementById('days'); //html id로 값을 가져옴
const hoursElement=document.getElementById('hours');
const minsElement=document.getElementById('mins');
const secondsElement=document.getElementById('seconds');

function countdown(){
    const newYearsDate = new Date(newYears);
    const currentDate = new Date();

    const t_seconds = (newYearsDate-currentDate)/1000;  // 초 

    const days=Math.floor(t_seconds / 3600 / 24); //버림 

    const hours= Math.floor(t_seconds / 3600)%24;
    const minutes= Math.floor(t_seconds / 60)%60;
    const seconds=Math.floor(t_seconds%60);
    console.log(days,hours,minutes,seconds);

    daysElement.innerHTML=days;
    hoursElement.innerHTML=hours;
    minsElement.innerHTML=minutes;
    secondsElement.innerHTML=seconds;
}

//initial call

countdown();

setInterval(countdown,1000);  //함수를 주기적으로 실행


