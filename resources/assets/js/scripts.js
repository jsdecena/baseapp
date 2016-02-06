$('.datepicker').datepicker({
    format: 'dd M yyyy',
});

//OPEN NEXT TAB
var $tabs = $('.nav-tabs li');

$('#prevtab').on('click', function() {
    $tabs.filter('.active').prev('li').find('a[data-toggle="tab"]').tab('show');
});

$('#nexttab').on('click', function() {
    $tabs.filter('.active').next('li').find('a[data-toggle="tab"]').tab('show');
});

$(document).ready(function() {
    $('textarea').trumbowyg();
    
    if ($('#line-chart').length>0) {
        $.ajax({
            url : 'admin/users/registration',
            success: function(users)
            {              
                var line = new Morris.Line({
                    element: 'line-chart',
                    resize: true,
                    data: users,
                    xkey: 'year',
                    ykeys: ['user'],
                    labels: ['Users'],
                    lineColors: ['#efefef'],
                    lineWidth: 2,
                    hideHover: 'auto',
                    gridTextColor: "#fff",
                    gridStrokeWidth: 0.4,
                    pointSize: 4,
                    pointStrokeColors: ["#efefef"],
                    gridLineColor: "#efefef",
                    gridTextFamily: "Open Sans",
                    gridTextSize: 10
                });              
            }
        });
    };
});