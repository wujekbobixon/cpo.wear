
<?php require_once "./php/init.php";?>
<?php require_once "./php/check_url.php";?>
<?php require_once BASE_URL."partials/template/head.php";?>

<body>
    <div id="page_starting">
      <button id="button_page_starting" onclick="console.log('hello')">test</button>
    </div>
    <header>
        <div class="header-div">
            <div id="header-logo">
                <h1>CPO</h1>
            </div>
        </div>
        <div class="header-div" id="header-div-interfes">
            <nav>
                <ul>
                  <ol>
                    <div class="closeMenu"><i class="fa fa-times"></i></div>
                    <li><a>HOME</a></li>
                    <li><a>About us</a></li>
                    <li><a>Contact</a></li>
                    <span class="icons">
                      <i class="fab fa-facebook"></i>
                      <i class="fab fa-instagram"></i>   
                    </span>
                  </ol>
                  <li class="search_show_hide"><i class='show_search fas fa-search'></i></li>
                </ul>
                <div id="hamburger">
                      <div class="search_show_hide"><i class="show_search fas fa-search "></i></div>
                      <i class="fas fa-align-justify"></i>
                </div>
            </nav>
        </div>
        <div id="catalog">
              <form method="GET" onsubmit="return false">
                <div class="row">
                  <input type="text" name="search-text" id="search-text-category" placeholder="Szukaj...">
                  <select name="category_id" id="category_id">
                    <option value="0" >Wszystko</option>
                    <?php require_once BASE_URL.'php/catalog.php'; ?> 
                  </select>
                </div>
                <btn id="button-search"><i class='fas fa-search'></i></btn>  
              </form>
            </div>
    </header>
    <aside>
      <h1>C P O</h1>
    </aside>
    <main>
      <div class="slide hi-slide">
        <ul>
          <?php require_once BASE_URL.'php/slider.php'; ?> 
        </ul>
          <div class="hi-next "></div>
          <div class="hi-prev "></div>

      </div>
      <div id="results-search"></div>   
      <div class="container">
            <?php require_once BASE_URL.'php/render_items.php'; ?>
      </div>
    </main>
    <footer>
            Test
    </footer>
    <div class="intro">
      <div class="intro-text">
        <h1 class="hide">
          <span class="text">C</span>
          <span class="text">ENTRAL</span>
        </h1>
        <h1 class="hide">
          <span class="text">P</span>
          <span class="text">RODUCTION</span>
        </h1>
        <h1 class="hide">
          <span class="text">O</span>
          <span class="text">F</span>
        </h1>
      </div>
    </div>
    <div class="slider"><img src="./photos/logo1.png"></div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
      integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
      crossorigin="anonymous"
    ></script>
    <script src="./js/app.js"></script>
    <script type="text/javascript" src="js/slider.js" ></script>
    <script type="text/javascript" src="js/animation_search.js" ></script>
    <script type="text/javascript" src="js/responsible.js" ></script>
    <script type="text/javascript" src="js/hamburger.js" ></script>
		<script>
			$('.slide').hiSlide();
    </script> 
		<?php require_once BASE_URL.'js/change_catalog.php'; ?>

</body>
</html>