function productvalidateform()
{
    let pname = document.getElementById('pname');
    let price = document.getElementById('price');
    let stock = document.getElementById('stock');

    if(checkproductname(pname))
    {
        if(checkprice(price))
        {
            if(checkstock(stock))
            {
                return true;              
            }
        }
    }
    return false;
}
function checkproductname(element)
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

function checkprice(element) {
    const validateNum = element.value.match(/[0-9]/);
    if (validateNum) {
        return true;
    } else {
        alert("price contains only digits");
        element.focus();
        return false;
    }
}                  

function checkstock(element) {
    const validateNum = element.value.match(/[0-9]/);
    if (validateNum) {
        return true;
    } else {
        alert("Stock contains only number");
        element.focus();
        return false;
    }
}