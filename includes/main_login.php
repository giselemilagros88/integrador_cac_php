<main class="container mt-5">
        <div class="row mt-5 justify-content-center">
            <h2 class="text-center">LogIn</h2>
            <div class="col-6">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                
                    <input type="submit" class="btn btn-success text-center" value="LogIn">
                    
                </form>
                <a href="<?php echo BASE_URL; ?>includes/registrarse.php">Si no tenes user registrate</a>
                <p>usuario :administrador </p>
                <p>contraseña:CAC </p>
            </div>
            
        </div>
</main>