<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Selamat Datang <?=ucwords($this->session->userdata('user_nama'))?>
    <span id="urldashboard" url="<?= base_url($global->url.'grafikdashboard');?>"></span>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">Surat Keterangan Sakit</h3>
            <div>
                <canvas id="chart1" height="150"></canvas>
            </div>
        </div>
        <div class="white-box">
            <h3 class="box-title">Surat Keterangan Sehat</h3>
            <div>
                <canvas id="suratkterangansehat" height="150"></canvas>
            </div>
        </div>
        <div class="white-box">
            <h3 class="box-title">Surat Keterangan Hamil</h3>
            <div>
                <canvas id="suratkteranganhamil" height="150"></canvas>
            </div>
        </div>        
    </div>
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">Surat Keterangan Lahir</h3>
            <div>
                <canvas id="suratkteranganlahir" height="150"></canvas>
            </div>
        </div>                
        <div class="white-box">
            <h3 class="box-title">Akses Sistem</h3>
            <div>
                <canvas id="chart2" height="150"></canvas>
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
                    fillColor: "#AAEDF1",
                    strokeColor: "#AAEDF1",
                    highlightFill: "rgba(252,201,186,1)",
                    highlightStroke: "rgba(252,201,186,1)",
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

        //SURAT KETERANGAN SAKIT
        var labelsurat=[];
        var datasurat=[];
        $(data[1]).each(function(i){         
            labelsurat.push(data[1][i].tanggal); 
            datasurat.push(data[1][i].jumlah);
        });
        var ctx1 = document.getElementById("chart1").getContext("2d");
        var data1 = {
            labels: labelsurat.reverse(),
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "#00C292",
                    strokeColor: "#00C292",
                    pointColor: "rgba(152,235,239,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(152,235,239,1)",
                    data:datasurat.reverse()
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

        //SURAT KETERNGAN SEHAT
        var labelsuratsehat=[]; 
        var datasuratsehat=[]
        $(data[2]).each(function(i){         
            labelsuratsehat.push(data[2][i].tanggal); 
            datasuratsehat.push(data[2][i].jumlah);
        }); 
        var ctxsuratsehat = document.getElementById("suratkterangansehat").getContext("2d");
        var datasrtsht = {
            labels: labelsuratsehat.reverse(),
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "#00C292",
                    strokeColor: "#00C292",
                    pointColor: "rgba(152,235,239,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(152,235,239,1)",
                    data:datasuratsehat.reverse()
                }               
            ]
        };
        var chartsuratsehat = new Chart(ctxsuratsehat).Line(datasrtsht, {
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

        //SURAT KETERNGAN HAMIL
        var labelsurathamil=[]; 
        var datasurathamil=[]
        $(data[3]).each(function(i){         
            labelsurathamil.push(data[3][i].tanggal); 
            datasurathamil.push(data[3][i].jumlah);
        }); 
        var ctxsurathamil = document.getElementById("suratkteranganhamil").getContext("2d");
        var datasrthamil = {
            labels: labelsurathamil.reverse(),
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "#00C292",
                    strokeColor: "#00C292",
                    pointColor: "rgba(152,235,239,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(152,235,239,1)",
                    data:datasurathamil.reverse()
                }               

            ]
        };
        var chartsurahamil = new Chart(ctxsurathamil).Line(datasrthamil, {
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

        //SURAT KETERNGAN LAHIR
        var labelsuratlahir=[]; 
        var datasuratlahir=[]
        $(data[4]).each(function(i){         
            labelsuratlahir.push(data[4][i].tanggal); 
            datasuratlahir.push(data[4][i].jumlah);
        }); 
        var ctxsuratlahir = document.getElementById("suratkteranganlahir").getContext("2d");
        var datasrtlahir = {
            labels: labelsuratlahir.reverse(),
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "#00C292",
                    strokeColor: "#00C292",
                    pointColor: "rgba(152,235,239,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(152,235,239,1)",
                    data:datasuratlahir.reverse()
                }               

            ]
        };
        var chartsuratlahir = new Chart(ctxsuratlahir).Line(datasrtlahir, {
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
    });
</script>
<?php include 'action.php'; ?>
