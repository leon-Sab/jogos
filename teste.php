<?php
include "includes/banco.php";
$produtoras = "SELECT * FROM produtoras";
$generos = "SELECT * FROM generos";

$result = $banco->query($produtoras);
if ($result->num_rows > 0) {
?>
    <h1>Selecione a produtora</h1>
    <?php
    ?>
    <select name="cod" id="cod">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <option value="<?php echo $row['cod']; ?>">
                <?php echo $row['produtora']; ?>
            </option>
        <?php } ?>
    </select>
    <button type="submit">Selecionar</button>

<?php
} else {
    echo "0 resultados";
}

$banco->close();
?>