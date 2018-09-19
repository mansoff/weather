<?php
/** @var \Symfony\Bundle\FrameworkBundle\Templating\PhpEngine */
/** @var $allCities array */
$view->extend('Layouts/base.html.php');

?>
<br>
<ul class="nav nav-tabs" data-prototype="<?= $this->escape($this->render('Desktop/Dashboard/tab.html.php')) ;?>">
    <li class="nav-item">
        <a class="nav-link active" href="/">Add city</a>
    </li>
    <?php foreach ($allCities as $city) { ?>
        <li class="nav-item">
            <a class="nav-link city"
               data-id="<?= $city['id']; ?>"
               data-name="<?= $city['name']; ?>"
               href="#city-<?= $city['id']; ?>"
            ><?=
                $city['name']; ?></a>
        </li>
    <?php } ?>

</ul>
<div id="forecast-wrap" style="display: none;">
    <br>
    <h4 id="city-table-name">Loading data</h4>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Type</th>
            <th scope="col">Value</th>
            <th scope="col">Unit</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Humidity</td>
            <td id="humidity"></td>
            <td>%</td>
        </tr>
        <tr>
            <td>Pressure</td>
            <td id="pressure"></td>
            <td>kPa</td>
        </tr>
        <tr>
            <td>Temp</td>
            <td id="temp"></td>
            <td>°C</td>
        </tr>
        </tbody>
    </table>
</div>
<div id="add-city-wrap">
    <br>
    <form>
        <div class="form-group">
            <input type="text" class="form-control" id="key" placeholder="Api key">
        </div>
        <div class="input-group">
            <input type="text" class="form-control" id="cityName" placeholder="City name">
            <div class="input-group-append">
                <span class="btn btn-success" id="submit"><i class="fas fa-check"></i> </span>
            </div>
        </div>
    </form>
</div>