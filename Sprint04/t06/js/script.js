document.addEventListener("DOMContentLoaded", function() {
    let image_list = document.querySelectorAll("img.lazy");    
    let count = 0;
    let loadTimeout;

        
    document.addEventListener("scroll", lazyload);
    window.addEventListener("resize", lazyload);
    window.addEventListener("orientationChange", lazyload);

    function lazyload () {
        if(loadTimeout) {
            clearTimeout(loadTimeout);
        }    
    
        loadTimeout = setTimeout(function() {
            var scroll_top = window.pageYOffset;
            image_list.forEach(function(img) {
                if(img.offsetTop < (window.innerHeight + scroll_top) && (img.offsetTop + img.height) > scroll_top) {
                    img.src = img.dataset.src;
                    if(img.getAttribute("class") == "lazy") {
                        count++;
                        let info = document.querySelector(".text");
                        info.innerHTML = count + " images loaded from 20"
                        img.classList.remove("lazy");
                        if(count == 20) {
                            info.style.background = "green";
                            setTimeout(() => {
                                info.style.display = "none";
                            }, 3000)
                        }
                    }
                }
            });

            if(image_list.length == 0) { 
                document.removeEventListener("scroll", lazyload);
                window.removeEventListener("resize", lazyload);
                window.removeEventListener("orientationChange", lazyload);
            }
        }, 500);
    }
});