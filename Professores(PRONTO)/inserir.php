<?php

ini_set('display_errors', FALSE);
include '../conexao.php';
require_once '../PHPMailer-6.0.5/src/PHPMailer.php';
require_once '../PHPMailer-6.0.5/src/Exception.php';
require_once '../PHPMailer-6.0.5/src/SMTP.php';
require_once '../PHPMailer-6.0.5/src/POP3.php';
require_once '../PHPMailer-6.0.5/src/OAuth.php';
require_once '../PHPMailer-6.0.5/src/class.phpmailer.php';
require_once '../PHPMailer-6.0.5/src/class.smtp.php';
require_once '../PHPMailer-6.0.5/src/PHPMailerAutoload.php';

$nome = $_POST['nome'];
$carga_horaria = $_POST['carga_horaria'];
$email = $_POST['email'];

$array_id = $_POST['dias_semana'];
$array_id_aulas1 = $_POST['aulas1'];
$array_id_aulas2 = $_POST['aulas2'];
$array_id_aulas3 = $_POST['aulas3'];
$array_id_aulas4 = $_POST['aulas4'];
$array_id_aulas5 = $_POST['aulas5'];
$array_id_aulas6 = $_POST['aulas6'];
$array_id_aulas7 = $_POST['aulas7'];

//echo '<pre>';
//print_r($array_id);
//print_r($array_id_aulas1);
//print_r($array_id_aulas2);
//print_r($array_id_aulas3);
//print_r($array_id_aulas4);
//print_r($array_id_aulas5);
//print_r($array_id_aulas6);
//print_r($array_id_aulas7);
//if (!empty($email)) {
//
//    $mail = new PHPMailer();
//    $mail->isSMTP();
//    $mail->Host = 'smtp.gmail.com';
//    $mail->SMTPAuth = TRUE;
//    $mail->SMTPDebug = 1;
//    $mail->SMTPAutoTLS = FALSE;
//    $mail->SMTPSecure = 'ssl';
//    $mail->Username = 'sistemagerenciamentosigha@gmail.com';
//    $mail->Password = 'sigha123';
//    $mail->Port = 465;
//    $mail->addAddress($email, 'Joao');
//    $mail->setFrom($email);
//    $mail->addReplyTo('joaowitorfelipe2@gmail.com');
//    $mail->isHTML();
//    $mail->Subject = 'SIGHA';
//    $mail->Body = 'http://localhost/SIGHA/Professores(PRONTO)/form_professores.php';
//    if (!$mail->send()) {
//        echo 'Não foi possível enviar a mensagem';
//        echo 'Erro: ' . $mail->ErrorInfo;
//    } else {
//        echo 'Mensagem enviada.';
//    }
//}

if (!empty($nome) && !empty($carga_horaria) && !empty($email)) {

    $sql = "insert into professores values (default, '$nome', $carga_horaria, '$email')";
}
mysqli_query($conexao, $sql);

$ultimo_id = mysqli_insert_id($conexao);
$turno1 = array();
$turno2 = array();
$turno3 = array();
$turno4 = array();
$turno5 = array();
$turno6 = array();
$turno7 = array();

if ((in_array(1, $array_id_aulas1) && in_array(2, $array_id_aulas1) && in_array(3, $array_id_aulas1) && in_array(4, $array_id_aulas1))) {
    array_push($turno1, 1);
} if ((in_array(5, $array_id_aulas1) && in_array(6, $array_id_aulas1) && in_array(7, $array_id_aulas1) && in_array(8, $array_id_aulas1))) {
    array_push($turno1, 2);
} if ((in_array(9, $array_id_aulas1) && in_array(10, $array_id_aulas1) && in_array(11, $array_id_aulas1) && in_array(12, $array_id_aulas1))) {
    array_push($turno1, 3);
} if ((in_array(1, $array_id_aulas1) && in_array(2, $array_id_aulas1))) {
    array_push($turno1, 4);
} if ((in_array(3, $array_id_aulas1) && in_array(4, $array_id_aulas1))) {
    array_push($turno1, 5);
} if ((in_array(5, $array_id_aulas1) && in_array(6, $array_id_aulas1))) {
    array_push($turno1, 6);
} if ((in_array(7, $array_id_aulas1) && in_array(8, $array_id_aulas1))) {
    array_push($turno1, 7);
} if ((in_array(9, $array_id_aulas1) && in_array(10, $array_id_aulas1))) {
    array_push($turno1, 8);
} if ((in_array(11, $array_id_aulas1) && in_array(12, $array_id_aulas1))) {
    array_push($turno1, 9);
}

/////////////////////////////////////////////

if ((in_array(1, $array_id_aulas2) && in_array(2, $array_id_aulas2) && in_array(3, $array_id_aulas2) && in_array(4, $array_id_aulas2))) {
    array_push($turno2, 1);
} if ((in_array(5, $array_id_aulas2) && in_array(6, $array_id_aulas2) && in_array(7, $array_id_aulas2) && in_array(8, $array_id_aulas2))) {
    array_push($turno2, 2);
} if ((in_array(9, $array_id_aulas2) && in_array(10, $array_id_aulas2) && in_array(11, $array_id_aulas2) && in_array(12, $array_id_aulas2))) {
    array_push($turno2, 3);
} if ((in_array(1, $array_id_aulas2) && in_array(2, $array_id_aulas2))) {
    array_push($turno2, 4);
} if ((in_array(3, $array_id_aulas2) && in_array(4, $array_id_aulas2))) {
    array_push($turno2, 5);
} if ((in_array(5, $array_id_aulas2) && in_array(6, $array_id_aulas2))) {
    array_push($turno2, 6);
} if ((in_array(7, $array_id_aulas2) && in_array(8, $array_id_aulas2))) {
    array_push($turno2, 7);
} if ((in_array(9, $array_id_aulas2) && in_array(10, $array_id_aulas2))) {
    array_push($turno2, 8);
} if ((in_array(11, $array_id_aulas2) && in_array(12, $array_id_aulas2))) {
    array_push($turno2, 9);
}

////////////////////////

if ((in_array(1, $array_id_aulas3) && in_array(2, $array_id_aulas3) && in_array(3, $array_id_aulas3) && in_array(4, $array_id_aulas3))) {
    array_push($turno3, 1);
} if ((in_array(5, $array_id_aulas3) && in_array(6, $array_id_aulas3) && in_array(7, $array_id_aulas3) && in_array(8, $array_id_aulas3))) {
    array_push($turno3, 2);
} if ((in_array(9, $array_id_aulas3) && in_array(10, $array_id_aulas3) && in_array(11, $array_id_aulas3) && in_array(12, $array_id_aulas3))) {
    array_push($turno3, 3);
} if ((in_array(1, $array_id_aulas3) && in_array(2, $array_id_aulas3))) {
    array_push($turno3, 4);
} if ((in_array(3, $array_id_aulas3) && in_array(4, $array_id_aulas3))) {
    array_push($turno3, 5);
} if ((in_array(5, $array_id_aulas3) && in_array(6, $array_id_aulas3))) {
    array_push($turno3, 6);
} if ((in_array(7, $array_id_aulas3) && in_array(8, $array_id_aulas3))) {
    array_push($turno3, 7);
} if ((in_array(9, $array_id_aulas3) && in_array(10, $array_id_aulas3))) {
    array_push($turno3, 8);
} if ((in_array(11, $array_id_aulas3) && in_array(12, $array_id_aulas3))) {
    array_push($turno3, 9);
}

///////////////////////////////////

if ((in_array(1, $array_id_aulas4) && in_array(2, $array_id_aulas4) && in_array(3, $array_id_aulas4) && in_array(4, $array_id_aulas4))) {
    array_push($turno4, 1);
} if ((in_array(5, $array_id_aulas4) && in_array(6, $array_id_aulas4) && in_array(7, $array_id_aulas4) && in_array(8, $array_id_aulas4))) {
    array_push($turno4, 2);
} if ((in_array(9, $array_id_aulas4) && in_array(10, $array_id_aulas4) && in_array(11, $array_id_aulas4) && in_array(12, $array_id_aulas4))) {
    array_push($turno4, 3);
} if ((in_array(1, $array_id_aulas4) && in_array(2, $array_id_aulas4))) {
    array_push($turno3, 4);
} if ((in_array(3, $array_id_aulas4) && in_array(4, $array_id_aulas4))) {
    array_push($turno4, 5);
} if ((in_array(5, $array_id_aulas4) && in_array(6, $array_id_aulas4))) {
    array_push($turno4, 6);
} if ((in_array(7, $array_id_aulas4) && in_array(8, $array_id_aulas4))) {
    array_push($turno4, 7);
} if ((in_array(9, $array_id_aulas4) && in_array(10, $array_id_aulas4))) {
    array_push($turno4, 8);
} if ((in_array(11, $array_id_aulas4) && in_array(12, $array_id_aulas4))) {
    array_push($turno4, 9);
}

///////////////////////////////////

if ((in_array(1, $array_id_aulas5) && in_array(2, $array_id_aulas5) && in_array(3, $array_id_aulas5) && in_array(4, $array_id_aulas5))) {
    array_push($turno5, 1);
} if ((in_array(5, $array_id_aulas5) && in_array(6, $array_id_aulas5) && in_array(7, $array_id_aulas5) && in_array(8, $array_id_aulas5))) {
    array_push($turno5, 2);
} if ((in_array(9, $array_id_aulas5) && in_array(10, $array_id_aulas5) && in_array(11, $array_id_aulas5) && in_array(12, $array_id_aulas5))) {
    array_push($turno5, 3);
} if ((in_array(1, $array_id_aulas5) && in_array(2, $array_id_aulas5))) {
    array_push($turno5, 4);
} if ((in_array(3, $array_id_aulas5) && in_array(4, $array_id_aulas5))) {
    array_push($turno5, 5);
} if ((in_array(5, $array_id_aulas5) && in_array(6, $array_id_aulas5))) {
    array_push($turno5, 6);
} if ((in_array(7, $array_id_aulas5) && in_array(8, $array_id_aulas5))) {
    array_push($turno5, 7);
} if ((in_array(9, $array_id_aulas5) && in_array(10, $array_id_aulas5))) {
    array_push($turno5, 8);
} if ((in_array(11, $array_id_aulas5) && in_array(12, $array_id_aulas5))) {
    array_push($turno5, 9);
}

///////////////////////////////////

if ((in_array(1, $array_id_aulas6) && in_array(2, $array_id_aulas6) && in_array(3, $array_id_aulas6) && in_array(4, $array_id_aulas6))) {
    array_push($turno6, 1);
} if ((in_array(5, $array_id_aulas6) && in_array(6, $array_id_aulas6) && in_array(7, $array_id_aulas6) && in_array(8, $array_id_aulas6))) {
    array_push($turno6, 2);
} if ((in_array(9, $array_id_aulas6) && in_array(10, $array_id_aulas6) && in_array(11, $array_id_aulas6) && in_array(12, $array_id_aulas6))) {
    array_push($turno6, 3);
} if ((in_array(1, $array_id_aulas6) && in_array(2, $array_id_aulas6))) {
    array_push($turno6, 4);
} if ((in_array(3, $array_id_aulas6) && in_array(4, $array_id_aulas6))) {
    array_push($turno6, 5);
} if ((in_array(5, $array_id_aulas6) && in_array(6, $array_id_aulas6))) {
    array_push($turno6, 6);
} if ((in_array(7, $array_id_aulas6) && in_array(8, $array_id_aulas6))) {
    array_push($turno6, 7);
} if ((in_array(9, $array_id_aulas6) && in_array(10, $array_id_aulas6))) {
    array_push($turno6, 8);
} if ((in_array(11, $array_id_aulas6) && in_array(12, $array_id_aulas6))) {
    array_push($turno6, 9);
}

///////////////////////////////////

if ((in_array(1, $array_id_aulas7) && in_array(2, $array_id_aulas7) && in_array(3, $array_id_aulas7) && in_array(4, $array_id_aulas7))) {
    array_push($turno7, 1);
} if ((in_array(5, $array_id_aulas7) && in_array(6, $array_id_aulas7) && in_array(7, $array_id_aulas7) && in_array(8, $array_id_aulas7))) {
    array_push($turno7, 2);
} if ((in_array(9, $array_id_aulas7) && in_array(10, $array_id_aulas7) && in_array(11, $array_id_aulas7) && in_array(12, $array_id_aulas7))) {
    array_push($turno7, 3);
} if ((in_array(1, $array_id_aulas7) && in_array(2, $array_id_aulas7))) {
    array_push($turno7, 4);
} if ((in_array(3, $array_id_aulas7) && in_array(4, $array_id_aulas7))) {
    array_push($turno7, 5);
} if ((in_array(5, $array_id_aulas7) && in_array(6, $array_id_aulas7))) {
    array_push($turno7, 6);
} if ((in_array(7, $array_id_aulas7) && in_array(8, $array_id_aulas7))) {
    array_push($turno7, 7);
} if ((in_array(9, $array_id_aulas7) && in_array(10, $array_id_aulas7))) {
    array_push($turno7, 8);
} if ((in_array(11, $array_id_aulas7) && in_array(12, $array_id_aulas7))) {
    array_push($turno7, 9);
}

print_r($turno1);
print_r($array_id_aulas1);
echo '<pre>';
if (!empty($array_id)) {
    foreach ($array_id as $dias_semana) {
        switch ($dias_semana) {
            case 1:
                if (!empty($array_id_aulas1)) {
                    foreach ($array_id_aulas1 as $aula) {
                        foreach ($turno1 as $turno_1) {
                            $sql_insert_associativo_dias_aula = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, $aula, $turno_1);";
                            echo $sql_insert_associativo_dias_aula;
                            mysqli_query($conexao, $sql_insert_associativo_dias_aula);
                        }
                    }
                } else {
                    $sql_insert_associativo_dias = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, 0, 10)";
                    echo $sql_insert_associativo_dias;
                    mysqli_query($conexao, $sql_insert_associativo_dias);
                }
                break;
            case 2:
                if (!empty($array_id_aulas2)) {
                    foreach ($array_id_aulas2 as $aula) {
                        foreach ($turno2 as $turno_2) {
                            $sql_insert_associativo_dias_aula = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, $aula, $turno_2);";
                            echo $sql_insert_associativo_dias_aula;
                            mysqli_query($conexao, $sql_insert_associativo_dias_aula);
                        }
                    }
                } else {
                    $sql_insert_associativo_dias = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, 0, 10)";
                    echo $sql_insert_associativo_dias;
                    mysqli_query($conexao, $sql_insert_associativo_dias);
                }
                break;
            case 3:
                if (!empty($array_id_aulas3)) {
                    foreach ($array_id_aulas3 as $aula) {
                        foreach ($turno3 as $turno_3) {
                            $sql_insert_associativo_dias_aula = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, $aula, $turno_3);";
                            echo $sql_insert_associativo_dias_aula;
                            mysqli_query($conexao, $sql_insert_associativo_dias_aula);
                        }
                    }
                } else {
                    $sql_insert_associativo_dias = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, 0, 10)";
                    echo $sql_insert_associativo_dias;
                    mysqli_query($conexao, $sql_insert_associativo_dias);
                }
                break;
            case 4:
                if (!empty($array_id_aulas4)) {
                    foreach ($array_id_aulas4 as $aula) {
                        foreach ($turno4 as $turno_4) {
                            $sql_insert_associativo_dias_aula = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, $aula, $turno_4);";
                            echo $sql_insert_associativo_dias_aula;
                            mysqli_query($conexao, $sql_insert_associativo_dias_aula);
                        }
                    }
                } else {
                    $sql_insert_associativo_dias = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, 0, 10)";
                    echo $sql_insert_associativo_dias;
                    mysqli_query($conexao, $sql_insert_associativo_dias);
                }
                break;
            case 5:
                if (!empty($array_id_aulas5)) {
                    foreach ($array_id_aulas5 as $aula) {
                        foreach ($turno5 as $turno_5) {
                            $sql_insert_associativo_dias_aula = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, $aula, $turno_5);";
                            echo $sql_insert_associativo_dias_aula;
                            mysqli_query($conexao, $sql_insert_associativo_dias_aula);
                        }
                    }
                } else {
                    $sql_insert_associativo_dias = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, 0, 10)";
                    echo $sql_insert_associativo_dias;
                    mysqli_query($conexao, $sql_insert_associativo_dias);
                }
                break;
            case 6:
                if (!empty($array_id_aulas6)) {
                    foreach ($array_id_aulas6 as $aula) {
                        foreach ($turno6 as $turno_6) {
                            $sql_insert_associativo_dias_aula = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, $aula, $turno_6);";
                            echo $sql_insert_associativo_dias_aula;
                            mysqli_query($conexao, $sql_insert_associativo_dias_aula);
                        }
                    }
                } else {
                    $sql_insert_associativo_dias = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, 0, 10)";
                    echo $sql_insert_associativo_dias;
                    mysqli_query($conexao, $sql_insert_associativo_dias);
                }
                break;
            case 7:
                if (!empty($array_id_aulas7)) {
                    foreach ($array_id_aulas7 as $aula) {
                        foreach ($turno7 as $turno_7) {
                            $sql_insert_associativo_dias_aula = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, $aula, $turno_7);";
                            echo $sql_insert_associativo_dias_aula;
                            mysqli_query($conexao, $sql_insert_associativo_dias_aula);
                        }
                    }
                } else {
                    $sql_insert_associativo_dias = "insert into professores_dias_aulas_turno values ($ultimo_id, $dias_semana, 0, 10)";
                    echo $sql_insert_associativo_dias;
                    mysqli_query($conexao, $sql_insert_associativo_dias);
                }
                break;

            default:
                break;
        }
    }
}

header('Location: form_professores.php');
?>