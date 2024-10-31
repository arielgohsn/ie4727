document.addEventListener('DOMContentLoaded', function() {
    var formName = document.getElementById('name');
    var formEmail = document.getElementById('email');
    var formStartdate = document.getElementById('startdate');
    var formExp = document.getElementById('experience');

    formName.addEventListener('change', checkName, false);
    formEmail.addEventListener('change', checkEmail, false);
    formStartdate.addEventListener('change', checkDate, false);
    formExp.addEventListener('change',checkExp,false);
});

function checkName(event){
    const nameValidation = /^[a-zA-Z\s]+$/;
    var inputName = event.currentTarget;
    var validName = nameValidation.test(inputName.value);

    if (!validName){
        alert("Incorrect name format, try again. No numbers or symbols allowed.")
        document.getElementById("errorM").innerHTML = "Does your name really have numbers or symbols in it? Try again!";
        inputName.focus();
        inputName.select();
        return false;
    }
    else
    {
        document.getElementById("errorM").innerHTML ="";
    }
}
function checkEmail(event){
    const emailValidation = /^[\w.-]+@([\w]+\.){1,3}[\w]{2,3}$/;
    var inputEmail = event.currentTarget;
    var validEmail = emailValidation.test(inputEmail.value);

    if (!validEmail){
        alert("Email should have username@domain.xxx format. Try again.")
        document.getElementById("errorM").innerHTML = "Follow the username@domain.xxx format!"
        inputEmail.focus();
        inputEmail.select();
        return false;
    }
    else
    {
        document.getElementById("errorM").innerHTML ="";
    }
}

function checkDate(event){
    var today = new Date().valueOf();
    var inputDate = event.currentTarget;
    var tocheckDate = new Date(inputDate.value).valueOf()

    if (tocheckDate <= today){
        alert("Date chosen must be later than today. Try again.")
        document.getElementById("errorM").innerHTML = "Did you regret not joining us earlier? Try with a later date!"
        inputDate.focus();
        return false;
    }
    else
    {
        document.getElementById("errorM").innerHTML ="";
    }
}

function checkExp(event){
    var inputExp = event.currentTarget;

    if (!inputExp.value.trim()){
        alert("Experience box cannot be empty. Write something!")
        document.getElementById("errorM").innerHTML = "You probably have some experience, so don't leave it empty!"
        inputExp.focus()
        inputExp.select()
        return false;
    }
    else
    {
        document.getElementById("errorM").innerHTML ="";
    }
}