﻿<?php 
/*$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"giantbel");
//user
$select = "select u.id,u.fname from user u limit 3 ";
$user_array = array();
//$user_array1 = array();
if($query1 = mysqli_query($conn,$select))
{
while($user = mysqli_fetch_assoc($query1))
{
  //$user_array[] = $user;
  //print_r($user);
  $select = "select p.id,p.subject from post p where p.user_id =".$user['id']." limit 2";
  if($query2 = mysqli_query($conn,$select))
  {
    $post_array = array();
    while($post = mysqli_fetch_assoc($query2))
    {
      $post_array[] = $post;
    }
    $user_array[] = array_merge($user,array("post_array"=>$post_array));
    mysqli_free_result($query2);
  }
  else
  {
    $user_array[] = array_merge($user);
  }
}
mysqli_free_result($query1);
}
$nodes = '[';
$i = 1;
foreach ($user_array as $user) 
{
  $nodes .='{ id: '.$user['id'].', parentId: null , table: "user" , name: "'.$user['fname'].'", title: "'.$user['id'].'"},';
  if(count($user['post_array']))
  {
    foreach ($user['post_array'] as $post) 
    {
      $nodes .='{ id: '.$post['id'].', parentId: '.$user['id'].', table: "post" , name: "'.$post['subject'].'", title: "'.$user['id'].$post['id'].'"},';
    }
  }
}
$nodes .=']';
//echo $nodes;
//print_r($user_array);*/
$nodes = '[';
$i = 1;
foreach ($units as $unit) 
{
  //$nodes .='{ id: '.$unit['id'].', parentId: " " , table: "units" , name: "'.$unit['unitName'].'", title: "'.$unit['unitName'].'"},';
}
foreach ($divisions as $division) 
{
  $nodes .='{ id: '.$division['id'].', parentId:'.$division['unitId'].' , table: "divisions" , name: "'.$division['divisionName'].'", title: "'.$division['divisionName'].'"},';
}
$nodes .=']';
$nodes1 = '[
                { id: 1, parentId: null, name: "Amber McKenzie", title: "CEO"},
                { id: 2, parentId: 1, name: "Ava Field", title: "Paper goods machine setter"},
                { id: 3, parentId: 1, name: "Evie Johnson", title: "Employer relations representative", mail: "thornton@armyspy.com"}
            ]';
?>
<!DOCTYPE html>
<html>
<head>
    <title>OrgChart | Custom Edit Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="{{ url('js/getorgchart.js') }}"></script>
    <link href="{{ url('css/getorgchart.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style type="text/css">
        html, body {
            margin: 0px;
            padding: 0px;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #people {
            width: 100%;
            height: 100%;
        }

        .btn path {
            fill: #dbdbdb;
        }

        .btn:hover path {
            fill: #ffffff;
        }

        select, input[type=text], input[type=email] {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="orgchart" id="people"></div>

    <div id="dialog" title="Edit node">
        <p>GetOrgChart is more customizable than you think. This is jquery dialog.</p>
        <input type="hidden" id="hdnId" />
        <input type="hidden" id="hdnTable" />
        <div>
            <label for="txtName">name</label><br /><input id="txtName" type="text" />
        </div><br />
        <div>
            <label for="txtTitle">title</label><br /><input id="txtTitle" type="text" />
        </div><br />
        <div>
            <label for="txtMail">mail</label><br /><input id="txtMail" type="email" />
        </div><br />
        <div>
            <label for="txtCar">Car</label><br />
            <select id="txtCar">
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
            </select>
        </div><br />
        <div>
            <label for="txtHasDriverLicense">has driver license</label><br /><input id="txtHasDriverLicense" type="checkbox" />
        </div><br />
        <input id="btnSave" type="button" value="save" />
    </div>
    <script type="text/javascript">
        $("#dialog").dialog({
            modal: true,
            autoOpen: false,            
            show: {
                effect: "explode",
                duration: 200
            },
            hide: {
                effect: "explode",
                duration: 200
            }
        });
        var btnAdd = '<g data-action="add" class="btn" transform="matrix(0.14,0,0,0.14,0,0)"><rect style="opacity:0" x="0" y="0" height="300" width="300" /><path  fill="#686868" d="M149.996,0C67.157,0,0.001,67.158,0.001,149.997c0,82.837,67.156,150,149.995,150s150-67.163,150-150 C299.996,67.156,232.835,0,149.996,0z M149.996,59.147c25.031,0,45.326,20.292,45.326,45.325 c0,25.036-20.292,45.328-45.326,45.328s-45.325-20.292-45.325-45.328C104.671,79.439,124.965,59.147,149.996,59.147z M168.692,212.557h-0.001v16.41v2.028h-18.264h-0.864H83.86c0-44.674,24.302-60.571,40.245-74.843 c7.724,4.15,16.532,6.531,25.892,6.601c9.358-0.07,18.168-2.451,25.887-6.601c7.143,6.393,15.953,13.121,23.511,22.606h-7.275 v10.374v13.051h-13.054h-10.374V212.557z M218.902,228.967v23.425h-16.41v-23.425h-23.428v-16.41h23.428v-23.425H218.9v23.425 h23.423v16.41H218.902z"/></g>';
        var btnEdit = '<g data-action="edit" class="btn" transform="matrix(0.14,0,0,0.14,50,0)"><rect style="opacity:0" x="0" y="0" height="300" width="300" /><path fill="#686868" d="M149.996,0C67.157,0,0.001,67.161,0.001,149.997S67.157,300,149.996,300s150.003-67.163,150.003-150.003 S232.835,0,149.996,0z M221.302,107.945l-14.247,14.247l-29.001-28.999l-11.002,11.002l29.001,29.001l-71.132,71.126 l-28.999-28.996L84.92,186.328l28.999,28.999l-7.088,7.088l-0.135-0.135c-0.786,1.294-2.064,2.238-3.582,2.575l-27.043,6.03 c-0.405,0.091-0.817,0.135-1.224,0.135c-1.476,0-2.91-0.581-3.973-1.647c-1.364-1.359-1.932-3.322-1.512-5.203l6.027-27.035 c0.34-1.517,1.286-2.798,2.578-3.582l-0.137-0.137L192.3,78.941c1.678-1.675,4.404-1.675,6.082,0.005l22.922,22.917 C222.982,103.541,222.982,106.267,221.302,107.945z"/></g>';
        var btnDel = '<g data-action="delete" class="btn" transform="matrix(0.14,0,0,0.14,100,0)"><rect style="opacity:0" x="0" y="0" height="300" width="300" /><path fill="#686868" d="M112.782,205.804c10.644,7.166,23.449,11.355,37.218,11.355c36.837,0,66.808-29.971,66.808-66.808 c0-13.769-4.189-26.574-11.355-37.218L112.782,205.804z"/> <path stroke="#686868" fill="#686868" d="M150,83.542c-36.839,0-66.808,29.969-66.808,66.808c0,15.595,5.384,29.946,14.374,41.326l93.758-93.758 C179.946,88.926,165.595,83.542,150,83.542z"/><path stroke="#686868" fill="#686868" d="M149.997,0C67.158,0,0.003,67.161,0.003,149.997S67.158,300,149.997,300s150-67.163,150-150.003S232.837,0,149.997,0z M150,237.907c-48.28,0-87.557-39.28-87.557-87.557c0-48.28,39.277-87.557,87.557-87.557c48.277,0,87.557,39.277,87.557,87.557 C237.557,198.627,198.277,237.907,150,237.907z"/></g>';

        getOrgChart.themes.monica.box += '<g transform="matrix(1,0,0,1,350,10)">'
                + btnAdd
                + btnEdit
                + btnDel
                + '</g>';
        var orgChart = new getOrgChart(document.getElementById("people"), 
        {
            primaryFields: [ "name", "title", "mail"],
            theme: "monica",
            enableEdit: false,
            enableDetailsView: false,
            updatedEvent: function () 
            {
                init();
            },
            dataSource:<?php echo $nodes; ?>
        });

        function getNodeByClickedBtn(el) 
        {
            while (el.parentNode) 
            {
                el = el.parentNode;
                if (el.getAttribute("data-node-id"))
                    return el;
            }
            return null;
        }

        var init = function () 
        {
            var btns = document.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {

                btns[i].addEventListener("click", function () {                  
                    var nodeElement = getNodeByClickedBtn(this);
                    var action = this.getAttribute("data-action");
                    var id = nodeElement.getAttribute("data-node-id");
                    var node = orgChart.nodes[id];
                    //alert(nodeElement.toSource());
                    //alert(node.toSource());
                    switch (action) 
                    {
                        case "add":
                            orgChart.insertNode(id);
                            break;
                        case "edit":
                            document.getElementById("hdnId").value = node.id;
                            document.getElementById("hdnTable").value = node.data.table ? node.data.table : "";
                            document.getElementById("txtName").value = node.data.name ? node.data.name : "";
                            document.getElementById("txtTitle").value = node.data.title ? node.data.title : "";
                            document.getElementById("txtMail").value = node.data.mail ? node.data.mail : "";
                            document.getElementById("txtCar").value = node.data.car ? node.data.car : "";
                            document.getElementById("txtHasDriverLicense").value = node.data.hasDriverLicense ? node.data.hasDriverLicense : "";
                            $("#dialog").dialog("open");
                            break;
                        case "delete":
                            orgChart.removeNode(id);
                            break;
                    }
                });
            }
        }
        init();
        document.getElementById("btnSave").addEventListener("click", function () 
        {
            var node = orgChart.nodes[document.getElementById("hdnId").value];
            node.data.table = document.getElementById("hdnTable").value;
            node.data.name = document.getElementById("txtName").value;
            node.data.title = document.getElementById("txtTitle").value;
            node.data.mail = document.getElementById("txtMail").value;
            node.data.car = document.getElementById("txtCar").value;
            node.data.hasDriverLicense = document.getElementById("txtHasDriverLicense").value;
            //alert(node.id);
            //alert(node.toSource());
            //alert(node.parent.data);
            $.ajax({
                type: "POST",
                url: "nodes.php",
                data: { nid : node.id , pid : node.pid , ntable : node.data.table , ptable : node.parent.data , name : node.data.name , title : node.data.title , mail : node.data.mail , car : node.data.car , hasDriverLicense : node.data.hasDriverLicense },
                success: function(data)
                {
                } 
            });
            orgChart.updateNode(node.id, node.pid, node.data);
            $("#dialog").dialog("close");
        });

    </script>

</body>
</html>
