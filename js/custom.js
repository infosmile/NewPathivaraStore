
var slideIndex1 = 0;
var slideIndex2 = 0;
    
document.addEventListener('DOMContentLoaded', function () {
    var playButton = document.getElementById('playButtonLink');
    var videoContainer = document.getElementById('introVideo');
    var slideshow = document.getElementById('carousel-item');
    var video = document.getElementById('introVideovideo');
    var mainLogoImg = document.getElementById('MainLogoImg');


  showmattressSlides();
  showcurtainsSlides();

    

 

    fetchDataAndDisplayAlert();
    fetchDataAndDisplayMattressProducts();
    fetchDataAndDisplayCurtainsProducts();
    fetchDataAndDisplayOtherProducts();
    fetchDataAndDisplayFeaturedProducts();

    if (playButton) {
        playButton.addEventListener('click', function (event) {
            event.preventDefault();
            
            // Hide slideshow
            document.querySelector('.carousel-item.active').classList.remove('active');

            // Show video
            videoContainer.style.display = 'inline';

            video.play();
        });
    }

});


 function fetchDataAndDisplayAlert() {

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        putdataonpage(xhr.responseText);
                    } 
                    else {
                        console.error('Request failed: ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', './php/getPageContent.php', true);

            xhr.send();
        }


         function putdataonpage(datastring)
         {

            var jsonData = JSON.parse(datastring);
             //logo Image
             document.getElementById("MainLogoImg").src=getValueByName("mainlogo", jsonData);

             //intro video
             document.getElementById("introVideovideo").src=getValueByName("introvideo", jsonData);

             document.getElementById("introvideoheader").innerHTML=getValueByName("introvideoheader", jsonData);
             document.getElementById("introvideomessage").innerHTML=getValueByName("introvideomessage", jsonData);

             //aboutus content
             document.getElementById("aboutuscontent").innerHTML=getValueByName("aboutus", jsonData);
             document.getElementById("aboutusimage").src=getValueByName("aboutusimage", jsonData);
  
             //testimonial-1-image
            document.getElementById("testimonial-1-image").src=getValueByName("testimonial-1-image", jsonData);

            //testimonial-1-name
            document.getElementById("testimonial-1-name").innerHTML=getValueByName("testimonial-1-name", jsonData);

            //testimonial-1-job
            document.getElementById("testimonial-1-job").innerHTML=getValueByName("testimonial-1-job", jsonData);

            //testimonial-1-comment
            document.getElementById("testimonial-1-comment").innerHTML=getValueByName("testimonial-1-comment", jsonData);

            //testimonial-2-image
            document.getElementById("testimonial-2-image").src=getValueByName("testimonial-2-image", jsonData);

            //testimonial-2-name
            document.getElementById("testimonial-2-name").innerHTML=getValueByName("testimonial-2-name", jsonData);

            //testimonial-2-job
            document.getElementById("testimonial-2-job").innerHTML=getValueByName("testimonial-2-job", jsonData);

            //testimonial-2-comment
            document.getElementById("testimonial-2-comment").innerHTML=getValueByName("testimonial-2-comment", jsonData);

           


            //trendingImages
            document.getElementById("product-1-image").src=getValueByName("trendingImage1\r\n", jsonData);
            document.getElementById("product-2-image").src=getValueByName("trendingImage2", jsonData);
            document.getElementById("product-3-image").src=getValueByName("trendingImage3", jsonData);


            //aboutshop
            document.getElementById("aboutshopaddress").innerHTML=getValueByName("aboutshopaddress", jsonData);
             document.getElementById("aboutshopphone").innerHTML=getValueByName("aboutshopphone", jsonData);
              document.getElementById("aboutshopemail").innerHTML=getValueByName("aboutshopemail", jsonData);
               document.getElementById("footerInformationContent").innerHTML=getValueByName("footerInformationContent", jsonData);

               //googleMap
               //document.getElementById("googleMap").src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=" + getValueByName("aboutshopaddress", jsonData);
         document.getElementById("googleMap").src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=27%C2%B043%2715.0%22N%2085%C2%B021%2756.7%22E";
              }





         function getValueByName(nameToFind, jsonData) {

  for (var i = 0; i < jsonData.length; i++) {
    if (jsonData[i].name === nameToFind) {
      return jsonData[i].content; 
    }
  }
  return null; 
}



function maketrendingList(jsonData)
{
    var jsonArray = JSON.parse(jsonData);
    var htmlString = "";
   
    jsonArray.forEach(function(item) {

        htmlString += '<div class="t-link-box collapsed">' +
                  '  <div class="number">' +
                  '    <h5>' +
                  item.code +
                  '    </h5>' +
                  '  </div>' +
                  '  <hr>' +
                  '  <div class="t-name">' +
                  '    <h5>' +
                  item.name+
                  '    </h5>' +
                  '  </div>' +
                  '</div>';
                });

                return htmlString;

}


function fetchDataAndDisplayMattressProducts() {

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        putMattressdataonProductPage(xhr.responseText);
                    } 
                    else {
                        console.error('Request failed: ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', './php/getMattressProducts.php', true);

            xhr.send();
        }




     function putMattressdataonProductPage(datastring)
         {
var htmlString = '<div class="brand_container layout_padding2">';
            var jsonArray = JSON.parse(datastring);
           
            for (var i = 0; i <jsonArray.length; i++) {
             var item = jsonArray[i];
             
            htmlString += '<div class="box">' +
  '<a href="">' +
    '<div class="new">' +
      '<h5>' +
        'Mattress' +
      '</h5>' +
    '</div>' +
    '<div class="img-box">' +
      '<img src="images/' + item.ProductImage +'" alt="Mattress In Kathmandu" >' +
    '</div>' +
    '<div class="detail-box">' +
      '<h6 class="price">' +
        'Rs. ' + item.ProductPrice+
      '</h6>' +
      '<h6>' +
        item.ProductName+
      '</h6>' +
    '</div>' +
  '</a>' +
'</div>';
}

document.getElementById("mattressProducts").innerHTML = htmlString +'</div>';
         }   





         function fetchDataAndDisplayCurtainsProducts() {

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        putCurtainsdataonProductPage(xhr.responseText);
                    } 
                    else {
                        console.error('Request failed: ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', './php/getCurtainsProducts.php', true);

            xhr.send();
        }




     function putCurtainsdataonProductPage(datastring2)
         {
var htmlString2 = '<div class="brand_container layout_padding2">';
            var jsonArray = JSON.parse(datastring2);
           
            for (var i = 0; i <jsonArray.length; i++) {
             var item = jsonArray[i];
             
            htmlString2 += '<div class="box">' +
  '<a href="">' +
    '<div class="new">' +
      '<h5>' +
        'Curtains' +
      '</h5>' +
    '</div>' +
    '<div class="img-box">' +
      '<img src="images/' + item.ProductImage +'" alt="Curtains In Kathmandu">' +
    '</div>' +
    '<div class="detail-box">' +
      '<h6 class="price">' +
        'Rs. ' + item.ProductPrice+
      '</h6>' +
      '<h6>' +
        item.ProductName+
      '</h6>' +
    '</div>' +
  '</a>' +
'</div>';
}

document.getElementById("curtainProducts").innerHTML = htmlString2+'</div>';
         }



               function fetchDataAndDisplayOtherProducts() {

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        putOtherdataonProductPage(xhr.responseText);
                    } 
                    else {
                        console.error('Request failed: ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', './php/getOtherProducts.php', true);

            xhr.send();
        }




     function putOtherdataonProductPage(datastring2)
         {
var htmlString2 = '<div class="brand_container layout_padding2">';
            var jsonArray = JSON.parse(datastring2);
           
            for (var i = 0; i <jsonArray.length; i++) {
             var item = jsonArray[i];
             
            htmlString2 += '<div class="box">' +
  '<a href="">' +
    '<div class="new">' +
      '<h5>' +
        'Others' +
      '</h5>' +
    '</div>' +
    '<div class="img-box">' +
      '<img src="images/' + item.ProductImage +'" alt="" >' +
    '</div>' +
    '<div class="detail-box">' +
      '<h6 class="price">' +
        'Rs. ' + item.ProductPrice+
      '</h6>' +
      '<h6>' +
        item.ProductName+
      '</h6>' +
    '</div>' +
  '</a>' +
'</div>';
}

document.getElementById("otherProducts").innerHTML = htmlString2 +'</div>';
         }



function fetchDataAndDisplayFeaturedProducts() {

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        putFeatureddataonProductPage(xhr.responseText);
                    } 
                    else {
                        console.error('Request failed: ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', './php/getFeaturedProducts.php', true);

            xhr.send();
        }




     function putFeatureddataonProductPage(datastring2)
         {
var htmlString2 = '<div class="brand_container layout_padding2">';
            var jsonArray = JSON.parse(datastring2);
           
            for (var i = 0; i <jsonArray.length; i++) {
             var item = jsonArray[i];
             
            htmlString2 += '<div class="box">' +
    '<a href="ProductBuy.php?pid='+ item.ProductId+'">' +
        '<div class="img-box">' +
            '<img id="feature-1-image" src="images/'+ item.ProductImage +'" alt="">' +
        '</div>' +
        '<div class="detail-box">' +
            '<h6 class="price">' +
                '<p id="feature-1-price">Rs.' + item.ProductPrice +'</p>' +
            '</h6>' +
            '<h6>' +
                '<p id="feature-1-Name">' + item.ProductName +'</p>' +
            '</h6>' +
        '</div>' +
    '</a>' +
'</div>';
}

document.getElementById("featuredItems").innerHTML = htmlString2+'</div>';
         }





  function showmattressSlides() {
    var i;
    var slides = document.getElementsByClassName("mymattressSlides");

    // Hide all slides
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    // Move to the next slide
    slideIndex1++;
    if (slideIndex1 > slides.length) {
      slideIndex1 = 1;
    }

    // Show the current slide
    slides[slideIndex1 - 1].style.display = "block";

    // Change slide every 3 seconds
    setTimeout(showmattressSlides, 3000);
  }
  function plusmattressSlides(n) {
    // Stop automatic sliding when navigating manually
    clearTimeout(timer);
    showmattressSlides(slideIndex1 += n);
  }


  function showcurtainsSlides() {
    var j;
    var slides = document.getElementsByClassName("mycurtainsSlides");

    // Hide all slides
    for (j = 0; j < slides.length; j++) {
      slides[j].style.display = "none";
    }

    // Move to the next slide
    slideIndex2++;
    if (slideIndex2 > slides.length) {
      slideIndex2 = 1;
    }

    // Show the current slide
    slides[slideIndex2 - 1].style.display = "block";

    // Change slide every 3 seconds
    setTimeout(showcurtainsSlides, 3000);
  }
  function pluscurtainsSlides(n) {
    // Stop automatic sliding when navigating manually
    clearTimeout(timer);
    showcurtainsSlides(slideIndex2 += n);
  }

  

