$(document).ready(function(){
    var table = $('#tabla').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        responsive: true,
        searchpanes:{
            cascadaPanes:true,
            dt0pts:{
                dom:'tp',
                paging:'true',
                pagingType:'numbers',
                searching:false
            }
        },
        dom: 'Pfrtip',
        columnDefs:[{
            searchPanes:{
                show:true,
            },
            targets:[3]
        }]
    }); 
});