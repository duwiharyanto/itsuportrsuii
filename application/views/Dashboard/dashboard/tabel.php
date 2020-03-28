<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Informasi
    <ul>
        <li>Login User , menunjukan jumlah user yang login ke sistem selama 7 hari</li>
        <li>Registrasi User , menunjukan jumlah registrasi harian selama 7 hari</li>
        <li>Kegiatan , menunjukan jumlah kegiatan</li>
    </ul>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">Registrasi User</h3>
            <div>
                <canvas id="chart1" height="150"></canvas>
            </div>
        </div> 
        <div class="white-box">
            <h3 class="box-title">Login User</h3>
            <div>
                <canvas id="chart2" height="150"></canvas>
            </div>
        </div>               
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title">Total Kegiatan</h3>
                    <ul class="list-inline two-part">
                        <li><i class=" ti-calendar  text-purple"></i></li>
                        <li class="text-right"><span class="counter"><?=count($jumkegiatan)?></span></li>
                    </ul>
                </div>    
            </div>
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title">Telah Mendaftar</h3>
                    <ul class="list-inline two-part">
                        <li><i class=" ti-user  text-danger"></i></li>
                        <li class="text-right"><span class="counter"><?=count($jumpendaftar)?></span></li>
                    </ul>
                </div>                
            </div>            
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Kegiatan</h3>
                    <ul class="feeds">
                        <?php $i=1;foreach($kegiatan AS $row):?>
                            <li>
                                <div class="bg-info"><i class="<?=$i%2==0 ? 'fa fa-bell-o':'ti-server'?> text-white"></i></div> <?=ucwords($row->kegiatan_nama)?> <span class="text-muted"><?=date('d-m-Y',strtotime($row->kegiatan_tanggal))?></span>
                            </li>                    
                        <?php $i++;endforeach;?>
                    </ul>
                </div>
                <div class="white-box">
                    <h3 class="box-title">Pendaftar terbaru</h3>
                    <ul class="feeds">
                        <?php $i=1;foreach($jumpendaftar AS $row):?>
                            <?php if($i<=7):?>
                            <li>
                                <div class="bg-info"><i class="<?=$i%2==0 ? 'fa fa-bell-o':'ti-server'?> text-white"></i></div> <?=ucwords($row->reg_nama)?> <span class="text-muted"><?=date('d-m-Y',strtotime($row->created_at))?></span>
                            </li>
                            <?php endif;?>                    
                        <?php $i++;endforeach;?>
                    </ul>
                </div>                                 
            </div>
        </div>       
    </div>        
</div>
<script type="text/javascript">
    // $('#example23').DataTable({
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // });
    var sparklineLogin = function() { 
      $("#sparkline1dash").sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40, 45, 56, 7, 10], {
        type: 'line',
        width: '100%',
        height: '70',
        lineColor: '#fff',
        fillColor: 'transparent',
        spotColor: '#fff',
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined
      }); 
      $('#sparkline2dash').sparkline([10, 12, 9, 6, 10, 9, 11, 9, 10, 12, 9, 11, 9, 10, 12,], {
        type: 'bar',
        height: '70',
        barWidth: '5',
        resize: true,
        barSpacing: '10',
        barColor: '#fff'
      });
      $("#sparkline3dash").sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40, 45, 56, 7, 10], {
        type: 'line',
        width: '100%',
        height: '70',
        lineColor: '#fff',
        fillColor: 'transparent',
        spotColor: '#fff',
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined
      });
      $('#sparkline4dash').sparkline([10, 12, 9, 6, 10, 9, 11, 9, 10, 12, 9, 11, 9, 10, 12,], {
        type: 'bar',
        height: '70',
        barWidth: '5',
        resize: true,
        barSpacing: '10',
        barColor: '#fff'
      });
      $('#sales1').sparkline([20, 40, 30], {
        type: 'pie',
        height: '100',
        resize: true,
        sliceColors: ['#808f8f', '#fecd36', '#f1f2f7']
      });
      $('#sales2').sparkline([6, 10, 9, 11, 9, 10, 12], {
        type: 'bar',
        height: '154',
        barWidth: '4',
        resize: true,
        barSpacing: '10',
        barColor: '#25a6f7'
      });
      $("#sparkline8").sparkline([2,4,4,6,8,5,6,4,8,6,6,2 ], {
        type: 'line',
        width: '100%',
        height: '50',
        lineColor: '#99d683',
        fillColor: '#99d683',
        maxSpotColor: '#99d683',
        highlightLineColor: 'rgba(0, 0, 0, 0.2)',
        highlightSpotColor: '#99d683'
      });
      $("#sparkline9").sparkline([0,2,8,6,8,5,6,4,8,6,6,2 ], {
        type: 'line',
        width: '100%',
        height: '50',
        lineColor: '#13dafe',
        fillColor: '#13dafe',
        minSpotColor:'#13dafe',
        maxSpotColor: '#13dafe',
        highlightLineColor: 'rgba(0, 0, 0, 0.2)',
        highlightSpotColor: '#13dafe'
      });
      $("#sparkline10").sparkline([2,4,4,6,8,5,6,4,8,6,6,2], {
        type: 'line',
        width: '100%',
        height: '50',
        lineColor: '#ffdb4a',
        fillColor: '#ffdb4a',
        maxSpotColor: '#ffdb4a',
        highlightLineColor: 'rgba(0, 0, 0, 0.2)',
        highlightSpotColor: '#ffdb4a'
      });
    }
    var sparkResize;

    $(window).resize(function(e) {
      clearTimeout(sparkResize);
      sparkResize = setTimeout(sparklineLogin, 100);
    });
    sparklineLogin();  
    var icons = new Skycons({"color": "#2b2b2b"}),
              list  = [
                "clear-day", "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
              ],
              i;
    for(i = list.length; i--; ) {
        var weatherType = list[i],
            elements = document.getElementsByClassName( weatherType );
        for (e = elements.length; e--;){
            icons.set( elements[e], weatherType );
        }
    } 
    icons.play();   
    $(".counter").counterUp({
        delay: 100,
        time: 1200
    }); 
    $( document ).ready(function() {
        
        var ctx1 = document.getElementById("chart1").getContext("2d");
        var data1 = {
            labels: <?= $grafikregistrasi['tglregharian'] ?>,
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "#00C292",
                    strokeColor: "#00C292",
                    pointColor: "rgba(152,235,239,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(152,235,239,1)",
                    data: <?= $grafikregistrasi['regharian'] ?>
                }
                
            ]
        };
        
        var chart1 = new Chart(ctx1).Line(data1, {
            scaleShowGridLines : true,
            scaleGridLineColor : "rgba(0,0,0,.005)",
            scaleGridLineWidth : 0,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve : true,
            bezierCurveTension : 0.4,
            pointDot : true,
            pointDotRadius : 4,
            pointDotStrokeWidth : 1,
            pointHitDetectionRadius : 2,
            datasetStroke : true,
            tooltipCornerRadius: 2,
            datasetStrokeWidth : 2,
            datasetFill : true,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            responsive: true
        });
        
        var ctx2 = document.getElementById("chart2").getContext("2d");
        var data2 = {
            //labels: ["January", "February", "March", "April", "May",],
            labels: <?= $grafikloginuser['tglloginharian'] ?>,
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "#AAEDF1",
                    strokeColor: "#AAEDF1",
                    highlightFill: "rgba(252,201,186,1)",
                    highlightStroke: "rgba(252,201,186,1)",
                    //data: [10, 30, 80, 61, 26, 75, 40]
                    data: <?= $grafikloginuser['loginharian'] ?>
                },

            ]
        };
        
        var chart2 = new Chart(ctx2).Bar(data2, {
            scaleBeginAtZero : true,
            scaleShowGridLines : true,
            scaleGridLineColor : "rgba(0,0,0,.005)",
            scaleGridLineWidth : 0,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            barShowStroke : true,
            barStrokeWidth : 0,
            tooltipCornerRadius: 2,
            barDatasetSpacing : 3,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            responsive: true
        });
         
    });             
</script>
<?php include 'action.php'; ?>
