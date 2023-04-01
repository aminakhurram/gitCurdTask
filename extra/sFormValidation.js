function clearErrors(){

    errors = document.getElementsByClassName('formerror');
    for(let item of errors)
    {
        item.innerHTML = "";
    }


}
function seterror(id, error){
    //sets error inside tag of id 
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm(){
    var returnval = true;
    clearErrors();

    //perform validation and if validation fails, set the value of returnval to false
    var username = document.forms['myForm']["username"].value;
    if (username.length<5){
        seterror("username", "*Length of name is too short");
        returnval = false;
    }

    if (username.length == 0){
        seterror("username", "*Length of name cannot be zero!");
        returnval = false;
    }

    var email = document.forms['myForm']["email"].value;
    if (email.length>15){
        seterror("email", "*Email length is too long");
        returnval = false;
    }

    var Password = document.forms['myForm']["Password"].value;
    if (Password.length < 6){

        // Quiz: create a logic to allow only those passwords which contain atleast one letter, one number and one special character and one uppercase letter
        seterror("pass", "*Password should be atleast 6 characters long!");
        returnval = false;
    }

    var cpassword = document.forms['myForm']["cpassword"].value;
    if (cpassword != cpassword){
        seterror("cpass", "*Password and Confirm password should match!");
        returnval = false;
    }

    return returnval;
}

