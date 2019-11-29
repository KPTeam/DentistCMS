
function filterUserFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("search-user");
    filter = input.value.toUpperCase();
    div = document.getElementById("dropdown-user");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }
  
  function filterPacientFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("search-pacient");
    filter = input.value.toUpperCase();
    div = document.getElementById("dropdown-pacient");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }
  function DataTables() {
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
        ]
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
        ]
      }
    );
  }

DataTables();