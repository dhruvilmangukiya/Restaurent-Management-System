function booktableform()
{
    let name = document.getElementById('name');
    let mobile = document.getElementById('mobile');
    let person = document.getElementById('person');
    let table = document.getElementById('table'); 

    if(checkname(name))
    {
        if(checkmobile(mobile))
        {
            if(checkpersontable(person))
            {
                if(checkpersontable(table))
                {
                    if(checkdatetime(datetime))
                    {   
                        return true; 
                    }        
                }
            }
        }
    }
    return false;
}
function checkname(element)
{
    const validate=element.value.match(/^[a-z A-Z]+$/);
    if(validate)
    {
        return true;
    }
    else{
        alert("You Must Conyains Only Letters....!");
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

function checkpersontable(element) {
    const validateNum = element.value.match(/[0-9]/);
    if (validateNum) {
        return true;
    } else {
        alert("Only Digits Allow");
        element.focus();
        return false;
    }
}    