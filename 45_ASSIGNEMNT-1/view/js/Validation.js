function validateForm() {


    var email = document.forms["RegisterForm"]["email"].value;
    var password = document.forms["RegisterForm"]["password"].value;
    var phone = document.forms["RegisterForm"]["phone"].value;
    var whatsappNumber = document.forms["RegisterForm"]["whatsapp_number"].value;
    var confirmPassword = document.forms["RegisterForm"]["confirm_password"].value;
    var errorEmail = document.getElementById("error-email");
    var errorPassword = document.getElementById("error-password");
    var errorPhone = document.getElementById("error-phone");
    var error_whatsapp_number = document.getElementById("error-whatsapp_number");
    var error_confirm_password = document.getElementById("error-confirm_password");
    var isValid = true;
    if (!validateEmail(email)) {
        errorEmail.innerHTML = "Invalid Email";
        isValid = false;
    } 
    else
    {
        errorEmail.innerHTML = "";
    }

    if (!validatePassword(password)) {
        errorPassword.innerHTML = "Invalid Password";
        isValid = false;
    } 
    else
    {
        errorPassword.innerHTML = "";
    }
    
    if (!validatePhone(phone)) {
        errorPhone.innerHTML = "Invalid Phone Number";
        isValid = false;
    } 
    else
    {
        errorPhone.innerHTML = "";
    }

    if (!validatePhone(whatsappNumber)) {
        error_whatsapp_number.innerHTML = "Invalid Phone Number Format";
        isValid = false;
    } 
    else
    {
        error_whatsapp_number.innerHTML = "";
    }

    if (!validateConfirmPassword(password,confirmPassword)) {
        error_confirm_password.innerHTML = "Confirm password does not match the password";
        isValid = false;
    }
    else
    {
        error_confirm_password.innerHTML = "";
    }
    
    // if (isValid) {
    //     document.getElementById("RegisterForm").submit();
    // }
    return isValid
}

function validateEmail(email) {
    var re1 = /^[a-zA-Z0-9_.±]+@[a-zA-Z0-9-.]+(\.)[a-zA-Z0-9]+$/;
    return re1.test(String(email).toLowerCase());
}
function validatePassword(password) {
    var re = /^(?=.*\d)(?=.*[\W_]).{8,}$/;
    return re.test(String(password).toLowerCase());
}
function validatePhone(phone) {
    var re = /^01\d{9}$/;
    return re.test(String(phone).toLowerCase());
}
function validateConfirmPassword(password,confirmPassword) {
    if(password === confirmPassword)
        return true;
    else
        return false;
}
 
 function register() {
     if (!validateForm())return;
    
        var form = document.getElementById("RegisterForm");
        var formData = new FormData(form); 
      
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../../logic/DB_Ops.php", true); 
      
        xhr.onload = function () {
            console.log(xhr)
          if (xhr.status === 200) {
            try {
              var response = JSON.parse(xhr.responseText); 
              console.log("Response:", response);
              alert("Message: " + response['message']);
            } catch (e) {
              console.error("Invalid JSON:", xhr.responseText);
            }
          } else {
            console.error("Server returned error:", xhr.status);
          }
        };
      
        xhr.onerror = function () {
          console.error("Network request failed");
        };
      
        xhr.send(formData); 
    
  }
  

  function whatsappNumber() {
    const whatsappNumber = document.getElementById("whatsapp_number").value;
    if (validatePhone(whatsappNumber)){
    console.log(whatsappNumber);
    const formData = new FormData();
    formData.append("whatsapp_number", whatsappNumber); 
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../../logic/API_Ops.php", true);
  
    xhr.onload = function () {
      if (xhr.status === 200) {
        
          const response = JSON.parse(xhr.responseText);
          alert("Message: " + response.message);
      } else {
        console.error("Error status:", xhr.status);
      }
    };
  
    xhr.onerror = function () {
      console.error("Network error occurred.");
    };
  
    xhr.send(formData);
    }else{}
}
  