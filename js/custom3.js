document.addEventListener('DOMContentLoaded', function () {


    fetchBlogs();

});






        

function fetchBlogs() {

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        putBlogsonpage(xhr.responseText);
                    } 
                    else {
                        console.error('Request failed: ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', './php/getblogs.php', true);

            xhr.send();
        }




     function putBlogsonpage(datastring)
         {
var htmlString = '';

            var jsonArray = JSON.parse(datastring);
  
            
            for (var i = 0; i <jsonArray.length; i++) {
             var item = jsonArray[i];

             
            htmlString += '<article>'+
    '<h2>'+
        '<img src="'+ item.blogauthorimage+'" alt="Author" width="30" height="30">'+
        item.blogtitle +
    '</h2>'+
   ' <div class="meta-info">'+
       '<div class="author-info">'+
           ' <span>By '+ item.blogauthor+'</span>'+
        '</div>'+
        '<span>Date: '+ item.blogdate+'</span>'+
    '</div>'+
    '<p>'+ item.blogoneliner+ '</p>'+
    '<a href="singleblog.php?id='+ item.id +'">Read more</a>'
+'</article>';
}



document.getElementById("blogs").innerHTML = htmlString;
         }

   function getValueByName(nameToFind, jsonData) {

  for (var i = 0; i < jsonData.length; i++) {
    if (jsonData[i].name === nameToFind) {
      return jsonData[i].content; 
    }
  }
  return null; 
}       
