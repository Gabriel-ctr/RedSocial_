<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <form id="registerForm" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="">Seleccione</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="No Aplica">No Aplica</option>
                    <option value="Prefiero no Decirlo">Prefiero no Decirlo</option>
                    <option value="Otro">Otro</option>
                </select>
                <input type="text" class="form-control mt-2" id="other_gender" name="other_gender" placeholder="Especifique" style="display:none;">
            </div>
            <div class="form-group">
                <label for="birthdate">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $('#gender').change(function(){
                if($(this).val() === 'Otro'){
                    $('#other_gender').show();
                } else {
                    $('#other_gender').hide();
                }
            });

            $('#registerForm').validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    name: {
                        required: true,
                        minlength: 2
                    },
                    gender: {
                        required: true
                    },
                    birthdate: {
                        required: true,
                        date: true,
                        minDate: new Date(new Date().setFullYear(new Date().getFullYear() - 100)),
                        maxDate: new Date(new Date().setFullYear(new Date().getFullYear() - 18))
                    }
                },
                messages: {
                    username: {
                        required: "Por favor, ingrese un nombre de usuario",
                        minlength: "El nombre de usuario debe tener al menos 3 caracteres"
                    },
                    password: {
                        required: "Por favor, ingrese una contraseña",
                        minlength: "La contraseña debe tener al menos 8 caracteres"
                    },
                    password_confirmation: {
                        required: "Por favor, confirme su contraseña",
                        equalTo: "Las contraseñas no coinciden"
                    },
                    email: {
                        required: "Por favor, ingrese una dirección de correo electrónico",
                        email: "Por favor, ingrese una dirección de correo electrónico válida"
                    },
                    name: {
                        required: "Por favor, ingrese su nombre",
                        minlength: "El nombre debe tener al menos 2 caracteres"
                    },
                    gender: {
                        required: "Por favor, seleccione un género"
                    },
                    birthdate: {
                        required: "Por favor, ingrese su fecha de nacimiento",
                        date: "Por favor, ingrese una fecha válida",
                        minDate: "La fecha de nacimiento no puede ser anterior a 100 años",
                        maxDate: "Debe tener al menos 18 años para registrarse"
                    }
                }
            });

            $.validator.addMethod("minDate", function(value, element, min) {
                if (this.optional(element)) {
                    return true;
                }
                var inputDate = new Date(value);
                return inputDate >= min;
            });

            $.validator.addMethod("maxDate", function(value, element, max) {
                if (this.optional(element)) {
                    return true;
                }
                var inputDate = new Date(value);
                return inputDate <= max;
            });
        });
    </script>
</body>
</html>
