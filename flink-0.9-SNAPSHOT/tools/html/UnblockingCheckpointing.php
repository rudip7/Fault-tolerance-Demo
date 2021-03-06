<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
  Licensed to the Apache Software Foundation (ASF) under one
  or more contributor license agreements.  See the NOTICE file
  distributed with this work for additional information
  regarding copyright ownership.  The ASF licenses this file
  to you under the Apache License, Version 2.0 (the
  "License"); you may not use this file except in compliance
  with the License.  You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing,
  software distributed under the License is distributed on an
  "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
  KIND, either express or implied.  See the License for the
  specific language governing permissions and limitations
  under the License.
-->
<html>

<head>
    <title>Fault Tolerance and Recovery System overview</title>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../css/nephelefrontend.css" />
    <link rel="stylesheet" type="text/css" href="../css/pactgraphs.css" />
    <link rel="stylesheet" type="text/css" href="../css/graph.css" />
    <link rel="stylesheet" type="text/css" href="../css/overlay.css" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <script type="text/javascript" src="../js/jquery-2.1.0.js"></script>
    <script type="text/javascript" src="../js/graphCreator.js"></script>
    <script type="text/javascript" src="../js/d3.js" charset="utf-8"></script>
    <script type="text/javascript" src="../js/dagre-d3.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../js/go-debug.js"></script>
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.tools.min.js"></script>
    <style>
        div.menuStyle {
            width: 20%;
            height: 100%;
            margin: auto;
            padding: 15px;
            float: left;
            border-right: 1px solid #262A37;
            color: #000000;
        }

        .button {
            background-color: white;
            border: none;
            color: black;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 19px;
            margin: 7px 2px;
            cursor: pointer;
        }

        .contentButton {
            background-color: grey;
            border: none;
            color: black;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            padding: 15px 32px;
            font-size: 16px;
            margin: 7px 2px;
            cursor: pointer;
        }

        div.contentStyle {
            width: 100%;
            height: 100%;
            margin: auto;
            padding: 15px;
            float: right;
        }



        .sidenav {
            height: 270px;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            right: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 19px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }
            .sidenav a {
                font-size: 18px;
            }
        }
    </style>

    <body>




        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="../html/UnblockingCheckpointing.html">Unblocking Checkpointing</a>
            <a href="../html/ConfinedRecovery.html">Confined Recovery</a>
            <a href="../html/ReplicaRecovery.html">Replica Recovery</a>
        </div>
        <div class="mainHeading">
            <h1 style="margin-top:0"><img src="../img/flink-logo.png" width="100" height="100" alt="Flink Logo" align="middle" />Fault-Tolerance for Distributed Iterative Dataflows in Action
                <span style="font-size:50px; cursor:pointer; float: right; padding: 25px;" onclick="openNav()">&#9776;</span>
            </h1>
        </div>
        <div>
            <div id="content"  class="canvas boxed">

                <div style="height: 100%; padding: 15px; " id="contentInformation">



                    <div id="checkpointContent">
                        <div style="font-size: 17px;">
                            <h2 style="margin-top: 0px; margin-bottom: 0px;">Unblocking Checkpointing Demonstration<button class="btn btn-default" onclick="window.location.href='../html/UnblockingCheckpointing.html'" style="float: right; background-color: #58FA82;">Reset</button></h2><br/></div>
                        <div style="font-size: 17px;">

                            <form onsubmit="formHandler()" action="http://localhost:8200/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/tools/html/UnblockingCheckpointing.php" method="get">
                                <select name="algorithm" id="algorithmid" class="btn btn-default" style="float: left; background-color: #D7BCDA;">
             <option id="PRButton" value="pageRank" <?php if($_GET["algorithm"] == "pageRank"){ echo " selected";} ?>>PageRank</option>
               <option id="CCButton" value="connectedComponents" <?php if($_GET["algorithm"] == "connectedComponents"){ echo " selected";} ?>>Connected Components</option>
               </select>

                                <div style="float: right;">
                                    <input type="radio" name="checkpointing" value="NoCheckpointing" <?php if($_GET[ "checkpointing"]=="NoCheckpointing" ){ echo ' checked="checked"';} ?>> No Checkpointing&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="checkpointing" value="TailCheckpointing" <?php if($_GET[ "checkpointing"]=="TailCheckpointing" ){ echo ' checked="checked"';} ?>> Tail Checkpointing&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="checkpointing" value="HeadCheckpointing" <?php if($_GET[ "checkpointing"]=="HeadCheckpointing" ){ echo ' checked="checked"';} ?>> Head Checkpointing&nbsp;&nbsp;&nbsp;
                                    <input type="submit" value="Run Demo" class="btn btn-default" style="background-color: #58FA82;">
                                </div>
                            </form>



                            <br/><br/>
                        </div>
                        <div style="width: 100%;">
                        <div>
                            <h3 style="float: left;">Execution Plan</h3>
                        </div> <br/><br/><br/>
                        <div id="mainCanvas" style="border: solid 1px black; height: 340px; width: 100%;">
                            <div align="center"><textarea id="plantext" style="width: 100%; height: 300px;"></textarea></div>
                            <div align="center" ; style="float: bottom;">
                                <input id="draw_button" class="btn btn-default" style="background-color: #FACC74;" type="button" value="Draw" />
                            </div>
                        </div>
                        </div>
                    </div>




                </div>


            </div>
        </div>

        <div class="simple_overlay" id="propertyO">
            <div id="propertyCanvas" class="propertyCanvas">
            </div>
        </div>




        <script type="text/javascript">
            <?php 
      if($_GET["algorithm"] == "pageRank"){

        if($_GET["checkpointing"] == "NoCheckpointing"){
            exec('../../bin/flink info -v -c eu.stratosphere.procrustes.experiments.recovery.PageRank ../../../procrustes-flink-1.0-SNAPSHOT.jar hdfs://localhost:9000/11 hdfs://localhost:9000/outputNew11 325557 10 0 > ../../tools/executionPlan.txt');

        } else if($_GET["checkpointing"] == "TailCheckpointing"){
            exec('../../bin/flink info -v -c eu.stratosphere.procrustes.experiments.recovery.PageRankLateCpt ../../../procrustes-flink-1.0-SNAPSHOT.jar hdfs://localhost:9000/11 hdfs://localhost:9000/outputNew11 325557 10 5 > ../../tools/executionPlan.txt');

        } else if($_GET["checkpointing"] == "HeadCheckpointing"){
            exec('../../bin/flink info -v -c eu.stratosphere.procrustes.experiments.recovery.PageRank ../../../procrustes-flink-1.0-SNAPSHOT.jar hdfs://localhost:9000/11 hdfs://localhost:9000/outputNew11 325557 10 5 > ../../tools/executionPlan.txt');
        }

    }

    else if($_GET["algorithm"] == "connectedComponents"){

        if($_GET["checkpointing"] == "NoCheckpointing"){
            exec('../../bin/flink info -v -c eu.stratosphere.procrustes.experiments.recovery.ConnectedComponentsBulk ../../../procrustes-flink-1.0-SNAPSHOT.jar hdfs://localhost:9000/11 hdfs://localhost:9000/outputNew11 10 0 > ../../tools/executionPlan.txt');

        } else if($_GET["checkpointing"] == "TailCheckpointing"){
            exec('../../bin/flink info -v -c eu.stratosphere.procrustes.experiments.recovery.ConnectedComponentsBulkLateCpt ../../../procrustes-flink-1.0-SNAPSHOT.jar hdfs://localhost:9000/11 hdfs://localhost:9000/outputNew11 10 5 > ../../tools/executionPlan.txt');

        } else if($_GET["checkpointing"] == "HeadCheckpointing"){
            exec('../../bin/flink info -v -c eu.stratosphere.procrustes.experiments.recovery.ConnectedComponentsBulk ../../../procrustes-flink-1.0-SNAPSHOT.jar hdfs://localhost:9000/11 hdfs://localhost:9000/outputNew11 10 5 > ../../tools/executionPlan.txt');

        }
    }

    ?>


            function openNav() {
                document.getElementById("mySidenav").style.width = "300px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }

            $(document).ready(function() {

                $('#draw_button').click(function() {
                    var planData = $("textarea#plantext").val();
                    $("#mainCanvas").empty();
                    var svgElement = "<div id=\"attach\"><svg id=\"svg-main\" width=\"100%\" height=303><g transform=\"translate(20, 20)\"/></svg></div>";
                    $("#mainCanvas").append(svgElement);
                    var asObject = eval('(' + planData + ')');
                    drawGraph(asObject, "#svg-main");
                });

            });
            activateZoomButtons();
            renderExecutionPlan();

            function renderExecutionPlan() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("plantext").value = this.responseText;
                    };
                }
                xhttp.open("GET", "http://localhost:8200/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/tools/php/readExecPlan.php", true);
                xhttp.send();
            }
        </script>
    </body>

</html>