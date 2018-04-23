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
  <script type="text/javascript" src="../js/jquery.tools.min.js"></script>
  <script type="text/javascript" src="../js/go-debug.js"></script>
  <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
  
  <style>
  div.menuStyle {
    width:20%;
    height: 100%;
    margin: auto;
    padding: 15px;
    float:left;
    border-right: 1px solid #262A37;
    color:#000000;
  }
  .button{
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
.contentButton{
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
    width:100%;
    height: 100%;
    margin: auto;
    padding: 15px;
    float:right;
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
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

  </style>
<body>




  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="javascript:goToUnblockingCheckpointing();">Unblocking Checkpointing</a>
  <a href="javascript:goToConfinedRecovery();">Confined Recovery</a>
  <a href="javascript:goToReplicaRecovery();">Replica Recovery</a>
</div>
  <div class="mainHeading">
    <h1 style="margin-top:0"><img src="../img/flink-logo.png" width="100" height="100" alt="Flink Logo" align="middle"/>Fault-Tolerance for Distributed Iterative Dataflows in Action
      <span style="font-size:50px; cursor:pointer; float: right; padding: 25px;" onclick="openNav()">&#9776;</span>
    </h1>
  </div>
     <div style="height: calc(100% - 120px)">
      <div id="mainCanvas" class="canvas boxed" style="height: 100%">
        
        <div class="contentStyle" id="contentInformation">
       



        <div id="replicaContent">
           <div  style="font-size: 17px;"><h2 style=" display: inline;">Replica Recovery Demonstration</h2><button class="btn btn-default" onclick="goToReplicaRecovery();" style="float: right; background-color: #58FA82;">Reset</button></div>
            <br/>
            <div  style="font-size: 17px;">
              <button class="btn btn-default" style="float: left; background-color: #D7BCDA;">K-Means</button>
            <form  action="http://localhost:8200/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/tools/html/ReplicaRecovery.php" method="get">
              <input type="hidden" class="btn btn-default" name="clusterJM" value="0" id="clusterInfoJM">
               <input type="hidden" class="btn btn-default" name="clusterTM" value="0" id="clusterInfoTM">
              
              <br/><br/>
              
              <select name="failure" id="failureType" class="btn btn-default" disabled>
  <option value="FnoFailure" <?php if($_GET["failure"] == "FnoFailure"){ echo " selected";} ?>>No Failure</option>
  <option value="FsingleFailure" <?php if($_GET["failure"] == "FsingleFailure"){ echo " selected";} ?>>Single Failure</option>
  <option value="FmultipleFailure" <?php if($_GET["failure"] == "FmultipleFailure"){ echo " selected";} ?>>Multiple Failure</option>
  <option value="FcascadingFailure" <?php if($_GET["failure"] == "FcascadingFailure"){ echo " selected";} ?>>Cascading Failure</option>
</select>&nbsp;&nbsp;&nbsp;

  Number of iterations: <input type="text" class="btn btn-default" name="NumberIterations" size="3" <?php echo 'value="'.htmlspecialchars($_GET["NumberIterations"]).'"'; ?> id="nIterations" disabled>&nbsp;&nbsp;&nbsp;
  Failed iteration: <input type="text" class="btn btn-default" name="FailedIteration" size="3" <?php echo 'value="'.htmlspecialchars($_GET["FailedIteration"]).'"'; ?> id="failedIteration" disabled>&nbsp;&nbsp;&nbsp;
  <input type="submit" value="Run Demo" class="btn btn-default" style="background-color: #58FA82; float: right;" disabled>
</form>
              
            </div>
            <div style="width: 70%; float:left"><h3 style="float: left;">Job Status</h3><br/><br/><br/>
            
            <div id="replicaLog" style="float: left; border: solid 1px black; width: 98.5%; height: 305px; text-align: left; overflow-y: scroll; overflow-x: scroll; white-space: nowrap;">
               <!--<h2>******Replica Recovery information*********</h2>-->
            </div></div>
            <div style="width: 30%; float:right;"><h3 style="float: left;">Cluster Status</h3><br/><br/><br/>
            
            <div id="replicaClusterGraph" style="float: right; border: solid 1px black;  width: 98.5%; height: 305px; text-align: center">
              <!--<h2>*******Cluster Graph********<br/><br/>Please start a Flink cluster and reload this page</h2>-->


            </div></div>
          </div>
        

        </div>



    </div> </div>
    
    <script type="text/javascript">

    function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  var jobmanString;
var taskmanString;

var myGOJS = go.GraphObject.make;

var myDiagram2 = null;

     updateJobmanReplica();

 updateLog();



// PHP EXEC ------------------------------------------------------------------------------------------------------------------

<?php
    if($_GET["failure"] == "FnoFailure"){
      exec("sed -i '7s|.*|nohup /bin/bash kMeans.sh ".htmlspecialchars($_GET["NumberIterations"])." >/dev/null 2>\&1 \&|' ../shellScripts/runDemo.sh");
      echo 'runDemo();';

    } else if($_GET["failure"] == "FsingleFailure"){
      exec("sed -i '7s|.*|nohup /bin/bash singlenodefailure.sh ".htmlspecialchars($_GET["FailedIteration"])." >/dev/null 2>\&1 \& nohup /bin/bash kMeans.sh ".htmlspecialchars($_GET["NumberIterations"])." >/dev/null 2>\&1 \&|' ../shellScripts/runDemo.sh");
      echo 'runDemo();';

    } else if($_GET["failure"] == "FmultipleFailure"){
      exec("sed -i '7s|.*|nohup /bin/bash multiplenodefailure.sh ".htmlspecialchars($_GET["FailedIteration"])." >/dev/null 2>\&1 \& nohup /bin/bash kMeans.sh ".htmlspecialchars($_GET["NumberIterations"])." >/dev/null 2>\&1 \&|' ../shellScripts/runDemo.sh");
      echo 'runDemo();';

    } else if($_GET["failure"] == "FcascadingFailure"){
      $first = strtok(htmlspecialchars($_GET["FailedIteration"]), ";");
      $second = strtok(";");
      exec("sed -i '7s|.*|nohup /bin/bash cascadingnodefailure.sh ".$first." ".$second." >/dev/null 2>\&1 \& nohup /bin/bash kMeans.sh ".htmlspecialchars($_GET["NumberIterations"])." >/dev/null 2>\&1 \&|' ../shellScripts/runDemo.sh");
      echo 'runDemo();';
    }
?>

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}


function runDemo() {

  var xhttp = new XMLHttpRequest();

  xhttp.open("GET", "http://localhost:8200/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/tools/php/runDemo.php", true);
  xhttp.send();

  showResult();

}

async function showResult(){
  var objDiv = document.getElementById("replicaLog");
  //var pos = document.getElementById("replicaLog").innerHTML.lastIndexOf("Received job ");
  while(document.getElementById("replicaLog").innerHTML.search("FINISHED") == -1){
        await sleep(2000);
        
        updateLog();
        objDiv.scrollTop = objDiv.scrollHeight;
        <?php

    if($_GET["failure"] == "FsingleFailure"){
      echo "searchSingleFailure();";

    } else if($_GET["failure"] == "FmultipleFailure"){
      echo "searchMultipleFailure();";

    } else if($_GET["failure"] == "FcascadingFailure"){
      echo "searchCascadingFailure();";

    }

    ?>

    }
    alert("Finished running the demo");
}

function stopCluster(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) { 
    //window.location.href='../html/ReplicaRecovery.html';    
  }
  };
  xhttp.open("GET", "http://localhost:8200/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/tools/php/stopCluster.php", true);

  xhttp.send();
}

var failure1 = false;
var failure2 = false;

function searchSingleFailure(){
  if(!failure1){
    var count = (document.getElementById("replicaLog").innerHTML.match(/taskmanager terminated/g) || []).length;
    if(count == 1){
      failure1 = true;
      replicaSingleFailure();
    }
  }
}

function searchMultipleFailure(){
  if(!failure2){
    var count = (document.getElementById("replicaLog").innerHTML.match(/taskmanager terminated/g) || []).length;
    if(count == 2){
      failure2 = true;
      replicaMultipleFailure();
    }
  }
}

function searchCascadingFailure(){
  if(!failure1){
    var count = (document.getElementById("replicaLog").innerHTML.match(/taskmanager terminated/g) || []).length;
    if(count == 1){
      failure1 = true;
      replicaCascadingFailure();
    }
  } else if(!failure2){
    var count = (document.getElementById("replicaLog").innerHTML.match(/taskmanager terminated/g) || []).length;
    if(count == 2){
      failure2 = true;
      replicaCascadingFailure();
    }
  }
  
}






function updateJobmanReplica() {

  jobmanString = "<?php echo $_GET["clusterJM"]; ?>";

      if(jobmanString.length === 1){
        alert("Please start a Flink cluster and reload this page");
      } else{
        var clusterString = document.getElementById("clusterInfoJM");
        clusterString.value = jobmanString.toString().replace(/(\r\n\t|\n|\r\t)/gm,"");
      //Cluster Graph -GOJS---------------------------------------------------------------------------------------------
      myDiagram2 =
        go.GraphObject.make(go.Diagram, "replicaClusterGraph", {
          initialContentAlignment: go.Spot.Center, // center Diagram contents
          "undoManager.isEnabled": true, // enable Ctrl-Z to undo and Ctrl-Y to redo
          layout: go.GraphObject.make(go.TreeLayout, // specify a Diagram.layout that arranges trees
            {
              angle: 90,
              layerSpacing: 35
            })
        });

      myDiagram2.nodeTemplate =
        go.GraphObject.make(go.Node, "Auto",
          //{ background: "#58FA82" },
          go.GraphObject.make(go.Shape, "Rectangle",
            new go.Binding("fill", "color")),
          go.GraphObject.make(go.Panel, "Table", {
              defaultAlignment: go.Spot.Left,
              margin: 15
            },
            go.GraphObject.make(go.RowColumnDefinition),
            go.GraphObject.make(go.TextBlock, {
                row: 0,
                column: 0,
                columnSpan: 2,
                alignment: go.Spot.Center
              }, {
                margin: 8,
                stroke: "black",
                font: "bold 8pt sans-serif"
              },
              new go.Binding("text", "type")),
            go.GraphObject.make(go.TextBlock, "Process: ", {
              row: 1,
              column: 0
            }),
            go.GraphObject.make(go.TextBlock, {
                row: 1,
                column: 1
              },
              new go.Binding("text", "id"))
          ));

      // define a Link template that routes orthogonally, with no arrowhead
      myDiagram2.linkTemplate =
        go.GraphObject.make(go.Link, {
            routing: go.Link.Orthogonal,
            corner: 5
          },
          go.GraphObject.make(go.Shape, {
            strokeWidth: 3,
            stroke: "#555"
          })); // the link shape

      var model = go.GraphObject.make(go.TreeModel);


      var res = jobmanString.split(" ");

      model.nodeDataArray = [{
        key: "1",
        type: "Job Manager",
        id: res[0],
        color: "#58FA82"
      }];
      myDiagram2.model = model;
      updateTaskmanReplica();
    }


}

function updateTaskmanReplica() {
  taskmanString = "<?php echo $_GET["clusterTM"]; ?>";

      if(taskmanString.length === 1){
        alert("Please start at least 2 Taskmanagers and reload this page");
      } else{
        var clusterString = document.getElementById("clusterInfoTM");
        clusterString.value = taskmanString.toString().replace(/(\r\n\t|\n|\r\t)/gm,"");

      var node = myDiagram2.findNodeForKey("1");
      var model = myDiagram2.model;
      var res = taskmanString.split(" ");
      var count = 2;

      // all model changes should happen in a transaction
      model.startTransaction("add taskmanagers");
      //debugger;
      var i;
      for (i = 0; i < res.length; i += 2) {
        var newnode = {
          key: count,
          type: "Task Manager",
          id: res[i],
          color: "#58FA82"
        };
        //var newlink = { from: selnode.data.key, to: newnode.key };
        model.addNodeData(newnode);
        model.setParentKeyForNodeData(newnode, "1");
        count++;
      }
      model.commitTransaction("add taskmanagers");

      updateLog();
    }
}


function updateLog(){

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText); //shellScripts.php&f=pageRank
      var log = this.responseText;
      document.getElementById("replicaLog").innerHTML = log;
    }
  };
  xhttp.open("GET", "http://localhost:8200/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/tools/php/readLog.php", true);

  xhttp.send();

}

//REPLICA FUNCTIONS ---------------------------------------------------------------------------------------------------


function replicaSingleFailure() {
  var node = myDiagram2.findNodeForKey("2");
  var model = myDiagram2.model;

  // all model changes should happen in a transaction
  model.startTransaction("change color");

  // This is the safe way to change model data
  // GoJS will be notified that the data has changed
  // and can update the node in the Diagram
  // and record the change in the UndoManager
  model.setDataProperty(node.data, "color", "#F78181");

  model.commitTransaction("change color");

  // outputs "red" - the model has changed!
  console.log(node.data.color);
}

function replicaMultipleFailure() {
  var node = myDiagram2.findNodeForKey("2");
  var node2 = myDiagram2.findNodeForKey("3");
  var model = myDiagram2.model;

  // all model changes should happen in a transaction
  model.startTransaction("change color");

  // This is the safe way to change model data
  // GoJS will be notified that the data has changed
  // and can update the node in the Diagram
  // and record the change in the UndoManager
  model.setDataProperty(node.data, "color", "#F78181");
  model.setDataProperty(node2.data, "color", "#F78181");

  model.commitTransaction("change color");

  // outputs "red" - the model has changed!
  console.log(node.data.color);
}

function replicaCascadingFailure() {
  var node;
    if(failure2){
       node = myDiagram2.findNodeForKey("3");
    } else {
      node = myDiagram2.findNodeForKey("2");
    }
    
    var model = myDiagram2.model;

    // all model changes should happen in a transaction
    model.startTransaction("change color");

    // This is the safe way to change model data
    // GoJS will be notified that the data has changed
    // and can update the node in the Diagram
    // and record the change in the UndoManager
    model.setDataProperty(node.data, "color", "#F78181");
    //model.setDataProperty(node2.data, "color", "#F78181");

    model.commitTransaction("change color");

    // outputs "red" - the model has changed!
    console.log(node.data.color);
}

function goToUnblockingCheckpointing(){
  stopCluster();
  window.location.href='../html/UnblockingCheckpointing.html';
}

function goToConfinedRecovery(){
  stopCluster();
  window.location.href='../html/ConfinedRecovery.html';
}

function goToReplicaRecovery(){
  stopCluster();
  window.location.href='../html/ReplicaRecovery.html';  
}

    </script>
</body>
</html>

