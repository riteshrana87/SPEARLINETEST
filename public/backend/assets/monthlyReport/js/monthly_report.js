var scorecardTable;
var structureVal;
var start;
var end;
var companyData;
var countryData;
$(document).ready(function(){
/* Start Date Range Picker */
    $(function() {
          $('input[name="start"]').datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy-mm',
                onClose: function(dateText, inst) { 
                    $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                }
            });

            $('input[name="end"]').datepicker( {
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'yy-mm',
                onClose: function(dateText, inst) { 
                    $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                }
                });
      });
    /* End Date Range Picker */
    /* Start filter */
    $('#scard-filter-by-stcr').click(function (){
        $('body').removeClass('fixed-body');
        start = $('#start').val();
        end = $('#end').val();
        companyData = $('#companyData').val();
        countryData = $('#countryData').val();

        monthlyReportsTable.ajax.reload();
    });
    /* End filter */
})
/*Start Display Data Table data*/
getMonthlyReports();
function getMonthlyReports(data) {
    /** Datatable code start here **/
    monthlyReportsTable = $("#tblMonthlyReport").DataTable({
        dom: 'tr<"bottom"ip>',
        processing: true,
        pageLength: 20,
        /*Start Call ajax function for get Daily Report Data*/
        ajax: {
                url: superadmin_url + "/monthly-report",
                data: function (data) {
                    data,
                    data.start=start,
                    data.end=end,
                    data.company=companyData,
                    data.country=countryData
                } ,
            },
     /*End Call ajax function for get Daily Report Data*/
        columns: [
            { data: "id", name: "id" },
            { data: "get_number.get_company.name", name: "company_name" },
            { data: "country_name", name: "country_name" },
            { data: "number_of_fails", name: "number of fails" },
            { data: "number_of_test", name: "number of Test" },
            { data: "connection_rate", name: "Connection Rate" },
            { data: "post_dial_delay", name: "Post Dial Delay" },
            { data: "created_on", name: "created_on" },
        ],
    });
    /** Datatable code end here **/
}
/*End Display Data Table data*/

