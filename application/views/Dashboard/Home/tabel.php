<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Selamat Datang <?=ucwords($this->session->userdata('user_nama'))?>

</div>
<div class="row">
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">Penambahan Warga</h3>
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
                    <h3 class="box-title">Jenis Kelamin</h3>
                    <div>
                        <canvas id="chart3" height="150"></canvas>
                    </div>
                </div>
                <div class="white-box">
                    <h3 class="box-title">Pendidikan</h3>
                    <ul class="basic-list">
                        <?php foreach($pendidikan AS $row):?>
                            <li><?=ucwords($row->pendidikan_nama)?> <span class="pull-right label-info label"><?=$row->jumlah?></span></li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="white-box">
                    <h3 class="box-title">Warga Baru Ditambahkan</h3>
                    <ul class="feeds">
                        <?php $i=1;foreach($warga AS $row):?>
                            <?php if($i<=7):?>
                            <li>
                                <div class="bg-info"><i class="<?=$i%2==0 ? 'fa fa-user':'fa fa-user'?> text-white"></i></div> <?=ucwords($row->warga_nama)?> <span class="text-muted"><?=date('d-m-Y',strtotime($row->created_at))?></span>
                            </li>
                            <?php endif;?>
                        <?php $i++;endforeach;?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title">Total Warga</h3>
                    <ul class="list-inline two-part">
                        <li><i class=" ti-user  text-danger"></i></li>
                        <li class="text-right"><span class="counter"><?=count($warga)?></span></li>
                    </ul>
                </div>
                <div class="white-box">
                    <h3 class="box-title">Pendatang</h3>
                    <ul class="list-inline two-part">
                        <li><i class=" ti-user  text-danger"></i></li>
                        <li class="text-right"><span class="counter"><?=count($pendatang)?></span></li>
                    </ul>
                </div>
                <div class="white-box">
                    <h3 class="box-title">Balita</h3>
                    <ul class="list-inline two-part">
                        <li><i class=" ti-user  text-danger"></i></li>
                        <li class="text-right"><span class="counter"><?=count($balita)?></span></li>
                    </ul>
                </div>
                <div class="white-box">
                    <h3 class="box-title">Meninggal</h3>
                    <ul class="list-inline two-part">
                        <li><i class=" ti-user  text-danger"></i></li>
                        <li class="text-right"><span class="counter"><?=count($meninggal)?></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
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
                    label: "Login",
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
        var ctx3 = document.getElementById("chart3").getContext("2d");
        var data3 = [
            {
                value: <?= $jeniskelamin[0]->jumlah ?>,
                color:"#25a6f7",
                highlight: "#25a6f7",
                label: '<?= $jeniskelamin[0]->jeniskelamin ?>'
            },
            {
                value: <?= $jeniskelamin[1]->jumlah ?>,
                color: "#00C292",
                highlight: "#00C292",
                label: '<?= $jeniskelamin[1]->jeniskelamin ?>'
            }
        ];
        var myPieChart = new Chart(ctx3).Pie(data3,{
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
