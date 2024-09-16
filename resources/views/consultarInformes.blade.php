<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Informes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Consultar Informes</h3>
    <h1>CONSULTAR INFORMES</h1>
    <h3>Informes</h3>
    <form>
        <label for="day"></label>
        <select id="day" name="day">
            <option value="">Día</option>
            <!-- Opciones de días -->
            <script>
                for (let i = 1; i <= 31; i++) {
                    document.write(`<option value="${i}">${i}</option>`);
                }
            </script>
        </select>

        <label for="month"></label>
        <select id="month" name="month">
            <option value="">Mes</option>
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>

        <label for="year"></label>
        <select id="year" name="year">
            <option value="">Año</option>
            <!-- Opciones de años -->
        
            
            <script>
                const currentYear = new Date().getFullYear();
                for (let i = currentYear; i >= 1900; i--) {
                    document.write(`<option value="${i}">${i}</option>`);
                }
                </script>
        </select>
        <br>
        <button class="my-button" type="button">Buscar</button>
    </form>
</body>
</html>
