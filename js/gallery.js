(function(){    
    HTMLElement.prototype.addClass = function(className) {
        if (this.classList) {
            this.classList.add(className);
        } else {
            this.className += ' ' + className;
        }
    }
    
    function isLoaded(element, className){
        return (' ' + element.className + ' ').replace(/[\n\t]/g, ' ').indexOf('loaded') > -1;
    }

    var gallery = document.querySelectorAll('.animated-gallery');
    for(var g = 0, leng = gallery.length; g < leng; g++){
        (function(num){
            var images = Array.prototype.slice.call(gallery[num].querySelectorAll('img'));

            var i = 0, len = images.length;
            function staggerImageReveal(){
                images[i].addClass('active');
                if(i < len - 1){
                    setTimeout(function(){
                        staggerImageReveal();
                        i++;
                    }, ((i % 3) * 30) + 30);
                }
            }
            
            // Fire when all images are loaded
            var imgWrap = Array.prototype.slice.call(gallery[num].querySelectorAll('.img-wrap'));
            var t = setInterval(function(){
                if(imgWrap.every(isLoaded)){
                    clearInterval(t);
                    setTimeout(function(){
                        staggerImageReveal();
                    }, (100 * num) + 100);
                }
            }, 50);
        })(g);
    }
})();