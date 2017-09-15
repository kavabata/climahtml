<?php
include_once 'include/common.php';

$photo_path = $config->data['general']['path']['cam'];
$url = $config->data['general']['url'];


include('latestshot.php');


$mode = 'live';

$dir = $photo_path . 'live/';
$photos = [];
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            $name = basename($file,'.jpg');
            array_push($photos, $name);
        }
        closedir($dh);
    }
}
rsort($photos);
$photos = array_slice($photos, 0, 24);


include('header.php');?>

<div class="last_view">
    <a href="<?php echo $shot['src'];?>" target="_blank"><img src="<?php echo $shot['src'];?>" title="<?php echo $shot['title'];?>"></a>
</div>
<div class="clear"></div>


<div class="photos">
<?php
foreach ($photos as $name) {
    echo '<div>
        <a href="http://fastaccess.ddns.net/cam/live/' . $name . '.jpg" target="_blank" title="' . $name . '">
            <img src="http://fastaccess.ddns.net/cam/live/' . $name . '.jpg" class="pic"/>
        </a>
    </div>';
} ?>
</div>
<div class="clear"></div>


<script>
  $(document).ready(function(){
      $('.photos').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
  });
</script>

<?php include('footer.php');