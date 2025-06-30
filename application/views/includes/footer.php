
<!--begin::Footer-->
<footer class="app-footer"> <!--begin::To the end-->
    <div class="float-end d-none d-sm-inline"></div> 
    <!--end::To the end--> <!--begin::Copyright--> <strong>
        Copyright &copy; 2024-2025&nbsp;
        <a target="_blank" href="https://digitalyazhi.com/" style="color:orange" class="text-decoration-none">Digital Yazhi</a>.
    </strong>
    All rights reserved.
    <!--end::Copyright-->
</footer> <!--end::Footer-->
</div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="<?php echo base_url(); ?>dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>

<!--alertify-->
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>



<script>





    $(document).ready(function () {

        var dataTable = $('#empTable').DataTable({
            'processing': true,
            'serverSide': true,

            'serverMethod': 'post',
            'searching': true, // Remove default Search Control
            'ajax': {
                'url':  '<?php echo base_url();?>index.php/RecodeController/stockTablenew',

                'data': function (data) {

                    //    console.log(data);
                    // Read values


                    var contact_id = $('#contact_id').val();
                    var group_id = $('#group_id').val();
                     var serach_id = $('#serach_id').val();
  


                    // Append to data


                    data.contact_id = contact_id;
                    data.group_id = group_id;
                       data.serach_id = serach_id;
                 

                }
            },
            drawCallback: function (settings)
            {
                $('#total_roll').html(settings.json.total_roll);
                $('#total_weight').html(settings.json.total_weight);


            },
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "pageLength": 2500,
            'dom': 'Bfrtip',

            'buttons': [{
                    extend: 'pdf',
                    footer: true,
                    exportOptions: {
                        columns: [1, 2, 3, 4]
                    },

                    exportOptions: {
                        modifer: {
                            order: 'index',
                            page: 'all', // 'all', 'current'
                            search: 'none'}
                    }
                },

                {
                    extend: 'excel',
                    footer: false,
                    exportOptions: {
                        columns: [1, 2, 3, 4]
                    },
                    exportOptions: {
                        modifer: {
                            order: 'index',
                            page: 'all', // 'all', 'current'
                            search: 'none'}
                    }

                }
            ],
            'columns': [{
                    data: 'contacts_group_id'
                }, {
                    data: 'name'
                },
                {
                    data: 'phone'
                }
,
                {
                    data: 'group_name'
                }
            ]

        });


        $('#contact_id').change(function () {
            dataTable.draw();
        });

        $('#group_id').change(function () {
            dataTable.draw();
        });
         $('#serach_id').change(function () {
            dataTable.draw();
        });
        
        
      
    });
































    $(document).ready(function () {
        $('#myTable').DataTable();
    });
    $(document).ready(function () {
        $('#phone_number').keyup(function () {
            var query = $(this).val();
            if (query != '')
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Dashboard/searchAll",
                    method: "POST",
                    data: {query: query},
                    success: function (data)
                    {

                        //alert(data);
                        $('#countryList').fadeIn();
                        $('#countryList').html(data);
                    }
                });
            }
        });
        $(document).on('click', 'li', function () {
            $('#phone_number').val($(this).text());
            $('#countryList').fadeOut();
        });
    });
</script> 
<script type="text/javascript">
    // Change the default title of the popup to 'Attention'
    alertify.defaults.glossary.title = 'Attention';

    // Delete Group Confirmation
    function confirmDelete(url) {
        alertify.confirm('Are you sure you want to delete this group?',
                function () {
                    window.location.href = url; // Redirect to the delete URL if "Yes" is clicked
                },
                function () {
                    alertify.error('Group not deleted'); // Show error message if "No" is clicked
                }
        ).set({
            // Customizing button text and appearance
            'labels': {ok: 'Yes', cancel: 'No'},
            'padding': false,
            'transition': 'zoom', // Optional: animation effect
            'closable': false, // Optional: Disable close button
        });
    }
</script>



<script>

    $('#assignList').click(function () {

        var ids = new Array();
        $('input[name="contact_id[]"]:checked').each(function () {
            ids.push($(this).val());
        });





        var group_id = $('#group_id').val();
        var dataString = 'ids=' + ids + '&group_id=' + group_id;


        $.ajax({
            url: "<?php echo base_url(); ?>index.php/Dashboard/AssingListtoGroup",
            type: "post",
            data: dataString,

            success: function (data) {



                alert(data + " Phone Number Assign ");
                window.location.href = "<?php echo base_url(); ?>index.php/Dashboard/AssignGroup";
            }
        });


    });

    $(document).ready(function () {

        $("#phone").on("blur", function () {
            var mobNum = $(this).val();
            var filter = /^\d*(?:\.\d{1,2})?$/;

            if (filter.test(mobNum)) {
                if (mobNum.length == 10) {
                    // alert("valid Phone numbr");







                    $.ajax({
                        url: '<?php echo base_url(); ?>index.php/Dashboard/cehckPhone',
                        type: 'post',
                        data: {
                            'phone': mobNum

                        },
                        success: function (response) {


                            if (response == 1) {
                                alert("Phone number already Exist");
                                $("#phone").val("");

                            }


                        }
                    });




                } else {
                    alert('Please put 10  digit mobile number');

                    return false;
                }
            } else {
                alert('Not a valid Phone number');

                return false;
            }

        });

    });

    function matchPassword() {
        var pw1 = document.getElementById("pass1");
        var pw2 = document.getElementById("pass2");
        if (pw1 != pw2)
        {
            alert("Passwords did not match");
        } else {
            alert("Password created successfully");
        }
    }

</script>




<script>
    const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
    const Default = {
        scrollbarTheme: "os-theme-light",
        scrollbarAutoHide: "leave",
        scrollbarClickScroll: true,
    };
    document.addEventListener("DOMContentLoaded", function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
                ) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- sortablejs -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script> <!-- sortablejs -->
<script>
    const connectedSortables =
            document.querySelectorAll(".connectedSortable");
    connectedSortables.forEach((connectedSortable) => {
        let sortable = new Sortable(connectedSortable, {
            group: "shared",
            handle: ".card-header",
        });
    });

    const cardHeaders = document.querySelectorAll(
            ".connectedSortable .card-header",
            );
    cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = "move";
    });
</script> <!-- apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script> <!-- ChartJS -->
<script>
    // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
    // IT'S ALL JUST JUNK FOR DEMO
    // ++++++++++++++++++++++++++++++++++++++++++

    const sales_chart_options = {
        series: [{
                name: "Digital Goods",
                data: [28, 48, 40, 19, 86, 27, 90],
            },
            {
                name: "Electronics",
                data: [65, 59, 80, 81, 56, 55, 40],
            },
        ],
        chart: {
            height: 300,
            type: "area",
            toolbar: {
                show: false,
            },
        },
        legend: {
            show: false,
        },
        colors: ["#0d6efd", "#20c997"],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: "smooth",
        },
        xaxis: {
            type: "datetime",
            categories: [
                "2023-01-01",
                "2023-02-01",
                "2023-03-01",
                "2023-04-01",
                "2023-05-01",
                "2023-06-01",
                "2023-07-01",
            ],
        },
        tooltip: {
            x: {
                format: "MMMM yyyy",
            },
        },
    };

    const sales_chart = new ApexCharts(
            document.querySelector("#revenue-chart"),
            sales_chart_options,
            );
    sales_chart.render();
</script> <!-- jsvectormap -->
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js" integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script> <!-- jsvectormap -->
<script>
    const visitorsData = {
        US: 398, // USA
        SA: 400, // Saudi Arabia
        CA: 1000, // Canada
        DE: 500, // Germany
        FR: 760, // France
        CN: 300, // China
        AU: 700, // Australia
        BR: 600, // Brazil
        IN: 800, // India
        GB: 320, // Great Britain
        RU: 3000, // Russia
    };

    // World map by jsVectorMap
    const map = new jsVectorMap({
        selector: "#world-map",
        map: "world",
    });

    // Sparkline charts
    const option_sparkline1 = {
        series: [{
                data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
            }, ],
        chart: {
            type: "area",
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: "straight",
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0,
        },
        colors: ["#DCE6EC"],
    };

    const sparkline1 = new ApexCharts(
            document.querySelector("#sparkline-1"),
            option_sparkline1,
            );
    sparkline1.render();

    const option_sparkline2 = {
        series: [{
                data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
            }, ],
        chart: {
            type: "area",
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: "straight",
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0,
        },
        colors: ["#DCE6EC"],
    };

    const sparkline2 = new ApexCharts(
            document.querySelector("#sparkline-2"),
            option_sparkline2,
            );
    sparkline2.render();

    const option_sparkline3 = {
        series: [{
                data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
            }, ],
        chart: {
            type: "area",
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: "straight",
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0,
        },
        colors: ["#DCE6EC"],
    };

    const sparkline3 = new ApexCharts(
            document.querySelector("#sparkline-3"),
            option_sparkline3,
            );
    sparkline3.render();





</script> 
<script>
    $(document).ready(function () {
        $('#country').keyup(function () {
            var query = $(this).val();
            if (query != '')
            {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {query: query},
                    success: function (data)
                    {
                        $('#countryList').fadeIn();
                        $('#countryList').html(data);
                    }
                });
            }
        });
        $(document).on('click', 'li', function () {
            $('#country').val($(this).text());
            $('#countryList').fadeOut();
        });
    });
</script> 



<!--end::Script-->
</body><!--end::Body-->

</html>