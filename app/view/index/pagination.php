<?php
    if (sizeof($this->view_data['pagination']) > 1) {
?>
    <ul class="uk-pagination uk-flex-center" uk-margin>
        <?php
            foreach ($this->view_data['pagination'] as $key => $site) {
        ?>
                <li class="<?php echo $site['class']; ?>"><a href="<?php echo $site['href']; ?>"><?php echo $key; ?></a></li>
        <?php
            }
        ?>
    </ul>
<?php
    }
?>
