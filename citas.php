<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Citas para Mecánicos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5; /* Gris claro */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333; /* Gris oscuro */
        }
        .container {
            background-color: #ffffff; /* Blanco */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #000000; /* Negro */
            font-size: 28px;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #000000; /* Negro */
        }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #dcdcdc; /* Gris claro */
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            color: #000000; /* Negro */
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #ff0000; /* Rojo */
            box-shadow: 0 0 8px rgba(255, 0, 0, 0.3);
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #ff0000; /* Rojo */
            border: none;
            border-radius: 8px;
            color: #ffffff; /* Blanco */
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #cc0000; /* Rojo oscuro */
        }
        button:active {
            transform: scale(0.98);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #dcdcdc; /* Gris claro */
        }
        th {
            background-color: #000000; /* Negro */
            color: #ffffff; /* Blanco */
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #f0f0f0; /* Gris muy claro */
        }
        tr:hover {
            background-color: #e0e0e0; /* Gris claro */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agenda tu Cita con el Mecánico</h1>
        <form id="appointment-form">
            <div class="form-group">
                <label for="name">Nombre Completo:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="date">Fecha de Cita:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Hora de Cita:</label>
                <input type="time" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="service">Servicio Requerido:</label>
                <select id="service" name="service" required>
                    <option value="" disabled selected>Selecciona un servicio</option>
                    <option value="Cambio de Aceite">Cambio de Aceite</option>
                    <option value="Revisión de Frenos">Revisión de Frenos</option>
                    <option value="Reparación de Transmisión">Reparación de Transmisión</option>
                    <option value="Alineación y Balanceo">Alineación y Balanceo</option>
                </select>
            </div>
            <button type="submit">Agendar Cita</button>
        </form>

        <h2>Citas Agendadas</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Servicio</th>
                </tr>
            </thead>
            <?php 
        if(isset($_POST["Agendar Cita"])){
        session_start();

        $_POST["Nombre"] = htmlentities($_POST
        ["Nombre"]) ;

        $_POST['Correo Electrónico'] = htmlentities($_POST
        ['Correo Electrónico']) ;

        $_POST["Teléfono"] = htmlentities($_POST
        ["Teléfono"]) ;

        $_POST["Fecha"] = htmlentities($_POST
        ["Fecha"]) ;

        $_POST["Hora"] = htmlentities($_POST
        ["Hora"]) ;

        $_POST["Servicio"] = htmlentities($_POST
        ["Servicio"]) ;
    }
?>
            <tbody id="appointments-body">
                <!-- Las filas se agregarán aquí -->
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('appointment-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío por defecto del formulario
            
            // Obtener los valores del formulario
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;
            const service = document.getElementById('service').value;

            // Crear una nueva fila en la tabla
            const tableBody = document.getElementById('appointments-body');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td>${name}</td>
                <td>${email}</td>
                <td>${phone}</td>
                <td>${date}</td>
                <td>${time}</td>
                <td>${service}</td>
            `;

            tableBody.appendChild(newRow);

            // Limpiar el formulario
            document.getElementById('appointment-form').reset();
        });
    </script>
</body>
</html>