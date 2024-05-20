/*	gallery */
$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            $('.filter').show('1000');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }

	        	if ($(".filter-button").removeClass("active")) {
			$(this).removeClass("active");
		    }
		    	$(this).addClass("active");
	    	});
});
/*	end gallery */

$(document).ready(function(){
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
   
const home = document.getElementById('home');
const about = document.getElementById('about');
const menu = document.getElementById( 'menu' );
const produk = document.getElementById( 'produk' );
const kontak = document.getElementById( 'kontak' );
home.innerHTML = 'Home';
about.innerHTML = 'Tentang kami';
menu.innerHTML = 'Produk UKM';
produk.innerHTML = 'Sahabat Kemasan';
kontak.innerHTML = 'Kontak';

  