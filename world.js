
document.addEventListener('DOMContentLoaded', function () {
    
var search_b = document.getElementById("lookup");
var result=document.getElementById("result");
    
    search_b.addEventListener("click", function() {



        var c = document.getElementById("country").value;

        var r = new XMLHttpRequest();

        var url = "world.php?country=" + c;

        r.onreadystatechange = function() {

            if (r.readyState === XMLHttpRequest.DONE) 
            {

                if (r.status === 200)
                     {

                    var response = r.responseText;
                    result.innerHTML = response;} 
            }};


        r.open('GET', url);
        r.send();});

});