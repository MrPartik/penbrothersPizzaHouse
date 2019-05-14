/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3 & 4
Version: 4.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v4.0/admin/
*/

var handleDataTableButtons = function() {
	"use strict";

    var xcnt = 1000;

    if ($('#data-table-buttons').length !== 0)
        {
            // $('#data-table-buttons').DataTable({
            //     dom: 'lBfrtip',
            //     buttons: [
            //         { extend: 'copy', className: 'btn-sm' },
            //         { extend: 'csv', className: 'btn-sm' },
            //         { extend: 'excel', className: 'btn-sm' },
            //         { extend: 'pdf', className: 'btn-sm' },
            //         { extend: 'print', className: 'btn-sm' }
            //     ],
            //     responsive: true
            // });
        }

    for (var i = 1; i <= xcnt; i++)
    {
        if ($('#data-table-buttons'+i).length !== 0)
        {
            $('#data-table-buttons'+i).DataTable({
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'copy', className: 'btn-sm' },
                    { extend: 'csv', className: 'btn-sm' },
                    { extend: 'excel', className: 'btn-sm' },
                    { extend: 'pdf', className: 'btn-sm' },
                    { extend: 'print', className: 'btn-sm' }
                ],
                responsive: true
            });
        }
    }
};

var TableManageButtons = function () {
	"use strict";
    return {
        //main function
        init: function () {
            handleDataTableButtons();
        }
    };
}();
