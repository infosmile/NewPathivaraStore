document.addEventListener('DOMContentLoaded', function () {
    var playButton = document.getElementById('playButtonLink');
    var videoContainer = document.getElementById('introVideo');
    var slideshow = document.getElementById('carousel-item');
    var video = document.getElementById('introVideovideo');
    var mainLogoImg = document.getElementById('MainLogoImg');

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

            //aboutshop
            
            document.getElementById("aboutshopaddress").innerHTML=getValueByName("aboutshopaddress", jsonData);
             document.getElementById("aboutshopphone").innerHTML=getValueByName("aboutshopphone", jsonData);
              document.getElementById("aboutshopemail").innerHTML=getValueByName("aboutshopemail", jsonData);
               document.getElementById("footerInformationContent").innerHTML=getValueByName("footerInformationContent", jsonData);

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
  '<a href="ProductBuy.php?pid='+ item.ProductId+'">' +
    '<div class="new">' +
      '<h5>' +
        'Mattress' +
      '</h5>' +
    '</div>' +
    '<div class="img-box">' +
      '<img src="images/' + item.ProductImage +'" alt="Mattresses In Kathmandu" >' +
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
  '<a href="ProductBuy.php?pid='+ item.ProductId+'">' +
    '<div class="new">' +
      '<h5>' +
        'Curtains' +
      '</h5>' +
    '</div>' +
    '<div class="img-box">' +
      '<img src="images/' + item.ProductImage +'" alt="curtainsinkathmandu">' +
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
  '<a href="ProductBuy.php?pid='+ item.ProductId+'">' +
    '<div class="new">' +
      '<h5>' +
        'Others' +
      '</h5>' +
    '</div>' +
    '<div class="img-box">' +
      '<img src="images/' + item.ProductImage +'" alt="newpathivarafurnishingcenterkathmandu" >' +
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
    '<a href="shop.html">' +
        '<div class="img-box">' +
            '<img id="feature-1-image" src="images/'+ item.ProductImage +'" alt="newpathivarafurnishingcenterkathmandu">' +
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


         }
