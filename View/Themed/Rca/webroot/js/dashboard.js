$(document).ready(function(){
    getStats();
});

function getStats() {
    $.ajax({
        url: address,
        success: function (data) {
            var obj = $.parseJSON(data);

            montlyComenziData = obj.montlyComenziData;
            ticksMontlyComenzi = obj.ticksMontlyComenzi;
            dailyComenziData = obj.dailyComenziData;

            generateChartComenzi();
            generateChartCounters();

            $('#expirationsCountText').html(obj.expirationsCountText).removeClass('icon-spin icon-spinner');
            $('#comenziCount').html(obj.comenziCount).removeClass('icon-spin icon-spinner');
            $('#cotatiiCount').html(obj.cotatiiCount).removeClass('icon-spin icon-spinner');
            $('#smsCount').html(obj.smsCount).removeClass('icon-spin icon-spinner');
        }
    });
}

function generateChartComenzi() {
    var plot = $.plot($("#comenzi_chart"),
        [ { data: montlyComenziData, label: "Total comenzi/luna"}], {
            series: {
                lines: { show: true,
                    lineWidth: 1,
                    fill: true,
                    fillColor: { colors: [ { opacity: 0.1 }, { opacity: 0.13 } ] }
                },
                points: { show: true,
                    lineWidth: 2,
                    radius: 3
                },
                shadowSize: 0,
                stack: true
            },
            grid: { hoverable: true,
                clickable: true,
                tickColor: "#f9f9f9",
                borderWidth: 0
            },
            legend: {
                // show: false
                labelBoxBorderColor: "#fff"
            },
            colors: ["#FABB3D"],
            xaxis: {
                ticks: ticksMontlyComenzi,
                font: {
                    size: 12,
                    family: "Open Sans, Arial",
                    variant: "small-caps",
                    color: "#697695"
                }
            },
            yaxis: {
                ticks: 4,
                tickDecimals: 0,
                font: {size:12, color: "#9da3a9"}
            }
        });

    var previousPoint = null;
    $("#comenzi_chart").bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;

                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(0),
                    y = item.datapoint[1].toFixed(2);

                var month = item.series.xaxis.ticks[item.dataIndex].label;

                showTooltip(item.pageX, item.pageY, addCommas(y), 50);
            }
        }
        else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
};

function generateChartCounters() {
    var plot = $.plot($("#counters_chart"),
        [ { data: dailyComenziData, label: "Nr. comenzi/zi"}], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.6,
                    align: "center"
                }
            },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: "#f9f9f9",
                borderWidth: 0
            },
            legend: {
                // show: false
                labelBoxBorderColor: "#fff"
            },
            colors: ["#FABB3D"],
            xaxis: {
                mode: "categories",
                tickLength: 0,
                font: {
                    size: 12,
                    family: "Open Sans, Arial",
                    variant: "small-caps",
                    color: "#697695"
                }
            },
            yaxis: {
                ticks: 6,
                tickDecimals: 0,
                font: {size:12, color: "#9da3a9"}
            }
        });

    var previousPoint = null;
    $("#counters_chart").bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;

                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(0),
                    y = item.datapoint[1].toFixed(0);

                var day = item.series.xaxis.ticks[item.dataIndex].label;

                showTooltip(item.pageX, item.pageY, addCommas(y),10);
            }
        }
        else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
};

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function showTooltip(x, y, contents, left_offset) {
    $('<div id="tooltip">' + contents + '</div>').css( {
        position: 'absolute',
        display: 'none',
        top: y - 30,
        left: x - left_offset,
        color: "#fff",
        padding: '2px 5px',
        'border-radius': '6px',
        'background-color': '#000',
        opacity: 0.80
    }).appendTo("body").fadeIn(200);
}