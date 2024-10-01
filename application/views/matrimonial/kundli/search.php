<div class="wrapper">
    <h1>Which profile do you want to match with? </h1>
    <form action="<?= base_url('kundli/result') ?>" method="post">
        <input type="hidden" name="match_with" value="<?= $profile['matrimonial_id'] ?>">
        <select name="ayanamsa" id="ayanamsa">
            <option value="">Select Ayanamsa</option>
            <option value="1">Lahiri</option>
            <option value="3">Raman </option>
            <option value="5">KP</option>
        </select>
        <select name="for" id="for">
            <?php var_dump($user_profiles) ?>
            <?php foreach ($user_profiles as $userprofile) { ?>
                <option value="<?= $userprofile->matrimonial_id ?>">
                    <?= $userprofile->name . " (" . $userprofile->for . ")" ?>
                </option>
            <?php } ?>
        </select>
        <button class='p-2 bg-accent text-white' type="submit">Submit</button>
    </form>
</div>