<?php
    include '../PHP/login/sesion.php';
?>


<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Turnos Formosa</title>
  <link href="Calendario_archivos/css.css" rel="stylesheet">
  <link rel="stylesheet" href="Calendario_archivos/font-awesome.min.css">
  <link rel="stylesheet" href="Calendario_archivos/style.css">
  <script defer="defer" referrerpolicy="origin" src="Calendario_archivos/s"></script><script nonce="f57cbeb3-d4f4-4208-bf95-9eeb80360b75">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.x=Math.random(),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)},["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>

  <link href="Robust%20UI%20Kit_archivos/app.css" rel="stylesheet">
  <style type="text/css">
    .medium-zoom-overlay{position:fixed;top:0;right:0;bottom:0;left:0;opacity:0;transition:opacity .3s;will-change:opacity}
    .medium-zoom--open .medium-zoom-overlay{cursor:pointer;cursor:zoom-out;opacity:1}
    .medium-zoom-image{cursor:pointer;cursor:zoom-in;transition:transform .3s}
    .medium-zoom-image--open{position:relative;cursor:pointer;cursor:zoom-out;will-change:transform}
  </style>
</head>
<body cz-shortcut-listen="true">

  <nav class="navbar navbar-lg navbar-expand-lg navbar-transparant navbar-dark navbar-absolute w-100">
    <div class="container">
      <a class="navbar-brand" href="https://robust.bootlab.io/index.html">Turnos.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="https://robust.bootlab.io/index.html">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Información
            </a>
            
          </li>
          
          <li class="nav-item dropdown">
            <?php
              if(isset($usuario) && $tipo==3){
                echo "
                <a class='nav-link align-items-top ' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <p>$usuario</p>
                </a>";

               
                echo '<div class="dropdown-menu">';
                    echo "<a class='dropdown-item' href='components-bootstrap.html'>$usuario</a>";
                    echo '<a class="dropdown-item" href="components-bootstrap.html">Historial Médico</a>';
                    echo '<a class="dropdown-item" href="components-robust.html">Mis Turnos</a>';
                    echo '<a class="dropdown-item" href="components-bootstrap.html">"           "</a>';
                    echo '<a class="dropdown-item" href="../PHP/login/salir.php">Cerrar Sesión</a>';
                echo '</div>';
              
              }else{
                echo "<a class='btn btn-outline-white' href='../Formulario_logeo/index.html' target='_blank'>INICIAR SESIÓN</a>";

              }
            ?>
          </li>
        </ul>  
      </div>
    </div>
  </nav>

  <div class="intro py-5 py-lg-9 position-relative text-white">
    <div class="bg-overlay-primary">
      <img src="img/hospital-distrital-8.jpg" class="img-fluid img-cover" alt="Robust UI Kit">
    </div>
    <div class="intro-content py-6 text-center">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto text-center">
            <h1 class="my-3 display-4 d-none d-lg-inline-block">Turnos Formosa</h1>
            <span class="h1 my-3 d-inline-block d-lg-none">Turnos Formmosa</span>
            <p class="lead mb-3">En esta página usted podrá sacar turnos de manera online desde la comodidad de su casa.</p>
            <?php
                if(isset($usuario) && $tipo==3){
                    echo "<a class='btn btn-success btn-lg mr-lg-2 my-1' href='../Turnos/turnos2.html' role='button'>Solicitar un Turno</a>";
                }else{
                    echo "<a class='btn btn-success btn-lg mr-lg-2 my-1' href='../Formulario_logeo/index.html' role='button'>Solicitar un Turno</a>";
            
                }
            
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <main class="main" role="main">
    <div class="bg-white py-7">
      <div class="container">
        <div class="row">
          <div class="col-md-10 mx-auto">
            
          </div>
        </div>
        <div class="row pt-5">
          <div class="col-md-4">
            <div>
              <a href="https://robust.bootlab.io/pages-landing.html" class="link-unstyled">
                <img src="img/portada-ok1.jpeg" class="img-fluid shadow-sm" alt="Landing">
              </a>
              <h5 class="mt-4">Vacuna COVID-19</h5>
              <p>
                Ve el calendario de Vacunación para el COVID-19.
              </p>
              <p>
                <a href="https://robust.bootlab.io/pages-landing.html">Ingresar a la página ›</a>
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div>
              <a href="https://robust.bootlab.io/pages-dashboard.html" class="link-unstyled">
                <img src="img/coronavirus.jpg" class="img-fluid shadow-sm" alt="Dashboard">
              </a>
              <h5 class="mt-4">Coronavirus COVID-19</h5>
              <p>
                
              </p>
              <p>
                <a href="https://robust.bootlab.io/pages-dashboard.html">Explore Pages ›</a>
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div>
              <a href="https://robust.bootlab.io/pages-general.html" class="link-unstyled">
                <img src="img/medidas1.jpeg" class="img-fluid shadow-sm" alt="Pages">
              </a>
              <h5 class="mt-4">Medidas del Gobierno</h5>
              <p>
                Discover our wide variety of pages including blog, about, contact and error pages.
              </p>
              <p>
                <a href="https://robust.bootlab.io/pages-general.html">Explore Pages ›</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-light pt-5 mb-2">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mr-auto align-self-center mb-3">
            <div class="my-3">
            </div>
            <div class="my-4">
              <h3>Podés acceder desde tu celular.</h3>
              <p class="text-dark">
                Podés ingresar a la página, para agentar agendar turno con especialistas solo con tu celular.
              </p>
            </div>
            <div class="my-3">
            </div>
          </div>
          <div class="col-md-5 ml-auto mt-4">
            <img src="Robust%20UI%20Kit_archivos/ipad.png" class="img-fluid" alt="iPad">
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white py-7">
      <div class="container">

        <div class="row mb-6">
          <div class="col-md-3 ml-auto">
            <h2>Noticias</h2>
          </div>
          <div class="col-md-5 mr-auto">
            <p class="lead text-dark" style="text-align: justify ;">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Consequuntur hic commodi, fugiat aspernatur adipisci est
              accusantium modi expedita recusandae distinctio eligendi
              officiis ducimus odit et deserunt fuga labore facilis ipsa!
            </p>
          </div>
        </div>

        <div class="row mt-5 bg">
            <a class="col-md-4 img-fluid shadow-sm">
              <div class="media">
                <div class="icon mr-3">
                  <i class="far fa-id-badge"></i>
                </div>
                <div class="media-body">
                  <h3 class="h4">Salud confirma el cuarto caso de viruela símica en el país</h3>
                  <p class="text-dark" style="text-align:justify;">
                    Dio positivo el análisis que realizó ANLIS- Malbrán de un residente de la ciudad mendocina de
                    Godoy Cruz con antecedente de viaje a España. A la fecha, no se han registrado casos secundarios
                    a partir de los cuatro casos confirmados.
                  </p>
                </div>
              </div>
            </a>
          
          <a href="" class="col-md-4 img-fluid shadow-sm">
            <div class="media">
              <div class="icon mr-3 bg-warning">
                <i class="far fa-hand-scissors"></i>
              </div>
              <div class="media-body">
                <h3 class="h4">Argentina recibió hoy 1.998.600 vacunas de Moderna</h3>
                <p class="text-dark" style="text-align:justify ;">
                  Con este embarque el Plan Estratégico de Vacunación contra el SARS-CoV-2
                  sigue fortaleciéndose en las jurisdicciones superando ya los 123 millones 
                  de dosis recibidas de diferentes laboratorios proveedores desde que inició 
                  la campaña de vacunación.
                </p>
              </div>
            </div>
          </a>
            <a href="" class="col-md-4 img-fluid shadow-sm">
              <div class="media">
                <div class="icon mr-3 bg-danger">
                  <i class="far fa-comments"></i>
                </div>
                <div class="media-body">
                  <h3 class="h4">Salud distribuyó 741.340 vacunas de Moderna a todo el país</h3>
                  <p class="text-dark text-left" style="text-align: justify ;">
                    La cartera sanitaria envió, además, otras 10.000 dosis pediátricas de Pfizer a la provincia de Chaco.
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div><!-- /.row -->
    </div>
    

    <div class="py-6 bg-primary text-white">
      <div data-flickity="{ &quot;prevNextButtons&quot;: false, &quot;wrapAround&quot;: true}" class="flickity-light-dots flickity-enabled is-draggable" tabindex="0">
        
        
        
      <div class="flickity-viewport" style="height: 128px; touch-action: pan-y;"><div class="flickity-slider" style="left: 0px; transform: translateX(0%);"><div class="carousel-cell is-selected" style="position: absolute; left: 0%;" aria-selected="true">
          <div class="container">
            <div class="row">
              <div class="col-md-10 mx-auto">
                <div class="media">
                  <img src="Robust%20UI%20Kit_archivos/1.jpg" alt="Avatar" class="img-fluid rounded-circle mr-4" style="max-width:128px;">
                  <div class="media-body">
                    <blockquote class="h3 mt-3 font-weight-normal">
                      “I can only recommend both this theme and the 
competent developer behind it to other people. Quick &amp; helpful 
support! ”
                    </blockquote>
                    <span>Jane Roe</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><div class="carousel-cell" style="position: absolute; left: 100%;" aria-selected="false">
          <div class="container">
            <div class="row">
              <div class="col-md-10 mx-auto">
                <div class="media">
                  <img src="Robust%20UI%20Kit_archivos/2.jpg" alt="Avatar" class="img-fluid rounded-circle mr-4" style="max-width:128px;">
                  <div class="media-body">
                    <blockquote class="h3 mt-3 font-weight-normal">
                      “I can only recommend both this theme and the 
competent developer behind it to other people. Quick &amp; helpful 
support! ”
                    </blockquote>
                    <span>John Roe</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><div class="carousel-cell" style="position: absolute; left: 200%;" aria-selected="false">
          <div class="container">
            <div class="row">
              <div class="col-md-10 mx-auto">
                <div class="media">
                  <img src="Robust%20UI%20Kit_archivos/3.jpg" alt="Avatar" class="img-fluid rounded-circle mr-4" style="max-width:128px;">
                  <div class="media-body">
                    <blockquote class="h3 mt-3 font-weight-normal">
                      “I can only recommend both this theme and the 
competent developer behind it to other people. Quick &amp; helpful 
support! ”
                    </blockquote>
                    <span>Jane Roe</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div></div></div><ol class="flickity-page-dots"><li class="dot is-selected" aria-label="Page dot 1" aria-current="step"></li><li class="dot" aria-label="Page dot 2"></li><li class="dot" aria-label="Page dot 3"></li></ol></div>
    </div>
  </main>

  <footer role="contentinfo" class="py-6 lh-1 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <h3 class="h4 mb-4">Robust.</h3>
        </div>
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <h4 class="h6">Address</h4>
              <address>
    						<ul class="list-unstyled">
    							<li>
                    City Hall<br>
    								212  Street<br>
    								Lawoma<br>
    								735<br>
    							</li>
    						</ul>
    					</address>
            </div>
            <div class="col-md-3 col-sm-6">
              <h4 class="h6">Popular Services</h4>
              <ul class="list-unstyled">
                <li><a href="#">Payment Center</a></li>
                <li><a href="#">Contact Directory</a></li>
                <li><a href="#">Forms</a></li>
                <li><a href="#">News and Updates</a></li>
                <li><a href="#">FAQs</a></li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-6">
              <h4 class="h6">Website Information</h4>
              <ul class="list-unstyled">
                <li><a href="#">Website Tutorial</a></li>
                <li><a href="#">Accessibility</a></li>
                <li><a href="#">Disclaimer</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Webmaster</a></li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-6">
              <h4 class="h6">Company</h4>
              <ul class="list-unstyled">
                <li><a href="#">Our team</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="https://themes.getbootstrap.com/product/robust-ui-kit-dashboard-landing/" target="_blank">Purchase</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 text-center text-sm">
          <p class="mb-0">© 2021 - <a href="https://robust.bootlab.io/index.html">Robust UI Kit</a>.</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="Robust%20UI%20Kit_archivos/app.js"></script>


</body></html>