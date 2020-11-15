var jQueryScript = document.createElement('script');  
jQueryScript.setAttribute('src','https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
document.head.appendChild(jQueryScript);

const popup = document.querySelector('.chat-popup');
const chatBtn = document.querySelector('.chat-btn');
const submitBtn = document.querySelector('.submit');
const chatArea = document.querySelector('.chat-area');
const inputElm = document.querySelector('input');
const emojiBtn = document.querySelector('#emoji-btn');
const picker = new EmojiButton();


// Emoji selection  
window.addEventListener('DOMContentLoaded', () => {

    picker.on('emoji', emoji => {
      document.querySelector('input').value += emoji;
    });
  
    emojiBtn.addEventListener('click', () => {
      picker.togglePicker(emojiBtn);
    });
  });        

//   chat button toggler 

chatBtn.addEventListener('click', ()=>{
    popup.classList.toggle('show');
})

// send msg
array = ["What is your City?","Pune","Mumbai","Enter your PIN Code number","Enter your mobile number","end"]; 
i=0
var userresponse=[]
submitBtn.addEventListener('click', ()=>{
    
    let userInput = inputElm.value;
    userresponse.push(userInput)
    console.log(userresponse);
    let temp = `<div class="out-msg">
    <span class="my-msg">${userInput}</span>
    </div>`;

    let temp1 = `<div class="income-msg">
    <img src="img/bot1.jpg" class="avatar">
    <span class="msg">${array[i]}</span> 
    </div>`;

    if(i==0){
      temp1 = `<div class="income-msg">
      <img src="img/bot1.jpg" class="avatar">
      <span class="msg">${array[i]}</span> 
      </div>
      <br>
      <div class="income-msg">
      <img src="img/bot1.jpg" class="avatar">
      <span class="msg">${array[i+1]}</span>
      </div>
        <br>
      <div class="income-msg">
      <img src="img/bot1.jpg" class="avatar">
      <span class="msg">${array[i+2]}</span> 
      </div>`;
      i=2
    }


    if(array[i]=="end"){
      document.getElementById("inptext").disabled = true;
      document.getElementById("mybtn").disabled = true;
      temp1 = `<div class="income-msg">
      <img src="img/bot1.jpg" class="avatar">
      <span class="msg">Our customer executive will contact you soon.</span>
      </div>
      <br>
      <div class="income-msg">
      <img src="img/bot1.jpg" class="avatar"> 
      <span class="msg">Thank you!</span>
      </div>`;
      var data ={userresponse:userresponse}
      console.log(data);
      $.ajax({
        type: "GET",
        url:"test.php",
        data:data,
        success: function(data){
          if(data=="inserted"){
            alert("chat inserted");
          }
          if(data=="Error"){
            alert("chat not inserted");
          }
        }
      });
      
    }
    chatArea.insertAdjacentHTML("beforeend", temp);
    chatArea.insertAdjacentHTML("beforeend", temp1);
    inputElm.value = '';
    i++;

})