<div id="dashboard" class="dashboard">
  <table>
    <tr>
      <td rowspan="1000" style="vertical-align: top; min-width: 255px;">
        <div class="side">
          <div class="logo">
            <img src="" alt="">
            <h2>Sun Sport</h2>
          </div>
          <div class="price-table">
            <h3>Price Table</h3>
            <table>
              <tr>
                <th>Time</th>
                <th>Price</th>
              </tr>
              <tr>
                <td>08:00-09:00 AM</td>
                <td>$5</td>
              </tr>
              <tr>
                <td>08:00-09:00 AM</td>
                <td>$5</td>
              </tr>
              <tr>
                <td>08:00-09:00 AM</td>
                <td>$5</td>
              </tr>
            </table>
          </div>
          <div class="logout">
            <a href="<?php echo SITE_URL; ?>/logout">Logout</a>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <th class="td255">
        <label name="date">Date:</label>
        <input style="width: 150px; height: 5 px;" type="date" name="date">
        <input type="hidden" value="" id="date">
      </th>
      <th colspan="5">Fields</th>
    </tr>
    <tr>
      <th class="td255">Time</th>
      <?php $fields = array('A', 'B', 'C', 'D', 'E') ?>
      <?php foreach($fields as $field): ?>
      <th><div class="td-head"><?php echo $field; ?></div></th> 
      <?php endforeach; ?> 
    </tr>
    <?php for($i=7; $i<22; $i++): ?>
    <tr>
      <td class="td-time td255"><?php echo sprintf('%02d', $i) ?>:00 - <?php echo sprintf('%02d', $i+1)?>:00</td>
      <?php foreach($fields as $field): ?>
      <td class="td-block"><button class="add-booking" data-time="<?php echo $i ?>" data-field="<?php echo $field; ?>"> + </button></td>
      <?php endforeach; ?> 
    </tr>
   <?php endfor; ?>

  </table>
</div>