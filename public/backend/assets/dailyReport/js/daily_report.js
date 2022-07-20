var scorecardTable;
var structureVal;
var daterange;
var companyData;
var countryData;
$(document).ready(function(){
    /* Start Date Range Picker */
    $(function() {
        $('input[name="daterange"]').daterangepicker({
          opens: 'left',
          locale: {
            format: 'YYYY/MM/DD'
          }
        }, function(start, end, label) {
          console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
      });
  /* End Date Range Picker */
  /* Start filter */
    $('#scard-filter-by-stcr').click(function (){
        $('body').removeClass('fixed-body');
        daterange = $('#daterange').val();
        companyData = $('#companyData').val();
        countryData = $('#countryData').val();
        dailyReportTable.ajax.reload();
    });
    /* End filter */
})
/*Start Display Data Table data*/
getDailyReports();
function getDailyReports(data) {
  /** Datatable code start here **/
  dailyReportTable = $("#tblDailyReport").DataTable({
        dom: 'tr<"bottom"ip>',
        processing: true,
        pageLength: 20,
          /*Start Call ajax function for get Daily Report Data*/
        ajax: {
                url: superadmin_url + "/",
                data: function (data) {
                    data,
                    data.daterange=daterange,
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

