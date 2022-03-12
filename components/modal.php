<?php

?>

<!-- Modal Structure -->
    <div class="modal-content ">
        <div class="modalntent">
        <form action="../DatabaseHelper/helper.php" method="POST">
            <div class = " input-field">
                <input placeholder="Enter Name" id="name" type="text" class="validate" name="itemName" autocomplete= "off">
                <label for="name">Name</label>
            </div>
            <div class = " input-field">
                <input placeholder="Enter Credited" id="credit" type="number" class="validate" value="0" name="credit" autocomplete= "off">
                <label for="credit">credit</label>
            </div>
            <div class = " input-field">
                <input placeholder="Enter debited" id="debit" type="number" class="validate" value="0" name="debit" autocomplete= "off">
                <label for="debit">debit</label>
            </div>
            <button class="btn red right" type="submit">Add</button>
        </form>
        </div>
    </div>

