?><?php
// cntnd_random_image_input

// input/vars
$uuid = rand();
$folder = "CMS_VALUE[1]";
$additionalClass = "CMS_VALUE[2]";
$classes = array(
  'top10',
  'top20',
  'top25',
  'top30',
  'top40',
  'top50',
  'top60',
  'top70',
  'top80',
  'top90',
  'top100',
  'top120',
  'top140',
  'top160',
  'top180',
  'top200',
  'top220',
  'top240',
  'top260',
  'top280',
  'top300',
  'top320',
  'top350',
  'top450'
);

// includes
cInclude('module', 'includes/style.cntnd_random_image_input.php');
cInclude('module', 'includes/class.cntnd_random_image.php');

// vars
$folders = CntndRandomImage::folders($client);

?>
<div class="form-vertical">
  <div class="form-group">
      <label for="folders_<?= $uuid ?>"><?= mi18n("IMAGE_FOLDER") ?></label>
      <select name="CMS_VAR[1]" id="folders_<?= $uuid ?>" size="1">
          <option value="false"><?= mi18n("SELECT_CHOOSE") ?></option>
          <?php
          foreach ($folders as $entry) {
              $selected="";
              if ($folder==$entry){
                  $selected = 'selected="selected"';
              }
              echo '<option '.$selected.' value="'.$entry.'">'.$entry.'</option>';
          }
          ?>
      </select>
  </div>

  <div class="form-group">
    <label for="additional_class_<?= $uuid ?>"><?= mi18n("ADDITIONAL_CLASS") ?></label>
    <select name="CMS_VAR[2]" id="additional_class_<?= $uuid ?>" size="1">
      <option value="false"><?= mi18n("SELECT_CHOOSE") ?></option>
      <?php
        foreach ($classes as $class) {
          $selected="";
          if ($additionalClass==$class){
            $selected = 'selected="selected"';
          }
          echo '<option '.$selected.' value="'.$class.'">'.$class.'</option>';
        }
      ?>
    </select>
  </div>
</div>
<?php
