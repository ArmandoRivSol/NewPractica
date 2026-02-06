# Practica 6: Administrador de alumnos

-Se debe hacer la conexión con base de datos (PHP, estoy ocupando ps el xampp normalito)
-Todo va a ir orientado al contexto de la escuela (es decir, grupos y 20 carreras)
-Son 4 ventanas que debemos hacer (debe ser framework, estoy intentando ocupar Laravel).

1. Registro de Alumnos (ventana):
Es una simple ventana de registro de alumnos

2. Registro de Grupos (ventana):
Es una simple ventana de registrar los grupos de cada carrera. Condiciones:
-El grupo (ISC1101-V) se crea automaticamente solo con respecto a la carrera, turno y grado (cuatrimestre).
-IMPORTANTE:El grupo debe estar conectado con el numero de alumnos por grupo (es decir, si nuestro limite es de 20 alumnos por grupo, si un alumno se registra como #21 se creara un grupo isc1102-v)

3. Alumnos Registrados (ventana):
Es una simple ventana que muestra todos los alumnos registrados de todos los grupos que tiene con 3 botones:
- Editar: Esta te abrira la misma ventana 1 (solo que en el boton debe decir actualizar)
- Activo: Que solo es para saber si el alumno esta activo y debe pintarse toda la fila de verde
- INactivo: Que solo es para saber si el alumno esta inactivo y debe pintarse toda la fila de rojo

4. Configurar Catalogos (ventana):
Aqui se podran registrar las carreras, turnos y grados. Condiciones:
Si se activa o elimina, debe desaparecer del select y viceversa si se agrega

Indicaciones Generales:
-Todo movimiento debe actualizarse en la base de datos en tiempo real
-Debe ser en Framework (cualquiera que se elija)
-La fecha estimada de entrega es para el viernes pero hay posibilidad de que la deje para el fin o quiza mas tiempo

