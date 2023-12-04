$(document).ready(function () {
    "use strict";
    $("#basic-datatable").DataTable({
        keys: !0,
        ordering: false,
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        scrollX: true,
        language: {paginate: {previous: "<i class='ri-arrow-left-s-line'>", next: "<i class='ri-arrow-right-s-line'>"}},
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    });
    var a = $("#datatable-buttons").DataTable({
        lengthChange: !1,
        buttons: ["copy", "print"],
        language: {paginate: {previous: "<i class='ri-arrow-left-s-line'>", next: "<i class='ri-arrow-right-s-line'>"}},
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    });
    $("#selection-datatable").DataTable({
        select: {style: "multi"},
        language: {paginate: {previous: "<i class='ri-arrow-left-s-line'>", next: "<i class='ri-arrow-right-s-line'>"}},
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    }), a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $("#alternative-page-datatable").DataTable({
        pagingType: "full_numbers",
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    }), $("#scroll-vertical-datatable").DataTable({
        scrollY: "350px",
        scrollCollapse: !0,
        paging: !1,
        language: {paginate: {previous: "<i class='ri-arrow-left-s-line'>", next: "<i class='ri-arrow-right-s-line'>"}},
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    }), $("#scroll-horizontal-datatable").DataTable({
        scrollX: !0,
        language: {paginate: {previous: "<i class='ri-arrow-left-s-line'>", next: "<i class='ri-arrow-right-s-line'>"}},
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    }), $("#complex-header-datatable").DataTable({
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'>",
                next: "<i class='ri-arrow-right-s-line'>"
            }
        }, drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }, columnDefs: [{visible: !1, targets: -1}]
    }), $("#row-callback-datatable").DataTable({
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'>",
                next: "<i class='ri-arrow-right-s-line'>"
            }
        }, drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }, createdRow: function (a, e, l) {
            15e4 < +e[5].replace(/[\$,]/g, "") && $("td", a).eq(5).addClass("text-danger")
        }
    }), $("#state-saving-datatable").DataTable({
        stateSave: !0,
        language: {paginate: {previous: "<i class='ri-arrow-left-s-line'>", next: "<i class='ri-arrow-right-s-line'>"}},
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    }), $("#fixed-columns-datatable").DataTable({
        scrollY: 300,
        scrollX: !0,
        scrollCollapse: !0,
        paging: !1,
        fixedColumns: !0
    }), $(".dataTables_length select").addClass("form-select form-select-sm"), $(".dataTables_length label").addClass("form-label")
}), $(document).ready(function () {
    var a = $("#fixed-header-datatable").DataTable({
        responsive: !0,
        language: {paginate: {previous: "<i class='ri-arrow-left-s-line'>", next: "<i class='ri-arrow-right-s-line'>"}},
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    });
    new $.fn.dataTable.FixedHeader(a)
});
