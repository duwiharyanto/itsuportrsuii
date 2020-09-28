<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Selamat Datang <?=ucwords($this->session->userdata('user_nama'))?>
    <span id="urldashboard" url="<?= base_url($global->url.'grafikdashboard');?>"></span>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">Laporan Troubleshoot</h3>
            <div>
                <canvas id="laporan" height="150"></canvas>
            </div>
        </div>
        <div class="white-box">
            <h3 class="box-title">Laporan Sistem</h3>
            <div>
                <canvas id="laporansistem" height="150"></canvas>
            </div>
        </div>
        <div class="white-box">
            <h3 class="box-title">Akses Sistem</h3>
            <div>
                <canvas id="chart2" height="150"></canvas>
            </div>
        </div>                       
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title">Statistik Laporan Troubleshoot</h3>
                    <div>
                        <canvas id="status" height="150"></canvas>
                    </div>
                </div>
                <div class="white-box">
                    <h3 class="box-title">Statistik Laporan Sistem</h3>
                    <div>
                        <canvas id="statussistem" height="150"></canvas>
                    </div>
                </div>                   
            </div> 
            <div class="col-sm-6">
                <div class="white-box">
                    <div class="box-title">Stats</div>
                    <div>
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                                <h5 class="text-muted vb">Troubleshoot</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-success" id="jumlahtroubelshoot"><?=$jumtroubleshoot?></h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                                <h5 class="text-muted vb">Laporan Sistem</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-success" id="jumlahtroubelshoot"><?=$jumsistem?></h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                                <h5 class="text-muted vb">Notulen</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-success" id="jumlahtroubelshoot"><?=$jumnotulen?></h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>                         
                    </div>
                </div>                
            </div>           
        </div>            
    </div>
</div>
<script type="text/javascript">
    $(".counter").counterUp({
        delay: 100,
        time: 1200
    });
    var url= $('#urldashboard').attr('url');
    //alert(url);
    $.getJSON(url, function(data) {

        //buat array untuk label nama kota/kab
        var labellogin=[];
        var datalogin=[];
         //buat array untuk data Jml Laki-laki
        //console.log(data[0]);
        $(data[0]).each(function(i){         
            labellogin.push(data[0][i].tanggal); 
            datalogin.push(data[0][i].jumlah);
        }); 
        //console.log($data.toSource);   
        var ctx2 = document.getElementById("chart2").getContext("2d");
        var data2 = {
            //labels: ["January", "February", "March", "April", "May",],
            labels: labellogin.reverse(),
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "#03A9F3",
                    strokeColor: "#03A9F3",
                    highlightFill: "#0780b5",
                    highlightStroke: "#0780b5",
                    //data: [10, 30, 80, 61, 26, 75, 40]
                    data: datalogin.reverse()
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
        //////////////////////////////////////////////////////////     
        var labellaporan=[];
        var datalaporan=[];
        $(data[1]).each(function(i){         
            labellaporan.push(data[1][i].tanggal); 
            datalaporan.push(data[1][i].jumlah);
        }); 
        var ctxlaporan = document.getElementById("laporan").getContext("2d");
        var datalap = {
            labels: labellaporan.reverse(),
            datasets: [
                {
                    label: "Laporan",
                    fillColor: "#03A9F3",
                    strokeColor: "#03A9F3",
                    highlightFill: "#0780b5",
                    highlightStroke: "#0780b5",
                    data: datalaporan.reverse()
                },

            ]
        };
        var chart2 = new Chart(ctxlaporan).Bar(datalap, {
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

        //////////////////////////////////////////////////////////     
        var labellaporansistem=[];
        var datalaporansistem=[];
        $(data[3]).each(function(i){         
            labellaporansistem.push(data[3][i].tanggal); 
            datalaporansistem.push(data[3][i].jumlah);
        }); 
        var ctxlaporansistem = document.getElementById("laporansistem").getContext("2d");
        var datalapsistem = {
            labels: labellaporansistem.reverse(),
            datasets: [
                {
                    label: "Laporan",
                    fillColor: "#00AE55",
                    strokeColor: "#00AE55",
                    highlightFill: "#00AE55",
                    highlightStroke: "#00AE55",
                    data: datalaporansistem.reverse()
                },

            ]
        };
        var charttrobelsistem = new Chart(ctxlaporansistem).Bar(datalapsistem, {
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

        ////////////////////////////////////////////////////////
        var labelstatus=[];
        var txt='';
        data[2].forEach(function(row){
            if(row.status=='pending'){
                labelstatus.push({
                    value: row.jumlah,
                    color:"#25a6f7",
                    highlight: "#25a6f7",
                    label: row.status,
                    }
                );                
            }else if(row.status=='close'){
                labelstatus.push({
                    value: row.jumlah,
                    color: "#00C292",
                    highlight: "#00C292",
                    label: row.status
                    }
                ); 
            }else if(row.status=='open'){
                labelstatus.push({
                    value: row.jumlah,
                    color: "#FB9678",
                    highlight: "#FB9678",
                    label: row.status
                    }
                );
            }
        });               
        console.log(labelstatus)    
        var ctxstatus = document.getElementById("status").getContext("2d");
        var datastatus = labelstatus;

        var myPieChart = new Chart(ctxstatus).Pie(datastatus,{
            segmentShowStroke : true,
            segmentStrokeColor : "#fff",
            segmentStrokeWidth : 0,
            animationSteps : 100,
            tooltipCornerRadius: 0,
            animationEasing : "easeOutBounce",
            animateRotate : true,
            animateScale : false,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
            responsive: true
        });
        ////////////////////////////////////////////////////////
        var labelstatussistem=[];
        var txt='';
        data[4].forEach(function(row){
            if(row.status=='pending'){
                labelstatussistem.push({
                    value: row.jumlah,
                    color:"#25a6f7",
                    highlight: "#25a6f7",
                    label: row.status,
                    }
                );                
            }else if(row.status=='close'){
                labelstatussistem.push({
                    value: row.jumlah,
                    color: "#00C292",
                    highlight: "#00C292",
                    label: row.status
                    }
                ); 
            }else if(row.status=='open'){
                labelstatussistem.push({
                    value: row.jumlah,
                    color: "#FB9678",
                    highlight: "#FB9678",
                    label: row.status
                    }
                );
            }
        });               
        //console.log(labelstatus)    
        var ctxstatussistem = document.getElementById("statussistem").getContext("2d");
        var datastatussistem = labelstatussistem;

        var myPieChart = new Chart(ctxstatussistem).Pie(datastatussistem,{
            segmentShowStroke : true,
            segmentStrokeColor : "#fff",
            segmentStrokeWidth : 0,
            animationSteps : 100,
            tooltipCornerRadius: 0,
            animationEasing : "easeOutBounce",
            animateRotate : true,
            animateScale : false,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
            responsive: true
        });              
    });
</script>
<?php include 'action.php'; ?>
