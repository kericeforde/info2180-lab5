//Instantiating variables.
let lookup = document.getElementById("lookup");
let cities=document.getElementById("cities");
let result = document.getElementById("result");
let httprequest= new XMLHttpRequest();
let click="click";

//Add event listener to the lookup button
lookup.addEventListener('click',function(event){
    event.preventDefault();
    const input= document.getElementById("country").value;
    

    httprequest.onreadystatechange= function e(){
            if (httprequest.readyState===XMLHttpRequest.DONE && httprequest.status===200){
                result.innerHTML=httprequest.responseText;
            }
    }
    httprequest.open("GET",`world.php? country=${input}`,true);
    httprequest.send();

    
})


//Add event listener to the lookup cities button
cities.addEventListener('click',function(event){
    event.preventDefault();
    const input= document.getElementById("country").value;
    

    httprequest.onreadystatechange= function e(){
            if (httprequest.readyState===XMLHttpRequest.DONE && httprequest.status===200){
                result.innerHTML=httprequest.responseText;
            }
    }
    httprequest.open("GET",`world.php? country=${input} & lookup=${click}`,true);
    httprequest.send();

    
})




