@extends('layouts.main')
@section('content')
<style type="text/css">
  .nav_menu {left: 70px !important;}
</style>
<div class="right_col" role="main" style="margin-left: 70px !important; padding: 0 !important;">
  <div class="container-fluid gutter">
   
    <div class="row">
      <h4 class="chart-heading">Organization Chart</h4>
    <div class="orgchart" id="people"></div>
    </div>
    <div id="dialog" title="Add New">
        
        <input type="hidden" id="hdnId" />
        <div>
            <label for="txtName">Name</label><br /><input id="txtName" placeholder="Name" class="form-control" type="text" />
        </div><br />
        <div id="grade_div">
            <label for="jobRoleGradeId">Grade</label><br />
            {!! Form::select('jobRoleGradeId', $jobRoleGrade ,NULL, array('required'=>true, 'class' => 'form-control','id'=>'jobRoleGradeId')) !!}

        </div>
        <div style="text-align: right;">
        <input id="btnSave" class="btn-curvy bg-red" type="button" value="Save" />
        </div>
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

        var btnAdd = '<g data-action="add" class="btn" transform="matrix(0.14,0,0,0.14,0,0)"><rect style="opacity:0" x="0" y="0" height="300" width="300" /><path  fill="#fff" d="M149.996,0C67.157,0,0.001,67.158,0.001,149.997c0,82.837,67.156,150,149.995,150s150-67.163,150-150 C299.996,67.156,232.835,0,149.996,0z M149.996,59.147c25.031,0,45.326,20.292,45.326,45.325 c0,25.036-20.292,45.328-45.326,45.328s-45.325-20.292-45.325-45.328C104.671,79.439,124.965,59.147,149.996,59.147z M168.692,212.557h-0.001v16.41v2.028h-18.264h-0.864H83.86c0-44.674,24.302-60.571,40.245-74.843 c7.724,4.15,16.532,6.531,25.892,6.601c9.358-0.07,18.168-2.451,25.887-6.601c7.143,6.393,15.953,13.121,23.511,22.606h-7.275 v10.374v13.051h-13.054h-10.374V212.557z M218.902,228.967v23.425h-16.41v-23.425h-23.428v-16.41h23.428v-23.425H218.9v23.425 h23.423v16.41H218.902z"/></g>';
        var btnEdit = '<g data-action="edit" class="btn" transform="matrix(0.14,0,0,0.14,50,0)"><rect style="opacity:0" x="0" y="0" height="300" width="300" /><path fill="#fff" d="M149.996,0C67.157,0,0.001,67.161,0.001,149.997S67.157,300,149.996,300s150.003-67.163,150.003-150.003 S232.835,0,149.996,0z M221.302,107.945l-14.247,14.247l-29.001-28.999l-11.002,11.002l29.001,29.001l-71.132,71.126 l-28.999-28.996L84.92,186.328l28.999,28.999l-7.088,7.088l-0.135-0.135c-0.786,1.294-2.064,2.238-3.582,2.575l-27.043,6.03 c-0.405,0.091-0.817,0.135-1.224,0.135c-1.476,0-2.91-0.581-3.973-1.647c-1.364-1.359-1.932-3.322-1.512-5.203l6.027-27.035 c0.34-1.517,1.286-2.798,2.578-3.582l-0.137-0.137L192.3,78.941c1.678-1.675,4.404-1.675,6.082,0.005l22.922,22.917 C222.982,103.541,222.982,106.267,221.302,107.945z"/></g>';
        var btnDel = '<g data-action="delete" class="btn" transform="matrix(0.14,0,0,0.14,100,0)"><rect style="opacity:0" x="0" y="0" height="300" width="300" /><path fill="#fff" d="M112.782,205.804c10.644,7.166,23.449,11.355,37.218,11.355c36.837,0,66.808-29.971,66.808-66.808 c0-13.769-4.189-26.574-11.355-37.218L112.782,205.804z"/> <path stroke="#686868" fill="#fff" d="M150,83.542c-36.839,0-66.808,29.969-66.808,66.808c0,15.595,5.384,29.946,14.374,41.326l93.758-93.758 C179.946,88.926,165.595,83.542,150,83.542z"/><path stroke="#686868" fill="#fff" d="M149.997,0C67.158,0,0.003,67.161,0.003,149.997S67.158,300,149.997,300s150-67.163,150-150.003S232.837,0,149.997,0z M150,237.907c-48.28,0-87.557-39.28-87.557-87.557c0-48.28,39.277-87.557,87.557-87.557c48.277,0,87.557,39.277,87.557,87.557 C237.557,198.627,198.277,237.907,150,237.907z"/></g>';

        getOrgChart.themes.monica.box += '<g transform="matrix(1,0,0,1,350,10)">'
                //+ btnAdd
                //+ btnEdit
                //+ btnDel
                + '</g>';
        var orgChart = new getOrgChart(document.getElementById("people"), 
        {
            scale:.5,
            primaryFields: [  "title" ,"name" ],
            theme: "monica",
            enableEdit: false,
            enableDetailsView: false,
            expandToLevel: 5,
            insertNodeEvent: insertNodeEvent,
            updatedEvent: function () 
            {
                init();
            },
            dataSource:<?php echo $nodes; ?>
        });
       // orgChart.zoom(3, true);

        function insertNodeEvent(sender, args) 
        {
        }
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
                    switch (action) 
                    {
                        case "add":
                            var tableName = getChieldTable(node.data.tableName);
                            if(tableName == 'null' || node.data.primaryId == undefined )
                            {
                                return false ;
                            } 
                            orgChart.insertNode(id,{tableName:tableName,name:'New',id:'',foreignId:node.data.primaryId,title:getTitle(tableName)});
                            break;
                        case "edit":
                            document.getElementById("hdnId").value = node.id;
                            document.getElementById("txtName").value = node.data.name ? node.data.name : "";
                            $('#dialog').dialog('option', 'title', node.data.title);
                            $("#dialog").dialog("open");
                            break;
                        case "delete":
                            $.ajax({
                                type: "POST",
                                url: "{{ url('') }}/"+"nodeDelete",
                                data: { "_token": "{{ csrf_token() }}" , primaryId : node.data.primaryId , tableName : node.data.tableName },
                                dataType: "json",
                                success: function(data)
                                {
                                  if(data.status=="success")
                                  {
                                    orgChart.removeNode(node.id);
                                    showMessage(data.message, 'success',10000);
                                  }
                                  else
                                  {
                                    showMessage(data.message, 'danger',5000000);
                                  }
                                } 
                            });   
                            break;
                    }
                    if( node.data.tableName == 'job_roles' )
                    {
                        $("#grade_div").css('display','block') ;
                    }
                    else
                    {
                        $("#grade_div").css('display','none') ;
                    }
                });
            }
        }
        init();
        
        function getChieldTable(table)
        {
            if(table == 'units'){
                return 'divisions' ;
            }
            else if(table == 'divisions'){
                return 'departments' ;
            }
            else if(table == 'departments'){
                return 'sub_departments' ;
            }
            else if(table == 'sub_departments'){
                return 'job_roles' ;
            }
            else if(table == 'job_roles'){
                return 'null' ;
            }
        }
        function getTitle(table) 
        {
            if(table == 'units'){
                return 'Unit' ;
            }
            else if(table == 'divisions'){
                return 'Division' ;
            }
            else if(table == 'departments'){
                return 'Department' ;
            }
            else if(table == 'sub_departments'){
                return 'Sub Department' ;
            }
            else if(table == 'job_roles'){
                return 'Role' ;
            }
        }

        document.getElementById("btnSave").addEventListener("click", function () 
        {
            var node = orgChart.nodes[document.getElementById("hdnId").value];
            node.data.name = document.getElementById("txtName").value;
            var id = node.id ;
            var pid = node.pid ;
            var primaryId = '';
            if( node.data.primaryId > 0 )
            {
                primaryId = node.data.primaryId;
            }
            
            $.ajax({
                type: "POST",
                url: "{{ url('') }}/"+"nodeUpdate",
                data: { "_token": "{{ csrf_token() }}"  , 
                    primaryId : primaryId , foreignId : node.data.foreignId ,
                    tableName : node.data.tableName , name : node.data.name ,
                    jobRoleGradeId : $("#jobRoleGradeId").val()
                },
                dataType: "json",
                success: function(data)
                {
                  if(data.status=="success")
                  { 
                    orgChart.updateNode(id, pid,  { primaryId:data.primaryId , foreignId:node.data.foreignId , tableName:node.data.tableName ,  name:node.data.name , title: node.data.title  } );
                    showMessage( data.message, 'success',10000);
                    $(".ui-dialog-titlebar-close").trigger('click') ;
                  }
                } 
            });
        });

        setTimeout(function() {
          $('.get-level-1 , .get-level-2 , .get-level-3 , .get-level-4 , .get-level-5 ').each(function() {
            var svg = $(this);
            var text = svg.find('text');
            var bbox = text.get(0).getBBox();
            svg.get(0).setAttribute('viewBox',[bbox.x, bbox.y, bbox.width, bbox.height].join(' '));
          });
        }, 100);
       $(".get-text").attr("text-anchor","start").attr("x","10").attr("width","100%");  
    </script>
  </div>
</div>
@endsection