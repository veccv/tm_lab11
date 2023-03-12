<form method="POST" action="add.php"><br>
    x1:<input type="number" name="x1" min="-50" max="100"><br>
    x2:<input type="number" name="x2" min="-50" max="100"><br>
    x3:<input type="number" name="x3" min="-50" max="100"><br>
    x4:<input type="number" name="x4" min="-50" max="100"><br>
    x5:<input type="number" name="x5" min="-50" max="100"><br>
    <br>
    Pożar:
    <select name="pozar">
        <option value="0">Nie</option>
        <option value="1">Tak</option>
    </select>

    Zalanie:
    <select name="zalanie">
        <option value="0">Nie</option>
        <option value="1">Tak</option>
    </select>

    Włamanie:
    <select name="wlamanie">
        <option value="0">Nie</option>
        <option value="1">Tak</option>
    </select>

    Czujnik CO:
    <select name="czujnik_co">
        <option value="0">Nie</option>
        <option value="1">Tak</option>
    </select>

    Wentylacja:
    <select name="wentylacja">
        <option value="0">Wyłączona</option>
        <option value="1">Włączona - stopień 1</option>
        <option value="2">Włączona - stopień 2</option>
    </select>
    <br>
    <br>
    <br>
    <br>
    <input type="submit" value="Send"/>
</form>