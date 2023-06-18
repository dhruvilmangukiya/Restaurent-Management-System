function validateform()
{
    let username = document.getElementById('username');
    let email = document.getElementById('email');
    let mobile = document.getElementById('mobile');

    if(checkusername(username))
    {
        if(checkemail(email))
        {
            if(checkmobile(mobile))
            {
                return true;              
            }
        }
    }
    return false;
}
function checkusername(element)
{
    const validate=element.value.match(/^[a-z A-Z]+$/);
    if(validate)
    {
        return true;
    }
    else{
        alert("You must conyains only letters....!");
        element.focus();
        return false;
    }
}

function checkemail(element) {
    const validateEmail = element.value.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/)

    if (validateEmail) {
        return true;
    } else {
        alert("Please Enter Valid Email...!");
        element.focus();
        return false;
    }
}                    
function checkmobile(element) {
    const validateNum = element.value.match(/[1-9]{1}[0-9]{9}/);
    if (validateNum && element.value.length == 10) {
        return true;
    } else {
        alert("Please Enter Valid Mobile Number, It's must contain maximum 10 Numbers...!");
        element.focus();
        return false;
    }
}