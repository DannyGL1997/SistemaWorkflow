<!doctype html>
<html lang="en">

<head>
  <title>Registrarse</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('assets/estilos.css') }}">
</head>

<body>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="{{ asset('image/logo.png') }}"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Solución informatica</h4>
                </div>

                <form action="{{route('register')}}" method="post">
                  
                    @csrf
                    
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Nombre</label>
                    <input type="text" name="name" id="form2Example11" class="form-control"
                      placeholder="Ingresa tu nombre" />            
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Rol</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol" value="Administrador">
                        <label class="form-check-label" for="flexRadioDefault1">
                        Administrador
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol" value="Empleado" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                        Empleado
                        </label>
                        </div>            
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Correo</label>
                    <input type="email" name="email" id="form2Example11" class="form-control"
                      placeholder="Ingresa tu correo" />            
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password" class="form-control" />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Registrarse</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <a style="--bs-btn-color:#2567bc !important;--bs-btn-border-color:#4d94df !important;--bs-btn-hover-bg:#2669bd !important;--bs-btn-hover-border-color:#58a3ea !important" href="{{route('login')}}" class="btn btn-outline-danger">Login</a>
                  </div>
                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <img src="assets/img/equipo.jpg" class="img-fluid animated" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
