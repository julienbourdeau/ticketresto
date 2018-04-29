<ul class="unstyled userinfo">
    <?php 

    if($data['email']){
        echo "<li title='Email'><i class='icon-envelope'></i> ";
        echo "<a href='mailto:".$data['email']."'>";
        echo $data['email'];
        echo '</a></li>';
    }

    if($data['telephone']){
        echo "<li title='Téléphone'>&#9742; ";
        echo $data['telephone'];
        echo '</li>';
    }

    if($data['adresse']){
        echo '<li><i class="icon-home"></i> ';
        echo $data['adresse'];
        echo '</li>';
    }

    if($data['commentaire']){
        echo "<li title='A propos'><i class='icon-tag'></i> ";
        echo $data['commentaire'];
        echo '</li>';
    }

    ?>
</ul>