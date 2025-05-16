

// line chart
var islinechart = document.getElementById('lineChart');

islinechart.setAttribute("width", islinechart.parentElement.offsetWidth);

var lineChart = new Chart(islinechart, {
    type: 'line',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
        datasets: [
            {
                label: "Sales Analytics",
                fill: true,
                lineTension: 0.5,
                backgroundColor: "rgba(85, 110, 230, 0.2)",
                borderColor: "#5664d2",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "#5664d2",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "#5664d2",
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [65, 59, 80, 81, 56, 55, 40, 55, 30, 80]
            },
            {
                label: "Monthly Earnings",
                fill: true,
                lineTension: 0.5,
                backgroundColor: "rgba(252, 185, 44, 0.2)",
                borderColor: "#fcb92c",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "#fcb92c",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "#fcb92c",
                pointHoverBorderColor: "#eef0f2",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [80, 23, 56, 65, 23, 35, 85, 25, 92, 36]
            }
        ]
    },
    Option: {
        responsive: true,
        // title:{
        //     display:true,
        //     text:'Chart.js Line Chart'
        // },
        maintainAspectRatio: false,
        tooltips: {
            mode: 'index',
            intersect: false
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                // scaleLabel: {
                //     display: true,
                //     labelString: 'Month'
                // },
                
                gridLines: {
                    color: "rgba(0,0,0,0.1)"
                }
            }],
            yAxes: [{
                gridLines: {
                    color: "rgba(255,255,255,0.05)",
                    fontColor: '#fff',
                },
                ticks: {
                    max: 100,
                    min: -100,
                    stepSize: 20
                }
            }]
        }
    }

});

//bar
var isbarchart = document.getElementById('bar');
isbarchart.setAttribute("width", isbarchart.parentElement.offsetWidth);
var barChart = new Chart(isbarchart, {
    type: 'bar',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "Sales Analytics",
                backgroundColor: "rgba(28, 187, 140, 0.8)",
                borderColor: "rgba(28, 187, 140, 0.8)",
                borderWidth: 1,
                categoryPercentage: 0.4,
                hoverBackgroundColor: "rgba(28, 187, 140, 0.9)",
                hoverBorderColor: "rgba(28, 187, 140, 0.9)",
                data: [65, 59, 81, 45, 56, 80, 50,20]
            }
        ]
    },
});

// pie chart
var ispiechart = document.getElementById('pie');

var pieChart = new Chart(ispiechart, {
    type: 'pie',
    data: {
        labels: [
            "Desktops",
            "Tablets",
        ],
        datasets: [
            {
                data: [300, 180],
                backgroundColor: [
                    "#45cb85",
                    "#ebeff2"
                ],
                hoverBackgroundColor: [
                    "#45cb85",
                    "#ebeff2"
                ],
                hoverBorderColor: "#fff"
            }]
    },
});

// donut
var isdoughnutchart = document.getElementById('doughnut');

var lineChart = new Chart(isdoughnutchart, {
    type: 'doughnut',
    data: {
        labels: [
            "Desktops",
            "Tablets",
        ],
        datasets: [
            {
                data: [300, 210],
                backgroundColor: [
                    "#3b5de7",
                    "#ebeff2"
                ],
                hoverBackgroundColor: [
                    "#3b5de7",
                    "#ebeff2"
                ],
                hoverBorderColor: "#fff"
            }]
    },
});


// polarArea chart
var ispolarAreachart = document.getElementById('polarArea');
var lineChart = new Chart(ispolarAreachart, {
    type: 'polarArea',
    data: {
        datasets: [{
            data: [
                11,
                16,
                7,
                18
            ],
            backgroundColor: [
                "#fcb92c",
                "#1cbb8c",
                "#ff3d60",
                "#5664d2"
            ],
            label: 'My dataset', // for legend
            hoverBorderColor: "#fff"
        }],
        labels: [
            "Series 1",
            "Series 2",
            "Series 3",
            "Series 4"
        ],
    },
});

// radar chart
var isradarchart = document.getElementById('radar');
var lineChart = new Chart(isradarchart, {
    type: 'radar',
    data: {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [
            {
                label: "Desktops",
                backgroundColor: "rgba(252, 185, 44, 0.2)",
                borderColor: "#fcb92c",
                pointBackgroundColor: "#fcb92c",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "#fcb92c",
                data: [65, 59, 90, 81, 56, 55, 40]
            },
            {
                label: "Tablets",
                backgroundColor: "rgba(84, 56, 220, 0.2)",
                borderColor: "#5664d2",
                pointBackgroundColor: "#5664d2",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "#5664d2",
                data: [28, 48, 40, 19, 96, 27, 100]
            }
        ]
    },
});