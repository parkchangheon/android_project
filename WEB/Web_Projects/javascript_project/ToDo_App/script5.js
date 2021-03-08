const form = document.getElementById('form');
const input= document.getElementById('input');
const todosUL = document.getElementById("todos");

const todos= JSON.parse(localStorage.getItem('todos'));

if(todos){
    todos.forEach(todo=>{
        addTodo(todo)
    })
}

form.addEventListener('submit',(e)=>{
    e.preventDefault();  //전송하는 것을 중단시키는 작업

    addTodo();
});






function addTodo(todo){

    let todoText=input.value;

    if (todo){
        todoText=todo.text;
    }

    if(todoText){
        const todoEl = document.createElement('li');

        if(todo&&todo.completed){
            todoEl.classList.add('completed')
        }

        todoEl.innerText=todoText;

        //클릭시 -바 생기도록 설정 complete로 toggle 설정 (좌클릭시)
        todoEl.addEventListener('click',()=>{
            todoEl.classList.toggle('completed');
            updateLS();
        });

        //목록에서 삭제시키는 과정 (우클릭시)
        todoEl.addEventListener('contextmenu',(e)=>{
            e.preventDefault();
            todoEl.remove();
            updateLS();
        });


        todosUL.appendChild(todoEl); //todos에 todoEl 추가 
        

        input.value=""; // 입력란 초기화 시키는 과정

        updateLS();
    }
}



function updateLS(){
    const todosEl=document.querySelectorAll('li');

    const todos=[];

    todosEl.forEach(todoEl =>{
        todos.push({
            text:todoEl.innerText,
            completed:todoEl.classList.contains('completed')
        })
    });

    localStorage.setItem('todos',JSON.stringify(todos));
}