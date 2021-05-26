function checkPass(){
  //Store the password field objects into variables ...
  var pass1 = document.getElementById('pass1');
  var pass2 = document.getElementById('pass2');
  //Store the Confimation Message Object ...
  //var message = document.getElementById('confirmMessage');
  //Set the colors we will be using ...
  var goodColor = "#66cc66";
  var badColor = "#ff6666";
  //Compare the values in the password field 
  //and the confirmation field
  if(pass1.value == pass2.value){
    //The passwords match. 
    //Set the color to the good color and inform
    //the user that they have entered the correct password 
    pass1.style.backgroundColor = goodColor;
    pass2.style.backgroundColor = goodColor;
    //message.style.color = goodColor;
    //message.innerHTML = "Passwords Match!"
  }else{
    //The passwords do not match.
    //Set the color to the bad color and
    //notify the user.
    pass1.style.backgroundColor = badColor;
    pass2.style.backgroundColor = badColor;
    //message.style.color = badColor;
    //message.innerHTML = "Passwords Do Not Match!"
  }
}

const email = document.getElementById("email");
const password = document.getElementById("password");

email.addEventListener('input',()=>{
  const emailBox = document.querySelector('.emailBox');
  const emailText = document.querySelector('.emailText');
  const emailPattern = /[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$/;

  if(email.value.match(emailPattern)){
    emailBox.classList.add('valid');
    emailBox.classList.remove('invalid');
    emailText.innerHTML = " "; 
  }else{
    emailBox.classList.add('invalid');
    emailBox.classList.remove('valid');
    emailText.innerHTML = "<span>* Must be a valid email address."; 
  }
});

password.addEventListener('input',()=>{
  const passBox = document.querySelector('.passBox');
  const passText = document.querySelector('.passText');
  const passPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;

  if(password.value.match(passPattern)){
    passBox.classList.add('valid');
    passBox.classList.remove('invalid');
    passText.innerHTML = " "; 
  }else{
    passBox.classList.add('invalid');
    passBox.classList.remove('valid');
    passText.innerHTML = "<span>* Your password must be at least 6 characters as well as contain at least one uppercase, one lowercase, and one number."; 
  }
});
