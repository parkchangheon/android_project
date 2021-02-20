// 문제 목록
const quizData =[
    {
        question:'How old is sean?',
        a : '10',
        b : '17',
        c : '26',
        d : '28',
        correct : 'c'

    },
    {
        question:'What is program language?',
        a : 'Python',
        b : 'Elephant',
        c : 'Frog',
        d : 'Water',
        correct : 'a'
    },
    {
        question:'Who is President?',
        a : 'Jordan',
        b : 'Henry',
        c : 'Ronaldo',
        d : 'Trump',
        correct : 'd'
    }

];


//html의 아이디로 접근을 한다.
const questionEl=document.getElementById("Question");   //문제 가져오기.
const answerEls = document.querySelectorAll('.answer'); //클래스 값이 answer인 모든 요소를 가져옴 버튼 클릭한거..

const a_text = document.getElementById('a_text');
const b_text = document.getElementById('b_text');
const c_text = document.getElementById('c_text');
const d_text = document.getElementById('d_text');
const sub_btn = document.getElementById('sub');


//readct java script


let currentQuestion=0; // 재선언 불가 변수 선언 but 재할당은 가능
let score=0;  //점수변수 
loadQuiz();   // 퀴즈 데이터 시작.

function loadQuiz(){

    deselectAnswer();  //버튼 선택 된것 초기화하기

    const currentQuizData = quizData[currentQuestion]; //퀴즈 데이터는 퀴즈 데이터의 currentQuestion 번째 퀴즈이다
    
    questionEl.innerText=currentQuizData.question; // html의 text를 js에서 변경할 수 있다. 즉 문제를 주기적으로 바꾸기 위함
    
    a_text.innerText = currentQuizData.a;
    b_text.innerText = currentQuizData.b;
    c_text.innerText = currentQuizData.c;
    d_text.innerText = currentQuizData.d;
}


function getSelected(){

    let answer=undefined;
    answerEls.forEach(answerEl =>{
        if(answerEl.checked){
            answer= answerEl.id;
            
        }
    });
    return answer;

}

function deselectAnswer() {        //radio 누른 것 초기화
    answerEls.forEach(answerEl =>{
        answerEl.checked =false;
    });
}


sub_btn.addEventListener('click',()=>{    //버튼이 클릭되었을때
//정답 확인
    const answer = getSelected();    // 선택된것

    if(answer){  //선택되었다면
        if(answer===quizData[currentQuestion].correct)
        {
            score++;
        }
        currentQuestion++;
        if(currentQuestion<quizData.length){
            loadQuiz();
        }

        else{
            alert("you are finish!"); // 종료 메시지
            alert("점수는 :" + score);
            //결과를 보여줘야함
        }
    }
    //선택 안되었다면   
    else{
        currentQuestion++;
        if(currentQuestion<quizData.length){
            loadQuiz();
        }
        
        else{
            alert("you are finish!"); // 종료 메시지
            alert("점수는 :" + score);
            //결과를 보여줘야함
        }
    }

});