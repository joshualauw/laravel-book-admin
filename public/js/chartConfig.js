function randData(ctr) {
    var arr = [];
    for (let i = 0; i < ctr; i++) {
        arr[i] = Math.floor(Math.random() * 50);
    }
    return arr;
}

var myChart;

//CHART 1

$.ajax({
    url: "http://127.0.0.1:8000/barang/monthly",
    success: function (ret) {
        var data = {
            labels: ["Week 1", "Week 2", "Week 3", "Week 4"],
            datasets: [
                {
                    label: "Total pengambilan barang sebulan terakhir",
                    backgroundColor: "rgb(255, 99, 132)",
                    borderColor: "rgb(255, 99, 132)",
                    data: [
                        ret[0]["total"],
                        ret[1]["total"],
                        ret[2]["total"],
                        ret[3]["total"],
                    ],
                },
            ],
        };

        var config = {
            type: "line",
            data: data,
            options: {},
        };
        myChart = new Chart(document.getElementById("myChart"), config);
    },
});

//CHART 2
$.ajax({
    url: "http://127.0.0.1:8000/departemen/tiga",
    success: function (ret) {
        data = {
            labels: [ret[0]["nama"], ret[1]["nama"], ret[2]["nama"]],
            datasets: [
                {
                    label: "3 Departemen dengan pembelian terbanyak",
                    data: [ret[0]["total"], ret[1]["total"], ret[2]["total"]],
                    backgroundColor: [
                        "rgb(255, 99, 132)",
                        "rgb(54, 162, 235)",
                        "rgb(255, 205, 86)",
                    ],
                    hoverOffset: 4,
                },
            ],
        };

        config = {
            type: "pie",
            data: data,
        };
        myChart = new Chart(document.getElementById("myChart2"), config);
    },
});

//CHART 3
ret = [];
$.ajax({
    url: "http://127.0.0.1:8000/kategori/tiga",
    success: function (ret) {
        data = {
            labels: [ret[0]["nama"], ret[1]["nama"], ret[2]["nama"]],
            datasets: [
                {
                    label: "3 Kategori dengan pengambilan terbanyak",
                    data: [ret[0]["total"], ret[1]["total"], ret[2]["total"]],
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                        "rgba(255, 205, 86, 0.2)",
                    ],
                    borderColor: [
                        "rgb(255, 99, 132)",
                        "rgb(255, 159, 64)",
                        "rgb(255, 205, 86)",
                    ],
                    borderWidth: 1,
                },
            ],
        };

        config = {
            type: "bar",
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        };
        myChart = new Chart(document.getElementById("myChart3"), config);
    },
});
