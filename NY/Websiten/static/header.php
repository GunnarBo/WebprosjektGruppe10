<header>
    <a href="./">
        <div id="logo"></div>
    </a>
    <ul class="nav">
        <li class="dropdown">
            <a href="?page=resturanter" class="main">Restauranter</a>
            <ul class="subMenu">
                <li> <a href="?page=asia">ASIA</a> </li>
                <li> <a href="?page=tapas">TAPAS</a> </li>
                <li> <a href="?page=street">STREET</a> </li>
                <li> <a href="?page=latin">LATIN</a> </li>
                <li> <a href="?page=italiensk">ITALIENSK</a> </li>
            </ul>
        </li>
        <li><a href="?page=omoss" class="main">Om oss</a></li>
        <?php if(!empty($_SESSION["user_id"])) { ?>
            <li><a href="?page=reservasjoner" class="main">Reservasjoner</a></li>
        <?php } ?>
        <li><a href="<?php if(empty($_SESSION["user_id"])) { ?>?page=login<? } else { ?>?page=logout<? } ?>" class="main"><?php if(empty($_SESSION["user_id"])) { ?>Logg inn<? } else { ?>Logg ut<? } ?></a></li>

    </ul>

    <div class="mobileMenu" >
        <a href="#toggle" id="menubar">Meny</a>
        <ul id="menuNav" class="menuNav">
            <li><a href="?page=resturanter" class="main">Restauranter</a></li>
            <li><a href="?page=omoss" class="main">Om oss</a></li>
            <?php if(!empty($_SESSION["user_id"])) { ?>
            <li><a href="?page=reservasjoner" class="main">Reservasjoner</a></li>
            <?php } ?>
            <li><a href="<?php if(empty($_SESSION["user_id"])) { ?>?page=login<? } else { ?>?page=logout<? } ?>" class="main"><?php if(empty($_SESSION["user_id"])) { ?>Logg inn<? } else { ?>Logg ut<? } ?></a></li>
        </ul>
    </div>

</header>


<script type="text/javascript">

    function toggleClass(el, _class) {
      if (el && el.className && el.className.indexOf(_class) >= 0) {
        var pattern = new RegExp('\\s*' + _class + '\\s*');
        el.className = el.className.replace(pattern, ' ');
      }
      else if (el){
        el.className = el.className + ' ' + _class;
      }
    }

    var menubar = document.getElementById("menubar")
    showMenu = document.getElementById("menuNav");

    menubar.addEventListener("click", function(){
    toggleClass(showMenu, 'toggle');
    });

</script>