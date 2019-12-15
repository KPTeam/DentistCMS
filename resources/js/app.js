require('./components/jquery.min')
require('./bootstrap')
require('./components/sb-admin-2')
require('./components/jquery.easing.min')
require('./components/datatables.min')
  function jQuery() {
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

    $('#searchPacient').on('keyup change hover',function(){
      $value=$(this).val();
      $.ajax({
    type : 'get',
    url : '/searchPacient',
    data:{'search':$value},
    success:function(data){
    $('#pacient-table-body').html(data);
    }
    });
    })
    $(document).ready(function(){
      $('#dalje-pacient').hide();
    });

    $('#type').on('load change',function() {
        if($(this).val()=="Faturë")
        {
          $('#dalje-subject').show();
          $('#dalje-billnr').show();
          $('#dalje-photo').show();
          $('#dalje-pacient').hide();
          $('#pacient-id').val(0);
        }
        else
        {
          $('#dalje-pacient').show();
          $('#dalje-subject').hide();
          $('#subject').val("Ska");
          $('#dalje-billnr').hide();
          $('#bill_number').val(0);
          $('#dalje-photo').hide();

        }

    });

    $('#searchUser').on('keyup change hover',function(){
        $value=$(this).val();
        $.ajax({
      type : 'get',
      url : '/searchUser',
      data:{'search':$value},
      success:function(data){
      $('#user-table-body').html(data);
      }
      });
      })

      $('#searchVisit').on('keyup change hover',function(){
        $value=$(this).val();
        $.ajax({
      type : 'get',
      url : '/searchVisit',
      data:{'search':$value},
      success:function(data){
      $('#visit-table-body').html(data);
      }
      });
      })

      $('#searchService').on('keyup change hover',function(){
        $value=$(this).val();
        $.ajax({
      type : 'get',
      url : '/searchService',
      data:{'search':$value},
      success:function(data){
      $('#service-table-body').html(data);
      }
      });
      })


      $('#searchTreatment').on('keyup change hover',function(){
        $value=$(this).val();
        $.ajax({
      type : 'get',
      url : '/searchTreatment',
      data:{'search':$value},
      success:function(data){
      $('#treatment-table-body').html(data);
      }
      });
      })

      $("form[id*='notification']").click(function(e){
        e.preventDefault();
        var id = $("input[name=id]").val();
        $.ajax({
          type:'POST',
          url:'/markAsRead',
          data:{
             "_token": "{{ csrf_token() }}",
            "id":id},
          success:function(data)
          {
            alert(data.success);
          }
        });
        });


    $('#PacientdataTable').DataTable(
      {
        "processing": true,
        "serverSide": true,
        "ajax":"/pacientDatatable",
        "columns": [
          {"data":"first_name"},
          {"data":"last_name"},
          {"data":"personal_number"},
          {"data":"date_of_birth"},
          {"data":"address"},
          {"data":"residence"},
          {"data": "Menaxhimi", "bSearchable": false}
        ],
        "language": {
          "lengthMenu": "Shfaq _MENU_ për faqe",
          "zeroRecords": "Nuk u gjet asnjë e dhënë",
          "info": "Duke shfaqur faqen _PAGE_ nga _PAGES_",
          "infoEmpty": "Nuk ka të dhëna",
          "infoFiltered": "(Të filtruar nga _MAX_ total)",
          "processing":     "Duke procesuar...",
          "search":         "Kërko:",
          "paginate": {
            "first":      "Fillimi",
            "last":       "Fundi",
            "next":       "Para",
            "previous":   "Prapa"}
          }
      });
    $('#UserdataTable').DataTable(
      {
        "processing": true,
        "serverSide": true,
        "ajax":"/userDatatable",
        "columns": [
          {"data":"name"},
          {"data":"email"},
          {"data":"password"},
          {"data":"position"},
          {"data": "Menaxhimi", "bSearchable": false }
        ],
        "language": {
          "lengthMenu": "Shfaq _MENU_ për faqe",
          "zeroRecords": "Nuk u gjet asnjë e dhënë",
          "info": "Duke shfaqur faqen _PAGE_ nga _PAGES_",
          "infoEmpty": "Nuk ka të dhëna",
          "infoFiltered": "(Të filtruar nga _MAX_ total)",
          "processing":     "Duke procesuar...",
          "search":         "Kërko:",
          "paginate": {
            "first":      "Fillimi",
            "last":       "Fundi",
            "next":       "Para",
            "previous":   "Prapa"}
          }
      }
    );
    $('#AppointmentdataTable').DataTable(
      {
        "processing": true,
        "serverSide": true,
        "ajax":"/appointmentDatatable",
        "columns": [
          {"data":"pacient_id"},
          {"data":"user_id"},
          {"data":"date_of_appointment"},
          {"data":"time_of_appointment"},
          {"data": "Menaxhimi", "bSearchable": false }
        ],
        "language": {
          "lengthMenu": "Shfaq _MENU_ për faqe",
          "zeroRecords": "Nuk u gjet asnjë e dhënë",
          "info": "Duke shfaqur faqen _PAGE_ nga _PAGES_",
          "infoEmpty": "Nuk ka të dhëna",
          "infoFiltered": "(Të filtruar nga _MAX_ total)",
          "processing":     "Duke procesuar...",
          "search":         "Kërko:",
          "paginate": {
            "first":      "Fillimi",
            "last":       "Fundi",
            "next":       "Para",
            "previous":   "Prapa"}
          }
      }
    );
    $('#VisitdataTable').DataTable(
      {
        "processing": true,
        "serverSide": true,
        "ajax":"/visitDatatable",
        "columns": [
          {"data":"pacient_id"},
          {"data":"user_id"},
          {"data":"date_of_visit"},
          {"data":"time_of_visit"},
          {"data": "Menaxhimi", "bSearchable": false }
        ],
        "language": {
          "lengthMenu": "Shfaq _MENU_ për faqe",
          "zeroRecords": "Nuk u gjet asnjë e dhënë",
          "info": "Duke shfaqur faqen _PAGE_ nga _PAGES_",
          "infoEmpty": "Nuk ka të dhëna",
          "infoFiltered": "(Të filtruar nga _MAX_ total)",
          "processing":     "Duke procesuar...",
          "search":         "Kërko:",
          "paginate": {
            "first":      "Fillimi",
            "last":       "Fundi",
            "next":       "Para",
            "previous":   "Prapa"}
          }
      }
    );

    $('#TreatmentdataTable').DataTable(
      {
        "processing": true,
        "serverSide": true,
        "ajax":"/treatmentDatatable",
        "columns": [
          {"data":"pacient_id"},
          {"data":"starting_date"},
          {"data":"duration"},
          {"data": "Menaxhimi", "bSearchable": false }
        ],
        "language": {
          "lengthMenu": "Shfaq _MENU_ për faqe",
          "zeroRecords": "Nuk u gjet asnjë e dhënë",
          "info": "Duke shfaqur faqen _PAGE_ nga _PAGES_",
          "infoEmpty":"Nuk ka të dhëna",
          "infoFiltered": "(Të filtruar nga _MAX_ total)",
          "processing":     "Duke procesuar...",
          "search":         "Kërko:",
          "paginate": {
            "first":      "Fillimi",
            "last":       "Fundi",
            "next":       "Para",
            "previous":   "Prapa"}
          }
      }
    );

    $('#ServicedataTable').DataTable(
      {
        "processing": true,
        "serverSide": true,
        "ajax":"/serviceDatatable",
        "columns": [
          {"data":"name"},
          {"data":"price"},
          {"data":"discount"},
          {"data": "Menaxhimi", "bSearchable": false }
        ],
        "language": {
          "lengthMenu": "Shfaq _MENU_ për faqe",
          "zeroRecords": "Nuk u gjet asnjë e dhënë",
          "info": "Duke shfaqur faqen _PAGE_ nga _PAGES_",
          "infoEmpty": "Nuk ka të dhëna",
          "infoFiltered": "(Të filtruar nga _MAX_ total)",
          "processing":     "Duke procesuar...",
          "search":         "Kërko:",
          "paginate": {
            "first":      "Fillimi",
            "last":       "Fundi",
            "next":       "Para",
            "previous":   "Prapa"}
          }
      }
    );

    $('#ReportdataTable').DataTable(
      {
        "processing": true,
        "serverSide": true,
        "ajax":"/reportDatatable",
        "columns": [
          {"data":"pacient_id"},
          {"data":"starting_date"},
          {"data":"created_at"},
          {"data": "Menaxhimi", "bSearchable": false }
        ],
        "language": {
          "lengthMenu": "Shfaq _MENU_ për faqe",
          "zeroRecords": "Nuk u gjet asnjë e dhënë",
          "info": "Duke shfaqur faqen _PAGE_ nga _PAGES_",
          "infoEmpty": "Nuk ka të dhëna",
          "infoFiltered": "(Të filtruar nga _MAX_ total)",
          "processing":     "Duke procesuar...",
          "search":         "Kërko:",
          "paginate": {
            "first":      "Fillimi",
            "last":       "Fundi",
            "next":       "Para",
            "previous":   "Prapa"}
          }
      }
    );

    $('#NotificationsdataTable').DataTable(
      {
        "processing": true,
        "serverSide": true,
        "ajax":"/notificationsDatatable",
        "columns": [
          {"data":"description"},
          {"data":"created_at"},
        ],
        "language": {
          "lengthMenu": "Shfaq _MENU_ për faqe",
          "zeroRecords": "Nuk u gjet asnjë e dhënë",
          "info": "Duke shfaqur faqen _PAGE_ nga _PAGES_",
          "infoEmpty": "Nuk ka të dhëna",
          "infoFiltered": "(Të filtruar nga _MAX_ total)",
          "processing":     "Duke procesuar...",
          "search":         "Kërko:",
          "paginate": {
            "first":      "Fillimi",
            "last":       "Fundi",
            "next":       "Para",
            "previous":   "Prapa"}
          }
      }
    );

    $('#DaljetdataTable').DataTable(
      {
        "processing": true,
        "serverSide": true,
        "ajax":"/daljeDatatable",
        "columns": [
          {"data":"subject"},
          {"data":"bill_number"},
          {"data":"deadline"},
          {"data":"value"},
          {"data": "Menaxhimi", "bSearchable": false }
        ],
        "language": {
          "lengthMenu": "Shfaq _MENU_ për faqe",
          "zeroRecords": "Nuk u gjet asnjë e dhënë",
          "info": "Duke shfaqur faqen _PAGE_ nga _PAGES_",
          "infoEmpty": "Nuk ka të dhëna",
          "infoFiltered": "(Të filtruar nga _MAX_ total)",
          "processing":     "Duke procesuar...",
          "search":         "Kërko:",
          "paginate": {
            "first":      "Fillimi",
            "last":       "Fundi",
            "next":       "Para",
            "previous":   "Prapa"}
          }
      }
    );

  }

  jQuery();

  

