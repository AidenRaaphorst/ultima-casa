<?php
     include_once("functions.php");
     
     echo '
<!DOCTYPE html>
<html lang="nl">
     <head>
          <title>Ultima Casa account aanvragen</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
          <link rel="stylesheet" type="text/css" href="ucstyle.css?' . mt_rand() . '">
     </head>
     <body>
          <div class="container">
               <div class="col-sm-4 col-md-6 col-lg-4 col-sm-offset-4 col-md-offset-3 col-lg-offset-4">                                     
                    <h4 class="text-center">Ultima Casa account aanvragen</h4>
                    <table>
                         <tr>
                              <th>&nbsp;</th>
                              <th class="text-center">Account</th>
                              <th>&nbsp;</th>
                         </tr>
                         <tr>
                              <td>&nbsp;</td>
                              <td>               
                                   <form action="maakaccount-save.php" method="GET">
                                        <p id="pass-validate" style="color: red"></p>
                                        <p id="agree-tos-validate" style="color: red"></p>
                                        <div class="form-group">
                                             <label for="Naam">Naam:</label>
                                             <input type="text" class="form-control" id="Naam" name="Naam" placeholder="Naam" required>
                                        </div>
                                        <div class="form-group">
                                             <label for="Email">E-mailadres:</label>
                                             <input type="email" class="form-control" id="Email" name="Email" placeholder="E-mailadres" required
                                             pattern="' . $emailpattern . '">
                                        </div>
                                        <div class="form-group">
                                             <label for="Wachtwoord">Wachtwoord:</label>
                                             <input type="password" class="form-control" id="Wachtwoord" name="Wachtwoord" placeholder="Wachtwoord" required>
                                        </div>
                                        <div class="form-group">
                                             <label for="Wachtwoord-Herhalen">Wachtwoord herhalen:</label>
                                             <input type="password" class="form-control" id="Wachtwoord-Herhalen" name="Wachtwoord-Herhalen" placeholder="Wachtwoord herhalen" required>
                                        </div>
                                        <div class="form-group">
                                             <label for="Telefoon">Mobiel telefoonnummer:</label>
                                             <input type="tel" class="form-control" id="Telefoon" name="Telefoon" 
                                                    placeholder="Telefoonnummer" 
                                                    pattern="' . $telefoonpattern . '" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="agree-tos" id="agree-tos">
                                            <label for="agree-tos">Ik accepteer de Terms of Service</label>
                                        </div>
                                        <div class="form-group"><br><br>
                                             <button type="submit" class="action-button" title="Uw account aanmaken">Maak account</button>
                                             <button class="action-button"><a href="index.html" >Annuleren</a></button>
                                        </div>
                                   </form>
                              </td>
                              <td>&nbsp;</td>
                         </tr>
                    </table>
               </div>
          </div>
          
          <script>
              const form = document.querySelector("form");
              const pass = form.querySelector("#Wachtwoord");
              const passRepeat = form.querySelector("#Wachtwoord-Herhalen");
              const tosCheck = form.querySelector("#agree-tos");
              const passValidate = form.querySelector("#pass-validate");
              const tosValidate = form.querySelector("#agree-tos-validate");
              
              form.addEventListener("submit", (e) => {
                  e.preventDefault()
                  if(pass.value !== passRepeat.value) {
                      passValidate.innerText = "Wachtwoorden komen niet overeen";
                  } else if(!pass.value.match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/)) {
                      passValidate.innerHTML = "Wachtwoord voldoet niet aan de eisen: <br/> " +
                        "minimaal 8 tekens, <br/> " +
                        "minimaal 1 hoofdletter, <br/> " +
                        "minimaal 1 kleine letter, <br/> " +
                        "minimaal 1 speciaal teken";
                      return;
                  }
                  
                  if(!tosCheck.checked) {
                      tosValidate.innerHTML = "Je moet de Terms of Service accepteren om een account te maken";
                      return;
                  }
                  
                  passValidate.innerHTML = "";
                  tosValidate.innerHTML = "";
                  form.submit();
              });
        </script>
     </body>
</html>';

?>