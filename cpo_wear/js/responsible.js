const mediaQuery = window.matchMedia('(min-width: 1024px)')

function handleTabletChange(e) {
    if (e.matches) {
        $('header #catalog form select').removeAttr('id');
        $('main .slide').css({display: 'flex'});
        $('header #catalog form select').css({display: 'none'});
        $('main .slide ul li').attr('class', 'category_id');
        $('header .header-div nav ul').css({display: 'flex'})
        // console.log("pc");
    }
    else{
        $('main .slide ul li').removeAttr('class');
        $('main .slide').css({display: 'none'});
        $('header #catalog form select').attr('id', 'category_id');
        $('header #catalog form select').css({display: 'block'});
        $('header .header-div nav ul').css({display: 'none'})
        // console.log("mobile");
    }
  }


  mediaQuery.addListener(handleTabletChange);

  handleTabletChange(mediaQuery);