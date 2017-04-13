var ctx = document.getElementById("ArcheoChart");
var myChart = new myChart(ctx, {
    type :'bar', //graphique en batons
    data : {
        labels: ["ageJulien", "ageDorian"],
        datasets: [{
            labels:'age des stagiaires de l\'AFPA',
            data: [26, 29],
            backgroundColor:[
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],

            borderColor:[
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 12
        }]
    },
    options:{
        scales:{
            yAxes: [{
                ticks:{
                    beginAtZero:true
                }
            }]
        }
    }
})