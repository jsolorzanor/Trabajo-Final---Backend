function show(mensaje, icon) {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    }
  });
  Toast.fire({
    icon: icon,
    title: mensaje
  });
}

function redirectToPage() {
  window.location.href = "http://localhost:3000/index.php?";
}
function redirectToClientes() {
  window.location.href = "http://localhost:3000/clientes.php";
}
function redirectToHoteles() {
  window.location.href = "http://localhost:3000/hoteles.php";
}

$(document).ready(function () {
  $(document).on("click", ".open-modal", function () {
    var id = $(this).data('id');
    $(".modal-body #deleteId").val(id);
  });
});

function deleteReservaciones() {
  var deleteId = document.getElementById('deleteId').value;
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'views/eliminar.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function () {
    if (xhr.status === 200) {
      show("Data deleted successfully!", 'success');
      // Close the modal or do any other necessary actions
    } else {
      show('Error deleting data.', 'error');
    }
  };
  xhr.send('deleteId=' + encodeURIComponent(deleteId));
}

function deleteClientes() {
  var deleteId = document.getElementById('deleteId').value;
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'Alumno/eliminar_alumno.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function () {
    if (xhr.status === 200) {
      show("Data deleted successfully!", 'success');
      // Close the modal or do any other necessary actions
    } else {
      show('Error deleting data.', 'error');
    }
  };
  xhr.send('deleteId=' + encodeURIComponent(deleteId));
}

function deleteHoteles() {
  var deleteId = document.getElementById('deleteId').value;
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'Eventos/eliminar_evento.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function () {
    if (xhr.status === 200) {
      show("Data deleted successfully!", 'success');
      // Close the modal or do any other necessary actions
    } else {
      show('Error deleting data.', 'error');
    }
  };
  xhr.send('deleteId=' + encodeURIComponent(deleteId));
}


function deleteModal() {
  document.getElementById("myForm").reset();
}