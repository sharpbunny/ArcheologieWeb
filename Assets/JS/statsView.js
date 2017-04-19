/* Affichage d'un graphique en bâtons */

// var ctx = document.getElementById("*ArcheoChart").getContext("2d");
// var myChart = new Chart(ctx, {
//     type: 'bar', // bar pour graphique en bâtons
//     data: {
//         labels: ["ageJulien", "ageDorian"], //définition des labels pour chaque barre
//         datasets: [{
//             labels: 'age des stagiaires de l\'AFPA', //Nom du graphique
//             data: [26, 29], //Valeurs pour chaque objet
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)'
//             ],

//             borderColor: [
//                 'rgba(255,99,132,1)',
//                 'rgba(54, 162, 235, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true //L'axe des Y débute à 0
//                 }
//             }]
//         }
//     }
// });

/* Affichage d'un piechart */
var ctx2 = $('#ArcheoPie')
var myPieChart = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: [
            "Red",
            "Blue",
            "Yellow"
        ],
        datasets: [{
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
    }
});

var max = 0;
var steps = 10;
var chartData = {};

function respondCanvas() {
    var c = $('#ArcheoChart');
    //console.dir(c);
    var ctx = c.get(0).getContext("2d");
    //var container = c.parent();

    //var $container = $(container);

    //c.attr('width', $container.width()); //max width
    //c.attr('width', 100);
    //c.attr('height', $container.height()); //max height                   
    //c.attr('height', 100);
    //Call a function to redraw other content (texts, images etc)
    var myChart = new Chart(ctx, {
        type: 'bar', // bar pour graphique en bâtons
        data: {
            labels: chartData.labels, //définition des labels pour chaque barre
            datasets: [{
                label: 'Thèmes',
                //labels: chartData.datasets[0].data, //Nom du graphique
                data: chartData.datasets[0].data, //Valeurs pour chaque objet
                backgroundColor: chartData.datasets[0].fillColor,

                borderColor: chartData.datasets[0].strokeColor,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true //L'axe des Y débute à 0
                    }
                }]
            }
        }
    });

}


var GetChartData = function() {
    $.ajax({
        url: 'stats/jsonth',
        method: 'GET',
        dataType: 'json',
        success: function(d) {
            //console.dir(d);
            chartData = {
                labels: d.label,
                datasets: [{
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    data: d.nb
                }]
            };

            max = Math.max.apply(Math, d.nb);
            steps = 10;
            //console.dir(d);
            //console.dir(chartData);
            respondCanvas();
        }
    });
};

$(document).ready(function() {
    $(window).resize(setTimeout(respondCanvas, 500));

    GetChartData();
});