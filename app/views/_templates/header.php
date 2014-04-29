<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">>
    <title>Fruitify</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="../../../public/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/css/component.css" />
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <!-- Local JavaScript -->
    <script src="../../../public/js/application.js"></script>
    <script src="../../../public/js/modernizr.custom.js"></script>
    <script>
    function validateForm(){
        var x=document.forms["textform"]["textbox"].value;
        if (x==null || x==""){
            alert("Please copy and paste your code to be Fruitified");
            return false;
        }
    }
 </script>
</head>
<body>
<!-- header -->
<div id="wrap">
<div class="container">
        <div id="splitlayout" class="splitlayout">
            <div class="intro">
                <div class="side side-left">
                    <header class="codropsheader clearfix">
                        <!--<span>Blueprint <span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>-->
                        <h1>FRUITIFY</h1>
                        <nav>
                            <a href="http://tympanus.net/Blueprints/OnScrollEffectLayout/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
                            <!--a href="" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a-->
                            <a href="http://tympanus.net/codrops/?p=16693" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
                            <a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
                        </nav>
                    </header>
<div class="container">
    <!-- Info -->
    <div class="where-are-we-box">
        Everything in this box is loaded from <span class="bold">application/views/_templates/header.php</span> !
        <br />
        The green line is added via JavaScript (to show how to integrate JavaScript).
    </div>
    <h1>The header (used on all pages)</h1>
    <!-- demo image -->
    <h3>Demo image, to show usage of public/img folder</h3>
    <div>
        <img src="<?php echo URL; ?>/public/img/blender.png" />
    </div>
    <!-- navigation -->
    <h3>Demo Navigation</h3>
    <div class="navigation">
        <ul>
            <!-- same like "home" or "home/index" -->
            <li><a href="<?php echo URL; ?>"><?php echo URL; ?>home</a></li>
            <li><a href="<?php echo URL; ?>home/exampleone"><?php echo URL; ?>home/exampleone</a></li>
            <li><a href="<?php echo URL; ?>home/exampletwo"><?php echo URL; ?>home/exampletwo</a></li>
            <!-- "songs" and "songs/index" are the same -->
            <li><a href="<?php echo URL; ?>songs/"><?php echo URL; ?>songs/index</a></li>
        </ul>
    </div>
    <!-- simple div for javascript output, just to show how to integrate js into this MVC construct -->
    <h3>Demo JavaScript</h3>
    <div id="javascript-header-demo-box">
    </div>
</div>
