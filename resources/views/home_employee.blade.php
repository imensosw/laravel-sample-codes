@extends('layouts.main')
@section('content')

<div class="right_col" role="main">
  <div class="width_25 pos_fix prof_area">
    <div class="container_fluid">
      <div class="circle profileimg">
        <img src="images/img.jpg" alt="proline name">
      </div>
      <div class="text-center m_b30">
        <div class="employee_nm">Himansu Sahu</div>
        <div class="">Consumer Administrative Coordinator</div>
      </div>
      <div class="table-responsive m_b30">
        <table class="table">
          <tr>
            <th>Employee Id</th>
            <td>44772</td>
          </tr>
          <tr>
            <th>Business Unit</th>
            <td>Consumer</td>
          </tr>
          <tr>
            <th>Highest Qualification</th>
            <td>Bachelors : Business Administration</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>nm@domain.com</td>
          </tr>
          <tr>
            <th>Phone</th>
            <td>+91-12345 67890</td>
          </tr>
        </table>
      </div>
      <div class="text-center container-fluid">
        <!-- <a href="#" class="btn btn-block bg-red">Profile</a> -->
      </div>
    </div>
  </div>
  <div class="width_75">
    <div class="m_50">
      <div>
        <h1 class="main_heading m_t10">
          <div class="circle main_heading_i"><img src="images/icons/home.svg" class="svg" alt="ul icon"></div> Home
        </h1>
        <hr class="m_b30" />
      </div>    
      <div>
        <div class="row">
          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                My competency <!-- <div class="pull-right"><a href="employee_from.php" title="Edit" class="s_btn_1"> <img src="images/icons/edit_1.svg" align="edit" class="svg" /> </a> </div> -->
              </div>
              <div class="panel-body p_t0">
                <div class="row">
                  <div class="table-responsive">
                    <table class="table border_t0">
                      <tr>
                        <td valign="middle">Technical competencies-Audits & Inspections </td>
                        <td width="50" align="right" valign="middle">
                            <!-- <a href="#" title="add" class="s_btn bg-amber"> <img src="images/icons/add.svg" align="add" class="svg" /> </a>
                              <span>80%</span>   -->        
                              <a href="employee_from.php#techinical_competencies" title="Edit" class="s_btn_"> <img src="images/icons/edit_1.svg" align="edit" class="svg" /> </a>
                              
                            </td>
                          </tr>
                          <tr>
                            <td valign="middle">Critical Behaviors of Success (CBS)</td>
                            <td align="right" valign="middle">  
                                                    <!-- <a href="#" title="add" class="s_btn bg-amber"> <img src="images/icons/add.svg" align="add" class="svg" /> </a>
                                                      <span>80%</span>     -->                
                                                      <a href="employee_from.php#behavioral_competency" title="Edit" class="s_btn_"> <img src="images/icons/edit_1.svg" align="edit" class="svg" /> </a>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td valign="middle">Other</td>
                                                    <td align="right" valign="middle">    
                                                    <!-- <a href="#" title="add" class="s_btn bg-amber"> <img src="images/icons/add.svg" align="add" class="svg" /> </a>
                                                      <span>80%</span>     -->                
                                                      <a href="employee_from.php#other_details" title="Edit" class="s_btn_"> <img src="images/icons/edit_1.svg" align="edit" class="svg" /> </a>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="panel panel-default">
                                          <div class="panel-heading">
                                            Overall Performance
                                          </div>
                                          <div class="panel-body"> 
                                            <div class="container_map">
                                              <div id="container_map"></div>
                                            </div>    
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="panel panel-default">
                                          <div class="panel-heading">
                                            Competency Validation Request
                                          </div>
                                          <div class="panel-body p_t0">
                                            <div class="table-responsive row">
                                              <table class="table border_t0">
                                                <tr>
                                                  <th width="20%">Employee id</th>
                                                  <th width="20%">Employee name</th>
                                                  <th width="20%">Division</th>
                                                  <th width="20%">Job Title</th>
                                                  <th width="20%" class="text-center">Action</th>
                                                </tr>
                                                <tr>
                                                  <td valign="middle">51355</td>
                                                  <td valign="middle">Anshu Rani</td>
                                                  <td valign="middle">Audits and Inspections (CRS)</td>
                                                  <td valign="middle">Consumer Administrative Coordinator</td>
                                                  <td valign="middle" class="text-center">  
                                                    <!-- <a href="employee_from.php" title="Edit" class="s_btn bg-amber"> <img src="images/icons/tag.svg" align="edit" class="svg" /> </a> -->
                                                    <a href="employee_from_manage_ar.php" title="verified" class="s_btn bg-gray"> <!-- <img src="images/icons/check.svg" align="edit" class="svg" /> --> Verify </a>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td valign="middle">46117</td>
                                                  <td valign="middle">Rafiq.G.Shirahatti</td>
                                                  <td valign="middle">Audits and Inspections (CRS)</td>
                                                  <td valign="middle">Consumer Inspector</td>
                                                  <td valign="middle" class="text-center">  
                                                    <!-- <a href="employee_from.php" title="Edit" class="s_btn bg-amber"> <img src="images/icons/tag.svg" align="edit" class="svg" /> </a> -->
                                                    <a href="employee_from_manage_rgs.php" title="verified" class="s_btn bg-gray"> <!-- <img src="images/icons/check.svg" align="edit" class="svg" /> --> Verify </a>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td valign="middle">48669</td>
                                                  <td valign="middle">Arvind Patil</td>
                                                  <td valign="middle">Audits and Inspections (CRS)</td>
                                                  <td valign="middle">Regional Field Operations Manager A&I</td>
                                                  <td valign="middle" class="text-center">  
                                                    <!-- <a href="employee_from.php" title="Edit" class="s_btn bg-amber"> <img src="images/icons/tag.svg" align="edit" class="svg" /> </a> -->
                                                    Verified
                                                  </td>
                                                </tr>
                                                
                                              </table>
                  <!-- <div class="text-right col-md-12">
                  <a href="#" class="txt-link">View All Details</a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<script type="text/javascript">
  Highcharts.chart('container_map', {

    chart: {
      type: 'solidgauge',
      marginTop: 50
    },

    title: {
      text: 'Activity',
      style: {
        fontSize: '24px'
      }
    },

    tooltip: {
      borderWidth: 0,
      backgroundColor: 'none',
      shadow: false,
      style: {
        fontSize: '16px'
      },
      pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.y}%</span>',
      positioner: function (labelWidth) {
        return {
          x: 200 - labelWidth / 2,
          y: 180
        };
      }
    },

    pane: {
      startAngle: 0,
      endAngle: 360,
        background: [{ // Track for Move
          outerRadius: '112%',
          innerRadius: '88%',
          backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0])
          .setOpacity(0.3)
          .get(),
          borderWidth: 0
        }, { // Track for Exercise
          outerRadius: '87%',
          innerRadius: '63%',
          backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[1])
          .setOpacity(0.3)
          .get(),
          borderWidth: 0
        }, { // Track for Stand
          outerRadius: '62%',
          innerRadius: '38%',
          backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[2])
          .setOpacity(0.3)
          .get(),
          borderWidth: 0
        }]
      },

      yAxis: {
        min: 0,
        max: 100,
        lineWidth: 0,
        tickPositions: []
      },

      plotOptions: {
        solidgauge: {
          dataLabels: {
            enabled: false
          },
          linecap: 'round',
          stickyTracking: false,
          rounded: true
        }
      },

      series: [{
        name: 'Move',
        data: [{
          color: Highcharts.getOptions().colors[0],
          radius: '112%',
          innerRadius: '88%',
          y: 80
        }]
      }, {
        name: 'Exercise',
        data: [{
          color: Highcharts.getOptions().colors[1],
          radius: '87%',
          innerRadius: '63%',
          y: 65
        }]
      }, {
        name: 'Stand',
        data: [{
          color: Highcharts.getOptions().colors[2],
          radius: '62%',
          innerRadius: '38%',
          y: 50
        }]
      }]
    },

/**
 * In the chart load callback, add icons on top of the circular shapes
 */
 function callback() {

    // Move icon
    this.renderer.path(['M', -8, 0, 'L', 8, 0, 'M', 0, -8, 'L', 8, 0, 0, 8])
    .attr({
      'stroke': '#303030',
      'stroke-linecap': 'round',
      'stroke-linejoin': 'round',
      'stroke-width': 2,
      'zIndex': 10
    })
    .translate(190, 26)
    .add(this.series[2].group);

    // Exercise icon
    this.renderer.path(['M', -8, 0, 'L', 8, 0, 'M', 0, -8, 'L', 8, 0, 0, 8,
      'M', 8, -8, 'L', 16, 0, 8, 8])
    .attr({
      'stroke': '#ffffff',
      'stroke-linecap': 'round',
      'stroke-linejoin': 'round',
      'stroke-width': 2,
      'zIndex': 10
    })
    .translate(190, 61)
    .add(this.series[2].group);

    // Stand icon
    this.renderer.path(['M', 0, 8, 'L', 0, -8, 'M', -8, 0, 'L', 0, -8, 8, 0])
    .attr({
      'stroke': '#303030',
      'stroke-linecap': 'round',
      'stroke-linejoin': 'round',
      'stroke-width': 2,
      'zIndex': 10
    })
    .translate(190, 96)
    .add(this.series[2].group);
  });

</script>
@endsection
