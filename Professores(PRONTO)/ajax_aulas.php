<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css_3.3.7/bootstrap.min.css">
<link rel="stylesheet" href="../jsCssSalvo/jquery.min.js">
<link rel="stylesheet" href="../jsCssSalvo/popper.min.js">
<link rel="stylesheet" href="../js_4.1/bootstrap.min.js">
<div class="form-group">

    <?php
    include_once '../conexao.php';
    $id = $_GET['id'];

    $sql = "SELECT * FROM aulas;";

    $retorno = mysqli_query($conexao, $sql);

    switch ($id) {
        case 1:
            while ($linha = mysqli_fetch_array($retorno)) {
                ?>

                <input type="checkbox" name="aulas1[]" id="aulas" value="<?= $linha['id'] ?>"><?= $linha['aula'] ?>
                <?php
            }

            break;
        case 2:
            while ($linha = mysqli_fetch_array($retorno)) {
                ?>

                <input type="checkbox" name="aulas2[]" id="aulas" value="<?= $linha['id'] ?>"><?= $linha['aula'] ?>
                <?php
            }
            break;
        case 3:
            while ($linha = mysqli_fetch_array($retorno)) {
                ?>

                <input type="checkbox" name="aulas3[]" id="aulas" value="<?= $linha['id'] ?>"><?= $linha['aula'] ?>
                <?php
            }
            break;
        case 4:
            while ($linha = mysqli_fetch_array($retorno)) {
                ?>

                <input type="checkbox" name="aulas4[]" id="aulas" value="<?= $linha['id'] ?>"><?= $linha['aula'] ?>
                <?php
            }
            break;
        case 5:
            while ($linha = mysqli_fetch_array($retorno)) {
                ?>

                <input type="checkbox" name="aulas5[]" id="aulas" value="<?= $linha['id'] ?>"><?= $linha['aula'] ?>
                <?php
            }
            break;
        case 6:
            while ($linha = mysqli_fetch_array($retorno)) {
                ?>

                <input type="checkbox" name="aulas6[]" id="aulas" value="<?= $linha['id'] ?>"><?= $linha['aula'] ?>
                <?php
            }
            break;
        case 7:
            while ($linha = mysqli_fetch_array($retorno)) {
                ?>

                <input type="checkbox" name="aulas7[]" id="aulas" value="<?= $linha['id'] ?>"><?= $linha['aula'] ?>
                <?php
            }
            break;
        default:
            break;
    }
    ?>

</div>