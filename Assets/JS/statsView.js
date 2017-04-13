/* Affichage d'un graphique en bâtons */

var ctx = document.getElementById("ArcheoChart").getContext("2d");
var myChart = new Chart(ctx, {
    type: 'bar', // bar pour graphique en bâtons
    data: {
        labels: ["ageJulien", "ageDorian"], //définition des labels pour chaque barre
        datasets: [{
            labels: 'age des stagiaires de l\'AFPA', //Nom du graphique
            data: [26, 29], //Valeurs pour chaque objet
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],

            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
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

/* Affichage d'un piechart */
var ctx2 = document.getElementById("ArcheoPie")
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
options: options