<?php

class Mail {    
    //put your code here 
    public function __construct() { 

    }
    
    public function envoyerMailer($twig,$destinataire, $sujet,$emailmdp,$code){
        $mail = new PHPMailer\PHPMailer\PHPMailer(); 
        $mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP    
        $mail->Host = 'smtp.office365.com'; // Spécifier le serveur SMTP        
        $mail->SMTPAuth = true; // Activer authentication SMTP        
        $mail->Username = 'melanie.boudry@epsi.fr'; // Votre adresse email d'envoi        
        $mail->Password = $emailmdp['mdp']; // Le mot de passe de cette adresse email        
        $mail->SMTPSecure = 'tls'; // Accepter SSL        
        $mail->Port = 587;  
        $mail->CharSet = "UTF-8";

        $mail->setFrom('melanie.boudry@epsi.fr', 'Mailer'); // Personnaliser l'envoyeur        
        $mail->addAddress($destinataire);        
        $mail->addReplyTo('noreply@simpleduc.fr', 'Simpleduc'); // L'adresse de réponse        
                     
        $mail->isHTML(true); // Paramétrer le format des emails en HTML ou non        
        $mail->Subject = $sujet;        
        $mail->Body = $twig->render("mail/register_message.html.twig", [ 
            'email' => $destinataire,
            'numero' => $code,
        ]);       
        
        if(!$mail->send()) {                
            echo 'Erreur, message non envoyé.';                
            echo 'Mailer Error: ' . $mail->ErrorInfo;        
        } else {                
            echo 'Le message a bien été envoyé !';
        }
    }
}