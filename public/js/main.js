/**
 * Created by Auxano on 10/09/2016.
 */
$(function(){

    $('.article-container').hover(function () {
        $(this).find('a').css({
            borderBottom: '1px solid #ccc',
            color: '#ffa086'
        });
    }, function() {
        $(this).find('a').css({
            borderBottom: '1px solid #333',
            color: '#fff'
        });
    })
//chartjs line
    var cntx = document.getElementById("lineChart").getContext("2d");
    var mydata = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "Page Visits",
                fill: false,
                pointBorderColor: "rgba(75,192,192,1)",
                pointHitRadius: 20,
                data: [50, 220, 180, 130, 70, 50, 40, 60, 90, 100],
                spanGaps: true
            },
            {
                label: "Page Views",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "#FF6384",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,


                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 10,
                pointHitRadius: 10,
                data: [9, 90, 80, 80, 60, 60, 140, 120, 120, 190],
                spanGaps: false
            }
        ]
    };

    var lineChart = new Chart(cntx, {
        type: 'line',
        data: mydata ,
        options: {
            scales: {
                yAxes: [{
                    stacked: true
                }]
            },
            responsive: true,
            legend: {
                position: 'top'
            },
            title: {
                display: true,
                text: 'PAGE VIEWS & VISITS'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }


    });
    //chartjs doughnut
    var ctx = document.getElementById("myDoughnutChart").getContext("2d");
    var data = {
        labels: [
            "Red",
            "Blue",
            "Yellow"
        ],
        datasets: [
            {
                data: [300, 50, 100],
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ],
                hoverBackgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ]
            }]
    };
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            legend: {
                position: 'top'
            },
            title: {
                display: true,
                text: 'NETWORK REFERRALS'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }

    });

});