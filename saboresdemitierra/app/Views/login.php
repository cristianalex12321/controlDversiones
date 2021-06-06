<div class="container vh-100">

  <div class="row d-flex justify-content-center align-items-center">

    <div class="col mt-5 d-flex justify-content-center">

      <div class="bg-success  rounded w-25 border border-danger shadow-lg">

        <div class="row mt-5 d-flex justify-content-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
        </svg>
        </div>

          <div class="row mt-5  d-flex justify-content-center">

            <form class="form-group "  action="<?=base_url("home/signIn")?>" method="post">
              <div class="form-group">
                <label  class="" for="usuario"></label>
                  <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Usuario" autocomplete="off" required>
              </div>

              <div class="form-group">
                <label  class="" for="contraseña"></label>
                  <input class="form-control" type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required>
              </div>

              <div class="form-group d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-dark btn-lg btn-outline-light" name="VwSignUp"> Iniciar </button>
              </div>
              <div class="form-group d-flex justify-content-center mt-5">
                No tienes usuario? 
                <a href="<?=base_url("home/formusuario")?>"> registrate</a>
              </div>
            </form>

          </div>

        </div>

      </div>

    </div>

  </div>