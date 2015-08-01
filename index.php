<?php
require_once("record_visitors.php");
$visitor = new guest_info;
//$log_string = date('Y-m-d H:i:s')."\t".$visitor->GetIP()."\t".$visitor->GetOS()."\t".$visitor->GetBrowser()."\t".$visitor->GetLang()."\n";
$log_string = date('Y-m-d H:i:s')."\t"."visit-home-page\t".$visitor->GetIP()."\t".$visitor->GetOS()."\t".$visitor->GetBrowser()."\t".$visitor->GetLang()."\t".$visitor->GetIPLoc_sina($visitor->GetIP())."\n";
$fp = fopen('visitor.log','a');
if( flock($fp,LOCK_EX))
{
    fwrite($fp,$log_string);
    flock($fp, LOCK_UN);
}

fclose($fp);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Introduction for KEMY">
    <meta name="author" content="ETAF">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>Machine Learned AQM scheme</title>

    <!-- Bootstrap core CSS -->
    <!--<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./media/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="./media/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <h3 class="text-muted">Machine Learned AQM Scheme</h3>
      </div>

      <div class="jumbotron">
        <p class="text-left lead">We've developmented an AQM scheme learner called Kemy based on machine learning technologies.</p>
        <p class="text-left lead">Kemy is an offline machine learning algorithm, which have learned a higher perfomanced AQM scheme than most representative human designed schemes.</p>
        <a name="colored-result"></a>
        <p> <img  src="images/colorized-result.png"></p>
        <br />
        <a class="btn  btn-info" href="#reproduce" role="button">Reproduce the result</a>
        <!-- <a class="btn  btn-success" href="download.php?filename=test.txt" role="button">source codes</a> -->
        <a class="btn  btn-success" href="#runkemy" role="button">Run training codes</a>

      </div>
      <hr>
      <section id="reproduce">
            <div class="page-header">
                <h3><b>Reproduce the Results</b></h3>
            </div>
            <p>
                We produce the result showned in <a href="#colored-result">the Figure</a> on Ubuntu 14.04 LTS.
                Before running the evluation program, please make sure the following tools have been correctly installed in you running environment.
                <p id="requirements"><strong>Required tools:</strong></p>
                <ul>
                    <li>C++ 11 compiler (we use gcc 4.8) </li>
                    <li><a href="https://code.google.com/p/protobuf/">Google Protocol Buffers</a></li>
                    <li><a href="http://www.boost.org/">Boost C++ libraries</a> </li>
                </ul>
               After the required tools have been installed, please follow the step below to reproduce the result.
               <ol>
                    <li><p>
                        Download the source codes:<br>
                            <a class="btn btn-success" href="download.php?filename=kemy-reproduce.tar.gz" role="button"><span class="glyphicon glyphicon-cloud-download"></span> kemy-reproduce.tar.gz</a></p> </li>
                    <li>
                        <p>Unpack the packet: <kbd>$ tar -xf kemy-reprodece</kbd></p>
                    </li>
                    <li>
                       <p><kbd>$ cd kemy-reproduce</kbd></p>
                    </li>
                    <li>
                       <p><kbd>$ ./install</kbd></p>
                    </li>
                    <li>
                       <p><kbd>$ cd ns-2.35/tcl/ex/congctrl</kbd></p>
                    </li>
                    <li>
                        <p><kbd>$ ./main.py</kbd></p>
                    </li>
               </ol>
                if successful, you will see the following uncolorized image:
                <img src="images/origin-result.png">
            </p>
      </section>

      <hr>

      <section id="runkemy">
            <div class="page-header">
                <h3><b>Run Kemy</b></h3>
            </div>
            <p>
                Before run kemy, please ensure the <a href="#requirements">required tools</a> have been installed.
                <ol>
                    <li>
                       <p> Download the training code:<br>
                            <a class="btn  btn-info" href="download.php?filename=kemy.tar.gz" role="button" ><span class="glyphicon glyphicon-cloud-download"></span> kemy.tar.gz</a>
                         </p>

                    <li>
                      <p> Unpack the packet: <kbd>$ tar -xf kemy.tar.gz</kbd></p>
                    </li>
                    <li>
                       <p> <kbd>$ cd kemy-clear</kbd></p>
                    </li>
                    <li>
                        <p><kbd>$ ./autogen.sh</kbd></p>
                    </li>
                    <li>
                       <p> <kbd>$ ./configure</kbd></p>
                    </li>
                    <li>
                       <p> <kbd>$ make</kbd><p>
                    </li>
                    <li>
                        <p> <kbd>$ cd src</kbd></p>
                    </li>
                    <li>
                        <p>if successful,you can run kemy now:<br>
                        <kbd>$ ./kemy</kbd></p>
                    </li>
                </ol>
            </p>
      </section>
      <hr>
      <section id="contact">
            <div class="page-header">
                <h3>Contact us</h3>
                <p><pre><span class="glyphicon glyphicon-user"></span> XinAn Lin: <span class="glyphicon glyphicon-envelope"></span> etaf.dancing.links@gmail.com</pre></p>

            </div>

      </section>
      <div class="footer">
        <p>&copy; emil@fzu 2014</p>
      </div>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>

