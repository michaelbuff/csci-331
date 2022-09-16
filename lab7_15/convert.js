window.addEventListener("DOMContentLoaded", domLoaded);

function domLoaded() {
   // TODO: Complete the function
   cInput = document.getElementById('cInput');
   fInput = document.getElementById('fInput');
   errorP = document.getElementById("errorMessage");
   convertButton = document.getElementById('convertButton');
   weatherImage =  document.getElementById("weatherImage");

   cInput.addEventListener('input', function(){
      fInput.value = '';
   });
   fInput.addEventListener('input', function(){
      cInput.value = '';
   });
   convertButton.addEventListener("click", function(){
      if (cInput.value != ''){
         if(validTemp(cInput.value)){
            fTemp = convertCtoF(cInput.value);
            fInput.value = fTemp;
            updateImage(fTemp, weatherImage);
         }
      }
      else if(fInput.value != ''){
         if(validTemp(fInput.value)){
            cTemp = convertFtoC(fInput.value);
            cInput.value = cTemp;
            updateImage(fInput.value, weatherImage);
         }
      }
      else{
         errorP.textContent  = "";  
      }

   })
}

function updateImage(temp, node){
   if(temp < 32){
      node.setAttribute('src', "cold.png");
   }
   else if(temp > 50){
      node.setAttribute('src', "warm.png");
   }
   else{
      node.setAttribute('src', "cool.png");

   }
}


function invalidTemp(temp){
   errorP.textContent  = temp + " is not a number";
}


function validTemp(tempInput){ //returns bool
   if (isNaN(parseFloat(tempInput))){
      errorP.textContent  = tempInput + " is not a number";
      return false;      
   }
   else{
      errorP.textContent  = "";
      return true;    
   }
}

function convertCtoF(degreesCelsius) {
   // TODO: Complete the function
   return degreesCelsius*(9/5) + 32;
}

function convertFtoC(degreesFahrenheit) {
   // TODO: Complete the function
   return (degreesFahrenheit-32)*(5/9);
}
