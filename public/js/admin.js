var sidemenuOpen = false;



function openNav() {
    var mainWidth = $("#main").width();
    
    
    if( mainWidth < 600) {
        $('#mySidenav').css("width", "100%");
        $('.sidenav a').css("text-align", "center");
        $('body').css("overflow", "hidden");
    } else {
        $('#mySidenav').css("width", "250px");
        $('#main').css("margin-left", "250px");
        $('body').css("background-color", "rgba(0,0,0,0.4)");
  
    }
    
}

function closeNav() {
    
    $('#mySidenav').css("width", "0");
    $('#main').css("margin-left", "0");
    $('body').css("background-color", "#f8f8f8");
    $('body').css("overflow", "auto");
}


$(document).ready(function() {

    tinymce.init({
        selector: '.editor',
        invalid_elements : "script"
    });

    // Pour le menu : lorsqu'il est ouvert et que le visiteur redimentionne la page à < 600px
    $(window).resize(function() {
        var mainWidth = $("#main").width();
        var sidebarWidth = $('#mySidenav').width();

        if(mainWidth < 600 && sidebarWidth == 250) {
            $('#mySidenav').css("width", "100%");
            $('body').css("overflow", "hidden");
            $('.sidenav a').css("text-align", "center");
        } 
        if(mainWidth > 600 && sidebarWidth > 250){
            $('#mySidenav').css("width", "250px");
        }
        
    });

    $(".menu-level1").click(function() {
        $('.menu-level2').not().css("maxHeight", "0");
        var childHeightSum = 0;

        $('.menu-level2', this).children('li').each(function() {
            childHeightSum += $(this).height();
        });

        if ($(".menu-level2", this).css("maxHeight") === childHeightSum + "px") {
            $(".menu-level2", this).css("maxHeight", "0");
        } else {
            $(".menu-level2", this).css("maxHeight", childHeightSum + "px");
        }
    });
    
 
    
    
    
    
    //***************PAGINATION****************//
    //*****************************************//
    
    var nbLignes = $('table').find('tbody tr:has(td)').length;
    var elmtPerPage = 4;
    var totalPages = Math.ceil(nbLignes / elmtPerPage);
    var $pages = $('<div id="pagination"></div>');
    
    for (i = 0; i < totalPages; i++) {
        $('<span class="pageNumber">' + (i + 1) + '</span>').appendTo($pages);
    }
     
    $pages.appendTo('table');
    $( ".pageNumber:first-child" ).addClass('focus');
    
    $('.pageNumber').click(function() {
            $(".pageNumber").removeClass("focus")
            $(this).addClass('focus'); 
        }
    );
    
    $('table').find('tbody tr:has(td)').hide();
    var tr = $('table tbody tr:has(td)');
    
    for (var i = 0; i <= elmtPerPage - 1; i++) {
        $(tr[i]).show();
    }
    
    $('table span').click(function(event) {
        $('table').find('tbody tr:has(td)').hide();
        var nBegin = ($(this).text() - 1) * elmtPerPage;
        var nEnd = $(this).text() * elmtPerPage - 1;

        for (var i = nBegin; i <= nEnd; i++){
            $(tr[i]).show();
        }
    });

    // Confirmation de la suppression

    $('.confirmation').click(function(e) {

        return confirm("L\'élement sélectionné sera supprimé définitivement !");
    });

});



function imageUpload(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-thumb img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("input[type=file]").change(function(){
    console.log("okok");
    imageUpload(this);
});