
const notesEl =document.querySelector('.notes');
const editBtn=document.querySelector(".edit");
const deleteBtn=document.querySelector(".delete");

const main = notesEl.querySelector('.main');
const textArea =notesEl.querySelector('textarea');
const addBtn=document.getElementById(".add");


editBtn.addEventListener("click",()=>{
    main.classList.toggle("hidden");  // 토글은 2가지 상태만 존재 (스위치 같음)
    textArea.classList.toggle("hidden"); // toggle은 하나의 설정값에서 다른 값으로 변결하는것


});

deleteBtn.addEventListener("delete",()=>{

});


textArea.addEventListener("input",(e)=>{
    const {value} = e.target;

    main.innerHTML=marked(value);
});


addBtn.addEventListener('click',()=>{
    addNewNote();

});



