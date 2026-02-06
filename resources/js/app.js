import './bootstrap';
// resources/js/app.js

// Función para confirmar la eliminación de un alumno
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-alumno');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const confirmation = confirm("¿Estás seguro de que deseas eliminar a este alumno?");
            if (confirmation) {
                window.location.href = button.getAttribute('href');
            }
        });
    });
});

// Función para validar el formulario de registro de alumnos
document.getElementById('registroAlumnoForm').addEventListener('submit', function (e) {
    const nombre = document.getElementById('nombre').value;
    const apellidoPaterno = document.getElementById('apellido_paterno').value;
    const apellidoMaterno = document.getElementById('apellido_materno').value;

    if (!nombre || !apellidoPaterno || !apellidoMaterno) {
        e.preventDefault();
        alert('Por favor, completa todos los campos.');
    }
});

// Para el formulario de editar alumno, puedes agregar un manejo similar.
document.getElementById('editarAlumnoForm')?.addEventListener('submit', function (e) {
    const nombre = document.getElementById('nombre').value;
    const apellidoPaterno = document.getElementById('apellido_paterno').value;
    const apellidoMaterno = document.getElementById('apellido_materno').value;

    if (!nombre || !apellidoPaterno || !apellidoMaterno) {
        e.preventDefault();
        alert('Por favor, completa todos los campos.');
    }
});
