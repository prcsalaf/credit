<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <title>Salafin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
 <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!-- CSS Files -->

     <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/rangestyle.css">



    <!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">







</head>

<body>

    <div class="image-container set-full-height" style="background-image: url('assets/img/paper-2.jpeg')" id="app">


        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="red" id="wizard">
                            <form action="credit/ajouter" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!--        You can switch " data-color="green" "  with one of the next bright colors: "blue", "azure", "orange", "red"       -->

                                <div class="wizard-header">
                                    <h3 class="wizard-title text-primary">Simulez votre crédit</h3>
                                </div>
                                <div class="wizard-navigation">
                                    <div class="progress-with-circle">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1"
                                            aria-valuemax="4" style="width: 15%;"></div>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#tap1" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-map"></i>
                                                </div>
                                                Produit
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tap2" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-panel"></i>
                                                </div>

                                                Progress
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tap3" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-direction-alt"></i>
                                                </div>
                                                Saisir
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tap4" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-upload"></i>
                                                </div>
                                                Upload
                                            </a>
                                        </li>

                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tap1">
                                        <h5 class="info-text">Quel est votre projet? </h5>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <div class="col-sm-6  ">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="project" value="Cash">
                                                        <div class="card card-checkboxes card-hover-effect">
                                                            <i class="ti-money"></i>
                                                            <p>Cash</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="project" value="Automobile">
                                                        <div class="card card-checkboxes card-hover-effect">
                                                            <i class="ti-car"></i>
                                                            <p>Automobile</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tap2">
                                        <div class="row">

                                            <div class="form-group  mr-tp2">
                                                <div class="form-group">
                                                    <select class="form-control type" name="type">
                                                        <option disabled="" selected="">- Dites-nous qui vous êtes -
                                                        </option>
                                                        @foreach ($regless as $regle)

                                                        <option value="{{ $regle->type}}"> {{ $regle->type }}</option>

                                                        @endforeach

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-sm-12">
                                                <div class="vertically-stacked-slider form-group">

                                                    <label for="montant">MONTANT SOUHAITÉ </label>
                                                    <label class="elem-right   ">
                                                        <input type="number" value="0.00" step="100"
                                                            class="form-control  input-grab montant"> dh </label>
                                                    <input type="range" name="montant" value="0" min="0" max="0"
                                                        step="500" class="montant">
                                                </div>
                                                <div class="vertically-stacked-slider">
                                                    <label for="mensualite"> MENSUALITÉ</label>
                                                    <label class="elem-right ">
                                                        <input type="number" value="0.00" step="0.01" name="monsualite"
                                                            class="form-control input-grab mensualite"> dh </label>
                                                    <input type="range" value="0" min="0" max="0" step="0.01"
                                                        class="mensualite">
                                                </div>
                                                <div class="vertically-stacked-slider">
                                                    <label for="duree"> DURÉE</label>
                                                    <label class="elem-right ">
                                                        <input type="number" value="0"
                                                            class="form-control  input-grab input-grab-last duree">
                                                        mois</label>
                                                    <input type="range" name="duree" value="0" min="0" max="100"
                                                        step="1" class="duree">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tap3">

                                        <div class="row">
                                            <div class="mr-tp2">
                                                <div class="form-group">
                                                    <label>Crédit en cour</label>
                                                    <input type="text" class="form-control" name="credit_encour"
                                                        placeholder="Ex : 1000">
                                                </div>
                                            </div>

                                            <div class="mr-tp2">
                                                <div class="form-group">
                                                    <label>Nombre de personne </label>
                                                    <select class="form-control" name="nombre_pr">
                                                        <option disabled="" selected="">- 0 -</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mr-tp2">
                                                <div class="form-group">
                                                    <label>Rien!!</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        placeholder="rien §§§§">
                                                </div>
                                            </div>
                                            <div class="mr-tp2">
                                                <div class="form-group">
                                                    <label>Rien!!</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        placeholder="rien §§§§">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tap4">
                                        <h5 class="info-text">Capter des fichiers  </h5>
                                        <div class="row">
                                             {{-- <div class="mr-tp2 col-md-3" id="creen-start">
                                              <div class="form-group">
                                                   <div id="screen-initial" style="display: none;">
                                                    <h1 id="msg">Loading...</h1>
                                                    <progress id="load-progress" value="0" max="100"></progress>
                                                 </div>
                                                <div class="form-group" >
                                                    <button class="icon-circle " type="button"
                                                        id="start-scan">   <i class="ti-upload"></i> </button>
                                                        {{-- <input type="hidden" name="cin" id="cin">

                                                </div>

                                             </div>
                                            </div> --}}
                                            <div class="mr-tp2 col-md-3">
                                                <div class="form-group">
                                                    <input type="file" id="real-file" name="rien" accept=".pdf" class="invisible  " />
                                                    <input type="hidden" name="nom" id="nom" class="invisible">
                                                    <input type="hidden" name="prenom" id="prenom" class="invisible">
                                                    <input type="hidden" name="dateN" id="dateN" class="invisible">
                                                    <button class="icon-circle " type="button"    id="custom-button">
                                                         <i class="ti-camera"></i>

                                                    </button><p>Scanne CIN </p>

                                                </div>

                                            </div>
                                            <div class="mr-tp2 col-md-3">
                                                <div class="form-group">
                                                    <input type="file" id="real-file" name="file_pdf" accept=".pdf"
                                                        class="invisible  " />
                                                    <button class="icon-circle " type="button" id="custom-button">
                                                        <i class="ti-camera"></i>
                                                    </button>
                                                    <p> Fiche payent</p>
                                                </div>

                                            </div>
                                            <div class="mr-tp2 col-md-3">
                                                <div class="form-group">
                                                    <input type="file" id="real-file" accept="image/*"
                                                        class="invisible" />
                                                    <button class="icon-circle " type="button" id="custom-button">
                                                         <i class="ti-camera"></i>
                                                     </button>
                                                    <p> Fiche payent</p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <!-- button  -->
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next'
                                            value='Next' />
                                        <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd'
                                            name='finish' value='Finish' />
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-default btn-wd' name='previous'
                                            value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->

        <div id="screen-scanning" class="hidden">
        <video id="camera-feed" playsinline></video>
        <!-- Recognition events will be drawn here. -->
        <canvas id="camera-feedback"></canvas>
        <p id="camera-guides">Point the camera towards front side of a document.</p>
    </div>



    </div>


</body>

<script  type="text/ecmascript">
     // start default traitement
    window.laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'url' => url('/') ,
        'rgls' => $regless
        ])
!!} ;

</script>

<!--   Core JS Files   -->
<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="assets/js/demo.js" type="text/javascript"></script>
<script src="assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>

<script src="assets/js/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Sdk blibkid  -->
  <script src="https://unpkg.com/@microblink/blinkid-in-browser-sdk@5.11.4/dist/blinkid-sdk.js"></script>
  <script src="assets/js/apicin.js"></script>


  <script>
     $('#start-scan').click(function(){

             $('#screen-scanning').css({'width': '100%',
                'z-index': '10',
                'position': 'absolute',
                'top': '50px',
                'width': '100%',
                'height': '100%',
            });
             $('#camera-feed').css({'width': '100%'});

     });

  </script>

</html>
