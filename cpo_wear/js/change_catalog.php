

<script>
$(document).ready(function($)
{
    sessionStorage.getItem("page_now")==""? sessionStorage.setItem("page_now", 1): sessionStorage.getItem("page_now");
        var page_url = '<?php echo $app_url;?>';
        // console.log(page_url);
        $(document).on('click', 'main .container ul li .box', (e)=>
            {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
                $('aside').css({display:'none'});
                var search_text=document.querySelector('#search-text-category').value;
                sessionStorage.setItem("search_text", search_text);
                if (mediaQuery.matches) {
                var category_id=0;
                }
                else{
                var category_id=document.querySelector('#category_id').value;
                }
                sessionStorage.setItem("category_id", category_id);
                e.preventDefault(); 
                var ubranie_id = e.currentTarget.id;
                // console.log(ubranie_id);
                $.getJSON(page_url+'php/change_url.php', {ubranie_id: ubranie_id}, function(data_ubranie,  textStatus, xhr)
                {
                        $(document).attr("title", data_ubranie.title);
                        $('header').find('#header-logo').html("<a href='"+page_url+"'><i class='fas fa-home'></i></a>");
                         $(document).find('meta[name=description]').attr('content', data_ubranie.description);
                        $('main .container').load(data_ubranie.data);
                        $('main #pages').css({display: 'none'});
                        $('main #results-search').css({display: 'none'});
                        $('main .slide').css({display: 'none'});

                }); 
            });
        $('#search-text-category').keypress((event)=>{
            if (event.which == 13) {
                    console.log("enter");
                    $('#button-search').click();
            }       
        });
        $(document).on('click', '#button-search',(e)=>
		{
            const mediaQuery = window.matchMedia('(min-width: 1024px)');
            if (mediaQuery.matches) {
                var category_id=0;
                var search_category=$('#category_id:selected').value;
                $('main .slide').css({display: 'flex'});
                $("#results-search").html("Kategoria: "+search_category);
            }
            else{
                var category_id=document.querySelector('#category_id').value;
            }
			e.preventDefault();
            var search_text=document.querySelector('#search-text-category').value;
            sessionStorage.setItem("search_text", search_text);
            sessionStorage.setItem("category_id", category_id);
            if(search_text==""){
                $(document).attr("title", "CPO.wear");
                $("#results-search").html("");
            }
            else{
                console.log(search_category);
                $("#results-search").html("Wynik: "+ search_text.toUpperCase());
                

            }
            // console.log(category_id);
            // console.log(page_now);
            // console.log(search_text);
            if(category_id!=0||search_text!=""){
            $.getJSON(page_url+'php/change_search.php', {category_id: category_id,search_text: search_text.replaceAll(' ', '_')}, function(data_category,  textStatus, xhr)
                {
                        $(document).attr("title", data_category.title);
                        $('header').find('#header-logo').html("<a href='"+page_url+"'><i class='fas fa-home'></i></a>");

                        $('main .container').load(data_category.data);
                }); 
			window.history.pushState("", "", page_url);
			$('header').find('#header-logo').html("<a href='"+page_url+"'><i class='fas fa-home'></i></a>");
            }
            else{
                $('main .container').load('php/render_items.php?category_id=0&search_text='+search_text);
                $('header').find('#header-logo').html("<h1>CPO</h1>");   
            }
           

		});
        $(document).on('click', 'main .slide ul li', (e)=>
            {
                e.preventDefault();
                var category_id=e.currentTarget.value;
                sessionStorage.setItem("category_id", category_id);
                var search_text="";
                sessionStorage.setItem("search_text", search_text);
                
                console.log(category_id);
                $.getJSON(page_url+'php/change_search.php', {category_id: category_id,search_text: search_text.replaceAll(' ', '_') }, function(data_category,  textStatus, xhr)
                    {
                            if(category_id!=0||search_text!=""){$('header').find('#header-logo').html("<a href='"+page_url+"'><i class='fas fa-home'></i></a>");}
                            else{$('header').find('#header-logo').html("<h1>CPO</h1>");}
                            $('main .container').load(data_category.data);   
                            $('main #pages').load("");   

                    }); 

            });
        $(document).on('click', 'header #header-logo a', (e)=>
            {
                document.body.scrollTop = 0.5;
                $("#results-search").html("");
                document.documentElement.scrollTop =600;
                $('aside').css({display:'flex'});
                $('main #pages').css({display: 'flex'});
                $('main #results-search').css({display: 'flex'});
                const mediaQuery = window.matchMedia('(min-width: 1024px)');
                    if (mediaQuery.matches) {
                        $('main .slide').css({display: 'flex'});
                    }
                    else{
                       
                    }
                $(document).attr("title", "CPO");
                e.preventDefault();
                var category_id=sessionStorage.getItem("category_id");
                var search_text=sessionStorage.getItem("search_text");
                
                
                console.log(category_id);
                console.log(search_text);
                if(category_id!=0||search_text!="")
                {$('header').find('#header-logo').html("<a href='"+page_url+"'><i class='fas fa-home'></i></a>");
                    sessionStorage.removeItem("category_id");
                    sessionStorage.removeItem("search_text");
                    document.querySelector('#search-text-category').value="";
                    category_id=0;
                    search_text="";
                    $('header').find('#header-logo').html("<h1>CPO</h1>");
                }
                else{$('header').find('#header-logo').html("<h1>CPO</h1>");
                    
                }
                $.getJSON(page_url+'php/change_search.php', {category_id: category_id,search_text: search_text.replaceAll(' ', '_') }, function(data_category,  textStatus, xhr)
                    {
                            $(document).attr("title", data_category.title);
                            $('main .container').load(data_category.data);   

                    });
                   
                    document.querySelector("#category_id").value=0;
                    document.querySelector("#search-text-category").value="";
                    $("#results-search").html("");
            });
        $(document).on('click', 'main #pages .page', (e)=>
            {
                e.preventDefault();
                var page_now=e.currentTarget.id;
                sessionStorage.setItem("page_now", page_now);
                if(sessionStorage.getItem("page_now")=="prev"){
                    page_now=document.querySelector("main .container #pages .active").id-1;
                    if(page_now<=0){
                        page_now=document.querySelector("main .container #pages .page:nth-child(3)").id;
                    }
                }
                else if(sessionStorage.getItem("page_now")=="next"){
                    page_now=document.querySelector("main .container #pages .active").id;
                    page_now++;
                    if(document.querySelector("main .container #pages .page:nth-child(5)").id<page_now){
                        page_now=1;
                    }
                } 
                sessionStorage.setItem("page_now", page_now);    
                console.log(page_now);
                var category_id=sessionStorage.getItem("category_id");
                var search_text=document.querySelector('#search-text-category').value; 
                // console.log(category_id);
                // console.log(page_now);
                // console.log(search_text);
                
                $.getJSON(page_url+'php/change_search.php', {category_id: category_id,search_text: search_text.replaceAll(' ', '_'), page_now: page_now }, function(data_category,  textStatus, xhr)
                    {
                            if(category_id!=0||search_text!=""){$('header').find('#header-logo').html("<a href='"+page_url+"'><i class='fas fa-home'></i></a>");}
                            else{$('header').find('#header-logo').html("<h1>CPO</h1>");}
                            $('main .container').load(data_category.data);   

                    }); 

            });
            $(document).on('click', '#button_page_starting', (e)=>{
                $("header").css({display:"flex"});
                $("main").css({display:"flex"});
                $("footer").css({display:"flex"});
                $("#page_starting").css({display:"none"});
            });


});

</script>