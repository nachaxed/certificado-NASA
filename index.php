<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vistas/estilo.css">
    <title>certificado</title>
</head>
<body>
  <form method="POST" id="form">
      <div class="form">
          <h1>Registro</h1>
          <div class="grupo" style="display:none;">
              <input type="text" name="Nombre" id="name" ><span class="barra" required></span>
              <label for="">Nombre</label>  
          </div>
          <div class="grupo" style="display:none;">
            <input type="text" name="Apellido" id="lastname" ><span class="barra" required></span>
            <label for="">Apellido</label>  
        </div>
        <div class="grupo">
            <input type="email" name="Email" id="email" ><span class="barra" required></span>
            <label for="">Email</label>  
        </div>
        <div class="grupo" style="display:none";>
            <input type="text" name="DNI" id="DNI" ><span class="barra" required></span>
            <label for="">DNI</label>  
        </div>
        <div class="grupo">
            <select name="localidad">
                <option>selecciona tu localidad</option>
                <option></option>
                <option></option>
                <option></option>
                <option></option>
            </select>
        </div>   
        <div>
            <button type="submit">Registrate</button>
            <p class="warnings" id="warnings"></p>
        </div>    
    <?php 
        $registrar = new controladorUsuarios();
        $registrar->registrarUsuario();
            ?>
    </form>   
<script src="bot.js"></script>  
</body>
</html>