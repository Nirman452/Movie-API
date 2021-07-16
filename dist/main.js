let button = document.querySelector('#button');
let categoryy = document.querySelector('#category');

let getCookie= (name) => {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

button.addEventListener('click', () => {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            let jsonData = (JSON.parse(this.responseText));

            let text = "Results:";
            try{
                for (let i = 0; i < jsonData.data.length; i++) {
                    let counter = jsonData.data[i];
    
                    if(counter.category == categoryy.value){
                        console.log(counter);
                    
                        text += '<span class="span_row">'+'<a class='+counter.title.replace(/ +/g, "")+' href=#>'+ counter.title+'</a></span>';
                
                        document.getElementById("storedData").innerHTML = text;
                    }else if(categoryy.value == 'all_titles'){
    
                        console.log(counter.title);
                        text += '<span class="span_row">'+'<a class='+counter.title.replace(/ +/g, "")+' href=#>'+ counter.title+'</a></span>';
                        document.getElementById("storedData").innerHTML = text;
                    }       
                }   
                activateModal(jsonData);
            }catch(err){            
            }  
        }
    };
    xhttp.open("POST", "../api/post/read.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('data='+getCookie('token'));
})

let inputSearch = () =>{
    let searchbox = document.querySelector('#searchbox').value;
    //document.getElementById("testing").innerHTML = "You wrote: " + searchbox;

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let jsonData = (JSON.parse(this.responseText));
            
            let text = "Results:";

            try{
                for (let i = 0; i < jsonData.data.length; i++) {
                    let counter = jsonData.data[i];
                    console.log(counter.title);
                    text += '<span class="span_row">'+'<a class='+counter.title.replace(/ +/g, "")+' href=#>'+ counter.title+'</a></span>';
                    document.getElementById("storedData").innerHTML = text;

                }
            }catch(err){
                console.log('no matching values');
                document.getElementById("storedData").innerHTML = "No matching results";
            }
            try{
                activateModal(jsonData);
            }catch(err){

            }
        }
    };
    xhttp.open("POST", "../api/post/search.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if(searchbox.length == 0){
        console.log('No value is entered');
    }else{
        xhttp.send('data='+searchbox);
    }
}

let activateModal = (jsonData) =>{
    for (let i = 0; i < jsonData.data.length; i++) {
        let counter = jsonData.data[i];

            if(counter.category == categoryy.value || categoryy.value == 'all_titles'){
                let title = document.querySelector('.'+counter.title.replace(/ +/g, ""));

                var modal = document.getElementById("myModal");
                var span = document.getElementsByClassName("close")[0];

                title.addEventListener('click', () => {
                    modal.style.display = "block";
                    document.getElementById("h2").innerHTML = "Title: "+ counter.title;
                    document.getElementById("categoryName").innerHTML = "<b>Category:</b> "+ counter.category;
                    document.getElementById("year").innerHTML = "<b>Release Year:</b> "+ counter.year_created;
                    let img = document.getElementById("movieImg");
                    img.src = "../dist/"+counter.image;
                    img.style.width = '156px';
                    img.style.height = 'auto';
                    document.getElementById("refCode").innerHTML = "<b>Reference Code:</b> "+ counter.reference_code;
                })

                span.onclick = function() {
                    modal.style.display = "none";
                }
                
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
        } 
    }  
}