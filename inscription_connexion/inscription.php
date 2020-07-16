
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>tweet_academie</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-12">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="inscription-class.php" method="post">
                            <h3 class="text-center text-info">Inscription</h3>
                           <div class="container">
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username" class="text-info">Nom:</label><br>
                                            <input type="text" name="nom" id="nom" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="text-info">Pseudo:</label><br>
                                            <input type="text" name="pseudo" id="pseudo" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="text-info">E-mail:</label><br>
                                            <input type="email" name="email" id="email" class="form-control" required>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username" class="text-info">Prenom:</label><br>
                                            <input type="text" name="prenom" id="prenom" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="text-info">Date de naissance:</label><br>
                                            <input type="date" name="naissance" id="naissance" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="text-info">Password:</label><br>
                                            <input type="password" name="password" id="password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-info btn-md" value="S'inscrire">
                                        </div>
                                
                                    </div> 
                                </div>
                                
                            </div> 
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>